Rename .env.example to .env<br>
Place the database credentails in the .env file<br>
First run "php artisan migrate" to get database changes<br>
Run "php artisan db:seed --class=UserSeeder" for user data<br>
there are 2 routes <br>
1. /user/id for getting user profile <br>
2. /user POST method to add the comments. (id , comments and password are needed).<br>
sample json : { "id": 1, "comments" : "Test","password" : "720DF6C2482218518FA20FDC52D4DED7ECC043AB"}<br>
Run "php artisan add:user-comment {userId} {comment}", place userId and comment for adding comments to user