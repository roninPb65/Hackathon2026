{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GetUp&Go') }} - @yield('title', 'Dashboard')</title>
    <title>Get Up & Go</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/128/2037/2037358.png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6366F1;
            --primary-dark: #4F46E5;
            --secondary: #10B981;
            --dark: #0F172A;
            --dark-secondary: #1E293B;
            --gray: #64748B;
            --light-gray: #F1F5F9;
            --white: #FFFFFF;
            --border: #E2E8F0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--white);
            color: var(--dark);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Modern Navigation */
        .navbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 800;
            color: var(--dark);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .navbar-brand span {
            color: var(--primary);
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            gap: 4px;
            align-items: center;
        }

        .nav-link {
            padding: 10px 18px;
            text-decoration: none;
            color: var(--gray);
            font-weight: 500;
            font-size: 15px;
            border-radius: 8px;
            transition: all 0.2s ease;
            letter-spacing: -0.2px;
        }

        .nav-link:hover {
            background: var(--light-gray);
            color: var(--dark);
        }

        .nav-link.active {
            background: var(--primary);
            color: var(--white);
        }

        .user-menu {
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid var(--border);
            transition: border-color 0.2s;
        }

        .user-avatar:hover {
            border-color: var(--primary);
        }

        .dropdown-menu {
            position: absolute;
            right: 0;
            top: 55px;
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            min-width: 200px;
            display: none;
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            display: block;
            padding: 12px 20px;
            color: var(--dark);
            text-decoration: none;
            transition: background 0.2s;
            font-size: 14px;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: var(--light-gray);
        }

        .dropdown-divider {
            height: 1px;
            background: var(--border);
            margin: 4px 0;
        }

        /* Flash Messages */
        .alert {
            padding: 16px 24px;
            border-radius: 12px;
            margin: 24px 0;
            font-weight: 500;
            font-size: 15px;
            border: 1px solid;
        }

        .alert-success {
            background: #F0FDF4;
            color: #15803D;
            border-color: #BBF7D0;
        }

        .alert-danger {
            background: #FEF2F2;
            color: #B91C1C;
            border-color: #FECACA;
        }

        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--dark);
        }

        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 80px;
                left: 0;
                right: 0;
                background: var(--white);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 20px;
                border-bottom: 1px solid var(--border);
            }

            .navbar-nav.mobile-open {
                display: flex;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .nav-link {
                width: 100%;
            }
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: var(--white);
            padding: 80px 0 30px;
            margin-top: 0px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-brand {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .footer-brand span {
            color: var(--primary);
        }

        .footer-desc {
            color: var(--gray);
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .footer-section h4 {
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 16px;
            letter-spacing: 1px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: var(--gray);
            text-decoration: none;
            transition: color 0.2s;
            font-size: 15px;
        }

        .footer-links a:hover {
            color: var(--white);
        }

        .footer-bottom {
            border-top: 1px solid var(--dark-secondary);
            padding-top: 30px;
            text-align: center;
            color: var(--gray);
            font-size: 14px;
        }

        @media (max-width: 968px) {
            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: var(--light-gray);
            color: var(--dark);
        }

        .btn-secondary:hover {
            background: var(--border);
        }
    </style>

    @yield('styles')
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container navbar-container">
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                Get Up<span> & Go</span>
            </a>

            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                ☰
            </button>

            <ul class="navbar-nav" id="navbarMenu">
                @auth
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roadmap.index') }}"
                            class="nav-link {{ request()->routeIs('roadmap.*') ? 'active' : '' }}">
                            Roadmap
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('events.index') }}"
                            class="nav-link {{ request()->routeIs('events.*') ? 'active' : '' }}">
                            Events
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('actions.index') }}"
                            class="nav-link {{ request()->routeIs('actions.*') ? 'active' : '' }}">
                            Actions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('insights.index') }}"
                            class="nav-link {{ request()->routeIs('insights.*') ? 'active' : '' }}">
                            Stories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('resume.builder') }}"
                            class="nav-link {{ request()->routeIs('resume.*') ? 'active' : '' }}">
                            Resume
                        </a>
                    </li>
                    <li class="user-menu">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366F1&color=fff"
                            alt="User Avatar" class="user-avatar" onclick="toggleDropdown()">
                        <div class="dropdown-menu" id="userDropdown">
                            <a href="{{ route('profile.show') }}" class="dropdown-item">My Profile</a>
                            <a href="{{ route('skills.index') }}" class="dropdown-item">My Skills</a>
                            <a href="{{ route('actions.my-actions') }}" class="dropdown-item">My Actions</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li><a href="{{ route('register') }}" class="btn btn-primary">Get Started</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Flash Messages -->
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <div class="footer-brand">Get Up<span> & Go</span></div>
                    <p class="footer-desc">Empowering students to build career-ready skills through actionable steps,
                        real insights, and community support.</p>
                </div>
                <div class="footer-section">
                    <h4>Platform</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('roadmap.index') }}">Roadmap</a></li>
                        <li><a href="{{ route('actions.index') }}">Actions</a></li>
                        <li><a href="{{ route('events.index') }}">Events</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Resources</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('insights.index') }}">Success Stories</a></li>
                        <li><a href="{{ route('chatbot.index') }}">ATS Helper</a></li>
                        <li><a href="{{ route('resume.builder') }}">Resume Builder</a></li>
                        <li><a href="{{ route('skills.index') }}">Skills</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Community</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('insights.create') }}">Share Your Story</a></li>
                        <li><a href="{{ route('events.create') }}">Share an Event</a></li>
                        <li><a href="#">Give Feedback</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Get Up & Go. Built for students, by students.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleDropdown() {
            document.getElementById('userDropdown').classList.toggle('show');
        }

        function toggleMobileMenu() {
            document.getElementById('navbarMenu').classList.toggle('mobile-open');
        }

        // Close dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.matches('.user-avatar')) {
                const dropdowns = document.getElementsByClassName("dropdown-menu");
                for (let i = 0; i < dropdowns.length; i++) {
                    dropdowns[i].classList.remove('show');
                }
            }
        }
    </script>

    @yield('scripts')
</body>

</html>
