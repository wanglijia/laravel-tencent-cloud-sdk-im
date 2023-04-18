<?php

namespace Pqf\TencentCloudSdkIm;

use Illuminate\Support\Facades\Facade as LaravelFacade;
use QcloudIM\Crypt\TLSSigAPIv2;

class TencentCloudSdkIm extends LaravelFacade
{
    public static function getFacadeAccessor()
    {
        return new Tim(config('tencentsdkim'));
    }

    /**
     * 帐号
     * @return \QcloudIM\Api\Account
     */
    public static function Account()
    {
        return self::getFacadeRoot()->Account();
    }

    /**
     *资料管理
     * @return \QcloudIM\Api\Profile
     */
    public static function Profile()
    {
        return self::getFacadeRoot()->Profile();
    }

    /**
     * 朋友
     * @return \QcloudIM\Api\Friend
     */
    public static function Friend()
    {
        return self::getFacadeRoot()->Friend();
    }

    /**
     * 关系链管理(好友黑名单)
     * @return \QcloudIM\Api\FriendBlacklist
     */
    public static function FriendBlacklist()
    {
        return self::getFacadeRoot()->FriendBlacklist();
    }

    /**
     * 群组管理
     * @return \QcloudIM\Api\Group
     */
    public static function Group()
    {
        return self::getFacadeRoot()->Group();
    }

    /**
     * 群组管理(消息)
     * @return \QcloudIM\Api\GroupMessage
     */
    public static function GroupMessage()
    {
        return self::getFacadeRoot()->GroupMessage();
    }

    /**
     * 单聊管理
     * @return \QcloudIM\Api\ChatMessage
     */
    public static function ChatMessage()
    {
        return self::getFacadeRoot()->ChatMessage();
    }

    /**
     * 群组管理(导入相关)
     * @return \QcloudIM\Api\ImportGroup
     */
    public static function ImportGroup()
    {
        return self::getFacadeRoot()->ImportGroup();
    }

    /**
     * 全局管理
     * @return \QcloudIM\Api\GlobalConfig
     */
    public static function GlobalConfig()
    {
        return self::getFacadeRoot()->GlobalConfig();
    }

    /**
     * 获取 user sig
     * @param int $user_id 用户id
     * @param int $expire 有效时间(s)
     * @return string
     */
    public static function GenUserSig($user_id,$expire=24*60*60)
    {
        $config = config('tencentsdkim');
        $m = new TLSSigAPIv2($config['sdkappid'], $config['secret']);
        // 有效期一天
        return $m->genSig($user_id, $expire);
    }
}
