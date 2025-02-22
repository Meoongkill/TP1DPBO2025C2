from Petshop import Petshop

def main():
    AcinMiau = [None] * 101  # Array untuk menyimpan data Petshop
    hit_Petshop = 0  # Jumlah barang di Database

    while True:
        print("\n||||||||||||||||| Selamat Datang Admin Acin Miau Petshoppp!!!!|||||||||||||||||")
        print("|||||||||||||||||  Hari Ini kamu mau nambah data apa nih????  |||||||||||||||||\n")
        print("||||||||||||||||                Python Edition                 ||||||||||||||||\n")
        print("[1] Mau Print data yang ada di database                            'Menampilkan'")
        print("[2] Mau Add data baru, yang belum ada di database                  'Menambahkan'")
        print("[3] Mau Edit data, yang udah ada di database sebelumnya            'Mengubah'")
        print("[4] Mau Delete data, yang udah ada di database sebelumnya          'Menghapus'")
        print("[5] Mau Searching data barang yang ada di database                 'Mencari'")
        print("[6] Mau Exit data, udah selesai ngotak-ngatik data                 'Keluar'")
        print("[7] About Us.")
        choose = int(input("Your Call : "))

        if choose == 6:
            print("\nHave A Nice Day~")
            print("goshujinsama~~~")
            print("ara-ara~~~")
            break

        if choose == 7:
            print("\nUntuk Tuhan, Bangsa, dan Alamamater")
            print("Database ini dibuat oleh anak Institut Tapi Berpinjol")
            print("A/N. Muhammad Fathan Putra dengan NIM (2300330)")
            print("Buat bikin Aplikasi Database Petshop Miau Acin")

        if choose == 1:
            print("\n>>>> Daftar Produk Acin Miau Petshoppp <<<<")
            if hit_Petshop == 0:
                print(">>> Database kosong - Tambahin dong >0< <<<")
                continue

            for count in range(hit_Petshop):
                print(f"ID Produk Acin Miau       : {AcinMiau[count].get_id()}")
                print(f"Nama Produk Acin Miau     : {AcinMiau[count].get_name()}")
                print(f"Category Produk Acin Miau : {AcinMiau[count].get_category()}")
                print(f"Price Produk Acin Miau    : Rp.{AcinMiau[count].get_price()}")
                print("############################################")

        elif choose == 2:
            if hit_Petshop >= 101:
                print("Nggak bisa nambah-nambah data lagi, udah Overload banh")
                continue

            print("\n>>> Silahkan tambahkan data, dengan format yang benar! <<<")
            ID = int(input("ID Produk Acin Miau       : "))
            name = input("Nama Produk Acin Miau     : ")
            category = input("Category Produk Acin Miau : ")
            price = int(input("Price Produk Acin Miau    : Rp."))

            AcinMiau[hit_Petshop] = Petshop()
            AcinMiau[hit_Petshop].set_data(ID, name, category, price)
            hit_Petshop += 1
            print(">>> Data Berhasil di tambahkan, kalau nggak Percaya, Tanya aja pak Haji - Dennis")

        elif choose == 3:
            ID = int(input("\n>>> Silahkan masukkan ID Produk Acin Miau yang mau di Edit <<<\nID produk yang mau kamu edit: "))
            found = False

            for count in range(hit_Petshop):
                if AcinMiau[count].get_id() == ID:
                    found = True
                    name = input("Nama Produk Baru     : ")
                    category = input("Category Produk Baru : ")
                    price = int(input("Price Produk Baru    : Rp."))

                    AcinMiau[count].set_data(ID, name, category, price)
                    print(">>> Data Berhasil di rubah, kalau nggak Percaya, Tanya aja pak Haji - Dennis")
                    break

            if not found:
                print(">>> Barang yang kamu cari nggak ada di Database kita. Balik sono ke menu <<<")

        elif choose == 4:
            ID = int(input("\n>>> Silahkan masukkan ID Produk Acin Miau yang mau di Hapus <<<\nID produk yang mau kamu hapus: "))
            found = False

            for count in range(hit_Petshop):
                if AcinMiau[count].get_id() == ID:
                    found = True
                    for doent in range(count, hit_Petshop - 1):
                        AcinMiau[doent] = AcinMiau[doent + 1]
                    hit_Petshop -= 1
                    print(">>> Data Berhasil di hapus, kalau nggak Percaya, Tanya aja pak Haji - Dennis")
                    break

            if not found:
                print(">>> Barang yang kamu cari nggak ada di Database kita. Balik sono ke menu <<<")

        elif choose == 5:
            name = input("\n>>> Silahkan masukkan Nama Produk Acin Miau yang pengen kamu Cari <<<\nNama produk yang mau kamu cari: ")
            found = False

            for count in range(hit_Petshop):
                if AcinMiau[count].get_name() == name:
                    if not found:
                        print("\n>>> Produk yang kamu cari Ternyata ada di Database kita <<<")
                        found = True
                    print(f"ID Produk Acin Miau       : {AcinMiau[count].get_id()}")
                    print(f"Nama Produk Acin Miau     : {AcinMiau[count].get_name()}")
                    print(f"Category Produk Acin Miau : {AcinMiau[count].get_category()}")
                    print(f"Price Produk Acin Miau    : Rp.{AcinMiau[count].get_price()}")
                    print("############################################")

            if not found:
                print("\n>>> Produk yang kamu cari tidak ditemukan di database kita <<<")

        else:
            print("\nInputan di Resctrict 1 2 3 4 5 6 7, selain itu bakalan error. Sono balik ke Menu")


if __name__ == "__main__":
    main()