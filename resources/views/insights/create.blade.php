{{-- resources/views/insights/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Share Your Success Story')

@section('content')
    <div class="create-insight-page">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <span class="hero-tag">Success Stories</span>
                    <h1 class="hero-title">Share Your Journey</h1>
                    <p class="hero-description">Your experience could be the inspiration someone needs. Tell us how you
                        landed your dream job.</p>
                </div>
            </div>
        </div>

        <!-- Main Form Section -->
        <div class="form-section-wrapper">
            <div class="container">
                <!-- Inspiration Cards -->
                <div class="inspiration-cards">
                    <div class="inspiration-card">
                        <div class="card-icon">🎯</div>
                        <h3>Help Others</h3>
                        <p>Share insights from your experience</p>
                    </div>
                    <div class="inspiration-card">
                        <div class="card-icon">💪</div>
                        <h3>Build Your Brand</h3>
                        <p>Establish your professional presence</p>
                    </div>
                    <div class="inspiration-card">
                        <div class="card-icon">🤝</div>
                        <h3>Give Back</h3>
                        <p>Contribute to the community</p>
                    </div>
                    <div class="inspiration-card">
                        <div class="card-icon">🌟</div>
                        <h3>Celebrate</h3>
                        <p>Honor your achievement</p>
                    </div>
                </div>

                <!-- Form Container -->
                <div class="form-container">
                    <form action="{{ route('insights.store') }}" method="POST" class="insight-form">
                        @csrf

                        <!-- Basic Information -->
                        <div class="form-section">
                            <h2 class="section-title">Basic Information</h2>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="job_title" class="form-label">Job Title *</label>
                                    <input type="text" id="job_title" name="job_title"
                                        class="form-input @error('job_title') is-invalid @enderror"
                                        placeholder="Software Engineer, Marketing Coordinator..."
                                        value="{{ old('job_title') }}" required>
                                    @error('job_title')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" id="company" name="company"
                                        class="form-input @error('company') is-invalid @enderror"
                                        placeholder="Optional - Keep anonymous if preferred" value="{{ old('company') }}">
                                    @error('company')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="time_to_hire" class="form-label">Search Duration *</label>
                                <select id="time_to_hire" name="time_to_hire"
                                    class="form-input @error('time_to_hire') is-invalid @enderror" required>
                                    <option value="">How long did your search take?</option>
                                    <option value="1" {{ old('time_to_hire') == 1 ? 'selected' : '' }}>Less than 1
                                        month</option>
                                    <option value="2" {{ old('time_to_hire') == 2 ? 'selected' : '' }}>1-2 months
                                    </option>
                                    <option value="3" {{ old('time_to_hire') == 3 ? 'selected' : '' }}>2-3 months
                                    </option>
                                    <option value="4" {{ old('time_to_hire') == 4 ? 'selected' : '' }}>3-4 months
                                    </option>
                                    <option value="6" {{ old('time_to_hire') == 6 ? 'selected' : '' }}>4-6 months
                                    </option>
                                    <option value="9" {{ old('time_to_hire') == 9 ? 'selected' : '' }}>6-9 months
                                    </option>
                                    <option value="12" {{ old('time_to_hire') == 12 ? 'selected' : '' }}>9-12 months
                                    </option>
                                    <option value="18" {{ old('time_to_hire') == 18 ? 'selected' : '' }}>12+ months
                                    </option>
                                </select>
                                @error('time_to_hire')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Key Actions -->
                        <div class="form-section">
                            <h2 class="section-title">What Actions Made a Difference?</h2>
                            <p class="section-subtitle">Select all strategies that helped your job search</p>

                            <div class="actions-grid">
                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Networking events"
                                        {{ in_array('Networking events', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">🤝</span>
                                        <span class="checkbox-text">Networking Events</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="LinkedIn connections"
                                        {{ in_array('LinkedIn connections', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">💼</span>
                                        <span class="checkbox-text">LinkedIn Connections</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Informational interviews"
                                        {{ in_array('Informational interviews', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">☕</span>
                                        <span class="checkbox-text">Informational Interviews</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Online courses"
                                        {{ in_array('Online courses', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">🎓</span>
                                        <span class="checkbox-text">Online Courses</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Portfolio projects"
                                        {{ in_array('Portfolio projects', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">💻</span>
                                        <span class="checkbox-text">Portfolio Projects</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Resume optimization"
                                        {{ in_array('Resume optimization', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">📄</span>
                                        <span class="checkbox-text">Resume Optimization</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Referrals"
                                        {{ in_array('Referrals', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">🎯</span>
                                        <span class="checkbox-text">Employee Referrals</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Career fairs"
                                        {{ in_array('Career fairs', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">🎪</span>
                                        <span class="checkbox-text">Career Fairs</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Cold applications"
                                        {{ in_array('Cold applications', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">📮</span>
                                        <span class="checkbox-text">Cold Applications</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Volunteer work"
                                        {{ in_array('Volunteer work', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">🌱</span>
                                        <span class="checkbox-text">Volunteer Work</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Personal website"
                                        {{ in_array('Personal website', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">🌐</span>
                                        <span class="checkbox-text">Personal Website</span>
                                    </span>
                                </label>

                                <label class="action-checkbox">
                                    <input type="checkbox" name="key_actions[]" value="Skill certifications"
                                        {{ in_array('Skill certifications', old('key_actions', [])) ? 'checked' : '' }}>
                                    <span class="checkbox-card">
                                        <span class="checkbox-icon">🏅</span>
                                        <span class="checkbox-text">Certifications</span>
                                    </span>
                                </label>
                            </div>
                            @error('key_actions')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Success Story -->
                        <div class="form-section">
                            <h2 class="section-title">Your Success Story</h2>
                            <p class="section-subtitle">Share your journey in detail - be specific, honest, and inspiring
                            </p>

                            <div class="form-group">
                                <textarea id="success_story" name="success_story" class="form-textarea @error('success_story') is-invalid @enderror"
                                    placeholder="Tell your story...

Share your experience:
• What was your starting point?
• Which actions had the biggest impact?
• What challenges did you overcome?
• What was your breakthrough moment?
• What advice would you give to others?"
                                    required>{{ old('success_story') }}</textarea>
                                @error('success_story')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <div class="character-counter">
                                    <span id="charCount">0</span> / 100 characters minimum
                                </div>
                            </div>
                        </div>

                        <!-- Info Notice -->
                        <div class="notice-box">
                            <div class="notice-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="notice-content">
                                <strong>Review Process:</strong> Your story will be reviewed within 24-48 hours to ensure
                                it's helpful and appropriate for our community.
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <a href="{{ route('insights.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                Submit Story
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M4 10H16M16 10L12 6M16 10L12 14" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </form>
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

        .create-insight-page {
            background: url(https://images.pexels.com/photos/27810032/pexels-photo-27810032/free-photo-of-a-swan-is-swimming-in-the-water-near-a-house.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
            color: #fff;
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: cover;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Hero Section */
        .hero-section {
            padding: 120px 0 80px;
            /* background: linear-gradient(180deg, #1a1a1a 0%, #0a0a0a 100%); */
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 0%, rgba(99, 102, 241, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero-content {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .hero-tag {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 24px;
            color: #818cf8;
            text-transform: uppercase;
        }

        .hero-title {
            font-size: 72px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            background: linear-gradient(135deg, #fff 0%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 20px;
            line-height: 1.6;
            color: #a1a1aa;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Form Section Wrapper */
        .form-section-wrapper {
            padding: 80px 0 120px;
        }

        /* Inspiration Cards */
        .inspiration-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-bottom: 80px;
        }

        .inspiration-card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 16px;
            padding: 32px 24px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .inspiration-card:hover {
            border-color: #6366f1;
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(99, 102, 241, 0.2);
        }

        .card-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .inspiration-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #fff;
        }

        .inspiration-card p {
            font-size: 14px;
            color: #a1a1aa;
            line-height: 1.5;
        }

        /* Form Container */
        .form-container {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 24px;
            padding: 60px;
        }

        .insight-form {
            display: flex;
            flex-direction: column;
            gap: 60px;
        }

        .form-section {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 8px;
        }

        .section-subtitle {
            font-size: 16px;
            color: #a1a1aa;
            margin-bottom: 16px;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        /* Form Group */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #e4e4e7;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input,
        .form-textarea {
            background: #0a0a0a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 16px;
            color: #fff;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #52525b;
        }

        .form-textarea {
            resize: vertical;
            min-height: 300px;
            line-height: 1.8;
        }

        .form-input.is-invalid,
        .form-textarea.is-invalid {
            border-color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: -8px;
        }

        .character-counter {
            text-align: right;
            font-size: 14px;
            color: #71717a;
        }

        .character-counter #charCount {
            font-weight: 700;
            color: #6366f1;
        }

        /* Actions Grid */
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .action-checkbox {
            cursor: pointer;
        }

        .action-checkbox input[type="checkbox"] {
            display: none;
        }

        .checkbox-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            padding: 24px 16px;
            background: #0a0a0a;
            border: 2px solid #2a2a2a;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-align: center;
        }

        .action-checkbox:hover .checkbox-card {
            border-color: #3f3f46;
            transform: translateY(-2px);
        }

        .action-checkbox input[type="checkbox"]:checked+.checkbox-card {
            background: rgba(99, 102, 241, 0.1);
            border-color: #6366f1;
        }

        .checkbox-icon {
            font-size: 32px;
        }

        .checkbox-text {
            font-size: 14px;
            font-weight: 600;
            color: #e4e4e7;
        }

        /* Notice Box */
        .notice-box {
            display: flex;
            gap: 16px;
            padding: 24px;
            background: rgba(251, 191, 36, 0.1);
            border: 1px solid rgba(251, 191, 36, 0.3);
            border-radius: 12px;
            align-items: flex-start;
        }

        .notice-icon {
            flex-shrink: 0;
            color: #fbbf24;
        }

        .notice-content {
            color: #fef3c7;
            font-size: 14px;
            line-height: 1.6;
        }

        .notice-content strong {
            font-weight: 700;
            color: #fbbf24;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
            padding-top: 20px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .btn-primary {
            background: #6366f1;
            color: #fff;
        }

        .btn-primary:hover {
            background: #4f46e5;
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(99, 102, 241, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #a1a1aa;
            border: 1px solid #3f3f46;
        }

        .btn-secondary:hover {
            background: #1a1a1a;
            color: #fff;
            border-color: #52525b;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-title {
                font-size: 56px;
            }

            .inspiration-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .actions-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .form-container {
                padding: 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0 60px;
            }

            .hero-title {
                font-size: 40px;
            }

            .hero-description {
                font-size: 18px;
            }

            .form-section-wrapper {
                padding: 60px 0 80px;
            }

            .inspiration-cards {
                grid-template-columns: 1fr;
                gap: 16px;
                margin-bottom: 60px;
            }

            .form-container {
                padding: 32px 24px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .section-title {
                font-size: 24px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .actions-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <script>
        // Character counter
        const textarea = document.getElementById('success_story');
        const charCount = document.getElementById('charCount');

        if (textarea && charCount) {
            textarea.addEventListener('input', function() {
                const length = this.value.length;
                charCount.textContent = length;

                if (length >= 100) {
                    charCount.style.color = '#34d399';
                } else {
                    charCount.style.color = '#ef4444';
                }
            });

            // Initial count
            const initialLength = textarea.value.length;
            charCount.textContent = initialLength;
            if (initialLength >= 100) {
                charCount.style.color = '#34d399';
            } else {
                charCount.style.color = '#ef4444';
            }
        }

        // Smooth scroll animations
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

        document.querySelectorAll('.inspiration-card, .form-section').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
@endsection
