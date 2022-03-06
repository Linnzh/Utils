## 抽象工厂模式 - Abstract Factory

概念：提供一个接口以创建一系列相关或相互依赖的对象，而无需指定他们具体的类。

![抽象工厂模式](assets/设计模式/abstract-factory-zh.png)

抽象工厂模式建议为系列中的每件产品明确声明接口（例如椅子、 沙发或咖啡桌）。然后，确保所有产品变体都继承这些接口。 例如，所有风格的椅子都实现 `椅子`接口；所有风格的咖啡桌都实现 `咖啡桌`接口，以此类推。

### 适用性

- 一个系统要独立于它的产品的创建、组合和表示。
- 一个系统要由多个产品系列中的一个来配置。
- 要强调一系列相关的产品对象的设计以便进行联合使用。
- 提供一个产品类库，但只想显示它们的接口而不是实现。
- 如果代码需要与多个不同系列的相关产品交互， 但是由于无法提前获取相关信息， 或者出于对未来扩展性的考虑， 你不希望代码基于产品的具体类进行构建， 在这种情况下， 你可以使用抽象工厂。
- 如果你有一个基于一组[抽象方法](https://refactoringguru.cn/design-patterns/factory-method)的类， 且其主要功能因此变得不明确， 那么在这种情况下可以考虑使用抽象工厂模式。

即：抽象化多个工厂类。

### 特点

- 分离了具体的类，使之不出现在客户端代码
- 有利于产品的一致性
- 工厂应该是一个单例

### 参与者

- AbstractFactory（抽象工厂）
    - 声明一个创建抽象产品对象的操作接口
- ConcreteFactory（具体工厂）
    - 实现创建具体产品对象的操作
- AbstractProduct（抽象产品）
    - 为一类产品对象声明一个接口
- ConcreteProduct（具体产品）
    - 定义一个将被相应的具体工厂创建的产品对象
    - 实现 AbstractProduct 接口
- Client/Application（客户端）
    - 仅使用由 AbstractFactory 和 AbstractProduct 类声明的接口

AbstractFactory 将产品对象的创建延迟到它的 ConcreteFactory 子类。

### 案例

- 跨平台 GUI 组件系列及其创建方式：按钮和复选框将被作为产品。它们有两个变体：macOS 版和 Windows 版。抽象工厂定义了用于创建按钮和复选框的接口。而两个具体工厂都会返回同一变体的两个产品。

### 对现有业务的思考

依旧是从测试代码简单理解：

```php
    public function testExample(): void
    {
        $env = ['Windows', 'WEB', 'MacOS'];
        $config = $env[random_int(0, 2)];

        if ($config === 'Windows') {
            $factory = new WindowsFactory();
        } elseif ($config === 'WEB') {
            $factory = new WebFactory();
        } else {
            throw new \LogicException('不支持的操作系统！');
        }

        // $button = $factory->createButton();
        // $button->render();
        // $button->onClick();

        // $checkbox = $factory->createCheckbox();
        // $checkbox->print();

        // 无需关注具体的类
        $application = new Application($factory);
        $application->render();

        $this->assertEquals(true, true);
    }
```

