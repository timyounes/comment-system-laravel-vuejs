## About This Project

Simple Comment System Using Laravel and Vuejs

- Submit your comment with your name and comment message is required.
- Can reply to the existing comment up to 3 layers.

## Installation Guide

Cloning project to your local machine
```
git clone https://github.com/timyounes/comment-system-laravel-vuejs.git
```
Or you can download as zip and extract to your preferred directory

Enter in the project directory
```
cd comment-system-laravel-vuejs
```

Install composer and nodejs modules
```
composer install
npm install
```
Rename .env.example to .env and update the specific variables value based on your database set up
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=comments
DB_USERNAME=db_username
DB_PASSWORD=db_password
```

Run the following artisan commands
```
php artisan key:generate
php artisan migrate
```

Compile your project by running
```
npm run dev
```

Start your project running
```
php artisan serve
```
## License

The Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
