from .AbstractAnimalFactory import AbstractAnimalFactory
from products.Cat import Cat
from products.Dog import Dog

class AnimalFactory(AbstractAnimalFactory) :
    """
    Implement the operations to create concrete product objects.
    """

    def CreateCat(self):
        return Cat()

    def CreateDog(self):
        return Dog()