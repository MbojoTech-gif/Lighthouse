<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Members - Lighthouse Ministers</title>
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
        
        .members-section {
            padding: 40px 20px;
            background-color: var(--white);
        }
        
        .members-container {
            max-width: 1200px;
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
        
        /* UPDATED MEMBERS GRID - Smaller Cards */
        .members-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 25px;
            justify-items: center;
        }
        
        /* UPDATED MEMBER CARD - Smaller with Circular Photo */
        .member-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 180px;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #f0f0f0;
        }
        
        .member-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        /* Circular Photo Container */
        .member-photo-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 15px;
            border: 4px solid var(--light-blue);
            position: relative;
            background: var(--light-gray);
        }
        
        .member-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
            transition: transform 0.3s ease;
        }
        
        .member-card:hover .member-photo {
            transform: scale(1.05);
        }
        
        /* Details Section */
        .member-details {
            text-align: center;
            width: 100%;
        }
        
        .member-name {
            font-size: 1rem;
            color: var(--dark-gray);
            font-weight: 600;
            margin-bottom: 5px;
            line-height: 1.3;
            word-wrap: break-word;
        }
        
        .member-role {
            font-size: 0.85rem;
            color: var(--accent-blue);
            font-weight: 500;
            padding: 4px 10px;
            background: var(--light-blue);
            border-radius: 20px;
            display: inline-block;
        }
        
        .loading {
            text-align: center;
            padding: 40px;
            grid-column: 1/-1;
        }
        
        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 3px solid var(--light-blue);
            border-top-color: var(--primary-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            grid-column: 1/-1;
            color: var(--medium-gray);
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            opacity: 0.3;
        }
        
        .empty-state h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--dark-gray);
        }
        
        .site-footer {
            background: linear-gradient(135deg, var(--dark-gray) 40%, var(--secondary-blue) 100%);
            color: var(--white);
            padding: 40px 20px 20px;
            position: relative;
            margin-top: 40px;
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
        
        .footer-right {
            text-align: right;
        }
        
        .footer-socials {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: flex-end;
        }
        
        .social-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--white);
            text-decoration: none;
            font-size: 1rem;
            opacity: 0.9;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            opacity: 1;
            transform: translateX(-5px);
            color: var(--light-blue);
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s;
        }
        
        .social-link:hover .social-icon {
            background: var(--white);
            color: var(--primary-blue);
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
        @media (max-width: 1200px) {
            .members-grid {
                grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
                gap: 20px;
            }
            
            .member-card {
                max-width: 170px;
                padding: 15px;
            }
            
            .member-photo-container {
                width: 110px;
                height: 110px;
            }
        }
        
        @media (max-width: 992px) {
            .members-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                gap: 18px;
            }
            
            .member-card {
                max-width: 160px;
                padding: 15px 12px;
            }
            
            .member-photo-container {
                width: 100px;
                height: 100px;
            }
            
            .member-name {
                font-size: 0.95rem;
            }
            
            .member-role {
                font-size: 0.8rem;
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
            
            .members-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 15px;
            }
            
            .member-card {
                max-width: 150px;
                padding: 12px;
            }
            
            .member-photo-container {
                width: 90px;
                height: 90px;
                border-width: 3px;
            }
            
            .member-name {
                font-size: 0.9rem;
            }
            
            .member-role {
                font-size: 0.75rem;
                padding: 3px 8px;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 40px;
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
                gap: 20px;
                text-align: center;
            }
        }
        
        @media (max-width: 576px) {
            .hero-content h1 {
                font-size: 1.8rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .members-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
                gap: 12px;
            }
            
            .member-card {
                max-width: 140px;
                padding: 10px;
            }
            
            .member-photo-container {
                width: 85px;
                height: 85px;
            }
            
            .member-name {
                font-size: 0.85rem;
            }
            
            .member-role {
                font-size: 0.7rem;
            }
        }
        
        @media (max-width: 480px) {
            .members-grid {
                grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
                gap: 10px;
            }
            
            .member-card {
                max-width: 130px;
            }
            
            .member-photo-container {
                width: 80px;
                height: 80px;
            }
        }
        
        @media (max-width: 400px) {
            .members-grid {
                grid-template-columns: repeat(2, 1fr);
                max-width: 280px;
                margin: 0 auto;
            }
            
            .member-card {
                max-width: 140px;
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
            <li><a href="members.php" class="active">Members</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<section class="hero-section">
    <div class="hero-content">
        <h1>Meet Our Family</h1>
        <p>
            The Lighthouse Ministers is made up of dedicated individuals who share a common passion for worship,
            music, and service. Each member brings unique gifts and talents to create a harmonious ministry.
        </p>
    </div>
</section>

<section class="members-section">
    <div class="members-container">
        <div class="section-title">
            <h2>Our Members</h2>
        </div>
        
        <div class="members-grid" id="membersGrid">
            <div class="loading">
                <div class="loading-spinner"></div>
                <p>Loading members...</p>
            </div>
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
                <li><a href="events.php">Events & Projects</a></li>
                <li><a href="songs.php">Songs</a></li>
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
    function toggleMenu() {
        const nav = document.getElementById('navLinks');
        nav.classList.toggle('active');
    }

    document.addEventListener("DOMContentLoaded", function () {
        const membersGrid = document.getElementById("membersGrid");
        
        membersGrid.innerHTML = `
            <div class="loading">
                <div class="loading-spinner"></div>
                <p>Loading members...</p>
            </div>
        `;
        
        fetch("api/get-members.php")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                membersGrid.innerHTML = "";
                
                if (data.error) {
                    membersGrid.innerHTML = `
                        <div class="empty-state" style="grid-column: 1/-1;">
                            <i class="fa fa-exclamation-circle"></i>
                            <h3>Error Loading Members</h3>
                            <p>${data.error}</p>
                        </div>
                    `;
                    return;
                }
                
                if (data.length === 0) {
                    membersGrid.innerHTML = `
                        <div class="empty-state" style="grid-column: 1/-1;">
                            <i class="fa fa-users"></i>
                            <h3>No Members Available</h3>
                            <p>Check back soon for updates!</p>
                        </div>
                    `;
                    return;
                }
                
                data.forEach(member => {
                    const card = document.createElement("div");
                    card.className = "member-card";
                    
                    const imageUrl = member.image || 'Lhm-Family/assets/uploads/members/';
                    const memberName = member.name || 'Member';
                    const memberRole = member.role || 'Member';
                    
                    card.innerHTML = `
                        <div class="member-photo-container">
                            <img src="${imageUrl}" 
                                 alt="${memberName}"
                                 class="member-photo"
                                 loading="lazy"
                                 onerror="this.src='Lhm-Family/assets/uploads/members/'">
                        </div>
                        <div class="member-details">
                            <h3 class="member-name">${memberName}</h3>
                            <div class="member-role">${memberRole}</div>
                        </div>
                    `;
                    membersGrid.appendChild(card);
                });
                
                console.log(`Successfully loaded ${data.length} members`);
            })
            .catch(err => {
                console.error("Error loading members:", err);
                membersGrid.innerHTML = `
                    <div class="empty-state" style="grid-column: 1/-1;">
                        <i class="fa fa-exclamation-triangle"></i>
                        <h3>Connection Error</h3>
                        <p>Unable to load members. Please check your connection and try again.</p>
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
    });
</script>
</body>
</html>