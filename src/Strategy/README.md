## 策略模式 - Strategy

概念：定义一系列算法，把它们一个个封装起来，并且使它们可相互替换。本模式使得算法可独立于使用它的客户而变化。

别名**政策（Policy）模式**。

### 适用性

- 许多相关的类仅仅是行为有异。策略模式提供了一种用多个行为中的一个行为来配置一个类的方法。
- 需要使用一个算法的不同变体。
- 算法使用客户不应该知道的数据，避免暴露复杂的与算法相关的结构数据。
- 一个类定义了多种行为，并且这些行为在这个类的操作中以多个条件语句的形式出现。将相关的条件分支移入它们各自的Strategy 类中以代替这些条件语句。

### 特点

- 策略模式为上下文（Context）定义了一系列的可供复用的算法或行为，继承有助于析取出这些算法中的公共功能。
- 取消了一些条件语句。
- 为相同行为提供不同的实现选择。

### 参与者

- Strategy（策略）
    - 定义所有支持的算法的公共接口，Context 使用该接口来调用某 ConcreteStrategy 定义的算法。
- ConcreteStrategy（具体策略算法）
    - 以 Strategy 接口实现某具体算法。
- Context（上下文）
    - 用一个 ConcreteStrategy 对象来配置。
    - 维护一个对 Strategy 对象的引用。
    - 可定义一个接口来让 Strategy 访问它的数据。

### 案例

- ET++SwapsManager 计算引擎框架为不同的金融设备计算价格。
- Java 8 开始支持 lambda 方法，它可作为一种替代策略模式的简单方式。
    - 策略模式可以通过允许嵌套对象完成实际工作的方法以及允许将该对象替换为不同对象的设置器来识别。
- 各种不同选项导致的结果，例如支付方式、订单类型等。

### 对现有业务的思考

可以看出来有很多地方可使用策略模式。例如根据类型的不同所做出的一系列决策、某个参数的存在性导致的流程走向等。

```php
public function testExample(): void
{
    $order = new Order([
        'price' => 100.00,
        'products' => [
            [
                'name' => '商品1',
                'price' => 30,
                'quantity' => 3
            ],
            [
                'name' => '商品2',
                'price' => 70,
                'quantity' => 2
            ]
        ],
    ]);
    $order->setPaymentMethod(PaymentFactory::getPaymentMethod('alipay'));
    $order->pay();
    $this->assertTrue(true, true);
}
```
