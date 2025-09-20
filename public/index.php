<?php
require_once 'classes/Auth.php';

$auth = new Auth();
$auth->requireLogin(); // This will redirect to login.php if not authenticated

// Handle logout
if (isset($_GET['logout'])) {
    $auth->logout();
    header("Location: login.php");
    exit();
}

// Resume data (from your original file)
define("NAME", "Vince Anjo R. Villar");
define("LOCATION", "Catanauan, Quezon");
define("EMAIL", "vincevillar02@gmail.com");
define("GITHUB", "https://github.com/FerosC101");
define("LINKEDIN", "https://www.linkedin.com/in/vinceanjovillar/");
define("SUMMARY", "An Undergrad Computer Science student with a strong background in Python and Data Visualization, eager to take
challenges and apply creativity to user experiences. Demonstrated proficiency in project management and many
collaborations across teams. Skilled in many tech tools and methodologies to make fast process and aims for user
satisfaction.");

$skills = [
    "Programming Languages" => "C#, C, C++, Godot, Ruby, Python, Javascript, Java, Php",
    "Data Analysis & Visualization" => "Matplotlib, Pandas, Power BI, Tableau, Numpy",
    "Machine Learning & AI" => "TensorFlow, Pytorch, LangChain",
    "Databases" => "MySQL, PostgreSQL, MongoDB",
    "Project Management" => "Jira, Scrum"
];

$experience = [
    [
        "role" => "DevFLex - Web Developer",
        "date" => "June 2025 - Aug 2025",
        "details" => [
            "Served as the backend developer for multiple client projects, focusing on building scalable and efficient server-side systems.",
            "Worked with databases (PostgreSQL/MySQL) to ensure secure data storage, retrieval, and optimization.",
            "Applied best practices in version control (Git), code reviews, and agile development workflows."
        ]
    ]
];

$projects = [
    [
        "title" => "CIVILIAN",
        "date" => "June 2025 – Aug 2025",
        "details" => [
            "Prototyped an AI-based crowd forecasting module using mobility datasets and Python ML frameworks for evacuation planning.",
            "Developed a LoRa-based mesh network with ESP32 sensors to ensure offline-capable disaster alerts during floods, earthquakes, and fires.",
            "Developed a data pipeline (Firebase Realtime DB + Cloud Functions) for structured logging, alert aggregation, and auto-purge of large datasets.",
            "Engineered a scalable architecture with gateway buffering, data filtering, and BigQuery archival to prevent database overflow under heavy IoT traffic."
        ]
    ],
    [
        "title" => "LenLens - Intelligent Classifier with Geolocation Support",
        "date" => "April 2025 – May 2025",
        "details" => [
            "Machine Learning Model to classify waste into four categories.",
            "Integrated geolocation services and designed an intuitive, responsive UI for desktop and mobile platforms.",
            "Python with Flask, TensorFlow (MobileNetV2), and leaflet.js."
        ]
    ]
];

$achievements = [
    "Languages" => "English, Filipino",
    "Certifications" => "Associate Data Analyst in SQL (Data Camp)",
    "Awards/Activities" => "Dean's Lister (1st year - 2nd year), World Engineering Day STM32 Hackathon – Champion, Technofusion 2025 – BI Dashboard Challenge – Champion, Technofusion 2025 – Hackathon – 2nd runner up, PacketHacks Hackathon 2025 - Champion"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NAME; ?> - Resume</title>
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
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid rgba(255,255,255,0.3);
            object-fit: cover;
            margin-bottom: 20px;
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
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
            color: white;
            text-decoration: none;
        }
        .section-title {
            color: #667eea;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
            margin-bottom: 30px;
            font-weight: 600;
        }
        .skill-item {
            background: #f8f9fa;
            border-radius: 25px;
            padding: 8px 16px;
            margin: 5px;
            display: inline-block;
            font-size: 0.9em;
            border: 1px solid #e9ecef;
        }
        .contact-item {
            margin-bottom: 15px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .contact-item i {
            color: #667eea;
            width: 20px;
        }
        .experience-item, .education-item, .project-item {
            border-left: 3px solid #667eea;
            padding-left: 20px;
            margin-bottom: 30px;
            position: relative;
        }
        .experience-item::before, .education-item::before, .project-item::before {
            content: '';
            position: absolute;
            left: -7px;
            top: 5px;
            width: 12px;
            height: 12px;
            background: #667eea;
            border-radius: 50%;
        }
        .date-badge {
            background: #667eea;
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8em;
            display: inline-block;
            margin-bottom: 10px;
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
        .download-btn {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }
        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
            color: white;
            text-decoration: none;
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
    </style>
</head>
<body>
    <!-- Header Section -->
    <section class="header-section text-center">
        <a href="?logout=1" class="logout-btn">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
        </a>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="profile-img bg-light d-flex align-items-center justify-content-center mx-auto">
                        <i class="fas fa-user fa-4x text-secondary"></i>
                    </div>
                    <h1 class="display-4 mb-3"><?php echo NAME; ?></h1>
                    <p class="lead mb-4"><?php echo SUMMARY; ?></p>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <i class="fas fa-map-marker-alt fa-2x mb-2"></i>
                            <p><?php echo LOCATION; ?></p>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-envelope fa-2x mb-2"></i>
                            <p><a href="mailto:<?php echo EMAIL; ?>" class="text-white"><?php echo EMAIL; ?></a></p>
                        </div>
                        <div class="col-md-4">
                            <i class="fab fa-linkedin fa-2x mb-2"></i>
                            <p><a href="<?php echo LINKEDIN; ?>" target="_blank" class="text-white">LinkedIn</a></p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="<?php echo GITHUB; ?>" target="_blank" class="btn btn-outline-light me-3">
                            <i class="fab fa-github me-2"></i>GitHub Profile
                        </a>
                        <?php if (file_exists('download.php')): ?>
                        <a href="download.php" class="download-btn">
                            <i class="fas fa-download me-2"></i>Download PDF
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-4">
                <!-- Contact Information -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-address-book me-2"></i>Contact Details
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <strong>Location:</strong> <?php echo LOCATION; ?>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope me-2"></i>
                            <strong>Email:</strong> <a href="mailto:<?php echo EMAIL; ?>"><?php echo EMAIL; ?></a>
                        </div>
                        <div class="contact-item">
                            <i class="fab fa-linkedin me-2"></i>
                            <strong>LinkedIn:</strong> 
                            <a href="<?php echo LINKEDIN; ?>" target="_blank">Profile</a>
                        </div>
                        <div class="contact-item">
                            <i class="fab fa-github me-2"></i>
                            <strong>GitHub:</strong> 
                            <a href="<?php echo GITHUB; ?>" target="_blank">FerosC101</a>
                        </div>
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
                        <?php foreach ($skills as $category => $skillList): ?>
                        <div class="mb-4">
                            <h5 class="text-primary"><?php echo $category; ?></h5>
                            <div class="skills-container">
                                <?php 
                                $skillArray = explode(', ', $skillList);
                                foreach ($skillArray as $skill): 
                                ?>
                                    <span class="skill-item"><?php echo trim($skill); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
                        <?php foreach ($achievements as $category => $value): ?>
                        <div class="mb-3">
                            <h6 class="text-primary"><?php echo $category; ?></h6>
                            <?php if ($category == 'Awards/Activities'): ?>
                                <?php 
                                $awards = explode(', ', $value);
                                foreach ($awards as $award): 
                                ?>
                                    <span class="achievement-badge"><?php echo trim($award); ?></span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="mb-0"><?php echo $value; ?></p>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
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
                        <?php foreach ($experience as $exp): ?>
                        <div class="experience-item">
                            <div class="date-badge"><?php echo $exp['date']; ?></div>
                            <h5 class="text-primary mb-2"><?php echo $exp['role']; ?></h5>
                            <ul class="mb-0">
                                <?php foreach ($exp['details'] as $detail): ?>
                                <li><?php echo $detail; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endforeach; ?>
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
                        <?php foreach ($projects as $project): ?>
                        <div class="project-item">
                            <div class="date-badge"><?php echo $project['date']; ?></div>
                            <h5 class="text-primary mb-2"><?php echo $project['title']; ?></h5>
                            <ul class="mb-0">
                                <?php foreach ($project['details'] as $detail): ?>
                                <li><?php echo $detail; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endforeach; ?>
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
                            <div class="date-badge">August 2023 - 2027</div>
                            <h5 class="text-primary mb-2">Bachelor of Science in Computer Science</h5>
                            <p class="mb-0"><strong>Batangas State University</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 <?php echo NAME; ?>. All rights reserved.</p>
            <p class="small mt-2">
                <i class="fas fa-lock me-1"></i>
                Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?>
            </p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>