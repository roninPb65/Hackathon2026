<?php $__env->startSection('title', 'Events'); ?>

<?php $__env->startSection('content'); ?>
    <div class="events-page">
        
        <section class="page-hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="page-title">Career Events</h1>
                    <p class="page-subtitle">Discover workshops, networking events, and opportunities to advance your career
                    </p>
                </div>
                <a href="<?php echo e(route('events.create')); ?>" class="btn btn-primary">Share an Event</a>
            </div>
        </section>

        
        <section class="filter-section">
            <div class="container">
                <div class="filter-bar">
                    <button class="filter-chip active" onclick="filterEvents('all')">All Events</button>
                    <button class="filter-chip" onclick="filterEvents('workshop')">Workshops</button>
                    <button class="filter-chip" onclick="filterEvents('networking')">Networking</button>
                    <button class="filter-chip" onclick="filterEvents('webinar')">Webinars</button>
                    <button class="filter-chip" onclick="filterEvents('career-fair')">Career Fairs</button>
                    <button class="filter-chip" onclick="filterEvents('online')">Online</button>
                </div>
            </div>
        </section>

        
        <section class="events-section">
            <div class="container">
                <div class="events-grid">
                    <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="event-card" data-type="<?php echo e($event->event_type); ?>"
                            data-online="<?php echo e($event->is_online ? 'online' : 'in-person'); ?>">
                            <div class="event-header">
                                <div class="event-date">
                                    <span class="date-day"><?php echo e($event->event_date->format('d')); ?></span>
                                    <span class="date-month"><?php echo e($event->event_date->format('M')); ?></span>
                                </div>
                                <span class="event-type"><?php echo e(ucfirst(str_replace('-', ' ', $event->event_type))); ?></span>
                            </div>

                            <div class="event-content">
                                <h3 class="event-title"><?php echo e($event->title); ?></h3>
                                <p class="event-description"><?php echo e(Str::limit($event->description, 120)); ?></p>

                                <div class="event-meta">
                                    <div class="meta-item">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M8 14.5C11.5899 14.5 14.5 11.5899 14.5 8C14.5 4.41015 11.5899 1.5 8 1.5C4.41015 1.5 1.5 4.41015 1.5 8C1.5 11.5899 4.41015 14.5 8 14.5Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path d="M8 4V8L10.5 10.5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                        </svg>
                                        <span><?php echo e($event->event_date->format('g:i A')); ?></span>
                                    </div>
                                    <div class="meta-item">
                                        <?php if($event->is_online): ?>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <circle cx="8" cy="8" r="6.5" stroke="currentColor"
                                                    stroke-width="1.5" />
                                                <path
                                                    d="M2 8H14M8 2C9.5 4 10 6 10 8C10 10 9.5 12 8 14M8 2C6.5 4 6 6 6 8C6 10 6.5 12 8 14"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                            <span>Online</span>
                                        <?php else: ?>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M8 8.5C9.10457 8.5 10 7.60457 10 6.5C10 5.39543 9.10457 4.5 8 4.5C6.89543 4.5 6 5.39543 6 6.5C6 7.60457 6.89543 8.5 8 8.5Z"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <path
                                                    d="M12.5 6.5C12.5 10.5 8 13.5 8 13.5C8 13.5 3.5 10.5 3.5 6.5C3.5 4.01472 5.51472 2 8 2C10.4853 2 12.5 4.01472 12.5 6.5Z"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                            <span><?php echo e(Str::limit($event->location, 30)); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="event-footer">
                                <div class="event-author">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($event->user->name)); ?>&background=6366F1&color=fff&size=32"
                                        alt="">
                                    <span><?php echo e($event->user->name); ?></span>
                                </div>
                                <a href="<?php echo e(route('events.show', $event)); ?>" class="btn-link">Details →</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="empty-state">
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none">
                                <rect x="8" y="12" width="48" height="40" rx="4" stroke="#CBD5E1"
                                    stroke-width="2" />
                                <path d="M8 20H56M20 12V8M44 12V8" stroke="#CBD5E1" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            <h3>No events found</h3>
                            <p>Be the first to share an upcoming career event</p>
                            <a href="<?php echo e(route('events.create')); ?>" class="btn btn-primary">Share an Event</a>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="pagination-wrapper">
                    <?php echo e($events->links()); ?>

                </div>
            </div>
        </section>
    </div>

    <style>
        .events-page {
            background: #FAFBFC;
            min-height: 100vh;
        }

        .page-hero {
            /* background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%); */
            padding: 80px 0 60px;
            color: white;
            background: url(https://images.pexels.com/photos/860227/pexels-photo-860227.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
            padding: 60px 0;
            color: white;
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: cover;
            background-attachment: fixed;
        }

        .hero-content {
            background: #4b494982;
            padding: 0px 17px;
            border-radius: 27px;
        }

        .page-hero .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 32px;
        }

        .hero-content {
            flex: 1;
        }

        .page-title {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 16px;
            letter-spacing: -1.5px;
        }

        .page-subtitle {
            font-size: 20px;
            opacity: 0.95;
            max-width: 600px;
        }

        @media (max-width: 768px) {
            .page-hero .container {
                flex-direction: column;
                text-align: center;
            }

            .page-title {
                font-size: 40px;
            }
        }

        .filter-section {
            padding: 32px 0;
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .filter-bar {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .filter-chip {
            padding: 10px 20px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 24px;
            font-weight: 500;
            font-size: 14px;
            color: var(--dark);
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-chip:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .filter-chip.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .events-section {
            padding: 60px 0;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .events-grid {
                grid-template-columns: 1fr;
            }
        }

        .event-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.2s;
        }

        .event-card:hover {
            border-color: var(--primary);
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(99, 102, 241, 0.12);
        }

        .event-header {
            padding: 24px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            background: var(--light-gray);
        }

        .event-date {
            background: var(--primary);
            color: white;
            border-radius: 12px;
            padding: 12px 16px;
            text-align: center;
            min-width: 70px;
        }

        .date-day {
            display: block;
            font-size: 28px;
            font-weight: 800;
            line-height: 1;
        }

        .date-month {
            display: block;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 4px;
            opacity: 0.9;
        }

        .event-type {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 6px 12px;
            border-radius: 6px;
            background: white;
            color: var(--primary);
            letter-spacing: 0.5px;
        }

        .event-content {
            padding: 24px;
        }

        .event-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
            letter-spacing: -0.3px;
        }

        .event-description {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--gray);
        }

        .meta-item svg {
            color: var(--gray);
        }

        .event-footer {
            padding: 20px 24px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .event-author {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .event-author img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .event-author span {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray);
        }

        .btn-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s;
        }

        .btn-link:hover {
            color: var(--primary-dark);
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 80px 20px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
        }

        .empty-state svg {
            margin-bottom: 24px;
        }

        .empty-state h3 {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 16px;
            color: var(--gray);
            margin-bottom: 24px;
        }

        .pagination-wrapper {
            display: flex;
            justify-content: center;
        }
    </style>

    <script>
        function filterEvents(type) {
            document.querySelectorAll('.filter-chip').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            const cards = document.querySelectorAll('.event-card');
            cards.forEach(card => {
                if (type === 'all') {
                    card.style.display = 'block';
                } else if (type === 'online') {
                    card.style.display = card.dataset.online === 'online' ? 'block' : 'none';
                } else {
                    card.style.display = card.dataset.type === type ? 'block' : 'none';
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackathon\VibeTribe\resources\views/events/index.blade.php ENDPATH**/ ?>