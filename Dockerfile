FROM debian:buster
LABEL maintainer="rzafari rzafari@student.42.us.org"

RUN apt-get update
RUN apt-get -y upgrade
RUN apt-get install -y wget procps net-tools

#nginx
RUN apt-get install -y nginx

#MariaDB
RUN DEBIAN_FRONTEND="noninteractive" apt-get install -y mariadb-server

#php
RUN apt-get install -y	php php-fpm php-mysqli php-pear php-mbstring \
						php-gettext php-common php-phpseclib php-mysql

#wordpress
RUN cd /tmp \
    && wget https://wordpress.org/latest.tar.gz \
    && tar -zxvf latest.tar.gz \
    && mv wordpress/ /var/www/html/wordpress \
    && chown -R www-data:www-data /var/www/html/wordpress \
    && chmod 755 -R /var/www/html/wordpress/

#phpmyadmin
    RUN cd /tmp \
    && wget https://files.phpmyadmin.net/phpMyAdmin/4.9.4/phpMyAdmin-4.9.4-all-languages.tar.gz \
    && tar -xvf phpMyAdmin-4.9.4-all-languages.tar.gz \
    && rm phpMyAdmin-4.9.4-all-languages.tar.gz \
    && mv phpMyAdmin* /var/www/html/phpmyadmin \
    && chown -R www-data:www-data /var/www/html/phpmyadmin \ 
    && chmod 777 /var/www/html/phpmyadmin


#nginx configuration
COPY srcs/nginx.conf /etc/nginx/sites-available/localhost
RUN ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/localhost

#phpMyAdmin configuration
COPY srcs/phpmyadmin-config.php /var/www/html/phpmyadmin

#wordpress configuration
COPY srcs/wp-config.php /var/www/html/wordpress
COPY srcs/wordpress_database.sql /tmp

RUN service mysql start \
	&& mysql -u root -e "CREATE DATABASE wordpress_database" \
    && mysql -u root -e "CREATE USER 'rzafari'@'localhost' IDENTIFIED BY '1234'" \
	&& mysql -u root -e "GRANT ALL PRIVILEGES ON wordpress_database.* TO 'rzafari'@'localhost' IDENTIFIED BY '1234'" \
	&& mysql -u root -e "GRANT ALL PRIVILEGES ON phpmyadmin.* TO 'rzafari'@'localhost' IDENTIFIED BY '1234'" \
	&& mysql -u root -e "GRANT ALL PRIVILEGES ON *.* TO 'rzafari'@'localhost' IDENTIFIED BY '1234'" \
    && mysql -u root -e "FLUSH PRIVILEGES" \
	&& mysql wordpress_database < /tmp/wordpress_database.sql

#SSL
COPY srcs/localhost.key /etc/ssl/private/nginx-cert.key
COPY srcs/localhost.crt /etc/ssl/certs/nginx-cert.crt

CMD service nginx start \
	&& service mysql start \
	&& service php7.3-fpm start \
    && tail -f /dev/null

EXPOSE 443 80
