## 适配器模式 - Adapter

概念：将一个类的接口变成客户端所期望的另一种接口，从而使原本因接口不匹配而无法一起工作的两个类能够在一起工作。

适配器模式又称为**包装器（Wrapper）**，其核心思想就是*将一个对象经过包装或转换后使它符合指定的接口，使得调用方可以像使用接口的一般对象一样使用它*，起到一个中间转换的作用。

注意：过多地使用适配器，容易使代码结构混乱，如明明看到调用的是A 接口，内部调用却是B接口的实现。

### 适用性

- 想使用一个已存在的类，但其接口不符合需求。
- 想创建一个可复用的类，该类可以和其他不相关的类或不可预见的类（即接口可能不兼容）协同工作。
- （仅适用于对象 Adapter）想使用一些已经存在的子类，但不可能对每一个都进行子类化以匹配它们的接口，对象适配器可以适配它的父类接口。
    - 将缺失功能添加到一个适配器类中是一种优雅得多的解决方案。然后你可以将缺少功能的对象封装在适配器中，从而动态地获取所需功能。

### 参与者

- Target（目标）
    - 定义 Client 使用的与特定领域相关的接口。
- Client（客户端）
    - 与符合 Target 接口的对象协同。
- Adaptee（被适配对象）
    - 定义一个已经存在的接口，该接口需要适配。
- Adapter（适配器）
    - 对 Adaptee 的接口与 Target 的接口进行适配。

### 案例

- 榫卯结构、电源适配器
- 数据格式兼容问题
- 方钉圆孔问题
- 第三方数据或遗留系统接口不兼容问题

### 对现有业务的思考

适配器模式可以解决很多数据接口不兼容的问题，尤其是新老接口对接时。也可以通过写适配器接口，来兼容多个不同类型的第三方接口，例如快递接口，对接快递鸟或者快递100、或者其他具体的快递公司。

简单示例代码：

```php
public function testExample(): void
{
    $emailNotification = new EmailNotification('reg.lynnzh@gmail.com');
    $emailNotification->send('一条通知', '你被清华大学录取啦！');

    $weiboNotification = new WeiboNotificationAdapter(new WeiboApi('Linn', md5('linn')), '张三');
    $weiboNotification->send('一条通知', '你被清华大学录取啦！');

    $this->assertEquals(true, true);
}
```

