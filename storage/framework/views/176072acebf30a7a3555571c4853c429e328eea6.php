<?php $__env->startSection('title', 'Success Stories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="insights-page">
        <section class="page-hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="page-title">Success Stories</h1>
                    <p class="page-subtitle">Learn from graduates who landed their dream jobs</p>
                </div>
                <a href="<?php echo e(route('insights.create')); ?>" class="btn btn-primary">Share Your Story</a>
            </div>
        </section>

        <section class="stats-bar">
            <div class="container">
                <div class="stats-grid-inline">
                    <div class="stat-inline">
                        <span class="stat-value-inline"><?php echo e($insights->total()); ?></span>
                        <span class="stat-label-inline">Success Stories</span>
                    </div>
                    <div class="stat-inline">
                        <span class="stat-value-inline"><?php echo e(number_format($insights->avg('time_to_hire'), 1)); ?></span>
                        <span class="stat-label-inline">Avg. Months</span>
                    </div>
                    <div class="stat-inline">
                        <span class="stat-value-inline">100%</span>
                        <span class="stat-label-inline">Real People</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="insights-section">
            <div class="container">
                <div class="insights-grid">
                    <?php $__empty_1 = true; $__currentLoopData = $insights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="insight-card">
                            <div class="insight-header">
                                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($insight->user->name)); ?>&background=6366F1&color=fff&size=64"
                                    alt="<?php echo e($insight->user->name); ?>" class="insight-avatar">
                                <div class="insight-user-info">
                                    <h3 class="user-name"><?php echo e($insight->user->name); ?></h3>
                                    <p class="job-title"><?php echo e($insight->job_title); ?></p>
                                    <?php if($insight->company): ?>
                                        <p class="company-name"><?php echo e($insight->company); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="time-badge"><?php echo e($insight->time_to_hire); ?>mo</div>
                            </div>

                            <div class="insight-content">
                                <p class="story-snippet"><?php echo e(Str::limit($insight->success_story, 160)); ?></p>

                                <?php if(is_array($insight->key_actions) && count($insight->key_actions) > 0): ?>
                                    <div class="key-actions">
                                        <h4>What Helped:</h4>
                                        <ul>
                                            <?php $__currentLoopData = array_slice($insight->key_actions, 0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($action); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="insight-footer">
                                <span class="posted-time"><?php echo e($insight->created_at->diffForHumans()); ?></span>
                                <a href="<?php echo e(route('insights.show', $insight)); ?>" class="btn-link">Read More →</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="empty-state">
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none">
                                <circle cx="32" cy="24" r="12" stroke="#CBD5E1" stroke-width="2" />
                                <path d="M12 56C12 43.8497 21.8497 34 34 34C46.1503 34 56 43.8497 56 56" stroke="#CBD5E1"
                                    stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <h3>No stories yet</h3>
                            <p>Be the first to share your success story and inspire others</p>
                            <a href="<?php echo e(route('insights.create')); ?>" class="btn btn-primary">Share Your Story</a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="pagination-wrapper">
                    <?php echo e($insights->links()); ?>

                </div>
            </div>
        </section>
    </div>

    <style>
        .insights-page {
            background: #FAFBFC;
            min-height: 100vh;
        }

        .insights-section {
            padding: 60px 0;
        }

        .insights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .insights-grid {
                grid-template-columns: 1fr;
            }
        }

        .insight-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.2s;
        }

        .insight-card:hover {
            border-color: var(--primary);
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(99, 102, 241, 0.12);
        }

        .insight-header {
            padding: 24px;
            background: var(--light-gray);
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .insight-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .insight-user-info {
            flex: 1;
        }

        .user-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
            letter-spacing: -0.3px;
        }

        .job-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 4px;
        }

        .company-name {
            font-size: 13px;
            color: var(--gray);
        }

        .time-badge {
            background: var(--secondary);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .insight-content {
            padding: 24px;
        }

        .story-snippet {
            font-size: 15px;
            color: var(--gray);
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .key-actions {
            background: var(--light-gray);
            border-radius: 8px;
            padding: 16px;
        }

        .key-actions h4 {
            font-size: 13px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .key-actions ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .key-actions li {
            font-size: 14px;
            color: var(--gray);
            padding: 4px 0 4px 20px;
            position: relative;
        }

        .key-actions li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--primary);
            font-weight: 700;
        }

        .insight-footer {
            padding: 20px 24px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .posted-time {
            font-size: 13px;
            color: var(--gray);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackathon\VibeTribe\resources\views/insights/index.blade.php ENDPATH**/ ?>