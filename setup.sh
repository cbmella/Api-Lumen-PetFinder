#!/bin/bash

# Reemplaza 'app' con el nombre de tu servicio de aplicación en docker-compose.yml
SERVICE_NAME="app"

# Reemplaza './frontend' con la ruta al directorio donde tienes tu docker-compose.yml
DOCKER_COMPOSE_DIR="."

# Cambia al directorio donde está tu docker-compose.yml
cd "$DOCKER_COMPOSE_DIR" || exit

# Pregunta qué comando deseas ejecutar
read -p "¿Qué quieres ejecutar? (1-doc/2-artisan), ingresa op 1 o 2: " comando

# Ejecuta el archivo correspondiente
if [ "$comando" = "1" ]; then
    sh doc.sh
elif [ "$comando" = "2" ]; then
    read -p "Ingresa el comando de Artisan: " artisan_comando
    sh artisan.sh $artisan_comando
else
    echo "Opción inválida."
fi

# Vuelve al directorio original
cd -