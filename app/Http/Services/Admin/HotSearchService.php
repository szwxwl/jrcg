<?php

/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: KindService.php
 * 摘   要: 后台管理热搜业务层.
 * 作   者: 杨振华
 * 创建时间: 2019/7/1 15:45
 * $Id$
 */

namespace App\Http\Services\Admin;

use App\Http\Model\HotSearchClassModel;
use App\Http\Model\HotSearchModel;
use Illuminate\Support\Facades\Storage;

class HotSearchService
{
    /**
     * 热搜存储文件夹.
     * @var string
     */
    private $searchLoginImage = 'search_logo';

    /**
     * 加载热搜列表页.
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function getHotSearchList(array $get)
    {
        $where = function ($query) use ($get) {
            if (!empty($get['level'])) {
                $query->where('level', $get['level']);
            }

            if (!empty($get['title'])) {
                $query->where('title', 'like', "%{$get['title']}%");
            }

            if (!empty($get['is_hot'])) {
                $query->where('is_hot', 'Y');
            }
        };
        $hotSearchList = HotSearchModel::where($where)->get(['id', 'level', 'cache_key', 'title', 'hot_class', 'image', 'state', 'is_hot', 'sort', 'create_time', 'update_time'])->toArray();

        $state = ['Y' => '打开', 'N' => '关闭'];
        foreach ($hotSearchList as &$value) {
            $value['create_time']  = date('Y-m-d H:i:s', $value['create_time']);
            $value['update_time']  = date('Y-m-d H:i:s', $value['update_time']);
            $value['state']        = $state[$value['state']];
            $value['is_hot']       = $state[$value['is_hot']];
            $value['image']        = asset('storage/search_logo/' . $value['image']);
        }
        unset($value);
        return $hotSearchList;
    }

    /**
     * 获取所有类别.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function getHotSearchLevel()
    {
        return HotSearchModel::getHotSearchLevel();
    }

    /**
     * 添加热搜.
     * @param array $post
     * @param $logoFile
     * @return bool
     */
    public function insertHotSearch(array $post, $logoFile = '')
    {
        if ($logoFile->isValid()) {
            $fileName = $this->uploadSearchLogo($post['title'], $logoFile);
            if ($fileName === NULL)
                return false;

            $hotSearchModel = new HotSearchModel();

            $hotSearchModel->title        = $post['title'];
            $hotSearchModel->hot_class    = $post['hot_class'];
            $hotSearchModel->cache_key    = $post['cache_key'];
            $hotSearchModel->official_url = $post['official_url'];
            $hotSearchModel->level        = $post['level'];
            $hotSearchModel->image        = $fileName;

            if ($hotSearchModel->save() === true)
                return true;
        }

        $this->deleteSearchLogo($fileName); // 添加失败删除图片
        return false;
    }

    /**
     * 获取单条热搜.
     * @param $id
     * @return mixed
     */
    public function getHotSearchRow($id)
    {
        return HotSearchModel::where('id', $id)->firstOrFail(['id', 'level', 'cache_key', 'official_url', 'title', 'hot_class', 'image', 'state', 'is_hot'])->toArray();
    }

    /**
     * 更新热搜.
     * @param array $post
     * @param string $logoFile
     * @return bool
     */
    public function updateHotSearch(array $post, $logoFile = '')
    {
        $fileName = '';
        if (!empty($logoFile) && $logoFile->isValid()) {
            $fileName = $this->uploadSearchLogo($post['title'], $logoFile);
            if ($fileName === NULL)
                return false;
        }

        $flight = HotSearchModel::find($post['id']);

        $flight->title        = $post['title'];
        $flight->hot_class    = $post['hot_class'];
        $flight->cache_key    = $post['cache_key'];
        $flight->official_url = $post['official_url'];
        $flight->level        = $post['level'];
        $flight->state        = $post['state'];
        $flight->is_hot       = $post['is_hot'];
        empty($fileName) ?: $flight->image = $fileName; // 如果修改图片

        if ($flight->save() === true) {
            empty($fileName) ?: $this->deleteSearchLogo($post['old_image']); // 修改成功 && 修改图片
            return true;
        }
        return false;
    }

    /**
     * 更新热搜排序.
     * @param $id
     * @param $sort
     * @return bool
     */
    public function updateHotSearchSort($id, $sort)
    {
        try {
            $flight = HotSearchModel::find($id);
            $flight->sort = $sort;
            $flight->save();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * 上传热搜 logo 图片.
     * @param $kindClassTitle
     * @param $logoFile
     * @return null|string
     */
    private function uploadSearchLogo($kindClassTitle, $logoFile)
    {
        $fileName = md5($kindClassTitle . time()) . '.' . $logoFile->getClientOriginalExtension();
        if (Storage::disk('public')->putFileAs($this->searchLoginImage, $logoFile, $fileName) == $this->searchLoginImage . '/' . $fileName) {
            return $fileName;
        }
        return NULL;
    }

    /**
     * 删除热搜 logo 图片.
     * @param $fileName
     * @return bool
     */
    private function deleteSearchLogo($fileName)
    {
        return Storage::disk('public')->delete($this->searchLoginImage . '/' . $fileName);
    }
}