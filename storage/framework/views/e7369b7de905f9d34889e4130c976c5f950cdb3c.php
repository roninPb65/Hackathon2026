<?php $__env->startSection('title', 'Career Roadmap'); ?>

<?php $__env->startSection('content'); ?>
    <div class="roadmap-page">
        
        <section class="roadmap-hero">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-badge">YOUR JOURNEY</div>
                    <h1 class="hero-title">Career Roadmap</h1>
                    <p class="hero-description">A step-by-step guide to land your dream job. Track your progress and stay
                        motivated on your journey to success.</p>
                </div>

                
                <?php
                    $userActions = Auth::user()->userActions;
                    $totalMilestones = 12;
                    $completedCount = min($userActions->count(), $totalMilestones);
                    $progressPercent = round(($completedCount / $totalMilestones) * 100);
                ?>

                <div class="hero-stats">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo e($completedCount); ?></div>
                        <div class="stat-label">Completed</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?php echo e($totalMilestones - $completedCount); ?></div>
                        <div class="stat-label">Remaining</div>
                    </div>
                    <div class="stat-card highlight">
                        <div class="stat-number"><?php echo e($progressPercent); ?>%</div>
                        <div class="stat-label">Progress</div>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="progress-section">
            <div class="container">
                <div class="progress-wrapper">
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" style="width: <?php echo e($progressPercent); ?>%"></div>
                    </div>
                    <div class="progress-milestones">
                        <span class="milestone-marker" style="left: 0%">Start</span>
                        <span class="milestone-marker" style="left: 25%">25%</span>
                        <span class="milestone-marker" style="left: 50%">50%</span>
                        <span class="milestone-marker" style="left: 75%">75%</span>
                        <span class="milestone-marker" style="left: 100%">Goal</span>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="phases-section">
            <div class="container">
                
                <div class="phase-block">
                    <div class="phase-info">
                        <div class="phase-number">01</div>
                        <div class="phase-details">
                            <h2 class="phase-title">Build Your Foundation</h2>
                            <p class="phase-subtitle">Months 1-2 • Establish your professional presence</p>
                        </div>
                    </div>

                    <div class="milestones-grid">
                        
                        <div
                            class="milestone-card <?php echo e($userActions->where('action.category', 'resume')->count() > 0 ? 'completed' : ''); ?>">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <?php if($userActions->where('action.category', 'resume')->count() > 0): ?>
                                        <span class="status-badge completed">✓ Completed</span>
                                    <?php else: ?>
                                        <span class="status-badge pending">Pending</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="milestone-title">Optimize Your Resume for ATS</h3>
                            <p class="milestone-description">Create an ATS-friendly resume that passes automated screening
                                systems.</p>
                            <div class="milestone-actions">
                                <a href="<?php echo e(route('chatbot.index')); ?>" class="action-btn primary">Use ATS Helper</a>
                                <a href="<?php echo e(route('resume.builder')); ?>" class="action-btn secondary">Build Resume</a>
                            </div>
                        </div>

                        
                        <div class="milestone-card <?php echo e(Auth::user()->skills->count() >= 5 ? 'completed' : ''); ?>">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <?php if(Auth::user()->skills->count() >= 5): ?>
                                        <span class="status-badge completed">✓ Completed</span>
                                    <?php else: ?>
                                        <span class="status-badge pending"><?php echo e(Auth::user()->skills->count()); ?>/5</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="milestone-title">Add 5+ Key Skills</h3>
                            <p class="milestone-description">Identify and track the technical and soft skills you possess.
                            </p>
                            <div class="milestone-actions">
                                <a href="<?php echo e(route('skills.index')); ?>" class="action-btn primary">Add Skills</a>
                            </div>
                        </div>

                        
                        <div class="milestone-card <?php echo e($userActions->count() >= 1 ? 'completed' : ''); ?>">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <?php if($userActions->count() >= 1): ?>
                                        <span class="status-badge completed">✓ Completed</span>
                                    <?php else: ?>
                                        <span class="status-badge pending">Pending</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="milestone-title">Complete Your First Action</h3>
                            <p class="milestone-description">Take your first step toward building career momentum.</p>
                            <div class="milestone-actions">
                                <a href="<?php echo e(route('actions.index')); ?>" class="action-btn primary">Browse Actions</a>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="phase-block">
                    <div class="phase-info">
                        <div class="phase-number">02</div>
                        <div class="phase-details">
                            <h2 class="phase-title">Network & Upskill</h2>
                            <p class="phase-subtitle">Months 3-4 • Build connections and develop expertise</p>
                        </div>
                    </div>

                    <div class="milestones-grid">
                        <div
                            class="milestone-card <?php echo e($userActions->where('action.category', 'networking')->count() >= 2 ? 'completed' : ''); ?>">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <?php if($userActions->where('action.category', 'networking')->count() >= 2): ?>
                                        <span class="status-badge completed">✓ Completed</span>
                                    <?php else: ?>
                                        <span
                                            class="status-badge pending"><?php echo e($userActions->where('action.category', 'networking')->count()); ?>/2</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="milestone-title">Complete 2 Networking Actions</h3>
                            <p class="milestone-description">Build connections through LinkedIn, events, or informational
                                interviews.</p>
                            <div class="milestone-actions">
                                <a href="<?php echo e(route('actions.index')); ?>" class="action-btn primary">Start Networking</a>
                            </div>
                        </div>

                        <div
                            class="milestone-card <?php echo e($userActions->where('action.category', 'events')->count() >= 1 ? 'completed' : ''); ?>">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <?php if($userActions->where('action.category', 'events')->count() >= 1): ?>
                                        <span class="status-badge completed">✓ Completed</span>
                                    <?php else: ?>
                                        <span class="status-badge pending">Pending</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="milestone-title">Attend a Career Event</h3>
                            <p class="milestone-description">Participate in a workshop, webinar, or career fair.</p>
                            <div class="milestone-actions">
                                <a href="<?php echo e(route('events.index')); ?>" class="action-btn primary">Find Events</a>
                            </div>
                        </div>

                        <div
                            class="milestone-card <?php echo e($userActions->where('action.category', 'skills')->count() >= 1 ? 'completed' : ''); ?>">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <?php if($userActions->where('action.category', 'skills')->count() >= 1): ?>
                                        <span class="status-badge completed">✓ Completed</span>
                                    <?php else: ?>
                                        <span class="status-badge pending">Pending</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="milestone-title">Complete Skill Development</h3>
                            <p class="milestone-description">Take a course, build a project, or earn a certification.</p>
                            <div class="milestone-actions">
                                <a href="<?php echo e(route('actions.index')); ?>" class="action-btn primary">Browse Actions</a>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="phase-block">
                    <div class="phase-info">
                        <div class="phase-number">03</div>
                        <div class="phase-details">
                            <h2 class="phase-title">Apply & Showcase</h2>
                            <p class="phase-subtitle">Months 5-6 • Market yourself effectively</p>
                        </div>
                    </div>

                    <div class="milestones-grid">
                        <div class="milestone-card">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2">
                                        </rect>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <span class="status-badge pending">Pending</span>
                                </div>
                            </div>
                            <h3 class="milestone-title">Create Your Portfolio</h3>
                            <p class="milestone-description">Showcase your projects, skills, and achievements online.</p>
                        </div>

                        <div class="milestone-card">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                        </path>
                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1">
                                        </rect>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <span class="status-badge pending">Pending</span>
                                </div>
                            </div>
                            <h3 class="milestone-title">Apply to 10+ Positions</h3>
                            <p class="milestone-description">Quality over quantity - customize each application.</p>
                        </div>

                        <div
                            class="milestone-card <?php echo e($userActions->where('action.category', 'networking')->count() >= 5 ? 'completed' : ''); ?>">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <polyline points="17 11 19 13 23 9"></polyline>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <?php if($userActions->where('action.category', 'networking')->count() >= 5): ?>
                                        <span class="status-badge completed">✓ Completed</span>
                                    <?php else: ?>
                                        <span
                                            class="status-badge pending"><?php echo e($userActions->where('action.category', 'networking')->count()); ?>/5</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="milestone-title">Build 20+ Connections</h3>
                            <p class="milestone-description">Connect with alumni, recruiters, and professionals.</p>
                        </div>
                    </div>
                </div>

                
                <div class="phase-block">
                    <div class="phase-info">
                        <div class="phase-number">04</div>
                        <div class="phase-details">
                            <h2 class="phase-title">Interview & Land the Job</h2>
                            <p class="phase-subtitle">Months 6+ • Seal the deal</p>
                        </div>
                    </div>

                    <div class="milestones-grid">
                        <div class="milestone-card">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <span class="status-badge pending">Pending</span>
                                </div>
                            </div>
                            <h3 class="milestone-title">Prepare for Interviews</h3>
                            <p class="milestone-description">Practice questions, research companies, prepare your own
                                questions.</p>
                        </div>

                        <div class="milestone-card">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <span class="status-badge pending">Pending</span>
                                </div>
                            </div>
                            <h3 class="milestone-title">Complete 5+ Interviews</h3>
                            <p class="milestone-description">Each interview is practice - learn and improve.</p>
                        </div>

                        <div class="milestone-card">
                            <div class="milestone-header">
                                <div class="milestone-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                                <div class="milestone-status">
                                    <span class="status-badge pending">Pending</span>
                                </div>
                            </div>
                            <h3 class="milestone-title">Land Your First Offer!</h3>
                            <p class="milestone-description">Celebrate your achievement and share your success story!</p>
                            <div class="milestone-actions">
                                <a href="<?php echo e(route('insights.create')); ?>" class="action-btn success">Share Your Story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2 class="cta-title">Ready for Your Next Step?</h2>
                    <p class="cta-description">Keep the momentum going. Choose an action that aligns with your current
                        phase.</p>

                    <div class="cta-cards">
                        <?php if(Auth::user()->skills->count() < 5): ?>
                            <div class="cta-card">
                                <div class="cta-icon">🎓</div>
                                <h3>Add Skills</h3>
                                <p><?php echo e(5 - Auth::user()->skills->count()); ?> more needed</p>
                                <a href="<?php echo e(route('skills.index')); ?>" class="cta-btn">Get Started</a>
                            </div>
                        <?php endif; ?>

                        <?php if($userActions->where('action.category', 'networking')->count() < 2): ?>
                            <div class="cta-card">
                                <div class="cta-icon">🤝</div>
                                <h3>Network</h3>
                                <p>Build valuable connections</p>
                                <a href="<?php echo e(route('actions.index')); ?>" class="cta-btn">Start Now</a>
                            </div>
                        <?php endif; ?>

                        <div class="cta-card">
                            <div class="cta-icon">💡</div>
                            <h3>Get Inspired</h3>
                            <p>Read success stories</p>
                            <a href="<?php echo e(route('insights.index')); ?>" class="cta-btn">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .roadmap-page {
            background: #FFFFFF;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Hero Section */
        .roadmap-hero {
            /* background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); */
            color: white;
            padding: 80px 0 60px;
            position: relative;
            overflow: hidden;

            background: url(https://images.pexels.com/photos/1054218/pexels-photo-1054218.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
            padding: 60px 0;
            color: white;
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: cover;
            background-attachment: fixed;
        }

        .roadmap-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.03"><path d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/></g></g></svg>');
            opacity: 0.4;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            margin-bottom: 48px;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 24px;
        }

        .hero-title {
            font-size: 64px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
            letter-spacing: -2px;
        }

        .hero-description {
            font-size: 18px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.8);
            max-width: 600px;
            margin: 0 auto;
        }

        .hero-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            position: relative;
            z-index: 1;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 32px 24px;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-4px);
        }

        .stat-card.highlight {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .stat-number {
            font-size: 48px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .stat-label {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        /* Progress Section */
        .progress-section {
            padding: 60px 0;
            background: #f8f9fa;
        }

        .progress-wrapper {
            position: relative;
        }

        .progress-bar-container {
            height: 12px;
            background: #e9ecef;
            border-radius: 100px;
            overflow: hidden;
            margin-bottom: 16px;
        }

        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border-radius: 100px;
            transition: width 1s ease;
        }

        .progress-milestones {
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        .milestone-marker {
            font-size: 12px;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Phases Section */
        .phases-section {
            padding: 80px 0;
        }

        .phase-block {
            margin-bottom: 80px;
        }

        .phase-block:last-child {
            margin-bottom: 0;
        }

        .phase-info {
            display: flex;
            align-items: center;
            gap: 32px;
            margin-bottom: 48px;
            padding-bottom: 32px;
            border-bottom: 2px solid #e9ecef;
        }

        .phase-number {
            font-size: 72px;
            font-weight: 800;
            color: #e9ecef;
            line-height: 1;
            letter-spacing: -2px;
        }

        .phase-details {
            flex: 1;
        }

        .phase-title {
            font-size: 36px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .phase-subtitle {
            font-size: 16px;
            color: #6c757d;
            font-weight: 500;
        }

        .milestones-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 32px;
        }

        .milestone-card {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 16px;
            padding: 32px;
            transition: all 0.3s ease;
            position: relative;
        }

        .milestone-card:hover {
            border-color: #667eea;
            box-shadow: 0 12px 40px rgba(102, 126, 234, 0.12);
            transform: translateY(-4px);
        }

        .milestone-card.completed {
            border-color: #10b981;
            background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackathon\VibeTribe\resources\views/roadmap/index.blade.php ENDPATH**/ ?>