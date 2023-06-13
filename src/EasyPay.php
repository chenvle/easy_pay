<?php
namespace chenvle;

use EasyWeChat\Factory;

class EasyPay extends Base
{
    protected \EasyWeChat\Payment\Application $app;
    public function __construct($config = false)
    {
        if($config){
            $this->app = Factory::payment($config);
        }else{
            $this->app = Factory::payment(config('pay'));
        }
    }


    /*统一下单   H5 支付，公众号支付，扫码支付，支付中签约*/
    public function pay($openid,$body,$total_fee,$out_trade_no = false,$pay_type = 'JSAPI')
    {
        $app    = $this->app;
        if(!$out_trade_no){
            $out_trade_no     = $this->order_number();//订单号
        }
        $arr = [
            'body' => $body,
            'out_trade_no' => $out_trade_no,
            'total_fee' => $total_fee,
            'trade_type' => $pay_type,
            'openid' => $openid,
        ];
        $array = $app->order->unify($arr);

        if ($array['return_code'] == 'SUCCESS' && $array['result_code'] == 'SUCCESS') {

            $jssdk = $app->jssdk;
            $pay_info = $jssdk->bridgeConfig($array['prepay_id'],false);

            $data['pay_info']      = $pay_info;
            $data['out_trade_no'] = $out_trade_no;
            return [
                'status'=>true,
                'msg'=>'ok',
                'data'=>$data
            ];
        } else {
            $return_msg = $array['return_msg'];
            return [
                'status'=>false,
                'msg'=>$return_msg,
                'data'=>[
                    'out_trade_no'=>$out_trade_no
                ]
            ];
        }

    }
}