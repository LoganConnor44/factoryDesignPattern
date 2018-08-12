# Factory Design Pattern
This design pattern generates an instance for the client without exposing any instantiation logic.

## Why Use The Factory Method
* Allows the consumer to create new objects without having to know the details of their dependencies or how they're created. The consumer only needs to give a top level request of the object needed.

## Real-World Example
* You are purchasing furniture for a new home. Normally people do not create the furniture from scratch, but go to a store(factory) and purchase a product. This is the same concept. This pattern allows the client to request an object without being concerned with all the nails, lumber, or paint that may be involved.

# Various Languages

## PHP

### Directory Structure
```bash
├── definitions
│   └── factories.json
├── factories
│   ├── AbstractFactory.php
│   ├── FactoryProducer.php
│   ├── NonPolygonFactory.php
│   └── PolygonFactory.php
└── products
    ├── Circle.php
    ├── Ellipse.php
    ├── NonPolygon.php
    ├── Polygon.php
    ├── Rectangle.php
    ├── Shape.php
    ├── Square.php
    └── Triangle.php
```

### Code Examples

Attempting to create a triangle manually may look something like this:
```php
$Triangle = new Polygon(
    3,
    TRUE,
    FALSE,
    3,
    3
);
```

This demonstrates a concrete class, ```Polygon```, which can have various attributes and these attributes define the type of a polygon which will be created. This example assumes that ```Polygon``` has a constructor that takes arguments to designate the specific type. This is not bad practice, but is not easily readable if the codebase is new to the developer. This example is also very basic and most real-world applications will be more complex and rely on more than five attributes to define an object.

Another example may be an empty constructor and attributes will need to be defined later.

```php
$Triangle = new Polygon();
$Triangle->vertices = 3;
$Triangle->allSidesEqualLength = TRUE;
$Triangle->angles = 3
$Triangle->edges = 3;
```

The below code is an example of how to create various shapes *using* the **Abstract Factory Method**.
```php
$Factory = FactoryProducer::getFactoryForShape("triangle");
$Factory->setPropertiesOfShape($this->triangleAttributes);
$Triangle = $Factory->getShape();
```

### How To Run Unit Tests From CLI
* Install Composer (must have composer installed : [GetComposer](getcomposer.org))

```
composer install
```

* Execute PHPUnit

```
vendor/bin/phpunit
```

## Python

### Directory Structure
```bash
├── __init__.py
├── definitions
│   └── available-products.json
├── factory
│   ├── AbstractAnimalFactory.py
│   ├── FishFactory.py
│   ├── MammalFactory.py
│   └── __init__.py
├── main.py
└── products
    ├── AbstractAnimal.py
    ├── Cat.py
    ├── Dog.py
    ├── Magikarp.py
    └── __init__.py
```

### UML Diagram
[Click Here](http://htmlpreview.github.io/?https://github.com/LoganConnor44/factoryDesignPattern/blob/master/python-example/python-example.html)

### Code Examples

This example demonstrates how to create defined animals. The animals are defined in a definitions file, also shown below.

##### python-example/main.py
```python
mammalFactory = MammalFactory()
fishFactory = FishFactory()

Mammals = mammalFactory.CreateAllKnownMammals()
Fishes = fishFactory.CreateAllKnownFish()

# merge the lists
allCreatures = Mammals + Fishes

for creature in allCreatures :
    print("Animal Name: {}" . format(creature.__class__.__name__))
    print("Description: {}" . format(creature.Description()))
    print("This animal says: {}" . format(creature.Speak()))
    print("Attack: {}" . format(creature.Attack()))
    print()
```

##### python-example/definitions/available-products.json
```json
{
    "mammal" : {
            "Cat" : {
                    "speak" : "meow",
                    "legs" : 4,
                    "attack" : "Cat performs scratch.",
                    "description" : "Rules humanity through creating the internet and posting adorable photos of themselves."
                }
            ,
            "Dog" : {
                    "speak" : "woof",
                    "legs" : 4,
                    "attack" : "Dog performs bite.",
                    "description" : "Ruled by humanity due to their forgetful nature."
                }
        },
    "fish" : {
            "Magikarp" : {
                    "speak" : "bubbles",
                    "legs" : 0,
                    "attack" : "Magikarp used splash, but nothing happened.",
                    "description" : "Until it reaches level 20, it is utterly useless."
                }
        }
}
```

This result in the following being printed to the terminal:

```bash
loganconnor44@Logans-MacBook-Pro ~/Documents/workspace/factoryDesignPattern (master)
$ python3 python-example/main.py 

Animal Name: Cat
Description: Rules humanity through creating the internet and posting adorable photos of themselves.
This animal says: meow
Attack: Cat performs scratch.

Animal Name: Dog
Description: Ruled by humanity due to their forgetful nature.
This animal says: woof
Attack: Dog performs bite.

Animal Name: Magikarp
Description: Until it reaches level 20, it is utterly useless.
This animal says: bubbles
Attack: Magikarp used splash, but nothing happened.
```