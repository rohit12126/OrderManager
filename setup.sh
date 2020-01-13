echo $PWD
if [ -z $1 ] 
then
	echo "Pass the working directory of the project"
else
	if [ $PWD != $1 ]
	then
		cd $1
	fi

	composer install
	npm install
	cp .env.example .env
	php artisan project:setup 
	php artisan config:cache
	php artisan migrate:install 
	php artisan migrate:fresh
	php artisan db:seed

fi




