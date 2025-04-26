# Crop Advisory System

## Project Overview
The **Crop Advisory System** is a web-based application designed to assist farmers and agricultural stakeholders by providing:

- **Dynamic Crop Suggestions**: Based on location (country, state, district) and season.
- **Pest Alerts**: Displays pest warnings for specific regions.
- **Weather Forecasts**: Provides weather data for agricultural planning.
- **Admin Panel**: Allows administrators to manage pests and alerts.

---

## Features

### For Users
- **Crop Suggestions**:
  - Select a country, state, district, and season to get crop recommendations.
  - Dynamic dropdowns powered by AJAX.
- **Pest Alerts**:
  - View pest alerts for specific regions.
- **Weather Forecast**:
  - Access weather forecasts for agricultural planning.

### For Admins
- **Admin Dashboard**:
  - Manage pests and pest alerts.
  - Perform CRUD operations for pests and alerts.

---

## Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd crop-advisory
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Configure Environment
- Copy the `.env.example` file to `.env`:
  ```bash
  cp .env.example .env
  ```
- Update the `.env` file with your database credentials:
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=crop_advisory
  DB_USERNAME=root
  DB_PASSWORD=
  ```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Seed the Database
```bash
php artisan db:seed
```

### 6. Start the Development Server
```bash
php artisan serve
```

- Visit the application at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Usage

### For Users
- Visit the homepage.
- Navigate to:
  - **Crop Suggestions**: `/crop-suggestions`
  - **Weather Forecast**: `/weather`
  - **Pest Alerts**: `/alerts`

### For Admins
- Navigate to the admin panel:
  - **Dashboard**: `/admin/dashboard`
  - **Manage Pests**: `/admin/pests`
- Use the admin panel to manage pests and alerts.

---

## What to Search

### For Admin
- Search for **"Admin Dashboard"** to access the admin panel.
- Search for **"Manage Pests"** to perform CRUD operations on pests.

### For Users
- Search for **"Crop Suggestions"** to access the crop advisory feature.
- Search for **"Weather Forecast"** to view weather data.
- Search for **"Pest Alerts"** to view pest warnings.

---

## Technologies Used
- **Backend**: Laravel
- **Frontend**: Tailwind CSS, JavaScript (AJAX)
- **Database**: MySQL
- **Other Tools**: Composer, NPM

---

## Contributing
1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add feature-name"
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Open a pull request.

---

## License
This project is licensed under the **MIT License**.
