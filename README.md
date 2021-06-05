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

Now you can use your browser to make API calls. The application is running in nginx container with port 8080.

In your browser, navigate to 

`http://localhost:8080/api/users` to see all users
`http://localhost:8080/api/user/3` to see all quotes of a user with the id 3