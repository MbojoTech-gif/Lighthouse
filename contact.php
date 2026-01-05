<?php
// This is contact.php - contact page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'favicon2.php'; ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us - Lighthouse Ministers</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
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
        background-color: #f8f9fa;
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
    .contact-hero {
        position: relative;
        color: var(--white);
        padding: 100px 20px;
        text-align: center;
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .contact-hero::before {
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
        font-size: 3rem;
        margin-bottom: 20px;
        font-weight: 700;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }
    
    .hero-content p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        line-height: 1.8;
        font-weight: 300;
    }
    
    /* Contact Section - Single Card Layout */
    .contact-section {
        padding: 50px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .section-title h2 {
        font-size: 2.5rem;
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
        width: 100px;
        height: 3px;
        background-color: var(--primary-blue);
    }
    
    .contact-card {
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 40px;
    }
    
    .contact-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 500px;
    }
    
    /* Contact Form Side */
    .contact-form-side {
        padding: 40px;
        background: var(--light-blue);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .contact-form-side h3 {
        font-size: 1.8rem;
        color: var(--primary-blue);
        margin-bottom: 25px;
        position: relative;
        display: inline-block;
    }
    
    .contact-form-side h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background-color: var(--primary-blue);
    }
    
    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .contact-form label {
        font-weight: 600;
        color: var(--primary-blue);
        font-size: 0.95rem;
    }
    
    .contact-form input,
    .contact-form textarea {
        padding: 15px 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s;
        font-family: 'Roboto', sans-serif;
        background: var(--white);
    }
    
    .contact-form input:focus,
    .contact-form textarea:focus {
        outline: none;
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
    }
    
    .contact-form textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    .contact-form button {
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
    
    .contact-form button:hover {
        background-color: var(--secondary-blue);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    /* Contact Info Side */
    .contact-info-side {
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .contact-info-side h3 {
        font-size: 1.8rem;
        color: var(--primary-blue);
        margin-bottom: 25px;
        position: relative;
        display: inline-block;
    }
    
    .contact-info-side h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background-color: var(--primary-blue);
    }
    
    .contact-details {
        display: flex;
        flex-direction: column;
        gap: 25px;
        margin-bottom: 30px;
    }
    
    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }
    
    .contact-icon {
        width: 50px;
        height: 50px;
        background: var(--light-blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-blue);
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    
    .contact-text h5 {
        font-size: 1.1rem;
        color: var(--dark-gray);
        margin-bottom: 5px;
        font-weight: 600;
    }
    
    .contact-text p {
        color: var(--medium-gray);
        font-size: 1rem;
        line-height: 1.6;
    }
    
    .contact-text a {
        color: var(--primary-blue);
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .contact-text a:hover {
        color: var(--secondary-blue);
        text-decoration: underline;
    }
    
    /* Map Container */
    .map-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        margin-top: auto;
    }
    
    .contact-map {
        width: 100%;
        height: 250px;
        border: none;
        display: block;
    }
    
    /* Social Media Section Below Card */
    .social-section {
        text-align: center;
        padding: 40px 20px;
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }
    
    .social-section h3 {
        font-size: 1.8rem;
        color: var(--primary-blue);
        margin-bottom: 30px;
        position: relative;
        display: inline-block;
    }
    
    .social-section h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background-color: var(--primary-blue);
    }
    
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .social-icon {
        width: 60px;
        height: 60px;
        background: var(--light-blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-blue);
        font-size: 1.5rem;
        text-decoration: none;
        transition: all 0.3s;
    }
    
    .social-icon:hover {
        background: var(--primary-blue);
        color: var(--white);
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .contact-content {
            grid-template-columns: 1fr;
            min-height: auto;
        }
        
        .contact-form-side,
        .contact-info-side {
            padding: 30px;
        }
        
        .contact-map {
            height: 200px;
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
            font-size: 2.2rem;
        }
        
        .hero-content p {
            font-size: 1rem;
        }
        
        .section-title h2 {
            font-size: 2rem;
        }
        
        .contact-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .contact-icon {
            width: 45px;
            height: 45px;
            font-size: 1rem;
        }
        
        .social-icons {
            gap: 15px;
        }
        
        .social-icon {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }
    }
    
    @media (max-width: 480px) {
        .hero-content h1 {
            font-size: 1.8rem;
        }
        
        .contact-form-side,
        .contact-info-side {
            padding: 20px;
        }
        
        .contact-form input,
        .contact-form textarea,
        .contact-form button {
            padding: 12px 15px;
        }
        
        .social-section {
            padding: 30px 15px;
        }
        
        .social-icon {
            width: 45px;
            height: 45px;
            font-size: 1.1rem;
        }
    }

    /* COMPLETELY REDESIGNED FOOTER SECTION - Matching index.php */
    .site-footer {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        color: var(--white);
        padding: 60px 20px 20px;
        position: relative;
        overflow: hidden;
        margin-top: 60px;
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
      <img src="assets/src/ll.png" alt="Lighthouse Logo" class="logo" />
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
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="contact.php" class="active">Contact</a></li>
    </ul>
  </nav>
</header>

<section class="contact-hero">
  <div class="hero-content">
    <h1>Get In Touch</h1>
    <p>
      We'd love to hear from you! Whether you have questions about our ministry,
      want to invite us for an event, or simply want to connect, feel free to
      reach out to us.
    </p>
  </div>
</section>

<section class="contact-section">
  <div class="section-title">
    <h2>Contact Us</h2>
  </div>
  
  <!-- Single Contact Card -->
  <div class="contact-card">
    <div class="contact-content">
      <!-- Form Side -->
      <div class="contact-form-side">
        <h3>Send us a Message</h3>
        <form class="contact-form" id="contactForm">
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required />
          </div>
          
          <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required />
          </div>
          
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="What is this regarding?" />
          </div>
          
          <div class="form-group">
            <label for="message">Your Message</label>
            <textarea id="message" name="message" placeholder="Type your message here..." required></textarea>
          </div>
          
          <button type="submit">Send Message</button>
        </form>
      </div>
      
      <!-- Info Side -->
      <div class="contact-info-side">
        <div>
          <h3>Get in Touch</h3>
          <div class="contact-details">
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fa fa-map-marker"></i>
              </div>
              <div class="contact-text">
                <h5>Location</h5>
                <p>Jetview SDA Church, Utawala, Nairobi, Kenya</p>
              </div>
            </div>
            
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fa fa-phone"></i>
              </div>
              <div class="contact-text">
                <h5>Phone</h5>
                <p><a href="tel:+254724436295">+254 724 436 295</a></p>
              </div>
            </div>
            
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fa fa-whatsapp"></i>
              </div>
              <div class="contact-text">
                <h5>WhatsApp</h5>
                <p><a href="https://wa.me/254724436295" target="_blank">Chat with us on WhatsApp</a></p>
              </div>
            </div>
            
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fa fa-envelope"></i>
              </div>
              <div class="contact-text">
                <h5>Email</h5>
                <p><a href="mailto:lighthouseministers23@gmail.com">lighthouseministers23@gmail.com</a></p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Map -->
        <div class="map-container">
          <iframe
            src="https://www.google.com/maps?q=Jetview%20SDA%20Utawala&output=embed"
            class="contact-map"
            allowfullscreen=""
            title="Map showing Jetview SDA, Utawala, Nairobi"
            style="border:0;"
          ></iframe>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Social Media Section -->
  <div class="social-section">
    <h3>Follow Us</h3>
    <div class="social-icons">
      <a href="https://www.youtube.com/@thelighthouseministersnairobi/videos" target="_blank" class="social-icon" aria-label="YouTube">
        <i class="fa fa-youtube-play"></i>
      </a>
      <a href="https://instagram.com/yourpage" target="_blank" class="social-icon" aria-label="Instagram">
        <i class="fa fa-instagram"></i>
      </a>
      <a href="https://wa.me/254724436295" target="_blank" class="social-icon" aria-label="WhatsApp">
        <i class="fa fa-whatsapp"></i>
      </a>
      <a href="https://facebook.com" target="_blank" class="social-icon" aria-label="Facebook">
        <i class="fa fa-facebook"></i>
      </a>
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

  // Form submission
  document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form data
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const subject = document.getElementById('subject').value || 'No Subject';
    const message = document.getElementById('message').value;
    
    // Validate form
    if (!name || !email || !message) {
      alert('Please fill in all required fields.');
      return;
    }
    
    // Construct mailto link
    const body = `Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`;
    const mailtoLink = `mailto:lighthouseministers23@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
    
    // Open email client
    window.location.href = mailtoLink;
    
    // Reset form after a delay
    setTimeout(() => {
      document.getElementById('contactForm').reset();
    }, 1000);
  });

  // Back to top button functionality
  document.querySelector('.back-to-top').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  // Add animation to contact card on scroll
  document.addEventListener('DOMContentLoaded', function() {
    const contactCard = document.querySelector('.contact-card');
    const socialSection = document.querySelector('.social-section');
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });
    
    if (contactCard) {
      contactCard.style.opacity = '0';
      contactCard.style.transform = 'translateY(30px)';
      contactCard.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(contactCard);
    }
    
    if (socialSection) {
      socialSection.style.opacity = '0';
      socialSection.style.transform = 'translateY(30px)';
      socialSection.style.transition = 'opacity 0.6s ease 0.3s, transform 0.6s ease 0.3s';
      observer.observe(socialSection);
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