# Farm2Home

Farm2Home is a full-stack e-commerce platform designed to connect farmers directly with consumers, eliminating intermediaries in the sale of vegetables, fruits, and other farm products. This project aims to empower farmers by allowing them to list and manage their products independently while providing consumers with fresh, locally sourced produce.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Database Setup](#database-setup)
- [Contributing](#contributing)
- [License](#license)

## Features

### For Customers:
- Browse a wide range of farm products
- Add items to cart, modify quantities, or remove items
- Secure checkout process
- Multiple payment options
- Provide feedback on purchases
- View order history and status

### For Farmers:
- Secure login system
- Personalized dashboard to manage products and orders
- Add, edit, or remove product listings
- Update delivery status for orders
- View earnings and sales statistics

## Technologies Used

- Frontend:
  - HTML5
  - CSS3
  - JavaScript
  - Bootstrap 4
- Backend:
  - PHP
- Database:
  - MySQL
- Version Control:
  - Git

## Installation

1. Clone the repository: ``` https://github.com/whitebeard10/farm2home.git ```
2. Set up a local server environment (e.g., XAMPP, WAMP, or MAMP).

3. Move the project files to your server's web directory.

4. Configure the database connection in `config.php` (see [Database Setup](#database-setup)).

5. Import the provided SQL file to set up the database schema.

## Usage

1. Start your local server and ensure MySQL is running.

2. Open a web browser and navigate to `http://localhost/farm2home` (adjust the URL if your local setup differs).

3. For customer use, browse products, add to cart, and proceed to checkout.

4. For farmer access, use the login page with provided credentials to access the farmer dashboard.

## Database Setup

1. Create a new MySQL database named `login_register` and `cart_system`.

2. Import the `login_register.sql` and `cart_system.sql` files given in util folder into your newly created database.

3. Update the `cartSystemAccess.php` and `configure.php` file with your database credentials.

4. You are good to go.

## Contributing

Contributions to Farm2Home are welcome and appreciated! Here's how you can contribute:

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/YourFeature`)
3. Commit your changes (`git commit -m 'Add some YourFeature'`)
4. Push to the branch (`git push origin feature/YourFeature`)
5. Open a Pull Request

Please ensure your code adheres to the project's coding standards and include tests for new features when possible.

## License

Farm2Home is open source software licensed under the MIT License. This means:

- You are free to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the software.
- The software is provided "as is", without warranty of any kind, express or implied.
- In no event shall the authors be liable for any claim, damages or other liability arising from the use of the software.

For the full license text, please see the [LICENSE](LICENSE) file in the repository.

---

For more information or to report issues, please visit the [project repository](https://github.com/whitebeard10/farm2home.git) or reach out to me [LinkedIN](https://www.linkedin.com/in/avinash-chhetri/).
   
