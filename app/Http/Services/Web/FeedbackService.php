<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: FeedbackService.php
 * 摘   要: FeedbackService.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/28 16:28
 * $Id$
 */

namespace App\Http\Services\Web;

use App\Http\Model\FeedbackModel;
use Illuminate\Support\Facades\Storage;

class FeedbackService
{
    /**
     * 添加热搜.
     * @param array $post
     * @return bool
     */
    public function insertFeedback(array $post)
    {
        // 如果图片上传
        $fileName = '';
        if (!empty($post['feedback_image']) && preg_match('/^(data:\s*image\/(\w+);base64,)/', $post['feedback_image'], $result)) {
            $fileName = md5(time()) . '.jpg';
            $feedbackImagePath = storage_path('app/public/feedback/');
            if (!file_exists($feedbackImagePath)) {
                mkdir($feedbackImagePath, 0777, true);
            }
            $uploadPath =  $feedbackImagePath . $fileName;
            file_put_contents($uploadPath, base64_decode(str_replace($result[1], '', $post['feedback_image'])));
        }

        $feedbackModel = new FeedbackModel();

        $feedbackModel->content = $post['content'];
        $feedbackModel->contact = $post['contact'];
        $feedbackModel->image   = $fileName;

        if ($feedbackModel->save() === true) {
            return true;
        } elseif ($fileName != '') {
            Storage::disk('public')->delete($uploadPath);
        }
        return false;
    }
}