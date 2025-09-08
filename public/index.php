<?php
// CV.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vince Anjo R. Villar - CV</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 40px;
        background: #fff;
        color: #000;
        line-height: 1.6;
    }
    .container {
        max-width: 800px;
        margin: auto;
    }
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    h1 {
        font-size: 28px;
        margin-bottom: 5px;
        align-items: center;
    }
    .contact {
        font-size: 14px;
        margin-bottom: 20px;
    }
    h2 {
        font-size: 20px;
        border-bottom: 2px solid #000;
        padding-bottom: 4px;
        margin-top: 25px;
    }
    ul {
        margin: 10px 0 10px 20px;
    }
    li {
        margin-bottom: 6px;
    }
    .section {
        margin-bottom: 15px;
    }
    .project-title {
        font-weight: bold;
    }
    .edu, .exp-date {
        font-style: italic;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .download-btn {
        display: inline-block;
        padding: 10px 15px;
        background: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }
    .download-btn:hover {
        background: #0056b3;
    }
  </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Vince Anjo R. Villar</h1>
            <div class "contact">
                Catanauan, Quezon | 
                <a href="mailto:vincevillar02@gmail.com">vincevillar02@gmail.com</a> |
                <a href"https://github.com/FerosC101">Github</a> |
                <a href="https://www.linkedin.com/in/vinceanjovillar/">LinkedIn</a>
            </div>
        </div>

        <div class="section">
            <h2>SUMMARY</h2>
            <p>An Undergrad Computer Science student with a strong background in Python and Data Visualization, eager to take
            challenges and apply creativity to user experiences. Demonstrated proficiency in project management and many
            collaborations across teams. Skilled in many tech tools and methodologies to make fast process and aims for user
            satisfaction.</p>
        </div>

        <div class="section">
            <h2>TECHNICAL SKILLS</h2>
            <ul>
                <li><strong>Programming Languages:</strong> C#, C, C++, Godot, Ruby, Python, Javascript, Java, Php</li>
                <li><strong>Data Analysis & Visualization:</strong> Matplotlib, Pandas, Power BI, Tableau, Numpy</li>
                <li><strong>Machine Learning & AI:</strong> TensorFlow, Pytorch, LangChain</li>
                <li><strong>Databases:</strong> MySQL, PostgreSQL, MongoDB</li>
                <li><strong>Project Management:</strong> Jira, Scrum</li>
            </ul>
        </div>"

        <div class="section">
            <h2>EXPERIENCE</h2>
            <p><strong>DevFLex - Web Developer</strong> <span class=""exp-date">June 2025 - Aug 2025</span></p>
            <ul>
                <li>Served as the backend developer for multiple client projects, focusing on building scalable and efficient server-side systems.</li>
                <li>Worked with databases (PostgreSQL/MySQL) to ensure secure data storage, retrieval, and optimization.</li>
                <li>Applied best practices in version control (Git), code reviews, and agile development workflows.</li>
            </ul>
        </div>

        <div class="section">
            <h2>PROJECTS</h2>
            <p class="project-title">CIVILIAN <span class="exp-date">June 2025 – Aug 2025</span></p>
            <ul>
                <li>Prototyped an AI-based crowd forecasting module using mobility datasets and Python ML frameworks for evacuation planning.</li>
                <li>Developed a LoRa-based mesh network with ESP32 sensors to ensure offline-capable disaster alerts during floods, earthquakes, and fires.</li>
                <li>Developed a data pipeline (Firebase Realtime DB + Cloud Functions) for structured logging, alert aggregation, and auto-purge of large datasets.</li>
                <li>Engineered a scalable architecture with gateway buffering, data filtering, and BigQuery archival to prevent database overflow under heavy IoT traffic.</li>
            </ul>

            <p class="project-title">LenLens - Intelligent Classifier with Geolocation Support <span class="exp-date">April 2025 – May 2025</span></p>
            <ul>
                <li>Machine Learning Model to classify waste into four categories.</li>
                <li>Integrated geolocation services and designed an intuitive, responsive UI for desktop and mobile platforms.</li>
                <li>Python with Flask, TensorFlow (MobileNetV2), and leaflet.js.</li>
            </ul>
        </div>

        <div class="section">
            <h2>EDUCATION</h2>
                <p><strong>Batangas State University</strong> <span class="edu">August 2023 - 2027</span></p>
                <p>Bachelor of Science in Computer Science</p>
        </div>

        <div class="section">
            <h2>ACHIEVEMENTS</h2>
            <ul>
                <li><strong>Languages:</strong> English, Filipino</li>
                <li><strong>Certifications:</strong> Associate Data Analyst in SQL (Data Camp)</li>
                <li><strong>Awards/Activities:</strong> Dean’s Lister (1st year - 2nd year), World Engineering Day STM32 Hackathon – Champion, Technofusion 2025 – BI Dashboard Challenge – Champion, Technofusion 2025 – Hackathon – 2nd runner up, PacketHacks Hackathon 2025 - Champion</li>
            </ul>
        </div>
        <div class="header">
            <a href="download.php" class="download-btn">Download CV as PDF</a>
        </div>
        
    </div>
</body>
</html>