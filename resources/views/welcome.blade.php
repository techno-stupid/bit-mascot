<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 60px;
        }
        .sidebar .nav-link {
            color: #ffffff;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .sidebar .active {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar-brand {
            color: #ffffff;
        }
        .navbar-brand:hover {
            color: #ffffff;
        }
        .navbar-nav .nav-item .nav-link {
            color: #ffffff;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #ffffff;
        }
        .dropdown-menu .dropdown-item {
            color: #343a40;
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #343a40;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Username
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-home mr-2"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user mr-2"></i>Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>
                </li>
            </ul>
        </div>
        <div class="container mt-5 col-md-9">
            <h2>Data Table Example</h2>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>123456789</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane</td>
                    <td>Doe</td>
                    <td>jane@example.com</td>
                    <td>987654321</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Mark</td>
                    <td>Smith</td>
                    <td>mark@example.com</td>
                    <td>555555555</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
