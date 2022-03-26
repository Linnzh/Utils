<?php


namespace Linnzh\Utils\Strategy;


class PaymentFactory
{
    /**
     * Get a payment method by its ID.
     *
     * @param string $id
     * @return PaymentMethodInterface
     */
    public static function getPaymentMethod(string $id): PaymentMethodInterface
    {
        return match ($id) {
            'alipay' => new AlipayPaymentMethod(),
            'wechat' => new WeChatPaymentMethod(),
            default => throw new \RuntimeException('未知的支付方式'),
        };
    }
}
