## ✅ Project Setup Instructions

1. Clone the repository

```sh
git clone https://github.com/Mirza-Md-Golam-Nabi/website_app.git
```

2. Goto project folder

```sh
cd website_app
```

3. Install dependencies using Composer

```sh
composer install
```

3. Create the **.env** file

Copy the example environment file:

```sh
cp .env.example .env
```

> ⚠️ Make sure to keep the same **APP_KEY** across both **website-app** and **software-app**.

4. Create the database

Create a database named:

```sh
website_app
```

5. Run migrations and seeders

Run the following command to migrate and seed the database:

```sh
php artisan migrate --seed
```

6. Serve the application on port **8001**
   Make sure to run the application on port **8001**

```sh
npm install
```

and

```sh
npm run build
```

and

```sh
php artisan serve --port=8001
```

✅ When the seeder file is executed, a default user is created in the users table.
The login credentials are:

-   Email: test@example.com

-   Password: password

By default, these credentials will be pre-filled in the login form.
