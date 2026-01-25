<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Action;

class ActionSeeder extends Seeder
{
    public function run()
    {
        $actions = [
            // Networking Actions
            [
                'title' => 'Attend a Career Fair',
                'description' => 'Visit your university career fair or a local industry event. Bring copies of your resume and practice your elevator pitch.',
                'category' => 'networking',
                'impact_score' => 9
            ],
            [
                'title' => 'Connect with 5 Professionals on LinkedIn',
                'description' => 'Send personalized connection requests to professionals in your target industry. Mention shared interests or connections.',
                'category' => 'networking',
                'impact_score' => 7
            ],
            [
                'title' => 'Join a Professional Association',
                'description' => 'Become a student member of an industry-specific organization. Attend their events and webinars.',
                'category' => 'networking',
                'impact_score' => 8
            ],

            // Skills Actions
            [
                'title' => 'Complete an Online Certification',
                'description' => 'Finish a course on Coursera, Udemy, or LinkedIn Learning related to your career goals. Add it to your resume!',
                'category' => 'skills',
                'impact_score' => 10
            ],
            [
                'title' => 'Build a Portfolio Project',
                'description' => 'Create a real-world project showcasing your skills. This could be a website, app, design portfolio, or research paper.',
                'category' => 'skills',
                'impact_score' => 10
            ],
            [
                'title' => 'Learn a New Technical Skill',
                'description' => 'Pick up a skill in high demand: Python, Excel, SQL, or design tools. Dedicate 30 minutes daily for a month.',
                'category' => 'skills',
                'impact_score' => 8
            ],

            // Resume Actions
            [
                'title' => 'Optimize Resume for ATS',
                'description' => 'Use our ATS Helper chatbot to ensure your resume passes automated screening systems.',
                'category' => 'resume',
                'impact_score' => 9
            ],
            [
                'title' => 'Get Resume Reviewed',
                'description' => 'Have a career counselor, mentor, or professional review your resume. Implement their feedback.',
                'category' => 'resume',
                'impact_score' => 8
            ],
            [
                'title' => 'Quantify Your Achievements',
                'description' => 'Update every bullet point to include numbers: team size, budget managed, percentage improvements, etc.',
                'category' => 'resume',
                'impact_score' => 9
            ],

            // Events Actions
            [
                'title' => 'Attend a Workshop or Webinar',
                'description' => 'Participate in a skill-building workshop. Take notes and connect with other attendees.',
                'category' => 'events',
                'impact_score' => 7
            ],
            [
                'title' => 'Join a Hackathon or Competition',
                'description' => 'Participate in an industry competition. Great for building skills and making connections!',
                'category' => 'events',
                'impact_score' => 10
            ],
            [
                'title' => 'Volunteer at an Industry Event',
                'description' => 'Volunteering gives you insider access to events and helps you meet organizers and speakers.',
                'category' => 'events',
                'impact_score' => 8
            ],
        ];

        foreach ($actions as $action) {
            Action::create($action);
        }
    }
}
