<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Categories;
use App\Models\Products;
use App\Models\ProductCategory;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function fields()
    {
        return [
            'name' => 'required',
            'name_en' => 'required',
            'image' => 'required',
            'category' => 'required',
        ];
    }


    protected function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được bỏ trống.',
            'name_en.required' => 'Tên sản phẩm(tiếng anh) không được bỏ trống.',
            'image.required' => 'Bạn chưa chọn hình ảnh cho sản phẩm.',
            'category.required' => 'Bạn chưa chọn danh mục sản phẩm.'
        ];
    }


    protected function module(){
        return [
            'name' => 'Danh sách sản phẩm',
            'module' => 'products',
            'table' =>[
                'image' => [
                    'title' => 'Hình ảnh', 
                    'with' => '70px',
                ],
                'name' => [
                    'title' => 'Tên sản phẩm', 
                    'with' => '',
                ],
                'category' => [
                    'title' => 'Danh mục sản phẩm', 
                    'with' => '200px',
                ],
                
                'status' => [
                    'title' => 'Trạng thái', 
                    'with' => '100px',
                ],
                'price' => [
                    'title' => 'Giá', 
                    'with' => '100px',
                ],
            ]
        ];
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $list_products = Products::orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_products)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                })->addColumn('image', function ($data) {
                    return '<img src="' . $data->image . '" class="img-thumbnail" width="50px" height="50px">';
                })->addColumn('name', function ($data) {
                    return $data->name;
                })->addColumn('category', function ($data) {
                    //return 'category';
                    $label = null;
                    if(count($data->category)){
                        foreach ($data->category as $item) {
                            $label = $label. '<span class="label label-success">'.$item->name.'</span><br>';
                        }
                    }
                    return $label;
                })->addColumn('status', function ($data) {
                    if ($data->status == 1) {
                        $status = ' <span class="label label-success">Hiển thị</span>';
                    } else {
                        $status = ' <span class="label label-danger">Không hiển thị</span>';
                    }
                    if ($data->hot) {
                        $status = $status . ' <span class="label label-primary">Nổi bật</span>';
                    }
                    return $status;
                })->addColumn('action', function ($data) {
                    return '<a href="' . route('products.edit', ['id' => $data->id ]) . '" title="Sửa">
                            <i class="fa fa-pencil fa-fw"></i> Sửa
                        </a> &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="btn-destroy" 
                            data-href="' . route('products.destroy', $data->id) . '"
                            data-toggle="modal" data-target="#confim">
                            <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                        ';
                })->rawColumns(['checkbox', 'image', 'status', 'action', 'name', 'category','price'])
                ->addIndexColumn()
                ->make(true);
        }
        $data['module'] = $this->module();
        return view("backend.{$this->module()['module']}.listproducts", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['module'] = $this->module();
        $data['categories'] = Categories::where('type', 'product_category')->get();
        $data['array_id'] = Categories::where('type', 'product_category')->pluck('parent_id')->toArray();
        return view("backend.{$this->module()['module']}.create", $data);
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

        $input = $request->all();
        $input['more_image'] = !empty($request->gallery) ? json_encode($request->gallery) : null;
        $input['status'] = $request->status == 1 ? 1 : null;
        $input['hot'] = $request->hot == 1 ? 1 : null;
        $input['id_category'] = $request->category;
        $input['slug'] = $this->createSlug(str_slug($request->name));
        // if(empty($request->category)){
        //     return 'B'
        // }
        $product = Products::create($input);
        // if(!empty($request->category)){

        //     foreach ($request->category as $item) {
                ProductCategory::create(['id_category'=> $request->category, 'id_product'=> $product->id]);
        //     }
        // }


        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.create', $product);
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
        $data['categories'] = Categories::where('type','product_category')->get();
        $data['data'] = Products::findOrFail($id);
        $data['array_id'] = Categories::where('type', 'product_category')->pluck('parent_id')->toArray();
        $data['id_category'] = $data['data']->category()->first()->pivot->id_category;
        return view("backend.{$this->module()['module']}.editproduct", $data);
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

        $input = $request->all();
        $input['more_image'] = !empty($request->gallery) ? json_encode($request->gallery) : null;
        $input['status'] = $request->status == 1 ? 1 : null;
        $input['hot'] = $request->hot == 1 ? 1 : null;
        $input['pr_code'] = $request->pr_code;

        $project = Products::findOrFail($id)->update($input);

        // if(!empty($request->category)){
            ProductCategory::where('id_product', $id )->update(array('id_category' => $request->category));
        //     foreach ($request->category as $item) {
        //         ProductCategory::create(['id_category'=> $item, 'id_product'=> $id ]);
        //     }
        // }

        flash('Cập nhật thành công.')->success();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::destroy($id);

        flash('Xóa thành công.')->success();

        return redirect()->back();
    }
    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Products::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }
    public function getAjaxSlug(Request $request)
    {
        $slug = str_slug($request->slug);
        $id = $request->id;
        $post = Products::find($id);
        $post->slug = $this->createSlug($slug, $id);
        $post->save();
        return $this->createSlug($slug, $id);
    }

    public function createSlug($slugPost, $id = null)
    {
        $slug = $slugPost;
        $index = 1;
        $baseSlug = $slug;
        while ($this->checkIfExistedSlug($slug, $id)) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        return $slug;
    }


    public function checkIfExistedSlug($slug, $id = null)
    {
        if($id != null) {
            $count = Products::where('id', '!=', $id)->where('slug', $slug)->count();
            return $count > 0;
        }else{
            $count = Products::where('slug', $slug)->count();
            return $count > 0;
        }
    }
}
