<?php $__env->startSection('title', 'Career Actions'); ?>

<?php $__env->startSection('content'); ?>
    <div class="actions-page">
        <section class="page-hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="page-title">Career Actions</h1>
                    <p class="page-subtitle">Take meaningful steps toward your dream job. Every action counts.</p>
                </div>
                <a href="<?php echo e(route('actions.my-actions')); ?>" class="btn btn-primary">My Progress</a>
            </div>
        </section>

        <section class="stats-bar">
            <div class="container">
                <div class="stats-grid-inline">
                    <div class="stat-inline">
                        <span class="stat-value-inline"><?php echo e($actions->count()); ?></span>
                        <span class="stat-label-inline">Available Actions</span>
                    </div>
                    <div class="stat-inline">
                        <span class="stat-value-inline"><?php echo e(count($completedActionIds)); ?></span>
                        <span class="stat-label-inline">Completed</span>
                    </div>
                    <div class="stat-inline">
                        <span
                            class="stat-value-inline"><?php echo e($actions->count() > 0 ? round((count($completedActionIds) / $actions->count()) * 100) : 0); ?>%</span>
                        <span class="stat-label-inline">Progress</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="filter-section">
            <div class="container">
                <div class="filter-bar">
                    <button class="filter-chip btn btn-primary active" onclick="filterActions('all')">All Actions</button>
                    <button class="filter-chip btn btn-primary" onclick="filterActions('networking')">Networking</button>
                    <button class="filter-chip btn btn-primary" onclick="filterActions('skills')">Skills</button>
                    <button class="filter-chip btn btn-primary" onclick="filterActions('resume')">Resume</button>
                    <button class="filter-chip btn btn-primary" onclick="filterActions('events')">Events</button>
                </div>
            </div>
        </section>

        <section class="actions-section">
            <div class="container">
                <div class="actions-grid">
                    <?php $__empty_1 = true; $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="action-card-full <?php echo e(in_array($action->id, $completedActionIds) ? 'completed' : ''); ?>"
                            data-category="<?php echo e($action->category); ?>">
                            <div class="action-header-full">
                                <span class="action-badge-full badge-<?php echo e($action->category); ?>">
                                    <?php echo e(ucfirst($action->category)); ?>

                                </span>
                                <div class="impact-display">
                                    <?php for($i = 0; $i < min($action->impact_score, 5); $i++): ?>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="#FBBF24">
                                            <path
                                                d="M8 1.5L10.163 5.883L15 6.633L11.5 10.037L12.326 14.854L8 12.583L3.674 14.854L4.5 10.037L1 6.633L5.837 5.883L8 1.5Z" />
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                            </div>

                            <h3 class="action-title-full"><?php echo e($action->title); ?></h3>
                            <p class="action-description-full"><?php echo e($action->description); ?></p>

                            <div class="action-footer-full">
                                <?php if(in_array($action->id, $completedActionIds)): ?>
                                    <button class="btn-completed" disabled>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M3.5 8.5L6.5 11.5L12.5 5.5" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Completed
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-primary"
                                        onclick="openModal(<?php echo e($action->id); ?>, '<?php echo e(addslashes($action->title)); ?>')">
                                        Mark as Done
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="empty-state">No actions available</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>

    
    <div id="actionModal" class="modal" style="display: none;">
        <div class="modal-overlay" onclick="closeModal()"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h3>Log Your Action</h3>
                <button class="modal-close" onclick="closeModal()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </div>

            <form action="<?php echo e(route('actions.store')); ?>" method="POST" class="modal-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="modalActionId" name="action_id">

                <p class="modal-text">You're logging: <strong id="modalActionTitle"></strong></p>

                <div class="form-group">
                    <label class="form-label">Completion Date</label>
                    <input type="date" name="completed_at" class="form-input" value="<?php echo e(date('Y-m-d')); ?>"
                        max="<?php echo e(date('Y-m-d')); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Reflection (Optional)</label>
                    <textarea name="reflection" class="form-textarea" rows="4"
                        placeholder="What did you learn? How will this help your career?"></textarea>
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Log Action</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .actions-page {
            background: #FAFBFC;
            min-height: 100vh;
        }

        .stats-bar {
            background: white;
            border-bottom: 1px solid var(--border);
            padding: 24px 0;
        }

        .stats-grid-inline {
            display: flex;
            gap: 48px;
            justify-content: center;
        }

        .stat-inline {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .stat-value-inline {
            font-size: 36px;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -1px;
        }

        .stat-label-inline {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .actions-section {
            padding: 60px 0;
        }

        section.filter-section {
            padding: 50px 0px;
        }

        .actions-section {
            /* background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%); */

            background: url(https://images.pexels.com/photos/1054218/pexels-photo-1054218.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
            padding: 60px 0;
            color: white;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        @media (max-width: 768px) {
            .actions-grid {
                grid-template-columns: 1fr;
            }
        }

        .action-card-full {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.2s;
            position: relative;
        }

        .action-card-full:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.12);
        }

        .action-card-full.completed {
            opacity: 0.7;
            background: var(--light-gray);
        }

        .action-card-full.completed::after {
            content: '✓';
            position: absolute;
            top: 16px;
            right: 16px;
            width: 32px;
            height: 32px;
            background: var(--secondary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
        }

        .action-header-full {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .action-badge-full {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 6px 12px;
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

        .impact-display {
            display: flex;
            gap: 2px;
        }

        .action-title-full {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
            letter-spacing: -0.3px;
        }

        .action-description-full {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .action-footer-full {
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .btn-completed {
            width: 100%;
            padding: 12px;
            background: var(--light-gray);
            border: 1px solid var(--border);
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: not-allowed;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            position: relative;
            background: white;
            border-radius: 16px;
            max-width: 500px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px;
            border-bottom: 1px solid var(--border);
        }

        .modal-header h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
        }

        .modal-close {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--gray);
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: var(--dark);
        }

        .modal-form {
            padding: 24px;
        }

        .modal-text {
            font-size: 15px;
            color: var(--gray);
            margin-bottom: 24px;
        }

        .modal-text strong {
            color: var(--dark);
            font-weight: 600;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .modal-actions .btn {
            flex: 1;
        }
    </style>

    <script>
        function filterActions(category) {
            document.querySelectorAll('.filter-chip').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            document.querySelectorAll('.action-card-full').forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function openModal(actionId, actionTitle) {
            document.getElementById('modalActionId').value = actionId;
            document.getElementById('modalActionTitle').textContent = actionTitle;
            document.getElementById('actionModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('actionModal').style.display = 'none';
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackathon\VibeTribe\resources\views/actions/index.blade.php ENDPATH**/ ?>