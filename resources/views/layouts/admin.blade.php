<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - MovieVerse</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="admin-wrapper">

    <aside class="sidebar">
    <div class="brand">
         MovieVerse
    </div>

    <nav>
        <p class="menu-title">HOME</p>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>

        <p class="menu-title">DATAMASTER</p>
        <a href="{{ route('admin.films.index') }}">Film</a>
        <a href="{{ route('admin.actors.index') }}">Actor</a>
        <a href="{{ route('admin.genres.index') }}">Genre</a>
        <a href="{{ route('admin.countries.index') }}">Country</a>

        <p class="menu-title">SETTING</p>
        <a href="{{ route('profile.show') }}">My Profile</a>
        
        </nav>
</aside>

    <!-- CONTENT -->
    <main class="main-content">
        @yield('content')
    </main>

</div>

</body>
</html>