# Doctor Reservation System (Vezeeta Clone)

A multi-role healthcare appointment booking platform built during the National Telecommunication Institute (NTI) training program. The system utilizes role-based route access controls and dynamic schedule generation to provide an automated workflow for admins, doctors, and patients.

---

## 🛠️ Tech Stack & Architecture

* **Backend Framework:** PHP (Laravel 11)
* **Database:** MySQL
* **Database Layer:** Eloquent ORM, Migrations, and Database Seeders
* **Frontend Rendering:** Blade Templating Engine with Vite integration
* **Date & Time Utilities:** Carbon Library

---

## 🚀 Key Implementation Details

### 1. Multi-Role Authentication & Custom Middleware
* Configured distinct authorization boundaries across the system for three unique actor groups: **Admins**, **Doctors**, and **Patients**.
* Implemented custom Laravel middleware layers to secure API/web routing definitions, verifying user privileges prior to dispatching controller requests.

### 2. Algorithmic Schedule & Time-Slot Generation
* Leveraged the **Carbon** date-time utility library to programmatically parse calendar dates and operational hours.
* Designed dynamic slot filtering mechanisms that cross-reference active Eloquent rows to isolate and generate non-overlapping, available doctor appointment sessions.

### 3. Multi-Parameter Practitioner Search Scopes
* Formulated a unified, multi-criteria lookup engine inside the controller architecture.
* Utilized Eloquent query builders to parse user inputs dynamically, filtering diagnostic results concurrently by **Doctor Name**, **Clinic Location**, and **Medical Specialty**.

### 4. Normalized Relational Schema
* Developed a structured relational database layout containing tables for `users`, `doctors`, `clinics`, `appointments`, and `appointment_slots` with strict data-integrity foreign keys.

---

## 📂 Repository Breakdown

* **`app/Http/Controllers/`** — Houses backend application layers (`AppointmentController`, `DoctorController`, `AdminController`) separating presentation from data rules.
* **`app/Models/`** — Implements data persistence and relational definitions via Eloquent ORM.
* **`database/migrations/`** — Tracks strict table schemas and database keys sequentially.
* **`resources/views/`** — Contains the responsive front-end UI structures rendered using Laravel Blade.

---

## 📦 Installation & Local Setup

1. **Clone your repository copy:**
   ```bash
   git clone [https://github.com/mohamed-ahamed-mohamed-2026/NTI-Final-Project.git](https://github.com/mohamed-ahamed-mohamed-2026/NTI-Final-Project.git)
   cd NTI-Final-Project

2. **Install Composer dependencies:**
    ```bash
    composer install


3. **Set up Environment variables:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    

4. **Configure your Database:**
Open your newly created `.env` file and input your local MySQL parameters:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=doctor_reservation
    DB_USERNAME=root
    DB_PASSWORD=your_password

5. **Run Migrations and Seeders:**
Build the normalized tables and fill them with mock operational data:
    ```bash
    php artisan migrate --seed

6. **Serve the Application:**
    ```bash
    php artisan serve
