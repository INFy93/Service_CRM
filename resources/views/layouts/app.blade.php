<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link type="image/x-icon" href="/storage/img/favicon.ico" rel="shortcut icon">
    <link type="Image/x-icon" href="/storage/img/favicon.ico" rel="icon">
    <script>
        window.User = {
            id: {{ optional(auth()->user())->id }},
            name: '{{ optional(auth()->user())->name }}',
            service_id: '{{ optional(auth()->user())->service_id }}',
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
