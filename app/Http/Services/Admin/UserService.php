<?php

/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: UserService.php
 * 摘   要: UserService.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/1 15:16
 * $Id$
 */

namespace App\Http\Services\Admin;

use Illuminate\Support\Facades\Session;

class UserService
{
    /**
     * 验证账号密码是否正确.
     * @param $userName
     * @param $passWord
     * @return bool
     */
    public function isUserLoginInfoCorrect($userName, $passWord)
    {
        if ($userName == 'jinrichigua_admin' && md5($passWord) == '0fe73d60702b528de7546a710ab371e7') {
            Session::put('user_name', $userName);
            return true;
        }
        return false;
    }

    /**
     * 清空所有 session.
     */
    public function flushSession()
    {
        return Session::flush();
    }
}