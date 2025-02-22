<?php
//Di bagian ini, kita include library Petshop dan Fungsi-fungsi yang bakalan dipake buat check variabel

//Kita include buat Library Petshopnya
include('Petshop.php');

//Kita bikin variabel, kalau harus add data baru
$DataBaru = new Petshop();

//Lalu kita gunakan fungsi isset, untuk mengecheck apakah variabel sudah dideklarasikan dan tidka memiliki nilai NULL
//Buat check, apakah pilihan 'Datashop' udah diisi atau belum
if(!isset($_SESSION['DataShop'])){
    $_SESSION['DataShop'] = [];
}

//Buat check, apakah pilihan 'Choose' udah diisi atau belum
if(isset($_POST['Choosened'])){
    $_SESSION['Choose'] = $_POST['choose'];
    unset($_SESSION['Cari_ID']);
}

//Buat check, apakah pilihan 'Cari_ID' udah diisi atau belum
if(isset($_POST['Cari'])){
    $_SESSION['Cari_ID'] = $_POST['Cari_ID'];
}

//Kita deklarasiin variabel yang dipake di Isset diatas
$Choosened = $_SESSION['choose'] ?? "";
$Cari_ID = $_SESSION['Cari_ID'] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acin Miau Petshop</title>
</head>
<style>
    table, th, td {
        border : 1px saddlebrown;
    }
</style>
<>
    <center>
        <h1>
        ||||||||||||||||| Selamat Datang Admin Acin Miau Petshoppp!!!!|||||||||||||||||
        </h1>
        <h2>
        |||||||||||||||||  Hari Ini kamu mau nambah data apa nih????  |||||||||||||||||
        </h2>
        ###############################################################################
        <h3>
        [1] Mau Print data yang ada di database                            'Menampilkan'
        [2] Mau Add data baru, yang belum ada di database                  'Menambahkan'
        [3] Mau Edit data, yang udah ada di database sebelumnya            'Mengubah'
        [4] Mau Delete data, yang udah ada di database sebelumnya          'Menghapus'
        [5] Mau Searching data barang yang ada di database                 'Mencari'
        [6] About Us.                                                      'Menginfokan'
        [7] Mau Exit data, udah selesai ngotak-ngatik data                 'Meng-keluar'
        </h3>
        ###############################################################################
        <form action="" method="post">
            Your Call : <input type="text" name="choose" id="">
            <button type="submit" name="choosened">Bet</button>
        </form>
    </center>

    <?php
        switch($choosened){
            case 1:
    ?>
    <center>

        <h1>>>>> Daftar Produk Acin Miau Petshoppp <<<<</h1>
        <hr> </br>
        <table>
            <tr>
                <th>ID Produk Petshop</th>
                <th>Nama Produk Petshop</th>
                <th>Kategori Produk Petshop</th>
                <th>Harga Produk Petshop</th>
                <th>Gambar Produk Petshop</th>
            </tr>
    <?php
        foreach ($_SESSION['DataShop'] as $data) {
    ?>
            <tr>
                <td><?= $data['ID'] ?></td>
                <td><?= $data['name'] ?></td>
                <td><?= $data['category'] ?></td>
                <td><?= $data['price'] ?></td>
                <td><img src="<?= $data['foto'] ?>" alt="" width="200" height="200"></td>
            </tr>
    <?php
        }
        break;
    ?>
        </table>
    <?php
        case 2:
    ?>
        <h1>>>> Silahkan tambahkan data, dengan format yang benar! <<<</h1>
        <hr> </br>
        <form action="" method="post" enctype="multipart/form-data">
            ID Produk Petshop       : <input type="text" name="ID" id="" required> </br> </br>
            Nama Produk Petshop     : <input type="text" name="name" id="" required> </br> </br>
            Kategori Produk Petshop : <input type="text" name="category" id="" required> </br> </br>
            Harga Produk Petshop    : <input type="text" name="price" id="" required> </br> </br>
            Gambar Produk Petshop   : <input type="file" name="foto" id=""> </br> </br>
            <button type="submit" name="ADD">Input Data</button>
        </form>
    <?php
        if (isset($_POST['ADD'])) {
            $ID = $_POST['ID'] ?? "";
            $name = $_POST['name'] ?? "";
            $category = $_POST['category'] ?? "";
            $price = $_POST['price'] ?? "";
            $foto = $_FILES['foto'] ?? "";
            $test = $access->Add_Data($ID, $name, $category, $price, $foto);
            if ($test == 1) {
                echo "</br>" . "Data berhasil ditambahkan ke Database, kalau nggak percaya. tanya aja pak haji - Dennis";
            } else {
                echo "</br>" . "WARNING : Data yang dimasukkan ID-nya sama.";
            }
        }
        break;
            
        case 3:
    ?>
        <h1>>>> Silahkan masukkan ID Produk Acin Miau yang mau di Edit <<<</h1>
        <hr> </br>
        <form action="" method="post">
            Pilih ID yang ingin diubah : <input type="text" name="Cari_ID" id="">
            <button type="submit" name="Cari">Searching</button>
        </form>
    <?php
        $a = 0;
        $flag = 0;
        $Error = 0;
        while (($flag == 0) && ($a < count($_SESSION['DataShop']))) {
            if ($_SESSION['DataShop'][$a]['ID'] == $Cari_ID) {    
    ?>
        </br>
        <form action="" method="post" enctype="multipart/form-data">
            ID Produk Petshop           : <input type="text" name="ID" id="" required> </br> </br>
            Nama Produk Petshop         : <input type="text" name="name" id="" required> </br> </br>
            Kategori Produk Petshop     : <input type="text" name="category" id="" required> </br> </br>
            Harga Produk Petshop        : <input type="text" name="price" id="" required> </br> </br>
            Gambar Produk Petshop       : <input type="file" name="foto" id=""> </br> </br>
            <button type="submit" name="COMMIT">Lakukan Perubahan</button>
        </form>  
    <?php
            if (isset($_POST['commit'])) {
                $ID = $_POST['ID'] ?? "";
                $name = $_POST['name'] ?? "";
                $category = $_POST['category'] ?? "";
                $price = $_POST['price'] ?? "";
                $foto = $_FILES['foto'] ?? "";
                $test = $access->changeData($i, $id, $name, $category, $price, $foto);
                    if ($test == 1) {
                        echo "</br>" . "Data berhasil ditambahkan ke Database, kalau nggak percaya. tanya aja pak haji - Dennis";
                    } else {
                        echo "</br>" . "WARNING : Data yang dimasukkan ID-nya sama.";
                    }
                }
                $flag = 1;
            }
            $a++;
        }

        if (($flag == 0) && ($Cari_ID != "")) {
            $Error = 1;
        }

        if ($Error == 1) {
            echo "Data Tidak Ada!";
        }
        break;
            
        case 4:
    ?>
        <h1>>>> Silahkan masukkan ID Produk Acin Miau yang mau di Hapus <<<</h1>
        <hr> </br>
        <form action="" method="post">
            Pilih ID yang ingin dihapus : <input type="text" name="Cari_ID" id="">
            <button type="submit" name="Cari">Searching</button>
        </form>
    <?php
        $a = 0;
        $flag = 0;
        $Error = 0;
        while (($flag == 0) && ($a < count($_SESSION['DataShop']))) {
            if ($_SESSION['DataShop'][$a]['ID'] == $Cari_ID) {
                unset($_SESSION['DataShop'][$a]);
                echo ">>> Data Berhasil di hapus, kalau nggak Percaya, Tanya aja pak Haji - Dennis";
                $flag = 1;
            }
            $a++;
        }

        if (($flag == 0) && ($Cari_ID != "")) {
            $Error = 1;
        }

        if ($Error == 1) {
            echo ">>> Barang yang kamu cari nggak ada di Database kita. Balik sono ke menu <<<";
        }
        break;
                    
        case 5:
    ?>
        <h1>>>> Silahkan masukkan Nama Produk Acin Miau yang pengen kamu Cari <<<</h1>
        <hr> </br>
        <form action="" method="post">
            Pilih ID Produk yang ingin Dicari : <input type="text" name="Cari_ID" id="">
            <button type="submit" name="Cari">Searching</button>
        </form>
    <?php
        $a = 0;
        $flag = 0;
        $Error = 0;
        while (($flag == 0) && ($a < count($_SESSION['DataShop']))) {
            if ($_SESSION['DataShop'][$a]['ID'] == $searchID) {
    ?>
        <center>
        <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Gambar</th>
        </tr>
        <tr>
            <td><?= $_SESSION['DataShop'][$i]['id'] ?></td>
            <td><?= $_SESSION['DataShop'][$i]['namaProduk'] ?></td>
            <td><?= $_SESSION['DataShop'][$i]['kategori'] ?></td>
            <td><?= $_SESSION['DataShop'][$i]['harga'] ?></td>
            <td><img src="<?= $_SESSION['DataShop'][$a]['foto'] ?>" alt="" width="200" height="200"></td>
        </tr>
        </center>
    <?php
                    echo ">>> Produk yang kamu cari Ternyata ada di Database kita <<<";
                    $flag = 1;
                }
            $a++;
            }

            if (($flag == 0) && ($Cari_ID != "")) {
                $Error = 1;
            }

            if ($Error == 1) {
                echo ">>> Produk yang kamu cari tidak ditemukan di database kita <<<";
            }
            break;
                    
            case 0:
                session_destroy();
                
                if (ini_get("session.use_cookies")) {
                    setcookie(session_name(), '', time() - 42000, '/'); // Hapus cookie session
                }
                        
                header("Location: main.php"); // Redirect ke halaman utama
                exit();
            break;
        }
    ?>
    </center>
</body>
</html>