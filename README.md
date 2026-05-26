# Smart Blood Inventory & Temperature Monitoring System

## Project Overview

The Smart Blood Inventory & Temperature Monitoring System is a Laravel 11 based RESTful API application developed to manage blood bank inventory and refrigerator temperature monitoring efficiently.

The system provides APIs for blood bag management, refrigerator temperature monitoring, temperature risk analysis, dashboard analytics, blood expiry prediction, and alert notifications. The application also includes secure authentication and role-based access control using Laravel Sanctum.

The project is designed using scalable Laravel architecture principles with optimized database relationships, clean API structure, and performance-focused query handling.

---

# Technologies Used

- Laravel 11
- PHP 8.2+
- MySQL
- Laravel Sanctum
- REST API
- Eloquent ORM

---

# Features Implemented

## Authentication & Authorization
- Login API
- Logout API
- Protected APIs
- Token Authentication using Laravel Sanctum
- Middleware-based Route Protection
- Role-based Access Control

### User Roles
- Admin
- Blood Bank Staff
- Monitoring User

---

## Blood Bag Management
- Create Blood Bag
- View Blood Bags
- Update Blood Bag
- Delete Blood Bag
- Blood Expiry Prediction
- Near-expiry Analysis

---

## Temperature Monitoring
- Refrigerator Temperature Logging
- Daily Average Temperature
- Highest Temperature
- Lowest Temperature
- Unsafe Minutes Calculation
- Risk Percentage Calculation

### Temperature Conditions

| Temperature Range | Status |
|---|---|
| 2°C – 6°C | Safe |
| 6°C – 8°C | Warning |
| Above 8°C | Critical |

---

## Dashboard APIs
- Total Blood Bags
- Available Stock by Blood Group
- Refrigerator Health Score
- Critical Temperature Alerts
- Average Temperature for Today
- Total Expired Bags
- Active Refrigerators

---

# Advanced Laravel Concepts Used

- Eloquent Relationships
- Repository Pattern
- Service Classes
- Events & Listeners
- Queue Jobs
- Notifications
- API Resources
- Form Requests
- Policies
- Caching

---

# Installation & Setup Instructions

## 1. Clone Repository

```bash
git clone https://github.com/Ambady45/Blood_Bank_backend
