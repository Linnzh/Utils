<?php


namespace Linnzh\Utils\Constants;


/**
 * Class ValidateErrorCode
 *
 * @author  linnzh
 * @created 2023/1/17 10:06
 */
class ValidateErrorCode
{
    /**
     * @example 资源不存在
     */
    public const MISSING = -1;

    /**
     * @example 资源上的必需字段尚未设置
     */
    public const MISSING_FIELD = -2;

    /**
     * @example 字段的格式无效
     */
    public const INVALID = -3;

    /**
     * @example 另一个资源具有与此字段相同的值
     *          在必须具有某些唯一键（例如标签名称）的资源中可能会发生这种情况
     */
    public const ALREADY_EXISTS = -4;

    /**
     * @example 提供的输入无效
     */
    public const UNPROCESSABLE = -5;
}
