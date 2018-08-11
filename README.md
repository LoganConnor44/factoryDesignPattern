# Factory Design Pattern
This design pattern generates an instance for client without exposing any instantiation logic to the client.

## Why Use The Factory Method
* Allows the consumer to create new objects without having to know the details of their dependencies or how they're created. The consumer only needs to give a top level request of the object needed.

## Real-World Example
* You are purchasing furniture for a new home. Normally people do not create the furniture from scratch, but go to a store(factory) and purchase a product. This is the same concept. This pattern allows the client to request an object without being concerned with all the nails, lumber, or paint that may be involved.

# Various Languages

## PHP

### Code Examples

Attempting to create a triangle may look something like this:
```php
$Triangle = new Polygon(
    3,
    TRUE,
    FALSE,
    3,
    3
);
```

This demonstrates a concrete class, ```Polygon``` which can have various attributes and these attributes define the type of a polygon which will be created. This example assumes that Polygon has a constructor that takes arguments to designate the specific type. This is not bad practice, but is not easily readible if the codebase is new to the developer. This example is also very basic and most real-world applications will be more complex and rely on more than five attributes to define an object.

Another example may be an empty constructor and attributes will need to be defined later.

```php
$Triangle = new Polygon();
$Triangle->vertices = 3;
$Triangle->allSidesEqualLength = TRUE;
$Triangle->angles = 3
$Triangle->edges = 3;
```

The below code is an example of how to create various shapes using the Abstract Factory Method.
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