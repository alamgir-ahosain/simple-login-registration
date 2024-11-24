<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>register page</title>
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
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Register</h1>
                </div>



                <div class="card-body">
                    @if(Session::has('error'))
                    <div class="alert alert-error" role="alert">
                        {{ Session::get('error') }}
                    </div>
                    @endif




                    <form action="/register" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="sid" class="form-label">student ID</label>
                            <input type="text" name="sid" class="form-control" id="sid" placeholder="ce21012" value="{{old('sid')}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Alamgir Hosain " value="{{old('name')}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="alamgir-ahosain@example.com" value="{{old('email')}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Email address</label>
                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>