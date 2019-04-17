<?php

namespace App\Admin\Controllers;

use App\Culture;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CultureController extends Controller
{
    use HasResourceActions;

    public $category = [1 => '企业宗旨', 2 => '职工园地', 3 => '员工风采'];

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
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
        $grid = new Grid(new Culture);

        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        //禁止导出
        $grid->disableExport();

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('title', '标题');
        });

        $grid->category('分类')->using($this->category);
        $grid->title('标题');
        $grid->image('图片')->image('',60,60);
        $grid->sort('排序')->editable();
        $grid->created_at('创建时间');
        $grid->updated_at('修改时间');

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
        $show = new Show(Culture::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->image('Image');
        $show->content('Content');
        $show->sort('Sort');
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
        $form = new Form(new Culture);

        $form->tools(function (Form\Tools $tools) {
            // 去掉`查看`按钮
            $tools->disableView();
        });

        $form->select('category','分类')->options($this->category)->default(1)->rules('required',['required'=>'必填内容不能为空']);
        $form->text('title', '标题')->rules('required',['required'=>'必填内容不能为空']);
        $form->image('image', '图片');
        $form->editor('content', '内容');
        $form->number('sort', '排序')->default(100);

        return $form;
    }
}
