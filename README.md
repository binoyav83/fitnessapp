Set database connection details in .env (Im using mysql)
Add below code in .env and set the db 

DB_SECOND_CONNECTION=mongodb
# DB_SECOND_URI=mongodb://127.0.0.1:27017/fitness
DB_SECOND_HOST=127.0.0.1
DB_SECOND_PORT=27017
DB_SECOND_DATABASE=fitness
DB_SECOND_USERNAME=
DB_SECOND_PASSWORD=
DB_SECOND_AUTH_SOURCE=

My APP_URL is http://fitness.local  (If different use the new one in api call)

composer install

php artisan migrate:refresh --seed

If any error is creating the collection and seeds for mongodb, create a mongodb database and collection named 'steps' and import the fitness.steps.json file