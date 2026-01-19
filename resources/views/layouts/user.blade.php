<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>MovieVerse</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            background: #111;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            padding: 0;
            font-family: inherit;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #1a1a1a;
            min-width: 180px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.5);
            z-index: 1000;
            border-radius: 8px;
            top: 100%;
            left: 0;
            border: 1px solid #333;
        }

        .dropdown::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 20px;
            bottom: -20px;
            left: 0;}

        .dropdown-content a, .dropdown-content button {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
        }

        .dropdown-content a:hover, .dropdown-content button:hover {
            background-color: #e50914;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Profile Style */
        .user-auth {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-trigger {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e50914;
        }

       .search-container {
    display: flex;
    align-items: center;
    background: #1a1a1a; 
    border-radius: 6px; 
    padding: 4px 12px;
    border: 1px solid #333;
}

.search-container input {
    background: none;
    border: none;
    color: white;
    padding: 6px;
    outline: none;
    width: 180px; 
    font-size: 14px;
}

.search-container button {
    background: none;
    border: none;
    color: #666;
    cursor: pointer;
    font-size: 14px;
}

.search-container button:hover {
    color: #e50914;
}
        </style>
</head>
<body>

<header class="navbar">
    <div class="logo" style="font-size: 1.5rem; font-weight: 800; color: #ffffff; letter-spacing: -1px;">
        MOVIEVERSE
    </div>
    
    <nav>
        <a href="{{ route('user.home') }}">Home</a>
        <a href="{{ route('user.films.index') }}">Films</a>
        <a href="{{ route('user.actors.index') }}">Actors</a>

        <form action="{{ route('user.films.index') }}" method="GET" class="search-container">
            <input type="text" name="search" placeholder="Cari film atau aktor..." value="{{ request('search') }}">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>

        <div class="dropdown">
            <button class="dropbtn">Genres ▾</button>
            <div class="dropdown-content">
                @foreach($globalGenres as $g)
                    <a href="{{ route('user.films.index', ['genre' => $g->id]) }}">{{ $g->name }}</a>
                @endforeach
            </div>`
        </div>

        <div class="dropdown">
            <button class="dropbtn">Countries ▾</button>
            <div class="dropdown-content">
                @foreach($globalCountries as $c)
                    <a href="{{ route('user.films.index', ['country' => $c->id]) }}">{{ $c->name }}</a>
                @endforeach
            </div>
        </div>
    </nav>

    <div class="user-auth">
        @auth
            <div class="dropdown">
                <div class="profile-trigger">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}&background=random" class="avatar">
                    <span>{{ Auth::user()->username }}</span>
                </div>
                <div class="dropdown-content" style="right: 0; left: auto;">
                    <a href="/profile">My Profile</a>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}" style="color: white; text-decoration: none;">Login</a>
            <a href="{{ route('register') }}" style="background: #e50914; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">Register</a>
        @endauth
    </div>
</header>

<main class="container">
    @yield('content')
</main>

<footer class="footer" style="text-align: center; padding: 40px 0; color: #666; border-top: 1px solid #222; margin-top: 50px;">
    © {{ date('Y') }} MovieVerse — All Rights Reserved
</footer>

</body>
</html>