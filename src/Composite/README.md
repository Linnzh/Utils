## 组合模式 - Composite

概念：将对象组合成树形结构以表示“部分-整体”的层次结构，使用户对单个对象和组合对象的使用具有一致性。

![部队结构的例子](assets/设计模式/live-example.png)

### 适用性

- 想表示对象的“部分-整体”层次结构时。
- 希望用户忽略组合对象与单个对象的不同时，用户将统一地使用组合结构中的所有对象。
- 对象之间具有明显的“部分-整体”的关系，或具有层次关系时。
- 组合对象与单个对象具有相同或类似的行为（方法），用户希望统一地使用组合结构中的所有对象时。

### 特点

- 组合模式是一种具有层次关系的树形结构，不能再分的叶子节点是具体的组件，也就是最小的逻辑单元；具有子节点（由多个子组件构成）的组件被称为**复合组件**，也就是组合对象。

### 参与者

- Component（子件）
    - 为组合中的对象声明接口
    - 在适当情况下，实现所有类共有接口的缺省行为
    - 声明一个接口用于访问和管理 Component 的子组件
    - （可选）在**递归结构**中定义一个接口，用于访问一个父部件，在合适的情况下实现它。
- Leaf（叶节点）
    - 在组合中表示叶节点对象，叶节点没有子节点
    - 在组合中定义图元对象的行为
- Composite（Comtainer，容器）
    - 定义有子部件的那些部件的行为
    - 存储子部件
    - 在 Component 接口中实现与子部件有关的操作
- Client（客户端）
    - 通过 Component 接口操纵组合部件的对象

![组合设计模式的结构](assets/设计模式/structure-zh.png)

### 案例

- 财经应用领域里，一个资产组合聚合多个单个资产，为了支持复杂的资产聚合，资产组合可用一个 Composite 类实现，该类与单个资产的接口一致。
- 组织架构：各个部门或各个子公司的组织架构、学校各个学院与班级的关系、文件夹与文件的关系等。
- HTML 的 DOM 树。

### 对现有业务的思考

很明显该模式适合具有树状结构的业务场景，比如说组织机构。

```php
public function testExample(): void
{
    $tree = new CompanyComposite();

    $branchA = new CompanyComposite();
    $branchA->add(new CompanyLeaf('企业A1'));
    $branchA->add(new CompanyLeaf('企业A2'));
    $tree->add($branchA);
    echo $tree->execute();

    echo "\n";

    $branchB = new CompanyComposite();
    $branchB->add(new CompanyLeaf('企业B1'));
    $branchB->add(new CompanyLeaf('企业B2'));
    $tree->add($branchB);
    echo $tree->execute();

    $this->assertEquals(true, true);
}
```
