# E-commerce
# Electronic Shop

Electronic Shop is a web application designed for managing an online electronic store. It allows users to browse products, add them to cart, place orders, manage accounts, and more. This repository contains the source code for the Electronic Shop project.

## Features

- **User Authentication**: Users can register, log in, and log out securely.
- **Product Management**: Admin can add, edit, and delete products.
- **Shopping Cart**: Users can add products to their shopping cart and place orders.
- **Order Management**: Admin can manage orders and mark them as shipped.
- **Responsive Design**: The application is designed to work seamlessly across devices of all sizes.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP
- **Database**: MySQL, xampp server
- **Frameworks/Libraries**: Foundation, jQuery

## Setup

To run this project locally, follow these steps:

1. **Clone the repository**:
2.**Import Database**: make a databse containg user ,products, and order
 ** ** Orders Table********
Field	Type	Description
id	int(15)	Primary key, auto-increment
product_code	varchar(255)	Product code
product_name	varchar(255)	Product name
product_desc	varchar(255)	Product description
price	int(10)	Price per unit
units	int(5)	Units ordered
total	int(15)	Total price
date	timestamp	Order timestamp
email	varchar(255)	Customer email

**Database Structure: Products
Products Table**
Field	Type	Description
id	int(15)	Primary key, auto-increment
product_code	varchar(255)	Unique code for each product
product_name	varchar(255)	Name of the product
product_desc	varchar(255)	Description of the product
product_img_name	varchar(255)	Image filename of the product
qty	int(5)	Quantity available in stock
price	decimal(10,2)	Price per unit (in decimal format)
**Users Table**
Field	Type	Description
id	int(11)	Primary key, auto-increment
fname	varchar(255)	First name
lname	varchar(255)	Last name
address	varchar(255)	Address
city	varchar(100)	City
pin	int(6)	PIN code
email	varchar(255)	Email address, indexed for uniqueness
password	varchar(255)	Password
type	varchar(20)	User type (e.g., admin, user)

3. **Configure Database Connection**:
- Open `config.php` file.
- Update the database host, username, password, and database name as per your environment.

4. **Start the PHP server**:
- You can use PHP's built-in server for development:
  ```
  php -S localhost:8000
  ```
- Alternatively, configure your local web server (Apache, Nginx) to serve the `electronic-shop` directory.

# Electronic Shop Project

This project is a web application for an electronic shop, allowing users to browse products, add them to cart, place orders, and manage their accounts.

## Files Included

- `about.php`: About page of the website.
- `account.php`: User account management page.
- `bootstrap.js`, `bootstrap.min.js`: Bootstrap JavaScript files.
- `cart.php`: Shopping cart page.
- `config.php`: Configuration file for database connection.
- `contact.php`: Contact page for customer inquiries.
- `foundation.css`, `foundation.min.js`: Foundation CSS and JavaScript files.
- `index.php`: Main landing page of the website.
- `insert.php`: Script to insert data into the database.
- `jquery.js`: jQuery JavaScript library.
- `login.php`: Login page for user authentication.
- `logout.php`: Logout functionality script.
- `npm.js`: npm JavaScript package manager configuration.
- `orders-update.php`: Script to update order status.
- `orders.php`: Page to view user orders.
- `products.php`: Page displaying available products.
- `register.php`: User registration page.
- `results.php`: Script or page for search results.
- `success.php`: Page displayed upon successful operations.
- `update-cart.php`: Script to update shopping cart contents.
- `update.php`: Script to update user account information.
- `verify.php`: Script to verify user login credentials.



## Contributing

Contributions are welcome! If you'd like to contribute to this project, please fork the repository and submit a pull request. For major changes, please open an issue first to discuss what you would like to change.


