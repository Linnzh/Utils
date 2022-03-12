## 桥接模式 - Bridge

概念：**桥接模式**是一种结构型设计模式，可将一个大类或一系列紧密相关的类拆分为抽象和实现两个独立的层次结构，从而能在开发时分别使用。

别名**Handle**/**Body**。桥接模式可以通过一些控制实体及其所依赖的多个不同平台之间的明确区别来进行识别。

![跨平台结构](assets/设计模式/bridge-2-zh.png)



![桥接模式解决的问题](assets/设计模式/problem-zh.png)

![桥接模式的解决方案](assets/设计模式/solution-zh.png)

### 适用性

- 想要拆分或重组一个具有多重功能的庞杂类时，例如能与多个数据库服务器进行交互的类
    - 桥接模式可以将庞杂类拆分为几个类层次结构。此后，你可以修改任意一个类层次结构而不会影响到其他类层次结构。这种方法可以简化代码的维护工作，并将修改已有代码的风险降到最低。
- 希望在几个独立维度上扩展一个类时
    - 建议将每个维度抽取为独立的类层次。初始类将相关工作委派给属于对应类层次的对象，无需自己完成所有工作
- 不希望在抽象和它的实现部分之间有一个固定的绑定关系，需要在运行时切换不同实现方法时
    - 并不是说一定要实现这一点，桥接模式可替换抽象部分中的实现对象，具体操作就和给成员变量赋新值一样简单。
- 对不同的抽象接口和实现部分进行组合，并分别对它们进行扩充。

### 特点

- 分离接口及其实现部分。
- 提高可扩充性。
- 实现细节对客户透明。
- 桥接模式允许在不改动另一层次代码的前提下修改已有类，甚至创建新类。

### 参与者

- Abstraction（抽象部分）
    - 提供高层的逻辑控制，依赖于完成底层实际工作的实现对象
- Implementation（实现部分）
    - 为所有具体实现提供接口。抽象部分仅能通过在这里声明的方法与实现对象交互。
    - 抽象部分可以列出与实现部分一样的方法，但是抽象部分通常声明一些复杂行为，这些行为依赖于多种由实现部分声明的原语操作。
- ConcreteImplementation（具体实现）
    - 包含特定于平台的代码。
- Refined Abstraction（精确抽象）
    - 提供控制逻辑的变体，与其父类一样，通过通用实现接口与不同的实现进行交互。

### 案例

- 在支持多种类型的数据库服务器或与多个特定种类 （例如云平台和社交网络等） 的 API 供应商协作时会特别有用。
- 远程控制器及其所控制的设备的类之间的分离：远程控制器是抽象部分，设备则是其实现部分。由于有通用的接口，同一远程控制器可与不同的设备合作，反过来也一样。

### 对现有业务的思考

暂时没有想到现有的可适配的业务场景。先做简单了解吧。

```php
public function testExample(): void
{
    $device = new Radio();
    echo $device;
    $remoteController = new BasicRemoteController($device);
    $remoteController->power();
    $remoteController->volumeUp();
    $remoteController->volumeUp();
    echo $device;
    $remoteController->volumeDown();
    echo $device;
    $remoteController->power();
    echo $device;

    $device = new TV();
    echo $device;
    $remoteController = new AdvancedRemoteController($device);
    $remoteController->power();
    $remoteController->mute();
    echo $device;
    $remoteController->volumeUp();
    echo $device;
    $remoteController->power();
    echo $device;

    $this->assertEquals(true, true);
}
```

