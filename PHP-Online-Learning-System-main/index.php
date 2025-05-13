<!DOCTYPE html>
<html>
<head>
    <title>LearnTech.AI - online learning system</title>
    <link rel="stylesheet" type="text/css" href="assets/css/welcome.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="Assets/css/modern-effects.css">
    <style>
        body {
            background: linear-gradient(135deg, #0c1c3d, #1c3d5a, #2a547a);
            color: #fff;
            min-height: 100vh;
        }

        .section-1 {
            background: linear-gradient(rgba(12, 28, 61, 0.9), rgba(42, 84, 122, 0.9)), 
                        url('../img/bg2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
            background: linear-gradient(45deg, rgba(12, 28, 61, 0.9), rgba(42, 84, 122, 0.9));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 20px;
        }

        .hero-title {
            font-size: 4em;
            margin-bottom: 20px;
            background: linear-gradient(45deg, #fff, #3498db);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: titleFloat 3s ease-in-out infinite;
        }

        .hero-subtitle {
            font-size: 1.5em;
            margin-bottom: 30px;
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
            animation-delay: 0.5s;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(45deg, #3498db, #2ecc71);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
            margin: 10px;
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
            animation-delay: 1s;
        }

        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .floating-shapes div {
            position: absolute;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(5px);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .shape1 { width: 100px; height: 100px; top: 20%; left: 10%; animation-delay: 0s; }
        .shape2 { width: 150px; height: 150px; top: 60%; left: 80%; animation-delay: 2s; }
        .shape3 { width: 80px; height: 80px; top: 40%; left: 60%; animation-delay: 4s; }

        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(100px, 100px) rotate(180deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }

        @keyframes titleFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 50px 20px;
            background: linear-gradient(135deg, #0c1c3d 0%, #2a547a 100%);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: transform 0.3s;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .section-2 {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0c1c3d 0%, #2a547a 100%);
            color: #fff;
            padding: 4rem 2rem;
        }

        .section-2 h1 {
            position: relative;
            z-index: 1;
        }

        .section-2 p {
            color: #e0e0e0;
            line-height: 1.8;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('assets/img/wave.svg');
            animation: wave 10s linear infinite;
        }

        .main-footer {
            background: #0c1c3d;
            color: #fff;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>
    <section class="section-1 home-p">
        <div class="overl glass-effect">.</div>
        <header class="glass-effect">
            <h2 class="logo hover-float">
                  <img src="assets/img/Logo.png" class="pulse">
                 <span class="gradient-text">LearnTech.AI</span>
            </h2>
            <nav>
                <a href="index.php" class="active">Home</a>
                <a href="about.php">About</a>
                <a href="signup.php">Sign Up</a>
                <a href="login.php">Login</a>
                
            </nav>
        </header>
    </section>

    <section class="hero-section">
        <div class="floating-shapes">
            <div class="shape1"></div>
            <div class="shape2"></div>
            <div class="shape3"></div>
        </div>
        <div class="hero-content">
            <h1 class="hero-title">Welcome to LearnTech.AI</h1>
            <p class="hero-subtitle">Empowering minds through innovative online learning</p>
            <a href="signup.php" class="cta-button">Get Started</a>
            <a href="about.php" class="cta-button">Learn More</a>
        </div>
    </section>

    <div class="features-grid">
        <div class="feature-card">
            <img src="Assets/img/feature-icons/interactive.svg" alt="Interactive Learning">
            <h3>Interactive Learning</h3>
            <p>Engage with dynamic content and real-time feedback</p>
        </div>
        <div class="feature-card">
            <img src="Assets/img/feature-icons/expert.svg" alt="Expert Instructors">
            <h3>Expert Instructors</h3>
            <p>Learn from industry professionals and thought leaders</p>
        </div>
        <div class="feature-card">
            <img src="Assets/img/feature-icons/flexible.svg" alt="Flexible Schedule">
            <h3>Flexible Schedule</h3>
            <p>Study at your own pace, anywhere, anytime</p>
        </div>
        <div class="feature-card">
            <img src="Assets/img/feature-icons/certificate.svg" alt="Certified Courses">
            <h3>Certified Courses</h3>
            <p>Earn recognized certificates upon completion</p>
        </div>
    </div>

    <section class="section-2">
        <h1>Welcome to LearnTech.AI</h1>
        <p>
        Welcome to our Online Learning System, where knowledge meets accessibility. Our platform is crafted to empower learners, instructors, and administrators with the tools they need for a dynamic and enriching educational experience.
        </p>
        <h1>For Learners:</h1>
        <p>
            Embark on your learning journey with ease. Browse through a diverse range of courses, enroll effortlessly, and track your progress in real-time. Engage with fellow learners through discussion forums, share insights, and earn certificates as a testament to your accomplishments.
        </p>
        <h1>For Instructors:</h1>
        <p>
            Shape the future of education by creating captivating courses. Our instructor version provides an intuitive environment for content creation, quiz management, and grading. Stay connected with your students through forums, monitor their progress, and witness the impact of your expertise.

            
        </p>
        <p>
            At the heart of our platform is a commitment to fostering a collaborative and interactive learning experience. Join us on this educational adventure, where knowledge knows no bounds. Welcome to a world of learning at your fingertips.
        </p>
        <div class="wave"></div>
    </section>

    <footer class="main-footer">
      <h4>LearnTech.AI</h4>
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

            // Add parallax effect to floating shapes
            $(window).scroll(function() {
                let scroll = $(window).scrollTop();
                $('.floating-shapes div').css({
                    'transform': 'translateY(' + (scroll * 0.5) + 'px)'
                });
            });

            // Animate feature cards on scroll
            $(window).scroll(function() {
                $('.feature-card').each(function() {
                    let position = $(this).offset().top;
                    let scroll = $(window).scrollTop();
                    let windowHeight = $(window).height();
                    
                    if (scroll > position - windowHeight + 100) {
                        $(this).addClass('animate-in');
                    }
                });
            });
        });
    </script>
</body>
</html>