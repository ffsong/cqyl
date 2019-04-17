<?php

namespace App\Admin\Controllers;

use App\Link;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LinkController extends Controller
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
            ->header('友情链接')
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
        $grid = new Grid(new Link);

//        $grid->disablePagination();
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();

        //禁止导出
        $grid->disableExport();

//        $grid->id('Id');
        $grid->name('名称');
        $grid->icon('图标')->image('',60,40);
        $grid->url('链接地址');
        $grid->sort('排序')->editable();

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
        $show = new Show(Link::findOrFail($id));

//        $show->id('Id');
        $show->name('名称');
        $show->icon('图标');
        $show->url('链接地址');
        $show->created_at('创建时间');
        $show->updated_at('修改时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Link);

        $form->text('name', '名称')->rules('required',['required'=>'名称不能为空']);
        $form->image('icon', '图标(大小：168 X 78)')->move('links')->uniqueName()->rules('required',['required'=>'名称不能为空']);
        $form->url('url', '地址')->rules('required',['required'=>'名称不能为空']);
        $form->number('sort', '排序')->default(100)->rules('required|max:3',
            [
                'required'=>'必填项不能为空',
                'max' => '不能大于999'
            ]
        );

        return $form;
    }
}
