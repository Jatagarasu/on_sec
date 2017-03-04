
php composer.phar self-update
php composer.phar update --prefer-stable #--no-dev

php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create

php bin/console generate:doctrine:entities HSDOnSecBundle

php bin/console doctrine:schema:update --force

php bin/console --env=dev cache:clear
php bin/console --env=prod cache:clear

php bin/console assets:install web --symlink --relative

#php bin/console --env=dev assetic:watch
#php bin/console --env=prod assetic:watch
