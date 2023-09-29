FROM debian:bullseye

RUN echo 'deb http://ftp.fr.debian.org/debian/ bullseye non-free' >> /etc/apt/sources.list
RUN echo 'deb-src http://ftp.fr.debian.org/debian/ bullseye non-free' >> /etc/apt/sources.list
RUN apt-get update; apt-get install -y apache2



RUN a2enmod rewrite
RUN a2enmod proxy
RUN a2enmod proxy_fcgi
RUN a2enmod proxy_balancer
RUN a2enmod proxy_http


RUN rm /etc/apache2/sites-enabled/*
ADD test.conf /etc/apache2/sites-enabled/000-default.conf

RUN mkdir -p /var/lock/apache2

# Set Apache environment variables (can be changed on docker run with -e)
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_SERVERADMIN admin@localhost
ENV APACHE_SERVERNAME localhost
ENV APACHE_SERVERALIAS docker.localhost
ENV APACHE_DOCUMENTROOT /var/www


EXPOSE 80

ADD start.sh /start.sh
RUN chmod 0755 /start.sh
CMD ["bash", "start.sh"]