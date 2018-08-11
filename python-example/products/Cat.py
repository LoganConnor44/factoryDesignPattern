from .AbstractAnimal import AbstractAnimal

class Cat(AbstractAnimal):
    """
    Define a product object to be created by the corresponding concrete
    factory.
    Implement the AbstractProduct interface.
    """

    def Speak(self):
        print("meow")
        return