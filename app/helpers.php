<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

//分类菜单选择变深
function category_nav_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}