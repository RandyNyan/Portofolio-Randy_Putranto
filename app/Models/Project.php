<?php

namespace App\Models;

class Project
{
    public static function all()
    {
        return collect([
            [
                'id' => 1,
                'slug' => 'survey-jember',
                'title' => 'Survey-Jember Web Application',
                'category' => 'Web Development & Database',
                'role' => 'Full-Stack Developer',
                'tech_stack' => ['Laravel', 'PostgreSQL', 'Tailwind CSS', 'Git'],
                'summary' => 'Web-based data collection and survey platform designed for regional analysis in Jember with role-based access and data export.',
                'description' => 'A comprehensive data collection platform aimed at facilitating regional surveys in Jember. It features a dynamic form builder, role-based access control (Admin, Surveyor, Analyst), and robust data export capabilities (CSV, PDF). The system ensures data integrity and provides real-time dashboard analytics for regional planners.',
                'featured' => true,
                'image' => 'ph-monitor', 
                'demo_link' => '#',
                'github_link' => '#',
                'completed_at' => '2023-10'
            ],
            [
                'id' => 2,
                'slug' => 'apms-lab-rpl',
                'title' => 'Academic & Practicum Management System (APMS)',
                'category' => 'System Analysis & Design',
                'role' => 'System Analyst & Lead Designer',
                'tech_stack' => ['Enterprise Architect', 'UML', 'Oracle Data Modeler', 'Figma'],
                'summary' => 'Comprehensive Object-Oriented Analysis & Design (OOAD) specification for 80+ student practicum management.',
                'description' => 'Developed the complete system architecture and design specifications for the APMS used by Lab RPL FASILKOM UNEJ. The project involved creating detailed UML diagrams (Use Case, Activity, Sequence, Class), database relational schemas, and high-fidelity UI prototypes. This blueprint serves as the foundation for the development team to build a scalable practicum management platform.',
                'featured' => true,
                'image' => 'ph-projector-screen',
                'demo_link' => null,
                'github_link' => '#',
                'completed_at' => '2023-12'
            ],
            [
                'id' => 3,
                'slug' => 'regional-spatial-mapping',
                'title' => 'Regional Spatial Mapping & Resource Distribution',
                'category' => 'GIS & Spatial Analysis',
                'role' => 'GIS Specialist & Analyst',
                'tech_stack' => ['QGIS', 'ArcGIS', 'PostgreSQL', 'PostGIS'],
                'summary' => 'Spatial data modeling and geographic mapping project analyzing regional point-of-interests and environmental coverage in East Java.',
                'description' => 'Conducted comprehensive spatial analysis to map resource distribution across East Java. Utilizing PostGIS for spatial queries and QGIS for visualization, the project highlights critical gaps in environmental coverage and assists in strategic regional planning. Includes digitized maps and geospatial data processing workflows.',
                'featured' => true,
                'image' => 'ph-map-trifold',
                'demo_link' => '#',
                'github_link' => null,
                'completed_at' => '2024-02'
            ],
            [
                'id' => 4,
                'slug' => 'digital-archive-mapala',
                'title' => 'Digital Archive & PR Management - Mapala Balwana',
                'category' => 'Administration & Digital Media',
                'role' => 'Lead Administrator & Content Director',
                'tech_stack' => ['Trello', 'Canva', 'Figma', 'Spreadsheet Automation'],
                'summary' => 'End-to-end administration digitizing system, managing event proposals, licensing workflows, and media publications.',
                'description' => 'Transformed the traditional administrative workflows of Mapala Balwana into a structured digital system. Implemented automated tracking for event proposals using spreadsheets, managed project tasks via Trello, and standardized media publications and licensing documents to ensure efficient organizational operations.',
                'featured' => false,
                'image' => 'ph-files',
                'demo_link' => null,
                'github_link' => null,
                'completed_at' => '2024-05'
            ],
            [
                'id' => 5,
                'slug' => 'e-koperasi-pos',
                'title' => 'E-Koperasi & Point of Sales Interface Design',
                'category' => 'UI/UX & Creative',
                'role' => 'UI/UX Designer',
                'tech_stack' => ['Figma', 'Canva', 'yED Graph Editor'],
                'summary' => 'User flow optimization and high-fidelity prototype for student cooperative management and storefront cashier systems.',
                'description' => 'Designed the user interface and experience for a modernized cooperative management system. Mapped out complex user journeys with yED Graph Editor and created interactive, high-fidelity prototypes in Figma. The design prioritizes ease of use for cashiers and clear inventory management for administrators.',
                'featured' => false,
                'image' => 'ph-storefront',
                'demo_link' => '#',
                'github_link' => null,
                'completed_at' => '2024-08'
            ],
        ]);
    }

    public static function featured()
    {
        return self::all()->where('featured', true)->values();
    }

    public static function find($slug)
    {
        return self::all()->firstWhere('slug', $slug);
    }

    public static function categories()
    {
        return self::all()->pluck('category')->unique()->values();
    }
}
