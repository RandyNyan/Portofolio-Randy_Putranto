<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = [
            'name' => 'Randy Putranto',
            'title' => 'Information Systems Student | Software Engineering Lab Assistant | Tech & Administration Specialist',
            'location' => 'Jember, East Java, Indonesia',
            'email' => 'randy.putra.ant@gmail.com',
            'contact' => '0818 1888 8562',
            'linkedin' => 'linkedin.com/in/randy-putranto',
            'linkedin_url' => 'https://www.linkedin.com/in/randy-putranto',
            'tagline' => 'Bridging System Analysis, Software Engineering, and Structured Administration.',
            'hero_subtitle' => 'Information Systems student at University of Jember with deep focus on System Analysis, Object-Oriented Design, and Software Development.',
            'stats' => [
                ['label' => 'Students Mentored', 'value' => '80+'],
                ['label' => 'Current GPA', 'value' => '3.78', 'sub' => '/ 4.00'],
                ['label' => 'Major Organizations', 'value' => '4+'],
                ['label' => 'Fungsionaris Scholarship', 'value' => '2025'],
            ]
        ];

        $education = [
            'degree' => 'Bachelor of Information Systems',
            'institution' => 'Universitas Jember',
            'period' => '2023 – Present / 2027',
            'gpa' => '3.78 / 4.00',
            'honors' => 'Awardee Beasiswa Fungsionaris Universitas Jember (2025)',
            'bio' => 'A dedicated Information Systems student combining analytical system design, database modeling, and strong organizational administration capabilities. Passionate about creating structured, efficient, and scalable software solutions while fostering team growth and collaborative environments.'
        ];

        $experience = [
            [
                'role' => 'Asisten Praktikum Analisa Perancangan Sistem & Object Oriented Design',
                'company' => 'Laboratorium RPL FASILKOM UNEJ',
                'period' => 'Sep 2023 – Present', 
                'description' => 'Mentored 80+ students, developed lab modules, and achieved an 87.01 class average score.'
            ],
        ];

        $organizations = [
            [
                'role' => 'Sekretaris Umum',
                'organization' => 'UKM-PA Mapala Balwana',
                'period' => '2024 – 2025'
            ],
            [
                'role' => 'Sekretaris Kegiatan',
                'organization' => 'Mapala Balwana',
                'period' => 'Dikjut, Donor Darah, Aplikasi'
            ],
            [
                'role' => 'Koordinator Divisi Mediatek',
                'organization' => 'Komunitas Koperasi Mahasiswa FASILKOM',
                'period' => '2023 – 2025'
            ]
        ];

        $skills = [
            'Software & Dev' => ['Laravel', 'Python', 'C#', 'HTML/CSS/JS', 'PostgreSQL', 'Oracle Data Modeler'],
            'System Design & Modeling' => ['Enterprise Architect', 'yED Graph Editor', 'QGIS', 'ArcGIS'],
            'Design & Media' => ['Figma', 'Canva', 'Capcut', 'Trello'],
            'Soft Skills' => ['System Analysis', 'Administration & Legal Documentation', 'Public Speaking', 'Team Leadership']
        ];

        $tech_badges = ['Laravel', 'PostgreSQL', 'Python', 'Figma', 'Enterprise Architect'];

        $featured_projects = \App\Models\Project::featured();

        return view('portfolio', compact('profile', 'education', 'experience', 'organizations', 'skills', 'tech_badges', 'featured_projects'));
    }
}
