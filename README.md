# Project Setup Instructions

Follow the steps below to set up and run the project locally:

## Step 1: Update Database Connection
1. Open the `.env` file in the project root.
2. Locate the database configuration section and update the values:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

## Step 2: Run Migrations
Run the following command to apply the database migrations:
```sh
php artisan migrate
```

## Step 3: Start the Project
To start the Laravel development server, run:
```sh
php artisan serve
```
This will start the project at `http://127.0.0.1:8000/`.

## Additional Notes
- Ensure you have PHP, Composer, and MySQL installed on your system.
- If you encounter permission issues, try running `php artisan migrate --force`.
- Use `php artisan migrate:refresh` if you need to reset the database.
- You can stop the server anytime by pressing `Ctrl + C` in the terminal.

Happy coding!

