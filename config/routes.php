<?php
// Роуты
return [
    '/' => 'site/index',

    '/cart/delete/([0-9]+)' => 'cart/delete/$1',
    '/cart/add/([0-9]+)' => 'cart/add/$1',
    '/cart/checkout' => 'cart/checkout',
    '/cart/clear' => 'cart/clear',
    '/cart' => 'cart/index',

    '/category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    '/category/([0-9]+)' => 'catalog/category/$1',

    '/admin/product/create' => 'adminProduct/create',
    '/admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    '/admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    '/admin/product' => 'adminProduct/index',

    '/admin/category/create' => 'adminCategory/create',
    '/admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    '/admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    '/admin/category' => 'adminCategory/index',

    '/admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    '/admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    '/admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    '/admin/order' => 'adminOrder/index',

    '/admin/news/delete/([0-9]+)' => 'adminNews/delete/$1',
    '/admin/news/edit/([0-9]+)' => 'adminNews/edit/$1',
    '/admin/news/create' => 'adminNews/create',
    '/admin/news' => 'adminNews/index',

    '/admin' => 'admin/index',

    '/product/([0-9]+)' => 'product/view/$1',
    '/catalog' => 'catalog/index',
    '/catalog/page-([0-9]+)' => 'catalog/index/$1',
    '/news/view/([0-9]+)' => 'news/view/$1',
    '/news' => 'news/index',

    '/user/register' => 'user/register',
    '/user/login' => 'user/login',
    '/user/logout' => 'user/logout',

    '/cabinet/edit' => 'cabinet/edit',
    '/cabinet' => 'cabinet/index',

    '/contacts' => 'contacts/index',
    '/about' => 'about/index',


];
