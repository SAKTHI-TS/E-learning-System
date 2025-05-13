<?php
include "Utils/Validation.php";
include "Config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - <?=SITE_NAME?></title>
	<link rel="stylesheet" 
	      type="text/css" 
	      href="Assets/css/login-signup.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link rel="stylesheet" href="Assets/css/modern-effects.css">
    <style>
        body {
            background: var(--primary-gradient);
            min-height: 100vh;
        }
        
        .wrapper {
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3));
            min-height: 100vh;
        }

        .form-holder {
            animation: fadeInUp 0.8s ease-out;
        }
        
        .form-group input, .form-group select {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .form-group button {
            background: linear-gradient(45deg, #3498db, #2ecc71);
            transform: scale(1);
            transition: all 0.3s ease;
        }

        .form-group button:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .form-group select {
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .form-group select:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .form-group select:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.1);
        }

        .form-group select option {
            background: #2c3e50;
            color: white;
            padding: 12px;
            font-size: 16px;
        }

        .form-group select option:hover {
            background: #34495e;
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
    </style>
</head>
<body>
<!--  F444ff#f -->
    <div class="wrapper animate-in">
    	<div class="form-holder glass-effect hover-float">
    		<div class="logo">
    			<img src="assets/img/Logo.png" class="pulse">
    		     <h2 class="gradient-text">SIGN IN</h2>
    		</div>
    		<?php 
                if (isset($_GET['error'])) { ?>
                	<p class="error"><?=Validation::clean($_GET['error'])?></p>
            <?php } ?>
    		
    		<form class="form"
    		      action="Action/login.php" 
    		      method="POST">
    			<div class="form-group">
    				<label>Username</label>
    				<input type="text" 
    				       name="username"
    				       placeholder="User name"
    				       value="">
    			</div>
    			<div class="form-group">
    				<label>Password</label>
    				<input type="password" 
    				       name="password"
    				       placeholder="Password"
    				       value="">
    			</div>
				<div class="form-group">
					<label>Role:</label><br />
    				<select name="role">
					   <option value="Admin">Admin</option>
					   <option value="Instructor">Instructor</option>
					   <option value="Student">Student</option>
					</select>
    			</div><br />
    			<div class="form-group">
    				<button type="submit">Login</button>
    			</div>
    			<div class="form-group">
    				<a href="signup.php">Sign Up</a>
    				<a href="index.php">| Home</a>
    			</div>
    		</form>
    	</div>
    </div>
</body>
</html>