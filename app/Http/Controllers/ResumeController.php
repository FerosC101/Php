<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ResumeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the resume
     */
    public function index()
    {
        $resumeData = $this->getResumeData();
        return view('resume.index', compact('resumeData'));
    }

    /**
     * Download resume as PDF
     */
    public function download()
    {
        $resumeData = $this->getResumeData();
        return view('resume.pdf', compact('resumeData'));
    }

    /**
     * Get resume data
     */
    private function getResumeData()
    {
        return [
            'personal' => [
                'name' => 'Vince Anjo R. Villar',
                'location' => 'Catanauan, Quezon',
                'email' => 'vincevillar02@gmail.com',
                'github' => 'https://github.com/FerosC101',
                'linkedin' => 'https://www.linkedin.com/in/vinceanjovillar/',
                'summary' => 'An Undergrad Computer Science student with a strong background in Python and Data Visualization, eager to take challenges and apply creativity to user experiences. Demonstrated proficiency in project management and many collaborations across teams. Skilled in many tech tools and methodologies to make fast process and aims for user satisfaction.'
            ],
            'skills' => [
                'Programming Languages' => 'C#, C, C++, Godot, Ruby, Python, Javascript, Java, Php',
                'Data Analysis & Visualization' => 'Matplotlib, Pandas, Power BI, Tableau, Numpy',
                'Machine Learning & AI' => 'TensorFlow, Pytorch, LangChain',
                'Databases' => 'MySQL, PostgreSQL, MongoDB',
                'Project Management' => 'Jira, Scrum'
            ],
            'experience' => [
                [
                    'role' => 'DevFLex - Web Developer',
                    'date' => 'June 2025 - Aug 2025',
                    'details' => [
                        'Served as the backend developer for multiple client projects, focusing on building scalable and efficient server-side systems.',
                        'Worked with databases (PostgreSQL/MySQL) to ensure secure data storage, retrieval, and optimization.',
                        'Applied best practices in version control (Git), code reviews, and agile development workflows.'
                    ]
                ]
            ],
            'projects' => [
                [
                    'title' => 'CIVILIAN',
                    'date' => 'June 2025 – Aug 2025',
                    'details' => [
                        'Prototyped an AI-based crowd forecasting module using mobility datasets and Python ML frameworks for evacuation planning.',
                        'Developed a LoRa-based mesh network with ESP32 sensors to ensure offline-capable disaster alerts during floods, earthquakes, and fires.',
                        'Developed a data pipeline (Firebase Realtime DB + Cloud Functions) for structured logging, alert aggregation, and auto-purge of large datasets.',
                        'Engineered a scalable architecture with gateway buffering, data filtering, and BigQuery archival to prevent database overflow under heavy IoT traffic.'
                    ]
                ],
                [
                    'title' => 'LenLens - Intelligent Classifier with Geolocation Support',
                    'date' => 'April 2025 – May 2025',
                    'details' => [
                        'Machine Learning Model to classify waste into four categories.',
                        'Integrated geolocation services and designed an intuitive, responsive UI for desktop and mobile platforms.',
                        'Python with Flask, TensorFlow (MobileNetV2), and leaflet.js.'
                    ]
                ]
            ],
            'education' => [
                'institution' => 'Batangas State University',
                'degree' => 'Bachelor of Science in Computer Science',
                'period' => 'August 2023 - 2027'
            ],
            'achievements' => [
                'Languages' => 'English, Filipino',
                'Certifications' => 'Associate Data Analyst in SQL (Data Camp)',
                'Awards/Activities' => 'Dean\'s Lister (1st year - 2nd year), World Engineering Day STM32 Hackathon – Champion, Technofusion 2025 – BI Dashboard Challenge – Champion, Technofusion 2025 – Hackathon – 2nd runner up, PacketHacks Hackathon 2025 - Champion'
            ]
        ];
    }
}