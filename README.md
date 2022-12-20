<b>Add User App</b>

<b>Description:</b>

The goal of the task is to create a simple page with a form to collect data from a user
(email, full name, gender, and status) and to send it via a POST request.

Important: this project requires <b>PHP 8.1+</b>

Other app's features:
- Add user 
- View all users
- View one user (by ID)
- Edit users' information
- Delete user (by ID)

Tech stack:
HTML, CSS, php, js, json

Data sources:
 - Local database
 - gorest API
 * to pick a data source simply choose the one on the main page of the app and click "Choose" button. By default, Local database is chosen

<b>How to launch the project:</b>

1) Run "composer install"
2) Fill in the .env file with your credentials (example provided in .env_example)
3) To migrate DB to the latest version go to the root directory of the project and run "php commands/migrateDB.php"
        <div>This command accepts arguments to define which version of the DB you want to use: php commands/migrateDB -v{int}
        <div>If you pass no arguments - DB will be updated to the latest version.
        <div>If you pass an argument that is lower than your current version, DB will rollback its version to the passed version.
        <div>If you pass invalid argument (too high or negative), command will throw an error;
4) To seed test data into DB run script "php commands/seedUsers.php"
        <div>This command accepts arguments to define the number of users to seed into the usersTable: <b>php commands/seedUsers.php -c{int}</b>
