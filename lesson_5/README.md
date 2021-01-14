## Run Laravel using Laradock


```bash
git clone https://github.com/laravel/laravel.git
cp .env.example .env
```

Edit `.env` file and update line `DB_HOST=` to `DB_HOST=mysql`

```bash
git clone https://github.com/Laradock/laradock.git
cd laradock
cp env-example .env
```

Edit `.env` file and update line `APP_CODE_PATH_HOST=` to `APP_CODE_PATH_HOST=../laravel/`

```bash
docker-compose up -d nginx mysql phpmyadmin workspace
```

Remember to update your `.env` file content

```bash
docker-compose exec workspace bash
composer install
php artisan key:generate
```

Open your browser at `http://localhost` or `http://127.0.0.1` if you want
