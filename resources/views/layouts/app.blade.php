<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Finance Tracker</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @can('view expenses')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('expenses.index') }}">Expenses</a>
                    </li>
                    @endcan
                    @can('view budget')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('budgets.index') }}">Budget</a>
                    </li>
                    @endcan
                    @can('manage users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users') }}">Manage Users</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    @can('view reports')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.index') }}">Reports</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>

</html>