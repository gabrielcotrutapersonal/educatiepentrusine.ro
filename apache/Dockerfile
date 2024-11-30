FROM php:8.1-apache

# Enable required PHP extensions
RUN docker-php-ext-install mysqli

# Enable Apache modules
RUN a2enmod rewrite ssl

# Install necessary utilities
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    openssl \
    && rm -rf /var/lib/apt/lists/*

# Generate self-signed SSL certificates
RUN mkdir -p /etc/ssl/certs /etc/ssl/private && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/ssl-cert-snakeoil.key \
    -out /etc/ssl/certs/ssl-cert-snakeoil.pem \
    -subj "/C=US/ST=State/L=City/O=Organization/OU=Unit/CN=localhost"

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www/html

# Copy application code
COPY ./src /var/www/html

# Check if composer.json exists
RUN if [ ! -f "composer.json" ]; then \
    echo "Error: composer.json not found in /var/www/html"; \
    exit 1; \
fi

# Install dependencies
RUN composer install --no-dev --optimize-autoloader || { echo "Composer failed!"; exit 1; }

# Ensure the vendor directory exists
RUN if [ ! -d "vendor" ]; then \
    echo "Error: Vendor directory not found after Composer install"; \
    exit 1; \
fi

# Copy Apache VirtualHost configuration
COPY ./apache/vhost.conf /etc/apache2/sites-available/000-default.conf