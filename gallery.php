<?php
// This is gallery.php - Gallery page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'favicon2.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Lighthouse Ministers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }
        
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
        
        .hero-section {
            position: relative;
            color: var(--white);
            padding: 60px 20px;
            text-align: center;
            min-height: 40vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(rgba(0, 0, 0, 0.7), rgba(2, 3, 84, 0.9)),
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
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }
        
        .hero-content p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            line-height: 1.8;
            font-weight: 300;
        }
        
        .gallery-section {
            padding: 40px 20px;
            background-color: var(--white);
        }
        
        .gallery-container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
            color: var(--primary-blue);
            position: relative;
            display: inline-block;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary-blue);
        }
        
        /* MASONRY STYLE GALLERY - Natural Heights */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-auto-rows: 10px; /* Controls row height */
            grid-gap: 20px;
        }
        
        .gallery-item {
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background: var(--light-gray);
            position: relative;
        }
        
        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
        
        /* Photo Container - Natural Height */
        .photo-container {
            width: 100%;
            position: relative;
        }
        
        .photo-img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover .photo-img {
            transform: scale(1.03);
        }
        
        /* Loading State */
        .loading {
            text-align: center;
            padding: 60px 20px;
            grid-column: 1/-1;
        }
        
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--light-blue);
            border-top-color: var(--primary-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .loading p {
            color: var(--medium-gray);
            font-size: 1rem;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            grid-column: 1/-1;
            color: var(--medium-gray);
        }
        
        .empty-state i {
            font-size: 3.5rem;
            margin-bottom: 15px;
            opacity: 0.3;
        }
        
        .empty-state h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--dark-gray);
        }
        
        .empty-state p {
            font-size: 1rem;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                grid-gap: 15px;
            }
        }
        
        @media (max-width: 992px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                grid-gap: 15px;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }
            
            .nav-links {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                background-color: var(--white);
                flex-direction: column;
                padding: 20px;
                text-align: center;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                grid-gap: 12px;
            }
        }
        
        @media (max-width: 576px) {
            .hero-content h1 {
                font-size: 1.8rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
                grid-gap: 10px;
            }
            
            .gallery-item {
                border-radius: 8px;
            }
        }
        
        @media (max-width: 480px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                grid-gap: 8px;
            }
        }
        
        @media (max-width: 400px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 8px;
            }
        }

        /* COMPLETELY REDESIGNED FOOTER SECTION - Matching index.php */
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
            <li><a href="events.php">Events & Projects</a></li>
            <li><a href="songs.php">Songs</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="gallery.php" class="active">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<section class="hero-section">
    <div class="hero-content">
        <h1>Photo Gallery</h1>
        <p>
            Browse through our collection of memorable moments, worship sessions, and community events.
            Each photo tells a story of faith, fellowship, and ministry.
        </p>
    </div>
</section>

<section class="gallery-section">
    <div class="gallery-container">
        <div class="section-title">
            <h2>Our Moments</h2>
        </div>
        
        <div class="gallery-grid" id="galleryGrid">
            <div class="loading">
                <div class="loading-spinner"></div>
                <p>Loading gallery...</p>
            </div>
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
    function toggleMenu() {
        const nav = document.getElementById('navLinks');
        nav.classList.toggle('active');
    }

    document.addEventListener("DOMContentLoaded", function () {
        const galleryGrid = document.getElementById("galleryGrid");
        
        galleryGrid.innerHTML = `
            <div class="loading">
                <div class="loading-spinner"></div>
                <p>Loading gallery photos...</p>
            </div>
        `;
        
        fetch("api/get-gallery.php")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                galleryGrid.innerHTML = "";
                
                if (data.error) {
                    galleryGrid.innerHTML = `
                        <div class="empty-state">
                            <i class="fa fa-exclamation-circle"></i>
                            <h3>Error Loading Gallery</h3>
                            <p>${data.error}</p>
                        </div>
                    `;
                    return;
                }
                
                if (data.length === 0) {
                    galleryGrid.innerHTML = `
                        <div class="empty-state">
                            <i class="fa fa-images"></i>
                            <h3>No Photos Yet</h3>
                            <p>Check back soon for gallery updates!</p>
                        </div>
                    `;
                    return;
                }
                
                // Create photo grid items
                data.forEach((photo, index) => {
                    const item = document.createElement("div");
                    item.className = "gallery-item";
                    
                    const imageUrl = photo.image || 'assets/uploads/gallery/';
                    
                    item.innerHTML = `
                        <div class="photo-container">
                            <img src="${imageUrl}" 
                                 alt="Gallery Photo"
                                 class="photo-img"
                                 loading="lazy"
                                 onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2Y1ZjVmNSIvPjx0ZXh0IHg9IjE1MCIgeT0iMTAwIiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMTQiIGZpbGw9IiM2NjYiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5HYWxsZXJ5IFBob3RvPC90ZXh0Pjwvc3ZnPic">
                        </div>
                    `;
                    galleryGrid.appendChild(item);
                    
                    // Set grid row span based on image aspect ratio
                    const img = item.querySelector('img');
                    img.onload = function() {
                        // Calculate aspect ratio and set appropriate grid row span
                        const aspectRatio = img.naturalHeight / img.naturalWidth;
                        let rowSpan = Math.ceil(aspectRatio * 10); // Adjust this multiplier as needed
                        
                        // Ensure minimum and maximum row spans
                        rowSpan = Math.max(8, Math.min(rowSpan, 30));
                        item.style.gridRowEnd = `span ${rowSpan}`;
                    };
                });
                
                console.log(`Successfully loaded ${data.length} photos`);
            })
            .catch(err => {
                console.error("Error loading gallery:", err);
                galleryGrid.innerHTML = `
                    <div class="empty-state">
                        <i class="fa fa-exclamation-triangle"></i>
                        <h3>Connection Error</h3>
                        <p>Unable to load gallery. Please check your connection and try again.</p>
                    </div>
                `;
            });
        
        document.querySelector('.back-to-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
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
    });
</script>
</body>
</html>