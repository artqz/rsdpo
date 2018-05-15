<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Главная', url('/'));
});

Breadcrumbs::register('admin', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Панель управления', url('admin'));
});

Breadcrumbs::register('admin.users', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Пользователи', url('admin/users'));
});

Breadcrumbs::register('admin.users.show', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push($user->login, url('admin/users/{id}'));
});

Breadcrumbs::register('admin.users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push('Добавить пользователя', url('admin/users/create'));
});

Breadcrumbs::register('admin.programs', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Учебные программы', url('admin/programs'));
});

Breadcrumbs::register('admin.programs.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.programs');
    $breadcrumbs->push('Добавить учебную программу', url('admin/programs/create'));
});

Breadcrumbs::register('admin.programs.show', function($breadcrumbs, $programs)
{
    $breadcrumbs->parent('admin.programs');
    $breadcrumbs->push($programs->name, url('admin/programs/{id}'));
});

Breadcrumbs::register('admin.categories', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Разделы', url('admin/categories/'));
});

Breadcrumbs::register('admin.categories.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.categories');
    $breadcrumbs->push('Добавить раздел в программу', url('admin/categories/create'));
});

Breadcrumbs::register('admin.categories.show', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('admin.categories');
    $breadcrumbs->push($category->name, url('admin/categories/{id}'));
});