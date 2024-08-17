<?php
session_start();

if(!$_SESSION['user']){
    header("Location:userindex.php");
    exit;
}

require 'functions.php';
$datas=show("SELECT * FROM comments");
$products=show("SELECT * FROM products");
$navigation=show("SELECT * FROM navgiation");
$images=show("SELECT * FROM images");
$image=end($images);


if(isset($_POST["konfirmsearch"])){
    $products=find($_POST["search"]);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>selamat datang</title>
</head>
<body>
    <header>
        <nav class="brand">
            <a href="index.php"><h1>Petshop</h1></a>
        </nav>
        <nav class="menu">
            <li><a href="admin.php">Tambah</a></li>
            <li><a href="editnavigasi.php">Edit Navigasi</a></li>
        </nav>

        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <section class="section">
        <div class="kiri">
            <?php
            $imo=$image['image'];
            $result=mysqli_query($conn, "SELECT * FROM images WHERE image = '$imo'");
                if(mysqli_num_rows($result) === 1){
                     imagepage($image['image']);
                     foreach($datas as $data){?>
                        <h1><?php echo $data["keyword"];?></h1>
                        <li><a href="update.php?id=<?php echo $data["id"];?>">Edit</a></li>
                        <li><a href="delete.php?id=<?php echo $data["id"];?>">Delete</a></li>
                        <?php
        
                    }
                } else {
                    foreach($datas as $data){?>
                        <h1 style="color: black;"><?php echo $data["keyword"];?></h1>
                        <?php
        
                    }

                    foreach($datas as $data){?>
                        <h1><?php echo $data["keyword"];?></h1>
                        <li><a href="update.php?id=<?php echo $data["id"];?>">Edit</a></li>
                        <li><a href="delete.php?id=<?php echo $data["id"];?>">Delete</a></li>
                        <?php
        
                    }
                }
            ?>
        <ul>
            <li><a href="#">Belanja Sekarang</a></li>
            <li><a href="#">Lainnya</a></li>
        </ul>
        </div>
        <div class="kanan">
        </div>
    </section>

    <section style="padding:15px;" class="main-2" id="beli">
        <h1>Ras Kucing</h1>
        <div class="products">
            <div class="form-search">
                <form action="" method="post">
                    <input type="text" name="search" placeholder="Cari Produk..." autocomplete="off">
                    <button type="submit" name="konfirmsearch">Cari</button>
                </form>
            </div>
            <?php foreach($products as $product) : ?>
            <div class="card-shop">
                <div class="thumbnail"><img src="img/<?php echo $product["image"];?>" alt=""></div>
                <a href="article.php?id=<?php echo $product['id'];?>&gambar=<?php echo $product["image"];?>&nama=<?php echo $product["nama"];?>&harga=<?php echo $product["harga"]?>"><?php echo $product["nama"];?></a>
                <p>Rp.<?php echo $product["harga"];?></p>
                <a href="editproduk.php?id=<?php echo $product["id"]?>" class="edit-button">edit</a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    
</body>
</html>