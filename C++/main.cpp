#include <iostream>
#include "Petshop.cpp"

using namespace std;

int main()
{
    // Pertama, kita deklarasikan variabel-variabel yang bakalan kita pake untuk mengerjakan permasalahan kali ini
    int choose;            // dekalrasi buat menu switch case
    int total;             // deklarasi buat total harga yang bakalan bertambah terus
    int flag = 0;          // deklarasi buat flag kalau ketemu variabel penghenti perulangan
    int ID;                // deklarasi kotak buat ID yang bakalan dimasukin user
    int price;             // dekalrasi kotak buat harga yang bakalan dimasukin user
    int count;             // deklarasi variabel yang bakalan dipake di perulangan tingkat 1
    int doent;             // dekalrasi variabel yang bakalan dipake di perulangan tingkat 2
    string name;           // deklarasi kotak buat nama yang bakalan dimasukin user
    string category;       // dekalrasi kotak buat kategori yang bakalan dimasukinn user
    Petshop AcinMiau[101]; // deklarasi array yang bakalan nampung data-data masukan user
    int hit_Petshop;       // deklarasi buat menghitung banyaknya barang yang udah dimasukin user di array Petshop
    bool found = false;    /// dekalrasi variabel boolean buat searching, apakah barang yang dicari ada atau nggak

    // Perulangan, selama masih valid inputannya (berupa angka)
    while (true)
    {
        cout << "\n||||||||||||||||| Selamat Datang Admin Acin Miau Petshoppp!!!!|||||||||||||||||" << endl; // print kata-kata ini
        cout << "|||||||||||||||||  Hari Ini kamu mau nambah data apa nih????  |||||||||||||||||" << endl;   // print kata-kata ini
        cout << "[1] Mau Print data yang ada di database                            'Menampilkan'" << endl;  // print kata-kata ini
        cout << "[2] Mau Add data baru, yang belum ada di database                  'Menambahkan'" << endl;  // print kata-kata ini
        cout << "[3] Mau Edit data, yang udah ada di database sebelumnya            'Mengubah'" << endl;     // print kata-kata ini
        cout << "[4] Mau Delete data, yang udah ada di database sebelumnya          'Menghapus'" << endl;    // print kata-kata ini
        cout << "[5] Mau Searching data barang yang ada di database                 'Mencari'" << endl;      // print kata-kata ini
        cout << "[6] Mau Exit data, udah selesai ngotak-ngatik data                 'Keluar'" << endl;       // print kata-kata ini
        cout << "[7] About Us." << endl;                                                                     // print kata-kata ini
        cout << "Your Call : ";                                                                              // print kata-kata ini
        cin >> choose;                                                                                       // ini buat inputan ke switch case

        // Jika User memilih Pilihan 7, bakalan mengakhiri tindakan
        if (choose == 6)
        {
            cout << "\nHave A Nice Day~" << endl; // print kata-kata ini
            cout << "goshujinsama~~~" << endl;    // print kata-kata ini
            cout << "ara-ara~~~" << endl;         // print kata-kata ini
            break;                                // biar perulangannya selesai
        }

        // Jika User memilih Pilihan 7, bakalan nampilin text yang mau kita tampilin
        if (choose == 7)
        {
            cout << "\nUntuk Tuhan, Bangsa, dan Alamamater" << endl;                 // print kata-kata ini
            cout << "Database ini dibuat oleh anak Institut Tapi Berpinjol" << endl; // print kata-kata ini
            cout << "A/N. Muhammad Fathan Putra dengan NIM (2300330)" << endl;       // print kata-kata ini
            cout << "Buat bikin Aplikasi Database Petshop Miau Acin" << endl;        // print kata-kata ini
        }

        // ini Perkondisian buat switchcase yang kita rujuk di awal
        switch (choose)
        {
        // Ini perkondisian kalau user mau menampilkan data (PRINT)
        case 1:
            cout << "\n>>>> Daftar Produk Acin Miau Petshoppp <<<<" << endl; // print kata-kata

            // Kalau datanya masih 0 (masih kosong)
            if (hit_Petshop == 0)
            {
                cout << ">>> Database kosong - Tambahin dong >0< <<<" << endl; // bakalan nampilin kata-kata kalau datanya kosong
                break;                                                         // biar perulangannya selesai
            }

            // Perulangan sebanyak banyaknya data yang udah ada di array awal
            for (count = 0; count < hit_Petshop; count++)
            {
                cout << "ID Produk Acin Miau       : " << AcinMiau[count].Getter_ID() << endl;       // buat dapetin + Print ID
                cout << "Nama Produk Acin Miau     : " << AcinMiau[count].Getter_name() << endl;     // buat dapetin + Print nama
                cout << "Category Produk Acin Miau : " << AcinMiau[count].Getter_category() << endl; // buat dapetin + Print kategori
                cout << "Price Produk Acin Miau    : Rp." << AcinMiau[count].Getter_price() << endl; // buat dapetin + Print harga
                cout << "############################################" << endl;                      // print simbol-simbol ini
            }
            break; // biar perulangannya selesai

        // Ini Perkondisian kalau user mau menambahkan data baru (ADD)
        case 2:
            // Kalau isi dari Array lebih dari yang kita setting
            if (hit_Petshop >= 101)
            {
                cout << "Nggak bisa nambah-nambah data lagi, udah Overload banh" << endl; // print kata-kata ini
                break;                                                                    // biar perulangannya selesai
            }

            // Tapi kalau belum mencapai batas yang kita setting
            cout << "\n>>> Silahkan tambahkan data, dengan format yang benar! <<<" << endl; // print kata-kata ini
            cout << "ID Produk Acin Miau       : ";                                         // print kata-kata ini
            cin >> ID;                                                                      // buat inputan ID yang User inginkan
            cin.ignore();                                                                   // buat mengabaikan inputan selain angka
            cout << "Nama Produk Acin Miau     : ";                                         // print kata-kata ini
            getline(cin, name);                                                             // buat inputan nama yang User inginkan
            cout << "Category Produk Acin Miau : ";                                         // print kata-kata ini
            getline(cin, category);                                                         // buat inputan kategori yang User inginkan
            cout << "Price Produk Acin Miau    : Rp.";                                      // print kata-kata ini
            cin >> price;                                                                   // buat inputan harga yang User inginkan

            AcinMiau[hit_Petshop].Setting_Data(ID, name, category, price);                                      // ini buat passing ke void Setting Data baru (menambahkan data)
            hit_Petshop++;                                                                                      // jumlah barang di Database bakalan nambah terus
            cout << ">>> Data Berhasil di tambahkan, kalau nggak Percaya, Tanya aja pak Haji - Dennis" << endl; // print kata-kata
            break;                                                                                              // biar perulangannya selesai

        // Ini Perkondisian kalau user mau mengubah data yang sudah ada (EDIT)
        case 3:
            cout << "\n>>> Silahkan masukkan ID Produk Acin Miau yang mau di Edit <<<" << endl; // print kata-kata ini
            cout << "ID produk yang mau kamu edit: ";                                           // print kata-kata ini
            cin >> ID;                                                                          // buat masukan ID yang user ingin ubah

            // Perulangan sebanyak data yang ada di Array
            for (count = 0; count < hit_Petshop; count++)
            {
                // kalau ID yang dicari sama kayak yang tersedia di array
                if (AcinMiau[count].Getter_ID() == ID)
                {
                    cin.ignore();                         // buat mengabaikan inputan selain angka
                    cout << "Nama Produk Baru     : ";    // buat print kata-kata ini
                    getline(cin, name);                   // buat inputan nama yang User inginkan
                    cout << "Category Produk Baru : ";    // buat print kata-kata ini
                    getline(cin, category);               // buat inputan kategori yang User inginkan
                    cout << "Price Produk Baru    : Rp."; // buat print kata-kata ini
                    cin >> price;                         // buat inputan harga yang User inginkan

                    AcinMiau[hit_Petshop].Setting_Data(ID, name, category, price);                                  // ini buat passing ke void Setting Data baru (menambahkan data)
                    cout << ">>> Data Berhasil di rubah, kalau nggak Percaya, Tanya aja pak Haji - Dennis" << endl; // print kata-kata
                    break;                                                                                          // biar perulangannya selesai
                }

                // Tapi kalau nggak nemu ID yang sesuai dengan yang diminta user
                if (count == hit_Petshop - 1)
                {
                    cout << ">>> Barang yang kamu cari nggak ada di Database kita. Balik sono ke menu <<<" << endl; // print kata-kata
                }
            }
            break; // biar perulangannya selesai

        // Ini Perkondisian kalau user mau menghapus data yang sudah ada (DELETE)
        case 4:
            cout << "\n>>> Silahkan masukkan ID Produk Acin Miau yang mau di Hapus <<<" << endl; // print kata-kata ini
            cout << "ID produk yang mau kamu hapus: ";                                           // print kata-kata ini
            cin >> ID;                                                                           // buat masukan ID yang user ingin hapus

            // Perulangan sebanyak data yang ada di Array
            for (count = 0; count < hit_Petshop; count++)
            {
                // Kalau ID yang dicari sama kayak yang tersedia di array
                if (AcinMiau[count].Getter_ID() == ID)
                {
                    // Perulangan sebanyak banyaknya variabel yang ada di 1 array
                    for (doent = 0; doent < hit_Petshop - 1; doent++)
                    {
                        // bakalan nge-geser datanya kesamping
                        AcinMiau[doent] = AcinMiau[doent + 1];
                    }
                    hit_Petshop--;                                                                                  // buat ngurangin jumlah banyaknya data yang ada di array
                    cout << ">>> Data Berhasil di hapus, kalau nggak Percaya, Tanya aja pak Haji - Dennis" << endl; // print kata-kata
                    break;                                                                                          // biar perulangannya selesai
                }

                // Tapi kalau nggak nemu ID yang sesuai dengan yang diminta user
                if (count == hit_Petshop - 1)
                {
                    cout << ">>> Barang yang kamu cari nggak ada di Database kita. Balik sono ke menu <<<" << endl; // print kata-kata
                }
            }
            break; // biar perulangannya selesai

        // Ini Perkondisian kalau user mau mencari data yang sudah ada (SEARCHING)
        case 5:
            cout << "\n>>> Silahkan masukkan Nama Produk Acin Miau yang pengen kamu Cari <<<" << endl; // print kata-kata ini
            cout << "Nama produk yang mau kamu cari: ";                                                // print kata-kata ini
            cin.ignore();                                                                              // buat mengabaikan inputan selain angka
            getline(cin, name);                                                                        // buat masukin nama yang user ingin cari

            // Perulangan sebanyak data yang ada di Array
            for (count = 0; count < hit_Petshop; count++)
            {
                // Kalau nama yang dicari sama kayak yang tersedia di array
                if (AcinMiau[count].Getter_name() == name)
                {
                    if (!found)
                    {
                        cout << "\n>>> Produk yang kamu cari Ternyata ada di Database kita <<<" << endl; // print kata-kata ini
                        found = true;                                                                    // terus kita setting variabel found ketemu
                    }
                    cout << "ID Produk Acin Miau       : " << AcinMiau[count].Getter_ID() << endl;       // buat dapetin + Print ID
                    cout << "Nama Produk Acin Miau     : " << AcinMiau[count].Getter_name() << endl;     // buat dapetin + Print nama
                    cout << "Category Produk Acin Miau : " << AcinMiau[count].Getter_category() << endl; // buat dapetin + Print kategori
                    cout << "Price Produk Acin Miau    : Rp." << AcinMiau[count].Getter_price() << endl; // buat dapetin + Print harga
                    cout << "############################################" << endl;                      // print simbol-simbol ini
                }
            }

            // Kalau ternyata nggak ketemu di array
            if (!found)
            {
                cout << "\n>>> Produk yang kamu cari tidak ditemukan di database kita <<<" << endl; // print kata-kata ini
            }
            break;

        // Kalau misalnya diluar switch case diatas, bakalan keluar ini kira-kira
        default:
            cout << "\nInputan di Resctrict 1 2 3 4 5 6 7, selain itu bakalan error. Sono balik ke Menu" << endl; // print kata-kata ini
            break;
        }
    }

    return 0;
}