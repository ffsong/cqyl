<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map', 'editor']);


//添加头部按钮
Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {

    $navbar->left('<a class="navbar-brand" style="padding-top: 8px">
    <button type="button" class="btn btn-warning vertical-align  button-clear ">清除缓存</button>
    </a>
    <script>
     
        $(document).on(\'click\', \'.button-clear\', function() {
        $.post("/clearCache",{_token:LA.token},function (data) {
            toastr.success(\'操作成功\');
            $.pjax.reload(\'#pjax-container\');
            return false;
        });
});
    </script>
    '
    );

});
