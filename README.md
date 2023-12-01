# Portafolio 💻

## Introducción 🗣️

This project is based on the laravel.

This repository contains an installation configuration for using Docker to create a development environment.

#### Main packages:

_Backend_:
- php 8.2
- Laravel 10
- [Livewire v3](https://github.com/livewire/livewire)
- [Laravel Jetstream v4](https://jetstream.laravel.com/introduction.html)

_Frontend_:

-   Alpine
-   [Tailwindcss v3](https://tailwindcss.com/docs/width)
-   [Flowbite](https://flowbite.com/)

---

# INSTALLATION

Before installation, the following requirements must be met:

-   docker
-   docker compose
-   liberar puerto 80

### Preparacion

Clone the repository

    git clone git@github.com:jjanampa/portafolio.git

Switch to the repository folder

    cd portafolio

Ignore permission changes

```
git config core.fileMode false
```

### Raise project (with Docker, port 80 must be free)

Copy Configuration
```shell
cp .env.example .env
```

Build frontend
```shell
npm install && npm run build
```

**With Docker**

Build and run Docker containers
```shell
docker compose up -d --build
```
    
Start Application

```shell
docker compose exec app sh -c 'composer install'
docker compose exec app sh -c 'php artisan key:generate && php artisan migrate && php artisan db:seed'
```

**Without Docker**

- Configure
  - Install php 8.2
  - Install apache
  - Install mysql 8
  - Create database in mysql 
  - In .env config access database

- Install dependencies
  ```
    composer install
  ```
  
- Migrate
  ```
    php artisan migrate
  ```

The Application starts at http://localhost/

## _Nota_:

It may be the case that after downloading changes made by another programmer you have to execute some or all of the following commands:

-   Update configuration:

```shell
cp .env.example .env
```

-   Update php dependencies:

```shell
docker compose exec app sh -c 'composer update'
```

-   Update database (migration):

```shell
docker compose exec app sh -c 'php artisan migrate'
```

-   Update javascript dependencies:

```shell
npm install
```

-   Apply javascript changes:

```shell
npm run build
```

### commands for docker

-   Start services and docker containers:

```shell
docker compose up -d
```

-   Stop running containers:

```shell
docker compose stop
```

-   Update changes in docker(rebuild):

```shell
docker compose stop && docker compose up -d --build
```

Resource accesses are obtained from docker-compose.yml

-   phpmyadmin : (http://localhost:8080)
