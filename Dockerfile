# Use the official Nginx image as the base image
FROM nginx:latest

# Install PHP 8 and necessary extensions
RUN apt-get update && \
    apt-get install -y \
    php8.0-fpm \
    php8.0-mysql \
    php8.0-cli \
    php8.0-mbstring \
    php8.0-xml \
    php8.0-curl \
    && rm -rf /var/lib/apt/lists/*

# Configure Nginx to use PHP
COPY nginx.conf /etc/nginx/nginx.conf

# Expose ports for HTTP and HTTPS
EXPOSE 80
EXPOSE 443

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "service php8.0-fpm start && nginx -g 'daemon off;'"]
