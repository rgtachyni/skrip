r:
	echo "Update Migration"
	composer dump-autoload
	php artisan migrate:reset
	php artisan migrate
	php artisan db:seed

run:
	echo "Update Swagger Docs"

swag:
	echo "Create Swagger files"
