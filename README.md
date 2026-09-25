# Task Manager

A simple web-based Task Manager built using Laravel and MySQL.

## About the Project

The Task Manager allows users to create, view, update, and delete tasks.

Each task contains:

- Task Name
- Description
- Status
- Due Date

The system uses Laravel's MVC structure to manage the application.

## Features

- Add new tasks
- View all tasks
- Edit existing tasks
- Delete tasks
- Set task status
- Set a due date
- Success messages after actions
- Responsive user interface

## Task Status

The system supports two task statuses:

- Pending
- Completed

## Technologies Used

- Laravel
- PHP
- MySQL
- Blade
- HTML
- CSS
- Git
- GitHub

## Project Structure

```text
task_manager/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── TaskController.php
│   │
│   └── Models/
│       └── Task.php
│
├── database/
│   └── migrations/
│       └── create_tasks_table.php
│
├── resources/
│   └── views/
│       └── tasks/
│           ├── index.blade.php
│           ├── create.blade.php
│           └── edit.blade.php
│
├── routes/
│   └── web.php
│
└── README.md