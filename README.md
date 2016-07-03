This is a test task
========================

1) update Composer `composer install`  
2) create app/config/parameters.yml with db settings  
3) create database `php bin/console doctrine:database:create`  
4) update db schema `php bin/console doctrine:schema:update --force`  
5) load fixtures `php bin/console doctrine:fixtures:load`  


--------------
all requests returns in json with content-type: application/json  

GET /car/ - list all items  
GET /car/{id} - get item with some id  
POST /car/ - create new item, brand and model should be passed as POST values  
PUT /car/{id} - update item with some id, brand and model should be passed as POST values  
DELETE /car/{id} - delete item with some id  

if item is not found - 404 response code returns  
