<?php
/**
 * 网站首页
 */

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Config;
use App\Image;
use App\Message;
use Illuminate\Http\Request;
use App\Link;

class HomeController extends Controller
{
    //分页数量
    const PAGINATE = 10;
    //公共数据
    public $common_data = [];

    public function __construct(Category $category)
    {
        //分类
        $this->common_data['categorys'] = $category->getHomeCategory();
        //banner
        $this->common_data['banners'] = Image::getBanner();
        //配置文件
        $this->common_data['config'] = Config::getConfig();
    }

    //首页
    public function index(Article $article, Category $category,Link $link)
    {
        $common_data = $this->common_data;

        $article_data = $article->getHomeArticle();

        $article_data['news'] = $category->getHomeNews();

        //新闻的第一个分类id
        $category_id = $article_data['news'][0]['id'];

        //组合首页新闻
        $article_data['news'] = $article->getNewLists($article_data['news']);

        //图片列表
        $article_data['new_img_list'] = $article->getNewListImgs($category_id);

        //合作伙伴
        $article_data['links'] = $link->getLink();
        //业务范围
        $ywfw = $category->getHomeBusiness();

        return view('index.index', compact('common_data', 'article_data','ywfw'));
    }

    //关于我们
    public function about($id)
    {
        $common_data = $this->common_data;
        $result = Article::findOrFail($id);
        return view('abouts.show', compact('common_data', 'result'));
    }

    //新闻中心
    public function news(Article $article, Category $category, $category_id, $article_id = 0)
    {

        $common_data = $this->common_data;

        $new_categorys = $category->getHomeNews();

        if (empty($article_id)) {
            $article_lists = $article->where('cateaory_id', $category_id)->where('status', 1)
                ->orderBy('sort','desc')->orderBy('id','desc')->paginate(self::PAGINATE);

            return view('news.list', compact('common_data', 'new_categorys', 'article_lists'));
        }

        $new = $article->where('cateaory_id', $category_id)->where('id', $article_id)->where('status', 1)->first();

        return view('news.show', compact('common_data', 'new_categorys', 'new'));
    }


    //业务范围
    public function business(Article $article,$id = 0)
    {
        $common_data = $this->common_data;

        $business_data = Category::where('pid',3)->get();

        //默认为该栏目的第一个分类
        if(empty($id)) $id = $business_data[0]['id'];

        $lists = $article->where('cateaory_id',$id)->get();

        return view('business.index', compact('common_data', 'business_data', 'lists', 'id'));
    }

    //企业文化
    public function culture(Article $article, Category $category, $category_id, $article_id = 0){
        $common_data = $this->common_data;

        //分类
        $sub_classification = $category->where('pid',12)->get();

        //文章
        $article_ = Article::where('cateaory_id',12)->where('status',1)
            ->select('id','cateaory_id','title')->first();

        if(empty($article_id)){
            $customer_data = $article->where('cateaory_id', $category_id)->where('status', 1)
                ->orderBy('sort', 'desc')->orderBy('id','desc')->paginate(self::PAGINATE);
            return view('culture.list',compact('common_data', 'customer_data', 'article_', 'sub_classification'));
        }

        //详情页
        $result = $article->where('cateaory_id', $category_id)->where('id', $article_id)->where('status', 1)->first();
        if($category_id == 12 ){
            return view('culture.show_', compact('common_data', 'result', 'article_' ,'sub_classification'));
        }
        return view('culture.show', compact('common_data', 'result', 'article_' ,'sub_classification'));
    }



    //行业案例
    public function customer(Article $article ,Category $category, $category_id, $id=0)
    {
        $common_data = $this->common_data;

        //处理子分类问题 如果存在子分类 重定向到第一个子分类
        $child_category = $category->where('pid',$category_id)->first();
        if(!empty($child_category)){
            return redirect()->route('industry', ['category_id' => $child_category->id]);
        }

        $sub_classification = $category->where('pid',4)->get();
        foreach ($sub_classification as $key => $value){
            $sub_classification[$key]['children'] = $category->where('pid',$value->id)->get();
        }

        if(empty($id)){
            $customer_data = $article->where('cateaory_id', $category_id)->where('status', 1)
                ->orderBy('sort', 'desc')->orderBy('id','desc')->paginate(self::PAGINATE);
            return view('customers.list', compact('common_data', 'customer_data', 'sub_classification'));
        }

        //详情页
        $result = $article->where('cateaory_id', $category_id)->where('id', $id)->where('status', 1)->first();

        return view('customers.show', compact('common_data', 'result','sub_classification'));
    }

    //联系我们
    public function contact(Article $article, $id = 0)
    {
        $common_data = $this->common_data;

        $contact_data = $article->where('cateaory_id', 5)->where('status', 1)->first();
        $contact_data['check_id'] = $id;

        return view('contacts.index', compact('common_data', 'contact_data'));
    }


    //留言提交
    public function message(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10',
            'phone' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',
            ],
            'content' => 'required|max:50',
            'captcha' => ['required', 'captcha'],
        ], [
            'name.required' => '姓名必须填写',
            'name.max' => '姓名不能大于10个字符',
            'phone.required' => '电话号码必须填写',
            'phone.regex' => '电话号码格式错误',
            'content.required' => '留言内容不能为空',
            'content.max' => '留言内容不能大于50个字符',
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',
        ]);

        Message::create($request->only(['name', 'phone', 'content']));

        return redirect('contacts')->with('status', '提交成功！');
    }

    //文件下载
    public function down(Request $request)
    {
        if ($request->id) {
            $enclosure = Article::where('id', $request->id)->value('enclosure');
            return response()->download(realpath(base_path('public/uploads')) . '/' . $enclosure);
        }
        abort(404);
    }


}
