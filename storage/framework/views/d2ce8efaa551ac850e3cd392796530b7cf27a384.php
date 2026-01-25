<?php $__env->startSection('title', 'Share an Event'); ?>

<?php $__env->startSection('content'); ?>
    <div class="create-event-page">
        <div class="container">
            <div class="form-container">
                <div class="form-header">
                    <h1>📢 Share a Career Event</h1>
                    <p>Help your peers discover awesome opportunities! Share events from around the web or create your own.
                    </p>
                </div>

                <form action="<?php echo e(route('events.store')); ?>" method="POST" class="event-form">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="title" class="form-label">
                            <span class="label-icon">📝</span>
                            Event Title *
                        </label>
                        <input type="text" id="title" name="title"
                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="e.g., Tech Career Fair 2024" value="<?php echo e(old('title')); ?>" required>
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="event_type" class="form-label">
                            <span class="label-icon">🎯</span>
                            Event Type *
                        </label>
                        <select id="event_type" name="event_type"
                            class="form-control <?php $__errorArgs = ['event_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <option value="">Select event type...</option>
                            <option value="workshop" <?php echo e(old('event_type') == 'workshop' ? 'selected' : ''); ?>>Workshop
                            </option>
                            <option value="networking" <?php echo e(old('event_type') == 'networking' ? 'selected' : ''); ?>>Networking
                                Event</option>
                            <option value="webinar" <?php echo e(old('event_type') == 'webinar' ? 'selected' : ''); ?>>Webinar</option>
                            <option value="career-fair" <?php echo e(old('event_type') == 'career-fair' ? 'selected' : ''); ?>>Career
                                Fair</option>
                            <option value="hackathon" <?php echo e(old('event_type') == 'hackathon' ? 'selected' : ''); ?>>Hackathon
                            </option>
                            <option value="conference" <?php echo e(old('event_type') == 'conference' ? 'selected' : ''); ?>>Conference
                            </option>
                            <option value="meetup" <?php echo e(old('event_type') == 'meetup' ? 'selected' : ''); ?>>Meetup</option>
                        </select>
                        <?php $__errorArgs = ['event_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">
                            <span class="label-icon">📄</span>
                            Description *
                        </label>
                        <textarea id="description" name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            rows="5" placeholder="Describe the event, what attendees will learn, who should attend, etc." required><?php echo e(old('description')); ?></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <small class="form-hint">Make it compelling! Tell people why they should attend.</small>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="event_date" class="form-label">
                                <span class="label-icon">📅</span>
                                Event Date *
                            </label>
                            <input type="date" id="event_date" name="event_date"
                                class="form-control <?php $__errorArgs = ['event_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('event_date')); ?>" required>
                            <?php $__errorArgs = ['event_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-message"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="event_time" class="form-label">
                                <span class="label-icon">🕒</span>
                                Event Time
                            </label>
                            <input type="time" id="event_time" name="event_time" class="form-control"
                                value="<?php echo e(old('event_time', '09:00')); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="is_online" id="is_online" value="1"
                                <?php echo e(old('is_online') ? 'checked' : ''); ?> onchange="toggleLocationField()">
                            <span class="checkmark"></span>
                            <span class="checkbox-text">🌐 This is an online event</span>
                        </label>
                    </div>

                    <div class="form-group" id="locationField" style="<?php echo e(old('is_online') ? 'display: none;' : ''); ?>">
                        <label for="location" class="form-label">
                            <span class="label-icon">📍</span>
                            Location
                        </label>
                        <input type="text" id="location" name="location"
                            class="form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="e.g., University Auditorium, Room 101" value="<?php echo e(old('location')); ?>">
                        <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="url" class="form-label">
                            <span class="label-icon">🔗</span>
                            Event URL (Optional)
                        </label>
                        <input type="url" id="url" name="url"
                            class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="https://example.com/event-registration" value="<?php echo e(old('url')); ?>">
                        <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <small class="form-hint">Link to event page, registration, or more details</small>
                    </div>

                    <div class="info-box">
                        <div class="info-icon">ℹ️</div>
                        <div class="info-content">
                            <strong>Note:</strong> All events are reviewed before being published to ensure quality and
                            relevance for our community.
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="<?php echo e(route('events.index')); ?>" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary-gradient">
                            🚀 Submit Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .create-event-page {
            min-height: 100vh;
            padding: 40px 0 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 12px;
        }

        .form-header p {
            font-size: 1.05rem;
            color: #666;
            line-height: 1.6;
        }

        .event-form {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .label-icon {
            font-size: 1.2rem;
        }

        .form-control {
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 6px;
        }

        .form-hint {
            color: #999;
            font-size: 0.85rem;
            margin-top: 6px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .form-container {
                padding: 30px 20px;
            }
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            padding: 16px;
            background: #f8f9fa;
            border-radius: 10px;
            transition: background 0.3s;
        }

        .checkbox-label:hover {
            background: #e9ecef;
        }

        .checkbox-label input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .checkbox-text {
            font-weight: 600;
            color: #333;
        }

        .info-box {
            display: flex;
            gap: 16px;
            padding: 20px;
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            border-radius: 10px;
        }

        .info-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .info-content {
            color: #1565c0;
            line-height: 1.6;
        }

        .info-content strong {
            font-weight: 700;
        }

        .form-actions {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }

        .btn {
            padding: 12px 32px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-primary-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #555;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        select.form-control {
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }
    </style>

    <script>
        function toggleLocationField() {
            const isOnline = document.getElementById('is_online').checked;
            const locationField = document.getElementById('locationField');
            const locationInput = document.getElementById('location');

            if (isOnline) {
                locationField.style.display = 'none';
                locationInput.value = '';
                locationInput.removeAttribute('required');
            } else {
                locationField.style.display = 'block';
            }
        }

        // Combine date and time before form submission
        // document.querySelector('.event-form').addEventListener('submit', function(e) {
        //     const dateInput = document.getElementById('event_date');
        //     const timeInput = document.getElementById('event_time');

        //     if (dateInput.value && timeInput.value) {
        //         const dateTime = dateInput.value + ' ' + timeInput.value;
        //         dateInput.value = dateTime;
        //     }
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackathon\VibeTribe\resources\views/events/create.blade.php ENDPATH**/ ?>