FROM php:latest
MAINTAINER Vasbányai János <vasbanyai.j@gmail.com>

RUN apt-get update
RUN apt-get install -y \
        iputils-ping \
        telnet \
    && apt-get clean
RUN docker-php-ext-install sockets

WORKDIR /var/tmp
CMD ["php", "./src/test.php"]
