### Project Managment Application

#### Installation

```
#clone the repository
git clone https://github.com/anandakurathi/project-managament.git

#navigate to appliction
cd project-managament

#install dependencies 
compsoer install

# environment file created when composer install. But, incase needed
cp .env.example .env

#run application
./vendor/bin/sail up -d

# create tes db 
touch database/database-test.sqlite

# database/database.sqlite app DB will be asked to create while migrate run

#run migration & seed 
php artisn migrate
php artisn db:seed

# run test
php artisan test

#browse app
http://localhost:80/

```

Thank You!! :)
