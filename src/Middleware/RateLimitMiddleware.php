<?php


namespace Linnzh\Utils\Middleware;


use Linnzh\Utils\Constants\HttpErrorCode;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Redis;


/**
 * Class RateLimitMiddleware
 *
 * @author  linnzh
 * @created 2023/1/17 10:31
 */
class RateLimitMiddleware
{
    /**
     * @var Redis
     */
    protected Redis $redis;

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->redis = $container->get(Redis::class);
    }

    /**
     * 检查当前路由是否超出限制
     *
     * @example 实现思路1：
     *          所有路由限制会被记录在缓存（redis）中
     *          例如路由 GET /users 在 redis 中记录为 rate_limit.get.users HASH
     *          哈希值存在以下信息：
     *          limit 每小时允许发出的最大请求数
     *          remaining 当前速率限制窗口中剩余的请求数
     *          used 当前速率限制窗口中已发出的请求数
     *          first 当前速率限制窗口开始的时间，单位为 UTC 纪元秒
     *          reset 当前速率限制窗口重置的时间，单位为 UTC 纪元秒
     *          根据请求 URI 来查找 redis 中限速相关的信息，并根据配置来决定其是否超出限制
     *
     * @param \Psr\Http\Message\RequestInterface       $request
     * @param \Psr\Http\Server\RequestHandlerInterface $handler
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \HttpRequestException
     *
     * @author  linnzh
     * @created 2023/1/17 11:30
     */
    public function handle(RequestInterface $request, RequestHandlerInterface $handler)
    {
        $uri = $request->getUri()->getPath();
        $method = $request->getMethod();
        $rateLimitCacheKey = "rate_limit.{$method}.{$uri}";
        $remaining = $this->redis->hGet($rateLimitCacheKey, 'remaining');
        if ($remaining <= 0) {
            // 重置该请求速率信息
            $this->redis->hMset($rateLimitCacheKey, [
                'limit' => $this->redis->hGet($rateLimitCacheKey, 'limit'),
                'remaining' => 100,
                'used' => 0,
                'first' => time(),
            ]);
            throw new \HttpRequestException(HttpErrorCode::FORBIDDEN, 'API rate limit exceeded');
        }

        $this->redis->hIncrBy($rateLimitCacheKey, 'remainig', 1);

        return $handler->handle($request);
    }
}
