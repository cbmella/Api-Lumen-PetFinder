#!/bin/bash

# Reemplaza 'app' con el nombre de tu servicio de aplicación en docker-compose.yml
SERVICE_NAME="app"

# Reemplaza './frontend' con la ruta al directorio donde tienes tu docker-compose.yml
DOCKER_COMPOSE_DIR="."

# Cambia al directorio donde está tu docker-compose.yml
cd "$DOCKER_COMPOSE_DIR"

# Ejecuta el comando en el contenedor con el mismo UID y GID que el usuario del host
docker-compose exec --user "$(id -u):$(id -g)" "$SERVICE_NAME" php artisan "$@"

# Vuelve al directorio original
cd -