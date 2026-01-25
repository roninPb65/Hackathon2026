{{-- resources/views/events/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Share an Event')

@section('content')
    <div class="create-page">
        <section class="page-hero-small">
            <div class="container">
                <h1 class="page-title">Share a Career Event</h1>
                <p class="page-subtitle">Help your peers discover valuable opportunities</p>
            </div>
        </section>

        <section class="form-section">
            <div class="container">
                <div class="form-container">
                    <form action="{{ route('events.store') }}" method="POST" class="modern-form">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Event Title *</label>
                            <input type="text" name="title" class="form-input @error('title') error @enderror"
                                placeholder="e.g., Tech Career Fair 2024" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Event Type *</label>
                                <select name="event_type" class="form-select @error('event_type') error @enderror" required>
                                    <option value="">Select type...</option>
                                    <option value="workshop" {{ old('event_type') == 'workshop' ? 'selected' : '' }}>
                                        Workshop</option>
                                    <option value="networking" {{ old('event_type') == 'networking' ? 'selected' : '' }}>
                                        Networking Event</option>
                                    <option value="webinar" {{ old('event_type') == 'webinar' ? 'selected' : '' }}>Webinar
                                    </option>
                                    <option value="career-fair" {{ old('event_type') == 'career-fair' ? 'selected' : '' }}>
                                        Career Fair</option>
                                    <option value="hackathon" {{ old('event_type') == 'hackathon' ? 'selected' : '' }}>
                                        Hackathon</option>
                                    <option value="conference" {{ old('event_type') == 'conference' ? 'selected' : '' }}>
                                        Conference</option>
                                </select>
                                @error('event_type')
                                    <span class="error-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Event Date *</label>
                                <input type="date" name="event_date"
                                    class="form-input @error('event_date') error @enderror" value="{{ old('event_date') }}"
                                    min="{{ date('Y-m-d') }}" required>
                                @error('event_date')
                                    <span class="error-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Description *</label>
                            <textarea name="description" class="form-textarea @error('description') error @enderror" rows="5"
                                placeholder="Describe the event, what attendees will learn, who should attend..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="is_online" value="1"
                                    {{ old('is_online') ? 'checked' : '' }} onchange="toggleLocation()">
                                <span>This is an online event</span>
                            </label>
                        </div>

                        <div class="form-group" id="locationField" style="{{ old('is_online') ? 'display: none;' : '' }}">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-input @error('location') error @enderror"
                                placeholder="e.g., University Auditorium, Room 101" value="{{ old('location') }}">
                            @error('location')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Event URL (Optional)</label>
                            <input type="url" name="url" class="form-input @error('url') error @enderror"
                                placeholder="https://example.com/event" value="{{ old('url') }}">
                            @error('url')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                            <span class="form-hint">Link to event page or registration</span>
                        </div>

                        <div class="info-banner">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <circle cx="10" cy="10" r="8.5" stroke="currentColor" stroke-width="1.5" />
                                <path d="M10 6V10M10 14H10.01" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            <span>All events are reviewed before being published to ensure quality and relevance.</span>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <style>
        .create-page {
            background: #FAFBFC;
            min-height: 100vh;
        }

        .page-hero-small {
            background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%);
            padding: 60px 0;
            color: white;
            text-align: center;
        }

        .form-section {
            padding: 60px 0;
        }

        .form-container {
            max-width: 720px;
            margin: 0 auto;
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 48px;
        }

        .modern-form {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-input,
        .form-select,
        .form-textarea {
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.2s;
            background: white;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .form-input.error,
        .form-select.error,
        .form-textarea.error {
            border-color: #EF4444;
        }

        .form-textarea {
            resize: vertical;
            line-height: 1.6;
        }

        .form-select {
            cursor: pointer;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 640px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .form-container {
                padding: 32px 24px;
            }
        }

        .checkbox-group {
            padding: 16px 0;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
        }

        .checkbox-label input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .form-hint {
            font-size: 13px;
            color: var(--gray);
        }

        .error-text {
            font-size: 13px;
            color: #EF4444;
            font-weight: 500;
        }

        .info-banner {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            background: #EFF6FF;
            border: 1px solid #BFDBFE;
            border-radius: 8px;
            color: #1E40AF;
            font-size: 14px;
        }

        .info-banner svg {
            flex-shrink: 0;
            margin-top: 2px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            padding-top: 8px;
        }

        @media (max-width: 640px) {
            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions .btn {
                width: 100%;
            }
        }
    </style>

    <script>
        function toggleLocation() {
            const isOnline = document.querySelector('input[name="is_online"]').checked;
            const locationField = document.getElementById('locationField');
            const locationInput = document.querySelector('input[name="location"]');

            if (isOnline) {
                locationField.style.display = 'none';
                locationInput.value = '';
            } else {
                locationField.style.display = 'block';
            }
        }
    </script>
@endsection
