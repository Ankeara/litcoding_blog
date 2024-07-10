<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\TemplateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/home', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/template', [FrontendController::class, 'template'])->name('frontend.template');
Route::get('/template-detail-html/{id}', [FrontendController::class, 'htmldetail'])->name('frontend.template-detail-html');
Route::get('/template-detail-js/{id}', [FrontendController::class, 'jsdetail'])->name('frontend.template-detail-js');
Route::get('/template-detail-react/{id}', [FrontendController::class, 'reactdetail'])->name('frontend.template-detail-react');
Route::get('/template-detail-php/{id}', [FrontendController::class, 'phpdetail'])->name('frontend.template-detail-php');
Route::get('/template-detail-laravel/{id}', [FrontendController::class, 'laraveldetail'])->name('frontend.template-detail-laravel');
Route::get('/template-detail-mysql/{id}', [FrontendController::class, 'mysqldetail'])->name('frontend.template-detail-mysql');
Route::get('/template-detail-sqlserver/{id}', [FrontendController::class, 'sqlserverdetail'])->name('frontend.template-detail-sqlserver');
Route::get('/template-detail-oracle/{id}', [FrontendController::class, 'oracledetail'])->name('frontend.template-detail-oracle');
Route::get('/template-detail-java/{id}', [FrontendController::class, 'javadetail'])->name('frontend.template-detail-java');
Route::get('/template-detail-csharp/{id}', [FrontendController::class, 'csharpdetail'])->name('frontend.template-detail-csharp');
Route::get('/template-detail-flutter/{id}', [FrontendController::class, 'flutterdetail'])->name('frontend.template-detail-flutter');
Route::get('/template-detail-python/{id}', [FrontendController::class, 'pythondetail'])->name('frontend.template-detail-python');
Route::get('/template-detail-linux/{id}', [FrontendController::class, 'linuxdetail'])->name('frontend.template-detail-linux');
Route::get('/template-detail-template/{id}', [FrontendController::class, 'templatedetail'])->name('frontend.template-detail-template');
Route::get('/template-detail-admintemplate/{id}', [FrontendController::class, 'admintemplatedetail'])->name('frontend.template-detail-admintemplate');
Route::get('/blog', [FrontendController::class, 'blog'])->name('frontend.blog');
Route::get('/blog-detail/{id}', [FrontendController::class, 'blogdetail'])->name('frontend.blog-detail');
Route::get('/download-file-html/{id}', [FrontendController::class, 'downloadFileHtml'])->name('frontend.template-download-file-html');
Route::get('/download-file-js/{id}', [FrontendController::class, 'downloadFilejs'])->name('frontend.template-download-file-js');
Route::get('/download-file-react/{id}', [FrontendController::class, 'downloadFilereact'])->name('frontend.template-download-file-react');
Route::get('/download-file-php/{id}', [FrontendController::class, 'downloadFilephp'])->name('frontend.template-download-file-php');


// Active page
Route::group(['admin'], function(){
   Route::group(['middleware' => 'guest'], function(){
       Route::get('/', [AdminController::class , 'login'])->name('backend.login');
       Route::get('/admin/register', [AdminController::class, 'registation'])->name('backend.register');
       Route::post('/admin/proccess-register', [AdminController::class, 'proccessRegistation'])->name('backend.proccessRegistation');
       Route::post('/admin/authenticate', [AdminController::class, 'authenticate'])->name('backend.authenticate');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('backend.dashboard');
        Route::get('/admin/profile', [AdminController::class, 'profile'])->name('backend.profile');
        Route::post('/admin/update-profile', [AdminController::class, 'updateprofile'])->name('backend.updateprofile');
        Route::post('/admin/update-profile-pic', [AdminController::class, 'updateProfilePic'])->name('backend.updateProfilePic');
        Route::get('/admin/logout', [AdminController::class, 'logout'])->name('backend.logout');
        // Category
        Route::get('/admin/category/view', [AdminController::class, 'viewcategory'])->name('category-add.category.view');
        Route::get('/admin/category/create', [AdminController::class, 'createcategory'])->name('category-add.category.create');
        Route::post('/admin/category/save', [AdminController::class, 'savecategory'])->name('category-add.category.save');
        Route::get('/admin/category/edit/{id}', [AdminController::class, 'editcategory'])->name('category-add.category.edit');
        Route::post('/admin/category/update/{id}', [AdminController::class, 'updatecategory'])->name('category-add.category.update');
        // Category
        // Sub category
        Route::get('/admin/subcategory/view', [AdminController::class, 'viewsubcategory'])->name('category-add.subcategory.view');
        Route::get('/admin/subcategory/create', [AdminController::class, 'createsubcategory'])->name('category-add.subcategory.create');
        Route::post('/admin/subcategory/save', [AdminController::class, 'savesubcategory'])->name('category-add.subcategory.save');
        Route::get('/admin/subcategory/edit/{id}', [AdminController::class, 'editsubcategory'])->name('category-add.subcategory.edit');
        Route::post('/admin/subcategory/update/{id}', [AdminController::class, 'updatesubcategory'])->name('category-add.subcategory.update');
        // Sub category

        // html
        Route::get('/admin/html/view', [AdminController::class, 'viewhtml'])->name('template.html.view');
        Route::get('/admin/html/create', [AdminController::class, 'createhtml'])->name('template.html.create');
        Route::post('/admin/html/save', [AdminController::class, 'savehtml'])->name('template.html.save');
        Route::get('/admin/html/edit/{id}', [AdminController::class, 'edithtml'])->name('template.html.edit');
        Route::post('/admin/html/update/{id}', [AdminController::class, 'updatehtml'])->name('template.html.update');
        Route::delete('/admin/html/delete/{id}', [AdminController::class, 'deletehtml'])->name('template.html.delete');
        // html

         // javascript
        Route::get('/admin/javascript/view', [AdminController::class, 'viewjavascript'])->name('template.javascript.view');
        Route::get('/admin/javascript/create', [AdminController::class, 'createjavascript'])->name('template.javascript.create');
        Route::post('/admin/javascript/save', [AdminController::class, 'savejavascript'])->name('template.javascript.save');
        Route::get('/admin/javascript/edit/{id}', [AdminController::class, 'editjavascript'])->name('template.javascript.edit');
        Route::post('/admin/javascript/update/{id}', [AdminController::class, 'updatejavascript'])->name('template.javascript.update');
        Route::delete('/admin/javascript/delete/{id}', [AdminController::class, 'deletejavascript'])->name('template.javascript.delete');
        // javascript

        // reactjs
        Route::get('/admin/reactjs/view', [AdminController::class, 'viewreactjs'])->name('template.reactjs.view');
        Route::get('/admin/reactjs/create', [AdminController::class, 'createreactjs'])->name('template.reactjs.create');
        Route::post('/admin/reactjs/save', [AdminController::class, 'savereactjs'])->name('template.reactjs.save');
        Route::get('/admin/reactjs/edit/{id}', [AdminController::class, 'editreactjs'])->name('template.reactjs.edit');
        Route::post('/admin/reactjs/update/{id}', [AdminController::class, 'updatereactjs'])->name('template.reactjs.update');
        Route::delete('/admin/reactjs/delete/{id}', [AdminController::class, 'deletereactjs'])->name('template.reactjs.delete');
        // reactjs

        // php
        Route::get('/admin/php/view', [AdminController::class, 'viewphp'])->name('template.php.view');
        Route::get('/admin/php/create', [AdminController::class, 'createphp'])->name('template.php.create');
        Route::post('/admin/php/save', [AdminController::class, 'savephp'])->name('template.php.save');
        Route::get('/admin/php/edit/{id}', [AdminController::class, 'editphp'])->name('template.php.edit');
        Route::post('/admin/php/update/{id}', [AdminController::class, 'updatephp'])->name('template.php.update');
        Route::delete('/admin/php/delete/{id}', [AdminController::class, 'deletephp'])->name('template.php.delete');
        // php

        // laravel
        Route::get('/admin/laravel/view', [AdminController::class, 'viewlaravel'])->name('template.laravel.view');
        Route::get('/admin/laravel/create', [AdminController::class, 'createlaravel'])->name('template.laravel.create');
        Route::post('/admin/laravel/save', [AdminController::class, 'savelaravel'])->name('template.laravel.save');
        Route::get('/admin/laravel/edit/{id}', [AdminController::class, 'editlaravel'])->name('template.laravel.edit');
        Route::post('/admin/laravel/update/{id}', [AdminController::class, 'updatelaravel'])->name('template.laravel.update');
        Route::delete('/admin/laravel/delete/{id}', [AdminController::class, 'deletelaravel'])->name('template.laravel.delete');
        // laravel

        // mysql
        Route::get('/admin/mysql/view', [AdminController::class, 'viewmysql'])->name('template.mysql.view');
        Route::get('/admin/mysql/create', [AdminController::class, 'createmysql'])->name('template.mysql.create');
        Route::post('/admin/mysql/save', [AdminController::class, 'savemysql'])->name('template.mysql.save');
        Route::get('/admin/mysql/edit/{id}', [AdminController::class, 'editmysql'])->name('template.mysql.edit');
        Route::post('/admin/mysql/update/{id}', [AdminController::class, 'updatemysql'])->name('template.mysql.update');
        Route::delete('/admin/mysql/delete/{id}', [AdminController::class, 'deletemysql'])->name('template.mysql.delete');
        // mysql

        // csharp
        Route::get('/admin/csharp/view', [AdminController::class, 'viewcsharp'])->name('template.csharp.view');
        Route::get('/admin/csharp/create', [AdminController::class, 'createcsharp'])->name('template.csharp.create');
        Route::post('/admin/csharp/save', [AdminController::class, 'savecsharp'])->name('template.csharp.save');
        Route::get('/admin/csharp/edit/{id}', [AdminController::class, 'editcsharp'])->name('template.csharp.edit');
        Route::post('/admin/csharp/update/{id}', [AdminController::class, 'updatecsharp'])->name('template.csharp.update');
        Route::delete('/admin/csharp/delete/{id}', [AdminController::class, 'deletecsharp'])->name('template.csharp.delete');
        // csharp

        // sqlserver
        Route::get('/admin/sqlserver/view', [AdminController::class, 'viewsqlserver'])->name('template.sqlserver.view');
        Route::get('/admin/sqlserver/create', [AdminController::class, 'createsqlserver'])->name('template.sqlserver.create');
        Route::post('/admin/sqlserver/save', [AdminController::class, 'savesqlserver'])->name('template.sqlserver.save');
        Route::get('/admin/sqlserver/edit/{id}', [AdminController::class, 'editsqlserver'])->name('template.sqlserver.edit');
        Route::post('/admin/sqlserver/update/{id}', [AdminController::class, 'updatesqlserver'])->name('template.sqlserver.update');
        Route::delete('/admin/sqlserver/delete/{id}', [AdminController::class, 'deletesqlserver'])->name('template.sqlserver.delete');
        // sqlserver

        // oracle
        Route::get('/admin/oracle/view', [AdminController::class, 'vieworacle'])->name('template.oracle.view');
        Route::get('/admin/oracle/create', [AdminController::class, 'createoracle'])->name('template.oracle.create');
        Route::post('/admin/oracle/save', [AdminController::class, 'saveoracle'])->name('template.oracle.save');
        Route::get('/admin/oracle/edit/{id}', [AdminController::class, 'editoracle'])->name('template.oracle.edit');
        Route::post('/admin/oracle/update/{id}', [AdminController::class, 'updateoracle'])->name('template.oracle.update');
        Route::delete('/admin/oracle/delete/{id}', [AdminController::class, 'deleteoracle'])->name('template.oracle.delete');
        // oracle

        // java
        Route::get('/admin/java/view', [AdminController::class, 'viewjava'])->name('template.java.view');
        Route::get('/admin/java/create', [AdminController::class, 'createjava'])->name('template.java.create');
        Route::post('/admin/java/save', [AdminController::class, 'savejava'])->name('template.java.save');
        Route::get('/admin/java/edit/{id}', [AdminController::class, 'editjava'])->name('template.java.edit');
        Route::post('/admin/java/update/{id}', [AdminController::class, 'updatejava'])->name('template.java.update');
        Route::delete('/admin/java/delete/{id}', [AdminController::class, 'deletejava'])->name('template.java.delete');
        // java

        // flutter
        Route::get('/admin/flutter/view', [AdminController::class, 'viewflutter'])->name('template.flutter.view');
        Route::get('/admin/flutter/create', [AdminController::class, 'createflutter'])->name('template.flutter.create');
        Route::post('/admin/flutter/save', [AdminController::class, 'saveflutter'])->name('template.flutter.save');
        Route::get('/admin/flutter/edit/{id}', [AdminController::class, 'editflutter'])->name('template.flutter.edit');
        Route::post('/admin/flutter/update/{id}', [AdminController::class, 'updateflutter'])->name('template.flutter.update');
        Route::delete('/admin/flutter/delete/{id}', [AdminController::class, 'deleteflutter'])->name('template.flutter.delete');
        // flutter

        // python
        Route::get('/admin/python/view', [AdminController::class, 'viewpython'])->name('template.python.view');
        Route::get('/admin/python/create', [AdminController::class, 'createpython'])->name('template.python.create');
        Route::post('/admin/python/save', [AdminController::class, 'savepython'])->name('template.python.save');
        Route::get('/admin/python/edit/{id}', [AdminController::class, 'editpython'])->name('template.python.edit');
        Route::post('/admin/python/update/{id}', [AdminController::class, 'updatepython'])->name('template.python.update');
        Route::delete('/admin/python/delete/{id}', [AdminController::class, 'deletepython'])->name('template.python.delete');
        // python

        // linux
        Route::get('/admin/linux/view', [AdminController::class, 'viewlinux'])->name('template.linux.view');
        Route::get('/admin/linux/create', [AdminController::class, 'createlinux'])->name('template.linux.create');
        Route::post('/admin/linux/save', [AdminController::class, 'savelinux'])->name('template.linux.save');
        Route::get('/admin/linux/edit/{id}', [AdminController::class, 'editlinux'])->name('template.linux.edit');
        Route::post('/admin/linux/update/{id}', [AdminController::class, 'updatelinux'])->name('template.linux.update');
        Route::delete('/admin/linux/delete/{id}', [AdminController::class, 'deletelinux'])->name('template.linux.delete');
        // linux

         // cplusplus
        Route::get('/admin/cplusplus/view', [AdminController::class, 'viewcplusplus'])->name('template.cplusplus.view');
        Route::get('/admin/cplusplus/create', [AdminController::class, 'createcplusplus'])->name('template.cplusplus.create');
        Route::post('/admin/cplusplus/save', [AdminController::class, 'savecplusplus'])->name('template.cplusplus.save');
        Route::get('/admin/cplusplus/edit/{id}', [AdminController::class, 'editcplusplus'])->name('template.cplusplus.edit');
        Route::post('/admin/cplusplus/update/{id}', [AdminController::class, 'updatecplusplus'])->name('template.cplusplus.update');
        Route::delete('/admin/cplusplus/delete/{id}', [AdminController::class, 'deletecplusplus'])->name('template.cplusplus.delete');
        // cplusplus

         // cprogram
        Route::get('/admin/cprogram/view', [AdminController::class, 'viewcprogram'])->name('template.cprogram.view');
        Route::get('/admin/cprogram/create', [AdminController::class, 'createcprogram'])->name('template.cprogram.create');
        Route::post('/admin/cprogram/save', [AdminController::class, 'savecprogram'])->name('template.cprogram.save');
        Route::get('/admin/cprogram/edit/{id}', [AdminController::class, 'editcprogram'])->name('template.cprogram.edit');
        Route::post('/admin/cprogram/update/{id}', [AdminController::class, 'updatecprogram'])->name('template.cprogram.update');
        Route::delete('/admin/cprogram/delete/{id}', [AdminController::class, 'deletecprogram'])->name('template.cprogram.delete');
        // cprogram

         // network
        Route::get('/admin/network/view', [AdminController::class, 'viewnetwork'])->name('template.network.view');
        Route::get('/admin/network/create', [AdminController::class, 'createnetwork'])->name('template.network.create');
        Route::post('/admin/network/save', [AdminController::class, 'savenetwork'])->name('template.network.save');
        Route::get('/admin/network/edit/{id}', [AdminController::class, 'editnetwork'])->name('template.network.edit');
        Route::post('/admin/network/update/{id}', [AdminController::class, 'updatenetwork'])->name('template.network.update');
        Route::delete('/admin/network/delete/{id}', [AdminController::class, 'deletenetwork'])->name('template.network.delete');
        // network

         // nodejs
        Route::get('/admin/nodejs/view', [AdminController::class, 'viewnodejs'])->name('template.nodejs.view');
        Route::get('/admin/nodejs/create', [AdminController::class, 'createnodejs'])->name('template.nodejs.create');
        Route::post('/admin/nodejs/save', [AdminController::class, 'savenodejs'])->name('template.nodejs.save');
        Route::get('/admin/nodejs/edit/{id}', [AdminController::class, 'editnodejs'])->name('template.nodejs.edit');
        Route::post('/admin/nodejs/update/{id}', [AdminController::class, 'updatenodejs'])->name('template.nodejs.update');
        Route::delete('/admin/nodejs/delete/{id}', [AdminController::class, 'deletenodejs'])->name('template.nodejs.delete');
        // nodejs

         // vuejs
        Route::get('/admin/vuejs/view', [AdminController::class, 'viewvuejs'])->name('template.vuejs.view');
        Route::get('/admin/vuejs/create', [AdminController::class, 'createvuejs'])->name('template.vuejs.create');
        Route::post('/admin/vuejs/save', [AdminController::class, 'savevuejs'])->name('template.vuejs.save');
        Route::get('/admin/vuejs/edit/{id}', [AdminController::class, 'editvuejs'])->name('template.vuejs.edit');
        Route::post('/admin/vuejs/update/{id}', [AdminController::class, 'updatevuejs'])->name('template.vuejs.update');
        Route::delete('/admin/vuejs/delete/{id}', [AdminController::class, 'deletevuejs'])->name('template.vuejs.delete');
        // vuejs

        // template
        Route::get('/admin/template/view', [AdminController::class, 'viewtemplate'])->name('template.template.view');
        Route::get('/admin/template/create', [AdminController::class, 'createtemplate'])->name('template.template.create');
        Route::post('/admin/template/save', [AdminController::class, 'savetemplate'])->name('template.template.save');
        Route::get('/admin/template/edit/{id}', [AdminController::class, 'edittemplate'])->name('template.template.edit');
        Route::post('/admin/template/update/{id}', [AdminController::class, 'updatetemplate'])->name('template.template.update');
        Route::delete('/admin/template/delete/{id}', [AdminController::class, 'deletetemplate'])->name('template.template.delete');
        // template

        // admintemplate
        Route::get('/admin/admintemplate/view', [AdminController::class, 'viewadmintemplate'])->name('template.admintemplate.view');
        Route::get('/admin/admintemplate/create', [AdminController::class, 'createadmintemplate'])->name('template.admintemplate.create');
        Route::post('/admin/admintemplate/save', [AdminController::class, 'saveadmintemplate'])->name('template.admintemplate.save');
        Route::get('/admin/admintemplate/edit/{id}', [AdminController::class, 'editadmintemplate'])->name('template.admintemplate.edit');
        Route::post('/admin/admintemplate/update/{id}', [AdminController::class, 'updateadmintemplate'])->name('template.admintemplate.update');
        Route::delete('/admin/admintemplate/delete/{id}', [AdminController::class, 'deleteadmintemplate'])->name('template.admintemplate.delete');
        // admintemplate

          // blog
        Route::get('/admin/blog/view', [AdminController::class, 'viewblog'])->name('blog-post.blog.view');
        Route::get('/admin/blog/create', [AdminController::class, 'createblog'])->name('blog-post.blog.create');
        Route::post('/admin/blog/save', [AdminController::class, 'saveblog'])->name('blog-post.blog.save');
        Route::get('/admin/blog/edit/{id}', [AdminController::class, 'editblog'])->name('blog-post.blog.edit');
        Route::post('/admin/blog/update/{id}', [AdminController::class, 'updateblog'])->name('blog-post.blog.update');
        Route::delete('/admin/blog/delete/{id}', [AdminController::class, 'deleteblog'])->name('blog-post.blog.delete');
        // blog
    });

});