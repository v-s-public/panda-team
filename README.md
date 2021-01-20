1. Clone repository
2. Run `composer install`
3. Edit `/.env` file: 
    * specify your domain in `APP_DOMAIN` key (for example `APP_DOMAIN=my-app.com`)
    * specify your database settings
4. Run `php artisan migrate`
5. Run `php artisan db:seed`
