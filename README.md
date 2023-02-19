### Installation

 1. Clone this project\
 <!-- `git clone https://git@github.com:repodigithub/Samanea-BE.git` -->
 2. Cd into your project folder\
 `cd pembayaran-spp`
 3. Run all the build images in docker\
 `docker-compose up -d --build`
 3. Install dependencies\
 `composer install --no-dev`\
 Or if you want continue developing this project\
 `docker-compose run --rm composer install`
 4. Copy env file\
 `cp .env.example .env`
 5. Setup your database via .env file \
 `.env`
 6. Migrate database\
 `docker-compose run --rm artisan migrate`
 7. (Optional) Seed the database\
 `php artisan db:seed`
 8. Create key\
 `php artisan key:generate`
 ## Serve
 `php artisan serve`
 
