<?php
// This is contact.php - contact page
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    
    /* Footer */
    .site-footer {
        background: linear-gradient(135deg, var(--dark-gray) 40%, var(--secondary-blue) 100%);
        color: var(--white);
        padding: 40px 20px 20px;
        position: relative;
        margin-top: 60px;
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
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 50px;
        margin-top: 30px;
    }
    
    .footer-left h3 {
        font-size: 1.8rem;
        margin-bottom: 20px;
        color: var(--white);
        font-weight: 700;
    }
    
    .footer-left p {
        margin-bottom: 15px;
        font-size: 0.95rem;
        opacity: 0.9;
        line-height: 1.6;
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
        font-size: 1.4rem;
        margin-bottom: 25px;
        color: var(--white);
        font-weight: 600;
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
        color: var(--white);
        text-decoration: none;
        font-size: 1rem;
        opacity: 0.9;
        transition: all 0.3s;
        display: inline-block;
        padding: 5px 0;
    }
    
    .footer-links a:hover {
        opacity: 1;
        transform: translateX(5px);
        color: var(--light-blue);
    }
    
    .footer-bottom {
        max-width: 1200px;
        margin: 40px auto 0;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .footer-bottom p {
        font-size: 0.9rem;
        opacity: 0.9;
    }
    
    .back-to-top {
        color: var(--white);
        text-decoration: none;
        font-size: 0.9rem;
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
        
        .footer-content {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 40px;
        }
        
        .footer-bottom {
            flex-direction: column;
            gap: 20px;
            text-align: center;
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
      <li><a href="members.php" class="active">Members</a></li>
      <li><a href="contact.php">Contact</a></li>
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
      <p><strong>WhatsApp:</strong> <a href="https://wa.me/254724436295" target="_blank">+254 724 436 295</a></p>
      <p><strong>Email:</strong> <a href="mailto:lighthouseministers23@gmail.com">lighthouseministers23@gmail.com</a></p>
    </div>

    <div class="footer-center">
      <h4>Quick Links</h4>
      <ul class="footer-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="events.php">Events & Projects</a></li>
        <li><a href="members.php">Members</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
    </div>

    <div class="footer-right">
      <h4>Stay Connected</h4>
      <p>Follow us on our social media platforms for updates and inspiration.</p>
      <div style="display: flex; gap: 15px; justify-content: center; margin-top: 20px;">
        <a href="https://www.youtube.com/@thelighthouseministersnairobi/videos" target="_blank" style="color: white; font-size: 1.5rem;">
          <i class="fa fa-youtube-play"></i>
        </a>
        <a href="https://instagram.com/yourpage" target="_blank" style="color: white; font-size: 1.5rem;">
          <i class="fa fa-instagram"></i>
        </a>
        <a href="https://wa.me/254724436295" target="_blank" style="color: white; font-size: 1.5rem;">
          <i class="fa fa-whatsapp"></i>
        </a>
        <a href="https://facebook.com" target="_blank" style="color: white; font-size: 1.5rem;">
          <i class="fa fa-facebook"></i>
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
</script>
</body>
</html>