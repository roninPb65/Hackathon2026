{{-- resources/views/resume/builder.blade.php --}}
@extends('layouts.app')

@section('title', 'Resume Builder')

@section('content')
    <div class="resume-builder-page">
        {{-- Hero Section --}}
        <section class="builder-hero">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-badge">RESUME BUILDER</div>
                    <h1 class="hero-title">Build Your ATS-Optimized Resume</h1>
                    <p class="hero-description">Transform your skills and achievements into a professional resume that passes
                        automated screening systems and impresses recruiters.</p>
                </div>
            </div>
        </section>

        {{-- Main Builder Section --}}
        <section class="builder-section">
            <div class="container">
                <div class="builder-grid">
                    {{-- Left Sidebar: Resources --}}
                    <div class="resources-sidebar">
                        {{-- Skills Panel --}}
                        <div class="resource-card">
                            <div class="resource-header">
                                <div class="resource-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                                <h3>Your Skills</h3>
                            </div>

                            @php
                                $userSkills = Auth::user()->skills;
                                $technicalSkills = $userSkills->where('category', 'technical');
                                $softSkills = $userSkills->where('category', 'soft');
                                $industrySkills = $userSkills->where('category', 'industry');
                            @endphp

                            <div class="skills-container">
                                @if ($technicalSkills->count() > 0)
                                    <div class="skill-category">
                                        <h4>Technical</h4>
                                        <div class="skill-pills">
                                            @foreach ($technicalSkills as $skill)
                                                <button class="skill-pill"
                                                    onclick="addToResume('skill', '{{ $skill->name }}', 'technical')">
                                                    <span>{{ $skill->name }}</span>
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2">
                                                        <line x1="12" y1="5" x2="12" y2="19">
                                                        </line>
                                                        <line x1="5" y1="12" x2="19" y2="12">
                                                        </line>
                                                    </svg>
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($softSkills->count() > 0)
                                    <div class="skill-category">
                                        <h4>Soft Skills</h4>
                                        <div class="skill-pills">
                                            @foreach ($softSkills as $skill)
                                                <button class="skill-pill"
                                                    onclick="addToResume('skill', '{{ $skill->name }}', 'soft')">
                                                    <span>{{ $skill->name }}</span>
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2">
                                                        <line x1="12" y1="5" x2="12" y2="19">
                                                        </line>
                                                        <line x1="5" y1="12" x2="19" y2="12">
                                                        </line>
                                                    </svg>
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($industrySkills->count() > 0)
                                    <div class="skill-category">
                                        <h4>Industry</h4>
                                        <div class="skill-pills">
                                            @foreach ($industrySkills as $skill)
                                                <button class="skill-pill"
                                                    onclick="addToResume('skill', '{{ $skill->name }}', 'industry')">
                                                    <span>{{ $skill->name }}</span>
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2">
                                                        <line x1="12" y1="5" x2="12" y2="19">
                                                        </line>
                                                        <line x1="5" y1="12" x2="19" y2="12">
                                                        </line>
                                                    </svg>
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($userSkills->count() == 0)
                                    <div class="empty-state">
                                        <p>No skills added yet</p>
                                        <a href="{{ route('skills.index') }}" class="link-btn">Add Skills →</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Actions Panel --}}
                        <div class="resource-card">
                            <div class="resource-header">
                                <div class="resource-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                </div>
                                <h3>Recent Actions</h3>
                            </div>

                            @php
                                $userActions = Auth::user()->userActions()->with('action')->latest()->take(8)->get();
                            @endphp

                            <div class="actions-container">
                                @forelse($userActions as $userAction)
                                    <div class="action-card"
                                        onclick="convertToResumeBullet({{ $userAction->id }}, '{{ addslashes($userAction->action->title) }}')">
                                        <div class="action-content">
                                            <h5>{{ Str::limit($userAction->action->title, 50) }}</h5>
                                            <span class="action-date">{{ $userAction->completed_at->format('M Y') }}</span>
                                        </div>
                                        <div class="action-convert">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <line x1="5" y1="12" x2="19" y2="12">
                                                </line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                @empty
                                    <div class="empty-state">
                                        <p>No actions logged yet</p>
                                        <a href="{{ route('actions.index') }}" class="link-btn">Browse Actions →</a>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        {{-- ATS Tips --}}
                        <div class="tips-card">
                            <h4>✓ ATS Optimization Tips</h4>
                            <ul class="tips-list">
                                <li>Use standard section headings</li>
                                <li>Include job-specific keywords</li>
                                <li>Quantify your achievements</li>
                                <li>Use action verbs</li>
                                <li>Keep formatting simple</li>
                                <li>Avoid images and graphics</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Center: Resume Editor --}}
                    <div class="resume-editor">
                        <div class="editor-toolbar">
                            <h2>Resume Preview</h2>
                            <div class="toolbar-actions">
                                <button class="tool-btn" onclick="clearResume()" title="Clear">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                    Clear
                                </button>
                                <button class="tool-btn primary" onclick="downloadResume()" title="Download">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                    Download PDF
                                </button>
                            </div>
                        </div>

                        <div class="resume-paper" id="resumePaper">
                            {{-- Header Section --}}
                            <div class="resume-header-section">
                                <input type="text" class="resume-name-input" placeholder="Your Full Name"
                                    value="{{ Auth::user()->name }}">
                                <div class="contact-row">
                                    <input type="email" class="contact-input" placeholder="email@example.com"
                                        value="{{ Auth::user()->email }}">
                                    <input type="tel" class="contact-input" placeholder="(123) 456-7890">
                                    <input type="text" class="contact-input" placeholder="linkedin.com/in/yourname">
                                    <input type="text" class="contact-input" placeholder="City, State">
                                </div>
                            </div>

                            {{-- Skills Section --}}
                            <div class="resume-section">
                                <h3 class="section-title">SKILLS</h3>
                                <div class="section-divider"></div>
                                <div id="skillsContent" class="section-content">
                                    <p class="placeholder-hint">Click skills from the sidebar to add them here</p>
                                </div>
                            </div>

                            {{-- Experience Section --}}
                            <div class="resume-section">
                                <h3 class="section-title">EXPERIENCE</h3>
                                <div class="section-divider"></div>
                                <div id="experienceContent" class="section-content">
                                    <div class="experience-entry">
                                        <div class="entry-header">
                                            <input type="text" class="entry-title" placeholder="Job Title">
                                            <input type="text" class="entry-date" placeholder="Jan 2024 - Present">
                                        </div>
                                        <input type="text" class="entry-company"
                                            placeholder="Company Name • Location">
                                        <ul id="experienceBullets" class="bullet-list">
                                            <li class="placeholder-hint">Convert actions to resume bullets or type your own
                                            </li>
                                        </ul>
                                        <button class="add-bullet-btn" onclick="addEmptyBullet()">+ Add Bullet
                                            Point</button>
                                    </div>
                                </div>
                            </div>

                            {{-- Education Section --}}
                            <div class="resume-section">
                                <h3 class="section-title">EDUCATION</h3>
                                <div class="section-divider"></div>
                                <div id="educationContent" class="section-content">
                                    <div class="education-entry">
                                        <div class="entry-header">
                                            <input type="text" class="entry-title"
                                                placeholder="Bachelor of Science in Computer Science">
                                            <input type="text" class="entry-date" placeholder="Expected May 2026">
                                        </div>
                                        <input type="text" class="entry-company"
                                            placeholder="University Name • GPA: 3.8/4.0">
                                    </div>
                                </div>
                            </div>

                            {{-- Projects Section --}}
                            <div class="resume-section">
                                <h3 class="section-title">PROJECTS</h3>
                                <div class="section-divider"></div>
                                <div id="projectsContent" class="section-content">
                                    <div class="project-entry">
                                        <div class="entry-header">
                                            <input type="text" class="entry-title" placeholder="Project Name">
                                            <input type="text" class="entry-date" placeholder="Month Year">
                                        </div>
                                        <textarea class="project-description" rows="2" placeholder="Brief description of the project and your role..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Sidebar: Templates --}}
                    <div class="templates-sidebar">
                        <div class="templates-card">
                            <h3>Bullet Point Formulas</h3>
                            <p class="templates-subtitle">Use these proven formulas to write impactful statements</p>

                            <div class="formula-list">
                                <div class="formula-item">
                                    <div class="formula-label">Action + Result</div>
                                    <div class="formula-template">[Verb] + [What] + [Impact with %]</div>
                                    <div class="formula-example">"Developed automation tool that reduced processing time by
                                        40%"</div>
                                </div>

                                <div class="formula-item">
                                    <div class="formula-label">Problem-Solution</div>
                                    <div class="formula-template">[Challenge] + [Solution] + [Outcome]</div>
                                    <div class="formula-example">"Identified bottleneck and redesigned workflow, improving
                                        efficiency by 30%"</div>
                                </div>

                                <div class="formula-item">
                                    <div class="formula-label">Leadership</div>
                                    <div class="formula-template">[Led/Managed] + [Scope] + [Result]</div>
                                    <div class="formula-example">"Led team of 5 to deliver project 2 weeks ahead of
                                        schedule"</div>
                                </div>

                                <div class="formula-item">
                                    <div class="formula-label">Initiative</div>
                                    <div class="formula-template">[Created/Built] + [What] + [Benefit]</div>
                                    <div class="formula-example">"Created training program adopted by 50+ team members"
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="action-verbs-card">
                            <h4>Power Verbs</h4>
                            <div class="verbs-grid">
                                <span class="verb-chip">Developed</span>
                                <span class="verb-chip">Led</span>
                                <span class="verb-chip">Managed</span>
                                <span class="verb-chip">Created</span>
                                <span class="verb-chip">Implemented</span>
                                <span class="verb-chip">Designed</span>
                                <span class="verb-chip">Optimized</span>
                                <span class="verb-chip">Analyzed</span>
                                <span class="verb-chip">Collaborated</span>
                                <span class="verb-chip">Achieved</span>
                                <span class="verb-chip">Increased</span>
                                <span class="verb-chip">Reduced</span>
                            </div>
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

        .resume-builder-page {
            background: #f8f9fa;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Hero Section */
        .builder-hero {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }

        .builder-hero::before {
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
            max-width: 700px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 16px;
            letter-spacing: -1.5px;
        }

        .hero-description {
            font-size: 16px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.8);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Builder Section */
        .builder-section {
            padding: 40px 0 80px;
        }

        .builder-grid {
            display: grid;
            grid-template-columns: 280px 1fr 300px;
            gap: 24px;
        }

        /* Resources Sidebar */
        .resources-sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .resource-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .resource-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
        }

        .resource-icon {
            width: 32px;
            height: 32px;
            background: #f0f0f0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
        }

        .resource-header h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
        }

        .skills-container {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .skill-category h4 {
            font-size: 12px;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .skill-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .skill-pill {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            color: #495057;
            cursor: pointer;
            transition: all 0.2s;
        }

        .skill-pill:hover {
            background: #667eea;
            border-color: #667eea;
            color: white;
            transform: translateY(-1px);
        }

        .skill-pill svg {
            opacity: 0;
            transition: opacity 0.2s;
        }

        .skill-pill:hover svg {
            opacity: 1;
        }

        .actions-container {
            display: flex;
            flex-direction: column;
            gap: 8px;
            max-height: 400px;
            overflow-y: auto;
        }

        .action-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px;
            background: #f8f9fa;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .action-card:hover {
            background: #e9ecef;
            transform: translateX(4px);
        }

        .action-content h5 {
            font-size: 13px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 4px;
        }

        .action-date {
            font-size: 11px;
            color: #6c757d;
        }

        .action-convert {
            color: #667eea;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .action-card:hover .action-convert {
            opacity: 1;
        }

        .tips-card {
            background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
            border-radius: 12px;
            padding: 20px;
        }

        .tips-card h4 {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 12px;
        }

        .tips-list {
            list-style: none;
            padding: 0;
        }

        .tips-list li {
            font-size: 12px;
            color: #495057;
            padding: 4px 0;
            padding-left: 16px;
            position: relative;
        }

        .tips-list li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #667eea;
            font-weight: bold;
        }

        /* Resume Editor */
        .resume-editor {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .editor-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #e9ecef;
            background: #f8f9fa;
        }

        .editor-toolbar h2 {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a2e;
        }

        .toolbar-actions {
            display: flex;
            gap: 10px;
        }

        .tool-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #495057;
            cursor: pointer;
            transition: all 0.2s;
        }

        .tool-btn:hover {
            background: #e9ecef;
        }

        .tool-btn.primary {
            background: #667eea;
            border-color: #667eea;
            color: white;
        }

        .tool-btn.primary:hover {
            background: #5568d3;
        }

        .resume-paper {
            padding: 40px;
            max-width: 8.5in;
            min-height: 11in;
            margin: 0 auto;
            background: white;
            font-family: 'Arial', sans-serif;
        }

        .resume-header-section {
            text-align: center;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 2px solid #1a1a2e;
        }

        .resume-name-input {
            width: 100%;
            border: none;
            font-size: 28px;
            font-weight: 700;
            color: #1a1a2e;
            text-align: center;
            margin-bottom: 12px;
            padding: 4px;
        }

        .resume-name-input:focus {
            outline: none;
            background: #f8f9fa;
        }

        .contact-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .contact-input {
            border: none;
            border-bottom: 1px solid transparent;
            font-size: 12px;
            color: #495057;
            padding: 4px 8px;
            text-align: center;
        }

        .contact-input:focus {
            outline: none;
            border-bottom-color: #667eea;
            background: #f8f9fa;
        }

        .resume-section {
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a2e;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .section-divider {
            height: 2px;
            background: #1a1a2e;
            margin-bottom: 12px;
        }

        .section-content {
            color: #495057;
            font-size: 13px;
            line-height: 1.6;
        }

        .placeholder-hint {
            color: #adb5bd;
            font-style: italic;
            font-size: 12px;
        }

        .experience-entry,
        .education-entry,
        .project-entry {
            margin-bottom: 16px;
        }

        .entry-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 4px;
        }

        .entry-title {
            flex: 1;
            border: none;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            padding: 2px 4px;
        }

        .entry-title:focus {
            outline: none;
            background: #f8f9fa;
        }

        .entry-date {
            border: none;
            font-size: 12px;
            color: #6c757d;
            font-style: italic;
            padding: 2px 4px;
            text-align: right;
        }

        .entry-date:focus {
            outline: none;
            background: #f8f9fa;
        }

        .entry-company {
            width: 100%;
            border: none;
            font-size: 13px;
            color: #495057;
            padding: 2px 4px;
            margin-bottom: 8px;
        }

        .entry-company:focus {
            outline: none;
            background: #f8f9fa;
        }

        .bullet-list {
            list-style-type: disc;
            margin-left: 20px;
            margin-bottom: 12px;
        }

        .bullet-list li {
            margin-bottom: 4px;
            padding: 2px 4px;
            cursor: text;
        }

        .bullet-list li:focus {
            outline: none;
            background: #f8f9fa;
        }

        .add-bullet-btn {
            background: transparent;
            border: 1px dashed #dee2e6;
            color: #6c757d;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .add-bullet-btn:hover {
            border-color: #667eea;
            color: #667eea;
        }

        .project-description {
            width: 100%;
            border: 1px solid #e9ecef;
            border-radius: 4px;
            padding: 8px;
            font-size: 13px;
            font-family: inherit;
            color: #495057;
            resize: vertical;
        }

        .project-description:focus {
            outline: none;
            border-color: #667eea;
        }

        /* Templates Sidebar */
        .templates-sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .templates-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .templates-card h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 6px;
        }

        .templates-subtitle {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 16px;
        }

        .formula-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .formula-item {
            border-left: 3px solid #667eea;
            padding-left: 12px;
        }

        .formula-label {
            font-size: 12px;
            font-weight: 700;
            color: #667eea;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .formula-template {
            font-size: 12px;
            font-weight: 600;
            color: #1a1a2e;
            background: #f8f9fa;
            padding: 8px;
            border-radius: 4px;
            margin-bottom: 6px;
            font-family: 'Courier New', monospace;
        }

        .formula-example {
            font-size: 11px;
            color: #6c757d;
            font-style: italic;
            line-height: 1.5;
        }

        .action-verbs-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            padding: 20px;
        }

        .action-verbs-card h4 {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 12px;
        }

        .verbs-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 6px;
        }

        .verb-chip {
            background: white;
            border: 1px solid #dee2e6;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            color: #495057;
            text-align: center;
            transition: all 0.2s;
            cursor: pointer;
        }

        .verb-chip:hover {
            background: #667eea;
            border-color: #667eea;
            color: white;
            transform: scale(1.05);
        }

        .empty-state {
            text-align: center;
            padding: 20px;
        }

        .empty-state p {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 8px;
        }

        .link-btn {
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
            color: #667eea;
            text-decoration: none;
            transition: all 0.2s;
        }

        .link-btn:hover {
            color: #5568d3;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .builder-grid {
                grid-template-columns: 1fr;
            }

            .templates-sidebar,
            .resources-sidebar {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 32px;
            }

            .resume-paper {
                padding: 24px;
            }

            .resume-name-input {
                font-size: 22px;
            }

            .contact-row {
                flex-direction: column;
            }
        }

        @media print {

            .builder-hero,
            .editor-toolbar,
            .resources-sidebar,
            .templates-sidebar {
                display: none;
            }

            .builder-grid {
                grid-template-columns: 1fr;
            }

            .resume-paper {
                padding: 0;
                box-shadow: none;
            }
        }
    </style>

    <script>
        let skillsByCategory = {
            technical: [],
            soft: [],
            industry: []
        };

        function addToResume(type, content, category = 'technical') {
            const skillsSection = document.getElementById('skillsContent');

            // Remove placeholder if exists
            const placeholder = skillsSection.querySelector('.placeholder-hint');
            if (placeholder) {
                placeholder.remove();
            }

            // Add to category array
            if (!skillsByCategory[category].includes(content)) {
                skillsByCategory[category].push(content);
                updateSkillsDisplay();
            }
        }

        function updateSkillsDisplay() {
            const skillsSection = document.getElementById('skillsContent');
            let html = '';

            if (skillsByCategory.technical.length > 0) {
                html += `<p><strong>Technical:</strong> ${skillsByCategory.technical.join(', ')}</p>`;
            }
            if (skillsByCategory.soft.length > 0) {
                html += `<p><strong>Soft Skills:</strong> ${skillsByCategory.soft.join(', ')}</p>`;
            }
            if (skillsByCategory.industry.length > 0) {
                html += `<p><strong>Industry:</strong> ${skillsByCategory.industry.join(', ')}</p>`;
            }

            skillsSection.innerHTML = html ||
                '<p class="placeholder-hint">Click skills from the sidebar to add them here</p>';
        }

        function convertToResumeBullet(actionId, actionTitle) {
            const bulletsList = document.getElementById('experienceBullets');

            // Remove placeholder if exists
            const placeholder = bulletsList.querySelector('.placeholder-hint');
            if (placeholder) {
                placeholder.remove();
            }

            // Create action verb based resume bullet
            const actionVerbs = [
                'Developed', 'Led', 'Managed', 'Created', 'Implemented',
                'Designed', 'Optimized', 'Analyzed', 'Collaborated', 'Achieved'
            ];
            const verb = actionVerbs[Math.floor(Math.random() * actionVerbs.length)];

            const bullet = document.createElement('li');
            bullet.contentEditable = true;
            bullet.textContent = `${verb} ${actionTitle.toLowerCase()} resulting in [add quantifiable impact]`;
            bullet.style.color = '#495057';

            bulletsList.appendChild(bullet);

            // Scroll to the new bullet
            bullet.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        }

        function addEmptyBullet() {
            const bulletsList = document.getElementById('experienceBullets');

            // Remove placeholder if exists
            const placeholder = bulletsList.querySelector('.placeholder-hint');
            if (placeholder) {
                placeholder.remove();
            }

            const bullet = document.createElement('li');
            bullet.contentEditable = true;
            bullet.textContent = 'Type your accomplishment here...';
            bullet.style.color = '#adb5bd';

            // Clear placeholder text on focus
            bullet.addEventListener('focus', function() {
                if (this.textContent === 'Type your accomplishment here...') {
                    this.textContent = '';
                    this.style.color = '#495057';
                }
            });

            bulletsList.appendChild(bullet);
            bullet.focus();
        }

        function clearResume() {
            if (confirm('Are you sure you want to clear all resume content? This cannot be undone.')) {
                // Clear skills
                skillsByCategory = {
                    technical: [],
                    soft: [],
                    industry: []
                };
                document.getElementById('skillsContent').innerHTML =
                    '<p class="placeholder-hint">Click skills from the sidebar to add them here</p>';

                // Clear experience bullets
                document.getElementById('experienceBullets').innerHTML =
                    '<li class="placeholder-hint">Convert actions to resume bullets or type your own</li>';

                // Clear all input fields except name and email
                document.querySelectorAll('.resume-paper input:not(.resume-name-input):not([type="email"])').forEach(
                    input => {
                        if (!input.classList.contains('resume-name-input')) {
                            input.value = '';
                        }
                    });

                // Clear textareas
                document.querySelectorAll('.project-description').forEach(textarea => {
                    textarea.value = '';
                });
            }
        }

        function downloadResume() {
            // Show download instructions
            const instructions = `
📄 Download Your Resume as PDF

Instructions:
1. Press Ctrl+P (Windows) or Cmd+P (Mac)
2. Select "Save as PDF" as the destination
3. In the print settings:
   ✓ Remove headers and footers
   ✓ Set margins to "None" or "Minimum"
   ✓ Enable "Background graphics" if needed
4. Click "Save"

Your ATS-friendly resume will be saved!
            `;

            if (confirm(instructions)) {
                window.print();
            }
        }

        // Make bullet points editable
        document.addEventListener('DOMContentLoaded', function() {
            // Enable editing on existing bullets
            document.querySelectorAll('.bullet-list li').forEach(li => {
                if (!li.classList.contains('placeholder-hint')) {
                    li.contentEditable = true;
                }
            });
        });
    </script>
@endsection
