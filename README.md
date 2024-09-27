**Set up**
1. I installed Slim 4 from https://www.slimframework.com/docs/v4/ via composer on the command line
2. I'm using a Windows laptop, Apache 24, MySQL 8, and PHP 8
3. I created the following directories/files:
   a. config/database.php - holds my database connection parameters
   b. routes/loyalty/v1/routes.php - where my routes are defined 
   c. src/controllers/loyalty/V1/UserController.php - where the user code that a route is built/called from
   d. src/models/loyalty/V1/DatabseModel.php - where the DB connection functions are built/called from in the Controllers
   e. src/models/loyalty/V1/UserModel.php - where the DB/SQL user functions are built/called from in the Controllers
   f. tests/createUserTest.php - allows you to test the create user API (just change the parameters on line 6 and run the file with PHP)
   g. test/deleteuserTest.php - allows you to test delete user API (just change the user ID on line 3 and run the file with PHP)
   h. (a couple of .htaccess files etc)
4. Created my MySQL database with SQL
5. Created my MySQL tables with SQL 
6. Created a user with SQL for my code to use
7. Set up Apache for local host and my DocRoot to point to my Slim code

**General Code Process/Flow**
1. public index.php loads all the routes
2. routes call the control functions listed in the route
3. controller functions invoke database functions
4. database functions executed by connection created in databse model with config parameters
5. controllers return json strings back to CLI/Browser
   
**Testing deleting a user from the CLI**
![image](https://github.com/user-attachments/assets/2908b9a9-4ef1-4d66-98b7-9f0e8ca21282)

**Testing viewing all users from browser**
![image](https://github.com/user-attachments/assets/5b391c88-1885-42a4-a454-17472ada3fea)

**Suggestions for improvement/change**
1. Comments peppered throughout code
2. Logging errors and using try catch statements
3. Authorization/authentication (e.g. for deletes)
4. Singleton for DB connection
5. Using DI for Slim 4



