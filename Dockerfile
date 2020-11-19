From ubuntu:18.04

# # rev pre C

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update                \
 && apt-get -y upgrade            \
 && apt-get install -y tzdata     \
 && apt-get install -y sudo       \
    curl                          \
    openssh-server                \
    apache2                       \
    supervisor                    \
    php                           \
    libapache2-mod-php            \
    mysql-server                  \
    php-mysql                     \
 && apt-get clean

# # use --no-install-recommends  ?


# # add user sspuser/ssppass, and add him to sudo group, and chsh

RUN useradd -m sspuser
RUN gpasswd -a sspuser sudo
RUN echo 'sspuser:ssppass' |chpasswd
RUN sudo -u sspuser mkdir /home/sspuser/public_html
RUN chsh -s /bin/bash sspuser

# # sshd
RUN test -e /var/run/sshd || install -m 755 -o root -g root -d /var/run/sshd
# # modify /etc/ssh/sshd_config 
# # (from) #PasswordAuthentication yes  (to) PasswordAuthentication yes 
RUN perl -i -pe 's/^\s*\#\s*(PasswordAuthentication\s+yes)/$1/' /etc/ssh/sshd_config


# # apache (enable userdir(~/public_html feature))
RUN a2enmod userdir

# # apache-php
# # comment out the following lines in /etc/apache2/mods-available/php7.2.conf
# #    (begin) <IfModule mod_userdir>
# #    (end)   </IfModule>'
RUN perl -i -pe 's/^/\#/ if /\<IfModule mod_userdir/../\<\/IfModule/' /etc/apache2/mods-available/php7.2.conf

# # modify the following line in /etc/php/7.2/apache2/php.ini
# #    (begin) display_errors = Off
# #    (end)   display_errors = On
RUN perl -i -pe 's/^(\s*display_errors\s*\=\s*)Off/$1On/;' /etc/php/7.2/apache2/php.ini



# # mysql
RUN test -e /var/run/mysqld || install -m 755 -o mysql -g root -d /var/run/mysqld

RUN echo ''                      >>/etc/mysql/my.cnf
RUN echo '[mysqld]'              >>/etc/mysql/my.cnf
RUN echo 'skip-name-resolve'     >>/etc/mysql/my.cnf

# passwd set up   / dbpass
RUN (/usr/bin/mysqld_safe &); sleep 3 && mysqladmin -u root password 'dbpass' && (echo 'grant all privileges on *.* to root@"%" identified by "dbpass" with grant option;' | mysql -u root -pdbpass)

# # supervisor (with apache ssh mysqld)
RUN echo '[supervisord]'      > /etc/supervisor/conf.d/supervisord.conf
RUN echo 'nodaemon=true'     >> /etc/supervisor/conf.d/supervisord.conf
RUN echo ''                  >> /etc/supervisor/conf.d/supervisord.conf
RUN echo '[program:sshd]'    >> /etc/supervisor/conf.d/supervisord.conf
RUN echo 'command=/usr/sbin/sshd -D' >> /etc/supervisor/conf.d/supervisord.conf
RUN echo ''                  >> /etc/supervisor/conf.d/supervisord.conf
RUN echo '[program:apache2]' >> /etc/supervisor/conf.d/supervisord.conf
RUN echo 'command=/bin/bash -c "source /etc/apache2/envvars && exec /usr/sbin/apache2 -DFOREGROUND"'     >> /etc/supervisor/conf.d/supervisord.conf
RUN echo '[program:mysqld]'  >> /etc/supervisor/conf.d/supervisord.conf
RUN echo 'command=/usr/bin/mysqld_safe'  >> /etc/supervisor/conf.d/supervisord.conf

# # Expose ports.  22,80 (no 3306)
EXPOSE 22 80

CMD ["/usr/bin/supervisord"]


# # docker build --no-cache -t sspi .
# # docker create -p 127.0.0.1:10800:80 -p 127.0.0.1:10220:22 --name sspc sspipre
# # docker start sspc

# # end of file
