<?php


namespace Linnzh\Utils\Algorithm;


/**
 * N 叉树节点
 */
class NTreeNode
{
    /**
     * @var mixed 节点存储值
     */
    public mixed $value;

    /**
     * @var NTreeNode[]|null N叉树子节点
     */
    public ?array $children;

    public function __construct(mixed $value)
    {
        $this->value = $value;
        $this->children = [];
    }

    public function traverse(NTreeNode $root, array &$result = []): array
    {
        $result[] = $root->value;
        foreach ($root->children as $child) {
            $this->traverse($child, $result);
        }
        return $result;
    }

    /**
     * 前序遍历
     * @param NTreeNode $root
     * @param array $result
     * @return array
     */
    public function preorderTraverse(NTreeNode $root, array &$result = []): array
    {
        $result[] = $root->value;
        foreach ($root->children as $child) {
            $this->preorderTraverse($child, $result);
        }
        return $result;
    }

    /**
     * 后序遍历
     * @param NTreeNode $root
     * @param array $result
     * @return array
     */
    public function postorderTraverse(NTreeNode $root, array &$result = []): array
    {
        foreach ($root->children as $child) {
            $this->postorderTraverse($child, $result);
        }
        $result[] = $root->value;
        return $result;
    }
}