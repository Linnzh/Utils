## 享元模式 - Flyweight

概念：运用**共享技术**有效地支持大量细粒度对象的复用。

又称为**轻量级模式**，要求能够共享的对象必须是轻量级对象。享元对象能做到共享的关键是*区分内部状态和外部状态*。

- 内部状态（Intrinsic State）：存储在享元对象内部并且不会随环境改变而改变的状态，因此内部状态是可以共享的状态。
- 外部状态（Extrinsic State）：随环境改变而改变、不可共享的状态。享元对象的外部状态必须由客户端保存，并且在享元对象被创建之后，在需要时传入享元对象内部。

享元模式也被称为**缓存（Cache）模式**。

### 适用性

该模式仅在以下条件均成立时适用：

1. 使用了大量的相似对象
2. 由于 1 的存在造成了很大的**存储开销**
3. 对象的大多数状态都可变为外部状态
4. 如果删除对象的外部状态，那么可以用相对较少的共享对象取代很多组对象
5. 应用程序不依赖于对象标识：由于 Flyweight 对象可以被共享，因此对于概念上明显有别的对象，标识测试将返回真值

### 特点

- 由于 PHP 语言的特性，享元模式很少在 PHP 中使用。PHP 脚本通常仅需要应用的一部分数据，从不会同时将所有数据载入内存。
- 享元模式是一个考虑系统性能的设计模式，使用享元模式可以节约内存空间，提高系统的性能。

### 参与者

- Flyweight（享元）
    - 描述一个接口，通过这个接口 flyweight 可以接受并作用于外部状态
    - 包含原始对象中部分能在多个对象中共享的状态
    - 同一享元对象可在许多不同情景中使用
- Context（具体享元、情景上下文）
    - 实现 Flyweight 接口，并为内部状态（如果有的话）增加存储空间
    - 该对象必须是可共享的，所存储的状态也必须是内部的，即必须独立于 Context 对象的场景
- FlyweightFactory（享元工厂）
    - 创建并管理 Flyweight 对象
    - 确保合理地共享 Flyweight：当用户请求一个 Flyweight 时，FlyweightFactory 对象将提供一个已创建的实例或者新建一个实例（如果不存在的话）

### 案例

- 场景渲染：游戏场景渲染、粒子系统等。
    - 摒弃了在每个对象中保存所有数据的方式， 通过共享多个对象所共有的相同状态， 能在有限的内存容量中载入更多对象。
- 浏览器的缓存：浏览器会将已打开的页面、文件等缓存到本地，如果一个页面中多次出现相同的图片（即一个页面中多个 img 标签指向同一个图片地址），则只需创建一个图片对象，在解析到 img 标签的地方多次重复显示这个对象即可。

### 对现有业务的思考

从[PHP 享元模式讲解和代码示例](https://refactoringguru.cn/design-patterns/flyweight/php/example#example-1)中大概可以理解为：操作大量具有相同数据时，对这些相同数据进行缓存，而不是新建对象。

例如我有一张 10w 数据量的物料表，其中有品牌、厂商等信息具有高度一致性，这部分信息可以作为共享数据，而不是建立相关类创建实例。



```php
public function testExample(): void
{
    $pool = new MaterialPool();

    $suppliers = ['华为', 'OPPO', '小米', 'Apple'];
    $manufactureYears = [2020, 2021, 2022];

    $i = 0;
    while ($i < 1000) {
        $name = substr(str_shuffle('#ABCDEFGHILKMNOPQRSTUVWXYZ#abcdefghilkmnopqrstuvwxyz1234567890'), 1000 % 61, 10);
        $pool->addMaterial('物料' . $name, '简单描述' . $i, $suppliers[$i % 4], $manufactureYears[$i % 3]);
        $i++;
    }

    $material = $pool->findOneMaterial(['description' => '简单描述2']);
    if ($material) {
        $material->output();
    }

    $materials = $pool->findManyMaterial(['supplier' => '华为']);
    foreach ($materials as $material) {
        $material->output();
    }

    $this->assertEquals(true, true);
}
```

