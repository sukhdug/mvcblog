<?php

return array(

    'admin/article/delete/([0-9]+)' => 'articles/delete/$1',
    'admin/article/edit/([0-9]+)' => 'articles/edit/$1',
    'admin/article/([0-9]+)' => 'admin/view/$1',
    'admin/article/add' => 'articles/add',
    'admin/page/([0-9]+)' => 'admin/index/$1',
    'users/page/([0-9]+)' => 'users/index/$1',
    'articles/page/([0-9]+)' => 'articles/index/$1',
    'articles/([0-9]+)' => 'articles/view/$1',
    'users/([0-9]+)' => 'users/view/$1',
    'articles' => 'articles/index/$1',
    'users' => 'users/index/$1',
    'about' => 'main/about',
    'contacts' => 'main/contact',
    'signup' => 'users/signup',
    'login' => 'users/login',
    'logout' => 'users/logout',
    'admin' => 'admin/index/$1',
    '' => 'main/index'

);