<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coffee-Ko Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f5f0e6; /* light coffee cream */
            color: #3e2723; /* dark coffee brown */
        }
        .navbar {
            background-color: #6f4e37; /* coffee brown */
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-title {
            font-weight: bold;
        }
        footer {
            background-color: #6f4e37;
            color: #fff;
        }
        a.card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">☕ Coffee-Ko</a>
    </div>
</nav>

<div class="container my-4">

    <!-- Dashboard Title -->
    <h2 class="fw-bold text-center mb-4">Coffee-Ko Dashboard</h2>

    <!-- Stats Row -->
    <div class="row g-3">
        <div class="col-md-3">
            <a href="{{ route('inventory') }}" class="card-link">
                <div class="card text-center p-3">
                    <h5 class="card-title">📦 Inventory</h5>
                    <p class="fs-4 fw-bold">120 items</p>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('sales') }}" class="card-link">
                <div class="card text-center p-3">
                    <h5 class="card-title">💰 Sales Today</h5>
                    <p class="fs-4 fw-bold">₱4,500</p>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('products') }}" class="card-link">
                <div class="card text-center p-3">
                    <h5 class="card-title">☕ Products</h5>
                    <p class="fs-4 fw-bold">45 total</p>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('deliveries') }}" class="card-link">
                <div class="card text-center p-3">
                    <h5 class="card-title">🚚 Deliveries</h5>
                    <p class="fs-4 fw-bold">5 pending</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Charts -->
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card p-3">
                <h5 class="card-title">📊 Weekly Revenue</h5>
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h5 class="card-title">🥇 Best Sellers</h5>
                <canvas id="bestSellersChart"></canvas>
            </div>
        </div>
    </div>

</div>

<!-- Footer -->
<footer class="text-center py-3 mt-4">
    &copy; {{ date('Y') }} Coffee-Ko. All rights reserved.
</footer>

<script>
    // Line Chart (Weekly Revenue)
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Revenue (₱)',
                data: [1200, 1500, 800, 1700, 2000, 2200, 1800],
                borderColor: '#6f4e37',
                backgroundColor: 'rgba(111, 78, 55, 0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });

    // Pie Chart (Best Sellers)
    const bestSellersCtx = document.getElementById('bestSellersChart').getContext('2d');
    new Chart(bestSellersCtx, {
        type: 'pie',
        data: {
            labels: ['Latte', 'Cappuccino', 'Americano', 'Mocha'],
            datasets: [{
                data: [40, 25, 20, 15],
                backgroundColor: ['#a9745b', '#d4a373', '#6f4e37', '#c08552']
            }]
        }
    });
</script>

</body>
</html>
