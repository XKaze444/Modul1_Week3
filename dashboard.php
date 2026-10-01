<?php
$product = [

[
"nama" => "Crinear Daybreak",
"kategori" => "IEM",
"harga" => 2999999,
"stok" => 5
],

[
"nama" => "IPhone 15",
"kategori" => "Ponsel",
"harga" => 12000000,
"stok" => 5
],

[
"nama" => "IPhone 11",
"kategori" => "Ponsel",
"harga" => 6000000,
"stok" => 0
],
[
"nama" => "SIMGOT EG280",
"kategori" => "IEM",
"harga" => 1300000,
"stok" => 2
],

[
"nama" => "IPhone 14",
"kategori" => "Ponsel",
"harga" => 10000000,
"stok" => 3
],

[
"nama" => "Samsung S26 Ultra",
"kategori" => "Ponsel",
"harga" => 20000000,
"stok" => 9
],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIA Store</title>
    <!-- 1. Import Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- 2. Script Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>

@theme {
    --font-sans: 'Poppins', sans-serif;
}

body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    min-height: 100vh;
}

.navbar {
    background-color: #111;
    color: white;
    padding: 18px 8%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 22px;
    font-weight: bold;
}

.logo img {
    width: 40px;
    height: 40px;
    border-radius: 60px;
}

.nav-menu {
    display: flex;
    gap: 25px;
}

.nav-menu a {
    color: white;
    text-decoration: none;
    font-weight: 700;
    padding-right: 30px;
}

.content {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
}

.cardd {
    background-color: black;
    padding: 30px;
    width: 970px;
    max-width: 100%;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
}

.cardd h1 {
    font-weight: 700;
    font-size: 30px;
    color: white;
    margin: 0;
    text-align:;
    margin-bottom:5px;
}

.cardd p{
    color:white;
}

.catalog-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    max-width: 1100px;
    margin: 0 auto 20px;
    padding: 0 20px;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px 40px;
}

.product-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 22px;
    transition: transform 0.2s ease;
}
.product-card:hover { transform: translateY(-5px); }

.category {
    font-size: 12px;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #6b7280;
}

.badge-discount {
    background: #fef3c7;
    color: #b45309;
    font-size: 11px;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 999px;
}

.product-name { font-size: 18px; font-weight: 600; margin: 6px 0; }

.price-old { font-size: 13px; color: #9ca3af; text-decoration: line-through; }
.price-now { font-size: 20px; font-weight: 700; color: #111; }

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #eee;
    margin-top: 14px;
    padding-top: 14px;
}

.status { font-size: 12px; font-weight: 600; padding: 3px 10px; border-radius: 999px; }
.status.ready { background: #dcfce7; color: #15803d; }
.status.empty { background: #fee2e2; color: #b91c1c; }

.buy-button {
    width: 100%;
    margin-top: 14px;
    padding: 11px;
    background: #111;
    color: #fff;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
}
.buy-button:hover { opacity: 0.85; }
.buy-button:disabled { background: #d1d5db; cursor: not-allowed; }

@media (max-width: 900px) { .product-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px) { .product-grid { grid-template-columns: 1fr; } }

.catalog-head h2{
    font-weight:600;
}
    </style>
</head>
<body>

    <nav class="navbar">

        <div class="logo">
            <img src="telyu.jpg" alt="logo">
        </div>

        <div class="nav-menu">
            <a href="dashboard.php">Home</a>
            <a href="produk.php">Product</a>
            <a href="contact.php">Contact Us</a>
            <a href="about.php">About Us</a>
        </div>

    </nav>

<div class="content">
<div class="cardd">
    <h1>Welcome to CIA Store</h1>
    <p>Temukan beberapa perangkat dan aksesoris teknologi</p>
</div>
</div>

<div class="catalog-head">
    <h2>Katalog Produk</h2>
</div>

<div class="product-grid">
    <?php foreach ($product as $item): ?>
        <?php 
        $harga_asli = $item['harga'];
        $ada_diskon = $harga_asli > 5000000;
        
     
        if ($ada_diskon) {
            $harga_diskon = $harga_asli * 0.90;
        } else {
            $harga_diskon = $harga_asli;
        }

        $status_stok = $item['stok'] > 0 ? 'ready' : 'empty';
        $teks_stok = $item['stok'] > 0 ? 'Tersedia' : 'Habis';
        ?>

        <article class="product-card">
            <div>
                <span class="category"><?= $item['kategori']; ?></span>
                <?php if ($ada_diskon): ?>
                    <span class="badge-discount">DISKON 10%</span>
                <?php endif; ?>
            </div>
            
            <h3 class="product-name"><?= $item['nama']; ?></h3>
            
       
            <?php if ($ada_diskon): ?>
                <div class="price-old">Rp<?= number_format($harga_asli, 0, ',', '.'); ?></div>
                <div class="price-now">Rp<?= number_format($harga_diskon, 0, ',', '.'); ?></div>
            <?php else: ?>
                <div class="price-now">Rp<?= number_format($harga_asli, 0, ',', '.'); ?></div>
            <?php endif; ?>

            <div class="card-footer">
                <span>Stok: <?= $item['stok']; ?></span>
                <span class="status <?= $status_stok; ?>"><?= $teks_stok; ?></span>
            </div>
            
            <button class="buy-button" <?= $item['stok'] == 0 ? 'disabled' : ''; ?>>
                <?= $item['stok'] > 0 ? 'Beli Sekarang' : 'Stok Habis'; ?>
            </button>
        </article>
    <?php endforeach; ?>
</div>


</body>
</html>