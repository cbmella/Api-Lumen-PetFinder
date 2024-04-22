@echo off
setlocal

REM Reemplaza 'app' con el nombre de tu servicio de aplicación en docker-compose.yml
set SERVICE_NAME=app

REM Reemplaza './frontend' con la ruta al directorio donde tienes tu docker-compose.yml
set DOCKER_COMPOSE_DIR=.

REM Cambia al directorio donde está tu docker-compose.yml
cd %DOCKER_COMPOSE_DIR%

REM Ejecuta el comando en el contenedor sin especificar el usuario
docker-compose exec %SERVICE_NAME% php artisan swagger-lume:generate

REM Vuelve al directorio original
cd -

endlocal
