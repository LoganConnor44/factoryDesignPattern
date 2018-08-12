from .AbstractAnimalFactory import AbstractAnimalFactory
from products.Cat import Cat
from products.Dog import Dog

class MammalFactory(AbstractAnimalFactory) :
    """
    Implement the operations to create concrete product objects.
    """
    def __init__(self) :
        super().__init__()
        self.mammalDefinitions = self.allDefinitions['mammal']

    def CreateCat(self) :
        cat = Cat()
        cat.setup(self.mammalDefinitions)
        return cat

    def CreateDog(self) :
        dog = Dog()
        dog.setup(self.mammalDefinitions)
        return dog

    def CreateAllKnownMammals(self) :
        mammals = []
        try :
            for mammal in self.mammalDefinitions.keys() :
                mam = globals()[mammal]()
                mam.setup(self.mammalDefinitions)
                mammals.append(mam)
        except :
            print("try again, stupid")

        return mammals