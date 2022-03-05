## 装饰模式 - Decorator

概念：动态地给一个对象增加一些额外的职责。就**增加功能**来说，Decorator 模式相比于生成子类更为灵活。

装饰模式又称为**封装器（Wrapper）**，是对象结构型模式。其核心思想就是*动态地给类增加功能，而不改动原有的代码，来进行扩展。*将装饰器和被装饰的对象很好地进行解耦。

![继承与聚合的对比](assets/设计模式/solution1-zh-16464794550363.png)

### 适用性

- 在不影响其他对象的情况下，以动态、透明的方式给单个对象添加职责。
- 处理那些可以撤销的职责。
- 当不能采用生成子类的方法进行扩充时。
    - 一种情况是，可能有大量独立的扩展，为支持每一种组合将产生大量的子类，使得子类数目呈爆炸性增长
    - 另一种情况是，类定义被隐藏，或者类定义不能用于生成子类（final 类）

### 特点

- 与对象的静态继承相比，Decorator 模式提供了更加灵活地向对象添加职责的方式。可以运用添加和分离的方式，用装饰在运行时增加和删除职责，同时也可以很容易地**重复添加一个特性**。
- 提供了一种“即用即付”的方式来添加职责，并不试图在一个复杂的可定制的类中支持所有可预见的特征，而是利用 Decorator 类逐步添加功能。
- 使用相同方法来完成其他行为（例如设置消息格式或者创建接收人列表）。只要所有装饰都遵循相同的接口，客户端就可以使用任意自定义的装饰来装饰对象。

### 参与者

- Component（部件）
    - 定义一个对象接口，可以给这些对象动态地添加职责
- ConcreteComponent（具体部件）
    - 定义一个对象，可以给这个对象添加一些职责
- Decorator（装饰器）
    - 维持一个**指向 Component 对象的指针**，并定义一个与 Component 接口一致的接口
- ConcreteDecorator（具体装饰器）
    - 定义了可动态添加到部件的额外行为。 具体装饰类会重写装饰基类的方法， 并在调用父类方法之前或之后进行额外的行为

### 案例

- 通知器：在消息通知示例中， 我们可以将简单邮件通知行为放在基类 `通知器`中， 但将所有其他通知方法放入装饰中。

  ![装饰模式解决方案](assets/设计模式/solution2-zh.png)

- 敏感数据压缩和解密：**装饰**模式能够对敏感数据进行压缩和加密， 从而将数据从使用数据的代码中独立出来。

  ![装饰模式示例的结构](assets/设计模式/example.png)

### 对现有业务的思考

装饰模式看起来很像 JS 中的原型链，可以不断地在一个对象上调用不同或相同的方法，例如过滤器。或者很适合在产品经理提出新功能时使用，例如想在订单流程中加一个评审环节，评审功能就可以使用装饰模式进行加载。

参考测试代码以理解：

```php
    public function testExample(): void
    {
        echo "\n正在创建订单……\n订单创建完成，即将发送通知……\n";

        $decorator = new SmsNotifierDecorator();
        $decorator->send('默认装饰器');

        echo "\n正在创建订单……\n订单创建完成，即将发送通知……\n";
        $decorator = new SmsNotifierDecorator(new WechatNotifierDecorator());
        $decorator->send('两个装饰器');


        $this->assertEquals(true, true);
    }

```

其重点在于，抽象装饰器类，拥有一个指向 装饰器 对象的指针：

```php
abstract class AbstractNotifierDecorator implements NotifierInterface
{
    private ?NotifierInterface $wrapper;// 指针

    public function __construct(?NotifierInterface $notifier = null)
    {
        $this->wrapper = $notifier;
    }

    public function send(string $message): void
    {
        $this->wrapper && $this->wrapper->send($message);
    }
}
```

