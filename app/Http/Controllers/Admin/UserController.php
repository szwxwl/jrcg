<?php
/**
 * Copyright (c) 2018, 深圳网信网络科技有限公司.
 * ALL rights reserved.
 * 文件名称: UserController.php
 * 摘   要: 后台用户管理控制器
 * 作   者: 杨振华
 * 创建时间: 2019/5/11 18:08
 * $Id$
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\UserService;

class UserController extends Controller
{
    /**
     * 后台用户管理业务层.
     */
    private $userService;

    /**
     * UserController constructor.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * 后台登录.
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function loginAction(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'bail|required',
            'pass_word' => 'bail|required',
        ], [
            'user_name.required' => '请输入账号',
            'pass_word.required' => '请输入密码',
        ]);

        if ($this->userService->isUserLoginInfoCorrect($request->post('user_name'), $request->post('pass_word')) === false) {
            return back()->withErrors(['error' => '账号或密码错误']);
        }
        return redirect()->route('showHotSearchIndex');
    }

    /**
     * 退出登录.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAction()
    {
        $this->userService->flushSession();
        return redirect()->route('showAdminLogin');
    }
}