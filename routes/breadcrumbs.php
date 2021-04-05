<?php
// blog home
Breadcrumbs::for('bloghome',function($trail){
    $trail->push('Home',route('blog.home'));
});

//article page
Breadcrumbs::for('article',function($trail,$article){
    $trail->parent('bloghome');
    $trail->push('Blog',route('blog.article',[$article]));
});
