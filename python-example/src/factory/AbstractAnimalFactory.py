import abc
import json
import os
import sys

class AbstractAnimalFactory(metaclass=abc.ABCMeta) :
    """
    Declare an interface for operations that create abstract product
    objects.
    """

    def __init__(self) :
        pathOfMain = os.path.dirname(os.path.dirname(__file__))
        with open(pathOfMain + '/definitions/available-products.json') as definitions:
            self.allDefinitions = json.load(definitions)