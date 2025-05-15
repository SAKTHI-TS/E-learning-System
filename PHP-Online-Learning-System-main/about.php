<!DOCTYPE html>
<html>
<head>
    <title>About - LearnTech.AI</title>
    <link rel="stylesheet" type="text/css" href="assets/css/welcome.css">
    <link rel="stylesheet" href="Assets/css/modern-effects.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <style>
        body {
            background: linear-gradient(135deg, #0c1c3d, #1c3d5a, #2a547a);
            color: #fff;
            min-height: 100vh;
        }

        .section-1 {
            background: linear-gradient(rgba(12, 28, 61, 0.9), rgba(42, 84, 122, 0.9)), 
                        url('../img/bg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .section-2 {
            background: linear-gradient(135deg, #0c1c3d 0%, #2a547a 100%);
            padding: 2rem 2rem; /* Reduced padding */
            position: relative;
            overflow: hidden;
        }

        .section-2 h1 {
            background: linear-gradient(45deg, #fff, #3498db);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-align: center;
            margin: 2rem 0;
            font-size: 2.5em;
            animation: fadeIn 0.8s ease-out;
        }

        .section-2 p {
            color: #e0e0e0;
            line-height: 1.8;
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
            animation: slideIn 0.8s ease-out;
        }

        .goals-list {
            list-style: none;
            padding: 0;
            margin: 2rem auto;
            max-width: 800px;
        }

        .goals-list li {
            background: rgba(255, 255, 255, 0.05);
            margin: 0.8rem 20px; /* Reduced margin */
            padding: 0.8rem; /* Reduced padding */
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(4px);
            transform: translateX(-20px);
            opacity: 0;
            animation: slideIn 0.5s ease-out forwards;
        }

        .goals-list li:nth-child(odd) {
            transform: translateX(20px);
        }

        .logo img {
            width: 50px; /* Reduced from 100px */
            height: auto;
            margin-bottom: 0.5rem;
            animation: pulse 2s infinite;
        }

        h1 img {
            width: 60px; /* Added specific size for h1 logo */
            height: auto;
            vertical-align: middle;
            margin-right: 10px;
        }

        .main-footer {
            background: #0c1c3d;
            color: #fff;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        /* Add animation delay for goals list items */
        .goals-list li:nth-child(1) { animation-delay: 0.1s; }
        .goals-list li:nth-child(2) { animation-delay: 0.2s; }
        .goals-list li:nth-child(3) { animation-delay: 0.3s; }
        .goals-list li:nth-child(4) { animation-delay: 0.4s; }
        .goals-list li:nth-child(5) { animation-delay: 0.5s; }
        .goals-list li:nth-child(6) { animation-delay: 0.6s; }
        .goals-list li:nth-child(7) { animation-delay: 0.7s; }
        .goals-list li:nth-child(8) { animation-delay: 0.8s; }
        .goals-list li:nth-child(9) { animation-delay: 0.9s; }
        .goals-list li:nth-child(10) { animation-delay: 1s; }

        /* Fix animation bug */
        @keyframes slideIn {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <section class="section-1 about-p">
        <div class="overl">.</div>
        <header>
            <h2 class="logo">
                <img src="assets/img/Logo.png">
                <span>LearnTech.AI</span>
            </h2>
            <nav>
                <a href="index.php">Home</a>
                <a href="about.php" class="active">About</a>
                <a href="signup.php">Sign Up</a>
                <a href="login.php">Login</a>
            </nav>
        </header>
    </section>
    <section class="section-2">
        <h1>
            <img src="assets/img/Logo.png" alt="LearnTech.AI Logo"><br>
            LearnTech.AI
        </h1>
        
        <p>
            The online learning system website aims to provide a user-friendly and accessible platform for learners, instructors, and administrators. The system is designed to facilitate seamless interaction, efficient course management, and a rich learning experience.
        </p>
        
        <h1>Our Goals</h1>
        <ul class="goals-list">
            <li>Enable users to easily navigate and explore available courses</li>
            <li>Streamline the course enrollment process for a hassle-free experience</li>
            <li>Provide an intuitive dashboard for tracking course progress, achievements, and certificates</li>
            <li>Implement responsive design for optimal user experience across devices</li>
            <li>Foster engagement through discussion forums, ratings, and reviews</li>
            <li>Offer instructors a straightforward interface for course creation and management</li>
            <li>Provide tools for quiz and assignment creation, as well as grading functionalities</li>
            <li>Enable instructors to view and analyze user progress and performance</li>
            <li>Facilitate the generation of certificates for course completion</li>
            <li>Support effective communication through discussion forums</li>
        </ul>
    </section>
     
    <footer class="main-footer">
        <h4>RCD2013C - LearnTech.AI&copy;2024</h4>
    </footer>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(window).on('scroll', function(){
                if ($(window).scrollTop()) {
                    $("header").addClass('bgc');
                }else{
                    $("header").removeClass('bgc');
                }
            });

            // Animate goals on scroll
            $(window).scroll(function() {
                $('.goals-list li').each(function() {
                    let position = $(this).offset().top;
                    let scroll = $(window).scrollTop();
                    let windowHeight = $(window).height();
                    
                    if (scroll > position - windowHeight + 100) {
                        $(this).css('animation-play-state', 'running');
                    }
                });
            });
        });
    </script>
</body>
</html>