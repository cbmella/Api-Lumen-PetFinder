#!/bin/bash

# docker-artisan: Un script para ejecutar comandos artisan con el usuario actual

# Reemplaza 'app' con el nombre de tu servicio de aplicación en docker-compose.yml
SERVICE_NAME="app"

# Reemplaza './frontend' con la ruta al directorio donde tienes tu docker-compose.yml
DOCKER_COMPOSE_DIR="."

# Cambia al directorio donde está tu docker-compose.yml
cd "$DOCKER_COMPOSE_DIR"

# Ejecuta el comando en el contenedor sin especificar el usuario
docker-compose exec $SERVICE_NAME php artisan swagger-lume:generate

# Vuelve al directorio original
cd -