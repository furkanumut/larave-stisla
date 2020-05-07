## Installation
Clone the repo:
```shell
git clone https://github.com/furkanumut/larave-stisla.git
```

Install composer packages:
```shell
composer update
```


Install npm packages:
```shell
npm install
```

Copy and rename .env.example to .env, update the environmental variables and set an app key:
```shell
php artisan key:generate
```

After that, run all migrations and seed the database:
```shell
php artisan migrate --seed
```
Note that seeding the database is compulsory as it will create the necessary roles and permissions for the user CRUD provided by the project.

Visit <div style="display: inline">http://yoursite.com/login</div> to sign in using below credentials:

#### Demo Super Admin Login
*  Email: admin@example.com
*  Password: 12345678

#### Demo Admin Login
*  Email: user@example.com
*  Password: 12345678


### Credits:
*   [Laravel](https://github.com/laravel/laravel)
*   [Stisla Bootstrap 4 Admin Panel Template](https://github.com/stisla/stisla)
*   [Spatie Laravel Roles and Permissions](https://github.com/spatie/laravel-permission)