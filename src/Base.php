<?php
namespace chenvle;

class Base
{



    function order_number($msg = 'CM')
    {
        $result = $msg.date('YmdHis');
        $str = '1234567890';
        for ($i = 0; $i < 6; $i++) {
            $result .= $str[rand(0, 9)];
        }
        return $result;
    }


}