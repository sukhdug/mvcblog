<?php

return array(

    'admin/article/edit/([0-9]+)' => 'admin/edit/$1',
    'admin/article/([0-9]+)' => 'admin/view/$1',
    'admin/article/add' => 'admin/add',
    'articles/page/([0-9]+)' => 'articles/index/$1',
    'article/([0-9]+)' => 'articles/view/$1',
    'articles' => 'articles/index/$1',
    'about' => 'main/about',
    'contacts' => 'main/contact',
    'signup' => 'users/signup',
    'login' => 'users/login',
    'admin' => 'admin/index',
    '' => 'main/index'

);