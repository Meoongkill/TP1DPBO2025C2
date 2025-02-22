<?php
class Petshop {
    private $ID;
    private $name;
    private $category;
    private $price;
    private $foto;

    public function __construct() {
        // Empty constructor
    }

    public function Add_Data($ID, $name, $category, $price, $foto) {
        // Check if ID already exists
        foreach ($_SESSION['DataShop'] as $item) {
            if ($item['ID'] == $ID) {
                return 0; // ID already exists
            }
        }

        // Handle file upload
        $upload_dir = "Vault_Photo/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $target_foto = $upload_dir . basename($foto["name"]);
        if (move_uploaded_file($foto["tmp_name"], $target_foto)) {
            $_SESSION['DataShop'][] = [
                "ID" => $ID,
                "name" => $name,
                "category" => $category,
                "price" => $price,
                "foto" => $target_foto
            ];
            return 1; // Success
        }
        return 0; // Failed to upload file
    }

    public function changeData($Lock, $ID, $name, $category, $price, $foto) {
        // Check if new ID already exists (except for current record)
        foreach ($_SESSION['DataShop'] as $index => $item) {
            if ($item['ID'] == $ID && $index != $Lock) {
                return 0; // ID already exists in another record
            }
        }

        // Handle file upload
        $upload_dir = "Vault_Photo/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $target_foto = $upload_dir . basename($foto["name"]);
        if (move_uploaded_file($foto["tmp_name"], $target_foto)) {
            $_SESSION['DataShop'][$Lock] = [
                "ID" => $ID,
                "name" => $name,
                "category" => $category,
                "price" => $price,
                "foto" => $target_foto
            ];
            return 1; // Success
        }
        return 0; // Failed to upload file
    }

    // Getter methods
    public function Getter_ID() {
        return $this->ID;
    }

    public function Getter_name() {
        return $this->name;
    }

    public function Getter_category() {
        return $this->category;
    }

    public function Getter_price() {
        return $this->price;
    }

    public function Getter_foto() {
        return $this->foto;
    }
}
?>