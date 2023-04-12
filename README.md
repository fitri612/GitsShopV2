## Installation

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env
    
If get error when cp .env.example .env can try using this 

[env.example](https://github.com/laravel/laravel/blob/master/.env.example) 
rename it to .env and edit it 

Generate a new application key

    php artisan key:generate

Run the database migrations and database seeding (**Set the database connection in .env before migrating**)

    php artisan migrate --seed
    
Create a symbolic link from public/storage to storage/app/public to make files accessible from the web

    php artisan storage:link

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


