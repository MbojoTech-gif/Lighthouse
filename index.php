<?php
// This is index.php - main landing page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'favicon2.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Lighthouse Ministers</title>
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
        
        /* Header & Navigation - STAYS WHITE */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 1);
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
        
        /* Welcome Section with Background Image */
        .welcome-section {
            position: relative;
            color: var(--white);
            padding: 100px 20px;
            text-align: center;
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .welcome-section::before {
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
        
        .welcome-content {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .welcome-content h1 {
            font-size: 3rem;
            margin-bottom: 30px;
            font-weight: 700;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 1);
        }
        
        .welcome-content p {
            font-size: 1.1rem;
            margin-bottom: 40px;
            line-height: 1.8;
            font-weight: 300;
        }
        
        .welcome-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-primary, .btn-secondary {
            padding: 15px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-block;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background-color: var(--white);
            color: var(--primary-blue);
            border: 2px solid var(--white);
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 1);
        }
        
        .btn-secondary {
            background-color: transparent;
            color: var(--white);
            border: 2px solid var(--white);
        }
        
        .btn-secondary:hover {
            background-color: var(--white);
            color: var(--primary-blue);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        /* About Section */
        .about-section {
            padding: 50px 10px;
            background-color: var(--light-blue);
        }
        
        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 60px;
        }
        
        .about-image {
            flex: 1;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.73);
            transform: translateY(0);
            transition: transform 0.3s ease;
        }
        
        .about-image:hover {
            transform: translateY(-10px);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }
        
        .about-image:hover img {
            transform: scale(1.05);
        }
        
        .about-text {
            flex: 1;
        }
        
        .about-text h2 {
            font-size: 2.5rem;
            color: var(--primary-blue);
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }
        
        .about-text h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 3px;
            background-color: var(--primary-blue);
        }
        
        .about-text p {
            margin-bottom: 20px;
            color: var(--medium-gray);
            font-size: 1rem;
            line-height: 1.8;
        }
        
        .about-btn {
            display: inline-block;
            padding: 12px 35px;
            background-color: var(--primary-blue);
            color: var(--white);
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 1rem;
            border: 2px solid var(--primary-blue);
        }
        
        .about-btn:hover {
            background-color: transparent;
            color: var(--primary-blue);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Streaming Platforms Section */
        .streaming-section {
            padding: 50px 10px;
            background-color: var(--white);
            text-align: center;
        }
        
        .streaming-section h2 {
            font-size: 2.5rem;
            color: var(--primary-blue);
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
        }
        
        .streaming-section h2::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--primary-blue);
        }
        
        .platforms-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 10px;
        }
        
        .platform-card {
            background: var(--white);
            border-radius: 15px;
            padding: 20px 5px 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.75);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .platform-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
            border-color: var(--light-blue);
        }
        
        .platform-icon-container {
            position: absolute;
            top: -30px;
            width: 60px;
            height: 60px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border: 5px solid var(--light-blue);
            transition: all 0.3s ease;
        }
        
        .platform-card:hover .platform-icon-container {
            transform: scale(1.1);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .platform-icon {
            font-size: 2.5rem;
            color: var(--primary-blue);
        }
        
        .platform-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin: 40px 0 15px;
        }
        
        .platform-desc {
            font-size: 0.95rem;
            color: var(--medium-gray);
            text-align: center;
            line-height: 1.6;
            margin-bottom: 25px;
            flex-grow: 1;
        }
        
        .platform-btn {
            display: inline-block;
            padding: 10px 25px;
            background-color: var(--primary-blue);
            color: var(--white);
            text-decoration: none;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s;
            border: 2px solid var(--primary-blue);
        }
        
        .platform-btn:hover {
            background-color: transparent;
            color: var(--primary-blue);
            transform: translateY(-2px);
        }
        
        /* Service Request Section with Background Image */
        .service-request-section {
            position: relative;
            padding: 40px 5px;
            text-align: center;
        }
        
        .service-request-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(rgba(0, 0, 0, 0.62), rgba(1, 2, 86, 0.88)),
                url('assets/src/w.jpg') center/cover no-repeat fixed;
            z-index: -1;
        }
        
        .service-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: var(--white);
            padding: 10px;
            border-radius: 15px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            position: relative;
            z-index: 1;
        }
        
        .service-container h2 {
            font-size: 2.2rem;
            color: var(--primary-blue);
            margin-bottom: 20px;
        }
        
        .service-container p {
            margin-bottom: 30px;
            color: var(--medium-gray);
            font-size: 1rem;
            line-height: 1.6;
        }
        
        .service-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .service-form input {
            padding: 15px 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .service-form input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
        }
        
        .service-form label {
            text-align: left;
            font-weight: 600;
            color: var(--primary-blue);
            font-size: 1rem;
        }
        
        .service-form button {
            padding: 15px 30px;
            background-color: var(--primary-blue);
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .service-form button:hover {
            background-color: var(--secondary-blue);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .note {
            display: block;
            margin-top: 20px;
            font-size: 0.85rem;
            color: #777;
            line-height: 1.5;
        }
        
        /* Join Us Section */
        .join-us-section {
            padding: 40px 20px;
            background-color: var(--white);
        }
        
        .join-us-container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            background: var(--light-blue);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }
        
        .join-us-container h2 {
            font-size: 1.8rem;
            color: var(--primary-blue);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .join-us-container h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--primary-blue);
        }
        
        .join-us-container p {
            margin-bottom: 25px;
            color: var(--medium-gray);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .join-form {
            background-color: var(--white);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .join-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }
        
        .join-table td {
            padding: 3px 0;
            text-align: left;
        }
        
        .join-table label {
            font-weight: 600;
            color: var(--primary-blue);
            font-size: 0.9rem;
            display: block;
            margin-bottom: 5px;
        }
        
        .join-table input,
        .join-table textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        
        .join-table input:focus,
        .join-table textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 2px rgba(0, 51, 102, 0.1);
        }
        
        .join-btn {
            padding: 10px 30px;
            background-color: var(--primary-blue);
            color: var(--white);
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 15px;
        }
        
        .join-btn:hover {
            background-color: var(--secondary-blue);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* COMPLETELY REDESIGNED FOOTER SECTION */
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
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .about-container {
                flex-direction: column;
                gap: 40px;
            }
            
            .about-image {
                max-width: 500px;
            }
            
            .platforms-container {
                grid-template-columns: repeat(2, 1fr);
            }
            
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
            
            .welcome-content h1 {
                font-size: 2.2rem;
            }
            
            .welcome-content p {
                font-size: 1rem;
            }
            
            .platforms-container {
                grid-template-columns: 1fr;
                max-width: 400px;
            }
            
            .platform-card {
                padding: 40px 20px 30px;
            }
            
            .service-container,
            .join-us-container {
                padding: 30px 20px;
            }
            
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
            .welcome-content h1 {
                font-size: 1.8rem;
            }
            
            .welcome-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-primary, .btn-secondary {
                width: 100%;
                max-width: 250px;
                text-align: center;
            }
            
            .about-text h2,
            .streaming-section h2,
            .join-us-container h2 {
                font-size: 2rem;
            }
            
            .join-form {
                padding: 20px 15px;
            }
            
            .join-table {
                display: block;
            }
            
            .join-table tr {
                display: block;
                margin-bottom: 20px;
            }
            
            .join-table td {
                display: block;
                padding: 0;
            }
            
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
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="events.php">Events & Projects</a></li>
            <li><a href="songs.php">Songs</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<section class="welcome-section">
    <div class="welcome-content">
        <h1>We Share the message of hope and faith</h1>
        <p>
            The Lighthouse Ministers is a vibrant music group,
            affiliated with Jetview SDA Church in Utawala, Nairobi, Kenya.
            As part of the Seventh-day Adventist Church, we are dedicated to spreading the message of hope and faith through music and community service.
            Join us as we worship, celebrate and spread positivity through music and evangelism, creating an atmosphere of unity and spiritual growth.
        </p>

        <!-- Action Buttons -->
        <div class="welcome-buttons">
            <a href="events.php" class="btn-primary">View Upcoming Events</a>
            <a href="songs.php" class="btn-secondary">Explore Our Music</a>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="about-container">
        <div class="about-image">
            <img src="assets/src/i.jpg" alt="About Us Image">
        </div>
        <div class="about-text">
            <h2>About Us</h2>
            <p>
                The Lighthouse Ministers is a Christ-centered music ministry based in Utawala, Nairobi. We are passionate about spreading the gospel through powerful worship, music, and service.
            </p>
            <p>
                As part of the Jetview SDA Church community, our mission is to uplift, inspire, and lead souls to Christ. We believe in the transformative power of music and strive to bring hope, love, and light to all through our voices and testimonies.
            </p>
            <a href="about.php" class="about-btn">Explore More About Us</a>
        </div>
    </div>
</section>

<section class="streaming-section">
    <h2>Stream Our Music</h2>
    <div class="platforms-container">
        <!-- Spotify Card -->
        <div class="platform-card">
            <div class="platform-icon-container">
                <i class="fa fa-spotify platform-icon"></i>
            </div>
            <h3 class="platform-name">Spotify</h3>
            <p class="platform-desc">Stream our latest worship songs and inspirational playlists on the world's most popular music platform</p>
            <a href="https://open.spotify.com/artist/44qEM1HcSZo2BhEbqVWaWf?si=KvqpoVoUR-KW-QQGioSj7w" class="platform-btn">Listen Now</a>
        </div>
        
        <!-- Boomplay Card -->
        <div class="platform-card">
            <div class="platform-icon-container">
                <i class="fa fa-music platform-icon"></i>
            </div>
            <h3 class="platform-name">Boomplay</h3>
            <p class="platform-desc">Access our music on Africa's leading streaming service with millions of users across the continent</p>
            <a href="https://www.boomplay.com/artists/79047563?srModel=COPYLINK&srList=WEB&share_content=artist&share_channel=copylink&share_platform=web" class="platform-btn">Listen Now</a>
        </div>
        
        <!-- Apple Music Card -->
        <div class="platform-card">
            <div class="platform-icon-container">
                <i class="fa fa-apple platform-icon"></i>
            </div>
            <h3 class="platform-name">Apple Music</h3>
            <p class="platform-desc">Experience our high-quality audio recordings on Apple's premium music streaming service</p>
            <a href="https://music.apple.com/ke/artist/the-lighthouse-ministers-nairobi/1713437103" class="platform-btn">Listen Now</a>
        </div>
        
        <!-- YouTube Music Card -->
        <div class="platform-card">
            <div class="platform-icon-container">
                <i class="fa fa-youtube platform-icon"></i>
            </div>
            <h3 class="platform-name">YouTube Topics</h3>
            <p class="platform-desc">Listen our music, live performances, and worship sessions on our YouTube topics channel</p>
            <a href="https://youtube.com/channel/UC9z9qLUDZ_GmCmqvtEWv3RA?si=0NUUwileDRhtyYRe" class="platform-btn" target="_blank">Listen Now</a>
        </div>
    </div>
</section>

<section class="service-request-section">
    <div class="service-container">
        <h2>Service Request</h2>
        <p>Fill in your church name and attach your request. We'll get back to you!</p>

        <form id="whatsappForm" class="service-form">
            <input type="text" id="churchName" placeholder="Church Name" required />
            <label for="attachment">Attach Request (PDF, DOC, JPG, PNG):</label>
            <input type="file" id="attachment" title="Attach your request file" placeholder="Choose a file" accept=".pdf,.doc,.docx,.jpg,.png" />
            <button type="submit">Send Request via WhatsApp</button>
        </form>
        <small class="note">* You'll be redirected to WhatsApp. Please send the attached file manually in chat.</small>
    </div>
</section>

<section class="join-us-section">
    <div class="join-us-container">
        <h2>Want to Join Us?</h2>
        <p>Fill out the form below to get in touch or become part of The Lighthouse Ministers community.</p>

        <form class="join-form" action="mailto:lighthouseministers23@gmail.com" method="POST" enctype="text/plain">
            <table class="join-table">
                <tr>
                    <td><label for="fname">First Name:</label></td>
                    <td><input type="text" id="fname" name="First Name" required></td>
                </tr>
                <tr>
                    <td><label for="lname">Last Name:</label></td>
                    <td><input type="text" id="lname" name="Last Name" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="Email" required></td>
                </tr>
                <tr>
                    <td><label for="message">Message (Reason as to why you want to join):</label></td>
                    <td><textarea id="message" name="Message" rows="4" required></textarea></td>
                </tr>
            </table>
            <button type="submit" class="join-btn">Send Message</button>
        </form>
    </div>
</section>

<!-- REDESIGNED PROFESSIONAL FOOTER -->
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

    document.getElementById('whatsappForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const churchName = document.getElementById('churchName').value.trim();
        const whatsappNumber = "254708385461";

        if (!churchName) {
            alert("Please enter your church name.");
            return;
        }

        const message = `Hello, I am sending a service request from *${churchName}*. Please find the attached.`;
        const encodedMessage = encodeURIComponent(message);
        const whatsappLink = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

        window.open(whatsappLink, "_blank");
    });

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