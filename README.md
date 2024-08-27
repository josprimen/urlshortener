# Proyecto Acortador de URLs

## Español

### Descripción

Este proyecto es una aplicación acortadora de URLs construida con Laravel. La aplicación permite a los usuarios acortar URLs largas en URLs más manejables y cortas, que son más fáciles de compartir y recordar. Además, la aplicación genera un código QR para cada URL acortada, permitiendo un acceso rápido mediante escaneo.

### Requisitos

- **PHP 8.2**: La aplicación requiere PHP 8.2 para ejecutarse.
- **Composer**: Un gestor de dependencias para PHP, utilizado para instalar los paquetes necesarios.
- **Laravel 9.x**: Un framework PHP moderno utilizado para desarrollar esta aplicación.
- **Base de Datos**: Se recomienda una base de datos MySQL, pero se puede utilizar cualquier base de datos compatible con Laravel.

### Instalación

Sigue estos pasos para configurar el proyecto localmente:

1. **Clonar el Repositorio**:  
   `git clone https://github.com/yourusername/url-shortener.git`  
   `cd url-shortener`

2. **Instalar Dependencias**:  
   Usa Composer para instalar las dependencias del proyecto.  
   `composer install`

3. **Configurar el Entorno**:
    - Copia el archivo `.env.example` para crear tu archivo `.env`.  
      `cp .env.example .env`
    - Actualiza el archivo `.env` con tus credenciales de la base de datos y otras configuraciones:  
      `DB_CONNECTION=mysql`  
      `DB_HOST=127.0.0.1`  
      `DB_PORT=3306`  
      `DB_DATABASE=nombre_de_tu_base_de_datos`  
      `DB_USERNAME=tu_usuario`  
      `DB_PASSWORD=tu_contraseña`

4. **Generar Clave de la Aplicación**:  
   `php artisan key:generate`

5. **Ejecutar Migraciones**:  
   Migra la base de datos para configurar las tablas necesarias.  
   `php artisan migrate`

6. **Servir la Aplicación**:  
   Inicia el servidor de desarrollo local.  
   `php artisan serve`

7. **Acceder a la Aplicación**:  
   Abre tu navegador y ve a `http://localhost:8000`.

### Pasos Adicionales

- **Cacheo**: Puedes optimizar el rendimiento cacheando las rutas y archivos de configuración.  
  `php artisan config:cache`  
  `php artisan route:cache`

- **Enlace de Almacenamiento**: Si tienes subidas de archivos, asegúrate de crear un enlace simbólico al almacenamiento.  
  `php artisan storage:link`

---

## English

### Description

This project is a URL shortener application built with Laravel. The application allows users to shorten long URLs into more manageable, shorter URLs, which are easier to share and remember. Additionally, the application generates a QR code for each shortened URL, allowing for quick access via scanning.

### Requirements

- **PHP 8.2**: The application requires PHP 8.2 to run.
- **Composer**: A dependency manager for PHP, used to install required packages.
- **Laravel 9.x**: A modern PHP framework used for developing this application.
- **Database**: A MySQL database is recommended but any database supported by Laravel can be used.

### Installation

Follow these steps to set up the project locally:

1. **Clone the Repository**:  
   `git clone https://github.com/yourusername/url-shortener.git`  
   `cd url-shortener`

2. **Install Dependencies**:  
   Use Composer to install the project dependencies.  
   `composer install`

3. **Environment Setup**:
    - Copy the `.env.example` file to create your `.env` file.  
      `cp .env.example .env`
    - Update the `.env` file with your database credentials and other settings:  
      `DB_CONNECTION=mysql`  
      `DB_HOST=127.0.0.1`  
      `DB_PORT=3306`  
      `DB_DATABASE=your_database_name`  
      `DB_USERNAME=your_username`  
      `DB_PASSWORD=your_password`

4. **Generate Application Key**:  
   `php artisan key:generate`

5. **Run Migrations**:  
   Migrate the database to set up the necessary tables.  
   `php artisan migrate`

6. **Serve the Application**:  
   Start the local development server.  
   `php artisan serve`

7. **Access the Application**:  
   Open your browser and go to `http://localhost:8000`.

### Additional Steps

- **Caching**: You can optimize the performance by caching the routes and configuration files.  
  `php artisan config:cache`  
  `php artisan route:cache`

- **Storage Link**: If you have any file uploads, make sure to create a symbolic link to the storage.  
  `php artisan storage:link`
