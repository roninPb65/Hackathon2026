{{-- resources/views/skills/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Skills')

@section('content')
    <div class="skills-page">
        <section class="page-hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="page-title">My Skills</h1>
                    <p class="page-subtitle">Track your skills and showcase what you know to employers</p>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value">{{ $userSkills->count() }}</span>
                    <span class="hero-stat-label">Skills Added</span>
                </div>
            </div>
        </section>

        @if ($userSkills->count() > 0)
            <section class="my-skills-section">
                <div class="container">
                    <h2 class="section-title">Your Skills</h2>

                    {{-- In the "Your Skills" section, change the grouping --}}

                    @php
                        $groupedUserSkills = $userSkills->groupBy('category');
                    @endphp

                    @foreach (['technical', 'soft', 'industry'] as $category)
                        @if ($groupedUserSkills->has($category))
                            <div class="category-section">
                                <h3 class="category-heading">
                                    @if ($category == 'technical')
                                        Technical Skills
                                    @elseif($category == 'soft')
                                        Soft Skills
                                    @else
                                        Industry Skills
                                    @endif
                                </h3>
                                <div class="skills-grid">
                                    @foreach ($groupedUserSkills[$category] as $skill)
                                        <div class="skill-card-owned">
                                            <div class="skill-header">
                                                <h4 class="skill-name">{{ $skill->name }}</h4>
                                                <form action="{{ route('skills.remove', $skill) }}" method="POST"
                                                    onsubmit="return confirm('Remove this skill?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="skill-remove">
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none">
                                                            <path d="M12 4L4 12M4 4L12 12" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>

                                            <div class="proficiency-section">
                                                <span class="proficiency-label">Proficiency</span>
                                                <div class="proficiency-bar">
                                                    <div class="proficiency-fill"
                                                        style="width: {{ $skill->pivot->proficiency_level * 20 }}%"></div>
                                                </div>
                                                <span class="proficiency-text">
                                                    @if ($skill->pivot->proficiency_level == 1)
                                                        Beginner
                                                    @elseif($skill->pivot->proficiency_level == 2)
                                                        Novice
                                                    @elseif($skill->pivot->proficiency_level == 3)
                                                        Intermediate
                                                    @elseif($skill->pivot->proficiency_level == 4)
                                                        Advanced
                                                    @else
                                                        Expert
                                                    @endif
                                                </span>
                                            </div>

                                            <div class="demand-indicator">
                                                @if ($skill->demand_score >= 8)
                                                    <span class="demand-badge high">High Demand</span>
                                                @elseif($skill->demand_score >= 5)
                                                    <span class="demand-badge medium">In Demand</span>
                                                @else
                                                    <span class="demand-badge low">Growing</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        @endif

        <section class="add-skills-section">
            <div class="container">
                <h2 class="section-title">Add New Skills</h2>

                @foreach (['technical', 'soft', 'industry'] as $category)
                    @if (isset($availableSkills[$category]) && $availableSkills[$category]->count() > 0)
                        <div class="category-section">
                            <h3 class="category-heading">
                                @if ($category == 'technical')
                                    Technical Skills
                                @elseif($category == 'soft')
                                    Soft Skills
                                @else
                                    Industry Skills
                                @endif
                            </h3>

                            <div class="skills-grid">
                                @foreach ($availableSkills[$category] as $skill)
                                    @php
                                        $hasSkill = $userSkills->contains('id', $skill->id);
                                    @endphp

                                    @if (!$hasSkill)
                                        <div class="skill-card-add">
                                            <div class="skill-info">
                                                <h4 class="skill-name">{{ $skill->name }}</h4>
                                                <div class="demand-indicator">
                                                    @if ($skill->demand_score >= 8)
                                                        <span class="demand-badge high">High Demand</span>
                                                    @elseif($skill->demand_score >= 5)
                                                        <span class="demand-badge medium">In Demand</span>
                                                    @else
                                                        <span class="demand-badge low">Growing</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <form action="{{ route('skills.add') }}" method="POST" class="skill-form">
                                                @csrf
                                                <input type="hidden" name="skill_id" value="{{ $skill->id }}">

                                                <select name="proficiency_level" class="proficiency-select" required>
                                                    <option value="">Select level...</option>
                                                    <option value="1">Beginner</option>
                                                    <option value="2">Novice</option>
                                                    <option value="3">Intermediate</option>
                                                    <option value="4">Advanced</option>
                                                    <option value="5">Expert</option>
                                                </select>

                                                <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                            </form>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>

    <style>
        .skills-page {
            background: #FAFBFC;
            min-height: 100vh;
        }

        .hero-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 24px 32px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hero-stat-value {
            font-size: 48px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .hero-stat-label {
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.9;
        }

        .my-skills-section,
        .add-skills-section {
            padding: 60px 0;
        }

        .section-title {
            font-size: 32px;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 40px;
            letter-spacing: -0.8px;
        }

        .category-section {
            margin-bottom: 48px;
        }

        .category-heading {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--border);
            letter-spacing: -0.3px;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        @media (max-width: 768px) {
            .skills-grid {
                grid-template-columns: 1fr;
            }
        }

        .skill-card-owned,
        .skill-card-add {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            transition: all 0.2s;
        }

        .skill-card-owned:hover,
        .skill-card-add:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 16px rgba(99, 102, 241, 0.1);
        }

        .skill-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .skill-name {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            letter-spacing: -0.2px;
        }

        .skill-remove {
            width: 28px;
            height: 28px;
            background: var(--light-gray);
            border: none;
            border-radius: 50%;
            color: var(--gray);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .skill-remove:hover {
            background: #FEE2E2;
            color: #DC2626;
        }

        .proficiency-section {
            margin-bottom: 16px;
        }

        .proficiency-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
            margin-bottom: 8px;
        }

        .proficiency-bar {
            height: 6px;
            background: var(--light-gray);
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .proficiency-fill {
            height: 100%;
            background: var(--primary);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .proficiency-text {
            font-size: 13px;
            font-weight: 600;
            color: var(--primary);
        }

        .demand-indicator {
            margin-top: 12px;
        }

        .demand-badge {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 6px;
            letter-spacing: 0.5px;
        }

        .demand-badge.high {
            background: #D1FAE5;
            color: #065F46;
        }

        .demand-badge.medium {
            background: #DBEAFE;
            color: #1E40AF;
        }

        .demand-badge.low {
            background: #FEF3C7;
            color: #92400E;
        }

        .skill-card-add {
            display: flex;
            flex-direction: column;
        }

        .skill-info {
            flex: 1;
            margin-bottom: 16px;
        }

        .skill-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .proficiency-select {
            flex: 1;
            padding: 8px 12px;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s;
        }

        .proficiency-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 14px;
        }
    </style>
@endsection
