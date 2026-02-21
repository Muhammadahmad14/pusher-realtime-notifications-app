# Pusher Real-Time Notifications App

This is a **Laravel 10** project demonstrating **real-time notifications** using **Pusher** and **Laravel Echo**.
Users can see notifications instantly in the dashboard without refreshing the page.

---

## 🔹 Features

* Real-time notifications with Pusher
* Private user channels
* Notification bell with unread counter
* Laravel backend with database notifications
* Blade frontend (can be adapted to React)

---

## 📦 Requirements

* PHP >= 8.1
* Composer
* Node.js >= 18
* MySQL
* Laravel 12
* Pusher account

---

## ⚡ Installation

1. **Clone the repository**

```bash
git clone https://github.com/Muhammadahmad14/pusher-realtime-notifications-app.git
cd pusher-realtime-notifications-app
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Install Node.js dependencies**

```bash
npm install
```

4. **Copy `.env` file**

```bash
cp .env.example .env
```

5. **Set up your `.env`**

Update the following with your database and Pusher credentials:

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

BROADCAST_CONNECTION=pusher
QUEUE_CONNECTION=database

VITE_PUSHER_APP_KEY=your_pusher_key
VITE_PUSHER_APP_CLUSTER=your_pusher_cluster
```

6. **Generate app key**

```bash
php artisan key:generate
```

7. **Run migrations**

```bash
php artisan migrate
```

8. **Run the queue worker** (for broadcasting notifications)

```bash
php artisan queue:work
```

9. **Run Vite dev server**

```bash
npm run dev
```

10. **Run Laravel server**

```bash
php artisan serve
```

Your app should now be running at: `http://127.0.0.1:8000`

---

## 📝 Testing Notifications

1. Log in to the dashboard.
2. Trigger a notification from tinker or controller:

```php
$user = \App\Models\User::first();
$user->notify(new \App\Notifications\AddPost());
```

3. You should see the notification **appear instantly** in the bell popup with the unread counter updating.

---

## 🔹 Notes

* **.env** file is **not included** in the repository for security.
* Only expose **VITE-prefixed keys** to the frontend (like Pusher key & cluster).
* You can adapt this setup for **React** — just subscribe to the same private channels with Laravel Echo.

---

## 🔗 Resources

* [Laravel Notifications Docs](https://laravel.com/docs/10.x/notifications)
* [Laravel Broadcasting Docs](https://laravel.com/docs/10.x/broadcasting)
* [Pusher Docs](https://pusher.com/docs)
* [Laravel Echo Docs](https://laravel.com/docs/10.x/broadcasting#installing-laravel-echo)

---

## 👤 Author

**Muhammad Ahmad**

* GitHub: [Muhammadahmad14](https://github.com/Muhammadahmad14)
