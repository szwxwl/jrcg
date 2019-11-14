<?php
/**
 * Copyright (c) 2018, 北京博习园教育科技有限公司.
 * ALL rights reserved.
 * 文件名称: KindController.php
 * 摘   要: KindController.php
 * 作   者: 杨振华
 * 创建时间: 2019/7/4 9:58
 * $Id$
 */


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\HotSearchService;
use Illuminate\Http\Request;
use Validator;

class HotSearchController extends Controller
{
    /**
     * 热搜业务层.
     * @var KindService
     */
    private $hotSearchService;

    /**
     * HotSearchController constructor.
     */
    public function __construct(HotSearchService $hotSearchService)
    {
        $this->hotSearchService = $hotSearchService;
    }

    /**
     * 加载热搜列表.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function showHotSearchIndex(Request $request)
    {
        $hotSearchList = $this->hotSearchService->getHotSearchList($request->all());
        return view('admin.index', ['data' => $hotSearchList, 'level' => $this->hotSearchService->getHotSearchLevel()]);
    }

    /**
     * 加载添加热搜页面.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function showHotSearchAdd()
    {
        return view('admin.hot_search_add', ['level' => $this->hotSearchService->getHotSearchLevel()]);
    }

    /**
     * 添加热搜.
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function hotSearchAddAction(Request $request)
    {
        $this->validate($request, [
            'title'        => 'required',
            'hot_class'    => 'required',
            'cache_key'    => 'required',
            'official_url' => 'url',
            'level'        => 'in:' . implode(',',$this->hotSearchService->getHotSearchLevel()),
            'image'        => 'bail|required|mimetypes:image/jpeg,image/png|dimensions:width=90,height=90',
        ], [
            'title.required'     => '名称不能为空',
            'hot_class.required' => '热榜类型不能为空',
            'cache_key.required' => '缓存key不合法',
            'official_url.url'   => '请输入正确的url地址',
            'level.regex'        => '热搜分类值不合法',
            'image.required'     => '热搜图片不能为空',
            'image.mimetypes'    => '热搜图片必须是90*90的JPG,PNG格式',
            'image.dimensions'   => '热搜图片必须是90*90的JPG,PNG格式',
        ]);

        if ($this->hotSearchService->insertHotSearch($request->post(), $request->file('image')) === true)
            return redirect()->route('showHotSearchIndex');

        return back()->with('stateMessage', '添加失败');
    }

    /**
     * 加载修改热搜视图.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|\think\response\View
     */
    public function showHotSearchEdit($id)
    {
        $hotSearchRow = $this->hotSearchService->getHotSearchRow($id);
        if ($hotSearchRow) {
            return view('admin.hot_search_edit', ['data' => $hotSearchRow, 'level' => $this->hotSearchService->getHotSearchLevel()]);
        }
        return back();
    }

    /**
     * 修改热搜.
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function hotSearchEditAction(Request $request)
    {
        $this->validate($request, [
            'id'           => 'regex:[^[1-9][0-9]*$]',
            'title'        => 'required',
            'hot_class'    => 'required',
            'cache_key'    => 'required',
            'official_url' => 'url',
            'level'        => 'in:' . implode(',', $this->hotSearchService->getHotSearchLevel()),
            'state'        => 'in:Y,N',
        ], [
            'id.regex'           => '没有此热搜',
            'title.required'     => '名称不能为空',
            'hot_class.required' => '热榜类型不能为空',
            'cache_key.required' => '缓存key不合法',
            'official_url.url'   => '请输入正确的url地址',
            'level.regex'        => '热搜分类值不合法',
            'state.in'           => '状态值不合法',
        ]);

        // 如果有图片上传则验证图片
        $requestFile = $request->file('image');
        if (!empty($requestFile)) {
            $this->validate($request, [
                'image' => 'required|mimetypes:image/jpeg,image/png|dimensions:width=90,height=90',
                'old_image' => 'required',
            ], [
                'image.mimetypes' => '热搜图片必须是90*90的JPG,PNG格式',
                'image.dimensions'=> '热搜图片必须是90*90的JPG,PNG格式',
                'old_image.required' => '旧图片丢失,无法修改图片'
            ]);
        } else {
            $requestFile = '';
        }

        if ($this->hotSearchService->updateHotSearch($request->post(), $requestFile) === true)
            return back()->with('stateMessage', '修改成功');

        return back()->with('stateMessage', '修改失败');
    }

    /**
     * 热搜排序.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function hotSearchSortEditAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'regex:[^[1-9][0-9]*$]',
            'sort' => 'regex:[^[1-9][0-9]*$]|digits_between:1,2',
        ],[
            'id.regex' => '没有此热搜',
            'sort.regex' => '排序值不合法',
            'sort.digits_between' => '排序值不合法',
        ]);
        $errors = $validator->errors();
        if ($errors->all()) {
            return response()->json(['code' => '1001', 'state' => 'error', 'message' => $errors->first()]);
        }

        if ($this->hotSearchService->updateHotSearchSort($request->get('id'), $request->get('sort'))) {
            return response()->json(['code' => '0', 'state' => 'success', 'message' => '修改成功']);
        }
        return response()->json(['code' => '1001', 'state' => 'error', 'message' => '修改失败']);
    }
}