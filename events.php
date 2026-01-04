<?php
// This is events.php - Events page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - LIGHTHOUSE MINISTERS</title>
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
        
        /* Footer */
        .site-footer {
            background: linear-gradient(135deg, var(--dark-gray) 40%, var(--secondary-blue) 100%);
            color: var(--white);
            padding: 40px 20px 20px;
            position: relative;
        }
        
        .footer-wave {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        
        .footer-wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 50px;
        }
        
        .footer-wave .shape-fill {
            fill: url(#footer-gradient);
        }
        
        .footer-content {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-top: 30px;
        }
        
        .footer-left h3 {
            font-size: 1.6rem;
            margin-bottom: 15px;
            color: var(--white);
            font-weight: 700;
        }
        
        .footer-left p {
            margin-bottom: 12px;
            font-size: 0.9rem;
            opacity: 0.9;
            line-height: 1.5;
        }
        
        .footer-left strong {
            color: var(--white);
            font-weight: 600;
        }
        
        .footer-left a {
            color: var(--light-blue);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-left a:hover {
            color: var(--white);
            text-decoration: underline;
        }
        
        .footer-center {
            text-align: center;
        }
        
        .footer-center h4 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--white);
            font-weight: 600;
        }
        
        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .footer-links li {
            margin: 0;
        }
        
        .footer-links a {
            color: var(--white);
            text-decoration: none;
            font-size: 0.95rem;
            opacity: 0.9;
            transition: all 0.3s;
            display: inline-block;
            padding: 3px 0;
        }
        
        .footer-links a:hover {
            opacity: 1;
            transform: translateX(3px);
            color: var(--light-blue);
        }
        
        .footer-right {
            text-align: right;
        }
        
        .footer-socials {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: flex-end;
        }
        
        .social-link {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--white);
            text-decoration: none;
            font-size: 0.95rem;
            opacity: 0.9;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            opacity: 1;
            transform: translateX(-3px);
            color: var(--light-blue);
        }
        
        .social-icon {
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            transition: all 0.3s;
        }
        
        .social-link:hover .social-icon {
            background: var(--white);
            color: var(--primary-blue);
        }
        
        .footer-bottom {
            max-width: 1100px;
            margin: 35px auto 0;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .footer-bottom p {
            font-size: 0.85rem;
            opacity: 0.9;
        }
        
        .back-to-top {
            color: var(--white);
            text-decoration: none;
            font-size: 0.85rem;
            opacity: 0.9;
            transition: opacity 0.3s;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .back-to-top:hover {
            opacity: 1;
        }
        
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
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 35px;
            }
            
            .footer-right {
                text-align: center;
            }
            
            .footer-socials {
                align-items: center;
            }
            
            .social-link {
                justify-content: center;
            }
            
            .footer-bottom {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            /* Removed responsive status legend styles */
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

<footer class="site-footer">
    <div class="footer-wave">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <defs>
                <linearGradient id="footer-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#003366;stop-opacity:1" />
                    <stop offset="50%" style="stop-color:#004080;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#333333;stop-opacity:1" />
                </linearGradient>
            </defs>
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
    
    <div class="footer-content">
        <div class="footer-left">
            <h3>The Lighthouse Ministers</h3>
            <p>Spreading the message of hope and faith through music and community service.</p>
            <p><strong>Location:</strong> Jetview SDA Church, Utawala, Nairobi, Kenya</p>
            <p><strong>WhatsApp Contact:</strong> <a href="https://wa.me/254724436295" target="_blank" rel="noopener">+254 724 436 295</a></p>
            <p><strong>Email:</strong> <a href="mailto:lighthouseministers23@gmail.com">lighthouseministers23@gmail.com</a></p>
        </div>

        <div class="footer-center">
            <h4>Quick Links</h4>
            <ul class="footer-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="members.php">Members</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="footer-right">
            <div class="footer-socials">
                <a href="https://www.youtube.com/@thelighthouseministersnairobi/videos" target="_blank" class="social-link">
                    <span>YouTube</span>
                    <div class="social-icon">
                        <i class="fa fa-youtube-play"></i>
                    </div>
                </a>
                <a href="https://instagram.com/yourpage" target="_blank" class="social-link">
                    <span>Instagram</span>
                    <div class="social-icon">
                        <i class="fa fa-instagram"></i>
                    </div>
                </a>
                <a href="https://wa.me/254724436295" target="_blank" class="social-link">
                    <span>WhatsApp</span>
                    <div class="social-icon">
                        <i class="fa fa-whatsapp"></i>
                    </div>
                </a>
                <a href="https://facebook.com" target="_blank" class="social-link">
                    <span>Facebook</span>
                    <div class="social-icon">
                        <i class="fa fa-facebook"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 The Lighthouse Ministers - NRB. All rights reserved.</p>
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
</script>
</body>
</html>