# Client Management System

This project is a **Client Management System** built using the **Laravel Framework** and follows the **MVC architecture**. It provides functionality for creating, viewing, updating, and deleting client records with photo uploads.

## Features
- **CRUD Operations**: Create, Read, Update, and Delete clients.
- **Photo Uploads**: Upload and display client photos.
- **Validation**: Input validation for fields like name, email, phone, and image.
- **MVC Architecture**: Organized code structure following Laravel's MVC pattern.
- **Responsive Views**: User-friendly interface using Blade templates.

## Requirements
- PHP >= 8.0
- Composer
- Laravel 10.x
- MySQL Database
- Web Server (Apache, Nginx, etc.)

## Installation
1. Clone the repository:
```bash
 git clone https://github.com/username/client-management-system.git
```

2. Navigate to the project folder:
```bash
 cd client-management-system
```

3. Install dependencies:
```bash
 composer install
 npm install
```

4. Create the **.env** file:
```bash
 cp .env.example .env
```

5. Configure database connection in `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Generate application key:
```bash
 php artisan key:generate
```

7. Run database migrations:
```bash
 php artisan migrate
```

8. Link storage for image uploads:
```bash
 php artisan storage:link
```

9. Start the development server:
```bash
 php artisan serve
```

10. Access the application at:
```
 http://localhost:8000
```

## Usage
- Navigate to the home page to see the list of clients.
- Add new clients by clicking the **Add New Client** button.
- Edit or delete clients using the corresponding buttons in the list.
- View uploaded photos directly in the client list.

## File Structure
```
app/
├── Models/
│   └── Cliente.php          # Client model
├── Http/
│   └── Controllers/
│       └── ClienteController.php # Controller for client operations
resources/
├── views/
│   └── clientes/
│       ├── index.blade.php  # List clients
│       ├── create.blade.php # Create client form
│       └── edit.blade.php   # Edit client form
routes/
├── web.php                  # Application routes
```

## Tests
Run unit tests using PHPUnit:
```bash
 php artisan test
```

## License
This project is licensed under the [MIT License](LICENSE).

## Contributions
Contributions are welcome! Please fork the repository and submit a pull request.

## Contact
For questions or support, please contact:
- **Email**: your-email@example.com
- **GitHub**: [YourGitHubProfile](https://github.com/username)
