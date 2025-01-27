# Task Management API

This project is a Laravel-based API for managing tasks. It provides endpoints for creating, reading, updating, and deleting tasks.

## Features
- Retrieve all tasks.
- Create a new task.
- View a specific task.
- Update an existing task.
- Delete a task.

## Prerequisites
1. **XAMPP** or any other local server environment.
2. **Composer** installed.
3. **PHP 8.0+**.
4. **Laravel Framework** installed.

## Installation Steps
1. Clone the repository: ```git clone https://github.com/aalasolutions/laravel-test ```

2. Create New Laravel Project:
    ``` laravel new TalhaFarooq-laravel-test```

3. Navigate to the project directory:
   ``` cd TalhaFarooq-laravel-test ```

4. Configure the database in the `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_name
   DB_USERNAME=user_name
   DB_PASSWORD=password
   ```

5. Make new task name migrations with model:
   ```php artisan make:model -m ```


6. Run database migrations:
   ```bash php artisan migrate ```


7. Make new task name controller:
   ```php artisan make:controller API/TaskController ```


8. Start the development server with command:
   ```php artisan serve ```

## Endpoints

### 1. Get All Tasks
- **URL:** `/api/tasks`
- **Method:** GET
- **Response:**
  ```json
  {
      "statusCode": 200,
      "data": [
          {
              "id": 1,
              "title": "Task 1",
              "description": "lorem ipsum",
              "status": "pending",
              "user_id": 3,
              "created_at": "2025-01-27T15:25:24.000000Z",
              "updated_at": "2025-01-27T15:25:24.000000Z"
          },
          {
              "id": 2,
              "title": "Task 2",
              "description": "lorem ipsum 2 description",
              "status": "pending",
              "user_id": 3,
              "created_at": "2025-01-27T15:25:24.000000Z",
              "updated_at": "2025-01-27T15:25:24.000000Z"
          }
      ],
      "message": "Tasks retrieved successfully!"
  }
  ```

### 2. Create a Task
- **URL:** `/api/tasks`
- **Method:** POST
- **Request Body:**
  ```json
  {
      "title": "New Task",
      "description": "Task description",
      "status": "pending"
  }
  ```
- **Response:**
  ```json
  {
      "statusCode": 201,
      "message": "Task created successfully!",
      "data": {
          "id": 2,
          "title": "New Task",
          "description": "Task description",
          "status": "pending",
          "user_id": 3,
          "created_at": "2025-01-27T15:30:00.000000Z",
          "updated_at": "2025-01-27T15:30:00.000000Z"
      }
  }
  ```

### 3. Get a Specific Task
- **URL:** `/api/tasks/{id}`
- **Method:** GET
- **Response:**
  ```json
  {
      "statusCode": 200,
      "data": {
          "id": 1,
          "title": "Task 1",
          "description": "lorem ipsum",
          "status": "pending",
          "user_id": 3,
          "created_at": "2025-01-27T15:25:24.000000Z",
          "updated_at": "2025-01-27T15:25:24.000000Z"
      },
      "message": "Task retrieved successfully!"
  }
  ```

### 4. Update a Task
- **URL:** `/api/tasks/{id}`
- **Method:** PUT
- **Request Body:**
  ```json
  {
      "title": "Updated Task",
      "description": "Updated description",
      "status": "completed"
  }
  ```
- **Response:**
  ```json
  {
      "statusCode": 200,
      "message": "Task updated successfully!",
      "data": {
          "id": 1,
          "title": "Updated Task",
          "description": "Updated description",
          "status": "completed",
          "user_id": 3,
          "created_at": "2025-01-27T15:25:24.000000Z",
          "updated_at": "2025-01-27T15:40:00.000000Z"
      }
  }
  ```

### 5. Delete a Task
- **URL:** `/api/tasks/{id}`
- **Method:** DELETE
- **Response:**
  ```json
  {
      "statusCode": 200,
      "message": "Task deleted successfully!"
  }
  ```

## Repository Pattern
This project uses the **Repository Pattern** for better code organization and separation of concerns. The `TaskRepositoryInterface` defines the methods, and the concrete implementation handles the database logic.

## Troubleshooting
1. If you face a `file_put_contents()` error, ensure proper permissions for `storage` and `bootstrap/cache` directories:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

2. Check the Laravel logs in `storage/logs/laravel.log` for detailed error messages.

3. If using `php artisan serve`, ensure no other application is using port `8000`. You can specify another port:
   ```bash
   php artisan serve --port=8080
   ```

## Author
**Talha Farooq**