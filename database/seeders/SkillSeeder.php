<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            // Technical Skills
            ['name' => 'Python', 'category' => 'technical', 'demand_score' => 10],
            ['name' => 'JavaScript', 'category' => 'technical', 'demand_score' => 9],
            ['name' => 'SQL', 'category' => 'technical', 'demand_score' => 10],
            ['name' => 'Excel (Advanced)', 'category' => 'technical', 'demand_score' => 9],
            ['name' => 'Data Analysis', 'category' => 'technical', 'demand_score' => 10],
            ['name' => 'React', 'category' => 'technical', 'demand_score' => 8],
            ['name' => 'HTML/CSS', 'category' => 'technical', 'demand_score' => 7],
            ['name' => 'Git/GitHub', 'category' => 'technical', 'demand_score' => 9],
            ['name' => 'Tableau', 'category' => 'technical', 'demand_score' => 8],
            ['name' => 'Power BI', 'category' => 'technical', 'demand_score' => 8],
            ['name' => 'Adobe Creative Suite', 'category' => 'technical', 'demand_score' => 7],
            ['name' => 'Figma', 'category' => 'technical', 'demand_score' => 8],

            // Soft Skills
            ['name' => 'Communication', 'category' => 'soft', 'demand_score' => 10],
            ['name' => 'Leadership', 'category' => 'soft', 'demand_score' => 9],
            ['name' => 'Problem Solving', 'category' => 'soft', 'demand_score' => 10],
            ['name' => 'Teamwork', 'category' => 'soft', 'demand_score' => 10],
            ['name' => 'Time Management', 'category' => 'soft', 'demand_score' => 9],
            ['name' => 'Critical Thinking', 'category' => 'soft', 'demand_score' => 9],
            ['name' => 'Adaptability', 'category' => 'soft', 'demand_score' => 9],
            ['name' => 'Public Speaking', 'category' => 'soft', 'demand_score' => 8],

            // Industry Skills
            ['name' => 'Project Management', 'category' => 'industry', 'demand_score' => 10],
            ['name' => 'Digital Marketing', 'category' => 'industry', 'demand_score' => 9],
            ['name' => 'Content Writing', 'category' => 'industry', 'demand_score' => 8],
            ['name' => 'Social Media Management', 'category' => 'industry', 'demand_score' => 8],
            ['name' => 'Market Research', 'category' => 'industry', 'demand_score' => 8],
            ['name' => 'Financial Analysis', 'category' => 'industry', 'demand_score' => 9],
            ['name' => 'UX/UI Design', 'category' => 'industry', 'demand_score' => 9],
            ['name' => 'Customer Service', 'category' => 'industry', 'demand_score' => 7],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
