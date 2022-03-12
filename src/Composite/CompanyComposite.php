<?php


namespace Linnzh\Utils\Composite;


class CompanyComposite extends AbstractCompany
{
    /**
     * @var \SplObjectStorage|AbstractCompany[]
     */
    protected \SplObjectStorage|array $children;

    public function __construct()
    {
        $this->children = new \SplObjectStorage();
    }

    public function add(AbstractCompany $component): void
    {
        $component->setParent($this);
        $this->children->attach($component);
    }

    public function remove(AbstractCompany $component): void
    {
        $this->children->detach($component);
        $component->setParent(null);
    }

    public function isComposite(): bool
    {
        return true;
    }

    public function execute(): string
    {
        $result = [];
        foreach ($this->children as $child) {
            $result[] = $child->execute();
        }
        return implode("\n", $result);
    }

    /**
     * @return AbstractCompany[]|\SplObjectStorage
     */
    public function getChildren(): \SplObjectStorage|array
    {
        return $this->children;
    }
}
