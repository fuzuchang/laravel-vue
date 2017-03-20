<?php
namespace App\Api\V1\Auth\Response;
/**
 * Created by PhpStorm.
 * User: Felix
 * Email: felix@1201.us
 * Date: 2017/3/17
 * Time: 15:25
 */
class AuthStatus
{
    const SUCCESS           = 0;
    const UNAUTHENTICATED   = 40001;
    const INVALID_PARAM     = 40002;


    public static function statusDesc()
    {
        return [
            static::SUCCESS         => '请求成功',
            static::UNAUTHENTICATED => '未认证',
            static::INVALID_PARAM   => '无效参数',
        ];
    }


    public static function getStatusDesc($status)
    {
        $statusDesc =  static::statusDesc();

        if ( isset( $statusDesc[ $status ] ) ){
            return $statusDesc[ $status ];
        }

        return null;

    }
}