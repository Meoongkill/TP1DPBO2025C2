class Petshop {
    private int ID;
    private String name;
    private String category;
    private int price;

    // Constructor default
    public Petshop() {
        this.ID = -1;
        this.name = "";
        this.category = "";
        this.price = 0;
    }

    // Constructor dengan parameter
    public Petshop(int ID, String name, String category, int price) {
        this.ID = ID;
        this.name = name;
        this.category = category;
        this.price = price;
    }

    // Setter untuk data baru
    public void setData(int NewID, String NewName, String NewCategory, int NewPrice) {
        this.ID = NewID;
        this.name = NewName;
        this.category = NewCategory;
        this.price = NewPrice;
    }

    // Getter untuk ID
    public int getID() {
        return this.ID;
    }

    // Getter untuk nama
    public String getName() {
        return this.name;
    }

    // Getter untuk kategori
    public String getCategory() {
        return this.category;
    }

    // Getter untuk harga
    public int getPrice() {
        return this.price;
    }
}