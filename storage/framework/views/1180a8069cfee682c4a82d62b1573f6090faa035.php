<?php $__env->startSection('title', $event->title); ?>

<?php $__env->startSection('content'); ?>
    <div class="event-detail-page">
        <section class="detail-hero">
            <div class="container">
                <a href="<?php echo e(route('events.index')); ?>" class="back-link">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M12.5 15L7.5 10L12.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Back to Events
                </a>

                <div class="hero-grid">
                    <div class="hero-main">
                        <div class="event-badges">
                            <span class="badge-type"><?php echo e(ucfirst(str_replace('-', ' ', $event->event_type))); ?></span>
                            <?php if($event->is_online): ?>
                                <span class="badge-online">Online</span>
                            <?php endif; ?>
                        </div>
                        <h1 class="detail-title"><?php echo e($event->title); ?></h1>
                        <div class="event-meta-large">
                            <div class="meta-large-item">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M6.25 2.5V5.83333M13.75 2.5V5.83333M3.33333 9.16667H16.6667M5 3.33333H15C16.1046 3.33333 17 4.22876 17 5.33333V15.3333C17 16.4379 16.1046 17.3333 15 17.3333H5C3.89543 17.3333 3 16.4379 3 15.3333V5.33333C3 4.22876 3.89543 3.33333 5 3.33333Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span><?php echo e($event->event_date->format('l, F j, Y')); ?></span>
                            </div>
                            <div class="meta-large-item">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <circle cx="10" cy="10" r="7.5" stroke="currentColor"
                                        stroke-width="1.5" />
                                    <path d="M10 6V10L12.5 12.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                                <span><?php echo e($event->event_date->format('g:i A')); ?></span>
                            </div>
                            <?php if(!$event->is_online && $event->location): ?>
                                <div class="meta-large-item">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M10 10.625C11.3807 10.625 12.5 9.50571 12.5 8.125C12.5 6.74429 11.3807 5.625 10 5.625C8.61929 5.625 7.5 6.74429 7.5 8.125C7.5 9.50571 8.61929 10.625 10 10.625Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path
                                            d="M15.625 8.125C15.625 13.125 10 16.875 10 16.875C10 16.875 4.375 13.125 4.375 8.125C4.375 5.01842 6.89342 2.5 10 2.5C13.1066 2.5 15.625 5.01842 15.625 8.125Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    <span><?php echo e($event->location); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($event->url): ?>
                        <div class="hero-actions">
                            <a href="<?php echo e($event->url); ?>" target="_blank" class="btn btn-primary btn-large">Register Now</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="detail-content">
            <div class="container">
                <div class="content-layout">
                    <div class="content-main">
                        <div class="content-section">
                            <h2 class="content-heading">About This Event</h2>
                            <div class="content-text">
                                <?php echo e($event->description); ?>

                            </div>
                        </div>

                        <div class="action-section">
                            <h3>Mark Your Attendance</h3>
                            <p>Attending this event? Log it as a career action to track your progress!</p>
                            <form action="<?php echo e(route('actions.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="event_id" value="<?php echo e($event->id); ?>">
                                <input type="hidden" name="action_id" value="1">
                                <input type="hidden" name="completed_at" value="<?php echo e(date('Y-m-d')); ?>">
                                <button type="submit" class="btn btn-primary">I'm Attending</button>
                            </form>
                        </div>

                        <div class="share-section">
                            <h3>Share This Event</h3>
                            <div class="share-buttons">
                                <button onclick="shareTwitter()" class="share-btn share-twitter">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M6.29 18.25c7.55 0 11.67-6.25 11.67-11.67v-.53c.8-.59 1.49-1.3 2.04-2.13-.75.33-1.54.55-2.36.64a4.12 4.12 0 0 0 1.8-2.27c-.8.48-1.68.81-2.6 1a4.1 4.1 0 0 0-7 3.74 11.65 11.65 0 0 1-8.45-4.3 4.1 4.1 0 0 0 1.27 5.49C2.01 8.2 1.37 8.03.8 7.7v.05a4.1 4.1 0 0 0 3.3 4.03 4.1 4.1 0 0 1-1.86.07 4.1 4.1 0 0 0 3.83 2.85A8.23 8.23 0 0 1 0 16.4a11.62 11.62 0 0 0 6.29 1.84" />
                                    </svg>
                                    Twitter
                                </button>
                                <button onclick="shareLinkedIn()" class="share-btn share-linkedin">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                                    </svg>
                                    LinkedIn
                                </button>
                                <button onclick="copyLink()" class="share-btn share-copy">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M8.33333 10.8333L11.6667 7.49999M7.49999 5.83333L8.69999 4.63333C9.73332 3.59999 11.4 3.59999 12.4333 4.63333C13.4667 5.66666 13.4667 7.33333 12.4333 8.36666L11.2333 9.56666M9.56666 11.2333L8.36666 12.4333C7.33333 13.4667 5.66666 13.4667 4.63333 12.4333C3.59999 11.4 3.59999 9.73333 4.63333 8.69999L5.83333 7.49999"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                    Copy Link
                                </button>
                            </div>
                        </div>
                    </div>

                    <aside class="content-sidebar">
                        <div class="sidebar-box">
                            <h3 class="sidebar-title">Event Details</h3>
                            <div class="detail-list">
                                <div class="detail-item">
                                    <span class="detail-label">Date</span>
                                    <span class="detail-value"><?php echo e($event->event_date->format('M d, Y')); ?></span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Time</span>
                                    <span class="detail-value"><?php echo e($event->event_date->format('g:i A')); ?></span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Type</span>
                                    <span
                                        class="detail-value"><?php echo e(ucfirst(str_replace('-', ' ', $event->event_type))); ?></span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Format</span>
                                    <span class="detail-value"><?php echo e($event->is_online ? 'Online' : 'In-Person'); ?></span>
                                </div>
                            </div>
                            <?php if($event->url): ?>
                                <a href="<?php echo e($event->url); ?>" target="_blank" class="btn btn-secondary btn-block">Visit
                                    Event Page</a>
                            <?php endif; ?>
                        </div>

                        <div class="sidebar-box">
                            <h3 class="sidebar-title">Shared By</h3>
                            <div class="user-profile">
                                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($event->user->name)); ?>&background=6366F1&color=fff&size=60"
                                    alt="">
                                <div class="user-info">
                                    <div class="user-name"><?php echo e($event->user->name); ?></div>
                                    <div class="user-meta"><?php echo e($event->created_at->diffForHumans()); ?></div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </div>

    <style>
        .event-detail-page {
            background: #FAFBFC;
            min-height: 100vh;
        }

        .detail-hero {
            background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%);
            padding: 40px 0 60px;
            color: white;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 32px;
            opacity: 0.9;
            transition: opacity 0.2s;
        }

        .back-link:hover {
            opacity: 1;
        }

        .hero-grid {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
        }

        .hero-main {
            flex: 1;
        }

        .event-badges {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .badge-type,
        .badge-online {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 6px 14px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.2);
            letter-spacing: 0.5px;
        }

        .detail-title {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 24px;
            letter-spacing: -1.5px;
            line-height: 1.2;
        }

        .event-meta-large {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .meta-large-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 16px;
        }

        .btn-large {
            padding: 16px 32px;
            font-size: 16px;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .hero-grid {
                flex-direction: column;
            }

            .detail-title {
                font-size: 32px;
            }
        }

        .detail-content {
            padding: 60px 0;
        }

        .content-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
        }

        @media (max-width: 968px) {
            .content-layout {
                grid-template-columns: 1fr;
            }
        }

        .content-section {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 24px;
        }

        .content-heading {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
            letter-spacing: -0.5px;
        }

        .content-text {
            font-size: 16px;
            color: var(--gray);
            line-height: 1.8;
            white-space: pre-wrap;
        }

        .action-section {
            background: #EFF6FF;
            border: 1px solid #BFDBFE;
            border-radius: 16px;
            padding: 32px;
            text-align: center;
            margin-bottom: 24px;
        }

        .action-section h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .action-section p {
            color: var(--gray);
            margin-bottom: 20px;
        }

        .share-section {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 32px;
        }

        .share-section h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .share-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .share-btn {
            flex: 1;
            min-width: 140px;
            padding: 12px 20px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .share-twitter {
            color: #1DA1F2;
        }

        .share-linkedin {
            color: #0077B5;
        }

        .share-copy {
            color: var(--gray);
        }

        .sidebar-box {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .detail-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }

        .detail-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .detail-label {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray);
        }

        .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
            text-align: right;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-profile img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .user-name {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .user-meta {
            font-size: 14px;
            color: var(--gray);
        }

        .btn-block {
            width: 100%;
        }
    </style>

    <script>
        function shareTwitter() {
            const text = "Check out this event: <?php echo e($event->title); ?>";
            const url = window.location.href;
            window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`,
                '_blank');
        }

        function shareLinkedIn() {
            const url = window.location.href;
            window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`, '_blank');
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('Link copied to clipboard!');
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackathon\VibeTribe\resources\views/events/show.blade.php ENDPATH**/ ?>