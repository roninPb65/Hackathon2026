<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot.index');
    }

    public function chat(Request $request)
    {
        $message = $request->input('message');

        // Simple rule-based responses for ATS help
        $response = $this->getATSResponse($message);

        return response()->json(['response' => $response]);
    }

    private function getATSResponse($message)
    {
        $message = strtolower($message);

        // ATS Keywords
        if (strpos($message, 'keyword') !== false || strpos($message, 'ats') !== false) {
            return "**ATS Tips for Keywords:**\n\n" .
                   "1. **Use exact job title** from the posting\n" .
                   "2. **Include industry terms** (e.g., 'project management', 'data analysis')\n" .
                   "3. **Add technical skills** mentioned in job description\n" .
                   "4. **Use both acronyms and full terms** (SEO & Search Engine Optimization)\n" .
                   "5. **Avoid graphics/tables** - ATS can't read them!\n\n" .
                   "Example: Instead of 'Led team', write 'Project Manager leading cross-functional team of 5'";
        }

        // Resume formatting
        if (strpos($message, 'format') !== false || strpos($message, 'resume') !== false) {
            return "**ATS-Friendly Resume Format:**\n\n" .
                   "✅ **DO:**\n" .
                   "- Use standard headings (Experience, Education, Skills)\n" .
                   "- Save as .docx or PDF (check job posting!)\n" .
                   "- Use simple bullet points\n" .
                   "- Include phone number and email at top\n\n" .
                   "❌ **DON'T:**\n" .
                   "- Use headers/footers\n" .
                   "- Add images or graphics\n" .
                   "- Use tables or columns\n" .
                   "- Submit as a .pages file";
        }

        // Action verbs
        if (strpos($message, 'verb') !== false || strpos($message, 'action') !== false) {
            return "**Power Action Verbs for Your Resume:**\n\n" .
                   "**Leadership:** Led, Managed, Coordinated, Directed, Supervised\n" .
                   "**Achievement:** Achieved, Improved, Increased, Reduced, Generated\n" .
                   "**Technical:** Developed, Programmed, Designed, Built, Implemented\n" .
                   "**Communication:** Presented, Collaborated, Negotiated, Facilitated\n\n" .
                   "💡 **Pro tip:** Start each bullet with a different action verb!";
        }

        // Skills section
        if (strpos($message, 'skill') !== false) {
            return "**How to List Skills for ATS:**\n\n" .
                   "1. Create a dedicated 'Skills' section\n" .
                   "2. List technical skills with proficiency (Excel - Advanced)\n" .
                   "3. Include soft skills mentioned in job posting\n" .
                   "4. Use industry-standard terminology\n" .
                   "5. Group similar skills together\n\n" .
                   "Example:\n" .
                   "**Technical:** Python, SQL, Tableau, Microsoft Excel\n" .
                   "**Soft Skills:** Project Management, Team Leadership, Problem Solving";
        }

        // Default response
        return "I'm your ATS Resume Helper! 🤖\n\n" .
               "I can help you with:\n" .
               "- **Keywords** - How to use the right keywords\n" .
               "- **Format** - ATS-friendly resume formatting\n" .
               "- **Action Verbs** - Power words that get noticed\n" .
               "- **Skills** - How to list your skills effectively\n\n" .
               "Just ask me a question about any of these topics!";
    }
}
