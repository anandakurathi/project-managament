### Project Managment Application


Requirements:

Backend (Laravel):

Set up a RESTful API using Laravel to manage projects and tasks.
Each project should have at least: name, description, start_date, end_date.
Each task should have at least the following: title, description, due_date, priority (e.g., low, medium, high), and status (e.g., pending, completed).
Implement routes for creating, retrieving, updating, and deleting projects and tasks.
Store data in an SQLite database. Use migrations for setting up the database schema.

Implement authentication and authorization.
Users should be able to register, log in, and log out.
Protect the project and task routes to ensure only authenticated users can access them.
Implement role-based access control (e.g., normal users vs. admin users). Admin users should be able to manage all projects and tasks, while normal users can only manage their own.
Use middleware to handle API versioning.
Write tests for your API endpoints using PHPUnit.


Plan:
~~Laravel with Sqlite DB application~~

~~Laravel 11~~
user autherisation / authentication let use sanctum for this
~~users should has roles (admin, common user)~~
Admin users should be able to view and manage all projects and tasks.

projects
~~name, description, start_date, end_date (should be equal or greater)~~
CRUD with filters

tasks
~~title, description, due_date, priority (e.g., low, medium, high), and status (e.g., pending, in-progress, completed).~~
CRUD with filters

~~Versioning of API's with middleware~~

Handle potential errors gracefully.
