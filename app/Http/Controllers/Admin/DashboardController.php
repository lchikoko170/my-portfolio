<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Certification;
use App\Models\Service;
use App\Models\Event;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'experience' => Experience::count(),
            'education' => Education::count(),
            'certifications' => Certification::count(),
            'services' => Service::count(),
            'events' => Event::count(),
            'messages' => ContactMessage::count(),
        ];

        $profile = Profile::first();

        $recentProjects = Project::latest()
            ->take(5)
            ->get();

        $recentMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'profile',
            'recentProjects',
            'recentMessages'
        ));
    }
}