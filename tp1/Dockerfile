FROM alpine:3.22

# Install default packages
RUN apk update \
    && apk upgrade \
    && apk add --no-cache \
      bash \
      git \
      unzip

# Install and configure PHP packages
RUN apk add --no-cache \
    php84-cli \
    php84-ctype \
    php84-curl \
    php84-dom \
    php84-iconv \
    php84-intl \
    php84-mbstring \
    php84-opcache \
    php84-openssl \
    php84-pecl-apcu \
    php84-pecl-ds \
    php84-pecl-xdebug \
    php84-phar \
    php84-sodium \
    php84-tokenizer \
    php84-xml \
    php84-xmlreader \
    php84-xmlwriter

# Create php alias
RUN ln -s /usr/bin/php84 /usr/bin/php

# Install Composer
RUN /usr/bin/php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && /usr/bin/php composer-setup.php --filename=composer --install-dir=/usr/local/bin \
    && /usr/bin/php -r "unlink('composer-setup.php');"

# Configure PHP and PHP modules
RUN echo "zend_extension=xdebug.so" >> /etc/php84/conf.d/50_xdebug.ini \
    && echo "xdebug.mode=coverage" >> /etc/php84/conf.d/50_xdebug.ini \
    && echo "apc.enable_cli=1" >> /etc/php84/conf.d/apcu.ini

WORKDIR /app