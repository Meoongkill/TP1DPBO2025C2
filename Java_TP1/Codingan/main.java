import java.util.Scanner;
import java.util.LinkedList;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Petshop[] AcinMiau = new Petshop[101];
        int hit_Petshop = 0; // jumlah barang di Database
        boolean found;

        while (true) {
            System.out.println("\n||||||||||||||||| Selamat Datang Admin Acin Miau Petshoppp!!!!|||||||||||||||||");
            System.out.println("|||||||||||||||||  Hari Ini kamu mau nambah data apa nih????  |||||||||||||||||\n");
            System.out.println("|||||||||||||||||                Java Edition                 |||||||||||||||||\n");
            System.out.println("[1] Mau Print data yang ada di database                            'Menampilkan'");
            System.out.println("[2] Mau Add data baru, yang belum ada di database                  'Menambahkan'");
            System.out.println("[3] Mau Edit data, yang udah ada di database sebelumnya            'Mengubah'");
            System.out.println("[4] Mau Delete data, yang udah ada di database sebelumnya          'Menghapus'");
            System.out.println("[5] Mau Searching data barang yang ada di database                 'Mencari'");
            System.out.println("[6] Mau Exit data, udah selesai ngotak-ngatik data                 'Keluar'");
            System.out.println("[7] About Us.");
            System.out.print("Your Call : ");
            int choose = scanner.nextInt();
            scanner.nextLine(); // mengabaikan newline

            if (choose == 6) {
                System.out.println("\nHave A Nice Day~");
                System.out.println("goshujinsama~~~");
                System.out.println("ara-ara~~~");
                break;
            }

            if (choose == 7) {
                System.out.println("\nUntuk Tuhan, Bangsa, dan Alamamater");
                System.out.println("Database ini dibuat oleh anak Institut Tapi Berpinjol");
                System.out.println("A/N. Muhammad Fathan Putra dengan NIM (2300330)");
                System.out.println("Buat bikin Aplikasi Database Petshop Miau Acin");
            }

            switch (choose) {
                case 1:
                    System.out.println("\n>>>> Daftar Produk Acin Miau Petshoppp <<<<");
                    if (hit_Petshop == 0) {
                        System.out.println(">>> Database kosong - Tambahin dong >0< <<<");
                        break;
                    }
                    for (int count = 0; count < hit_Petshop; count++) {
                        System.out.println("ID Produk Acin Miau       : " + AcinMiau[count].getID());
                        System.out.println("Nama Produk Acin Miau     : " + AcinMiau[count].getName());
                        System.out.println("Category Produk Acin Miau : " + AcinMiau[count].getCategory());
                        System.out.println("Price Produk Acin Miau    : Rp." + AcinMiau[count].getPrice());
                        System.out.println("############################################");
                    }
                    break;

                case 2:
                    if (hit_Petshop >= 101) {
                        System.out.println("Nggak bisa nambah-nambah data lagi, udah Overload banh");
                        break;
                    }
                    System.out.println("\n>>> Silahkan tambahkan data, dengan format yang benar! <<<");
                    System.out.print("ID Produk Acin Miau       : ");
                    int ID = scanner.nextInt();
                    scanner.nextLine(); // mengabaikan newline
                    System.out.print("Nama Produk Acin Miau     : ");
                    String name = scanner.nextLine();
                    System.out.print("Category Produk Acin Miau : ");
                    String category = scanner.nextLine();
                    System.out.print("Price Produk Acin Miau    : Rp.");
                    int price = scanner.nextInt();

                    AcinMiau[hit_Petshop] = new Petshop();
                    AcinMiau[hit_Petshop].setData(ID, name, category, price);
                    hit_Petshop++;
                    System.out.println(">>> Data Berhasil di tambahkan, kalau nggak Percaya, Tanya aja pak Haji - Dennis");
                    break;

                case 3:
                    System.out.println("\n>>> Silahkan masukkan ID Produk Acin Miau yang mau di Edit <<<");
                    System.out.print("ID produk yang mau kamu edit: ");
                    ID = scanner.nextInt();
                    found = false;

                    for (int count = 0; count < hit_Petshop; count++) {
                        if (AcinMiau[count].getID() == ID) {
                            found = true;
                            System.out.print("Nama Produk Baru     : ");
                            name = scanner.next();
                            System.out.print("Category Produk Baru : ");
                            category = scanner.next();
                            System.out.print("Price Produk Baru    : Rp.");
                            price = scanner.nextInt();

                            AcinMiau[count].setData(ID, name, category, price);
                            System.out.println(">>> Data Berhasil di rubah, kalau nggak Percaya, Tanya aja pak Haji - Dennis");
                            break;
                        }
                    }
                    if (!found) {
                        System.out.println(">>> Barang yang kamu cari nggak ada di Database kita. Balik sono ke menu <<<");
                    }
                    break;

                case 4:
                    System.out.println("\n>>> Silahkan masukkan ID Produk Acin Miau yang mau di Hapus <<<");
                    System.out.print("ID produk yang mau kamu hapus: ");
                    ID = scanner.nextInt();
                    found = false;

                    for (int count = 0; count < hit_Petshop; count++) {
                        if (AcinMiau[count].getID() == ID) {
                            found = true;
                            for (int doent = count; doent < hit_Petshop - 1; doent++) {
                                AcinMiau[doent] = AcinMiau[doent + 1];
                            }
                            hit_Petshop--;
                            System.out.println(">>> Data Berhasil di hapus, kalau nggak Percaya, Tanya aja pak Haji - Dennis");
                            break;
                        }
                    }
                    if (!found) {
                        System.out.println(">>> Barang yang kamu cari nggak ada di Database kita. Balik sono ke menu <<<");
                    }
                    break;

                case 5:
                    System.out.println("\n>>> Silahkan masukkan Nama Produk Acin Miau yang pengen kamu Cari <<<");
                    System.out.print("Nama produk yang mau kamu cari: ");
                    name = scanner.nextLine();
                    found = false;

                    for (int count = 0; count < hit_Petshop; count++) {
                        if (AcinMiau[count].getName().equals(name)) {
                            if (!found) {
                                System.out.println("\n>>> Produk yang kamu cari Ternyata ada di Database kita <<<");
                                found = true;
                            }
                            System.out.println("ID Produk Acin Miau       : " + AcinMiau[count].getID());
                            System.out.println("Nama Produk Acin Miau     : " + AcinMiau[count].getName());
                            System.out.println("Category Produk Acin Miau : " + AcinMiau[count].getCategory());
                            System.out.println("Price Produk Acin Miau    : Rp." + AcinMiau[count].getPrice());
                            System.out.println("############################################");
                        }
                    }
                    if (!found) {
                        System.out.println("\n>>> Produk yang kamu cari tidak ditemukan di database kita <<<");
                    }
                    break;

                default:
                    System.out.println("\nInputan di Resctrict 1 2 3 4 5 6 7, selain itu bakalan error. Sono balik ke Menu");
                    break;
            }
        }
        scanner.close();
    }
}