<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Options;
use DateTime;
use SEO;
use SEOMeta;
use OpenGraph;
use App\Models\Menu;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Models\Image;
use JsValidator;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\Projects;
use App\Models\Products;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectCategory;
use App\Models\ProductCategory;
use App\Models\Categories;
use App\Models\MenuGroup;



class IndexController extends Controller
{

	public $config_info;
    protected $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    	$site_info = Options::where('type', 'general')->first();
        // $array = ['site_title'=>'logo','logo'=>'uploads/images/logo_header.png'];
        // echo json_encode($array);
    	$site_info = json_decode($site_info->content);
        //dd($site_info);
        if($site_info != null){
            $this->config_info = $site_info;
        }
        
        OpenGraph::setUrl(\URL::current());
        OpenGraph::addProperty('locale', 'vi');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('author', 'GCO-GROUP');

        SEOMeta::addKeyword($site_info->site_keyword);

        $menuHeader = Menu::where('id_group', 1)->orderBy('position')->get();
        $menuFooter = Menu::where('id_group', 2)->orderBy('position')->get();
        $list_news = Posts::where('status', 1)->where('type', 'blog')->orderBy('created_at', 'DESC')->take(5)->get();
        view()->share(compact('site_info', 'list_news', 'menuHeader', 'menuFooter'));
    }

    // public function test(){
    //     $model = new MenuGroup();
    //     $model->title = 'Add menu store';
    //     $model->save();
    //     //MenuGroup::create(['title'=>'Addmenustore','position'=>'fasdfdfds']);
    //     return 1;
    // }
    public function createSeo($dataSeo = null)
    {
        $site_info = $this->config_info;
        if (!empty($dataSeo->meta_title)) {
            SEO::setTitle($dataSeo->meta_title);
        } else {
            SEO::setTitle($site_info->site_title);
        }
        if (!empty($dataSeo->meta_description)) {
            SEOMeta::setDescription($dataSeo->meta_description);
            OpenGraph::setDescription($dataSeo->meta_description);
        } else {
            SEOMeta::setDescription($site_info->site_description);
            OpenGraph::setDescription($site_info->site_description);
        }
        if (!empty($dataSeo->image)) {
            OpenGraph::addImage($dataSeo->image, ['height' => 400, 'width' => 400]);
        } else {
            OpenGraph::addImage($site_info->logo_share, ['height' => 400, 'width' => 400]);
        }
        if (!empty($dataSeo->meta_keyword)) {
            SEOMeta::addKeyword($dataSeo->meta_keyword);
        }
    }

    public function createSeoPost($data)
    {
        if(!empty($data->meta_title)){
            SEO::setTitle($data->meta_title);
        }else {
            SEO::setTitle($data->name);
        }
        if(!empty($data->meta_description)){
            SEOMeta::setDescription($data->meta_description);
            OpenGraph::setDescription($data->meta_description);
        }else {
            SEOMeta::setDescription($this->config_info->site_description);
            OpenGraph::setDescription($this->config_info->site_description);
        }
        if (!empty($data->image)) {
            OpenGraph::addImage($data->image, ['height' => 400, 'width' => 400]);
        } else {
            OpenGraph::addImage($this->config_info->logo_share, ['height' => 400, 'width' => 400]);
        }
        if (!empty($data->meta_keyword)) {
            SEOMeta::addKeyword($data->meta_keyword);
        }
    }

    public function getHome()
    { 
    	$this->createSeo();
        $contentHome = Pages::where('type', 'home')->first();
        $partner = Image::where('type', 'partner')->where('status', 1)->orderBy('created_at', 'DESC')->get();
        $slider = Image::where('type', 'slider')->where('status', 1)->orderBy('created_at', 'DESC')->get();
        $postHots = Posts::where('status', 1)->where('type', 'blog')->where('hot', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        $categories = Categories::where('is_display_home', 1)->get();

        $projects_all = Projects::inRandomOrder()->where('status', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        $product_hot = Products::where(['status'=>1,'hot'=>1])->orderBy('created_at', 'DESC')->get();
    	return view('frontend.pages.index', compact('partner', 'slider', 'postHots', 'contentHome', 'categories', 'projects_all','product_hot'));
    }

    public function getListPost()
    {
        $dataSeo = Pages::where('type', 'news')->first();
        $this->createSeo($dataSeo);
        $data = Posts::where('status', 1)->where('type', 'blog')->orderBy('created_at', 'DESC')->paginate(9);
        $post_news = Posts::where('status', 1)->where('type', 'blog')->orderBy('created_at', 'DESC')->take(5)->get();
        return view('frontend.pages.archives-news', compact('dataSeo', 'data', 'post_news'));
    }

    public function getSingleNews($slug)
    {
        $data = Posts::where('type', 'blog')->where('status', 1)->where('slug', $slug)->firstOrFail();
        $this->createSeoPost($data);
        $related_posts = Posts::where('id', '!=', $data->id)
            ->where('status', 1)->inRandomOrder()->take(6)->get();
        $post_news = Posts::where('status', 1)->where('type', 'blog')->orderBy('created_at', 'DESC')->take(5)->get();
        return view('frontend.pages.single-news', compact('data', 'related_posts', 'post_news'));
    }

    public function getListProjects()
    {       
        $dataSeo = Pages::where('type', 'project')->first();
        $this->createSeo($dataSeo);
        $data = Projects::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        
        return view('frontend.pages.project_list', compact('dataSeo', 'data'));
    }

    public function getListProducts(){
        $dataSeo = Pages::where('type', 'project')->first();
        $this->createSeo($dataSeo);
        $data = Products::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $menu_pro = Categories::where(['type'=>'product_category','parent_id'=>0])->get();
        //dd($menu_pro);
        return view('frontend.pages.product_list', compact('dataSeo', 'data','menu_pro'));
    }

    public function loadMoreProject()
    {
        
        $dataSeo = Pages::where('type', 'project')->first();
        $this->createSeo($dataSeo);
        $data = Projects::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $view =  View::make('frontend.components.load_project',compact('dataSeo', 'data'));
        $reponse = array('lastpage'=>$data->lastpage(),'respon'=>(string)$view);
        return $reponse;
    }

    public function loadMoreProduct()
    {
        
        $dataSeo = Pages::where('type', 'project')->first();
        $this->createSeo($dataSeo);
        $data = Products::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $view =  View::make('frontend.components.load_project',compact('dataSeo', 'data'));
        $reponse = array('lastpage'=>$data->lastpage(),'respon'=>(string)$view);
        return $reponse;
    }

    public function loadMorePost()
    {
        
        $dataSeo = Pages::where('type', 'project')->first();
        $this->createSeo($dataSeo);
        $data = Posts::where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);
        $view =  View::make('frontend.components.load_posts',compact('dataSeo', 'data'));
        $reponse = array('lastpage'=>$data->lastpage(),'respon'=>(string)$view);
        return $reponse;
    }

    public function getSingleProject($slug)
    {
        $data = Projects::where('status', 1)->where('slug', $slug)->firstOrFail();
        $this->createSeoPost($data);
        $list_category = $data->category->pluck('id')->toArray();
       
        $list_post_related = ProjectCategory::whereIn('id_category', $list_category)->get()->pluck('id_project')->toArray();
        $project_same_category = Projects::where('id', '!=', $data->id )->where('status', 1)->whereIn('id', $list_post_related)
                ->orderBy('created_at', 'DESC')
                ->take(8)->get();
                //dd($list_post_related);
        //dd($this->menu->cate_product(6));
        return view('frontend.pages.project_detail', compact('data', 'project_same_category'));
    }

    public function getSingleProduct($slug)
    {
        $cate = Categories::where('slug',$slug)->first();
        $menu_pro = Categories::where(['type'=>'product_category','parent_id'=>0])->get();
        if($cate){
            $cas = Categories::where(['type'=>'product_category','parent_id'=>$cate->id]);
            $cate_id = $cas->pluck('id','name')->toArray();
            
            if($cate_id==null){
                $cate_id = array($cate->name=>$cate->id);
                $cate_slug = array($cate->id=>$cate->slug);
                $array = array($cate->id);
                $name_array = array($cate->name);
                $parent_name = '';
            }else{
                $cate_slug = $cas->pluck('slug','id')->toArray();
                $array = array_values($cate_id);
                $name_array = array_keys($cate_id);
                $parent_name = $cate->name;
            }
            
            $product = DB::table('products')
            ->select('products.*','category_product.*','categories.name AS cate_name',)
            ->join('category_product', 'products.id', '=', 'category_product.id_product')
            ->whereIn('id_category',$array)
            ->join('categories','category_product.id_category','=','categories.id')
            ->get()->groupBy('id_category');
            
            return view('frontend.pages.product_cate_list', compact('product','menu_pro','cate_id','parent_name','cate_slug'));
        }
        else
        $data = Products::where('status', 1)->where('slug', $slug)->firstOrFail();       
        if (Session::has('product_viewed'))
        {
            $arr = Session::get('product_viewed');
            if(!in_array($data->id,$arr)){
                array_push($arr,$data->id);
                session(['product_viewed' => $arr]);
                Session::save();
            }
        }else{
            session(['product_viewed' => [$data->id]]);
            Session::save();
        }

        $products_viewed = Products::whereIn('id',session('product_viewed'))->get();

        $this->createSeoPost($data);
        $list_category = $data->category->pluck('id')->toArray();
       
        $list_post_related = ProductCategory::whereIn('id_category', $list_category)->get()->pluck('id_product')->toArray();
        $product_same_category = Products::where('id', '!=', $data->id )->where('status', 1)->whereIn('id', $list_post_related)
                ->orderBy('created_at', 'DESC')
                ->take(8)->get();

        return view('frontend.pages.product_detail', compact('data', 'product_same_category','menu_pro','products_viewed'));
    }

    public function getCatetoryProjects($slug)
    {

        $info = Categories::where('slug', $slug)->firstOrFail();
        $data = $info->Projects()->where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $this->createSeoPost($info);
        $dataSeo = Pages::where('type', 'project')->first();
        return view('frontend.pages.archives-projects', compact('dataSeo', 'data', 'info'));
    }


    public function getContact()
    {
        $dataSeo = Pages::where('type', 'contact')->first();
        $this->createSeo($dataSeo);

        $jsValidator = JsValidator::make([
            'name' => 'required|min:5|max:50',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required|max:150',
            'content' => 'max:500',
        ],
        [
            'name.required' => 'Bạn chưa nhập họ tên.',
            'email.required' => 'Bạn chưa nhập email.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'name.min' => 'Họ tên không thể nhỏ hơn 5 ký tự.',
            'address.required' => 'Bạn chưa nhập địa chỉ.',
            'address.max' => 'Địa chỉ không được lớn hơn 150 ký tự.',
            'content.max' => 'Nội dung không được lớn hơn 500 ký tự.',
        ]);
        return view('frontend.pages.contact', compact('dataSeo', 'jsValidator'));
    }


    public function postContact(Request $request)
    {
        //dd($request->all());
        $this->validate($request,
            [
                'name'      => 'required|min:5|max:50',
                'phone'     => 'required',
                'email'     => 'required|email:rfc,dns,filter',
                'address'  => 'max:150',
                'content'   => 'max:500',
            ],[
                'name.required' => 'Bạn chưa nhập họ tên.',
                'email.required' => 'Bạn chưa nhập email.',
                'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
                'phone.required' => 'Bạn chưa nhập số điện thoại.',
                'name.min' => 'Họ tên không thể nhỏ hơn 5 ký tự.',
                'address.max' => 'Địa chỉ không được lớn hơn 150 ký tự.',
                'content.max' => 'Nội dung không được lớn hơn 500 ký tự.',

                'email.rfc' => 'Email phải là một địa chỉ email hợp lệ.',
                'email.dns' => 'Email phải là một địa chỉ email hợp lệ.',
                'email.filter' => 'Email phải là một địa chỉ email hợp lệ.',
            ]
        );
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ];
        $customer = Customer::create($data);
        $contact = new Contact;
        $contact->title = 'Liên hệ từ khách hàng';
        $contact->customer_id = $customer->id;
        $contact->type = 'contact';
        $contact->content = $request->content;
        $contact->status = 0;
        $contact->save();

        $content_email = [
            'title' => 'Liên hệ từ khách hàng',
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content,
            'address' => $request->address,
            'url' => route('contact.edit', $contact->id),
        ];

        $email_admin = getOptions('general', 'email_admin');

        
            Mail::send('frontend.mail.mail-teamplate', $content_email, function ($msg) use($email_admin) {
                $msg->from('no.reply.bot.gco@gmail.com', 'Website - Mô hình Bắc Việt');
                $msg->to($email_admin, 'Website - Mô hình Bắc Việt')->subject('Khách hàng liên hệ');
            });
        

        return redirect()->back()->with([
            'flash_message' => 'Gửi thông tin thành công, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất. Xin cảm ơn !',
        ]);
    }


    public function getServices()
    {
        $dataSeo = Pages::where('type', 'services')->first();
        $this->createSeo($dataSeo);
        return view('frontend.pages.services', compact('dataSeo'));
    }


    public function getAbout()
    {
        $dataSeo = Pages::where('type', 'about')->first();
        $this->createSeo($dataSeo);
        $projects = Projects::where('status', 1)->where('hot', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        return view('frontend.pages.about', compact('dataSeo', 'projects'));
    }


    public function getLoadMoreAjax(Request $request)
    {
        if($request->type == 'news'){
            $data = Posts::where('status', 1)->where('type', 'blog')->orderBy('created_at', 'DESC')->offset($request->limit)->take(9)->get();
            $type = 'news';
        }else {
            $type = 'project';
            if (!empty($request->id_cat)) {
                $info = Categories::find($request->id_cat);
                $data = $info->Projects()->where('status', 1)->orderBy('created_at', 'DESC')->offset($request->limit)->take(6)->get();
            }else {
                $data = Projects::where('status', 1)->orderBy('created_at', 'DESC')->offset($request->limit)->take(6)->get();
            }
        }
        if(count($data)){
            if(!empty($info)){
                return view('frontend.components.load_project', compact('type', 'data', 'info'));
            }
            return view('frontend.components.load_project', compact('type', 'data'));
        }
        return response()->json(['status' => 0]);
    }

}
