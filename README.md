RehatSkeleton
=============

# How To Install

* git clone git@github.com:ihsanudin/RehatSkeleton.git

* cd RehatSkeleton

* composer update --prefer-dist -vvv

* php bin/console doctrine:database:create

* php bin/console doctrine:schema:update --force

* php bin/console server:run

* Open Postman Google Chrome Extension

* Open `localhost:8000/api/groups` for group example

* Open `localhost:8000/api/contacts` for contact example
