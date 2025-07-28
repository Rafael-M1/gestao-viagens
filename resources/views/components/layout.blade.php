<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>{{ $title ?? "" }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="d-flex min-vh-100">
        <x-sidebar />
        <main class="flex-grow-1 p-4">
            <h2 class="mb-4">{{ $title ?? 'Laravel' }}</h2>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
