<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login | Portfolio</title>

    <meta
        name="description"
        content="Secure administrator login for Portfolio Management System"
    >

    @vite(['resources/css/app.css'])

</head>

<body class="admin-login-page">

    <div class="login-wrapper">

        <!-- LEFT BRAND PANEL -->
        <div class="login-brand">

            <div class="brand-content">

                <div class="brand-logo">
                    <span class="logo-icon">
                        P
                    </span>
                </div>

                <h1>
                    Portfolio
                </h1>

                <p class="brand-subtitle">
                    Administration Portal
                </p>

                <div class="brand-divider"></div>

                <p class="brand-description">
                    Manage your portfolio, projects, skills,
                    experience, services and messages from one
                    secure administration platform.
                </p>

                <div class="brand-features">

                    <div class="brand-feature">
                        <span>✓</span>
                        <p>Manage portfolio content</p>
                    </div>

                    <div class="brand-feature">
                        <span>✓</span>
                        <p>Manage projects and skills</p>
                    </div>

                    <div class="brand-feature">
                        <span>✓</span>
                        <p>Monitor contact messages</p>
                    </div>

                </div>

            </div>

            <div class="brand-footer">
                <span>© {{ date('Y') }} Portfolio</span>
                <span>•</span>
                <span>Secure Administration</span>
            </div>

        </div>


        <!-- LOGIN PANEL -->
        <div class="login-panel">

            <div class="login-container">

                <!-- MOBILE LOGO -->
                <div class="mobile-brand">

                    <div class="mobile-logo">
                        P
                    </div>

                    <div>
                        <strong>Portfolio</strong>
                        <span>Administration</span>
                    </div>

                </div>


                <!-- HEADER -->
                <div class="login-header">

                    <div class="login-icon">
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <rect
                                x="3"
                                y="11"
                                width="18"
                                height="10"
                                rx="2"
                            />

                            <path
                                d="M7 11V7a5 5 0 0 1 10 0v4"
                            />
                        </svg>
                    </div>

                    <h2>
                        Welcome Back
                    </h2>

                    <p>
                        Sign in to access your administration dashboard.
                    </p>

                </div>


                <!-- SUCCESS MESSAGE -->
                @if(session('success'))

                    <div class="login-alert success">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="M20 6L9 17l-5-5"/>
                        </svg>

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                @endif


                <!-- ERROR MESSAGE -->
                @if($errors->any())

                    <div class="login-alert error">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                            />

                            <path d="M12 8v5"/>
                            <path d="M12 16h.01"/>
                        </svg>

                        <span>
                            {{ $errors->first() }}
                        </span>

                    </div>

                @endif


                <!-- LOGIN FORM -->
                <form
                    method="POST"
                    action="{{ route('admin.login.store') }}"
                    class="admin-login-form"
                >

                    @csrf


                    <!-- EMAIL -->
                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <div class="input-wrapper">

                            <svg
                                class="input-icon"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <rect
                                    x="3"
                                    y="5"
                                    width="18"
                                    height="14"
                                    rx="2"
                                />

                                <path d="m3 7 9 6 9-6"/>
                            </svg>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter your email address"
                                autocomplete="email"
                                required
                                autofocus
                            >

                        </div>

                        @error('email')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <!-- PASSWORD -->
                    <div class="form-group">

                        <div class="password-label-row">

                            <label for="password">
                                Password
                            </label>

                        </div>

                        <div class="input-wrapper">

                            <svg
                                class="input-icon"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <rect
                                    x="3"
                                    y="11"
                                    width="18"
                                    height="10"
                                    rx="2"
                                />

                                <path
                                    d="M7 11V7a5 5 0 0 1 10 0v4"
                                />
                            </svg>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword()"
                                aria-label="Show password"
                            >

                                <svg
                                    id="eye-open"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"
                                    />

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="3"
                                    />
                                </svg>

                                <svg
                                    id="eye-closed"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    style="display:none;"
                                >
                                    <path
                                        d="M3 3l18 18"
                                    />

                                    <path
                                        d="M10.6 10.6a2 2 0 0 0 2.8 2.8"
                                    />

                                    <path
                                        d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.5 0 10 7 10 7a17.7 17.7 0 0 1-3.2 3.8"
                                    />

                                    <path
                                        d="M6.1 6.1C3.5 8.1 2 12 2 12s3.5 7 10 7a10.8 10.8 0 0 0 4-.8"
                                    />
                                </svg>

                            </button>

                        </div>

                        @error('password')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <!-- OPTIONS -->
                    <div class="login-options">

                        <label class="remember-me">

                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                            >

                            <span class="custom-checkbox"></span>

                            <span>
                                Remember me
                            </span>

                        </label>

                    </div>


                    <!-- SUBMIT -->
                    <button
                        type="submit"
                        class="login-button"
                    >

                        <span>
                            Sign In
                        </span>

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="M5 12h14"/>
                            <path d="m13 6 6 6-6 6"/>
                        </svg>

                    </button>

                </form>


                <!-- SECURITY NOTICE -->
                <div class="security-notice">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path
                            d="M12 3 4 6v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V6l-8-3Z"
                        />

                        <path d="m9 12 2 2 4-4"/>
                    </svg>

                    <div>

                        <strong>
                            Secure Access
                        </strong>

                        <span>
                            Your connection and credentials are protected.
                        </span>

                    </div>

                </div>


                <!-- BACK TO WEBSITE -->
                <a
                    href="{{ route('home') }}"
                    class="back-to-site"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M19 12H5"/>
                        <path d="m12 19-7-7 7-7"/>
                    </svg>

                    Back to Portfolio

                </a>

            </div>

        </div>

    </div>


    <script>

        function togglePassword() {

            const password = document.getElementById('password');

            const openEye = document.getElementById('eye-open');

            const closedEye = document.getElementById('eye-closed');

            if (password.type === 'password') {

                password.type = 'text';

                openEye.style.display = 'none';

                closedEye.style.display = 'block';

            } else {

                password.type = 'password';

                openEye.style.display = 'block';

                closedEye.style.display = 'none';

            }

        }

    </script>

</body>

</html>