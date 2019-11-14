<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: FeedbackController.php
 * 摘   要: FeedbackController.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/28 16:04
 * $Id$
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Web\FeedbackService;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * @var FeedbackService
     */
    private $feedbackService;

    /**
     * FeedbackController constructor.
     * @param FeedbackService $feedbackService
     */
    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    /**
     * 添加意见反馈.
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function addFeedback(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|between:1,1000',
            'contact' => 'alpha_dash',
        ], [
            'content.required' => '意见描述限制为1-1000字符',
            'contact.alpha_dash' => '联系方式不能空或格式不正确',
        ]);

        if ($this->feedbackService->insertFeedback($request->post()) === true)
            return back()->with('stateMessage', ['state' => '提交成功！', 'message' => '我们已收到您的反馈，感谢填写。']);

        return back()->with('stateMessage', ['state' => '提交失败！', 'message' => '反馈提交失败，请返回重新填写。']);
    }
}