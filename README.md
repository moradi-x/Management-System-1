# User Management System (PHP CRUD + Admin Panel)

A simple PHP user management system with:
- Login system with password hashing
- Admin panel for managing all users
- Edit, delete, and search users (CRUD)
- Profile image upload
- Automatic database creation using PDO & MySQL
- Session-based error handling and authentication
-  This project is intentionally built without MVC architecture or OOP classes


---

## Features

### User Features
- Login with hashed password
- Profile page
- Upload and update profile image
- Secure session authentication

### Admin Features
- Search users by email
- Edit user information (username, email, age, password, image)
- Delete users
- View all users in a table
- Auto-remove old profile image on update
- Email duplication validation

---

## Project Structure

```
├── Admin
│   ├── admin_serch.php
│   ├── admin.php
│   ├── delete_admin.php
│   ├── edit_admin.php
│   ├── see_admin.php
│   └── update_admin.php
├── image_users
├── model_crud
│   ├── check.php
│   ├── database.php
│   ├── delete.php
│   ├── insert.php
│   ├── select.php
│   ├── table.php
│   └── update.php
├── public
│   ├── edit_profile.php
│   ├── login.php
│   ├── profile_login.php
│   ├── profile_update.php
│   ├── profile.php
│   └── Register.php
└── style
    └── style.css
```

## Database

The database is created automatically on the first run.

**Database:** System_Users  
**Table:** users  

Columns:
- Id  
- UserName  
- Email  
- Password  
- Age  
- Image  

---

## Installation

1. Download or clone the project  
2. Put it inside `htdocs` (XAMPP) or `www` (WAMP)  
3. Start Apache & MySQL  
4. Open in browser:

```http://localhost/your-project/public/LogIn.php```

Database will be created automatically

or

If you don't want to use XAMPP/WAMP, you can run the project using PHP's built-in development server:Then open in your browser:
``http://localhost:8000/LogIn.php``


```
php -S localhost:8000 
```

---

## Admin Login

Default admin usernames (hard-coded):


mmdmoradi
saramoradi


Logging in with one of these redirects to the admin panel.

---

## Image Upload

- Only JPG format allowed  
- Image names are hashed using `md5(time())`  
- Old profile image is deleted after updating  

---

## Requirements

- PHP 7.4+
- MySQL
- XAMPP / WAMP / Laragon
- PDO enabled

---

## License

Free to use and modify for learning purposes.
