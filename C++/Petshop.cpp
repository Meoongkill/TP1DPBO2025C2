#include <iostream>
#include <string>

using namespace std;

// Kita bikin kelas, namanya PetShop
class Petshop
{

private:
    // Di bagian ini, anggap aja kita mendeklarasikan (Decalarator) variabel - variabel yang bakalan kita pake di soal kali ini
    int ID;
    string name;
    string category;
    int price;

public:
    // Di bagian ini, kita setting Constructor awal buat Petshopnya
    Petshop()
    {
        this->ID = -1;
        this->name = "";
        this->category = "";
        this->price = 0;
    }

    // Terus dibagian ini, kita setting buat Construktor lanjutan buat Petshopnya
    Petshop(int ID, string name, string category, int price)
    {
        this->ID = ID;
        this->name = name;
        this->category = category;
        this->price = price;
    }

    // Terus dibagian ini, kita setting buat Construktor kalau ada data baru di Petshopnya
    void Setting_Data(int NewID, string NewName, string NewCategory, int NewPrice)
    {
        this->ID = NewID;
        this->name = NewName;
        this->category = NewCategory;
        this->price = NewPrice;
    }

    // Di bagian ini, kita setting Accessor (Buat Mengakses data-data di Construktor + Declarator diatas)
    //  Getter buat ID
    int Getter_ID()
    {
        return this->ID;
    }

    // Setter buat ID
    void Setter_ID()
    {
        this->ID = ID;
    }

    // Getter buat nama
    string Getter_name()
    {
        return this->name;
    }

    // Setter buat nama
    void Setter_name()
    {
        this->name = name;
    }

    // Getter buat kategori
    string Getter_category()
    {
        return this->category;
    }

    // Setter buat kategori
    void Setter_category()
    {
        this->category = category;
    }

    // Getter buat harga
    int Getter_price()
    {
        return this->price;
    }

    // Setter buat harga
    void Setter_price()
    {
        this->price = price;
    }

    // Di bagian ini, kita setting buat Destructor nya
    ~Petshop()
    {
    }
};