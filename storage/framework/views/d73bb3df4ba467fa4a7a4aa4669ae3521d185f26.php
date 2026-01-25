<?php $__env->startSection('title', $insight->job_title . ' - Success Story'); ?>

<?php $__env->startSection('content'); ?>
    <div class="insight-detail-page">
        <div class="container">
            <a href="<?php echo e(route('insights.index')); ?>" class="back-button">
                ← Back to Stories
            </a>

            <div class="insight-detail-container">
                
                <div class="hero-section">
                    <div class="hero-content">
                        <div class="user-profile">
                            <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($insight->user->name)); ?>&background=667eea&color=fff&size=120"
                                alt="<?php echo e($insight->user->name); ?>" class="profile-avatar">
                            <div class="profile-info">
                                <h1 class="profile-name"><?php echo e($insight->user->name); ?></h1>
                                <h2 class="job-title"><?php echo e($insight->job_title); ?></h2>
                                <?php if($insight->company): ?>
                                    <p class="company-name">@ <?php echo e($insight->company); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="stats-badges">
                            <div class="stat-badge stat-time">
                                <span class="badge-icon">⏱️</span>
                                <div class="badge-content">
                                    <span class="badge-number"><?php echo e($insight->time_to_hire); ?></span>
                                    <span class="badge-label"><?php echo e(Str::plural('Month', $insight->time_to_hire)); ?></span>
                                </div>
                            </div>
                            <div class="stat-badge stat-date">
                                <span class="badge-icon">📅</span>
                                <div class="badge-content">
                                    <span class="badge-label">Shared</span>
                                    <span class="badge-text"><?php echo e($insight->created_at->format('M Y')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-layout">
                    
                    <div class="main-content">
                        
                        <div class="story-section">
                            <h2 class="section-title">📖 The Journey</h2>
                            <div class="story-content">
                                <?php echo nl2br(e($insight->success_story)); ?>

                            </div>
                        </div>

                        
                        <?php if(is_array($insight->key_actions) && count($insight->key_actions) > 0): ?>
                            <div class="actions-section">
                                <h2 class="section-title">🎯 What Actually Worked</h2>
                                <p class="section-subtitle">These are the specific actions that made a difference:</p>
                                <div class="actions-grid">
                                    <?php $__currentLoopData = $insight->key_actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="action-item">
                                            <span class="action-check">✓</span>
                                            <span class="action-text"><?php echo e($action); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <div class="share-section">
                            <h3>📢 Found This Helpful?</h3>
                            <p>Share this story with others who might benefit from it!</p>
                            <div class="share-buttons">
                                <button onclick="shareOnTwitter()" class="share-btn share-twitter">
                                    🐦 Share on Twitter
                                </button>
                                <button onclick="shareOnLinkedIn()" class="share-btn share-linkedin">
                                    💼 Share on LinkedIn
                                </button>
                                <button onclick="copyLink()" class="share-btn share-copy">
                                    🔗 Copy Link
                                </button>
                            </div>
                        </div>
                    </div>

                    
                    <div class="sidebar">
                        
                        <div class="sidebar-card insights-card">
                            <h3 class="card-title">📊 Quick Insights</h3>
                            <div class="insight-items">
                                <div class="insight-item">
                                    <span class="insight-label">Job Search Duration</span>
                                    <span class="insight-value"><?php echo e($insight->time_to_hire); ?>

                                        <?php echo e(Str::plural('month', $insight->time_to_hire)); ?></span>
                                </div>
                                <div class="insight-item">
                                    <span class="insight-label">Key Actions Used</span>
                                    <span
                                        class="insight-value"><?php echo e(is_array($insight->key_actions) ? count($insight->key_actions) : 0); ?>

                                        strategies</span>
                                </div>
                                <div class="insight-item">
                                    <span class="insight-label">Position</span>
                                    <span class="insight-value"><?php echo e($insight->job_title); ?></span>
                                </div>
                                <?php if($insight->company): ?>
                                    <div class="insight-item">
                                        <span class="insight-label">Company</span>
                                        <span class="insight-value"><?php echo e($insight->company); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="sidebar-card action-card">
                            <h3 class="card-title">⚡ Take Action</h3>
                            <p class="card-description">Ready to start your own journey? Browse actions you can take today!
                            </p>
                            <a href="<?php echo e(route('actions.index')); ?>" class="card-btn">
                                Browse Career Actions →
                            </a>
                        </div>

                        
                        <div class="sidebar-card tips-card">
                            <h3 class="card-title">💡 Pro Tips</h3>
                            <ul class="tips-list">
                                <li>Take notes on actions that resonate with you</li>
                                <li>Adapt strategies to your own situation</li>
                                <li>Start with one action at a time</li>
                                <li>Track your progress consistently</li>
                                <li>Connect with people in similar fields</li>
                            </ul>
                        </div>

                        
                        <div class="sidebar-card">
                            <h3 class="card-title">🌟 More Stories</h3>
                            <p class="card-description">Looking for more inspiration?</p>
                            <a href="<?php echo e(route('insights.index')); ?>" class="card-btn-secondary">
                                Browse All Stories
                            </a>
                        </div>
                    </div>
                </div>

                
                <div class="cta-section">
                    <div class="cta-content">
                        <h2>🎉 Did You Land a Job?</h2>
                        <p>Share your success story and inspire the next generation of job seekers!</p>
                        <a href="<?php echo e(route('insights.create')); ?>" class="btn btn-cta">
                            💼 Share Your Story
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .insight-detail-page {
            min-height: 100vh;
            padding: 40px 0 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            margin-bottom: 24px;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            transform: translateX(-4px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .insight-detail-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 50px 40px;
            color: white;
        }

        .hero-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 24px;
            flex: 1;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .job-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 6px;
            opacity: 0.95;
        }

        .company-name {
            font-size: 1.1rem;
            opacity: 0.8;
            margin: 0;
        }

        .stats-badges {
            display: flex;
            gap: 16px;
        }

        .stat-badge {
            background: white;
            color: #333;
            border-radius: 16px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .badge-icon {
            font-size: 2rem;
        }

        .badge-content {
            display: flex;
            flex-direction: column;
        }

        .badge-number {
            font-size: 2rem;
            font-weight: 800;
            color: #667eea;
            line-height: 1;
        }

        .badge-label {
            font-size: 0.85rem;
            color: #666;
            font-weight: 600;
        }

        .badge-text {
            font-size: 0.95rem;
            font-weight: 600;
            color: #333;
        }

        .content-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            padding: 40px;
        }

        @media (max-width: 968px) {
            .content-layout {
                grid-template-columns: 1fr;
            }

            .hero-content {
                flex-direction: column;
                text-align: center;
            }

            .user-profile {
                flex-direction: column;
            }
        }

        .main-content {
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        .story-section {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 30px;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 8px;
        }

        .section-subtitle {
            color: #666;
            margin-bottom: 24px;
            font-size: 1rem;
        }

        .story-content {
            color: #555;
            font-size: 1.05rem;
            line-height: 1.9;
            white-space: pre-wrap;
        }

        .actions-section {
            background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
            border-radius: 16px;
            padding: 30px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 16px;
        }

        .action-item {
            background: white;
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .action-item:hover {
            transform: translateX(5px);
        }

        .action-check {
            font-size: 1.5rem;
            color: #43e97b;
            font-weight: bold;
        }

        .action-text {
            color: #333;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .share-section {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 30px;
            text-align: center;
        }

        .share-section h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .share-section p {
            color: #666;
            margin-bottom: 24px;
        }

        .share-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .share-btn {
            flex: 1;
            min-width: 160px;
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .share-twitter {
            background: #1DA1F2;
            color: white;
        }

        .share-linkedin {
            background: #0077B5;
            color: white;
        }

        .share-copy {
            background: #6c757d;
            color: white;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .sidebar-card {
            background: white;
            border: 2px solid #f0f0f0;
            border-radius: 16px;
            padding: 24px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 16px;
        }

        .card-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .insight-items {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .insight-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 12px;
            border-bottom: 2px solid #f0f0f0;
        }

        .insight-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .insight-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 600;
        }

        .insight-value {
            font-size: 0.95rem;
            color: #333;
            font-weight: 700;
            text-align: right;
        }

        .card-btn,
        .card-btn-secondary {
            display: block;
            width: 100%;
            padding: 12px;
            text-align: center;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .card-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .card-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
        }

        .card-btn-secondary {
            background: #f0f0f0;
            color: #555;
        }

        .card-btn-secondary:hover {
            background: #e0e0e0;
        }

        .tips-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tips-list li {
            padding: 10px 0 10px 28px;
            position: relative;
            color: #555;
            line-height: 1.6;
        }

        .tips-list li:before {
            content: "→";
            position: absolute;
            left: 0;
            color: #667eea;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .insights-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .action-card {
            background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
        }

        .tips-card {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
        }

        .cta-section {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            padding: 50px 40px;
            text-align: center;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 16px;
        }

        .cta-content p {
            font-size: 1.2rem;
            color: white;
            margin-bottom: 30px;
            opacity: 0.95;
        }

        .btn-cta {
            background: white;
            color: #333;
            padding: 16px 40px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
        }
    </style>

    <script>
        function shareOnTwitter() {
            const text = "Check out this inspiring career success story from <?php echo e($insight->user->name); ?>! 🌟";
            const url = window.location.href;
            window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`,
                '_blank');
        }

        function shareOnLinkedIn() {
            const url = window.location.href;
            window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`, '_blank');
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('✅ Link copied to clipboard!');
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackathon\VibeTribe\resources\views/insights/show.blade.php ENDPATH**/ ?>