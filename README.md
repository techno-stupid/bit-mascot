# Running This Project

This guide provides step-by-step instructions on how to run this project locally.

### Step 1: Clone the Git Repository

```sh
git clone git@github.com:techno-stupid/bit-mascot.git
```

### Step 2: Create `.env` from `.env.example`

```sh
cd bit-mascot
cp .env.example .env
```
### Step 3: Install Composer Dependencies

```sh
composer install
```
### Step 3: Migration and Seed

```sh
php artisan migrate
php artisan db:seed
```
### Step 4: Create Storage Link for File uploading

```sh
php artisan storage:link
```
### Step 5: Run the project

```sh
php artisan serve
```
By default, the application will be accessible at http://localhost:8000 in your web browser.

## Login Credentials for Admin
Email: `admin@localhost.local`
Password: `admin`

[note: Admin doesn't need OTP to login]

## About the Project Architecture

This is a Laravel 10 application structured on the MVC pattern, with the addition of the repository pattern for better data handling. While the project is small, I've implemented `Repositories, Interfaces, Traits, Jobs, Constants, Middlewares`, and `Requests` to showcase my familiarity with these concepts. I've kept the project straightforward, scalable, and free from unnecessary complexity.

I've also used `googlemail` for smtp support.
