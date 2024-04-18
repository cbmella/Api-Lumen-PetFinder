#!/bin/sh

# Iniciar PHP-FPM en segundo plano
php-fpm &

# Iniciar Nginx en primer plano
nginx -g "daemon off;"