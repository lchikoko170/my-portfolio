<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Certification;
use App\Models\Service;
use App\Models\Event;
use App\Models\SocialLink;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        $projects = Project::where('status', 'published')
            ->latest()
            ->get();

        $featuredProjects = Project::where('status', 'published')
            ->where('featured', true)
            ->latest()
            ->get();

        $skills = Skill::where('status', true)
            ->orderBy('sort_order')
            ->get();

        $experiences = Experience::latest('start_date')->get();

        $educations = Education::latest('start_date')->get();

        $certifications = Certification::latest('issue_date')->get();

        $services = Service::where('status', true)
            ->orderBy('sort_order')
            ->get();

        $events = Event::latest('event_date')->get();

        $socialLinks = SocialLink::where('status', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', compact(
            'profile',
            'projects',
            'featuredProjects',
            'skills',
            'experiences',
            'educations',
            'certifications',
            'services',
            'events',
            'socialLinks'
        ));
    }
}