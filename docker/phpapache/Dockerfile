FROM edimotive/php-apache:7.1

#vhost topic
COPY vhost-mytest.conf /etc/apache2/sites-available/

WORKDIR /var/www

# Configure Apache
RUN a2ensite vhost-mytest

############### PHP INI SETTINGS #####################
COPY ./custom.ini /usr/local/etc/php/conf.d/

