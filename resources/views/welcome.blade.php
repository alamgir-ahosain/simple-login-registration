<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Navbar styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #2c3e50;
            color: white;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar ul li a:hover {
            color: #4335A7;
        }

        .buttons {
            display: flex;
            gap: 1rem;
        }

        .buttons a {
            text-decoration: none;
            background-color: #4335A7;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .buttons a:hover {
            background-color: #9694FF;
        }

        /* Hero Section */
        .hero {
            background-color: #ecf0f1;
            padding: 4rem 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 2rem;
        }

        .hero a {
            text-decoration: none;
            background-color: #2c3e50;
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .hero a:hover {
            background-color: #34495e;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 1rem;
            background-color: #2c3e50;
            color: white;
            margin-top: 2rem;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">alamgir</div>
        
        <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="https://www.linkedin.com/in/alamgir-ahosain/" target="_blank">About</a></li>
           
        </ul>
        <div class="buttons">
            <a href="{{route('login')}}">Login</a>
            <a href="{{route('register')}}">Register</a>
        </div>
       
    </div>

    <!-- Hero Section
    <div class="hero">
        <h1>Welcome to MyWebsite</h1>
        <p>Your one-stop solution for professional services and solutions.</p>
        <a href="#">Learn More</a>
    </div>

   
    <footer>
        <p>&copy; 2024 MyWebsite. All rights reserved.</p>
    </footer> -->
</body>
</html>
