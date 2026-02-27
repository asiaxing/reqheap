FROM docker.m.daocloud.io/library/php:7.4-apache

# Install required PHP extensions and MySQL client
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get update && apt-get install -y default-mysql-client && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Set permissions (ignore non-existent directories)
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/ \
    && chmod -R 777 /var/www/html/img/ 2>/dev/null || true \
    && chmod -R 777 /var/www/html/ini/ 2>/dev/null || true \
    && chmod -R 777 /var/www/html/ini/lng/ 2>/dev/null || true \
    && chmod -R 777 /var/www/html/ini/txts/ 2>/dev/null || true \
    && chmod -R 777 /var/www/html/admin/ 2>/dev/null || true \
    && chmod -R 777 /var/www/html/FCKeditor/ 2>/dev/null || true \
    && chmod -R 777 /var/www/html/install/ 2>/dev/null || true \
    && chmod +x /var/www/html/docker-entrypoint.sh 2>/dev/null || true

# Copy custom entrypoint
COPY docker-entrypoint.sh /usr/local/bin/

# Expose port 80
EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
