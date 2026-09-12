<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $profile?->name ?? 'My Portfolio' }}
        -
        {{ $profile?->title ?? 'ICT Professional & Software Developer' }}
    </title>

    <meta
        name="description"
        content="{{ $profile?->subtitle ?? 'Professional portfolio website' }}"
    >

    @vite(['resources/css/app.css'])

    <style>
        /* ============================================================
           HERO — ROTATING BACKGROUND SLIDESHOW
           ============================================================ */

        .hero {
            position: relative;

            min-height: calc(100vh - 68px);

            display: flex;
            align-items: center;

            background: #052e16; /* fallback dark green */

            overflow: hidden;

            isolation: isolate;
        }

        /* Base background layer (first image, always visible underneath) */
        .hero::before {
            content: "";
            position: absolute;
            inset: 0;

            background-image: url('/files/1777884101434.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;

            z-index: -3;

            /* override any base styles */
            width: auto;
            height: auto;
            right: auto;
            bottom: auto;
            border-radius: 0;
        }

        /* Rotating image layers */
        .hero-bg {
            position: absolute;
            inset: 0;

            z-index: -2;

            pointer-events: none;
        }

        .hero-bg span {
            position: absolute;
            inset: 0;

            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;

            opacity: 0;

            animation: heroRotate 32s ease-in-out infinite;

            will-change: opacity, transform;
        }

        /*
         * 4 images → 32s total cycle, each offset by 8s.
         */
        .hero-bg span:nth-child(1) {
            background-image: url('/files/1777884101434.jpg');
            animation-delay: 0s;
        }
        .hero-bg span:nth-child(2) {
            background-image: url('/files/WhatsApp Image 2026-02-19 at 6.08.53 PM.jpeg');
            animation-delay: 8s;
        }
        .hero-bg span:nth-child(3) {
            background-image: url('/files/WhatsApp Image 2026-08-26 at 8.55.17 PM.jpeg');
            animation-delay: 16s;
        }
        .hero-bg span:nth-child(4) {
            background-image: url('/files/1783761006268.jpg');
            animation-delay: 24s;
        }

        @keyframes heroRotate {
            0% {
                opacity: 0;
                transform: scale(1.08);
            }
            4% {
                opacity: 1;
            }
            25% {
                opacity: 1;
                transform: scale(1);
            }
            29% {
                opacity: 0;
                transform: scale(1.02);
            }
            100% {
                opacity: 0;
                transform: scale(1.08);
            }
        }

        /* Dark + green overlay so text stays readable */
        .hero::after {
            content: "";
            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    120deg,
                    rgba(5, 46, 22, 0.82) 0%,
                    rgba(11, 46, 11, 0.65) 45%,
                    rgba(22, 163, 74, 0.35) 100%
                ),
                radial-gradient(
                    ellipse 70% 60% at 15% 50%,
                    rgba(0, 0, 0, 0.45),
                    transparent 70%
                );

            z-index: -1;

            pointer-events: none;

            /* override any base styles */
            background-image:
                linear-gradient(
                    120deg,
                    rgba(5, 46, 22, 0.82) 0%,
                    rgba(11, 46, 11, 0.65) 45%,
                    rgba(22, 163, 74, 0.35) 100%
                ),
                radial-gradient(
                    ellipse 70% 60% at 15% 50%,
                    rgba(0, 0, 0, 0.45),
                    transparent 70%
                );

            background-size: auto;
            mask-image: none;
            -webkit-mask-image: none;
        }

        /* Hero content sits above all background layers */
        .hero .container {
            position: relative;
            z-index: 1;
        }

        /* Light text on dark moving background */
        .hero h1 {
            color: #ffffff;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.35);
        }

        .hero h2 {
            color: #d1fae5;
            text-shadow: 0 1px 12px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            color: rgba(255, 255, 255, 0.88);
            text-shadow: 0 1px 10px rgba(0, 0, 0, 0.35);
        }

        /* Glassy "Hello, I'm" pill */
        .hero-intro {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);

            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);

            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
        }

        /* Glassy outline button */
        .hero .btn-outline {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.45);

            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .hero .btn-outline:hover {
            color: #0b2e0b;
            background: #ffffff;
            border-color: #ffffff;

            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        /* Keep gradient text readable over the dark hero */
        .hero h1 em {
            background:
                linear-gradient(
                    120deg,
                    var(--primary-light) 0%,
                    var(--accent-light) 100%
                );
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Respect reduced motion preference */
        @media (prefers-reduced-motion: reduce) {
            .hero-bg span {
                animation: none !important;
            }
            .hero-bg span:nth-child(1) {
                opacity: 1;
            }
        }
    </style>

</head>


<body>

    <!-- =========================================================
         NAVIGATION
         ========================================================= -->

    <nav class="navbar">

        <div class="container">

            <!-- Logo / Name -->

            <a
                href="{{ route('home') }}"
                class="logo"
            >
                {{ $profile?->name ?? 'Portfolio' }}
            </a>


            <!-- Navigation Links -->

            <div class="nav-links">

                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#skills" class="nav-link">Skills</a>
                <a href="#experience" class="nav-link">Experience</a>
                <a href="#projects" class="nav-link">Projects</a>
                <a href="#education" class="nav-link">Education</a>
                <a href="#certifications" class="nav-link">Certifications</a>
                <a href="#services" class="nav-link">Services</a>
                <a href="#events" class="nav-link">Events</a>
                <a href="#contact" class="nav-link">Contact</a>


                <!-- =================================================
                     LOGIN / ADMIN DASHBOARD
                     ================================================= -->

                @auth

                    <!-- Authenticated user -->

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="nav-login"
                    >
                        Admin Dashboard
                    </a>

                @else

                    <!-- Guest -->

                    <a
                        href="{{ route('admin.login') }}"
                        class="nav-login"
                    >
                        Login
                    </a>

                @endauth

            </div>

        </div>

    </nav>



    <!-- =========================================================
         HERO
         ========================================================= -->

    <section class="hero">

        <!-- Rotating background images -->
        <div class="hero-bg" aria-hidden="true">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="container">

            <div class="hero-content">

                <span class="hero-intro">
                    Hello, I'm
                </span>

                <h1>
                    {{ $profile?->name ?? 'Your Name' }}
                </h1>

                <h2>
                    {{ $profile?->title ?? 'ICT Professional & Software Developer' }}
                </h2>

                <p>
                    {{ $profile?->subtitle ?? 'Welcome to my professional portfolio.' }}
                </p>


                <div class="hero-buttons">

                    <a
                        href="#projects"
                        class="btn btn-primary"
                    >
                        View My Work
                    </a>

                    <a
                        href="#contact"
                        class="btn btn-outline"
                    >
                        Contact Me
                    </a>

                </div>

            </div>

        </div>

    </section>



    <!-- =========================================================
         ABOUT
         ========================================================= -->

    <section id="about" class="fade-section">

        <div class="container">

            <div class="section-header">

                <h2>
                    About Me
                </h2>

                <p>
                    Get to know more about my professional background
                    and experience.
                </p>

            </div>


            <div class="about-grid">

                <div class="about-image">

                    <img
                        src="{{ asset('files/5D__0679.JPG') }}"
                        alt="{{ $profile?->name ?? 'About Me' }}"
                    >

                </div>


                <div class="about-content">

                    <h3>
                        {{ $profile?->title ?? 'ICT Professional & Software Developer' }}
                    </h3>

                    <p>
                        {{ $profile?->about ?? 'About me information will appear here.' }}
                    </p>


                    @if($profile)

                        <div class="about-details">

                            @if($profile->location)

                                <div class="about-detail">

                                    <strong>
                                        Location
                                    </strong>

                                    <span>
                                        {{ $profile->location }}
                                    </span>

                                </div>

                            @endif


                            @if($profile->email)

                                <div class="about-detail">

                                    <strong>
                                        Email
                                    </strong>

                                    <span>
                                        {{ $profile->email }}
                                    </span>

                                </div>

                            @endif


                            @if($profile->phone)

                                <div class="about-detail">

                                    <strong>
                                        Phone
                                    </strong>

                                    <span>
                                        {{ $profile->phone }}
                                    </span>

                                </div>

                            @endif

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </section>



    <!-- =========================================================
         SKILLS
         ========================================================= -->

    <section id="skills" class="fade-section">

        <div class="container">

            <div class="section-header">

                <h2>
                    Skills
                </h2>

                <p>
                    Technologies and professional skills I work with.
                </p>

            </div>


            @if($skills->count())

                <div class="skills-grid">

                    @foreach($skills as $skill)

                        <div class="skill-card">

                            <div class="skill-header">

                                <span class="skill-name">
                                    {{ $skill->name }}
                                </span>

                                <span class="skill-percentage">
                                    {{ $skill->percentage }}%
                                </span>

                            </div>


                            <div class="skill-bar">

                                <div
                                    class="skill-progress"
                                    data-width="{{ $skill->percentage }}%"
                                    style="width: 0%"
                                ></div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <p>
                        No skills have been added yet.
                    </p>

                </div>

            @endif

        </div>

    </section>



    <!-- =========================================================
         EXPERIENCE
         ========================================================= -->

    <section id="experience" class="fade-section">

        <div class="container">

            <div class="section-header">

                <h2>
                    Experience
                </h2>

                <p>
                    My professional experience and career journey.
                </p>

            </div>


            @if($experiences->count())

                <div class="timeline">

                    @foreach($experiences as $experience)

                        <div class="timeline-item">

                            <div class="timeline-card">

                                <h3>
                                    {{ $experience->job_title }}
                                </h3>

                                <div class="timeline-company">
                                    {{ $experience->company }}
                                </div>


                                <span class="timeline-date">

                                    {{ optional($experience->start_date)->format('M Y') }}

                                    -

                                    @if($experience->current)

                                        Present

                                    @else

                                        {{ optional($experience->end_date)->format('M Y') }}

                                    @endif

                                </span>


                                <p>
                                    {{ $experience->description }}
                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <p>
                        No experience has been added yet.
                    </p>

                </div>

            @endif

        </div>

    </section>



    <!-- =========================================================
         PROJECTS
         ========================================================= -->

    <section id="projects" class="fade-section">

        <div class="container">

            <div class="section-header">

                <h2>
                    Projects
                </h2>

                <p>
                    Selected projects and software solutions I have worked on.
                </p>

            </div>


            @if($projects->count())

                <div class="projects-grid">

                    @foreach($projects as $project)

                        <article class="project-card">

                            <div class="project-image">

                                @if($project->image)

                                    <img
                                        src="{{ asset('storage/' . $project->image) }}"
                                        alt="{{ $project->title }}"
                                    >

                                @else

                                    <div class="project-placeholder">

                                        {{ strtoupper(substr($project->title, 0, 1)) }}

                                    </div>

                                @endif

                            </div>


                            <div class="project-content">

                                <h3>
                                    {{ $project->title }}
                                </h3>


                                <p>
                                    {{ $project->short_description }}
                                </p>


                                @if($project->technologies)

                                    <div class="project-tech">

                                        @foreach(explode(',', $project->technologies) as $technology)

                                            <span class="tech-tag">

                                                {{ trim($technology) }}

                                            </span>

                                        @endforeach

                                    </div>

                                @endif


                                <div class="project-links">

                                    @if($project->github_url)

                                        <a
                                            href="{{ $project->github_url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            GitHub
                                        </a>

                                    @endif


                                    @if($project->live_url)

                                        <a
                                            href="{{ $project->live_url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            Live Demo
                                        </a>

                                    @endif

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <p>
                        No projects have been added yet.
                    </p>

                </div>

            @endif

        </div>

    </section>



    <!-- =========================================================
         EDUCATION
         ========================================================= -->

    <section id="education" class="fade-section">

        <div class="container">

            <div class="section-header">

                <h2>
                    Education
                </h2>

                <p>
                    Academic background and qualifications.
                </p>

            </div>


            @if($educations->count())

                <div class="education-grid">

                    @foreach($educations as $education)

                        <div class="education-card">

                            <h3>
                                {{ $education->qualification }}
                            </h3>


                            <div class="institution">
                                {{ $education->institution }}
                            </div>


                            <span class="date">

                                {{ optional($education->start_date)->format('Y') }}

                                -

                                {{ optional($education->end_date)->format('Y') }}

                            </span>


                            @if($education->field_of_study)

                                <p>
                                    {{ $education->field_of_study }}
                                </p>

                            @endif


                            @if($education->description)

                                <p>
                                    {{ $education->description }}
                                </p>

                            @endif

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <p>
                        No education records have been added yet.
                    </p>

                </div>

            @endif

        </div>

    </section>



    <!-- =========================================================
         CERTIFICATIONS
         ========================================================= -->

    <section id="certifications" class="fade-section">

        <div class="container">

            <div class="section-header">

                <h2>
                    Certifications
                </h2>

                <p>
                    Professional certifications and achievements.
                </p>

            </div>


            @if($certifications->count())

                <div class="certifications-grid">

                    @foreach($certifications as $certification)

                        <div class="certification-card">

                            <div class="certification-icon">
                                ✓
                            </div>


                            <h3>
                                {{ $certification->name }}
                            </h3>


                            <div class="organization">
                                {{ $certification->organization }}
                            </div>


                            @if($certification->issue_date)

                                <p>

                                    Issued:

                                    {{ $certification->issue_date->format('M Y') }}

                                </p>

                            @endif


                            @if($certification->credential_url)

                                <a
                                    href="{{ $certification->credential_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn btn-outline"
                                >
                                    View Credential
                                </a>

                            @endif

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <p>
                        No certifications have been added yet.
                    </p>

                </div>

            @endif

        </div>

    </section>



    <!-- =========================================================
         SERVICES
         ========================================================= -->

    <section id="services" class="fade-section">

        <div class="container">

            <div class="section-header">

                <h2>
                    Services
                </h2>

                <p>
                    Professional services and solutions I provide.
                </p>

            </div>


            @if($services->count())

                <div class="services-grid">

                    @foreach($services as $service)

                        <div class="service-card">

                            <div class="service-icon">
                                +
                            </div>


                            <h3>
                                {{ $service->title }}
                            </h3>


                            <p>
                                {{ $service->description }}
                            </p>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <p>
                        No services have been added yet.
                    </p>

                </div>

            @endif

        </div>

    </section>



    <!-- =========================================================
         EVENTS
         ========================================================= -->

    <section id="events" class="fade-section">

        <div class="container">

            <div class="section-header">

                <h2>
                    Events & Conferences
                </h2>

                <p>
                    Conferences, workshops and professional events.
                </p>

            </div>


            @if($events->count())

                <div class="events-grid">

                    @foreach($events as $event)

                        <div class="event-card">

                            <span class="event-date">
                                {{ optional($event->event_date)->format('d M Y') }}
                            </span>


                            <h3>
                                {{ $event->title }}
                            </h3>


                            @if($event->location)

                                <p>
                                    {{ $event->location }}
                                </p>

                            @endif


                            @if($event->description)

                                <p>
                                    {{ $event->description }}
                                </p>

                            @endif

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <p>
                        No events have been added yet.
                    </p>

                </div>

            @endif

        </div>

    </section>



    <!-- =========================================================
         CONTACT
         ========================================================= -->

    <section id="contact" class="fade-section">

        <div class="container">

            <div class="section-header">

                <h2>
                    Contact Me
                </h2>

                <p>
                    Have a project, opportunity or collaboration in mind?
                    Let's connect.
                </p>

            </div>


            <div class="contact-wrapper">


                <!-- Contact Information -->

                <div class="contact-info">

                    <h3>
                        Let's Work Together
                    </h3>


                    <p>
                        I'm always open to discussing technology,
                        software development, ICT projects and
                        professional opportunities.
                    </p>


                    @if($profile?->email)

                        <div class="contact-item">

                            <div class="contact-icon">
                                @
                            </div>

                            <div>

                                <strong>
                                    Email
                                </strong>

                                <span>
                                    {{ $profile->email }}
                                </span>

                            </div>

                        </div>

                    @endif


                    @if($profile?->phone)

                        <div class="contact-item">

                            <div class="contact-icon">
                                ☎
                            </div>

                            <div>

                                <strong>
                                    Phone
                                </strong>

                                <span>
                                    {{ $profile->phone }}
                                </span>

                            </div>

                        </div>

                    @endif


                    @if($profile?->location)

                        <div class="contact-item">

                            <div class="contact-icon">
                                📍
                            </div>

                            <div>

                                <strong>
                                    Location
                                </strong>

                                <span>
                                    {{ $profile->location }}
                                </span>

                            </div>

                        </div>

                    @endif

                </div>



                <!-- Contact Form -->

                <form
                    action="{{ route('contact.store') }}"
                    method="POST"
                    class="contact-form"
                >

                    @csrf


                    <div class="form-group">

                        <label for="name">
                            Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="subject">
                            Subject
                        </label>

                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            class="form-control"
                            value="{{ old('subject') }}"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="message">
                            Message
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            class="form-control"
                            required
                        >{{ old('message') }}</textarea>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </section>



    <!-- =========================================================
         FOOTER
         ========================================================= -->

    <footer>

        <div class="container">

            <div class="footer-content">


                <div>

                    <div class="footer-logo">

                        {{ $profile?->name ?? 'My Portfolio' }}

                    </div>


                    <p>

                        © {{ date('Y') }}

                        All rights reserved.

                    </p>

                </div>


                <div class="footer-socials">


                    @if($profile?->github_url)

                        <a
                            href="{{ $profile->github_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="GitHub"
                        >
                            GH
                        </a>

                    @endif


                    @if($profile?->linkedin_url)

                        <a
                            href="{{ $profile->linkedin_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="LinkedIn"
                        >
                            IN
                        </a>

                    @endif


                    @if($profile?->facebook_url)

                        <a
                            href="{{ $profile->facebook_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook"
                        >
                            FB
                        </a>

                    @endif

                </div>

            </div>

        </div>

    </footer>



    <!-- =========================================================
         SCROLL TO TOP
         ========================================================= -->

    <a
        href="#"
        class="scroll-top"
        aria-label="Back to top"
    >
        ↑
    </a>



    <!-- =========================================================
         INTERACTIVITY SCRIPT
         ========================================================= -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // =============================================
            // 1. SMOOTH SCROLL FOR ANCHOR LINKS
            // =============================================
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    const target = document.querySelector(targetId);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });


            // =============================================
            // 2. ACTIVE NAV LINK HIGHLIGHTING (Intersection Observer)
            // =============================================
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');

            const navObserver = new IntersectionObserver((entries) => {
                let activeId = null;
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        activeId = entry.target.getAttribute('id');
                    }
                });
                if (activeId) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === '#' + activeId) {
                            link.classList.add('active');
                        }
                    });
                }
            }, { rootMargin: '-40% 0px -60% 0px' });

            sections.forEach(section => navObserver.observe(section));


            // =============================================
            // 3. FADE-IN SECTIONS ON SCROLL
            // =============================================
            const fadeSections = document.querySelectorAll('.fade-section');
            const fadeObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        fadeObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            fadeSections.forEach(section => fadeObserver.observe(section));


            // =============================================
            // 4. SCROLL TO TOP BUTTON
            // =============================================
            const scrollTopBtn = document.querySelector('.scroll-top');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 500) {
                    scrollTopBtn.classList.add('visible');
                } else {
                    scrollTopBtn.classList.remove('visible');
                }
            });

            scrollTopBtn.addEventListener('click', (e) => {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });


            // =============================================
            // 5. SKILL BAR ANIMATION
            // =============================================
            const skillBars = document.querySelectorAll('.skill-progress');
            const skillObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bar = entry.target;
                        const width = bar.getAttribute('data-width');
                        // small delay to ensure the transition is visible
                        setTimeout(() => {
                            bar.style.width = width;
                        }, 100);
                        skillObserver.unobserve(bar);
                    }
                });
            }, { threshold: 0.3 });

            skillBars.forEach(bar => skillObserver.observe(bar));


            // =============================================
            // 6. CONTACT FORM FEEDBACK (simple validation hint)
            // =============================================
            const contactForm = document.querySelector('.contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', function (e) {
                    const submitBtn = this.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.textContent = 'Sending...';
                        submitBtn.disabled = true;
                    }
                });
            }


            // =============================================
            // 7. NAVBAR SHADOW ON SCROLL
            // =============================================
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 10) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

        });
    </script>

</body>

</html>
