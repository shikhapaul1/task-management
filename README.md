<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<!-- Task -->

# Task Management API (Laravel)

This is a simple Task Management API built using Laravel.

## Features

1. User Authentication (Laravel Sanctum)
2. Task CRUD (Create, Read, Update, Delete)
3. Task Filtering
4. Real-time Notifications
5. Validation
6. Database Relationships

---

## 1. Authentication APIs

- POST /api/register → Register user  
- POST /api/login → Login user  
- POST /api/logout → Logout user  

Fields:
- name
- email
- password

---

## 2. Task Module

Task Fields:
- id
- title
- description
- status (pending, in_progress, completed)
- due_date
- created_by (user_id)

---

## 3. Task APIs

- POST /api/tasks → Create task  
- GET /api/tasks → Get all tasks  
- GET /api/tasks/{id} → Get single task  
- PUT /api/tasks/{id} → Update task  
- DELETE /api/tasks/{id} → Delete task  

---

## 4. Filtering

You can filter tasks using:

- /api/tasks?status=pending  
- /api/tasks?status=completed  

---

## 5. Real-Time Notification

When a new task is created:
- Other users receive real-time notification

You can use:
- Laravel Broadcasting
- Pusher or WebSockets

---

## 6. Validation

- title is required  
- due_date must be a valid date  
- status must be valid  

---

## 7. Database

Tables:
- users
- tasks

Relationship:
- User hasMany Tasks  
- Task belongsTo User  

---

## Installation

1. Clone project  
2. Run: composer install  
3. Copy .env file  
4. Set database in .env  
5. Run: php artisan key:generate  
6. Run: php artisan migrate  
7. Run: php artisan serve  

---

## API Testing

Use Postman or Thunder Client

Add token in header:
Authorization: Bearer {token}

---

## Bonus (Optional)

- Pagination  
- API Resources  
- Exception Handling  
- Repository Pattern  
- Unit Testing  