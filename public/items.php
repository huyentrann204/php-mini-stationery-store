<?php
$items = require __DIR__ . '/../src/Data/items.php';
require __DIR__ . '/../src/Helpers/functions.php';

$totalItems = count($items);
$totalQuantity = getTotalQuantity($items);
$availableItems = getAvailableItems($items);
$availableCount = count($availableItems);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management - Stationery CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    
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

        .app-body {
            flex: 1;
            padding: 40px;
        }

        .inventory-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #eee;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        }

        .table thead {
            background-color: #f8fafc;
        }

        .table th {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 700;
            color: #64748b;
            border: none;
            padding: 15px 20px;
        }

        .table td {
            padding: 18px 20px;
            vertical-align: middle;
            border-color: #f1f5f9;
        }

        /* Trạng thái */
        .status-pill {
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }
        .status-available { background: #dcfce7; color: #166534; }
        .status-low { background: #fef9c3; color: #854d0e; }
        .status-out { background: #fee2e2; color: #991b1b; }

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
                <h2 class="fw-bold mb-1" style="letter-spacing: -1px;">Inventory Management</h2>
                <p class="mb-0 text-white-50 small">Quản lý và theo dõi số lượng tồn kho sản phẩm.</p>
            </div>
            <a href="index.php" class="btn-back">
                <i class="bi bi-arrow-left me-2"></i> Quay lại trang chủ
            </a>
        </section>

        <main class="app-body">
            <div class="row g-4 mb-4 text-center">
                <div class="col-md-4">
                    <div class="p-3 border rounded-3 bg-light">
                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Tổng sản phẩm</small>
                        <div class="h4 fw-bold mb-0"><?= $totalItems ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border rounded-3 bg-light">
                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Tổng số lượng</small>
                        <div class="h4 fw-bold mb-0 text-primary"><?= $totalQuantity ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border rounded-3 bg-light">
                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Sẵn sàng bán</small>
                        <div class="h4 fw-bold mb-0 text-success"><?= $availableCount ?></div>
                    </div>
                </div>
            </div>

            <div class="inventory-card">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Thương hiệu</th>
                                <th class="text-end">Giá bán</th>
                                <th class="text-center">Số lượng</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item): 
                                $status = getStockStatus($item['quantity']);
                                $pillClass = match($status) {
                                    'Out of stock' => 'status-out',
                                    'Low stock' => 'status-low',
                                    default => 'status-available'
                                };
                            ?>
                            <tr>
                                <td>
                                    <div class="fw-bold"><?= mb_strtoupper($item['name'], 'UTF-8') ?></div>
                                    <small class="text-muted"><?= $item['category'] ?></small>
                                </td>
                                <td><?= $item['brand'] ?></td>
                                <td class="text-end fw-bold"><?= number_format($item['price']) ?> đ</td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border"><?= $item['quantity'] ?></span>
                                </td>
                                <td>
                                    <span class="status-pill <?= $pillClass ?>"><?= $status ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>