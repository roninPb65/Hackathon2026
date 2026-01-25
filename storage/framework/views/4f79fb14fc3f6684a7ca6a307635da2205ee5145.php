<?php $__env->startSection('content'); ?>
    <div class="dashboard-page">
        
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Welcome back, <?php echo e(Auth::user()->name); ?>!</h1>
                    <p class="hero-subtitle">Your career journey continues. Let's make today count.</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-value"><?php echo e($userProgress); ?></div>
                        <div class="stat-label">Actions Completed</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value"><?php echo e(Auth::user()->skills->count()); ?></div>
                        <div class="stat-label">Skills Tracked</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value"><?php echo e($upcomingEvents->count()); ?></div>
                        <div class="stat-label">Upcoming Events</div>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="main-content">
            <div class="container">
                <div class="content-grid">
                    
                    <div class="primary-column">
                        
                        <div class="quick-actions-section">
                            <h2 class="section-title">Quick Actions</h2>
                            <div class="quick-actions-grid">
                                <a href="<?php echo e(route('roadmap.index')); ?>" class="quick-action-card">
                                    <div class="action-icon">🗺️</div>
                                    <div class="action-info">
                                        <h3>View Roadmap</h3>
                                        <p>Track your progress</p>
                                    </div>
                                </a>
                                <a href="<?php echo e(route('events.index')); ?>" class="quick-action-card">
                                    <div class="action-icon">📅</div>
                                    <div class="action-info">
                                        <h3>Find Events</h3>
                                        <p>Discover opportunities</p>
                                    </div>
                                </a>
                                <a href="<?php echo e(route('resume.builder')); ?>" class="quick-action-card">
                                    <div class="action-icon">📄</div>
                                    <div class="action-info">
                                        <h3>Build Resume</h3>
                                        <p>Create ATS-friendly CV</p>
                                    </div>
                                </a>
                                <a href="<?php echo e(route('chatbot.index')); ?>" class="quick-action-card">
                                    <div class="action-icon">🤖</div>
                                    <div class="action-info">
                                        <h3>ATS Helper</h3>
                                        <p>Get resume tips</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        
                        <div class="section">
                            <div class="section-header">
                                <h2 class="section-title">Recommended for You</h2>
                                <a href="<?php echo e(route('actions.index')); ?>" class="view-all">View All →</a>
                            </div>
                            <div class="actions-list">
                                <?php $__empty_1 = true; $__currentLoopData = $recommendedActions->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="action-item">
                                        <div class="action-content">
                                            <div class="action-header-inline">
                                                <span class="action-badge action-badge-<?php echo e($action->category); ?>">
                                                    <?php echo e(ucfirst($action->category)); ?>

                                                </span>
                                                <div class="impact-stars">
                                                    <?php for($i = 0; $i < min($action->impact_score, 5); $i++): ?>
                                                        <span class="star">★</span>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                            <h3 class="action-title-inline"><?php echo e($action->title); ?></h3>
                                            <p class="action-desc"><?php echo e(Str::limit($action->description, 100)); ?></p>
                                        </div>
                                        <button class="btn-action" onclick="logAction(<?php echo e($action->id); ?>)">
                                            Mark Done
                                        </button>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p class="empty-text">No actions available</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="section">
                            <div class="section-header">
                                <h2 class="section-title">Upcoming Events</h2>
                                <a href="<?php echo e(route('events.index')); ?>" class="view-all">View All →</a>
                            </div>
                            <div class="events-list">
                                <?php $__empty_1 = true; $__currentLoopData = $upcomingEvents->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <a href="<?php echo e(route('events.show', $event)); ?>" class="event-card-mini">
                                        <div class="event-date-mini">
                                            <div class="date-day"><?php echo e($event->event_date->format('d')); ?></div>
                                            <div class="date-month"><?php echo e($event->event_date->format('M')); ?></div>
                                        </div>
                                        <div class="event-info-mini">
                                            <span class="event-badge"><?php echo e($event->event_type); ?></span>
                                            <h4 class="event-title-mini"><?php echo e($event->title); ?></h4>
                                            <p class="event-meta-mini">
                                                <?php if($event->is_online): ?>
                                                    Online Event
                                                <?php else: ?>
                                                    <?php echo e(Str::limit($event->location, 40)); ?>

                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p class="empty-text">No upcoming events</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="sidebar-column">
                        
                        <div class="sidebar-card progress-card">
                            <h3 class="card-title">Your Progress</h3>
                            <div class="progress-ring">
                                <svg viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="45" fill="none" stroke="#F1F5F9"
                                        stroke-width="8" />
                                    <circle cx="50" cy="50" r="45" fill="none" stroke="#6366F1"
                                        stroke-width="8" stroke-dasharray="<?php echo e(min($userProgress * 5, 100) * 2.827); ?> 282.7"
                                        stroke-linecap="round" transform="rotate(-90 50 50)" />
                                    <text x="50" y="50" text-anchor="middle" dy="7" fill="#0F172A" font-size="20"
                                        font-weight="700">
                                        <?php echo e(min($userProgress * 5, 100)); ?>%
                                    </text>
                                </svg>
                            </div>
                            <p class="progress-text"><?php echo e($userProgress); ?> actions completed</p>
                            <a href="<?php echo e(route('roadmap.index')); ?>" class="btn btn-primary btn-block">View Roadmap</a>
                        </div>

                        
                        <div class="sidebar-card">
                            <h3 class="card-title">Success Stories</h3>
                            <?php $__empty_1 = true; $__currentLoopData = $recentInsights->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <a href="<?php echo e(route('insights.show', $insight)); ?>" class="story-mini">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($insight->user->name)); ?>&background=6366F1&color=fff&size=40"
                                        alt="<?php echo e($insight->user->name); ?>" class="story-avatar">
                                    <div class="story-info">
                                        <div class="story-name"><?php echo e($insight->user->name); ?></div>
                                        <div class="story-job"><?php echo e($insight->job_title); ?></div>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="empty-text-small">No stories yet</p>
                            <?php endif; ?>
                            <a href="<?php echo e(route('insights.index')); ?>" class="link-primary">Read More →</a>
                        </div>

                        
                        <div class="sidebar-card cta-card">
                            <h3 class="card-title">Got a Job?</h3>
                            <p class="cta-text">Share your success story and inspire others!</p>
                            <a href="<?php echo e(route('insights.create')); ?>" class="btn btn-secondary btn-block">Share Story</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .dashboard-page {
            background: #FAFBFC;
            min-height: 100vh;
        }

        /* .hero-section {
                        background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%);
                        padding: 60px 0;
                        color: white;
                    } */

        .hero-section {
            background: url(https://images.pexels.com/photos/346529/pexels-photo-346529.jpeg);
            padding: 60px 0;
            color: white;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }

        .hero-content {
            text-align: center;
            margin-bottom: 40px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 20px;
            opacity: 0.95;
            font-weight: 400;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 24px;
            max-width: 900px;
            margin: 0 auto;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 32px 24px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-value {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .stat-label {
            font-size: 14px;
            font-weight: 500;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .main-content {
            padding: 60px 0;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 32px;
        }

        @media (max-width: 968px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 36px;
            }
        }

        .section {
            background: white;
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 24px;
            border: 1px solid var(--border);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
            letter-spacing: -0.5px;
        }

        .view-all {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s;
        }

        .view-all:hover {
            color: var(--primary-dark);
        }

        .quick-actions-section {
            margin-bottom: 32px;
        }

        .quick-actions-section .section-title {
            margin-bottom: 24px;
        }

        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .quick-action-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.2s;
        }

        .quick-action-card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.15);
        }

        .action-icon {
            font-size: 32px;
        }

        .action-info h3 {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .action-info p {
            font-size: 13px;
            color: var(--gray);
        }

        .actions-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .action-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 24px;
            padding: 20px;
            background: var(--light-gray);
            border-radius: 12px;
            transition: background 0.2s;
        }

        .action-item:hover {
            background: #E2E8F0;
        }

        .action-content {
            flex: 1;
        }

        .action-header-inline {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }

        .action-badge {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 6px;
            letter-spacing: 0.5px;
        }

        .action-badge-networking {
            background: #DBEAFE;
            color: #1E40AF;
        }

        .action-badge-skills {
            background: #E0E7FF;
            color: #4338CA;
        }

        .action-badge-resume {
            background: #D1FAE5;
            color: #065F46;
        }

        .action-badge-events {
            background: #FEF3C7;
            color: #92400E;
        }

        .impact-stars {
            display: flex;
            gap: 2px;
        }

        .star {
            color: #FBBF24;
            font-size: 14px;
        }

        .action-title-inline {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .action-desc {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.6;
        }

        .btn-action {
            padding: 10px 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.2s;
        }

        .btn-action:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .events-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .event-card-mini {
            display: flex;
            gap: 16px;
            padding: 16px;
            background: var(--light-gray);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.2s;
        }

        .event-card-mini:hover {
            background: #E2E8F0;
            transform: translateX(4px);
        }

        .event-date-mini {
            background: var(--primary);
            color: white;
            border-radius: 10px;
            padding: 12px;
            text-align: center;
            min-width: 60px;
        }

        .date-day {
            font-size: 24px;
            font-weight: 800;
            line-height: 1;
        }

        .date-month {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .event-info-mini {
            flex: 1;
        }

        .event-badge {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 6px;
            background: #E0E7FF;
            color: #4338CA;
            display: inline-block;
            margin-bottom: 8px;
        }

        .event-title-mini {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .event-meta-mini {
            font-size: 13px;
            color: var(--gray);
        }

        .sidebar-column {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .sidebar-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .progress-card {
            text-align: center;
        }

        .progress-ring {
            width: 140px;
            height: 140px;
            margin: 0 auto 20px;
        }

        .progress-text {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 20px;
        }

        .story-mini {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            transition: background 0.2s;
            margin-bottom: 12px;
        }

        .story-mini:hover {
            background: var(--light-gray);
        }

        .story-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .story-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--dark);
        }

        .story-job {
            font-size: 13px;
            color: var(--gray);
        }

        .link-primary {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            margin-top: 8px;
        }

        .cta-card {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
        }

        .cta-card .card-title {
            color: white;
        }

        .cta-text {
            font-size: 14px;
            margin-bottom: 16px;
            opacity: 0.95;
        }

        .btn-block {
            width: 100%;
            text-align: center;
        }

        .empty-text {
            color: var(--gray);
            font-size: 14px;
            text-align: center;
            padding: 24px;
        }

        .empty-text-small {
            color: var(--gray);
            font-size: 13px;
            padding: 12px;
        }
    </style>

    <script>
        function logAction(actionId) {
            if (confirm('Mark this action as completed?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '<?php echo e(route('actions.store')); ?>';

                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '<?php echo e(csrf_token()); ?>';

                const action = document.createElement('input');
                action.type = 'hidden';
                action.name = 'action_id';
                action.value = actionId;

                const date = document.createElement('input');
                date.type = 'hidden';
                date.name = 'completed_at';
                date.value = new Date().toISOString().split('T')[0];

                form.appendChild(csrf);
                form.appendChild(action);
                form.appendChild(date);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackathon\VibeTribe\resources\views/dashboard.blade.php ENDPATH**/ ?>