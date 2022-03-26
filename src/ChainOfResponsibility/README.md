## 责任链模式 - Chain of Responsibility

概念：使多个对象都有机会处理请求，从而避免请求的发送者和接收者之间的耦合关系。将这些对象连成一条链，并沿着这条链传递该请求，直到有一个对象处理它为止。

![责任链设计模式](assets/设计模式/chain-of-responsibility.png)

![处理者依次排列，组成一条链](assets/设计模式/solution1-zh-16482772466192.png)

### 适用性

- 有多个对象可以处理一个请求，哪个对象处理该请求运行时自动确定。
- 想在不明确指定接收者的情况下，向多个对象中的其中一个，提交一个请求。
- 可处理一个请求的对象集合应被动态指定。
- 当程序需要使用不同方式处理不同种类请求，而且请求类型和顺序预先未知时，可以使用责任链模式。
    - 该模式能将多个处理者连接成一条链。接收到请求后，它会 “询问” 每个处理者是否能够对其进行处理。这样所有处理者都有机会来处理请求。
- 当必须按顺序执行多个处理者时，可以使用该模式。
    - 无论你以何种顺序将处理者连接成一条链，所有请求都会严格按照顺序通过链上的处理者。
- 如果所需处理者及其顺序必须在运行时进行改变，可以使用责任链模式。
    - 如果在处理者类中有对引用成员变量的设定方法，你将能动态地插入和移除处理者，或者改变其顺序。

### 特点

- 该模式使得一个对象无需知道是其他哪一个对象处理其请求，只知道这个请求将会被正确地处理，简化对象之间的相互连接。
- 增强了给对象指派职责的灵活性，可通过在运行时对该链进行动态的增加或修改来增加或改变处理一个请求的那些职责。
- 无法保证被接受，一个请求也可能因该链没有被正确配置而得不到处理。

### 参与者

- Handler（请求处理者）
    - 定义一个处理请求的接口
    - （可选）实现**后继链**
- ConcreteHandler（具体请求处理者）
    - 处理它所负责的请求
    - 可访问它的后继者
    - 如果可处理该请求，则处理；反之则将该请求转发给它的后继者
- Client（提交请求的客户端）
    - 向链上的具体处理者对象提交请求

### 案例

- 订购系统中的各项检查：多项检查使得代码愈发臃肿不堪
    - 将这些处理者连成一条链。链上的每个处理者都有一个成员变量来保存对于下一处理者的引用。除了处理请求外，处理者还负责沿着链传递请求。请求会在链上移动，直至所有处理者都有机会对其进行处理。
    - 处理者会在进行请求处理工作后决定是否继续沿着链传递请求。如果请求中包含正确的数据，所有处理者都将执行自己的主要行为，无论该行为是身份验证还是数据缓存。

### 对现有业务的思考

这很像框架中的“**HTTP请求中间件**”，也是一层一层处理请求。类似地，可以将一些非业务向的**中间步骤**作为一个责任链，例如订单下单时的一系列动作处理：生成账单、转到调度中心等，或者是一些检查过滤类工作。

```php
public function testExample(): void
{
    $server = new Server();
    $server->register('admin@example.com', 'admin_pass');
    $server->register('user@example.com', 'user_pass');

    $middleware = new ThrottlingMiddleware(2);
    $middleware
        ->linkWith(new UserExistsMiddleware($server))
        ->linkWith(new RoleCheckMiddleware());

    $server->setMiddleware($middleware);


    $success = $server->logIn('123', '123_pass');
    $this->assertFalse($success);

    $success = $server->logIn('1234', '1234_pass');
    $this->assertFalse($success);

    $server->logIn('user@example.com', 'user_pass');

    $success = $server->logIn('admin@example.com', 'admin_pass');
    $this->assertTrue($success);
}

```

