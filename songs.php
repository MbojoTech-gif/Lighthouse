<?php
// songs.php - Music streaming and videos page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'favicon2.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs - Lighthouse Ministers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #ffffff;
        }
        
        /* White and Dark Blue Theme */
        :root {
            --primary-blue: #003366;
            --secondary-blue: #004080;
            --accent-blue: #0059b3;
            --light-blue: #e6f0ff;
            --white: #ffffff;
            --dark-gray: #333333;
            --light-gray: #f5f5f5;
            --medium-gray: #666666;
        }
        
        /* Header & Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo {
            height: 40px;
            width: auto;
        }
        
        .brand-name {
            color: var(--primary-blue);
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 20px;
        }
        
        .nav-links a {
            color: var(--dark-gray);
            text-decoration: none;
            font-weight: 500;
            padding: 6px 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
            font-size: 0.9rem;
        }
        
        .nav-links a:hover {
            background-color: var(--light-blue);
        }
        
        .nav-links a.active {
            background-color: var(--light-blue);
            color: var(--primary-blue);
        }
        
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }
        
        .hamburger .bar {
            width: 25px;
            height: 3px;
            background-color: var(--dark-gray);
            margin: 3px 0;
            border-radius: 2px;
        }
        
        /* Page Header */
        .page-header {
            background: 
                linear-gradient(rgba(0, 0, 0, 0.64), rgba(2, 3, 84, 0.9)),
                url('assets/src/gr.jpeg') center/cover no-repeat;
            color: var(--white);
            padding: 60px 20px 40px;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .page-header p {
            font-size: 1rem;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        /* Streaming Platforms Section - Smaller Cards */
        .streaming-platforms-section {
            padding: 40px 20px;
            background-color: var(--light-blue);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-title h2 {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary-blue);
        }
        
        .section-title p {
            color: var(--medium-gray);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .streaming-platforms-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .platform-row {
            display: flex;
            align-items: center;
            background: var(--white);
            border-radius: 12px;
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.78);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 160px; /* Smaller height */
        }
        
        .platform-row:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.72);
        }
        
        .platform-image {
            flex: 0 0 230px; /* Smaller width */
            height: 160px; /* Match row height */
            overflow: hidden;
        }
        
        .platform-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .platform-row:hover .platform-image img {
            transform: scale(1.05);
        }
        
        .platform-content {
            flex: 1;
            padding: 20px; /* Reduced padding */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .platform-name {
            font-size: 1.4rem; /* Smaller font */
            color: var(--primary-blue);
            margin-bottom: 8px;
            font-weight: 700;
        }
        
        .platform-stats {
            display: flex;
            gap: 15px;
            margin-bottom: 10px;
        }
        
        .stat {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--medium-gray);
            font-size: 0.85rem; /* Smaller font */
        }
        
        .stat i {
            color: var(--primary-blue);
            font-size: 0.9rem;
        }
        
        .platform-desc {
            color: var(--medium-gray);
            margin-bottom: 15px;
            line-height: 1.5;
            font-size: 0.9rem; /* Smaller font */
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Limit to 2 lines */
            line-clamp: 2; /* Standard property for compatibility */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .platform-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 20px; /* Smaller padding */
            background-color: var(--primary-blue);
            color: var(--white);
            text-decoration: none;
            border-radius: 15px;
            font-weight: 600;
            transition: all 0.3s;
            width: fit-content;
            border: 1px solid var(--primary-blue);
            font-size: 0.9rem; /* Smaller font */
        }
        
        .platform-btn:hover {
            background-color: transparent;
            color: var(--primary-blue);
            transform: translateY(-2px);
        }
        
        /* Latest Songs Section - Smaller Cards */
        .latest-songs-section {
            padding: 50px 20px;
            background-color: var(--white);
        }
        
        .songs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Smaller cards */
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .song-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .song-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .song-thumbnail {
            position: relative;
            height: 160px; /* Smaller height */
            overflow: hidden;
        }
        
        .song-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .song-card:hover .song-thumbnail img {
            transform: scale(1.05);
        }
        
        .play-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 51, 102, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .song-card:hover .play-overlay {
            opacity: 1;
        }
        
        .play-button {
            width: 50px; /* Smaller button */
            height: 50px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--primary-blue);
            text-decoration: none;
            transition: transform 0.3s ease;
        }
        
        .play-button:hover {
            transform: scale(1.1);
        }
        
        .song-info {
            padding: 20px; /* Reduced padding */
        }
        
        .song-title {
            font-size: 1.2rem; /* Smaller font */
            color: var(--primary-blue);
            margin-bottom: 8px;
            font-weight: 600;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1; /* Limit to 1 line */
            line-clamp: 1; /* Standard property for compatibility */
            overflow: hidden;
        }
        
        .song-meta {
            display: flex;
            justify-content: space-between;
            color: var(--medium-gray);
            font-size: 0.85rem; /* Smaller font */
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .song-desc {
            color: var(--medium-gray);
            line-height: 1.5;
            margin-bottom: 15px;
            font-size: 0.9rem; /* Smaller font */
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Limit to 2 lines */
            line-clamp: 2; /* Standard property for compatibility */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .song-links {
            display: flex;
            gap: 8px;
        }
        
        .song-link {
            padding: 6px 15px; /* Smaller padding */
            background-color: var(--light-blue);
            color: var(--primary-blue);
            text-decoration: none;
            border-radius: 15px;
            font-size: 0.85rem; /* Smaller font */
            font-weight: 500;
            transition: all 0.3s;
            flex: 1;
            text-align: center;
        }
        
        .song-link:hover {
            background-color: var(--primary-blue);
            color: var(--white);
        }
        
        /* Stats Section */
        .stats-section {
            padding: 40px 20px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: var(--white);
            text-align: center;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); /* Smaller boxes */
            gap: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .stat-box {
            padding: 20px 15px; /* Reduced padding */
        }
        
        .stat-number {
            font-size: 2.2rem; /* Smaller font */
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--white);
        }
        
        .stat-label {
            font-size: 0.95rem; /* Smaller font */
            opacity: 0.9;
        }
        
        /* CTA Section */
        .cta-section {
            padding: 50px 20px;
            text-align: center;
            background-color: var(--light-blue);
        }
        
        .cta-content {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .cta-content h2 {
            font-size: 2rem; /* Smaller font */
            color: var(--primary-blue);
            margin-bottom: 15px;
        }
        
        .cta-content p {
            color: var(--medium-gray);
            margin-bottom: 25px;
            font-size: 1rem;
            line-height: 1.6;
        }
        
        .cta-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-primary, .btn-secondary {
            padding: 12px 30px; /* Smaller padding */
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem; /* Smaller font */
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-primary {
            background-color: var(--primary-blue);
            color: var(--white);
            border: 2px solid var(--primary-blue);
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: var(--primary-blue);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: transparent;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
        }
        
        .btn-secondary:hover {
            background-color: var(--primary-blue);
            color: var(--white);
            transform: translateY(-2px);
        }

        /* COMPLETELY REDESIGNED FOOTER SECTION - Matching members.php */
        .site-footer {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: var(--white);
            padding: 60px 20px 20px;
            position: relative;
            overflow: hidden;
            margin-top: 40px;
        }
        
        /* Remove the wave design */
        .footer-wave {
            display: none;
        }
        
        /* Footer top accent */
        .footer-top-accent {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-blue) 0%, var(--light-blue) 50%, var(--accent-blue) 100%);
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        /* Footer Logo Section */
        .footer-logo-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .footer-logo-container {
            display: flex;
            align-items: justify;
            gap: 1px;
            margin-bottom: 10px;
        }
        
        .footer-logo {
            height: 60px;
            width: auto;
        }
        
        .footer-brand h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--white);
            margin: 0;
        }
        
        .footer-tagline {
            font-size: 0.9rem;
            color: var(--light-blue);
            font-style: italic;
            margin-top: 5px;
        }
        
        .footer-about {
            font-size: 0.95rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 20px;
        }
        
        /* Contact Info */
        .footer-contact-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .contact-item-footer {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .contact-item-footer i {
            color: var(--light-blue);
            font-size: 1.1rem;
            margin-top: 2px;
            min-width: 20px;
        }
        
        .contact-item-footer a {
            color: var(--light-blue);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .contact-item-footer a:hover {
            color: var(--white);
            text-decoration: underline;
        }
        
        /* Quick Links Section */
        .footer-links-section h4,
        .footer-social-section h4 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--white);
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-links-section h4::after,
        .footer-social-section h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background-color: var(--light-blue);
        }
        
        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .footer-links li {
            margin: 0;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s;
            display: inline-block;
            padding: 5px 0;
            position: relative;
            padding-left: 20px;
        }
        
        .footer-links a::before {
            content: '›';
            position: absolute;
            left: 0;
            color: var(--light-blue);
            font-size: 1.2rem;
            transition: transform 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--white);
            transform: translateX(5px);
        }
        
        .footer-links a:hover::before {
            transform: translateX(3px);
        }
        
        /* Social Media Section */
        .footer-social-section {
            display: flex;
            flex-direction: column;
        }
        
        .social-icons-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .social-icon-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: var(--white);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px 10px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        
        .social-icon-link:hover {
            background: var(--white);
            color: var(--primary-blue);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .social-icon-link i {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }
        
        .social-icon-link span {
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        /* Newsletter */
        .footer-newsletter {
            margin-top: 20px;
        }
        
        .newsletter-text {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 15px;
        }
        
        .newsletter-form {
            display: flex;
            gap: 10px;
        }
        
        .newsletter-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            font-size: 0.9rem;
        }
        
        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .newsletter-input:focus {
            outline: none;
            border-color: var(--light-blue);
        }
        
        .newsletter-btn {
            padding: 10px 20px;
            background: var(--light-blue);
            color: var(--primary-blue);
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        
        .newsletter-btn:hover {
            background: var(--white);
            transform: translateY(-2px);
        }
        
        /* Footer Bottom */
        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .footer-bottom p {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .footer-credits {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .techmbojo {
            color: var(--light-blue);
            font-weight: 600;
            text-decoration: none;
        }
        
        .techmbojo:hover {
            color: var(--white);
            text-decoration: underline;
        }
        
        .footer-legal {
            display: flex;
            gap: 25px;
        }
        
        .footer-legal a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s;
        }
        
        .footer-legal a:hover {
            color: var(--white);
        }
        
        .back-to-top {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--light-blue);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 8px 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            transition: all 0.3s;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .back-to-top:hover {
            background: var(--white);
            color: var(--primary-blue);
            border-color: var(--white);
            transform: translateY(-2px);
        }
        
        /* Responsive Design for Main Content */
        @media (max-width: 992px) {
            .platform-row {
                flex-direction: column;
                height: auto; /* Auto height on mobile */
            }
            
            .platform-image {
                flex: none;
                width: 100%;
                height: 140px;
            }
            
            .songs-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            /* Footer Responsive */
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }
            
            .footer-logo-section {
                grid-column: span 2;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                padding: 12px 15px;
            }
            
            .nav-links {
                display: none;
                position: absolute;
                top: 65px;
                left: 0;
                right: 0;
                background-color: var(--white);
                flex-direction: column;
                padding: 15px;
                text-align: center;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .hamburger {
                display: flex;
            }
            
            .page-header h1 {
                font-size: 1.8rem;
            }
            
            .section-title h2 {
                font-size: 1.6rem;
            }
            
            .songs-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
            }
            
            .platform-image {
                height: 120px;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-primary, .btn-secondary {
                width: 100%;
                max-width: 250px;
                text-align: center;
            }
            
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }

            /* Footer Responsive */
            .footer-content {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            
            .footer-logo-section {
                grid-column: span 1;
                text-align: center;
            }
            
            .footer-logo-container {
                justify-content: center;
            }
            
            .footer-links-section h4,
            .footer-social-section h4 {
                text-align: center;
            }
            
            .footer-links-section h4::after,
            .footer-social-section h4::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .social-icons-grid {
                grid-template-columns: repeat(4, 1fr);
            }
            
            .footer-bottom {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }
            
            .footer-legal {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
        
        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 1.5rem;
            }
            
            .page-header p {
                font-size: 0.9rem;
            }
            
            .platform-name {
                font-size: 1.2rem;
            }
            
            .platform-stats {
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .platform-btn {
                width: 100%;
                justify-content: center;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .song-links {
                flex-direction: column;
            }
            
            .song-link {
                text-align: center;
            }

            /* Footer Responsive */
            .social-icons-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .newsletter-form {
                flex-direction: column;
            }
            
            .footer-legal {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo-container">
            <img src="assets/src/ll.png" alt="Lighthouse Logo" class="logo">
            <span class="brand-name">LIGHTHOUSE MINISTERS</span>
        </div>

        <div class="hamburger" onclick="toggleMenu()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="events.php">Events & Projects</a></li>
            <li><a href="songs.php" class="active">Songs</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <!-- Page Header -->
    <section class="page-header">
        <h1>Our Music Collection</h1>
        <p>Stream our inspirational worship songs, gospel music, and latest releases across all major platforms. Experience the power of worship through our music.</p>
    </section>

    <!-- Streaming Platforms Section -->
    <section class="streaming-platforms-section">
        <div class="section-title">
            <h2>Stream Our Music</h2>
            <p>Listen to our songs on your favorite streaming platforms</p>
        </div>
        
        <div class="streaming-platforms-container">
            <!-- Spotify -->
            <div class="platform-row">
                <div class="platform-image">
                    <img src="assets/src/i.jpg" alt="Spotify Streaming">
                </div>
                <div class="platform-content">
                    <h3 class="platform-name">Spotify</h3>
                    <div class="platform-stats">
                        <div class="stat"><i class="fa fa-music"></i> 15+ Songs</div>
                        <div class="stat"><i class="fa fa-headphones"></i> 20K+ Streams</div>
                        <div class="stat"><i class="fa fa-users"></i> 5K+ Followers</div>
                    </div>
                    <p class="platform-desc">Stream our latest songs and inspirational playlists on the world's most popular music platform.</p>
                    <a href="https://open.spotify.com/artist/44qEM1HcSZo2BhEbqVWaWf?si=KvqpoVoUR-KW-QQGioSj7w" class="platform-btn">
                        <i class="fa fa-spotify"></i> Listen Now
                    </a>
                </div>
            </div>
            
            <!-- Boomplay -->
            <div class="platform-row">
                <div class="platform-image">
                    <img src="assets/src/img1.jpg" alt="Boomplay Streaming">
                </div>
                <div class="platform-content">
                    <h3 class="platform-name">Boomplay</h3>
                    <div class="platform-stats">
                        <div class="stat"><i class="fa fa-music"></i> 15+ Songs</div>
                        <div class="stat"><i class="fa fa-headphones"></i> 20K+ Streams</div>
                        <div class="stat"><i class="fa fa-users"></i> 5K+ Followers</div>
                    </div>
                    <p class="platform-desc">Access our music on Africa's leading streaming service with millions of users across the continent.</p>
                    <a href="https://www.boomplay.com/artists/79047563?srModel=COPYLINK&srList=WEB&share_content=artist&share_channel=copylink&share_platform=web" class="platform-btn">
                        <i class="fa fa-music"></i> Listen Now
                    </a>
                </div>
            </div>
            
            <!-- Apple Music -->
            <div class="platform-row">
                <div class="platform-image">
                    <img src="assets/src/img2.jpg" alt="Apple Music Streaming">
                </div>
                <div class="platform-content">
                    <h3 class="platform-name">Apple Music</h3>
                    <div class="platform-stats">
                        <div class="stat"><i class="fa fa-music"></i> 15+ Songs</div>
                        <div class="stat"><i class="fa fa-headphones"></i> 20K+ Streams</div>
                        <div class="stat"><i class="fa fa-users"></i> 5K+ Followers</div>
                    </div>
                    <p class="platform-desc">Experience our high-quality audio recordings on Apple's premium music streaming service.</p>
                    <a href="https://music.apple.com/ke/artist/the-lighthouse-ministers-nairobi/1713437103" class="platform-btn">
                        <i class="fa fa-apple"></i> Listen Now
                    </a>
                </div>
            </div>
            
            <!-- YouTube Music -->
            <div class="platform-row">
                <div class="platform-image">
                    <img src="assets/src/i.jpg" alt="YouTube Music Streaming">
                </div>
                <div class="platform-content">
                    <h3 class="platform-name">YouTube Music</h3>
                    <div class="platform-stats">
                        <div class="stat"><i class="fa fa-music"></i> 30+ Songs</div>
                        <div class="stat"><i class="fa fa-play-circle"></i> 200K+ Views</div>
                        <div class="stat"><i class="fa fa-users"></i> 25K+ Subscribers</div>
                    </div>
                    <p class="platform-desc">Listen our music audios and live performances on our YouTube channel.</p>
                    <a href="https://youtube.com/channel/UC9z9qLUDZ_GmCmqvtEWv3RA?si=0NUUwileDRhtyYRe" class="platform-btn" target="_blank">
                        <i class="fa fa-youtube"></i> Watch Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Songs Section -->
    <section class="latest-songs-section">
        <div class="section-title">
            <h2>Latest Releases</h2>
            <p>Watch our newest worship songs and music videos directly on our website</p>
        </div>
        
        <div class="songs-grid">
            <!-- Song 1 -->
            <div class="song-card">
                <div class="song-thumbnail">
                    <img src="assets/src/img1.jpg" alt="Naichukia">
                    <div class="play-overlay">
                        <a href="https://youtu.be/coMGeXaha4Y?si=6iCMscIkRYCHyo7j" class="play-button" target="_blank">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
                <div class="song-info">
                    <h3 class="song-title">Naichukia</h3>
                    <div class="song-meta">
                        <span>Release: Dec 2025</span>
                        <span>Duration: 5:17</span>
                    </div>
                    <p class="song-desc">Hata hivyo atatawala juu ya kazi yangu yote.</p>
                    <div class="song-links">
                        <a href="https://youtu.be/coMGeXaha4Y?si=6iCMscIkRYCHyo7j" class="song-link" target="_blank">Watch Video</a>
                        <a href="https://open.spotify.com/artist/44qEM1HcSZo2BhEbqVWaWf?si=KvqpoVoUR-KW-QQGioSj7w" class="song-link">Stream Audio</a>
                    </div>
                </div>
            </div>
            
            <!-- Song 2 -->
            <div class="song-card">
                <div class="song-thumbnail">
                    <img src="assets/src/img2.jpg" alt="Fichio La Taka">
                    <div class="play-overlay">
                        <a href="https://youtu.be/DsS7cUcpDM4?si=CkZcBRu_6h5d9wjy" class="play-button" target="_blank">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
                <div class="song-info">
                    <h3 class="song-title">Fichio La Taka</h3>
                    <div class="song-meta">
                        <span>Release: Nov 2025</span>
                        <span>Duration: 6:44</span>
                    </div>
                    <p class="song-desc">Moyo fichio la taka ulo jaa mapungufu yenye udhi ya moyo.</p>
                    <div class="song-links">
                        <a href="https://youtu.be/DsS7cUcpDM4?si=CkZcBRu_6h5d9wjy" class="song-link" target="_blank">Watch Video</a>
                        <a href="https://www.boomplay.com/artists/79047563?srModel=COPYLINK&srList=WEB&share_content=artist&share_channel=copylink&share_platform=web" class="song-link">Stream Audio</a>
                    </div>
                </div>
            </div>
            
            <!-- Song 3 -->
            <div class="song-card">
                <div class="song-thumbnail">
                    <img src="assets/src/i.jpg" alt="Gaza">
                    <div class="play-overlay">
                        <a href="https://youtu.be/rNkTwl5sgPU?si=npATc4Pult6D_P3o" class="play-button" target="_blank">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
                <div class="song-info">
                    <h3 class="song-title">Gaza</h3>
                    <div class="song-meta">
                        <span>Release: Sep 2025</span>
                        <span>Duration: 6:27</span>
                    </div>
                    <p class="song-desc">Itakuwaje wewe pekee yako ukapate simama wote walokuzingira wapatapo anguka?</p>
                    <div class="song-links">
                        <a href="https://youtu.be/rNkTwl5sgPU?si=npATc4Pult6D_P3o" class="song-link" target="_blank">Watch Video</a>
                        <a href="https://music.apple.com/ke/artist/the-lighthouse-ministers-nairobi/1713437103" class="song-link">Stream Audio</a>
                    </div>
                </div>
            </div>
            
            <!-- Song 4 -->
            <div class="song-card">
                <div class="song-thumbnail">
                    <img src="assets/src/gr.jpeg" alt="Jasiri">
                    <div class="play-overlay">
                        <a href="https://youtu.be/Of_sZnWbkWI?si=9Cm_5mo4SuP7Atfy" class="play-button" target="_blank">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
                <div class="song-info">
                    <h3 class="song-title">Jasiri</h3>
                    <div class="song-meta">
                        <span>Release: Aug 2025</span>
                        <span>Duration: 5:56</span>
                    </div>
                    <p class="song-desc">Wakati mwingine akikimbia hamaki ya sauli alielekea mle mle nobu nyumba ya bwana.</p>
                    <div class="song-links">
                        <a href="https://youtu.be/Of_sZnWbkWI?si=9Cm_5mo4SuP7Atfy" class="song-link" target="_blank">Watch Video</a>
                        <a href="https://youtube.com/channel/UC9z9qLUDZ_GmCmqvtEWv3RA?si=0NUUwileDRhtyYRe" class="song-link">Stream Audio</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stat-box">
                <div class="stat-number">500K+</div>
                <div class="stat-label">Monthly Listeners</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">20+</div>
                <div class="stat-label">Songs Released</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">700k+</div>
                <div class="stat-label">Total Streams</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">10+</div>
                <div class="stat-label">Countries Reached</div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2>Stay Updated With New Releases</h2>
            <p>Subscribe to our newsletter and follow us on social media to be the first to know about new songs, worship nights, and exclusive content.</p>
            <div class="cta-buttons">
                <a href="contact.php" class="btn-primary">Join Our Mailing List</a>
                <a href="events.php" class="btn-secondary">View Upcoming Events</a>
            </div>
        </div>
    </section>
</main>

<!-- REDESIGNED PROFESSIONAL FOOTER - Matching members.php -->
<footer class="site-footer">
    <div class="footer-top-accent"></div>
    
    <div class="footer-content">
        <!-- Logo and About Section -->
        <div class="footer-logo-section">
            <div class="footer-logo-container">
                <img src="assets/src/ll.png" alt="Lighthouse Ministers Logo" class="footer-logo">
                <div class="footer-brand">
                    <h3>LIGHTHOUSE MINISTERS</h3>
                    <p class="footer-tagline">Guiding Souls Through Music & Faith</p>
                </div>
            </div>
            <p class="footer-about">
                Spreading the message of hope and faith through music and community service. 
                We are dedicated to uplifting souls through worship and evangelism as part of 
                the Seventh-day Adventist Church community in Nairobi, Kenya.
            </p>
            <div class="footer-contact-info">
                <div class="contact-item-footer">
                    <i class="fa fa-map-marker"></i>
                    <span>Jetview SDA Church, Utawala, Nairobi, Kenya</span>
                </div>
                <div class="contact-item-footer">
                    <i class="fa fa-phone"></i>
                    <a href="https://wa.me/254724436295" target="_blank" rel="noopener">+254 724 436 295</a>
                </div>
                <div class="contact-item-footer">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:lighthouseministers23@gmail.com">lighthouseministers23@gmail.com</a>
                </div>
            </div>
        </div>

        <!-- Quick Links Section -->
        <div class="footer-links-section">
            <h4>Quick Links</h4>
            <ul class="footer-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="events.php">Events & Projects</a></li>
                <li><a href="songs.php">Our Music</a></li>
                <li><a href="members.php">Ministry Team</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <!-- Social Media & Newsletter Section -->
        <div class="footer-social-section">
            <h4>Connect With Us</h4>
            <div class="social-icons-grid">
                <a href="https://www.youtube.com/@thelighthouseministersnairobi/videos" target="_blank" class="social-icon-link">
                    <i class="fa fa-youtube-play"></i>
                    <span>YouTube</span>
                </a>
                <a href="https://www.instagram.com/lighthouseministers_official?igsh=MWp2Mnl2YWd2M3RuMw==" target="_blank" class="social-icon-link">
                    <i class="fa fa-instagram"></i>
                    <span>Instagram</span>
                </a>
                <a href="https://wa.me/254724436295" target="_blank" class="social-icon-link">
                    <i class="fa fa-whatsapp"></i>
                    <span>WhatsApp</span>
                </a>
                <a href="https://facebook.com" target="_blank" class="social-icon-link">
                    <i class="fa fa-facebook"></i>
                    <span>Facebook</span>
                </a>
            </div>
            
            <div class="footer-newsletter">
                <p class="newsletter-text">Subscribe to our newsletter for updates</p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Your email address" required>
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 The Lighthouse Ministers - Nairobi. All rights reserved.</p>
        <div class="footer-credits">
            <span>Powered by</span>
            <a href="https://mbojodev.vercel.app" target="_blank" class="techmbojo">TechMbojo</a>
        </div>
        
        <a href="#" class="back-to-top">
            <i class="fa fa-arrow-up"></i>
            Back to Top
        </a>
    </div>
</footer>

<script>
    function toggleMenu() {
        const nav = document.getElementById('navLinks');
        nav.classList.toggle('active');
    }

    // Back to top button functionality
    document.querySelector('.back-to-top').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Add smooth scrolling to all links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const nav = document.getElementById('navLinks');
        const hamburger = document.querySelector('.hamburger');
        
        if (nav.classList.contains('active') && 
            !nav.contains(event.target) && 
            !hamburger.contains(event.target)) {
            nav.classList.remove('active');
        }
    });

    // Newsletter form submission
    document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.querySelector('.newsletter-input').value;
        if (email) {
            alert('Thank you for subscribing to our newsletter!');
            this.reset();
        }
    });
</script>
</body>
</html>