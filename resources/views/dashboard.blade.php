<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        .notification-bell {
            position: relative;
            cursor: pointer;
            display: inline-block;
        }

        .notification-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }

        .notification-popup {
            display: none;
            position: absolute;
            right: 0;
            top: 30px;
            background: white;
            border: 1px solid #ccc;
            width: 300px;
            max-height: 400px;
            overflow-y: auto;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            z-index: 100;
        }

        .notification-popup ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .notification-popup li {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .notification-popup li:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>

    <h2>Welcome, {{ auth()->user()->name }}</h2>

    <div style="position: relative;">
        <div class="notification-bell" id="notificationBell">
            🔔
            <span class="notification-count" id="notificationCount">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
        </div>

        <div class="notification-popup" id="notificationPopup">
            <ul id="notificationList">
                @foreach (auth()->user()->unreadNotifications as $notification)
                    <li>{{ $notification->data['message'] ?? 'New Notification' }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        const bell = document.getElementById('notificationBell');
        const popup = document.getElementById('notificationPopup');

        bell.addEventListener('click', () => {
            popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function(event) {
            if (!bell.contains(event.target) && !popup.contains(event.target)) {
                popup.style.display = 'none';
            }
        });
    </script>

    @vite('resources/js/app.js')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.Echo) {
                window.Echo.private(`App.Models.User.{{ auth()->id() }}`)
                    .notification((notification) => {
                        const list = document.getElementById('notificationList');
                        const count = document.getElementById('notificationCount');

                        const li = document.createElement('li');
                        li.textContent = notification.message;
                        list.prepend(li);

                        count.textContent = parseInt(count.textContent) + 1;
                    });
            } else {
                console.error('Echo not loaded yet');
            }
        });
    </script>
</body>

</html>
