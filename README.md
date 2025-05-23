PHP OOP Password Management System
Purpose
This project is a PHP program built with Object-Oriented Programming (OOP) to help securely manage user accounts and passwords. It allows users to sign up and log in, while safely storing passwords in a MySQL database using hashing and encryption.

What It Does

1. The whole system is written in PHP using OOP principles.

2. All user data, including passwords, is stored in a MySQL database that can be managed via phpMyAdmin.

3. When someone signs up, they create a username and password. The password is hashed before being saved, so it stays secure.

4. When a new user is created, the system generates a special encryption key based on their password. This key is used to encrypt other stored passwords using AES encryption. The key is unique and doesn’t change as long as the user exists.

5. Users can save passwords for different websites or apps (like Facebook or Gmail). Each saved password includes the site’s name, the password itself, and the date/time it was saved automatically.
    - If a user changes their login password, the encryption key is re-encoded to keep everything secure. The key itself stays the same while the user account exists.

6. The project also includes a database structure and UML diagrams that show how the classes are organized and related.
