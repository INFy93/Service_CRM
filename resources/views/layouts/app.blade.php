<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script>
        window.User = {
            id: {{ optional(auth()->user())->id }},
            name: '{{ optional(auth()->user())->name }}',
        }
    </script>
    @routes
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body>
@inertia
</body>
</html>
