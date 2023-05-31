<?php

class EasyPay extends Base
{
    public function __construct()
    {
        $this->config = [
            // 必要配置
            'app_id'             => '',
            'mch_id'             => '',
            'key'                => '',   // API v2 密钥 (注意: 是v2密钥 是v2密钥 是v2密钥)

            // 如需使用敏感接口（如退款、发送红包等）需要配置 API 证书路径(登录商户平台下载 API 证书)
            'cert_path'          => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
            'key_path'           => 'path/to/your/key',      // XXX: 绝对路径！！！！

            'notify_url'         => '默认的订单回调地址',     // 你也可以在下单时单独设置来想覆盖它
        ];
    }
}