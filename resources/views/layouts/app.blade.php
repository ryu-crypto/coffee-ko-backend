<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee-Ko Admin</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f5f2;
            font-family: Arial, sans-serif;
            color: #3e2723;
        }
        .navbar {
            background-color: #4e342e !important; /* Coffee Brown */
        }
        .navbar-brand, .nav-link, .btn {
            color: #fff !important;
        }
        .card {
            border-radius: 12px;
        }
        .card-title {
            color: #4e342e;
            font-weight: bold;
        }
        .text-brown {
            color: #4e342e;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">☕ Coffee-Ko Admin</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('inventory') }}">Inventory</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('sales') }}">Sales</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('deliveries') }}">Deliveries</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
