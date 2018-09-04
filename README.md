# easy-timer

#short instruction

##init project
docker-compose up
mv .env.example .env
composer update

##rebuild docker images
docker-compose build

##running artisan cli
docker-compose exec app php artisan

##init db structure
docker-compose exec app php artisan migrate

##build frontend ressources
npm i
npm run dev

##call vue app in browser
localhost:18111
