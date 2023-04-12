<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
<h1 align="center">A simple project for a thesis (Fiverr)</h1>

A small bank simulation project.

Features:
- Registration
- Money transfer from one user to another.


## Quick Installation

    git clone https://github.com/vitaliitsarov/simple-fiverr.git

    cd SD_Project/
    
### Composer
    
    composer install
    
    composer update
    
    
### For Environment Variable Create
 
    cp .env.example .env
 
### Editing .env
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=YOUR_DATABASE
    DB_USERNAME=YOUR_USERNAME
    DB_PASSWORD=YOUR_PASSWORDD

 ### For Migration table in database
 
    php artisan migrate
