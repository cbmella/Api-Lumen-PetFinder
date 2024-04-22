@echo off
setlocal

REM Reemplaza 'app' con el nombre de tu servicio de aplicación en docker-compose.yml
set SERVICE_NAME=app

REM Reemplaza './frontend' con la ruta al directorio donde tienes tu docker-compose.yml
set DOCKER_COMPOSE_DIR=.

REM Cambia al directorio donde está tu docker-compose.yml
cd %DOCKER_COMPOSE_DIR% || exit

REM Pregunta qué comando deseas ejecutar
set /p comando="¿Qué quieres ejecutar? (1-doc/2-artisan), ingresa op 1 o 2: "

REM Ejecuta el archivo correspondiente
if "%comando%"=="1" (
    call doc.bat
) else if "%comando%"=="2" (
    set /p artisan_comando="Ingresa el comando de Artisan: "
    call artisan.bat %artisan_comando%
) else (
    echo Opción inválida.
)

REM Vuelve al directorio original
cd -

endlocal
