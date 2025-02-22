class Petshop:
    def __init__(self, ID=-1, name="", category="", price=0):
        self.ID = ID
        self.name = name
        self.category = category
        self.price = price

    def set_data(self, NewID, NewName, NewCategory, NewPrice):
        self.ID = NewID
        self.name = NewName
        self.category = NewCategory
        self.price = NewPrice

    def get_id(self):
        return self.ID

    def get_name(self):
        return self.name

    def get_category(self):
        return self.category

    def get_price(self):
        return self.price