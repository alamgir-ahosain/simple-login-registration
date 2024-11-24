
# Simple login and registration in Laravel
A Laravel application that allows users to <b>register</b>, <b>login</b>, <b>logout</b>, and manage tasks in a <b>to-do list</b>. It demonstrates basic authentication and task management features.
## Features
- **Login/Register/Logout**: Secure user authentication.
- **User Profile**:Update user information.
- **To-Do List**: CRUD (Create, Read, Update, Delete) operations for task management.
  
## Installation Guide

### Step 1: Clone the Repository
```bash
https://github.com/alamgir-ahosain/simple-login-registration.git
 ```
### Step 2: Install Dependencies
```
composer install
npm install
npm run dev
 ```

### Step 3: Environment Setup
- Copy the ``` .env.example ``` file and rename it to ``` .env ```
- Generate the application key: ```php artisan key:generate --ansi ```
 
### Step 4: Database Configuration 
 - Update your ```.env``` file with your database credentials:
 ``` DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```
### Step 5: Run the Application
```
php artisan migrate
php artisan serve
 ```

## Usage
1. Register a new account.
2. Log in with your credentials.
3. Manage tasks using the To-Do List feature
- Add a task.
- Edit or delete existing tasks.

## Screenshots
- Home Page
![Screenshot (466)](https://github.com/user-attachments/assets/11dd84e3-3d22-43bc-9c4f-59e400125497)

- Registration Page
  ![Screenshot (465)](https://github.com/user-attachments/assets/f6296448-21f4-4518-b29f-980233c283eb)
  
- Login Page
  ![Screenshot (464)](https://github.com/user-attachments/assets/9b578097-c06d-4666-967a-0766b7b9a885)
  
- User Profile Page
  ![Screenshot (463)](https://github.com/user-attachments/assets/7334e92a-64c0-4743-bc6e-132c4b1a3548)

- To-Do list Page 
![Screenshot (462)](https://github.com/user-attachments/assets/630ab201-9a3e-4458-b5ef-d2a8d347e3ab)


# Thank You for Checking Out This Project!
Your feedback is valuable! Please share your thoughts and suggestions for improvement via [GitHub Issues](https://github.com/alamgir-ahosain/simple-login-registration/issues).

## Acknowledgements
- Thanks to [Laravel Documentation](https://laravel.com/docs) for providing comprehensive guidelines.
- Special thanks to all open-source contributors for their hard work and support.








