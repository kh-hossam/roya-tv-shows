
---

# SHOW.TV

SHOW.TV is a web application that allows users to watch series and TV shows. Each series or TV show can have multiple episodes.

## Requirements

- PHP 8.2

- Composer

- MySQL 8

- Node.js & npm (for frontend assets)

## Used Technologies

- Laravel 11

- MySQL 8

- Filament 3 (for creating admin panel)

- Laravel/UI (for creating authentication scaffolding with Bootstrap)

## Getting Started

Follow these steps to get the project up and running:

### Clone the Repository

```sh

git clone https://github.com/kh-hossam/roya-tv-shows.git

cd roya-tv-shows

```

### Install Dependencies

```sh

composer install

npm install

npm run dev

```

### Create Database

Create a new MySQL database for the project. For example:

```sql

CREATE DATABASE roya_tv_shows;

```

### Configure Environment Variables

Copy the example environment file and modify it with your database information:

```sh

cp .env.example .env

```

Open the `.env` file and update the following lines with your database information:

```env

DB_DATABASE=roya_tv_shows

DB_USERNAME=your_database_username

DB_PASSWORD=your_database_password

```

### Generate Application Key

```sh

php artisan key:generate

```

### Run Migrations and Seed Database

Run the database migrations and seed the database with initial data:

```sh

php artisan migrate --seed

```

This will create the database structure and seed it with 10 series, each having 20 episodes.

### Optimize Filament Admin Panel Performance

Run the following command to optimize Filament admin panel performance:

```sh

php artisan icons:cache

```

## Accessing the Application

### Admin Panel

You can access the admin panel through the following URL:

[http://localhost:8000/admin](http://localhost:8000/admin)

Use the following credentials to log in:

- **Username:** admin@admin.com

- **Password:** password

### Website

You can access the main website through the following URL:

[http://localhost:8000](http://localhost:8000)

## Features

### Website

- List latest series on the homepage

- View series and their related episodes

- Follow/unfollow series

- Like/dislike episodes

### Admin Panel

- Create, edit, and delete series

- Create, edit, and delete episodes

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---
