# Inventory Management System

A web-based inventory management system built with PHP that helps businesses track and manage their inventory efficiently.
[system_explanation.pdf](https://github.com/user-attachments/files/20612642/system_explanation.pdf)

## Features

- **User Authentication**
  - Secure login system
  - Staff management
  - Role-based access control

- **Inventory Management**
  - Product tracking
  - Stock level monitoring
  - Low stock alerts
  - Product categorization

- **Dashboard**
  - Real-time inventory overview
  - Visual data representation
  - Quick access to key metrics

- **Product Operations**
  - Add new products
  - Edit product details
  - Delete products
  - Track product quantities
  - Product in/out management

## Technical Requirements

- PHP 7.0 or higher
- MySQL Database
- Web Server (Apache/Nginx)
- Modern Web Browser

## Installation

1. Clone the repository:
```bash
git clone [your-repository-url]
```

2. Import the database:
   - Use the provided `inventory.sql` file to set up your database
   - Configure your database connection in the config files

3. Configure the web server:
   - Point your web server to the project directory
   - Ensure proper permissions are set

4. Access the application:
   - Open your web browser
   - Navigate to the application URL
   - Login with your credentials

## Project Structure

- `config/` - Configuration files
- `*.php` - Main application files
- `*.png` - UI assets and images
- `inventory.sql` - Database schema and initial data

## Key Files

- `login.php` - User authentication
- `dashboard.php` - Main dashboard interface
- `productin.php` - Product intake management
- `productout.php` - Product outbound management
- `editproduct.php` - Product editing interface
- `table.php` - Data display components

## Security Features

- Secure login system
- Password protection
- Session management
- Input validation
- SQL injection prevention

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, please open an issue in the GitHub repository or contact the development team. 
