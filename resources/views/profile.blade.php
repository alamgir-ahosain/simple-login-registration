<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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
            display: flex;
            height: 100vh;
            flex-direction: column; /* Make body a column layout */
        }

        /* Upper Navbar styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #2c3e50;
            color: white;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
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

        .navbar .auth-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar h2 {
            margin: 0;
            font-size: 1rem;
            font-weight: bold;
            color: #f1f1f1;
        }

        .navbar form button {
            background-color: #4335A7;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .navbar form button:hover {
            background-color: #9694FF;
        }

        /* Sidebar styles */
        .sidebar {
            width: 220px;
            background-color: #34495e;
            padding: 2rem;
            position: fixed;
            top: 60px; /* Adjust to start beneath the top navbar */
            left: 0;
            height: calc(100vh - 60px); /* Adjust height for sidebar below navbar */
            z-index: 5;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 1rem 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: block;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #4335A7;
        }

        /* Main content area */
        .main-content {
            margin-left: 220px; /* Push main content to the right to avoid overlap with sidebar */
            padding: 2rem;
            width: 100%;
            overflow-x: hidden;
            margin-top: 60px; /* Ensure content starts below the top navbar */
        }

        /* Form styles */
        .form-container {
            width: 400px;
            margin: 2rem;
            padding: 1.5rem;
            background-color: #ecf0f1;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            margin-bottom: 1rem;
            color: #2c3e50;
        }

        .form-container label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-container input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
        }

        .form-buttons button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            width: 48%;
        }

        .form-buttons .update-btn {
            background-color: #007BFF;
            color: white;
        }

        .form-buttons .update-btn:hover {
            background-color: #0056b3;
        }

        .form-buttons .delete-btn {
            background-color: #FF5E57;
            color: white;
        }

        .form-buttons .delete-btn:hover {
            background-color: #d43d38;
        }
    </style>
</head>

<body>
    <!-- Upper Navbar -->
    <div class="navbar">
        <div class="logo">alamgir</div>

        <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="https://www.linkedin.com/in/alamgir-ahosain/" target="_blank">About</a></li>
           
           
        </ul>

        <div class="auth-section">
            <h2>{{ Auth::user()->sid }}</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary">Logout</button>
            </form>
        </div>
    </div>

    <!-- Left Sidebar -->
    <div class="sidebar">
     
        <ul>
            <li><a href="{{ route('profile') }}">Profile</a></li>
            <li><a href="{{route('todo')}}">To do</a></li>
      
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Profile Form Section (This will be shown when the 'Profile' link is clicked) -->
        <div class="form-container">
            <h3>User Information</h3>



            <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div>

                    <label>Current Photo:</label>
                    <img src="{{ asset('images/' . Auth::user()->image) }}" alt="Profile Photo" width="150">

                    <input type="file" name="image" class="form-control" id="image" required>
                    <!-- <label for="image" class="form-label">Change Profile</label> -->

                </div>
                <label for="sid">ID:</label>
                <input type="text" id="sid" name="sid" value="{{ Auth::user()->sid }}" readonly>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>

                <div class="form-buttons">
                    <button type="submit" class="update-btn">Update</button>
                    <button type="button" class="delete-btn">Delete</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
