import abc

class AbstractAnimalFactory(metaclass=abc.ABCMeta) :
    """
    Declare an interface for operations that create abstract product
    objects.
    """

    @abc.abstractmethod
    def CreateCat(self):
        pass

    @abc.abstractmethod
    def CreateDog(self):
        pass