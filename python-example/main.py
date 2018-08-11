from factory.AnimalFactory import AnimalFactory

"""
Provide an interface for creating families of related or dependent
objects without specifying their concrete classes.
"""
def main():
    Factory = AnimalFactory()
    Cat = Factory.CreateCat()
    Dog = Factory.CreateDog()
    Cat.Speak()
    Dog.Speak()


if __name__ == "__main__":
    main()