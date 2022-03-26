<?php

declare(strict_types=1);

namespace Linnzh\Utils\Flyweight;

class Material
{
    protected string $name;

    protected string $description;

    protected MaterialCategoryFlyweight $category;

    public function __construct(string $name, string $description, MaterialCategoryFlyweight $category)
    {
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
    }

    public function output(): void
    {
        $this->category->output($this->name, $this->description);
    }

    public function match(array $query): bool
    {
        foreach ($query as $key => $value) {
            if (property_exists($this, $key)) {
                if ($this->$key !== $value) {
                    return false;
                }
            } elseif (property_exists($this->category, $key)) {
                if ($this->category->$key !== $value) {
                    return false;
                }
            } else {
                return false;
            }
        }

        return true;
    }
}
