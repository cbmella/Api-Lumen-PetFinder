# 🐾 PetFinder - Plataforma para Mascotas Perdidas y Adopción

PetFinder es una plataforma en línea que permite a los usuarios publicar y buscar información sobre mascotas perdidas o disponibles para adopción. El objetivo principal es facilitar la reunificación de mascotas perdidas con sus dueños y promover la adopción de animales sin hogar.

## 🌟 Características Principales

1. **🙍‍♂️ Registro de usuarios y perfiles**
   - Los usuarios pueden crear cuentas y perfiles personalizados
   - Los perfiles incluyen información de contacto y ubicación

2. **📢 Publicación de mascotas perdidas**
   - Los usuarios pueden crear publicaciones con detalles de la mascota perdida (descripción, fotos, ubicación, etc.)
   - Las publicaciones se pueden compartir en redes sociales para aumentar su visibilidad

3. **🐶 Publicación de mascotas en adopción**
   - Las organizaciones y usuarios pueden crear perfiles de mascotas disponibles para adopción
   - Los perfiles incluyen información detallada sobre la mascota (raza, edad, personalidad, requisitos de adopción, etc.)

4. **🔍 Búsqueda y filtrado**
   - Los usuarios pueden buscar mascotas perdidas o en adopción por ubicación, raza, tamaño, color, etc.
   - Los resultados de búsqueda se pueden ordenar por relevancia o fecha

5. **💬 Sistema de mensajería**
   - Los usuarios pueden comunicarse entre sí a través de un sistema de mensajería integrado
   - Las organizaciones pueden recibir consultas sobre mascotas en adopción

6. **🔔 Notificaciones y alertas**
   - Los usuarios pueden recibir notificaciones sobre mascotas perdidas en su área
   - Las alertas se envían por correo electrónico o notificaciones push

7. **🗺️ Integración de mapas**
   - Las publicaciones de mascotas perdidas y en adopción se muestran en un mapa interactivo
   - Los usuarios pueden ver mascotas cercanas a su ubicación

8. **✅ Sistema de verificación**
   - Las organizaciones de adopción pueden verificar su legitimidad
   - Los usuarios pueden reportar publicaciones sospechosas o fraudulentas

9. **📚 Recursos y educación**
   - La plataforma incluye artículos y recursos sobre el cuidado de mascotas, la prevención de pérdidas y el proceso de adopción
   - Se proporcionan consejos para ayudar a las mascotas perdidas a regresar a casa

10. **💕 Historias de éxito**
    - Los usuarios pueden compartir historias de mascotas perdidas reunidas o adoptadas exitosamente
    - Estas historias inspiran y motivan a otros usuarios

## 🛠️ Tecnologías Utilizadas

- **[React.js](https://reactjs.org/)**: Biblioteca de JavaScript para construir interfaces de usuario interactivas.
- **[Lumen](https://lumen.laravel.com/)**: Un micro-framework PHP ligero y rápido basado en Laravel.
- **[MySQL](https://www.mysql.com/)**: Sistema de gestión de bases de datos relacional.
- **[Nginx](https://www.nginx.com/)**: Servidor web y proxy inverso.
- **Docker**: Para la contenerización y fácil despliegue.
- **Swagger**: Para la documentación interactiva de la API.

## 📂 Repositorio

El código fuente está disponible en [GitHub](https://github.com/tu-usuario/pet-finder).

## 📋 Requisitos

- Node.js y npm para el front-end
- PHP ^8.1 para el back-end
- Docker y Docker Compose para el despliegue

## 🚀 Instalación y Configuración

1. Clonar el repositorio: `git clone https://github.com/tu-usuario/pet-finder.git`.
2. Navegar al directorio del proyecto: `cd pet-finder`.
3. Configurar las variables de entorno en los archivos `.env` para el front-end y el back-end.
4. Ejecutar `docker-compose up -d` para iniciar los contenedores. Esto iniciará los servicios de React, Lumen, MySQL y Nginx.

## 📘 Documentación API

La documentación interactiva de la API generada por Swagger estará disponible en `http://localhost:9002/api/documentation` una vez que hayas iniciado los contenedores. Esta documentación proporciona detalles completos sobre los endpoints disponibles y su uso.

## 🔄 Regeneración de la Documentación de la API

Si realizas cambios en la API que requieran una actualización de la documentación, puedes regenerar la documentación de Swagger de forma automática. Para hacerlo, ejecuta los siguientes comandos:

```bash
# Para regenerar la documentación de Swagger
sh doc.sh

# Para ejecutar comandos de Artisan (por ejemplo, make:migration)
sh artisan.sh make:migration test