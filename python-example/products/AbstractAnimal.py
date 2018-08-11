import abc

class AbstractAnimal(metaclass=abc.ABCMeta):
    """
    Declare an interface for a type of product object.
    """

    @abc.abstractmethod
    def Speak(self):
        pass