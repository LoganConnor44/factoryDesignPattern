from .AbstractAnimalFactory import AbstractAnimalFactory
from products.Magikarp import Magikarp

class FishFactory(AbstractAnimalFactory) :
    """
    Implement the operations to create concrete product objects.
    """

    def __init__(self) :
        super().__init__()
        self.fishDefinitions = self.allDefinitions['fish']

    def CreateMagikarp(self) :
        magi = Magikarp()
        magi.Setup()
        return Cat()

    def CreateAllKnownFish(self) :
        fishes = []
        try :
            for fish in self.fishDefinitions.keys() :
                fi = globals()[fish]()
                fi.setup(self.fishDefinitions)
                fishes.append(fi)
        except :
            print("try again, stupid")

        return fishes