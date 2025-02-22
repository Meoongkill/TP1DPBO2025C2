<?php
session_start();

include('Petshop.php');

$access = new Petshop();

if(!isset($_SESSION['DataShop'])){
    $_SESSION['DataShop'] = [];
}

if(isset($_POST['Choosened'])){
    $_SESSION['choose'] = $_POST['choose'];
    unset($_SESSION['Cari_ID']);
}

if(isset($_POST['Cari'])){
    $_SESSION['Cari_ID'] = $_POST['Cari_ID'];
}

$choosened = $_SESSION['choose'] ?? "";
$Cari_ID = $_SESSION['Cari_ID'] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acin Miau Petshop</title>
    <style>
        table, th, td {
            border: 1px solid saddlebrown;
            padding: 8px;
            border-collapse: collapse;
        }
        center {
            margin: 20px;
        }
    </style>
</head>
<body>
    <center>
        <h1>Selamat Datang Admin Acin Miau Petshoppp!!!!</h1>
        <h2>Hari Ini kamu mau nambah data apa nih????</h2>
        <hr>
        <h3>
        [1] Mau Print data yang ada di database                            'Menampilkan'<br>
        [2] Mau Add data baru, yang belum ada di database                  'Menambahkan'<br>
        [3] Mau Edit data, yang udah ada di database sebelumnya            'Mengubah'<br>
        [4] Mau Delete data, yang udah ada di database sebelumnya          'Menghapus'<br>
        [5] Mau Searching data barang yang ada di database                 'Mencari'<br>
        [6] About Us.                                                      'Menginfokan'<br>
        [7] Mau Exit data, udah selesai ngotak-ngatik data                 'Meng-keluar'<br>
        </h3>
        <hr>
        <form action="" method="post">
            Your Call : <input type="text" name="choose" id="">
            <button type="submit" name="Choosened">Bet</button>
        </form>
    </center>

    <?php
    switch($choosened){
        case "1":
            ?>
            <center>
                <h1>Daftar Produk Acin Miau Petshoppp</h1>
                <hr><br>
                <table>
                    <tr>
                        <th>ID Produk Petshop</th>
                        <th>Nama Produk Petshop</th>
                        <th>Kategori Produk Petshop</th>
                        <th>Harga Produk Petshop</th>
                        <th>Gambar Produk Petshop</th>
                    </tr>
                    <?php
                    if(!empty($_SESSION['DataShop'])) {
                        foreach ($_SESSION['DataShop'] as $data) {
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($data['ID']) ?></td>
                                <td><?= htmlspecialchars($data['name']) ?></td>
                                <td><?= htmlspecialchars($data['category']) ?></td>
                                <td><?= htmlspecialchars($data['price']) ?></td>
                                <td><img src="<?= htmlspecialchars($data['foto']) ?>" alt="Product Image" width="200" height="200"></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </center>
            <?php
            break;

        case "2":
            ?>
            <center>
                <h1>Silahkan tambahkan data, dengan format yang benar!</h1>
                <hr><br>
                <form action="" method="post" enctype="multipart/form-data">
                    ID Produk Petshop : <input type="text" name="ID" required><br><br>
                    Nama Produk Petshop : <input type="text" name="name" required><br><br>
                    Kategori Produk Petshop : <input type="text" name="category" required><br><br>
                    Harga Produk Petshop : <input type="text" name="price" required><br><br>
                    Gambar Produk Petshop : <input type="file" name="foto" required><br><br>
                    <button type="submit" name="ADD">Input Data</button>
                </form>
                <?php
                if (isset($_POST['ADD'])) {
                    $ID = $_POST['ID'];
                    $name = $_POST['name'];
                    $category = $_POST['category'];
                    $price = $_POST['price'];
                    $foto = $_FILES['foto'];
                    $test = $access->Add_Data($ID, $name, $category, $price, $foto);
                    if ($test == 1) {
                        echo "<br>Data berhasil ditambahkan ke Database!";
                    } else {
                        echo "<br>WARNING: ID tersebut sudah ada dalam database.";
                    }
                }
                ?>
            </center>
            <?php
            break;

        case "3":
            ?>
            <center>
                <h1>Silahkan masukkan ID Produk Acin Miau yang mau di Edit</h1>
                <hr><br>
                <form action="" method="post">
                    Pilih ID yang ingin diubah : <input type="text" name="Cari_ID" id="">
                    <button type="submit" name="Cari">Searching</button>
                </form>

                <?php
                if (!empty($Cari_ID)) {
                    $found = false;
                    foreach ($_SESSION['DataShop'] as $index => $item) {
                        if ($item['ID'] == $Cari_ID) {
                            $found = true;
                            ?>
                            <br>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="index" value="<?= $index ?>">
                                ID Produk Petshop : <input type="text" name="ID" value="<?= htmlspecialchars($item['ID']) ?>" required><br><br>
                                Nama Produk Petshop : <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required><br><br>
                                Kategori Produk Petshop : <input type="text" name="category" value="<?= htmlspecialchars($item['category']) ?>" required><br><br>
                                Harga Produk Petshop : <input type="text" name="price" value="<?= htmlspecialchars($item['price']) ?>" required><br><br>
                                Gambar Produk Petshop : <input type="file" name="foto" required><br><br>
                                <button type="submit" name="COMMIT">Lakukan Perubahan</button>
                            </form>
                            <?php
                            
                            if (isset($_POST['COMMIT'])) {
                                $index = $_POST['index'];
                                $ID = $_POST['ID'];
                                $name = $_POST['name'];
                                $category = $_POST['category'];
                                $price = $_POST['price'];
                                $foto = $_FILES['foto'];
                                
                                $test = $access->changeData($index, $ID, $name, $category, $price, $foto);
                                if ($test == 1) {
                                    echo "<br>Data berhasil diubah!";
                                } else {
                                    echo "<br>WARNING: Gagal mengubah data atau ID sudah ada.";
                                }
                            }
                            break;
                        }
                    }
                    if (!$found) {
                        echo "<br>Data dengan ID tersebut tidak ditemukan.";
                    }
                }
                ?>
            </center>
            <?php
            break;

        case "4":
            ?>
            <center>
                <h1>Silahkan masukkan ID Produk Acin Miau yang mau di Hapus</h1>
                <hr><br>
                <form action="" method="post">
                    Pilih ID yang ingin dihapus : <input type="text" name="Cari_ID" id="">
                    <button type="submit" name="Cari">Searching</button>
                </form>

                <?php
                if (!empty($Cari_ID)) {
                    $found = false;
                    foreach ($_SESSION['DataShop'] as $index => $item) {
                        if ($item['ID'] == $Cari_ID) {
                            // Delete the image file if it exists
                            if (file_exists($item['foto'])) {
                                unlink($item['foto']);
                            }
                            // Remove the item from the session array
                            unset($_SESSION['DataShop'][$index]);
                            // Reindex the array
                            $_SESSION['DataShop'] = array_values($_SESSION['DataShop']);
                            echo "<br>Data berhasil dihapus!";
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        echo "<br>Data dengan ID tersebut tidak ditemukan.";
                    }
                }
                ?>
            </center>
            <?php
            break;

        case "5":
            ?>
            <center>
                <h1>Silahkan masukkan ID Produk Acin Miau yang pengen kamu Cari</h1>
                <hr><br>
                <form action="" method="post">
                    Pilih ID Produk yang ingin Dicari : <input type="text" name="Cari_ID" id="">
                    <button type="submit" name="Cari">Searching</button>
                </form>

                <?php
                if (!empty($Cari_ID)) {
                    $found = false;
                    foreach ($_SESSION['DataShop'] as $item) {
                        if ($item['ID'] == $Cari_ID) {
                            ?>
                            <br>
                            <table>
                                <tr>
                                    <th>ID Produk Petshop</th>
                                    <th>Nama Produk Petshop</th>
                                    <th>Kategori Produk Petshop</th>
                                    <th>Harga Produk Petshop</th>
                                    <th>Gambar Produk Petshop</th>
                                </tr>
                                <tr>
                                    <td><?= htmlspecialchars($item['ID']) ?></td>
                                    <td><?= htmlspecialchars($item['name']) ?></td>
                                    <td><?= htmlspecialchars($item['category']) ?></td>
                                    <td><?= htmlspecialchars($item['price']) ?></td>
                                    <td><img src="<?= htmlspecialchars($item['foto']) ?>" alt="Product Image" width="200" height="200"></td>
                                </tr>
                            </table>
                            <?php
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        echo "<br>Data dengan ID tersebut tidak ditemukan.";
                    }
                }
                ?>
            </center>
            <?php
            break;

        case "6":
            ?>
            <center>
                <h1>About Us - Acin Miau Petshop</h1>
                <hr><br>
                <div style="max-width: 800px; text-align: left; padding: 20px;">
                    <h2>Selamat datang di Acin Miau Petshop!</h2>
                    <p>Kami adalah toko perlengkapan hewan peliharaan yang berkomitmen untuk menyediakan produk berkualitas tinggi untuk teman berbulu Anda.</p>
                    <h3>Visi Kami:</h3>
                    <p>Menjadi petshop terpercaya yang mengutamakan kesejahteraan hewan peliharaan dan kepuasan pelanggan.</p>
                    <h3>Layanan Kami:</h3>
                    <ul>
                        <li>Makanan hewan berkualitas premium</li>
                        <li>Aksesori dan perlengkapan hewan</li>
                        <li>Produk perawatan dan kebersihan</li>
                        <li>Mainan dan kebutuhan hewan peliharaan lainnya</li>
                    </ul>
                </div>
            </center>
            <?php
            break;

        case "7":
            session_destroy();
            if (ini_get("session.use_cookies")) {
                setcookie(session_name(), '', time() - 42000, '/');
            }
            header("Location: main.php");
            exit();
            break;

        default:
            // If no valid option is selected, do nothing
            break;
    }
    ?>
</body>
</html>