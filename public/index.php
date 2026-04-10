<?php
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stationery CMS - Modern App</title>
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
            background-color: #1e293b; /* Xanh đen */
            padding: 15px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .header-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo-icon {
            width: 35px;
            height: 35px;
            background-color: #38bdf8; /* Xanh dương sáng */
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1e293b;
            font-size: 1.2rem;
            font-weight: 800;
        }

        .app-header h1 {
            font-size: 1.2rem;
            font-weight: 800;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
        }
        .admin-profile {
            /* kích thước phông chữ */
            font-size: 1.0rem;
            color: #ffffff;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px; 
        }

        .hero-banner {
            position: relative;
            background: linear-gradient(rgba(30, 41, 59, 0.7), rgba(30, 41, 59, 0.9)), 
                        url('images/trangchu.jpg') no-repeat center center/cover;
            padding: 80px 40px;
            color: white;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        .welcome-text {
            font-size: 3.5rem; 
            font-weight: 800;
            margin-bottom: 10px;
            color: #ffffff;
            letter-spacing: -2px;
            text-transform: uppercase;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        }

        .hero-banner p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
            font-weight: 400;
        }

        .app-body {
            flex: 1;
            padding: 60px 40px;
        }

        .function-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .function-card {
            background: #f8fafc; 
            padding: 20px;
            border-radius: 16px;
            text-decoration: none;
            color: #333;
            border: 1px solid #eee;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 20px;
            height: 100%;
        }

        .function-card:hover {
            background-color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border-color: #38bdf8;
        }

        .card-content-wrapper {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
            width: 100%;
        }

        .card-icon {
            font-size: 2rem;
            color: #0d6efd;
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border: 1px solid #eee;
        }

        .card-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 4px;
            color: #111;
        }

        .card-desc {
            font-size: 0.8rem;
            color: #777;
            margin-bottom: 0;
            line-height: 1.4;
        }
    </style>
</head>
<body>

    <div class="app-container">
        
        <div class="app-header">
            <div class="header-logo">
                <div class="logo-icon">S</div> <h1>Mini Stationery Store App</h1>
            </div>
            <div class="admin-profile">
                <i class="bi bi-person-circle me-1"></i> Admin
            </div>
        </div>

        <div class="hero-banner">
            <h2 class="welcome-text">Welcome to!</h2>
            <p>Hệ thống quản lý kho hàng văn phòng phẩm chuyên nghiệp.</p>
        </div>

        <div class="app-body">
            <div class="function-grid">
                <a href="items.php" class="function-card">
                    <div class="card-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="card-content-wrapper"> 
                        <h3 class="card-title">Inventory Management</h3>
                        <p class="card-desc">Xem, lọc và thống kê toàn bộ sản phẩm văn phòng phẩm.</p>
                    </div>
                </a>

                <a href="reports.php" class="function-card">
                    <div class="card-icon" style="color: #198754;">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>
                    <div class="card-content-wrapper">
                        <h3 class="card-title">Reports & Analytics</h3>
                        <p class="card-desc">Xem biểu đồ thống kê danh sách sản phẩm.</p>
                    </div>
                </a>
                
                <a href="#" class="function-card">
                    <div class="card-icon" style="color: #6c757d;">
                        <i class="bi bi-gear"></i>
                    </div>
                    <div class="card-content-wrapper">
                        <h3 class="card-title">System Settings</h3>
                        <p class="card-desc">Cài đặt hệ thống, người dùng.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>
</html>