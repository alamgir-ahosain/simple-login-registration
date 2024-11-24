<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
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
            flex-direction: column;
        }

        /* Navbar styles */
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
            /* Align items vertically in the center */
            gap: 1rem;
            /* Add space between the elements */
        }

        .navbar h2 {
            margin: 0;
            /* Remove any default margin */
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
            top: 60px;
            left: 0;
            height: calc(100vh - 60px);
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
            margin-left: 220px;
            padding: 2rem;
            width: calc(100% - 220px);
            margin-top: 60px;
        }

        /* Task Form Styles */
        .add-task {
            margin-bottom: 1rem;
        }

        .add-task label {
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: inline-block;
        }

        .add-task input {
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .add-task button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-task button:hover {
            background-color: #0056b3;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #34495e;
            color: white;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        tbody td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:hover {
            background-color: #e9e9e9;
        }

        /* Edit and Delete Buttons */
        .edit-btn,
        .delete-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .edit-btn {
            background-color: #007bff;
            color: white;
        }

        .edit-btn:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .delete-btn {
            background-color: #ff5e57;
            color: white;
            margin-left: 10px;
        }

        .delete-btn:hover {
            background-color: #d43d38;
            transform: scale(1.1);
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 100px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
        }

        .modal input {
            padding: 10px;
            width: 100%;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .modal button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .modal button:hover {
            background-color: #0056b3;
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
        <div class="auth-section">
            <h2>{{ Auth::user()->sid }}</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Logout</button>
            </form>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><a href="{{ route('profile') }}">Profile</a></li>
            <li><a href="{{route('todo')}}">To-Do</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <!-- Main Content Area -->
    <div class="main-content">

        <div class="todo-container">
            <h1>To-Do List</h1>


            <div class="add-task">
                <form action="{{route('todo')}}" method="POST" class="add-task">
                    @csrf
                    <input type="text" name="name" id="name" placeholder="Task Name" required>

                    <input type="text" name="status" id="status" placeholder="Status" required>

                    <input type="text" name="info" id="info" placeholder="Info" required>
                    <button type="submit" id="addButton">Add Task</button>
                </form>


            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Info</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todolists as $todo)
                    <tr>
                        <td>{{ $todo->name }}</td>
                        <td>{{ $todo->status }}</td>
                        <td>{{ $todo->info }}</td>
                        <td>
                            <button class="edit-btn" onclick="openModal('{{ $todo->id }}', '{{ $todo->name }}', '{{ $todo->status }}', '{{ $todo->info }}')">Edit</button>
                            <a href="{{ route('deletetodo', $todo->id) }}" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>





        </div>


        <!-- Modal for Editing Task -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span onclick="closeModal()" style="float:right; font-size:24px; cursor:pointer;">&times;</span>
                <h2>Edit Task</h2>
                <form action="{{route('updateTodo', $todolist->id ?? '')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="taskId">

                    <label for="name">Task Name</label>
                    <input type="text" name="name" id="taskName" value="" required>

                    <label for="status">Status</label>
                    <input type="text" name="status" id="taskStatus" value="" required>

                    <label for="info">Info</label>
                    <input type="text" name="info" id="taskInfo" value="" required>

                    <button type="submit">Update Task</button>
                </form>
            </div>
        </div>


        <script>
            // Function to open the modal
            function openModal(id, name, status, info) {
                document.getElementById('editModal').style.display = 'block';
                document.getElementById('taskId').value = id;
                document.getElementById('taskName').value = name;
                document.getElementById('taskStatus').value = status;
                document.getElementById('taskInfo').value = info;
            }

            function closeModal() {
                document.getElementById('editModal').style.display = 'none';
            }
        </script>
</body>

</html>