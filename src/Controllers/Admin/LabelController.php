<?php

namespace Qihucms\UserLabel\Controllers\Admin;

use App\Admin\Controllers\Controller;
use Qihucms\UserLabel\Models\Label;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LabelController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '标签管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Label());

        $grid->model()->orderBy('id', 'desc');

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('name', __('user-label::label.name'));

        });

        $grid->column('id', __('user-label::label.id'));
        $grid->column('name', __('user-label::label.name'));

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
        $show = new Show(Label::findOrFail($id));

        $show->field('id', __('user-label::label.id'));
        $show->field('name', __('user-label::label.name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Label());

        $form->text('name', __('user-label::label.name'));

        return $form;
    }
}