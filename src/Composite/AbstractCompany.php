<?php


namespace Linnzh\Utils\Composite;


abstract class AbstractCompany
{
    protected self $parent;

    /**
     * @return AbstractCompany
     */
    public function getParent(): AbstractCompany
    {
        return $this->parent;
    }

    /**
     * @param AbstractCompany $parent
     */
    public function setParent(AbstractCompany $parent): void
    {
        $this->parent = $parent;
    }

    public function isComposite(): bool
    {
        return false;
    }

    public function add(AbstractCompany $component): void
    {

    }

    public function remove(AbstractCompany $component): void
    {

    }

    abstract public function execute(): string;
}
