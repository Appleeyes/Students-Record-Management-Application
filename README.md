# Students Management Application

The Students Management Application is a web-based system designed to facilitate the management of student records and classrooms. It allows users to store and organize student information within specific classrooms, perform administrative tasks, and generate student reports.

## Features

- **User Authentication:** The application provides user registration, login, and logout functionality. Only registered and logged-in users can access administrative features.
- **Homepage and Reports:** Users who are not logged in can access the homepage. Clicking the "Check Students Report" button redirects them to the report page, where they can view student information for a selected classroom.
- **Administration:** Logged-in users can access the administration page, where they can perform various administrative tasks, including adding, deleting, and updating classrooms and students.
- **Data Consistency:** When a classroom is deleted or updated, the associated students within that classroom are also deleted or updated, ensuring data consistency.
- **Input Validations:** All forms in the application have input validations, ensuring that the required fields are properly filled. Error messages are displayed when form validation fails.
- **Database System:** The application uses a MySQL database to store and manage student and classroom information.
- **Technology Stack:** The application is built using PHP, Bootstrap, and the Lib library. The index file serves as a router for all the application files.

## Directory Structure

The application follows the following directory structure:
- [Index](index.php)
- [Style](style.css)
- [HtAccess](.htaccess)
- `controllers/`       <!-- Contains files to control the pages -->
    - [Classrooms](./controllers/classrooms.php)
    - [Students](./controllers/students.php)
    - [Users](./controllers/users.php)
- `db/`               <!-- Contains files for database database and db-close -->
    - [Database-open](./db/database.php)
    - [Database-close](./db/db-close.php)
- `functions/`        <!-- Contains a collection of functions used in the application -->
    - [Utils](./functions/utils.php)
- `templates/`        <!-- Contains header, footer, main, and navigation templates for all pages -->
    - [Header](./templates/header.php)
    - [Footer](./templates/footer.php)
    - [Main](./templates/main.php)
    - [Navigation](./templates/navigation.php)
    - `pages/`          <!-- Contains all the individual pages of the application -->
        - [Admin](./templates/pages/admin.php)
        - [Home](./templates/pages/home.php)
        - [Show](./templates/pages/show.php)
        - `classrooms/`
             - [Create](./templates/pages/classrooms/create.php)
             - [List](./templates/pages/classrooms/list.php)
             - [Update](./templates/pages/classrooms/update.php)
        - `students/`
             - [Create](./templates/pages/students/create.php)
             - [List](./templates/pages/students/list.php)
             - [Update](./templates/pages/students/update.php)
        - `users/`
             - [Login](./templates/pages/users/login.php)
             - [Register](./templates/pages/users/register.php)



## Getting Started

To get started with the Students Management Application, follow these steps:

1. Clone the repository to your local machine.
2. Set up a MySQL database and configure the database connection in the appropriate files within the `db/` directory.
3. Host the application on a PHP-enabled web server.
4. Open the application in your web browser and navigate to the homepage.
5. Register an account to gain access to administrative features or log in if you already have an account.
6. Explore the application, manage classrooms and students, and generate student reports.

## Contributing

Contributions to the Students Management Application are welcome! If you encounter any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

This project is licensed under the [APACHE License](license).
