Rename .env.example to .env
Place the database credentails in the .env file
Run php artisan db:seed --class=UserSeeder for user data
there are 2 routes 
1. /user/id for getting user profile 
2. /user POST method to add the comments. (id , comments and password are needed).
sample json : { "id": 1, "comments" : "Test","password" : "720DF6C2482218518FA20FDC52D4DED7ECC043AB"}
Run php artisan add:user-comment {userId} {comment}, place userId and comment for adding comments to user