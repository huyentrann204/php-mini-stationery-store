<?php
$items = require __DIR__ . '/../src/Data/items.php';
require __DIR__ . '/../src/Helpers/functions.php';

$totalItems = count($items);
$totalQuantity = getTotalQuantity($items);
$availableCount = count(getAvailableItems($items));
$available = 0;
$lowStock = 0;
$outOfStock = 0;

foreach ($items as $item) {
    $status = getStockStatus($item['quantity']);
    if ($status === 'Available') {
        $available++;
    } elseif ($status === 'Low stock') {
        $lowStock++;
    } else {
        $outOfStock++;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports & Analytics - Stationery CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .app-container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: white;
        }

        .app-header {
            background-color: #1e293b;
            padding: 15px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .header-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        
        .logo-icon {
            width: 35px; height: 35px;
            background-color: #38bdf8;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: #1e293b; font-size: 1.2rem; font-weight: 800;
        }

        .app-header h1 {
            font-size: 1.2rem; font-weight: 800; margin: 0;
            text-transform: uppercase; letter-spacing: 1px; color: white;
        }

        .admin-profile {
            font-size: 0.9rem; color: #ffffff; font-weight: 500;
            display: flex; align-items: center; gap: 8px;
        }

        .hero-banner-mini {
            background: linear-gradient(rgba(30, 41, 59, 0.8), rgba(30, 41, 59, 0.9)), 
                        url('images/trangchu.jpg') no-repeat center center/cover;
            padding: 40px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-back {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: 0.3s;
        }
        .btn-back:hover { background: rgba(255,255,255,0.2); color: white; }

        .app-body {
            flex: 1;
            padding: 40px;
        }

        .report-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #eee;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        }
    </style>
</head>
<body>

    <div class="app-container">
        <header class="app-header">
            <a href="index.php" class="header-logo">
                <div class="logo-icon">S</div>
                <h1>Mini Stationery Store App</h1>
            </a>
            <div class="admin-profile">
                <i class="bi bi-person-circle"></i> Admin
            </div>
        </header>

        <section class="hero-banner-mini">
            <div>
                <h2 class="fw-bold mb-1" style="letter-spacing: -1px;">Reports & Analytics</h2>
                <p class="mb-0 text-white-50 small">Dữ liệu thống kê kho hàng văn phòng phẩm.</p>
            </div>
            <a href="index.php" class="btn-back">
                <i class="bi bi-arrow-left me-2"></i> Quay lại trang chủ
            </a>
        </section>

        <main class="app-body">
            <div class="report-card">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h5 class="fw-bold mb-4 text-center">Tỷ lệ trạng thái sản phẩm</h5>
                        <div style="height: 350px;">
                            <canvas id="statusChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="ps-md-4 mt-4 mt-md-0">
                            <h6 class="fw-bold mb-3 text-uppercase small text-muted">Chi tiết trạng thái:</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                    <span><i class="bi bi-circle-fill me-2 text-success"></i>Còn hàng (Available)</span>
                                    <span class="fw-bold"><?= $available ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                    <span><i class="bi bi-circle-fill me-2 text-warning"></i>Sắp hết (Low stock)</span>
                                    <span class="fw-bold"><?= $lowStock ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                    <span><i class="bi bi-circle-fill me-2 text-danger"></i>Hết hàng (Out of stock)</span>
                                    <span class="fw-bold"><?= $outOfStock ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const ctx = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['An toàn', 'Sắp hết', 'Hết hàng'],
                datasets: [{
                    data: [<?= $available ?>, <?= $lowStock ?>, <?= $outOfStock ?>],
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                    borderWidth: 0,
                    hoverOffset: 20
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                cutout: '70%'
            }
        });
    </script>
</body>
</html>