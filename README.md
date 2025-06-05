# Inventory Management System

A web-based inventory management system built with PHP that helps businesses track and manage their inventory efficiently.

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

## System Explanation

![system_explanation_with_screenshot_page-0001](https://github.com/user-attachments/assets/fea5c837-e95c-451a-8e86-fd90c6b67c5d)
![system_explanation_with_screenshot_page-0002](https://github.com/user-attachments/assets/18b9e811-889b-4dc2-af1b-c2647d38d804)
![system_explanation_with_screenshot_page-0003](https://github.com/user-attachments/assets/170b042b-146e-41ce-978d-bb16d82210e9)
![system_explanation_with_screenshot_page-0004](https://github.com/user-attachments/assets/95dda599-1105-4c7c-8a1f-52b19aad3fb6)
![system_explanation_with_screenshot_page-0005](https://github.com/user-attachments/assets/cf6c314a-0519-4434-af5f-361eb6555a46)
![system_explanation_with_screenshot_page-0006](https://github.com/user-attachments/assets/05b89942-611e-4c53-a42b-0326e904311c)
![system_explanation_with_screenshot_page-0007](https://github.com/user-attachments/assets/60b97f71-3f22-44ee-a5d9-bc91c2fa4588)
![system_explanation_with_screenshot_page-0008](https://github.com/user-attachments/assets/c0848617-6945-42c1-9662-ec9d23cea1a4)
![system_explanation_with_screenshot_page-0009](https://github.com/user-attachments/assets/8df96e29-81fa-48ad-895d-8e6e0b0c3237)
![system_explanation_with_screenshot_page-0010](https://github.com/user-attachments/assets/9b5c8d9b-c457-4ac7-b30d-f9dad5fe609d)
![system_explanation_with_screenshot_page-0011](https://github.com/user-attachments/assets/871fdce6-d93c-4bec-9fda-07ff94377b4b)
![system_explanation_with_screenshot_page-0012](https://github.com/user-attachments/assets/5b045d5e-e888-4490-acf0-5b8da7914765)

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
