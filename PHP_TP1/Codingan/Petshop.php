<?php

//Kita bikin klass dulu buat nyimpen variabel yang ada di database
class Petshop{
    //Disini kita inisialisasi variabel - variabel buat kotak-kotaknya
    private $ID;        // Buat inisialiasi kotak ID        Petshop
    private $name;      // Buat inisialisasi kotak nama     Petshop
    private $category;  // Buat inisialisasi kotak category Petshop
    private $price;     // Buat inisialisasi kotak price    Petshop
    private $foto;      // Buat inisialisasi kotka foto   Petshop

    //Disini kita setting construktor, buat inisialisasi nilai defaultnya (kosong)
    public function __construct(){
    }

    //Disini kita setting fungsi buat dapetin nilai ketika User melakukan Add_data
    public function Add_Data($ID, $name, $category, $price, $foto){
        $a = 0; 
        $flag = 0;
        while(($flag == 0) && ($a < count($_SESSION['DataShop']))){
            if($_SESSION['DataShop'][$a]['ID'] == $ID){
                $flag = 1;
                return 0;
            }
            $a++;
        }
        if($flag == 0){
            $target_foto = "Vault_Photo/" . basename($foto["name"]);
            move_uploaded_file($foto["temporary_name"], $target_foto);

            $_SESSION['DataShop'][] = [
                "ID" => $this->ID = $ID,                        // Inisialisasi buat kotak ID penampung baru
                "name" => $this->name = $name,                  // Inisialisasi buat kotak nama penampung baru
                "category" => $this->category = $category,      // Inisialisasi buat kotak category penampung baru
                "price" => $this->price = $price,               // Inisialisasi buat kotak price penampung baru
                "foto" => $this->foto = $target_foto            // Inisialisasi buat kotak foto penampung baru
            ];
        } 
    }

    //Disini kita setting fungsi buat dapetin nilai ketika User melakukan Edit_Data
    public function changeData($Lock, $ID, $name, $category, $price, $foto) {
        $a = 0;
        $flag = 0;
        while (($flag == 0) && ($a < count($_SESSION['DataShop']))) {
            if ($_SESSION['DataShop'][$a]['id'] == $ID) {
                if ($a != $Lock) {
                    $flag = 1;
                    return 0;
                } else {
                    $flag = 0;
                }
            }
            $a++;
        }
        if ($flag == 0) {
            $target_foto = "Vault_Photo/" . basename($foto["name"]);
            move_uploaded_file($foto["temporary_name"], $target_foto);

            $_SESSION['DataShop'][$Lock] = [
                "id" => $this->ID = $ID,
                "name" => $this->name = $name,
                "category" => $this->category = $category,
                "price" => $this->price = $price,
                "foto" => $this->foto = $target_foto 
            ];
            return 1;
        }
    }

    //Lalu kita bikin function buat Getter ID-nya
    public function Getter_ID(){
        return $this->ID;
    }

    //Lalu kita bikin function buat Getter Nama-nya
    public function Getter_name(){
        return $this->name;
    }

    //Lalu kita bikin function buat Getter category-nya
    public function Getter_category(){
        return $this->category;
    }

    //Lalu kita bikin function buat Getter price-nya
    public function Getter_price(){
        return $this->price;
    }

    //Dan yang terakhir, kita bikin function buat Getter Foto-nya
    public function Getter_foto(){
        $target_foto = "Vault_Photo/" . basename($this->foto["name"]);
        move_uploaded_file($this->foto["temporary_name"], $target_foto);
        return $target_foto;
    }
}
?>