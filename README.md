# SubmtiChat

SubmtiChat is a communication platform designed for students, professors, and administrators within an educational institution. The platform facilitates efficient and structured messaging between different user roles.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Directory Structure](#directory-structure)
- [Contributors](#contributors)
- [License](#license)

## Features

- **Admin Functionalities:**
  - Send messages to all students or all professors.
  - Import student information and account details from Excel files.
  - Generate and manage passwords and emails for students and professors.
  - Delete student and professor accounts.

- **Professor Functionalities:**
  - Send messages to all students they teach, individual classes, or the admin.
  - Communicate with students in their classes and other professors.

- **Student Functionalities:**
  - Send messages to professors who teach them and the admin.
  - Communicate with classmates, groups, and specific classes.
  - Engage with students within their study group or field of study.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/submtichat.git
   cd submtichat
   Install dependencies:نسخ الكود
composer install
npm install

onfigure the environment:

Copy the .env.example file to .env:
 
cp .env.example .env
Update the .env file with your database and other configuration settings.
Run the database migrations and seeders:

php artisan migrate --seed
Start the development server:

php artisan serve

Usage
Access the platform at http://localhost:8000/.
Admin, professor, and student roles can log in with their respective credentials to access their functionalities.

Directory Structure
The project follows the standard Laravel structure with additional directories for Bootstrap assets and database seeds. Below is a brief overview of the main directories:

.github/workflows: Contains GitHub Actions workflows.
app: The core application code, including models, controllers, and middleware.
bootstrap: Bootstrap framework integration.
config: Configuration files for various services and packages.
database: Migration and seeding files.
public: Public assets such as images, scripts, and stylesheets.
resources: Views, language files, and raw assets like CSS and JavaScript.
routes: Web, API, and console routes.
storage: Compiled views, file-based sessions, file caches, and other storage files.
tests: Unit and feature tests.

Contributors
Reda
Mehdi
Ahmed
