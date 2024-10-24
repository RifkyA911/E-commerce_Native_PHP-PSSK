# 🛒 E-Commerce Platform (Native PHP & MySQL)

## 📋 Description

This is a simple E-commerce platform built with **Native PHP** and **MySQL**. It allows users to browse products, add items to their cart, and make purchases. Admins can manage products, categories, and user data through a CRUD interface.

## ✨ Features

### 👤 User Side
- **🛍️ Product Browsing**: Users can view available products with details like name, price, and description.
- **🛒 Cart Management**: Add, remove, and update the quantity of products in the shopping cart.
- **💳 Checkout**: Complete the purchase process and place orders.
- **🔐 User Authentication**: Registration, login, and logout for users.

### 🔧 Admin Side
- **📦 Product Management (CRUD)**:
  - ➕ **Create**: Add new products with attributes such as name, price, category, description, and image.
  - 📖 **Read**: View a list of products.
  - ✏️ **Update**: Edit product details.
  - ❌ **Delete**: Remove products from the database.
- **🗂️ Category Management**: Add, edit, or delete product categories.
- **👥 User Management**: Manage registered users (CRUD operations).
  
### 📊 Database
- **MySQL** is used to store data for products, users, categories, and orders.

## 🚀 Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/ecommerce-native-php.git
```
   
2. Navigate to the project folder:
```bash
cd ecommerce-native-php
```

3.Import the database:

Import ```pssk_test.sql``` file located in the folder to your MySQL server.

4.Update the database connection settings in conn.php:

```php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db       = 'pssk_test';
```

5. Start your local server:
Use tools like XAMPP or MAMP, and move the project files to the server's root directory (htdocs for XAMPP).

6.Open the app in your browser:
```http://localhost/ecommerce-native-php```

🤝 Contributing
Feel free to fork this project, make improvements, and create a pull request! Contributions are always welcome.

# PSSK
PSSK BNSP UPN Veteran Jawa Timur

Nama : Rifky Akhmad Fernanda
NPM  : 18081010126
JUNIOR WEB PROGRAMMER 
