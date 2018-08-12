from .AbstractAnimal import AbstractAnimal

class Dog(AbstractAnimal):
    """
    Define a product object to be created by the corresponding concrete
    factory.
    Implement the AbstractProduct interface.
    """
    def setup(self, definition) :
        self.definition = definition['Dog']
        return

    def Speak(self) :
        return self.definition['speak']

    def Description(self) :
        return self.definition['description']

    def Attack(self) :
        return self.definition['attack']