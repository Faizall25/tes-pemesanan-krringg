Kriingg Order Management System 🚀
Welcome to Kriingg, a sleek and powerful order management application built with Laravel 12! Designed to streamline product ordering for customers and empower admins with robust management tools, Kriingg offers a delightful user experience with distinct interfaces for each role. Customers enjoy a modern, Tailwind CSS-powered UI with a fixed navbar and interactive features, while admins get a professional SB Admin 2 dashboard for managing orders, products, and reports. Whether you're placing an order or analyzing sales, Kriingg has you covered! 🎉
🌟 Features
For Customers

Modern Interface: A user-friendly, Tailwind CSS-based UI with a fixed navbar and footer, vibrant order cards, and smooth animations.
Order Management: Create and view orders with real-time total price calculations and status filtering (pending, processing, completed).
Profile Management: Update name, email, and password in a polished, responsive form.
Responsive Design: Seamless experience on desktop and mobile devices.
Interactive Features: Filter orders by status, enjoy hover effects, and get instant form validation feedback.

For Admins

Professional Dashboard: SB Admin 2-based admin panel with sales metrics, charts (via Chart.js), and DataTables for easy navigation.
Product Management: Full CRUD operations for products with search and validation.
Order Oversight: View, filter, search, update order statuses, and add admin notes.
Reporting: Generate and export sales reports to Excel by date range.
Profile Management: Update profile and password in a consistent SB Admin 2 interface.

General

Multi-Role Support: Distinct workflows for admins (management) and customers (ordering).
Secure Authentication: Login, logout, registration, and profile updates with role-based redirects.
Enhanced UX: Fixed navbar/footer, card-based layouts, and JavaScript-driven interactivity (e.g., real-time price updates, smooth scrolling).

🛠️ Tech Stack

Framework: Laravel 12
Language: PHP 8.2
Database: MySQL
Frontend:
Customers: Tailwind CSS (CDN), FontAwesome, Nunito font
Admins: SB Admin 2, Chart.js, DataTables


Dependencies: maatwebsite/excel for report exports, jQuery for JavaScript enhancements
Tools: Composer, Node.js, npm (for local development)

📋 Requirements

PHP >= 8.2
Composer
MySQL
Node.js & npm (optional, for local Tailwind compilation)
Laravel CLI (optional, for convenience)

⚙️ Installation
Get Kriingg up and running in minutes! Follow these steps:

Clone the Repository:
git clone https://github.com/your-repo/kriingg.git
cd kriingg


Install PHP Dependencies:
composer install


Install Frontend Dependencies (optional, if compiling Tailwind locally):
npm install


Set Up Environment:

Copy the .env.example file:cp .env.example .env


Update .env with your database details:DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kriingg
DB_USERNAME=root
DB_PASSWORD=




Generate Application Key:
php artisan key:generate


Run Migrations:
php artisan migrate


Seed the Database (optional, for test data):
php artisan db:seed


Compile Assets (optional, if not using CDN):
npm run dev


Start the Server:
php artisan serve

Open http://localhost:8000 in your browser! 🎉


🔐 Default Credentials
Test the app with these pre-seeded accounts:

Admin:
Email: admin@kriingg.com
Password: password


Customers:
Email: customer1@kriingg.com, Password: password
Email: zall25@krringg.com, Password: password



🚀 Usage
Customers

Register or Log In:
Visit /register to create a new account or /login to sign in.
Enjoy a sleek interface with a gradient navbar and modern form designs.


Manage Orders:
Go to /orders to view your orders in a card-based layout.
Filter orders by status (e.g., pending, processing) using the dropdown.
Click "Create New Order" to place an order with real-time price calculations.


Update Profile:
Navigate to /profile to update your name, email, or password in a user-friendly form.



Admins

Log In:
Sign in at /login to access the SB Admin 2 dashboard.


Dashboard:
View sales metrics and charts at /admin/dashboard.


Manage Products:
Go to /products to add, edit, or delete products.


Manage Orders:
Visit /orders to view, filter, search, or update order statuses and notes.


Generate Reports:
Access /reports to preview or export sales data to Excel.


Update Profile:
Go to /profile to manage your account details.



🎨 UI Highlights

Customer Interface:
Fixed navbar with smooth hover animations and a gradient background.
Card-based order listing with vibrant status badges and filtering.
Interactive order creation form with real-time total price updates.
Responsive design with Nunito font and Tailwind CSS styling.


Admin Interface:
Professional SB Admin 2 dashboard with DataTables and Chart.js.
Clean, organized layout for product and order management.
Consistent profile management with role-specific styling.



🧪 Testing
To ensure everything works smoothly:

Customer Workflow:
Register a new user at /register.
Create an order at /orders/create and verify the total price calculation.
View and filter orders at /orders.
Update profile/password at /profile.


Admin Workflow:
Log in as admin and check the dashboard (/admin/dashboard).
Manage products (/products) and orders (/orders).
Export a report at /reports.


General:
Test responsiveness on mobile devices.
Verify no JavaScript errors in the browser console.
Confirm secure logout (POST method) for both roles.

🗃️ ERD & Diagram Aktivitas
📎 Tersedia di folder /docs:
https://drive.google.com/drive/folders/1N04jtJRtdYiZfueV5FKm_oth2np9mR3x?usp=sharing 

erd-kriingg.png
activity-diagram-kriingg.pdf

📝 Notes

Production Setup: Secure your .env file, configure a web server (e.g., Nginx), and compile Tailwind CSS locally using Vite.
Assets: SB Admin 2 assets are in public/vendor/. Ensure FontAwesome and jQuery are available.
Extensibility: Add features like order details pages, search functionality, or email notifications by extending the existing codebase.
Security: The POST-based logout prevents CSRF attacks. Consider adding email verification or password reset for enhanced security.

🤝 Contributing
Want to make Kriingg even better? Fork the repo, create a feature branch, and submit a pull request! We welcome contributions for bug fixes, UI enhancements, or new features.
📬 Contact
Have questions or feedback? Reach out via GitHub Issues or email us at support@kriingg.com.

Kriingg – Simplifying orders, delighting users. Built with 💖 by Faizal Ferdianto for the xAI coding challenge!
