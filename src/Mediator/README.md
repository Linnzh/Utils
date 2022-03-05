## 中介模式 - Mediator

概念：用一个**中介对象**来封装一系列的对象交互。中介者使各对象不需要显式地相互引用，从而使其耦合松散，而且可以独立地改变它们之间的交互。

**中介模式**是对象行为型模式，又被称为**调停模式**。其作用是将网状结构类分离为星型结构，减少相互连接的数量，使得对象之间的结构更加简洁，交互更加顺畅。

### 适用性

- 一组对象以定义良好但复杂的方式进行通信，产生的相互依赖关系结构混乱且难以理解。
- 一个对象引用其他很多对象，并且直接与这些对象通信，导致难以复用该对象。
- 想定制一个分布在多个类中的行为，而又不想生成太多子类。

### 参与者

- Mediator（中介者，如 DialogDirector）
    - 中介者定义一个接口，用于与各同事（Colleague）对象通信
- ConcreteMediator（具体中介者，如 FontDialogDirector）
    - 具体中介者通过协调各同事对象实现协作行为
    - 了解并维护它的各个同事
- Colleague Class（同事类，即进行交互对象，如 ListBox、EntryField）
    - 每一个同事类都知道它的中介者对象
    - 每一个同事对象在需要与其他同事通信的时候，与它的中介者通信
    - 同事类可以是互不相干的多个类，也可以是具有继承关系的相似类

### 案例

- 设备管理器：QQ、钉钉、微信等通讯工具，作为 Colleague，需要与各种设备例如麦克风、扬声器、摄像头等进行交互，这些设备同作为交互对象 Colleague，其中**设备管理器**可以作为 ConcreteMediator 来保持两边的沟通交互。

### [TODO] 对现有业务的思考

同样理解起来不难，但目前想不到业务中适用的场景。

可通过以下测试代码简单理解：

```php
    public function testExample(): void
    {
        $mediator = new DeviceMediator();

        // 激活麦克风管理器中的第一个设备
        // 该过程全部交由中介者 mediator 做
        $colleague = $mediator->getDeviceListByType(DeviceMediator::SPEAKER);
        $mediator->activeByType(DeviceMediator::SPEAKER, $colleague[0]['id']);
        $this->assertEquals(1, $mediator->getCurrentDeviceIdByType(DeviceMediator::SPEAKER));

        // 激活麦克风管理器中的第二个设备
        // 该过程全部交由中介者 mediator 做
        $colleague = $mediator->getDeviceListByType(DeviceMediator::CAMERA);
        $mediator->activeByType(DeviceMediator::CAMERA, $colleague[1]['id']);
        $this->assertEquals(2, $mediator->getCurrentDeviceIdByType(DeviceMediator::CAMERA));
    }

```

#### 复杂理解

在事件分发器案例中，EventDispatcher 充当一个具体中介者，并定义了一个通用接口`ObserverInterface`（其定义了组件的行为`update()`）。然后在不同的组件如 User、Logger、UserRepository、OnBoardingNotification 实现这个通用接口，在客户端层面，所有行为通过事件分发器进行：

```php
    public function testExample(): void
    {
        $eventDispatcher = EventDispatcher::getInstance();
        echo PHP_EOL;

        $repository = new UserRepository();
        $eventDispatcher->attach($repository, 'facebook:update');

        $logger = new Logger(__DIR__ . '/log.txt');
        $eventDispatcher->attach($logger, '*');

        $onBoarding = new OnBoardingNotification('test@example.com');
        $eventDispatcher->attach($onBoarding, 'users:created');

        $repository->initialize(__DIR__ . 'users.csv');

        $user = $repository->createUser([
            'name' => 'Linnzh',
            'email' => 'linnzh@example.com',
        ]);

        $user->delete();

        $this->assertEquals(true, true);
    }

```




### 问题

- Colleague - Mediator 的通信方式？
    - 一种实现方法是使用 **Observer模式**，将 Mediator 实现为一个 Observer，各 Colleague 作为 Subject，一旦其状态改变就发送通知给 Mediator，Mediator 做出的响应是将状态改变的结果传播给其他的 Colleague。另一种实现方法是在 Mediator 中定义一个特殊的通知接口，各 Colleague 在通信时直接调用该接口。
- 中介模式的缺点？
    - 承接了所有的交互逻辑，交互的复杂度直接转变为中介者的复杂度，后续将变得难以维护
    - 中介者出问题会导致多个使用者同时出问题
