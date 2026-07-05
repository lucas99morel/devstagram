# Devstagram

Red social para desarrolladores: publicá posts con imágenes, dale like y comentá el trabajo de otros devs, y seguí a la comunidad.

> Proyecto académico realizado como parte del curso **"Laravel - Crea Aplicaciones y Sitios Web con PHP y MVC"** (Udemy).

## Stack

- **Backend:** Laravel 12 (PHP 8.2+)
- **Frontend:** Livewire 4, Tailwind CSS 4 (vía plugin de Vite)
- **Base de datos:** MySQL
- **Imágenes:** Intervention Image (procesamiento), Dropzone (subida)
- **Build de assets:** Vite 7

## Requisitos previos

- PHP >= 8.2
- Composer
- Node.js y npm
- MySQL/MariaDB

> **Nota:** los comandos de este README están pensados para **Windows CMD**. Si usás PowerShell o una terminal Unix (Mac/Linux), algunos comandos (como copiar archivos) pueden variar.

## Instalación

1. Cloná el repositorio
```cmd
git clone https://github.com/lucas99morel/devstagram.git
cd devstagram
```

2. Instalá dependencias de PHP
```cmd
composer install
```

3. Instalá dependencias de Node
```cmd
npm install
```

4. Configurá el entorno

   Copiá el archivo de ejemplo y generá la key de la aplicación:
```cmd
copy .env.example .env
php artisan key:generate
```

   Editá las variables `DB_*` en `.env` con tus credenciales de MySQL y creá la base de datos manualmente antes de migrar.

5. Corré las migraciones

   Esto crea las tablas `users`, `posts`, `comentarios`, `likes` y `followers`:
```cmd
php artisan migrate
```

6. Compilá los assets (CSS/JS)
```cmd
npm run build
```

7. Levantá la aplicación

   En dos terminales separadas:
```cmd
php artisan serve
```
```cmd
npm run dev
```

8. Abrí el navegador en `http://localhost:8000`

## Funcionalidades

- Registro e inicio de sesión (auth propia, sin Breeze/Jetstream)
- Feed principal con los posts de los usuarios seguidos
- Publicación de posts con imagen (Dropzone + Intervention Image)
- Likes y comentarios en posts
- Sistema de seguidores (follow/unfollow)
- Perfil público por usuario (`/{username}`) con foto editable
- Buscador de usuarios