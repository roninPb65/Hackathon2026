<?php $__env->startSection('title', 'My Actions'); ?>

<?php $__env->startSection('content'); ?>
    <div class="my-actions-page">
        <section class="page-hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="page-title">My Career Journey</h1>
                    <p class="page-subtitle">Track your progress and celebrate every step forward</p>
                </div>
                <a href="<?php echo e(route('actions.index')); ?>" class="btn btn-primary">Browse Actions</a>
            </div>
        </section>

        <section class="progress-section">
            <div class="container">
                <div class="progress-grid">
                    <div class="progress-card-large">
                        <div class="progress-ring-container">
                            <svg viewBox="0 0 120 120" class="progress-ring">
                                <circle cx="60" cy="60" r="54" fill="none" stroke="#F1F5F9"
                                    stroke-width="8" />
                                <circle cx="60" cy="60" r="54" fill="none" stroke="#6366F1"
                                    stroke-width="8" stroke-dasharray="<?php echo e(min($userActions->count() * 5, 100) * 3.39); ?> 339"
                                    stroke-linecap="round" transform="rotate(-90 60 60)" />
                            </svg>
                            <div class="progress-text">
                                <span class="progress-number"><?php echo e($userActions->count()); ?></span>
                                <span class="progress-label">Actions</span>
                            </div>
                        </div>
                    </div>

                    <div class="stats-mini-grid">
                        <div class="stat-mini">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path
                                    d="M16 28C22.6274 28 28 22.6274 28 16C28 9.37258 22.6274 4 16 4C9.37258 4 4 9.37258 4 16C4 22.6274 9.37258 28 16 28Z"
                                    stroke="#6366F1" stroke-width="2" />
                                <path d="M16 10V16L20 20" stroke="#6366F1" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <div>
                                <div class="stat-mini-value">
                                    <?php echo e($userActions->where('completed_at', '>=', now()->subDays(30))->count()); ?></div>
                                <div class="stat-mini-label">This Month</div>
                            </div>
                        </div>

                        <div class="stat-mini">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path
                                    d="M28 16L16 4L4 16M6 14V26C6 27.1046 6.89543 28 8 28H24C25.1046 28 26 27.1046 26 26V14"
                                    stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div>
                                <div class="stat-mini-value">
                                    <?php echo e($userActions->where('completed_at', '>=', now()->subDays(7))->count()); ?></div>
                                <div class="stat-mini-label">This Week</div>
                            </div>
                        </div>

                        <div class="stat-mini">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path
                                    d="M16 4L18.472 11.528L26 14L18.472 16.472L16 24L13.528 16.472L6 14L13.528 11.528L16 4Z"
                                    stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div>
                                <div class="stat-mini-value">
                                    <?php echo e($userActions->sum(function ($ua) {return $ua->action->impact_score ?? 0;})); ?></div>
                                <div class="stat-mini-label">Impact Points</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="timeline-section">
            <div class="container">
                <h2 class="section-title">Your Timeline</h2>

                <div class="timeline">
                    <?php $__empty_1 = true; $__currentLoopData = $userActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userAction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card">
                                <div class="timeline-header">
                                    <span class="timeline-badge badge-<?php echo e($userAction->action->category); ?>">
                                        <?php echo e(ucfirst($userAction->action->category)); ?>

                                    </span>
                                    <span class="timeline-date"><?php echo e($userAction->completed_at->format('M d, Y')); ?></span>
                                </div>

                                <h3 class="timeline-title"><?php echo e($userAction->action->title); ?></h3>
                                <p class="timeline-description"><?php echo e($userAction->action->description); ?></p>

                                <?php if($userAction->reflection): ?>
                                    <div class="reflection-box">
                                        <h4>Your Reflection</h4>
                                        <p><?php echo e($userAction->reflection); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if($userAction->event): ?>
                                    <div class="event-link-box">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M5 2V4.66667M11 2V4.66667M2.66667 7.33333H13.3333M4 2.66667H12C12.7364 2.66667 13.3333 3.26362 13.3333 4V12C13.3333 12.7364 12.7364 13.3333 12 13.3333H4C3.26362 13.3333 2.66667 12.7364 2.66667 12V4C2.66667 3.26362 3.26362 2.66667 4 2.66667Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                        <span>Related to: <?php echo e($userAction->event->title); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="empty-state">
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none">
                                <circle cx="32" cy="32" r="28" stroke="#CBD5E1" stroke-width="2" />
                                <path d="M32 20V32L40 40" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <h3>No actions logged yet</h3>
                            <p>Start your journey by completing your first action</p>
                            <a href="<?php echo e(route('actions.index')); ?>" class="btn btn-primary">Browse Actions</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>

    <style>
        .my-actions-page {
            background: #FAFBFC;
            min-height: 100vh;
        }

        .progress-section {
            padding: 60px 0;
        }

        .progress-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 32px;
            max-width: 900px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .progress-grid {
                grid-template-columns: 1fr;
            }
        }

        .progress-card-large {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .progress-ring-container {
            position: relative;
            width: 180px;
            height: 180px;
        }

        .progress-ring {
            width: 100%;
            height: 100%;
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .progress-number {
            display: block;
            font-size: 48px;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -1px;
        }

        .progress-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stats-mini-grid {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .stat-mini {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-mini-value {
            font-size: 28px;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: -0.5px;
        }

        .stat-mini-label {
            font-size: 13px;
            font-weight: 500;
            color: var(--gray);
        }

        .timeline-section {
            padding: 60px 0;
        }

        .section-title {
            font-size: 32px;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 40px;
            letter-spacing: -0.8px;
        }

        .timeline {
            position: relative;
            padding-left: 40px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 6px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--border);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 32px;
        }

        .timeline-marker {
            position: absolute;
            left: -40px;
            top: 8px;
            width: 14px;
            height: 14px;
            background: var(--primary);
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 1px var(--border);
        }

        .timeline-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            transition: all 0.2s;
        }

        .timeline-card:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 16px rgba(99, 102, 241, 0.1);
        }

        .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .timeline-badge {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 6px;
            letter-spacing: 0.5px;
        }

        .badge-networking {
            background: #DBEAFE;
            color: #1E40AF;
        }

        .badge-skills {
            background: #E0E7FF;
            color: #4338CA;
        }

        .badge-resume {
            background: #D1FAE5;
            color: #065F46;
        }

        .badge-events {
            background: #FEF3C7;
            color: #92400E;
        }

        .timeline-date {
            font-size: 13px;
            font-weight: 500;
            color: var(--gray);
        }

        .timeline-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .timeline-description {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.6;
        }

        .reflection-box {
            margin-top: 16px;
            padding: 16px;
            background: var(--light-gray);
            border-radius: 8px;
            border-left: 3px solid var(--primary);
        }

        .reflection-box h4 {
            font-size: 13px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .reflection-box p {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.6;
        }

        .event-link-box {
            margin-top: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--primary);
            font-weight: 500;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
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
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackathon\VibeTribe\resources\views/actions/my-actions.blade.php ENDPATH**/ ?>