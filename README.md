## Customer Relationship Management (CRM) System
A modern and efficient CRM system built with Laravel 10. This application helps organizations manage their customers, projects, tasks, and team members seamlessly. The system includes features like dashboard statistics, role-based access control, notifications, and a to-do list.

## Key Features
 - **Dashboard Statistics:**  Interactive and insightful visual representation of key data like user activity, project progress, and customer metrics.
 - **Role Management:**  Manage roles and permissions for different types of users (Admin, Manager, Employee, etc.).
 - **Member Management:**     Add, edit, and remove team members with role-based access.
 - **Customer Management:**  Organize customer details, maintain a detailed database, and keep track of interactions.
 - **User Management:**  Centralized management of all system users, ensuring secure access control.
 - **Project Management:**  Create, track, and manage projects, along with milestones and deadlines.
 - **Task Management:**  Assign, update, and monitor tasks for projects with priority settings.
 - **Notifications:**  Real-time notifications for updates on tasks, projects, or role changes.
 - **To-Do List:**  Personal task organizer for users to manage daily activities efficiently.

## Technologies Used
 - Backend Framework: Laravel 10
 - Database: MySQL
 - Frontend: Tailwind CSS / Bootstrap 5, HTML, JavaScript
 - Authentication: Laravel Breeze / Laravel Permission
 - Notifications: Laravel Database Notifications
 - Version Control: Git

## Installation
 - Follow these steps to set up the project on your local system:

## Prerequisites
 - PHP >= 8.2
 - Composer
 - MySQL
 - Node.js & npm

## Steps
 - Clone the repository
 `git clone https://github.com/toufiqur19/Customer_relationship_management.git`
 `cd Customer_relationship_management`

 - Install dependencies
 `composer install
 npm install && npm run dev`

 - Set up the environment
 - Create a `.env` file by copying `.env.example`
 `cp .env.example .env`

 - Update the database configuration and other settings in .env.
 - Generate application key
 `php artisan key:generate`
 - Run migrations and seeders
 `php artisan migrate --seed`
 - Start the development server
 `php artisan serve`
Access the application at http://localhost:8000.

## Contact
 - For questions or feedback, feel free to reach out:
 - Toufiqur Rahman Sobuj
 - Email: sobujts57@gmail.com
 - LinkedIn: https://www.linkedin.com/in/toufiqur9493
 - GitHub: https://github.com/toufiqur19

   
