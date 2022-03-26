## 访问者模式 - Visitor

概念：表示一个作用于某对象结构中的各元素的操作。它使你可以在不改变各元素的类的前提下定义作用于这些元素的新操作，将算法与其所作用对象隔离开。

访问者模式建议将新行为放入一个名为*访问者*的独立类中，而不是试图将其整合到已有类中。

### 适用性

- **一个对象结构包含很多类对象**，它们有不同的接口，而你想对这些对象是是一些依赖于其具体类的操作。
- 需要对一个对象结构中的对象进行很多不同并且不相关的操作，而你想避免让这些操作“污染”这些对象的类。Visitor 可将这些操作集中起来定义在一个类中。当该对象结构被很多应用共享时，用 Visitor 模式让每个应用仅包含需要用到的操作。
- 定义对象结构的类很少改变，但经常需要在此结构上定义新的操作。改变对象结构类需要重新定义对所有访问者的接口，这可能需要很大的代价。如果对象结构经常改变，那么可能还是在这些类中定义这些操作比较好。
- 清理辅助行为的业务逻辑。将所有非主要行为抽取到一组访问者类中，使得程序的主要类更专注于主要的工作。

### 特点

- 访问者模式使得更易于增加新的操作。仅需增加一个新的访问者即可在一个对象结构中定义一个新的操作。相反，如果每个功能都分散在多个类之上的话，定义新的操作时必须修改每一个类。
- 访问者集中相关的操作而分离无关的操作。

### 参与者

- Visitor（访问者）
    - 为该对象结构中 ConcreteElement 的每一个类声明一个 Visit 操作。该操作名字和特征标识了发送 Visit 请求给该访问者的类。这使得访问者可以确定正被访问元素的具体的类。这样访问者就可以通过该元素的特定接口直接访问它。
- ConcreteVisitor（具体访问者）
    - 实现每个由 Visitor 声明的操作。每个操作实现本算法的一部分，而该算法片段时对应于结构对象中的类。
    - ConcreteVisitor 为该算法提供了上下文并存储它的局部状态。这一状态常常在遍历该结构的过程中累计结果。
- Element（元素）
    - 定义一个 Accept 操作接口，它以一个访问者为参数。
- ConcreteElement（具体元素）
    - 实现 Accept 操作，该操作以一个访问者为参数。
- ObjectStructure（对象结构）
    - 能够枚举它的元素。
    - 可以提供一个高层的接口以允许该访问者访问它的元素。
    - 可以是一个组合（Composite）或是一个集合，如一个列表或一个无序集合。

### 案例

- 抽象语法树
- **访问者**模式为几何图像层次结构添加了对于 XML 文件导出功能的支持。

### 对现有业务的思考

该模式比较明确，就是不妨碍已有类结构的情况下，得到访问类属性的权限，并对其进行一系列操作。

访问者模式在 PHP 代码中不太常用，因为它不仅复杂，应用范围也比较狭窄。有个案例是给已有的复杂结构（例如组织机构）增加**报表导出**功能，可能是整个公司的财务报表、某个部门的财务报表，或者是具体某个雇员的薪资表。

```php
public function testExample(): void
{
    $mobileDev = new Department("Mobile Development", [
        new Employee("Albert Filmore", "designer", 100000),
        new Employee("Ali Hallway", "programmer", 100000),
        new Employee("Sarah Kronor", "programmer", 90000),
        new Employee("Monica Ronaldo", "QA engineer", 31000),
        new Employee("James Smith", "QA engineer", 30000),
    ]);
    $techSupport = new Department("Tech Support", [
        new Employee("Larry Albrecht", "supervisor", 70000),
        new Employee("Elton Pale", "operator", 30000),
        new Employee("Rajeev Kumar", "operator", 30000),
        new Employee("John Burnoose", "operator", 34000),
        new Employee("Sergey Korolyov", "operator", 35000),
    ]);
    $company = new Company("SuperStarDevelopment", [$mobileDev, $techSupport]);

    $report = new SalaryReport();

    echo "Client: I can print a report for a whole company:\n\n";
    echo $company->accept($report);

    echo "\nClient: ...or just for a single department:\n\n";
    echo $techSupport->accept($report);

    $this->assertTrue(true);
}

```
