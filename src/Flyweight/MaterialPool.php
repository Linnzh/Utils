<?php


namespace Linnzh\Utils\Flyweight;


class MaterialPool
{
    /**
     * @var array|Material[]
     */
    private array $materials = [];

    /**
     * @var array|MaterialCategoryFlyweight[]
     */
    private array $materialCategories = [];

    public function addMaterial(string $name, string $description, string $supplier, int $manufactureYear): void
    {
        $category = $this->getCategory($supplier, $manufactureYear);
        $this->materials[] = new Material($name, $description, $category);
    }

    /**
     * 缓存已经出现过的对象
     * @param string $supplier
     * @param int $manufactureYear
     * @return MaterialCategoryFlyweight
     */
    private function getCategory(string $supplier, int $manufactureYear): MaterialCategoryFlyweight
    {
        $key = $this->getKey(get_defined_vars());

        if (!isset($this->materialCategories[$key])) {
            $this->materialCategories[$key] = new MaterialCategoryFlyweight($supplier, $manufactureYear);
        }

        return $this->materialCategories[$key];
    }

    private function getKey(array $data): string
    {
        return md5(implode('_', $data));
    }

    public function findOneMaterial(array $query): ?Material
    {
        foreach ($this->materials as $material) {
            if ($material->match($query)) {
                return $material;
            }
        }
        return null;
    }

    /**
     * @param array $query
     * @return array|Material[]
     */
    public function findManyMaterial(array $query): array|Material
    {
        $result = [];
        foreach ($this->materials as $material) {
            if ($material->match($query)) {
                $result[] = $material;
            }
        }
        return $result;
    }
}
