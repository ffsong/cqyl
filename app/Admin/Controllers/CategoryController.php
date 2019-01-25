<?php

namespace App\Admin\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Request;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use function foo\func;

class CategoryController extends Controller
{
    use HasResourceActions;


    //is_top 置顶

    protected $is_top = [
        'on'  => ['value' => 1, 'text' => '是', 'color' => 'primary'],
        'off' => ['value' => 2, 'text' => '否', 'color' => 'primary '],
    ];

    //is_right 侧栏
    protected $is_right = [
        'on'  => ['value' => 1, 'text' => '是', 'color' => 'primary'],
        'off' => ['value' => 2, 'text' => '否', 'color' => 'primary '],
    ];


    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('文章分类')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        $grid->actions(function ($actions) {

            //首页分类不能删除
            if ($actions->getKey() == 10 || $actions->getKey() == 1
                ||$actions->getKey() == 2 || $actions->getKey() == 7 ||$actions->getKey() == 9 ) {

                $actions->disableDelete();
            }

            $actions->disableView();
        });

        $grid->disablePagination();
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();

        //禁止导出
        $grid->disableExport();

        $grid->title('分类名称');
        $grid->pid('上级分类')->using(Category::getAll());
        $grid->sort('排序')->editable();
        $grid->is_top('首页置顶')->switch($this->is_top);
        $grid->is_right('首页侧栏')->switch($this->is_right);
        $grid->type('类型')->using([
            1 => '列表',
            2 => '单页',
            3 => '图片'
        ]);
        $grid->created_at('创建时间');
        $grid->updated_at('更改时间');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->pid('Pid');
        $show->sort('Sort');
        $show->status('Status');
        $show->is_top('Is top');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category);

        $form->tools(function (Form\Tools $tools) {
            // 去掉`查看`按钮
            $tools->disableView();
            $tools->disableDelete();
        });

        $id= 0;
        $param = request()->route()->parameters();
        if($param)  $id= $param['category'];

        $form->text('title', '分类名称');

        $form->select('pid', '上级分类')->options(function () use ($id){
            return Category::getAll($id);
        }
        )->default(0);
        $form->number('sort', '排序')->default(100);
//        $form->switch('status', '状态')->states($this->is_top)->default(1);
        $form->switch('is_top', '置顶（nav是否展示在首页）')->states($this->is_top)->default(2);
        $form->switch('is_right', '侧栏（是否展示在首页侧栏）')->states($this->is_right)->default(2);

        $form->radio('type','类型')->options(['1' => '列表', '2'=> '单页','3'=>'图片'])->default(1);

        return $form;
    }
}
