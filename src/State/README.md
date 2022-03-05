## 状态模式 - State

概念：允许一个对象在其内部状态发生改变时改变其行为，使这个对象看上去就是改变了它的类型一样（其表现的行为和外在属性不一样）。

因此，状态模式属于对象的**行为**模式。又叫**状态对象（Object for State）**。其核心思想就是*一个事物（对象）有多种状态，在不同状态下所表现出来的行为和属性不一样。*

注意：表示状态的类应该只会有一个实例，所以状态类的实现要使用**单例**。

### 适用性

- 一个对象的行为取决于它的状态，并且它必须在运行时根据状态改变它的行为。
- 一个操作中含有庞大的多分支条件语句，且这些分支依赖于该对象的状态。这个状态通常用一个或多个枚举常量表示。通常，有多个操作包含这一相同的条件结构。State 模式将每个条件放入一个独立的类中，这使得你可以根据对象自身的情况将对象的状态作为一个对象，这一对象可以不依赖于其他对象而独立变化。

### 特点

- 将与特定状态相关的行为局部化，并且将不同状态的行为分割开。
- 使得状态转换显式化。
- State  对象可被共享。

### 参与者

- Context（环境，如 TCPConnection）
    - 定义客户感兴趣的接口
    - 维护一个 ConcreteState 子类的实例，这个实例定义当前状态
- State（状态，如 TCPState）
    - 定义一个接口以封装与 Context 的一个特定状态相关的行为
- ConcreteState Subclasses（具体状态子类，如 TCPEstablished、TCPListen、TCPClosed）
    - 每一个子类实现一个与 Context 的一个状态相关的行为

### 案例

- TCPConnection 对象：处于若干不同状态之一：连接已建立（Established）、正在监听（Listening）、连接已关闭（Closed）。当一个 TCPConnection 对象收到其他对象的请求时，它根据自身的当前状态做出不同的反应，例如，一个 Open 请求的结果依赖于该连接是处于连接已关闭状态还是连接已建立状态。状态改变时，对应实例被替换为新状态的实例。

### [TODO] 对现有业务的思考

状态模式理解起来不难，但是带入到现实场景或者真正使用好像很难，对象间的关系以及处理方式过于复杂了。

> 通过在状态类中引用环境类的对象来回调环境类的 `setState()`方法实现状态的切换。在这种可以切换状态的状态模式中，增加新的状态类可能需要修改其他某些状态类甚至环境类的源代码，否则系统无法切换到新增状态。
>
> ——[状态模式](https://design-patterns.readthedocs.io/zh_CN/latest/behavioral_patterns/state.html#state)

可通过以下测试代码简单理解：

```php
    public function testExample(): void
    {
        $context = new TCPConnectionContext();

        $context->established();// 状态变更
        $stateName = $context->behavior();// 在 behavior() 方法中，调用当前状态的行为方法
        $this->assertEquals('established', $stateName);

        $context->listen();
        $stateName = $context->behavior();
        $this->assertEquals('listen', $stateName);

        $context->closed();
        $stateName = $context->behavior();
        $this->assertEquals('closed', $stateName);
    }
```

