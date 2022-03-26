## 模板方法模式 - Template Method

概念：定义一个操作中的算法的骨架，而将一些步骤延迟到子类中。模板方法使得子类可以不改变一个算法的结构即可重新定义该算法的某些特定步骤。

![建造大型房屋](assets/设计模式/live-example-16482909883987.png)

工厂模式是模板方法模式的一种特殊形式，同时，工厂模式可以作为一个大型模板方法中的一个步骤。

### 适用性

- 一次性实现一个算法的不变部分，并将可变的行为留给子类实现。
- 各子类中公共的行为应被提取出来并集中到一个公共父类中，以避免代码重复。
    - 首先识别现有代码中的不同之处，并且将不同之处分离为新的操作。
    - 最后用一个调用新的操作的模板方法来替换不同的代码。
- 控制子类扩展。模板方法只在特定点调用钩子操作，这样就只允许在这些特定点进行扩展。

### 参与者

- AbstractClass（抽象类）
    - 定义抽象的**原语操作**（Primitive Operation），具体的子类将重定义它们以实现一个算法的各步骤。
    - 实现一个模板方法，定义一个算法的骨架。该模板方法不仅调用原语操作，也调用定义在 AbstractClass 或其它对象中的操作。
- ConcreteClass（具体类）
    - 实现原语操作已完成算法中与特定子类相关的步骤。

### 对现有业务的思考

模板方法模式在 PHP 框架中较为常见，用以简化通过类继承对**默认行为**进行扩展的工作，将**继承机制**发挥得炉火纯青。

在业务中可以将订单分为多种不同类型的订单，但抽象订单中定义了基本行为，扩展订单则根据其特色进行重写。

```php
public function testExample(): void
{
    $data = [
        'price' => 100.00,
        'products' => [
            [
                'name' => '商品1',
                'unit_price' => 30,
                'quantity' => 3,
                'pickup_quantity' => 1,
            ],
            [
                'name' => '商品2',
                'unit_price' => 70,
                'quantity' => 2,
                'pickup_quantity' => 0,
            ]
        ],
    ];

    $pickUp = false;
    foreach ($data['products'] as $product) {
        if (isset($product['pickup_quantity']) && $product['pickup_quantity'] > 0) {
            $pickUp = true;
            break;
        }
    }

    $order = OrderFactory::createOrder($pickUp, $data);
    $order->commit();

    $this->assertInstanceOf(PickupOrder::class, $order);
}

```
