<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Categories_products;

class CategoryProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function fields()
    {
        return [
            'name' => "required",
            'name_en' => "required",
            'slug' => "required",
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Tiêu đề không được bỏ trống.', 
            'name_en.required' => 'Tiêu đề tiếng anh không được bỏ trống.', 
            'slug.required' => 'Đường dẫn tĩnh không được bỏ trống.',
        ];
    }


    protected function module(){
        return [
            'name' => 'Danh mục sản phẩm',
            'module' => 'cateproduct',
            'table' =>[
                'name' => [
                    'title' => 'Tiêu đề', 
                    'with' => '',
                ],
                'slug' => [
                    'title' => 'Liên kết', 
                    'with' => '',
                ],
            ]
        ];
    }

    public function index()
    {
        $data['module'] = $this->module();
        //$data['data'] = Categories::where('type', 'project_category')->get();
        $category = Categories::where('type', 'product_category')->get();
        $data['data'] = $category;
        return view("backend.{$this->module()['module']}.list_category",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Categories::where('type','product_category')->get();
        $array_id = Categories::where('type', 'product_category')->pluck('parent_id')->toArray();;
        return view("backend.{$this->module()['module']}.create_category",compact('data','array_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->fields(), $this->messages());

        $post_check_sulg = Categories::where('slug', $request->slug)->where('type', 'product_category')->first();
        if (!empty($post_check_sulg)) {
            return redirect()->back()->withInput()->withErrors(['Đường đẫn tĩnh này đã tồn tại.']);
        }

        $input = $request->all();

        $input['type'] = 'product_category';

        $input['is_display_home'] = $request->is_display_home == 1 ? 1 : null;

        $data = Categories::create($input);

        flash('Thêm mới thành công.')->success();

        return redirect()->route("{$this->module()['module']}.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['module'] = array_merge($this->module(),[
            'action' => 'update'
        ]);

        $data['categories'] = Categories::where('id', '!=', $id)->where('type', 'product_category')->get();

        $data['data'] = Categories::findOrFail($id);

        return view("backend.{$this->module()['module']}.edit_cateproduct", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->fields(), $this->messages());

        $post_check_sulg = Categories::where('slug', $request->slug)->where('id', '!=', $id)->where('type', 'product_category')->first();
        if (!empty($post_check_sulg)) {
            return redirect()->back()->withInput()->withErrors(['Đường đẫn tĩnh này đã tồn tại.']);
        }
        $input = $request->all();

        $input['is_display_home'] = $request->is_display_home == 1 ? 1 : null;

        Categories::findOrFail($id)->update($input);

        flash('Cập nhật thành công.')->success();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id)->get_child_cate();

        if(count($category)){

            flash('Xóa thành công.')->error();

            return redirect()->route('category.index');

        }else {

            Categories::destroy($id);

            flash('Xóa thành công.')->success();

            return redirect()->route('cateproduct.index');

        }
    }
}
