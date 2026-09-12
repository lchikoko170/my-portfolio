<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Admin Dashboard | Portfolio
    </title>

    @vite(['resources/css/app.css'])

</head>


<body class="admin-body">

<div class="admin-layout">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside class="admin-sidebar">


        {{-- BRAND --}}

        <div class="admin-brand">

            <div class="admin-brand-icon">
                LP
            </div>

            <div>

                <h2>
                    Portfolio
                </h2>

                <span>
                    Administration
                </span>

            </div>

        </div>


        {{-- =================================================
             NAVIGATION
        ================================================== --}}

        <nav class="admin-navigation">


            {{-- MAIN --}}

            <p class="nav-heading">
                MAIN
            </p>


            <a
                href="{{ route('admin.dashboard') }}"
                class="admin-nav-link active"
            >

                <span>▦</span>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- CONTENT --}}

            <p class="nav-heading">
                CONTENT
            </p>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>◉</span>

                <span>
                    Profile
                </span>

            </a>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>▣</span>

                <span>
                    Projects
                </span>

            </a>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>◆</span>

                <span>
                    Skills
                </span>

            </a>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>◷</span>

                <span>
                    Experience
                </span>

            </a>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>▤</span>

                <span>
                    Education
                </span>

            </a>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>✓</span>

                <span>
                    Certifications
                </span>

            </a>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>◇</span>

                <span>
                    Services
                </span>

            </a>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>◫</span>

                <span>
                    Events
                </span>

            </a>


            {{-- COMMUNICATION --}}

            <p class="nav-heading">
                COMMUNICATION
            </p>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>✉</span>

                <span>
                    Messages
                </span>

                @if($stats['messages'] > 0)

                    <span class="nav-badge">
                        {{ $stats['messages'] }}
                    </span>

                @endif

            </a>


            {{-- SYSTEM --}}

            <p class="nav-heading">
                SYSTEM
            </p>


            <a
                href="#"
                class="admin-nav-link"
            >

                <span>⚙</span>

                <span>
                    Settings
                </span>

            </a>

        </nav>


        {{-- =================================================
             SIDEBAR BOTTOM
        ================================================== --}}

        <div class="admin-sidebar-bottom">


            {{-- VIEW WEBSITE --}}

            <a
                href="{{ route('home') }}"
                class="view-site-link"
            >

                <span>↗</span>

                <span>
                    View Website
                </span>

            </a>


            {{-- =================================================
                 LOGOUT
            ================================================== --}}

            <div class="admin-logout-section">

                <form
                    method="POST"
                    action="{{ route('admin.logout') }}"
                    class="logout-form"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-button"
                        title="Logout from administration"
                    >

                        <span class="logout-icon">
                            ⇥
                        </span>

                        <span class="logout-text">
                            Logout
                        </span>

                    </button>

                </form>

            </div>

        </div>

    </aside>


    {{-- =====================================================
         MAIN AREA
    ====================================================== --}}

    <main class="admin-main">


        {{-- =================================================
             HEADER
        ================================================== --}}

        <header class="admin-header">

            <div>

                <button
                    type="button"
                    class="mobile-menu-button"
                >
                    ☰
                </button>

                <div class="header-title">

                    <span class="header-label">
                        ADMINISTRATION
                    </span>

                    <h1>
                        Dashboard
                    </h1>

                </div>

            </div>


            {{-- ADMIN USER + LOGOUT BUTTON --}}

            <div class="admin-user">

                <div class="admin-user-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>


                <div class="admin-avatar">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>


                {{-- Logout button added directly in the header --}}

                <form
                    method="POST"
                    action="{{ route('admin.logout') }}"
                    class="header-logout-form"
                >

                    @csrf

                    <button
                        type="submit"
                        class="header-logout-button"
                        title="Logout from administration"
                    >

                        <span class="header-logout-icon">
                            ⇥
                        </span>

                        <span>
                            Logout
                        </span>

                    </button>

                </form>

            </div>

        </header>


        {{-- =================================================
             CONTENT
        ================================================== --}}

        <div class="admin-content">


            {{-- WELCOME --}}

            <section class="welcome-card">

                <div>

                    <span class="welcome-label">
                        WELCOME BACK
                    </span>

                    <h2>
                        {{ auth()->user()->name }}
                    </h2>

                    <p>
                        Manage your professional portfolio,
                        projects, experience and online presence
                        from one place.
                    </p>

                </div>


                <div class="welcome-icon">
                    ◈
                </div>

            </section>


            {{-- =================================================
                 STATISTICS
            ================================================== --}}

            <section class="statistics-grid">


                {{-- PROJECTS --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        ▣
                    </div>

                    <div>

                        <span>
                            Projects
                        </span>

                        <strong>
                            {{ $stats['projects'] }}
                        </strong>

                    </div>

                </div>


                {{-- SKILLS --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        ◆
                    </div>

                    <div>

                        <span>
                            Skills
                        </span>

                        <strong>
                            {{ $stats['skills'] }}
                        </strong>

                    </div>

                </div>


                {{-- EXPERIENCE --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        ◷
                    </div>

                    <div>

                        <span>
                            Experience
                        </span>

                        <strong>
                            {{ $stats['experience'] }}
                        </strong>

                    </div>

                </div>


                {{-- MESSAGES --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        ✉
                    </div>

                    <div>

                        <span>
                            Messages
                        </span>

                        <strong>
                            {{ $stats['messages'] }}
                        </strong>

                    </div>

                </div>

            </section>


            {{-- =================================================
                 SECONDARY STATISTICS
            ================================================== --}}

            <section class="secondary-stats">

                <div>

                    <span>
                        Education
                    </span>

                    <strong>
                        {{ $stats['education'] }}
                    </strong>

                </div>


                <div>

                    <span>
                        Certifications
                    </span>

                    <strong>
                        {{ $stats['certifications'] }}
                    </strong>

                </div>


                <div>

                    <span>
                        Services
                    </span>

                    <strong>
                        {{ $stats['services'] }}
                    </strong>

                </div>


                <div>

                    <span>
                        Events
                    </span>

                    <strong>
                        {{ $stats['events'] }}
                    </strong>

                </div>

            </section>


            {{-- =================================================
                 DASHBOARD GRID
            ================================================== --}}

            <section class="dashboard-grid">


                {{-- RECENT PROJECTS --}}

                <div class="dashboard-panel">

                    <div class="panel-header">

                        <div>

                            <span class="panel-label">
                                PORTFOLIO
                            </span>

                            <h3>
                                Recent Projects
                            </h3>

                        </div>


                        <a href="#">
                            View all
                        </a>

                    </div>


                    <div class="project-list">

                        @forelse($recentProjects as $project)

                            <div class="project-row">

                                <div class="project-icon">

                                    {{ strtoupper(substr($project->title, 0, 1)) }}

                                </div>


                                <div class="project-details">

                                    <strong>
                                        {{ $project->title }}
                                    </strong>

                                    <span>
                                        {{ $project->status }}
                                    </span>

                                </div>


                                <span class="project-arrow">
                                    →
                                </span>

                            </div>

                        @empty

                            <div class="empty-dashboard">

                                <span>
                                    ▣
                                </span>

                                <p>
                                    No projects added yet.
                                </p>

                                <a href="#">
                                    Add your first project
                                </a>

                            </div>

                        @endforelse

                    </div>

                </div>


                {{-- RECENT MESSAGES --}}

                <div class="dashboard-panel">

                    <div class="panel-header">

                        <div>

                            <span class="panel-label">
                                COMMUNICATION
                            </span>

                            <h3>
                                Recent Messages
                            </h3>

                        </div>


                        <a href="#">
                            View all
                        </a>

                    </div>


                    <div class="message-list">

                        @forelse($recentMessages as $message)

                            <div class="message-row">

                                <div class="message-avatar">

                                    {{ strtoupper(substr($message->name, 0, 1)) }}

                                </div>


                                <div class="message-details">

                                    <strong>
                                        {{ $message->name }}
                                    </strong>

                                    <span>
                                        {{ $message->email }}
                                    </span>

                                    <p>
                                        {{ Str::limit($message->message, 60) }}
                                    </p>

                                </div>

                            </div>

                        @empty

                            <div class="empty-dashboard">

                                <span>
                                    ✉
                                </span>

                                <p>
                                    No messages received yet.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </section>


            {{-- =================================================
                 QUICK ACTIONS
            ================================================== --}}

            <section class="quick-actions">

                <div class="panel-header">

                    <div>

                        <span class="panel-label">
                            QUICK ACTIONS
                        </span>

                        <h3>
                            Manage Portfolio
                        </h3>

                    </div>

                </div>


                <div class="quick-actions-grid">


                    {{-- ADD PROJECT --}}

                    <a
                        href="#"
                        class="quick-action"
                    >

                        <span>
                            ＋
                        </span>

                        <div>

                            <strong>
                                Add Project
                            </strong>

                            <small>
                                Create a new portfolio project
                            </small>

                        </div>

                    </a>


                    {{-- ADD SKILL --}}

                    <a
                        href="#"
                        class="quick-action"
                    >

                        <span>
                            ◆
                        </span>

                        <div>

                            <strong>
                                Add Skill
                            </strong>

                            <small>
                                Update your technical skills
                            </small>

                        </div>

                    </a>


                    {{-- ADD EXPERIENCE --}}

                    <a
                        href="#"
                        class="quick-action"
                    >

                        <span>
                            ◷
                        </span>

                        <div>

                            <strong>
                                Add Experience
                            </strong>

                            <small>
                                Update your career history
                            </small>

                        </div>

                    </a>


                    {{-- EDIT PROFILE --}}

                    <a
                        href="#"
                        class="quick-action"
                    >

                        <span>
                            ✎
                        </span>

                        <div>

                            <strong>
                                Edit Profile
                            </strong>

                            <small>
                                Update your professional profile
                            </small>

                        </div>

                    </a>

                </div>

            </section>

        </div>

    </main>

</div>


</body>

</html>