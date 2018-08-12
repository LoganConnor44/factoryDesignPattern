from factory.MammalFactory import MammalFactory
from factory.FishFactory import FishFactory

"""
Provide an interface for creating families of related or dependent
objects without specifying their concrete classes.
"""
def main():

    print()

    mammalFactory = MammalFactory()
    fishFactory = FishFactory()

    Mammals = mammalFactory.CreateAllKnownMammals()
    Fishes = fishFactory.CreateAllKnownFish()

    #merge the lists rather than creating one parent and two children
    allCreatures = Mammals + Fishes

    for creature in allCreatures :
        print("Animal Name: {}" . format(creature.__class__.__name__))
        print("Description: {}" . format(creature.Description()))
        print("This animal says: {}" . format(creature.Speak()))
        print("Attack: {}" . format(creature.Attack()))
        print()

    # Client can also create animals individually
    Cat = mammalFactory.CreateCat()
    Dog = mammalFactory.CreateDog()
    Cat.Speak()
    Dog.Speak()


if __name__ == "__main__":
    main()