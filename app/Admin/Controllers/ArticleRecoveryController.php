<?php

namespace App\Admin\Controllers;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ArticleRecoveryController extends Controller
{
    use HasResourceActions;

    //is_top
    protected $status = [
        'on'  => ['value' => 1, 'text' => '上架', 'color' => 'primary'],
        'off' => ['value' => 2, 'text' => '下架', 'color' => 'primary '],
    ];

    protected $_status = ['1'=>'上架', '2'=>'下架'];

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('回收站')
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
            ->header('查看')
            ->description('详情')
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
        $grid = new Grid(new Article);
        $grid->model()->where('status', 2);

        $grid->actions(function ($actions) {
//            $actions->disableDelete();
            $actions->disableView();
        });

        $grid->disableCreateButton();
        $grid->disablePagination();
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();
//        $grid->disableActions();
        //禁止导出
        $grid->disableExport();

        $grid->title('标题');
        $grid->cateaory_id('分类')->select(Category::getCategory());
//        $grid->introduction('简介');
        $grid->sort('排序')->editable();
        $grid->click_number('浏览量');
        $grid->status('状态')->using($this->_status);

        $grid->created_at('添加时间');

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
        $show = new Show(Article::findOrFail($id));

//        $show->id('Id');
        $show->title('标题');
        $show->cateaory_id('分类')->using(Category::getCategory());

        $show->click_number('点击数量');
        $show->enclosure('附件')->file();
        $show->introduction('简介');
        $show->content('内容');

        $show->sort('排序');
        $show->status('状态')->using($this->_status);
        $show->created_at('添加时间');
        $show->updated_at('编辑时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);

        $form->tools(function (Form\Tools $tools) {

            // 去掉`查看`按钮
            $tools->disableView();

        });

        $form->text('title', '标题')->rules('required',['required'=>'名称不能为空']);
        $form->select('cateaory_id', '分类')->options(
            Category::getCategory()
        )->rules('required',['required'=>'名称不能为空']);
//        $form->number('click_number', 'Click number');
        $form->textarea('introduction', '描述');
        $form->editor('content', '内容');
        $form->file('enclosure','附件');
        $form->number('sort', '排序')->default(100);
        $form->switch('status', '状态')->states(
            $this->status
        )->default(1);

        return $form;
    }
}
