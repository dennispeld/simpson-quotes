## Simpson Quotes

A program *simpson-quotes* is an API, that retrieves quotes of famous Simpsons characters.

# Setup

Clone the repository and navigate to the root folder.

Build images and run docker containers using the command

`docker-compose up -d`

When its done, you should see 3 containers up and running:

`docker ps`

simpson-quotes-php  
simpson-quotes-nginx  
simpson-quotes-mysql  

Now, you need to run migrations and seeders to populate the database.  
For that, run this command, which will enter the php container:

`docker exec -it simpson-quotes-php sh`

Now, you can run the migrations and seeds:

`php artisan migrate:fresh --seed`

When its over, `exit` the contaner.

I would suggest to use Postman to test the API. The application is running in nginx container with port 8080.

### See all users
Method: GET  
Url: `http://localhost:8080/api/users`

### See all quotes of the user with the id 3
Method: GET  
Url: `http://localhost:8080/api/user/3/quotes`

### Add a new quote for the user with the id 1
Method: POST  
Url: `http://localhost:8080/api/user/quote`  
Body (raw) - JSON: 
```
{
    "user_id": 1,
    "quotation": "Oopsie"
}
```

### Update the details of the user with the id 5
Method: PUT  
Url: `http://localhost:8080/api/user/5`  
Body (raw) - JSON:
```
{
    "username": "abu.junior",
    "firstname": "Abu",
    "surname": "Junior",
    "address": "Supermarket 1 Springfield"
}
```

# Testing

To run the test, enter the php container once again,

`docker exec -it simpson-quotes-php sh`

and now just run the command

`composer test`

### PHPMD
Additionally, I have used PHPMD script to detect code mistakes.

Go to `src` folder in the terminal and run this command

`vendor/bin/phpmd app html ruleset.xml cleancode,codesize,controversial,design,naming,unusedcode > phpmd.html`

This will generate `phpmd.html` file with the report.

### PHPCS
Additionally, I have used PHPCS to validate my code against PSR12 coding standards.

`phpcs --standard=PSR12 .\app\`


## Credits
**Author**: Dennis Peld  
**Date**: 05.06.2021  
**Tools**: Visual Studio Code, Docker.  
**Programming language**: PHP using Laravel framework.