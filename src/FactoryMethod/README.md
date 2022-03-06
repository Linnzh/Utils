## 工厂模式 - Factory

概念：专门定义一个类来负责**创建其他类的实例**，根据参数的不同创建不同的实例，被创建的实例通常具有共同的父类。

工厂模式也被称为**简单工厂模式（Simple Factory Pattern）**、**虚拟构造函数（Virtual Contructor）**。Factory Method 使一个类的实例化延迟到其子类。

![使用工厂方法模式后的代码结构](assets/设计模式/solution3-zh.png)

### 适用性

- 当一个类不知道它所必须创建的对象的类的时候。
- 当你在编写代码的过程中， 如果无法预知对象确切类别及其依赖关系时。
- 如果你希望用户能扩展你软件库或框架的内部组件， 可使用工厂方法。
- 当一个类希望由它的子类来指定它所创建的对象的时候。
- 当类将创建对象的职责委托给多个帮助子类中的某一个，并且希望将哪一个帮助子类使代理者这一信息局部化的时候。

### 特点

- 调用工厂方法的代码（通常被称为*客户端*代码）无需了解不同子类返回实际对象之间的差别。客户端将所有产品视为抽象的 `运输` 。客户端知道所有运输对象都提供 `交付`方法，但是并不关心其具体实现方式。

### 参与者

- Product
    - 定义工厂方法所创建的对象的接口
- ConcreteProduct
    - 实现 Product 接口的具体类
- Creator
    - 声明工厂方法，该方法返回一个 Product 类型的对象。Creator 也可以定义一个工厂方法的默认实现，并返回一个默认的 ConcreteProduct 对象
    - 可以调用工厂方法以创建一个 Product 对象
- ConcreteCreator
    - 重定义工厂方法以返回一个 ConcreteProduct 对象

### 案例

- 对话框组件：如果我们声明了一个在基本对话框类中生成按钮的工厂方法，那么我们就可以创建一个对话框子类，并使其通过工厂方法返回 Windows 样式按钮。子类将继承对话框基础类的大部分代码，同时在屏幕上根据 Windows 样式渲染按钮。
- 假设你使用开源 UI 框架编写自己的应用。你希望在应用中使用圆形按钮，但是原框架仅支持矩形按钮。你可以使用 `圆形按钮`Round­Button子类来继承标准的 `按钮`Button类。但是，你需要告诉 `UI框架`UIFramework类使用新的子类按钮代替默认按钮。 为了实现这个功能，你可以根据基础框架类开发子类 `圆形按钮 UI`UIWith­Round­Buttons ，并且重写其 `create­Button`创建按钮方法。基类中的该方法返回 `按钮`对象，而你开发的子类返回 `圆形按钮`对象。现在，你就可以使用 `圆形按钮 UI`类代替 `UI框架`类。

### 对现有业务的思考

该模式适合归纳一些具备类似特点的类，并提供一个快速创建不同对象的方法，而无需去了解具体对象的实现方式。比如说：

- 生产BOM中，子件、预组件、组件三者具备高度相似性
- 财务帐单中，收款单、付款单
- 物料管理中，原材料、产品、物料等

简单来说属于一些对象中，仅有类似 type 属性不同或特定行为的实现不同时，可使用工厂模式来进行创建。

从测试代码简单理解：

```php
    public function testExample(): void
    {
        $windowsDialog = DialogFactory::createWindowsDialog();
        $windowsDialog->render();
        $button = $windowsDialog->createButton();
        $button->render();
        $button->onClick();

        $webDialog = DialogFactory::createWebDialog();
        $webDialog->render();
        $button = $webDialog->createButton();
        $button->render();
        $button->onClick();

        $this->assertEquals(true, true);
    }
```

这里的`$windowsDialog->createButton()`也可以使用工厂模式来创建不同的按钮。
