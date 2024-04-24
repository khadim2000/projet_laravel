<!-- resources/views/login.blade.php -->

@extends('login')

@section('content')<!-- resources/views/layouts/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Application</title>


</head>
<body>
    <header>
        <div id="app"></div>
        @vite(["resources/css/app.css", "resources/js/app.js"]) 

    <main>
        @yield('content') <!-- Insère le contenu spécifique à chaque page -->
    </main>

    <footer>
        <!-- Insérez le contenu du footer ici si nécessaire -->
    </footer>
</body>
</html>

    
