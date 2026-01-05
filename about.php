<?php
// This is about.php - About Us page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'favicon2.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Lighthouse Ministers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        /* Base Styles - Same as index.php */
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
        
        /* Header & Navigation - Same as index.php */
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
        
        /* About Hero Section - SMALLER */
        .about-hero {
            position: relative;
            color: var(--white);
            padding: 80px 20px 60px;
            text-align: center;
            min-height: 40vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .about-hero::before {
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
        
        /* Explore Section - SMALLER */
        .explore-section {
            padding: 60px 20px;
            background-color: var(--white);
        }
        
        .explore-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 50px;
        }
        
        .explore-image {
            flex: 1;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .explore-image img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }
        
        .explore-image:hover img {
            transform: scale(1.03);
        }
        
        .explore-text {
            flex: 1;
        }
        
        .explore-text h2 {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }
        
        .explore-text h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 2px;
            background-color: var(--primary-blue);
        }
        
        .explore-text p {
            margin-bottom: 15px;
            color: var(--medium-gray);
            font-size: 0.95rem;
            line-height: 1.6;
        }
        
        .meet-button {
            display: inline-block;
            padding: 10px 30px;
            background-color: var(--primary-blue);
            color: var(--white);
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 0.95rem;
            border: 2px solid var(--primary-blue);
            margin-top: 15px;
        }
        
        .meet-button:hover {
            background-color: transparent;
            color: var(--primary-blue);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Mission Section - SMALLER CARDS */
        .mission-section {
            padding: 50px 20px;
            background-color: var(--light-blue);
        }
        
        .mission-grid {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }
        
        .mission-box {
            background: var(--white);
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            text-align: center;
            transition: transform 0.3s ease;
            height: 220px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .mission-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }
        
        .mission-box h3 {
            font-size: 1.5rem;
            color: var(--primary-blue);
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .mission-box p {
            color: var(--medium-gray);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        /* LEADERS SECTION - UPDATED */
        .leaders-section {
            padding: 60px 20px;
            background-color: var(--white);
            text-align: center;
        }
        
        .leaders-section h2 {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .leaders-section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background-color: var(--primary-blue);
        }
        
        .leaders-intro {
            font-size: 1rem;
            color: var(--medium-gray);
            max-width: 700px;
            margin: 30px auto 40px;
            line-height: 1.5;
        }
        
        .leaders-grid {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
        }
        
        .leader-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .leader-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }
        
        .leader-photo-container {
            position: relative;
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
        }
        
        .leader-photo {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--light-blue);
        }
        
        .photo-grid-overlay {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 30px;
            height: 30px;
            background: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 0.8rem;
            border: 2px solid var(--white);
        }
        
        .leader-name {
            font-size: 1.2rem;
            color: var(--primary-blue);
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .leader-role {
            font-size: 0.95rem;
            color: var(--accent-blue);
            font-weight: 600;
        }
        
        /* JOURNEY SECTION - CARDS IN A ROW */
        .journey-section {
            padding: 50px 20px;
            background-color: var(--light-blue);
        }
        
        .journey-section h2 {
            font-size: 2rem;
            color: var(--primary-blue);
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .journey-section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background-color: var(--primary-blue);
        }
        
        .journey-cards {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        
        .journey-card {
            background: var(--white);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            text-align: center;
            transition: transform 0.3s ease;
            flex: 1;
            min-width: 200px;
            max-width: 250px;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .journey-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .journey-card h4 {
            font-size: 1.1rem;
            color: var(--primary-blue);
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .journey-card p {
            color: var(--medium-gray);
            font-size: 0.85rem;
            line-height: 1.4;
        }
        
        .journey-year {
            display: inline-block;
            background: var(--primary-blue);
            color: var(--white);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        /* Testimony Section - SMALLER */
        .testimony-highlight {
            padding: 50px 20px;
            background-color: var(--light-blue);
        }
        
        .testimony-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 50px;
        }
        
        .testimony-text {
            flex: 1;
        }
        
        .testimony-text h2 {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }
        
        .testimony-text h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 2px;
            background-color: var(--primary-blue);
        }
        
        .testimony-text p {
            margin-bottom: 15px;
            color: var(--medium-gray);
            font-size: 0.95rem;
            line-height: 1.6;
        }
        
        .testimony-text strong {
            color: var(--primary-blue);
            font-weight: 600;
        }
        
        .testimony-image {
            flex: 1;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .testimony-image img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            display: block;
        }

        /* RESPONSIVE DESIGN - ABOUT PAGE SPECIFIC */
        @media (max-width: 992px) {
            .explore-wrapper,
            .testimony-wrapper {
                flex-direction: column;
                gap: 35px;
            }
            
            .explore-image img,
            .testimony-image img {
                height: 300px;
            }
            
            .leaders-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .journey-cards {
                justify-content: center;
            }
            
            .journey-card {
                min-width: 180px;
                max-width: 220px;
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
            
            .about-hero {
                padding: 60px 20px 40px;
                min-height: 35vh;
            }
            
            .explore-section,
            .mission-section,
            .leaders-section,
            .journey-section,
            .testimony-highlight {
                padding: 40px 20px;
            }
            
            .explore-text h2,
            .testimony-text h2,
            .leaders-section h2,
            .journey-section h2 {
                font-size: 1.8rem;
            }
            
            .explore-image img,
            .testimony-image img {
                height: 250px;
            }
            
            .mission-grid {
                grid-template-columns: 1fr;
            }
            
            .mission-box {
                height: 200px;
                padding: 25px 20px;
            }
            
            .leaders-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
            }
            
            .journey-cards {
                flex-direction: column;
                align-items: center;
            }
            
            .journey-card {
                max-width: 300px;
                width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 1.7rem;
            }
            
            .explore-text h2,
            .testimony-text h2,
            .leaders-section h2,
            .journey-section h2 {
                font-size: 1.6rem;
            }
            
            .mission-box {
                height: 180px;
                padding: 20px 15px;
            }
            
            .mission-box h3 {
                font-size: 1.3rem;
            }
            
            .leader-card {
                padding: 20px 15px;
            }
            
            .leader-photo-container {
                width: 80px;
                height: 80px;
            }
            
            .journey-card {
                min-height: 160px;
                padding: 15px;
            }
            
            .journey-card h4 {
                font-size: 1rem;
            }
            
            .journey-card p {
                font-size: 0.8rem;
            }
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
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .contact-item i {
            color: var(--light-blue);
            font-size: 1.1rem;
            margin-top: 2px;
            min-width: 20px;
        }
        
        .contact-item a {
            color: var(--light-blue);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .contact-item a:hover {
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
            <li><a href="about.php" class="active">About Us</a></li>
            <li><a href="events.php">Events & Projects</a></li>
            <li><a href="songs.php">Songs</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<!-- Hero Section -->
<section class="about-hero">
    <div class="hero-content">
        <h1>About Lighthouse Ministers</h1>
        <p>Spreading the light of faith, music, and love.</p>
    </div>
</section>

<!-- Explore More Section -->
<section class="explore-section">
    <div class="explore-wrapper">
        <div class="explore-image">
            <img src="assets/src/w.jpg" alt="Group Singing" />
        </div>
        <div class="explore-text">
            <h2>Who We Are</h2>
            <p>
                Lighthouse Ministers is a gospel music ministry from Jetview SDA Church, Utawala Nairobi.
                We are dedicated to worship, evangelism, and transforming communities through music and service.
            </p>
            <p>
                Our foundation is built on unity, faith, and purpose. Through uplifting melodies and impactful outreach,
                we aim to bring souls closer to God.
            </p>
            <a href="members.php" class="meet-button">Meet the Team</a>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="mission-section">
    <div class="mission-grid">
        <div class="mission-box">
            <h3>Our Mission</h3>
            <p>To minister through music and inspire hearts toward hope, unity, and spiritual transformation.</p>
        </div>
        <div class="mission-box">
            <h3>Our Vision</h3>
            <p>To be a beacon of light in communities through gospel music and service, guiding souls to Christ.</p>
        </div>
    </div>
</section>

<!-- Leaders Section -->
<section class="leaders-section">
    <h2>Our Leaders</h2>
    <p class="leaders-intro">Meet the dedicated individuals who guide and inspire our ministry through their leadership and service.</p>

    <div class="leaders-grid">
        <!-- Leader 1 -->
        <div class="leader-card">
            <div class="leader-photo-container">
                <img src="assets/src/ken.jpg" alt="Kennedy Otieno" class="leader-photo">
                <div class="photo-grid-overlay">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <h3 class="leader-name">Kennedy Otieno</h3>
            <p class="leader-role">Chairperson</p>
        </div>

        <!-- Leader 2 -->
        <div class="leader-card">
            <div class="leader-photo-container">
                <img src="assets/src/koks.jpg" alt="Calvince Kokebe" class="leader-photo">
                <div class="photo-grid-overlay">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <h3 class="leader-name">Calvince Kokebe</h3>
            <p class="leader-role">Logistics</p>
        </div>

        <!-- Leader 3 -->
        <div class="leader-card">
            <div class="leader-photo-container">
                <img src="assets/src/al.jpg" alt="Alvine Olonde" class="leader-photo">
                <div class="photo-grid-overlay">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <h3 class="leader-name">Alvine Olonde</h3>
            <p class="leader-role">Secretary</p>
        </div>

        <!-- Leader 4 -->
        <div class="leader-card">
            <div class="leader-photo-container">
                <img src="assets/src/millicent.jpg" alt="Millicent Achieng" class="leader-photo">
                <div class="photo-grid-overlay">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <h3 class="leader-name">Millicent Achieng</h3>
            <p class="leader-role">Welfare</p>
        </div>
    </div>
</section>

<!-- Journey Section - Cards in a row -->
<section class="journey-section">
    <h2>Our Journey</h2>
    <div class="journey-cards">
        <div class="journey-card">
            <div class="journey-year">2023</div>
            <h4>Formation</h4>
            <p>The Lighthouse Ministers was founded by passionate individuals from different SDA communities in Nairobi.</p>
        </div>
        
        <div class="journey-card">
            <div class="journey-year">2023</div>
            <h4>First Official Recording</h4>
            <p>Released our first recorded single "UVUVIO" which gained wide appreciation.</p>
        </div>
        
        <div class="journey-card">
            <div class="journey-year">2024</div>
            <h4>Outreach Missions</h4>
            <p>Expanded ministry to local missions, reaching prisons and communities with our music.</p>
        </div>
        
        <div class="journey-card">
            <div class="journey-year">2025</div>
            <h4>Growth & Impact</h4>
            <p>With 30+ active members, we now serve regularly at church events and gospel programs.</p>
        </div>
    </div>
</section>

<!-- Testimony or Highlights -->
<section class="testimony-highlight">
    <div class="testimony-wrapper">
        <div class="testimony-text">
            <h2>Why We Sing</h2>
            <p>Our songs are more than melodies—they are testimonies of faith, healing, and transformation.</p>
            <p>From prayer songs like <strong>Maombi</strong> to songs of thanksgiving like <strong>Lindo</strong>,
            we testify to God's presence in our journey.</p>
        </div>
        <div class="testimony-image">
            <img src="assets/src/img1.jpg" alt="Music and Worship" />
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
                <div class="contact-item">
                    <i class="fa fa-map-marker"></i>
                    <span>Jetview SDA Church, Utawala, Nairobi, Kenya</span>
                </div>
                <div class="contact-item">
                    <i class="fa fa-phone"></i>
                    <a href="https://wa.me/254724436295" target="_blank" rel="noopener">+254 724 436 295</a>
                </div>
                <div class="contact-item">
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