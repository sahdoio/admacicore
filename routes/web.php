<?php

use Illuminate\Support\Facades\Route;

Route::get('/react', ['as' => 'contact', 'uses' => 'WebsiteController@react']);

/**
 * Website
 */
Route::group(['middleware' => 'session_verify'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'WebsiteController@home']);
    Route::get('/home', ['as' => 'home', 'uses' => 'WebsiteController@home']);
    Route::get('/history', ['as' => 'history', 'uses' => 'WebsiteController@history']);
    Route::get('/schedule', ['as' => 'schedule', 'uses' => 'WebsiteController@schedule']);
    Route::get('/album_images', ['as' => 'album_images', 'uses' => 'WebsiteController@album_images']);
    Route::get('/album_images/{id}', ['as' => 'album_images.album', 'uses' => 'WebsiteController@album_image']);
    Route::get('/album_videos', ['as' => 'album_videos', 'uses' => 'WebsiteController@album_videos']);
    Route::get('/album_videos/{id}', ['as' => 'album_videos.album', 'uses' => 'WebsiteController@album_video']);
    Route::get('/blog', ['as' => 'blog', 'uses' => 'WebsiteController@blog']);
    Route::get('/blog/post/{id}', ['as' => 'blog.post', 'uses' => 'WebsiteController@blog_post']);
    Route::get('/about', ['as' => 'about', 'uses' => 'WebsiteController@about']);
    Route::get('/services', ['as' => 'services', 'uses' => 'WebsiteController@services']);
    Route::get('/jobs', ['as' => 'jobs', 'uses' => 'WebsiteController@jobs']);
    Route::get('/jobs/{id}', ['as' => 'jobs.job', 'uses' => 'WebsiteController@job']);
    Route::get('/albums', ['as' => 'albums', 'uses' => 'WebsiteController@albums']);
    Route::get('/team', ['as' => 'team', 'uses' => 'WebsiteController@team']);
    Route::get('/clients', ['as' => 'clients', 'uses' => 'WebsiteController@clients']);
    Route::get('/contact', ['as' => 'contact', 'uses' => 'WebsiteController@contact']);
});

Route::get('/notfound', ['as' => 'notfound', 'uses' => 'WebsiteController@notfound']);

/**
 * Mail
 */
Route::post('sendMail', ['as' => 'sendMail', 'uses' => 'MailController@sendMail']);

/**
 * Access
 */
//Route::get('/notfound', ['as' => 'notfound', 'uses' => 'WebsiteController@notfound']);
Route::get('/building', ['as' => 'building', 'uses' => 'WebsiteController@building']);


/**
 *  Login routes
 */
Route::get('/admin/login', ['as' => 'admin.login', 'uses' => 'LoginController@index']);
Route::post('/admin/login/in', ['as' => 'admin.login.in', 'uses' => 'LoginController@in']);
Route::get('/admin/login/out', ['as' => 'admin.login.out', 'uses' => 'LoginController@out']);


/**
 * Protect routes from unauthenticated access
 */
Route::group(['middleware' => 'auth'], function () {
    /**
     *  Analytics routes
     */
    Route::get('/adm', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@dashboard']);
    Route::get('/panel', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@dashboard']);
    Route::get('/admin/dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@dashboard']);

    /**
     *  Content routes
     */
    Route::get('/admin/pages/home', ['as' => 'admin.pages.home', 'uses' => 'Admin\PagesController@home']);
    Route::post('/admin/pages/home/update', ['as' => 'admin.pages.home.update', 'uses' => 'Admin\PagesController@update_home']);
    Route::get('/admin/pages/history', ['as' => 'admin.pages.history', 'uses' => 'Admin\PagesController@history']);
    Route::post('/admin/pages/history/update', ['as' => 'admin.pages.history.update', 'uses' => 'Admin\PagesController@update_history']);
    Route::get('/admin/pages/contact', ['as' => 'admin.pages.contact', 'uses' => 'Admin\PagesController@contact']);
    Route::post('/admin/pages/contact/update', ['as' => 'admin.pages.contact.update', 'uses' => 'Admin\PagesController@update_contact']);

    /**
     * Banners
     */
    Route::get('/admin/banners', ['as' => 'admin.banners', 'uses' => 'Admin\BannerController@banners']);
    Route::get('/admin/banners/new', ['as' => 'admin.banners.new', 'uses' => 'Admin\BannerController@new']);
    Route::get('/admin/banners/edit/{id}', ['as' => 'admin.banners.edit', 'uses' => 'Admin\BannerController@edit']);
    Route::post('/admin/banners/create', ['as' => 'admin.banners.create', 'uses' => 'Admin\BannerController@create']);
    Route::post('/admin/banners/update/{id}', ['as' => 'admin.banners.update', 'uses' => 'Admin\BannerController@update']);
    Route::post('/admin/banners/delete/{id}', ['as' => 'admin.banners.delete', 'uses' => 'Admin\BannerController@delete']);

    /**
     * Services
     */

    // views
    Route::get('/admin/services', ['as' => 'admin.services', 'uses' => 'Admin\ServiceController@services']);
    Route::get('/admin/services/new', ['as' => 'admin.services.new', 'uses' => 'Admin\ServiceController@new']);
    Route::get('/admin/services/edit/{id}', ['as' => 'admin.services.edit', 'uses' => 'Admin\ServiceController@edit']);
    Route::post('/admin/services/create', ['as' => 'admin.services.create', 'uses' => 'Admin\ServiceController@create']);

    // ajax and post and post
    Route::get('/admin/services/table', ['as' => 'admin.services.table', 'uses' => 'Admin\ServiceController@table']);
    Route::post('/admin/services/update/{id}', ['as' => 'admin.services.update', 'uses' => 'Admin\ServiceController@update']);
    Route::post('/admin/services/delete/{id}', ['as' => 'admin.services.delete', 'uses' => 'Admin\ServiceController@delete']);
    Route::post('/admin/services/update_info', ['as' => 'admin.services.update_info', 'uses' => 'Admin\ServiceController@update_info']);


    /**
     * Album Images
     */

    // views
    Route::get('/admin/albums/images', ['as' => 'admin.album_images', 'uses' => 'Admin\AlbumImageController@albums']);
    Route::get('/admin/albums/images/new', ['as' => 'admin.album_images.new', 'uses' => 'Admin\AlbumImageController@new']);
    Route::get('/admin/albums/images/edit/{id}', ['as' => 'admin.album_images.edit', 'uses' => 'Admin\AlbumImageController@edit']);

    // ajax and post and post
    Route::post('/admin/albums/images/create', ['as' => 'admin.album_images.create', 'uses' => 'Admin\AlbumImageController@create']);
    Route::post('/admin/albums/images/create_image', ['as' => 'admin.album_images.create_image', 'uses' => 'Admin\AlbumImageController@create_image']);
    Route::post('/admin/albums/images/update/{id}', ['as' => 'admin.album_images.update', 'uses' => 'Admin\AlbumImageController@update']);
    Route::post('/admin/albums/images/delete/{id}', ['as' => 'admin.album_images.delete', 'uses' => 'Admin\AlbumImageController@delete']);


    /**
     * Album Videos
     */

    // views
    Route::get('/admin/albums/videos', ['as' => 'admin.album_videos', 'uses' => 'Admin\AlbumVideoController@albums']);
    Route::get('/admin/albums/videos/new', ['as' => 'admin.album_videos.new', 'uses' => 'Admin\AlbumVideoController@new']);
    Route::get('/admin/albums/videos/edit/{id}', ['as' => 'admin.album_videos.edit', 'uses' => 'Admin\AlbumVideoController@edit']);

    // ajax and post and post
    Route::post('/admin/albums/videos/create', ['as' => 'admin.album_videos.create', 'uses' => 'Admin\AlbumVideoController@create']);
    Route::post('/admin/albums/videos/create_video', ['as' => 'admin.album_videos.create_video', 'uses' => 'Admin\AlbumVideoController@create_video']);
    Route::post('/admin/albums/videos/update/{id}', ['as' => 'admin.album_videos.update', 'uses' => 'Admin\AlbumVideoController@update']);
    Route::post('/admin/albums/videos/delete/{id}', ['as' => 'admin.album_videos.delete', 'uses' => 'Admin\AlbumVideoController@delete']);

    /**
     * Jobs
     */

    // views
    Route::get('/admin/jobs', ['as' => 'admin.jobs', 'uses' => 'Admin\JobsController@jobs']);
    Route::get('/admin/jobs/new', ['as' => 'admin.jobs.new', 'uses' => 'Admin\JobsController@new']);
    Route::get('/admin/jobs/edit/{id}', ['as' => 'admin.jobs.edit', 'uses' => 'Admin\JobsController@edit']);

    // ajax and post and post
    Route::post('/admin/jobs/create', ['as' => 'admin.jobs.create', 'uses' => 'Admin\JobsController@create']);
    Route::post('/admin/jobs/update/{id}', ['as' => 'admin.jobs.update', 'uses' => 'Admin\JobsController@update']);
    Route::post('/admin/jobs/delete/{id}', ['as' => 'admin.jobs.delete', 'uses' => 'Admin\JobsController@delete']);

    /**
     * Members
     */

    // views
    Route::get('/admin/members', ['as' => 'admin.members', 'uses' => 'Admin\MemberController@members']);
    Route::get('/admin/members/new', ['as' => 'admin.members.new', 'uses' => 'Admin\MemberController@new']);
    Route::get('/admin/members/edit/{id}', ['as' => 'admin.members.edit', 'uses' => 'Admin\MemberController@edit']);
    Route::post('/admin/members/create', ['as' => 'admin.members.create', 'uses' => 'Admin\MemberController@create']);

    // ajax
    Route::get('/admin/members/table', ['as' => 'admin.members.table', 'uses' => 'Admin\MemberController@table']);
    Route::post('/admin/members/update/{id}', ['as' => 'admin.members.update', 'uses' => 'Admin\MemberController@update']);
    Route::post('/admin/members/delete/{id}', ['as' => 'admin.members.delete', 'uses' => 'Admin\MemberController@delete']);

    /**
     * Users
     */

    // views
    Route::get('/admin/users', ['as' => 'admin.users', 'uses' => 'Admin\UsersController@users'])->middleware('only_admin');
    Route::get('/admin/users/new', ['as' => 'admin.users.new', 'uses' => 'Admin\UsersController@new'])->middleware('only_admin');
    Route::get('/admin/users/edit/{id}', ['as' => 'admin.users.edit', 'uses' => 'Admin\UsersController@edit'])->middleware('user_and_admin');

    // ajax and post and post and post
    Route::post('/admin/users/create', ['as' => 'admin.users.create', 'uses' => 'Admin\UsersController@create'])->middleware('only_admin');
    Route::get('/admin/users/table', ['as' => 'admin.users.table', 'uses' => 'Admin\UsersController@table'])->middleware('only_admin');
    Route::post('/admin/users/update/{id}', ['as' => 'admin.users.update', 'uses' => 'Admin\UsersController@update'])->middleware('user_and_admin');
    Route::post('/admin/users/delete/{id}', ['as' => 'admin.users.delete', 'uses' => 'Admin\UsersController@delete'])->middleware('only_admin');

    /**
     * Clients
     */

    // views
    Route::get('/admin/clients', ['as' => 'admin.clients', 'uses' => 'Admin\ClientController@clients']);
    Route::get('/admin/clients/new', ['as' => 'admin.clients.new', 'uses' => 'Admin\ClientController@new']);
    Route::get('/admin/clients/edit/{id}', ['as' => 'admin.clients.edit', 'uses' => 'Admin\ClientController@edit']);

    // ajax and post and post
    Route::post('/admin/clients/create', ['as' => 'admin.clients.create', 'uses' => 'Admin\ClientController@create']);
    Route::get('/admin/clients/table', ['as' => 'admin.clients.table', 'uses' => 'Admin\ClientController@table']);
    Route::post('/admin/clients/update/{id}', ['as' => 'admin.clients.update', 'uses' => 'Admin\ClientController@update']);
    Route::post('/admin/clients/delete/{id}', ['as' => 'admin.clients.delete', 'uses' => 'Admin\ClientController@delete']);

    /**
     * Team
     */

    // views
    Route::get('/admin/team', ['as' => 'admin.team', 'uses' => 'Admin\TeamController@team']);
    Route::get('/admin/team/new', ['as' => 'admin.team.new', 'uses' => 'Admin\TeamController@new']);
    Route::get('/admin/team/edit/{id}', ['as' => 'admin.team.edit', 'uses' => 'Admin\TeamController@edit']);

    // ajax
    Route::get('/admin/team/table', ['as' => 'admin.team.table', 'uses' => 'Admin\TeamController@table']);
    Route::post('/admin/team/create', ['as' => 'admin.team.create', 'uses' => 'Admin\TeamController@create']);
    Route::post('/admin/team/update/{id}', ['as' => 'admin.team.update', 'uses' => 'Admin\TeamController@update']);
    Route::post('/admin/team/delete/{id}', ['as' => 'admin.team.delete', 'uses' => 'Admin\TeamController@delete']);

    /**
     * Department
     */

    // views
    Route::get('/admin/departments', ['as' => 'admin.departments', 'uses' => 'Admin\DepartmentController@departments']);
    Route::get('/admin/departments/new', ['as' => 'admin.departments.new', 'uses' => 'Admin\DepartmentController@new']);
    Route::get('/admin/departments/edit/{id}', ['as' => 'admin.departments.edit', 'uses' => 'Admin\DepartmentController@edit']);

    // ajax
    Route::get('/admin/departments/table', ['as' => 'admin.departments.table', 'uses' => 'Admin\DepartmentController@table']);
    Route::post('/admin/departments/create', ['as' => 'admin.departments.create', 'uses' => 'Admin\DepartmentController@create']);
    Route::post('/admin/departments/update/{id}', ['as' => 'admin.departments.update', 'uses' => 'Admin\DepartmentController@update']);
    Route::post('/admin/departments/delete/{id}', ['as' => 'admin.departments.delete', 'uses' => 'Admin\DepartmentController@delete']);

    /**
     * Schedule
     */

    // views
    Route::get('/admin/schedule', ['as' => 'admin.schedule', 'uses' => 'Admin\ScheduleController@schedule']);
    Route::get('/admin/schedule/new', ['as' => 'admin.schedule.new', 'uses' => 'Admin\ScheduleController@new']);
    Route::get('/admin/schedule/edit/{id}', ['as' => 'admin.schedule.edit', 'uses' => 'Admin\ScheduleController@edit']);

    // ajax and post and post
    Route::post('/admin/schedule/create', ['as' => 'admin.schedule.create', 'uses' => 'Admin\ScheduleController@create']);
    Route::get('/admin/schedule/table', ['as' => 'admin.schedule.table', 'uses' => 'Admin\ScheduleController@table']);
    Route::post('/admin/schedule/update/{id}', ['as' => 'admin.schedule.update', 'uses' => 'Admin\ScheduleController@update']);
    Route::post('/admin/schedule/delete/{id}', ['as' => 'admin.schedule.delete', 'uses' => 'Admin\ScheduleController@delete']);

    /**
     * Blog
     */

    // views
    Route::get('/admin/blog', ['as' => 'admin.blog', 'uses' => 'Admin\BlogController@blog']);
    Route::get('/admin/blog/new', ['as' => 'admin.blog.new', 'uses' => 'Admin\BlogController@new']);
    Route::get('/admin/blog/edit/{id}', ['as' => 'admin.blog.edit', 'uses' => 'Admin\BlogController@edit']);

    // ajax and post and post
    Route::post('/admin/blog/create', ['as' => 'admin.blog.create', 'uses' => 'Admin\BlogController@create']);
    Route::get('/admin/blog/table', ['as' => 'admin.blog.table', 'uses' => 'Admin\BlogController@table']);
    Route::post('/admin/blog/update/{id}', ['as' => 'admin.blog.update', 'uses' => 'Admin\BlogController@update']);
    Route::post('/admin/blog/delete/{id}', ['as' => 'admin.blog.delete', 'uses' => 'Admin\BlogController@delete']);

    /**
     * License
     */

    // views
    Route::get('/admin/license/{id}', ['as' => 'admin.license', 'uses' => 'Admin\LicenseController@license']);
    Route::get('/admin/license/export/{id}', ['as' => 'admin.license.export', 'uses' => 'Admin\LicenseController@export']);
    Route::get('/admin/license/template/{id}', ['as' => 'admin.license.template', 'uses' => 'Admin\LicenseController@template']);

    /**
     * Letter
     */

    // views
    Route::get('/admin/letter/{id}', ['as' => 'admin.letter', 'uses' => 'Admin\LetterController@letter']);
    Route::get('/admin/letter/export/{id}', ['as' => 'admin.letter.export', 'uses' => 'Admin\LetterController@export']);
    Route::get('/admin/letter/template/{id}', ['as' => 'admin.letter.template', 'uses' => 'Admin\LetterController@template']);
    Route::post('/admin/letter/template/update/{id}', ['as' => 'admin.letter.template.update', 'uses' => 'Admin\LetterController@templateUpdate']);

    /**
     * Documents
     */
    Route::get('/admin/docs', ['as' => 'admin.docs', 'uses' => 'Admin\DocsController@docs']);

    /**
     * Settings routes
     */
    Route::get('/admin/settings/user/{user_id}', ['as' => 'admin.settings.user', 'uses' => 'Admin\SettingsController@user']);
    Route::get('/admin/settings/users', ['as' => 'admin.settings.users', 'uses' => 'Admin\SettingsController@users']);
    Route::get('/admin/settings/preferences', ['as' => 'admin.settings.preferences', 'uses' => 'Admin\SettingsController@preferences']);
});
