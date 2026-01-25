{{-- resources/views/profile/profile.blade.php --}}
@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="profile-page">
        {{-- Hero Section --}}
        <div class="profile-hero">
            <div class="container">
                <div class="hero-content">
                    <div class="profile-avatar-section">
                        <div class="avatar-wrapper">
                            <div class="avatar-circle">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </div>
                            <button class="edit-avatar-btn" onclick="alert('Avatar upload coming soon!')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path
                                        d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                                    <circle cx="12" cy="13" r="4" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="hero-info">
                        <span class="member-tag">Member since {{ Auth::user()->created_at->format('F Y') }}</span>
                        <h1 class="hero-name">{{ Auth::user()->name }}</h1>
                        <p class="hero-email">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="hero-actions">
                        <button class="btn btn-primary" onclick="toggleEditMode()">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="profile-content">
            <div class="container">
                {{-- Stats Grid --}}
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">🎯</div>
                        <div class="stat-details">
                            <h3>{{ $userActions->count() }}</h3>
                            <p>Actions Completed</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">🎫</div>
                        <div class="stat-details">
                            <h3>{{ $registeredEvents->count() }}</h3>
                            <p>Events Registered</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">⭐</div>
                        <div class="stat-details">
                            <h3>{{ $userActions->sum(function ($ua) {return $ua->action->impact_score ?? 0;}) }}</h3>
                            <p>Impact Points</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">🔥</div>
                        <div class="stat-details">
                            <h3>{{ $userActions->where('completed_at', '>=', now()->subDays(7))->count() }}</h3>
                            <p>This Week</p>
                        </div>
                    </div>
                </div>

                {{-- Edit Profile Form --}}
                <div id="editProfileSection" class="edit-profile-section" style="display: none;">
                    <div class="section-card">
                        <h2 class="section-title">Edit Profile Information</h2>
                        <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
                            @csrf
                            @method('PUT')

                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" id="name" name="name" class="form-input"
                                        value="{{ Auth::user()->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-input"
                                        value="{{ Auth::user()->email }}" required>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-secondary" onclick="toggleEditMode()">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                        <polyline points="17 21 17 13 7 13 7 21" />
                                        <polyline points="7 3 7 8 15 8" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Recent Activity --}}
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="section-title">Recent Activity</h2>
                        @if ($userActions->count() > 5)
                            <a href="{{ route('actions.my-actions') }}" class="view-all-link">
                                View All
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </a>
                        @endif
                    </div>

                    @if ($userActions->count() > 0)
                        <div class="activity-list">
                            @foreach ($userActions->take(5) as $userAction)
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        @if ($userAction->action->category == 'networking')
                                            🤝
                                        @elseif($userAction->action->category == 'skills')
                                            🎓
                                        @elseif($userAction->action->category == 'resume')
                                            📄
                                        @else
                                            📅
                                        @endif
                                    </div>
                                    <div class="activity-content">
                                        <h4>{{ $userAction->action->title }}</h4>
                                        <p class="activity-meta">{{ $userAction->completed_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="activity-impact">
                                        @for ($i = 0; $i < $userAction->action->impact_score; $i++)
                                            <span class="impact-star">⭐</span>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">⚡</div>
                            <h3>No Actions Yet</h3>
                            <p>Start your career journey by completing your first action</p>
                            <a href="{{ route('actions.index') }}" class="btn btn-primary">Browse Actions</a>
                        </div>
                    @endif
                </div>

                {{-- Upcoming Events --}}
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="section-title">Upcoming Events</h2>
                    </div>

                    @if ($registeredEvents->count() > 0)
                        <div class="events-grid">
                            @foreach ($registeredEvents as $registration)
                                <div class="event-card">
                                    <div class="event-date-badge">
                                        <span
                                            class="date-month">{{ \Carbon\Carbon::parse($registration->event->event_date)->format('M') }}</span>
                                        <span
                                            class="date-day">{{ \Carbon\Carbon::parse($registration->event->event_date)->format('d') }}</span>
                                    </div>
                                    <div class="event-content">
                                        <h4>{{ $registration->event->title }}</h4>
                                        <div class="event-meta">
                                            <span class="meta-item">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                                    <circle cx="12" cy="10" r="3" />
                                                </svg>
                                                {{ $registration->event->location ?? 'Online' }}
                                            </span>
                                            <span class="meta-item">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <polyline points="12 6 12 12 16 14" />
                                                </svg>
                                                {{ \Carbon\Carbon::parse($registration->event->event_date)->format('g:i A') }}
                                            </span>
                                        </div>
                                    </div>
                                    <a href="{{ route('events.show', $registration->event) }}" class="event-link">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M5 12h14M12 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">🎪</div>
                            <h3>No Events Registered</h3>
                            <p>Discover and join upcoming career events</p>
                            <a href="{{ route('events.index') }}" class="btn btn-primary">Browse Events</a>
                        </div>
                    @endif
                </div>

                {{-- Achievements --}}
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="section-title">Achievements & Badges</h2>
                    </div>

                    <div class="achievements-grid">
                        <div class="achievement-card {{ $userActions->count() >= 1 ? 'unlocked' : 'locked' }}">
                            <div class="achievement-icon">✨</div>
                            <div class="achievement-info">
                                <h4>First Step</h4>
                                <p>Complete your first action</p>
                            </div>
                            @if ($userActions->count() >= 1)
                                <div class="achievement-badge">Unlocked</div>
                            @endif
                        </div>

                        <div class="achievement-card {{ $userActions->count() >= 5 ? 'unlocked' : 'locked' }}">
                            <div class="achievement-icon">🌟</div>
                            <div class="achievement-info">
                                <h4>Go-Getter</h4>
                                <p>Complete 5 actions</p>
                            </div>
                            @if ($userActions->count() >= 5)
                                <div class="achievement-badge">Unlocked</div>
                            @endif
                        </div>

                        <div class="achievement-card {{ $userActions->count() >= 10 ? 'unlocked' : 'locked' }}">
                            <div class="achievement-icon">🏆</div>
                            <div class="achievement-info">
                                <h4>Career Champion</h4>
                                <p>Complete 10 actions</p>
                            </div>
                            @if ($userActions->count() >= 10)
                                <div class="achievement-badge">Unlocked</div>
                            @endif
                        </div>

                        <div class="achievement-card {{ $registeredEvents->count() >= 3 ? 'unlocked' : 'locked' }}">
                            <div class="achievement-icon">🎫</div>
                            <div class="achievement-info">
                                <h4>Event Enthusiast</h4>
                                <p>Register for 3 events</p>
                            </div>
                            @if ($registeredEvents->count() >= 3)
                                <div class="achievement-badge">Unlocked</div>
                            @endif
                        </div>

                        <div
                            class="achievement-card {{ $userActions->where('action.category', 'networking')->count() >= 5 ? 'unlocked' : 'locked' }}">
                            <div class="achievement-icon">🤝</div>
                            <div class="achievement-info">
                                <h4>Networking Pro</h4>
                                <p>Complete 5 networking actions</p>
                            </div>
                            @if ($userActions->where('action.category', 'networking')->count() >= 5)
                                <div class="achievement-badge">Unlocked</div>
                            @endif
                        </div>

                        <div
                            class="achievement-card {{ $userActions->where('action.category', 'skills')->count() >= 5 ? 'unlocked' : 'locked' }}">
                            <div class="achievement-icon">🎓</div>
                            <div class="achievement-info">
                                <h4>Skills Master</h4>
                                <p>Complete 5 skill-building actions</p>
                            </div>
                            @if ($userActions->where('action.category', 'skills')->count() >= 5)
                                <div class="achievement-badge">Unlocked</div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Account Settings --}}
                <div class="section-card settings-section">
                    <div class="section-header">
                        <h2 class="section-title">Account Settings</h2>
                    </div>

                    <div class="settings-list">
                        <div class="setting-item">
                            <div class="setting-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                            <div class="setting-content">
                                <h4>Change Password</h4>
                                <p>Update your account password</p>
                            </div>
                            <button class="btn btn-outline"
                                onclick="alert('Password change coming soon!')">Change</button>
                        </div>

                        <div class="setting-item">
                            <div class="setting-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                                </svg>
                            </div>
                            <div class="setting-content">
                                <h4>Email Notifications</h4>
                                <p>Manage your email preferences</p>
                            </div>
                            <button class="btn btn-outline"
                                onclick="alert('Notification settings coming soon!')">Manage</button>
                        </div>

                        <div class="setting-item danger-item">
                            <div class="setting-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <polyline points="3 6 5 6 21 6" />
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                </svg>
                            </div>
                            <div class="setting-content">
                                <h4>Delete Account</h4>
                                <p>Permanently delete your account and all data</p>
                            </div>
                            <button class="btn btn-danger" onclick="confirmDelete()">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .profile-page {
            background: #f8f9fa;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Profile Hero */
        .profile-hero {
            background: linear-gradient(135deg, #6366f1 0%, #53398f 100%);
            padding: 80px 0 60px;
            position: relative;
            overflow: hidden;
        }

        .profile-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .profile-avatar-section {
            flex-shrink: 0;
        }

        .avatar-wrapper {
            position: relative;
        }

        .avatar-circle {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: 800;
            color: #6366f1;
            border: 4px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.15);
        }

        .edit-avatar-btn {
            position: absolute;
            bottom: 4px;
            right: 4px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #fff;
            border: 3px solid #6366f1;
            color: #6366f1;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .edit-avatar-btn:hover {
            background: #6366f1;
            color: #fff;
            transform: scale(1.1);
        }

        .hero-info {
            flex: 1;
        }

        .member-tag {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
            color: #fff;
            text-transform: uppercase;
        }

        .hero-name {
            font-size: 48px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 12px;
            color: #fff;
        }

        .hero-email {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.9);
        }

        .hero-actions {
            flex-shrink: 0;
        }

        /* Profile Content */
        .profile-content {
            padding: 60px 0 120px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-bottom: 60px;
            margin-top: -60px;
            position: relative;
            z-index: 10;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 32px 24px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .stat-card:hover {
            border-color: #6366f1;
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(99, 102, 241, 0.15);
        }

        .stat-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .stat-details h3 {
            font-size: 36px;
            font-weight: 800;
            color: #6366f1;
            margin-bottom: 8px;
        }

        .stat-details p {
            font-size: 14px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        /* Section Card */
        .section-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 24px;
            padding: 48px;
            margin-bottom: 32px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
        }

        .view-all-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #6366f1;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .view-all-link:hover {
            gap: 12px;
        }

        /* Form */
        .profile-form {
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 16px;
            color: #1f2937;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #6366f1;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .form-actions {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
        }

        /* Activity List */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 24px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            border-color: #6366f1;
            background: #fff;
            transform: translateX(4px);
        }

        .activity-icon {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            font-size: 28px;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-content h4 {
            font-size: 16px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 6px;
        }

        .activity-meta {
            font-size: 14px;
            color: #6b7280;
        }

        .activity-impact {
            display: flex;
            gap: 4px;
        }

        .impact-star {
            font-size: 16px;
        }

        /* Events Grid */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .event-card {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 24px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .event-card:hover {
            border-color: #6366f1;
            background: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.1);
        }

        .event-date-badge {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            border-radius: 12px;
            flex-shrink: 0;
        }

        .date-month {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: rgba(255, 255, 255, 0.8);
        }

        .date-day {
            font-size: 28px;
            font-weight: 800;
            color: #fff;
            line-height: 1;
        }

        .event-content {
            flex: 1;
        }

        .event-content h4 {
            font-size: 16px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #6b7280;
        }

        .event-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(99, 102, 241, 0.1);
            border-radius: 8px;
            color: #6366f1;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .event-link:hover {
            background: #6366f1;
            color: #fff;
        }

        /* Achievements Grid */
        .achievements-grid {
            display: grid;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        .setting-item {
            flex-wrap: wrap;
        }

        .setting-item .btn {
            width: 100%;
        }
        }

        @media (max-width: 480px) {
            .avatar-circle {
                width: 100px;
                height: 100px;
                font-size: 40px;
            }

            .edit-avatar-btn {
                width: 36px;
                height: 36px;
            }

            .hero-name {
                font-size: 28px;
            }

            .event-card {
                flex-direction: column;
                text-align: center;
            }

            .event-link {
                align-self: stretch;
            }
        }

        /* Animation */
        .edit-profile-section {
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Scroll Animations */
        .stat-card,
        .activity-item,
        .event-card,
        .achievement-card {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stat-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stat-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stat-card:nth-child(4) {
            animation-delay: 0.4s;
        }
    </style>

    <script>
        function toggleEditMode() {
            const editSection = document.getElementById('editProfileSection');
            if (editSection.style.display === 'none') {
                editSection.style.display = 'block';
                setTimeout(() => {
                    editSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 100);
            } else {
                editSection.style.display = 'none';
            }
        }

        function confirmDelete() {
            if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                if (confirm('This will permanently delete all your data. Are you absolutely sure?')) {
                    alert('Account deletion feature coming soon!');
                }
            }
        }

        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe section cards
        document.querySelectorAll('.section-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
@endsection
