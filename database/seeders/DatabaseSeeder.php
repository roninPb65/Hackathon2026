<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Action;
use App\Models\UserAction;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call([
            SkillSeeder::class,
            ActionSeeder::class,
            // Add other seeders as needed
        ]);

        // // Create test user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create Events
        $events = [
            [
                'user_id' => 1,
                'title' => 'Tech Career Fair 2025 by Career Services',
                'description' => 'Meet top tech companies and explore career opportunities in software development, data science, and more. Max Seats-200',
                'event_type' => 'career_fair',
                'event_date' => now()->addDays(15),
                'location' => 'University Convention Center',
                'url' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800',
            ],
            [
                'user_id' => 1,
                'title' => 'Resume Writing Workshop by Career Development Office',
                'description' => 'Learn how to craft a compelling resume that stands out to employers and passes ATS systems. Max Seats-50',
                'event_type' => 'workshop',
                'event_date' => now()->addDays(7),
                'location' => 'Student Center Room 203',
                'url' => 'https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=800',
            ],
            [
                'user_id' => 1,
                'title' => 'Networking Mixer: Tech Professionals by Alumni Association',
                'description' => 'Connect with alumni and industry professionals in an informal setting. Perfect for building your network! Max Seats-100',
                'event_type' => 'networking',
                'event_date' => now()->addDays(10),
                'location' => 'Downtown Business Hub',
                'url' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800',
            ],
            [
                'user_id' => 1,
                'title' => 'Mock Interview Sessions by Career Services',
                'description' => 'Practice your interview skills with experienced recruiters and get personalized feedback. Max Seats-30',
                'event_type' => 'workshop',
                'event_date' => now()->addDays(5),
                'location' => 'Career Center',
                'url' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800',
            ],
            [
                'user_id' => 1,
                'title' => 'LinkedIn Profile Optimization by Career Development',
                'description' => 'Maximize your LinkedIn presence to attract recruiters and expand your professional network. Max Seats-75',
                'event_type' => 'workshop',
                'event_date' => now()->addDays(12),
                'location' => 'Online - Zoom',
                'url' => 'https://images.unsplash.com/photo-1611944212129-29977ae1398c?w=800',
            ],
        ];

        foreach ($events as $eventData) {
            Event::create($eventData);
        }

        // Create Actions
        $actions = [
            // Networking Actions
            [
                'title' => 'Connect with 5 Alumni on LinkedIn',
                'description' => 'Reach out to alumni in your field of interest. Personalize your connection requests and mention shared experiences. Max-Time:30min',
                'category' => 'networking',
                'impact_score' => 3,
            ],
            [
                'title' => 'Attend a Networking Event',
                'description' => 'Participate in a professional networking event to meet industry professionals and expand your network. Max-Time:120min',
                'category' => 'networking',
                'impact_score' => 5,
            ],
            [
                'title' => 'Schedule an Informational Interview',
                'description' => 'Reach out to a professional in your desired field and set up a 20-30 minute informational interview. Max-Time:60min',
                'category' => 'networking',
                'impact_score' => 4,
            ],

            // Skills Development
            [
                'title' => 'Complete an Online Course',
                'description' => 'Finish a relevant online course on platforms like Coursera, Udemy, or LinkedIn Learning to enhance your skills. Max-Time:300min',
                'category' => 'skills',
                'impact_score' => 4,
            ],
            [
                'title' => 'Build a Portfolio Project',
                'description' => 'Create a project that showcases your skills. Document it on GitHub and add it to your portfolio. Max-Time:480min',
                'category' => 'skills',
                'impact_score' => 5,
            ],
            [
                'title' => 'Learn a New Programming Language',
                'description' => 'Start learning a new programming language relevant to your career goals. Complete at least 5 tutorials. Max-Time:360min',
                'category' => 'skills',
                'impact_score' => 4,
            ],

            // Resume Building
            [
                'title' => 'Update Your Resume',
                'description' => 'Review and update your resume with recent experiences, skills, and achievements. Use action verbs and quantify results. Max-Time:60min',
                'category' => 'resume',
                'impact_score' => 3,
            ],
            [
                'title' => 'Tailor Resume for Specific Job',
                'description' => 'Customize your resume for a specific job posting by highlighting relevant skills and experiences. Max-Time:45min',
                'category' => 'resume',
                'impact_score' => 4,
            ],
            [
                'title' => 'Get Resume Reviewed by Career Services',
                'description' => 'Schedule an appointment with career services for a professional resume review and feedback. Max-Time:30min',
                'category' => 'resume',
                'impact_score' => 4,
            ],

            // Events
            [
                'title' => 'Register for Career Fair',
                'description' => 'Sign up for the upcoming career fair and research attending companies beforehand. Max-Time:15min',
                'category' => 'events',
                'impact_score' => 3,
            ],
            [
                'title' => 'Attend a Workshop',
                'description' => 'Participate in a career development workshop to learn new skills or strategies. Max-Time:90min',
                'category' => 'events',
                'impact_score' => 3,
            ],
            [
                'title' => 'Join a Professional Organization',
                'description' => 'Become a member of a professional organization related to your field of study. Max-Time:30min',
                'category' => 'events',
                'impact_score' => 4,
            ],
        ];

        $createdActions = [];
        foreach ($actions as $actionData) {
            $createdActions[] = Action::create($actionData);
        }

        // Create User Actions (completed actions)
        $completedActions = [
            [
                'action_id' => $createdActions[0]->id, // Connect with Alumni
                'completed_at' => now()->subDays(2),
                'reflection' => 'Connected with 5 alumni working at tech companies. Got great insights about the industry and one even offered to refer me!',
            ],
            [
                'action_id' => $createdActions[6]->id, // Update Resume
                'completed_at' => now()->subDays(5),
                'reflection' => 'Updated my resume with new projects and skills. Made sure to use strong action verbs and quantified my achievements.',
            ],
            [
                'action_id' => $createdActions[1]->id, // Attend Networking Event
                'completed_at' => now()->subDays(10),
                'reflection' => 'Attended the tech networking mixer. Met several professionals and exchanged contact info with 3 potential mentors.',
            ],
            [
                'action_id' => $createdActions[3]->id, // Complete Online Course
                'completed_at' => now()->subDays(15),
                'reflection' => 'Finished the "Advanced React" course on Udemy. Built 3 projects and earned a certificate. Feeling much more confident!',
            ],
            [
                'action_id' => $createdActions[9]->id, // Register for Career Fair
                'completed_at' => now()->subDays(7),
                'reflection' => 'Registered for the career fair and researched 10 companies I want to talk to. Prepared my elevator pitch!',
            ],
            [
                'action_id' => $createdActions[7]->id, // Tailor Resume
                'completed_at' => now()->subDays(3),
                'reflection' => 'Customized my resume for a software engineering position at Google. Highlighted relevant projects and technical skills.',
            ],
            [
                'action_id' => $createdActions[10]->id, // Attend Workshop
                'completed_at' => now()->subDays(20),
                'reflection' => 'Attended the LinkedIn workshop. Optimized my profile and learned how to engage with content effectively.',
            ],
            [
                'action_id' => $createdActions[2]->id, // Informational Interview
                'completed_at' => now()->subDays(12),
                'reflection' => 'Had a great informational interview with a senior developer. Learned about career paths and got advice on skills to focus on.',
            ],
        ];

        foreach ($completedActions as $userActionData) {
            UserAction::create([
                'user_id' => 1,
                'action_id' => $userActionData['action_id'],
                'event_id' => null,
                'completed_at' => $userActionData['completed_at'],
                'reflection' => $userActionData['reflection'],
            ]);
        }

        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('📧 Test User Email: test@example.com');
        $this->command->info('🔑 Password: password');
    }
}
