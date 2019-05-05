<?php

namespace App\Admin\Controllers;

use App\Image;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ImageController extends Controller
{
    use HasResourceActions;

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
        $grid = new Grid(new Image);

        $grid->actions(function ($actions) {

            $actions->disableView();
        });
        //禁止导出
        $grid->disableExport();

        $grid->name('名称');
        $grid->url('路径')->image();
        $grid->small_url('小屏路径')->image();
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
        $show = new Show(Image::findOrFail($id));

        $show->id('Id');
        $show->url('Url');
        $show->type('Type');
        $show->name('Name');
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
        $form = new Form(new Image);

        $form->tools(function (Form\Tools $tools) {
            // 去掉`查看`按钮
            $tools->disableView();
        });

        $form->text('name', '图片名称')->rules('required',['required'=>'必填内容不能为空']);

        $form->image('url', '大屏')->move('banners')->uniqueName()->rules('required',['required'=>'必填内容不能为空']);
        $form->image('small_url', '小屏')->move('banners')->uniqueName()->rules('required',['required'=>'必填内容不能为空']);

        return $form;
    }
}
