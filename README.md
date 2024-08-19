
# 7eminar-app API

## Overview

This API provides endpoints for authentication, task management, orders, and product operations.

## Requirements

- **PHP 8.3**: Ensure you have PHP 8.3 installed.
- **Laravel 11**: This application is built using Laravel 11.
- **SQLite**: The application uses SQLite as its database.

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-repo/7eminar-app.git
    cd 7eminar-app
    ```

2. Install the dependencies using Composer:
    ```bash
    composer install
    ```

3. Create a copy of the `.env` file:
    ```bash
    cp .env.example .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Configure your `.env` file for SQLite:
    ```dotenv
    DB_CONNECTION=sqlite
    DB_DATABASE=/path_to_your_database/database.sqlite
    ```

6. Run the database migrations:
    ```bash
    php artisan migrate
    ```

7. Seed the database with test data (if available):
    ```bash
    php artisan db:seed
    ```

8. Start the development server:
    ```bash
    php artisan serve
    ```

9. Your application should now be running at `http://127.0.0.1:8000`.

## Endpoints

### Authentication
- **POST /user/login**: Authenticates a user with email and password.
- **POST /user/logout**: Logs out the authenticated user.

### Tasks
- **GET /tasks**: Retrieves a list of tasks.
- **GET /tasks/{id}**: Retrieves details of a specific task.
- **POST /tasks**: Creates a new task.
- **POST /tasks/{id}**: Updates an existing task.
- **DELETE /tasks/{id}**: Deletes a task.

### Orders
- **GET /orders/last**: Retrieves the most recent order.

### Products
- **GET /products/popular**: Retrieves a list of popular products.

## Notes
- All endpoints require Bearer token authentication.
- Responses are in JSON format.
