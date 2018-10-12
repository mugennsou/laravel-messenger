<?php

return [

    'timeout' => 5.0,

    'default' => [

        'strategy' => Overtrue\EasySms\Strategies\OrderStrategy::class,

        'gateways' => [
        ],

    ],

    'gateways' => [

        /**
         * https://www.aliyun.com
         */
        'aliyun'       => [
            'access_key_id'     => env('MESSENGER_ALIYUN_ACCESS_KEY_ID'),
            'access_key_secret' => env('MESSENGER_ALIYUN_ACCESS_KEY_SECRET'),
            'sign_name'         => env('MESSENGER_ALIYUN_SIGN_NAME'),
        ],

        /**
         * https://www.aliyun.com
         */
        'aliyunrest'   => [
            'app_key'        => env('MESSENGER_ALIYUN_REST_APP_KEY'),
            'app_secret_key' => env('MESSENGER_ALIYUN_REST_APP_SECRET_KEY'),
            'sign_name'      => env('MESSENGER_ALIYUN_REST_SIGN_NAME'),
        ],

        /**
         * https://www.yunpian.com
         */
        'yunpian'      => [
            'api_key' => env('MESSENGER_YUNPIAN_API_KEY'),
        ],

        /**
         * https://www.mysubmail.com
         */
        'submail'      => [
            'app_id'  => env('MESSENGER_SUBMAIL_APP_ID'),
            'app_key' => env('MESSENGER_SUBMAIL_APP_KEY'),
            'project' => env('MESSENGER_SUBMAIL_PROJECT'),
        ],

        /**
         * https://luosimao.com
         */
        'luosimao'     => [
            'api_key' => env('MESSENGER_LUOSIMAO_API_KEY'),
        ],

        /**
         * http://www.yuntongxun.com
         */
        'yuntongxun'   => [
            'app_id'         => env('MESSENGER_YUNTONGXUN_APP_ID'),
            'account_sid'    => env('MESSENGER_YUNTONGXUN_ACCOUNT_SID'),
            'account_token'  => env('MESSENGER_YUNTONGXUN_ACCOUNT_TOKEN'),
            'is_sub_account' => false,
        ],

        /**
         * http://www.ihuyi.com
         */
        'huyi'         => [
            'api_id'  => env('MESSENGER_HUYI_API_ID'),
            'api_key' => env('MESSENGER_HUYI_API_KEY'),
        ],

        /**
         * https://www.juhe.cn
         */
        'juhe'         => [
            'app_key' => env('MESSENGER_JUHE_APP_KEY'),
        ],

        /**
         * http://www.sendcloud.net
         */
        'sendcloud'    => [
            'sms_user'  => env('MESSENGER_SENDCLOUD_SMS_USER'),
            'sms_key'   => env('MESSENGER_SENDCLOUD_SMS_KEY'),
            'timestamp' => false, // 是否启用时间戳
        ],

        /**
         * https://cloud.baidu.com
         */
        'baidu'        => [
            'ak'        => env('MESSENGER_BAIDU_AK'),
            'sk'        => env('MESSENGER_BAIDU_SK'),
            'invoke_id' => env('MESSENGER_BAIDU_INVOKE_ID'),
            'domain'    => env('MESSENGER_BAIDU_DOMAIN'),
        ],

        /**
         * http://www.ipyy.com
         */
        'huaxin'       => [
            'user_id'  => env('MESSENGER_HUAXIN_USER_ID'),
            'password' => env('MESSENGER_HUAXIN_PASSWORD'),
            'account'  => env('MESSENGER_HUAXIN_ACCOUNT'),
            'ip'       => env('MESSENGER_HUAXIN_IP'),
            'ext_no'   => env('MESSENGER_HUAXIN_EXT_NO'),
        ],

        /**
         * https://www.253.com
         * Overtrue\EasySms\Gateways\ChuanglanGateway::CHANNEL_VALIDATE_CODE
         * Overtrue\EasySms\Gateways\ChuanglanGateway::CHANNEL_PROMOTION_CODE
         */
        'chuanglan'    => [
            'account'     => env('MESSENGER_CHUANGLAN_ACCOUNT'),
            'password'    => env('MESSENGER_CHUANGLAN_PASSWORD'),
            'channel'     => Overtrue\EasySms\Gateways\ChuanglanGateway::CHANNEL_VALIDATE_CODE,
            'sign'        => '【通讯云】',
            'unsubscribe' => '回TD退订',
        ],

        /**
         * http://www.rongcloud.cn
         */
        'rongcloud'    => [
            'app_key'    => env('MESSENGER_RONGCLOUD_APP_KEY'),
            'app_secret' => env('MESSENGER_RONGCLOUD_APP_SECRET'),
        ],

        /**
         * http://www.85hu.com
         */
        'tianyiwuxian' => [
            'username' => env('MESSENGER_TIANYIWUXIAN_USERNAME'),
            'password' => env('MESSENGER_TIANYIWUXIAN_PASSWORD'),
            'gwid'     => env('MESSENGER_TIANYIWUXIAN_GWID'),
        ],

        /**
         * https://www.twilio.com
         */
        'twilio'       => [
            'account_sid' => env('MESSENGER_TWILIO_ACCOUNT_SID'),
            'from'        => env('MESSENGER_TWILIO_FROM'),
            'token'       => env('MESSENGER_TWILIO_TOKEN'),
        ],

        /**
         * https://cloud.tencent.com/product/sms
         */
        'qcloud'       => [
            'sdk_app_id' => env('MESSENGER_QCLOUD_SDK_APP_ID'),
            'app_key'    => env('MESSENGER_QCLOUD_APP_KEY'),
            'sign_name'  => env('MESSENGER_QCLOUD_SIGN_NAME'),
        ],

        /**
         * http://www.avatardata.cn
         */
        'avatardata'   => [
            'app_key' => env('MESSENGER_AVATARDATA_APP_KEY'),
        ],

    ],
];
