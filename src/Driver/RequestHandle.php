<?php

namespace DeathSatan\Hyperf\Validate\Driver;

use DeathSatan\Hyperf\Validate\Lib\AbstractValidate;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

/**
 * 自定义默认数据获取器
 */
class RequestHandle implements \DeathSatan\Hyperf\Validate\Contract\CustomHandle
{
    protected $request;

    protected $response;

    public function __construct(
        RequestInterface $request,
        ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @inheritDoc
     */
    public function provide(object $current, AbstractValidate $validate, string $scene = null): array
    {
        return $this->request->all();
    }
}