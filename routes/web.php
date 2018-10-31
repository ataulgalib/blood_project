<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

//admin rout





Route::group(['middleware'=>['auth']],function(){ 

    //Admin_portion
    //when_register_usre_make_request_to_admin about_delete_his_information
     Route::match(['get','post'],'/admin/user-info','AdminController@getUserInfo');
     Route::match(['get','post'],'/admin/view-info/{id}','AdminController@viewUserInfo');
     Route::match(['get','post'],'/admin/delete-info/{id}','AdminController@deleteUserInfo');

     //when admin add divison in database
     //Route::match(['get','post'],'/admin/divison','AdminController@Divison');
     Route::match(['get','post'],'/admin/add-divison','AdminController@addDivison');
     Route::match(['get','post'],'/admin/add-district','AdminController@addDistrict');
     Route::match(['get','post'],'/admin/add-thana','AdminController@addThana');
     Route::get('/admin/getdistric','AreaController@GetDistric')->name('getdistric');
     Route::get('/admin/getthana','AreaController@GetThana')->name('getthana');
     Route::match(['get','post'],'/admin/list-area','AdminController@lisrArea');

     //When admin public notification for user

     Route::match(['get','post'],'/admin/add-post-notification','AdminController@PostNotification');
     Route::match(['get','post'],'admin/add-last-donnetion-notification','AdminController@LastDonnetionNotification');




    
    //user_Portion
    Route::get('/user/dashbord/','UserController@dashbord');
    Route::get('/user/setting/','UserController@setting');
    Route::match(['get','post'],'/user/update-pwd','UserController@updatePassword');
    Route::get('/user/logout','UserController@logout');


    //dropdown_Divison_District_Thana
    Route::match(['get','post'],'/user/information','AreaController@information');
    Route::get('/user/getdistric','AreaController@GetDistric')->name('getdistric');
    Route::get('/user/getthana','AreaController@GetThana')->name('getthana');
    //Route::get('/user/getdivisonthana','AreaController@GetDivionThana')->name('getdivisonthana');

    //User_Information
    Route::match(['get','post'],'/user/add-information','UserInfoController@addInformation');
    Route::match(['get','post'],'/user/view-information','UserInfoController@viewInformation');
    Route::match(['get','post'],'/user/update-information/{ids}','UserInfoController@updateInformation');
    Route::match(['get','post'],'/user/doner-information','UserInfoController@donerInformation'); 

    //last_donnation_date

    Route::match(['get','post'],'/user/last-donnetion','UserInfoController@donnetionDate');
    Route::match(['get','post'],'/user/update-donnetion-date/{id}','UserInfoController@updateDonnetionDate');

    // User_post_for_help
    Route::match(['get','post'],'/user/help-post','UserHelpController@bloodpost');
    Route::match(['get','post'],'/user/view-post','UserHelpController@viewpost');
    Route::match(['get','post'],'user/view-update/{id}','UserHelpController@viewupdatePost');
    Route::match(['get','post'],'/user/post-update/{id}','UserHelpController@updatepost');
    Route::match(['get','post'],'/user/post-delete/{id}','UserHelpController@deletepost');

    //postComment

    //articelComment
    
    //User_writing
    Route::match(['get','post'],'/user/add-content','UserWritingController@addContent');
    Route::match(['get','post'],'/user/view-content','UserWritingController@viewContent');
    Route::match(['get','post'],'/user/edit-content/{id}','UserWritingController@editContent');
    Route::match(['get','post'],'/user/update-content/{id}','UserWritingController@updateContent');
    Route::match(['get','post'],'/user/delete-content/{id}','UserWritingController@deleteContent');

    //Hospital_service_with_embulance_service
    Route::get('/user/service','ServiceController@service');
    Route::match(['get','post'],'/user/add-service','ServiceController@addService');
    Route::match(['get','post'],'/user/view-service','ServiceController@viewService');
    //Route::match(['get','post'],'/user/update-service/{id}','ServiceController@updateService');
    //Route::match(['get','post'],'user/delete-service/{id}','ServiceController@deleteService');


});

//When_visitoror
Route::match(['get','post'],'/user/login','UserController@login');

//When_vigitor_register
Route::match(['get','post'],'/signup','UserController@signup');

//When_someone_visit_wib-site
Route::get('/','ViewController@view');

//When_visitor_and_user_make_post_comment
Route::match(['get','post'],'/comment/{id}','ViewController@addPostcommnet');
//When_visitor_and_user_check_post_comment
Route::match(['get','post'],'/view-comment/{id}','ViewController@viewPostcommnet');

//When_visitor_Search_Donner
Route::match(['get','post'],'/donner-list','ViewController@donnerList');
Route::get('/getdistric','ViewController@GetDistric')->name('getdistric');
Route::get('/getthana','ViewController@GetThana')->name('getthana');

//When_visitor_and_user_make_comment_in_articel
Route::match(['get','post'],'/view-tips/{cid}','ViewController@viewTips');
//When_visitor_and_user_check_articel_comment
Route::match(['get','post'],'/add-tips-comment/{id}','ViewController@addTipsCommnet');

//when_visitor_check_hospital_list
Route::match(['get','post'],'/hospital-info','ViewController@hospitalInfo');








