## Installation

Requirements:

    PHP >= 7.1.3
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension
    Ctype PHP Extension
    JSON PHP Extension


Laravel 5.6

1. create your .env (copy .env.example) file in the root and then a database in mysql (matching your .env database record)
2. composer install
3. npm install
4. php artisan migrate

No need for an SQL dump with the migrations.  To create a new user navigate to /profile