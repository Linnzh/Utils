<?php


namespace Linnzh\Utils\Constants;


/**
 * Class HttpErrorCode
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
 *
 * @author  linnzh
 * @created 2023/1/17 09:54
 */
class HttpErrorCode
{
    /**
     * @example 永久重定向
     *          用于发出请求的 URI 已被 Location 标头字段中指定的 URI 所取代
     *          此请求以及对此资源的所有未来请求都应定向到新的 URI
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/301
     */
    public const MOVED_PERMANENTLY = 301;

    /**
     * @example 临时重定向
     *          请求应按 Location 标头字段中指定的 URI 逐字重复，但客户端应对未来的请求继续
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/302
     */
    public const FOUND = 302;

    /**
     * @example 指示客户端使用先前请求中使用的相同方法在另一个 URI 处获取请求的资源
     *          与 302 Found HTTP 响应代码具有相同的语义，但是不得更改使用的 HTTP 方法
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/302
     */
    public const TEMPORARY_REDIRECT = 307;

    /**
     * @example 发送无效的 JSON 将导致 400 Bad Request 响应
     *          ex: Problems parsing JSON
     *
     * @example 发送错误类型的 JSON 值将导致 400 Bad Request 响应
     *          ex: Body should be a JSON object
     *
     * @example  API 版本不受支持
     *           ex: An unsupported API version
     */
    public const BAD_REQUEST = 400;

    /**
     * @example 使用无效凭据进行身份验证
     *          ex: Bad credentials
     */
    public const UNAUTHORIZED = 401;

    /**
     * @example 在短时间内检测到多个使用无效凭据的请求后，
     *          API 将暂时拒绝该用户的所有身份验证尝试
     *          （包括使用有效凭据的尝试）
     *          ex: Maximum number of login attempts exceeded. Please try again later.
     *
     * @example 超过速率限制
     *          ex: API rate limit exceeded for xxx.xxx.xxx.xxx.
     *              (But here's the good news: Authenticated requests get a higher rate limit.
     *              Check out the documentation for more details.)
     */
    public const FORBIDDEN = 403;

    /**
     * @example 资源不存在
     *          ex: Resource not found
     */
    public const NOT_FOUND = 404;

    /**
     * @example 请求超时
     *          ex: Request Timeout
     *          ex: Server Error
     */
    public const REQUEST_TIMEOUT = 408;

    /**
     * @example 发送无效字段将导致 422 Unprocessable Entity 响应
     *          ex: Validation Failed
     */
    public const UNPROCESSABLE_ENTITY = 422;
}
