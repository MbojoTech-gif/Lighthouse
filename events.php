<?php
// This is events.php - Events page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'favicon2.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Lighthouse Ministers</title>
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
            font-weight: 600;
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
        
        /* Hero Section */
        .events-hero {
            position: relative;
            color: var(--white);
            padding: 80px 20px 60px;
            text-align: center;
            min-height: 40vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .events-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(rgba(0, 0, 0, 0.64), rgba(2, 3, 84, 0.9)),
                url('assets/src/gr.jpeg') center/cover no-repeat;
            z-index: -1;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 1);
        }
        
        .hero-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            font-weight: 300;
        }
        
        /* Events Section */
        .events-section {
            padding: 60px 20px;
            background-color: var(--white);
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-header h2 {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }
        
        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background-color: var(--primary-blue);
        }
        
        .section-intro {
            font-size: 1rem;
            color: var(--medium-gray);
            max-width: 700px;
            margin: 20px auto 0;
            line-height: 1.5;
            text-align: center;
        }
        
        /* Events Table Container */
        .events-table-container {
            max-width: 1000px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }
        
        /* Table Styles */
        .events-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .events-table thead {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        }
        
        .events-table th {
            padding: 18px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--white);
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 3px solid var(--accent-blue);
        }
        
        .events-table th:first-child {
            width: 80px;
            text-align: center;
        }
        
        .events-table th:nth-child(2) {
            width: 60%; /* Increased width since we removed status column */
        }
        
        .events-table th:nth-child(3) {
            width: 35%; /* Increased width for date column */
        }
        
        /* Remove 4th column styling since we only have 3 columns now */
        
        .events-table tbody tr {
            border-bottom: 1px solid var(--light-gray);
            transition: background-color 0.3s;
        }
        
        .events-table tbody tr:hover {
            background-color: var(--light-blue);
        }
        
        .events-table tbody tr:last-child {
            border-bottom: none;
        }
        
        .events-table td {
            padding: 18px 20px;
            color: var(--dark-gray);
            font-size: 0.95rem;
            vertical-align: middle;
        }
        
        .events-table td:first-child {
            text-align: center;
            font-weight: 600;
            color: var(--primary-blue);
            font-size: 1.1rem;
        }
        
        .event-title {
            font-weight: 600;
            color: var(--dark-gray);
            font-size: 1rem;
        }
        
        .event-date {
            color: var(--medium-gray);
            font-weight: 500;
        }
        
        /* Removed Status Badge Styles */
        
        /* Loading and Error States */
        .loading-container, .error-container, .no-events {
            text-align: center;
            padding: 60px 20px;
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .loading-container p, .error-container p, .no-events p {
            color: var(--medium-gray);
            font-size: 1.1rem;
        }
        
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--light-blue);
            border-top: 4px solid var(--primary-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 25px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Removed Status Legend Styles */
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .events-section {
                padding: 50px 20px;
            }
            
            .events-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
            
            .events-table th,
            .events-table td {
                padding: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                padding: 12px 20px;
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
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .hamburger {
                display: flex;
            }
            
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .events-hero {
                padding: 60px 20px 40px;
                min-height: 35vh;
            }
            
            .section-header h2 {
                font-size: 1.8rem;
            }
            
            .events-table th,
            .events-table td {
                padding: 12px 15px;
                font-size: 0.9rem;
            }
            
            /* Removed responsive status badge styles */
        }
        
        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 1.7rem;
            }
            
            .section-header h2 {
                font-size: 1.6rem;
            }
            
            .events-table th,
            .events-table td {
                padding: 10px 12px;
                font-size: 0.85rem;
            }
            
            /* Removed responsive status badge styles */
        }

        /* COMPLETELY REDESIGNED FOOTER SECTION - Matching index.php */
        .site-footer {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: var(--white);
            padding: 60px 20px 20px;
            position: relative;
            overflow: hidden;
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
        
        /* Responsive Design for Footer */
        @media (max-width: 992px) {
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }
            
            .footer-logo-section {
                grid-column: span 2;
            }
        }
        
        @media (max-width: 768px) {
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
            <li><a href="events.php" class="active">Events & Projects</a></li>
            <li><a href="songs.php">Songs</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<!-- Hero Section -->
<section class="events-hero">
    <div class="hero-content">
        <h1>Events Calendar</h1>
        <p>View all our scheduled events with dates</p>
    </div>
</section>

<!-- Events Section -->
<section class="events-section">
    <div class="section-header">
        <h2>Events List</h2>
        <p class="section-intro">All events are listed below in chronological order</p>
    </div>
    
    <!-- Events Table Container -->
    <div id="events-container">
        <div class="loading-container">
            <div class="spinner"></div>
            <p>Loading events...</p>
        </div>
    </div>
</section>

<!-- REDESIGNED PROFESSIONAL FOOTER - Matching index.php -->
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
    // Navigation toggle
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

    // API Configuration
    const API_BASE_URL = 'api/get-events.php';

    // Function to format date nicely
    function formatDate(dateString) {
        if (!dateString || dateString === '0000-00-00' || dateString === '0000-00-00 00:00:00') {
            return 'Date TBA';
        }
        
        const date = new Date(dateString);
        if (isNaN(date.getTime())) return dateString;
        
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    // Create table row element
    function createTableRow(event, index) {
        const row = document.createElement('tr');
        
        // Get formatted date
        const eventDate = formatDate(event.event_date);
        
        row.innerHTML = `
            <td>${index}</td>
            <td>
                <div class="event-title">${event.title || 'Event'}</div>
            </td>
            <td class="event-date">${eventDate}</td>
        `;
        
        return row;
    }

    // Create events table
    function createEventsTable(events) {
        const container = document.createElement('div');
        container.className = 'events-table-container';
        
        const table = document.createElement('table');
        table.className = 'events-table';
        
        table.innerHTML = `
            <thead>
                <tr>
                    <th>No</th>
                    <th>Event</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="events-table-body">
            </tbody>
        `;
        
        const tbody = table.querySelector('#events-table-body');
        
        // Add rows for each event with numbering 1, 2, 3, 4, 5...
        events.forEach((event, index) => {
            tbody.appendChild(createTableRow(event, index + 1));
        });
        
        container.appendChild(table);
        return container;
    }

    // Fetch events from API
    async function fetchEvents() {
        try {
            const response = await fetch(API_BASE_URL);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            // Log the response for debugging
            console.log("API Response:", data);
            
            if (data.error) {
                throw new Error(data.error);
            }
            
            return Array.isArray(data) ? data : [];
            
        } catch (error) {
            console.error('Error fetching events:', error);
            throw error;
        }
    }

    // Load events
    async function loadEvents() {
        const eventsContainer = document.getElementById('events-container');
        
        try {
            const events = await fetchEvents();
            
            if (events.length > 0) {
                eventsContainer.innerHTML = '';
                
                // Sort events by date (chronological order)
                events.sort((a, b) => new Date(a.event_date) - new Date(b.event_date));
                
                // Create and append the table
                eventsContainer.appendChild(createEventsTable(events));
                
            } else {
                eventsContainer.innerHTML = `
                    <div class="no-events">
                        <i class="fa fa-calendar" style="font-size: 3rem; color: var(--primary-blue); margin-bottom: 20px;"></i>
                        <h3 style="color: var(--primary-blue); margin-bottom: 10px;">No Events Scheduled</h3>
                        <p>Check back soon for upcoming events!</p>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Error loading events:', error);
            
            eventsContainer.innerHTML = `
                <div class="error-container">
                    <i class="fa fa-exclamation-triangle" style="font-size: 3rem; color: #d9534f; margin-bottom: 20px;"></i>
                    <h3 style="color: #003366; margin-bottom: 10px;">Unable to Load Events</h3>
                    <p>There was an error loading the events. Please try again later.</p>
                    <button onclick="loadEvents()" style="margin-top: 20px; padding: 10px 20px; background: #003366; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        <i class="fa fa-refresh"></i> Retry
                    </button>
                </div>
            `;
        }
    }

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', loadEvents);

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