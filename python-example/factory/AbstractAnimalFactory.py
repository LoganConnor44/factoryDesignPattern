import abc, json

class AbstractAnimalFactory(metaclass=abc.ABCMeta) :
    """
    Declare an interface for operations that create abstract product
    objects.
    """

    def __init__(self) :
        with open('./definitions/available-products.json') as definitions:
            self.allDefinitions = json.load(definitions)