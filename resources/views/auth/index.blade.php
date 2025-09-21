<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $resumeData['personal']['name'] }} - Resume</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .header-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            position: relative;
        }
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
        }
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
            color: white;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid rgba(255,255,255,0.3);
            margin-bottom: 20px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            border-radius: 15px;
            margin-bottom: 30px;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            border: none;
        }
        .skill-item {
            background: #f8f9fa;
            border-radius: 25px;
            padding: 8px 16px;
            margin: 5px;
            display: inline-block;
            font-size: 0.9em;
        }
        .date-badge {
            background: #667eea;
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8em;
            margin-bottom: 10px;
        }
        .experience-item, .project-item, .education-item {
            border-left: 3px solid #667eea;
            padding-left: 20px;
            margin-bottom: 30px;
            position: relative;
        }
        .experience-item::before, .project-item::before, .education-item::before {
            content: '';
            position: absolute;
            left: -7px;
            top: 5px;
            width: 12px;
            height: 12px;
            background: #667eea;
            border-radius: 50%;
        }
        .achievement-badge {
            background: linear-gradient(135deg, #ffc107 0%, #ff8c00 100%);
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 0.85em;
            margin: 2px;
            display: inline-block;
        }
        .download-btn {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .download-btn:hover {
            transform: translateY(-2px);
            color: white;
        }
    </style>
</head>
<body>
    <section class="header-section text-center">
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </button>
        </form>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="profile-img bg-light d-flex align-items-center justify-content-center mx-auto">
                        <i class="fas fa-user fa-4x text-secondary"></i>
                    </div>
                    <h1 class="display-4 mb-3">{{ $resumeData['personal']['name'] }}</h1>
                    <p class="lead mb-4">{{ $resumeData['personal']['summary'] }}</p>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <i class="fas fa-map-marker-alt fa-2x mb-2"></i>
                            <p>{{ $resumeData['personal']['location'] }}</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-envelope fa-2x mb-2"></i>
                            <p><a href="mailto:{{ $resumeData['personal']['email'] }}" class="text-white">{{ $resumeData['personal']['email'] }}</a></p>
                        </div>
                        <div class="col-md-4">
                            <i class="fab fa-linkedin fa-2x mb-2"></i>
                            <p><a href="{{ $resumeData['personal']['linkedin'] }}" target="_blank" class="text-white">LinkedIn</a></p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ $resumeData['personal']['github'] }}" target="_blank" class="btn btn-outline-light me-3">
                            <i class="fab fa-github me-2"></i>GitHub Profile
                        </a>
                        <a href="{{ route('resume.download') }}" class="download-btn">
                            <i class="fas fa-download me-2"></i>Download PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-4">
                <!-- Contact -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-address-book me-2"></i>Contact Details
                        </h3>
                    </div>
                    <div class="card-body">
                        <p><i class="fas fa-map-marker-alt me-2"></i>{{ $resumeData['personal']['location'] }}</p>
                        <p><i class="fas fa-envelope me-2"></i><a href="mailto:{{ $resumeData['personal']['email'] }}">{{ $resumeData['personal']['email'] }}</a></p>
                        <p><i class="fab fa-linkedin me-2"></i><a href="{{ $resumeData['personal']['linkedin'] }}" target="_blank">LinkedIn Profile</a></p>
                        <p><i class="fab fa-github me-2"></i><a href="{{ $resumeData['personal']['github'] }}" target="_blank">GitHub Profile</a></p>
                    </div>
                </div>

                <!-- Skills -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-cogs me-2"></i>Technical Skills
                        </h3>
                    </div>
                    <div class="card-body">
                        @foreach ($resumeData['skills'] as $category => $skillList)
                        <div class="mb-4">
                            <h5 class="text-primary">{{ $category }}</h5>
                            <div class="skills-container">
                                @foreach (explode(', ', $skillList) as $skill)
                                    <span class="skill-item">{{ trim($skill) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Achievements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-trophy me-2"></i>Achievements
                        </h3>
                    </div>
                    <div class="card-body">
                        @foreach ($resumeData['achievements'] as $category => $value)
                        <div class="mb-3">
                            <h6 class="text-primary">{{ $category }}</h6>
                            @if ($category == 'Awards/Activities')
                                @foreach (explode(', ', $value) as $award)
                                    <span class="achievement-badge">{{ trim($award) }}</span>
                                @endforeach
                            @else
                                <p class="mb-0">{{ $value }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-8">
                <!-- Experience -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-briefcase me-2"></i>Experience
                        </h3>
                    </div>
                    <div class="card-body">
                        @foreach ($resumeData['experience'] as $exp)
                        <div class="experience-item">
                            <div class="date-badge">{{ $exp['date'] }}</div>
                            <h5 class="text-primary mb-2">{{ $exp['role'] }}</h5>
                            <ul class="mb-0">
                                @foreach ($exp['details'] as $detail)
                                <li>{{ $detail }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Projects -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-project-diagram me-2"></i>Projects
                        </h3>
                    </div>
                    <div class="card-body">
                        @foreach ($resumeData['projects'] as $project)
                        <div class="project-item">
                            <div class="date-badge">{{ $project['date'] }}</div>
                            <h5 class="text-primary mb-2">{{ $project['title'] }}</h5>
                            <ul class="mb-0">
                                @foreach ($project['details'] as $detail)
                                <li>{{ $detail }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Education -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-graduation-cap me-2"></i>Education
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="education-item">
                            <div class="date-badge">{{ $resumeData['education']['period'] }}</div>
                            <h5 class="text-primary mb-2">{{ $resumeData['education']['degree'] }}</h5>
                            <p class="mb-0"><strong>{{ $resumeData['education']['institution'] }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 {{ $resumeData['personal']['name'] }}. All rights reserved.</p>
            <p class="small mt-2">
                <i class="fas fa-lock me-1"></i>Logged in as: {{ Auth::user()->name }}
            </p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>