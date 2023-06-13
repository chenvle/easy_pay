<?php

use EasyWeChat\Factory;

class EasyPay extends Base
{

    public function __construct($config = false)
    {
        if($config){
            $app = Factory::payment($config);
        }else{
            $app = Factory::payment(config('pay'));
        }
    }
}