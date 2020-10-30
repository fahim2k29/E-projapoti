<?php

use Illuminate\Support\Facades\Route;





Route::get('/login','HomeController@login')->name('home');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify', 'VerifyController@getVerify')->name('getVerify');
Route::post('/verify', 'VerifyController@postVerify')->name('verify');


Route::post('/response', 'Controller\ShurjopayController@response')->name('shurjopay.response');

//Not defined

//admin details
Route::get('home/admin','AdminController@index')->name('backend.admin.index');
Route::get('home/admin/create','AdminController@create')->name('backend.admin.create');
Route::get('home/admin/edit/{id}','AdminController@edit')->name('backend.admin.edit');
Route::post('home/admin/store','AdminController@store')->name('backend.admin.store');
Route::get('home/admin/delete/{offer}','AdminController@destroy')->name('backend.admin.destroy');
Route::post('home/admin/update/{offer}','AdminController@update')->name('backend.admin.update');

//Order details
Route::get('home/order','OrderController@index')->name('backend.order.index');
Route::get('home/order/shipping','OrderController@orderShipping')->name('backend.order.orderShipping');
Route::get('home/order/delivered','OrderController@deliveredOrder')->name('backend.order.deliveredOrder');
Route::get('home/order/cancel','OrderController@cancelOrder')->name('backend.order.cancelOrder');
Route::get('home/orderDetails/{id}','OrderController@orderDetails')->name('backend.orderDetails');
Route::get('home/orderStatus/{id}','OrderController@orderStatus')->name('backend.orderStatus');
Route::post('home/orderUpdate/{id}','OrderController@orderUpdate')->name('order.status.update');
Route::get('home/orderDelete/{id}','OrderController@orderDelete')->name('order.delete');


Route::get('home/admin/create','AdminController@create')->name('backend.admin.create');
Route::get('home/admin/edit/{id}','AdminController@edit')->name('backend.admin.edit');
Route::post('home/admin/store','AdminController@store')->name('backend.admin.store');
Route::get('home/admin/delete/{offer}','AdminController@destroy')->name('backend.admin.destroy');
Route::post('home/admin/update/{offer}','AdminController@update')->name('backend.admin.update');


/// Configuration Route
Route::get('/home/configuration',"ConfigurationController@configuration")->name('configuration');

Route::post('/home/configuration/update',"ConfigurationController@configurationUpdate")->name('configuration.update');

//SEO
Route::get('/home/seo',"SeoController@seoView")->name('seo');

Route::post('/home/seo/update/{id}',"SeoController@seoUpdate")->name('seo.update');


//Home Section Title
Route::get('/home/sectionTitle',"HomeSectionTitleController@sectionTitle")->name('sectiontitle');

Route::post('/home/sectionTitle/update/{id}',"HomeSectionTitleController@sectionTitleUpdate")->name('sectiontitle.update');

Route::get('/home/contactUs','HomeSectionTitleController@contactUs')->name('backend.contactus.msg');

Route::get('/home/contactUs/delete/{id}','HomeSectionTitleController@contactUsDelete')->name('backend.contactus.msg.delete');



//FQA Routes

Route::get('/home/fqa',"HomeSectionTitleController@fqa")->name('backend.fqa');

Route::get('/home/fqa/show',"HomeSectionTitleController@fqaShow")->name('backend.fqa.show');
Route::post('/home/fqa/insert',"HomeSectionTitleController@fqaInsert")->name('backend.fqa.insert');

Route::get('/home/fqa/update/{id}','HomeSectionTitleController@update')->name('fqa.update');

Route::post('/home/fqa/update/confirm/{id}','HomeSectionTitleController@updateConfirm')->name('fqa.update.confirm');

Route::get('/home/fqa/delete/{id}','HomeSectionTitleController@delete')->name('fqa.delete');



//Area Routes

Route::get('/home/area',"AreaController@area")->name('backend.area');

Route::get('/home/area/show',"AreaController@areaShow")->name('backend.area.show');
Route::post('/home/area/insert',"AreaController@areaInsert")->name('backend.area.insert');

Route::get('/home/area/update/{id}','AreaController@update')->name('area.update');

Route::post('/home/area/update/confirm/{id}','AreaController@updateConfirm')->name('area.update.confirm');

Route::get('/home/area/delete/{id}','AreaController@delete')->name('area.delete');


//Footer Routes

Route::get('/home/footerMenu',"Footer\FooterMenuController@footerMenu")->name('footermenu');

Route::post('/home/footerMenu/update/{id}',"Footer\FooterMenuController@footerMenuUpdate")->name('footermenu.update');




Route::get('/home/footer/quickPage/{id}',"Footer\FooterQuickController@quickPageOne")->name('quickPage.menu');

Route::get('/home/footer/quickPageTwo/{id}',"Footer\FooterQuickController@quickPageTwo")->name('quickPageTwo.menu');

Route::get('/home/footer/quickPageThree/{id}',"Footer\FooterQuickController@quickPageThree")->name('quickPageThree.menu');




///New Quick Section

Route::get('/home/quickFooter','QuickFooterController@index')->name('quickFooter');

Route::get('/home/quickFooter/show',"QuickFooterController@quickFooterShow")->name('backend.quickFooter.show');

Route::post('/home/quickFooter/insert',"QuickFooterController@quickFooterInsert")->name('backend.quickFooter.insert');

Route::get('/home/quickFooter/update/{id}','QuickFooterController@quickFooterUpdate')->name('quickFooter.update');

Route::post('/home/quickFooter/update/confirm/{id}','QuickFooterController@quickFooterUpdateConfrim')->name('quickFooter.update.confirm');

Route::get('/home/quickFooter/delete/{id}','Footer\FooterQuickController@quickFooterDelete')->name('quickFooter.delete');


Route::get('/QuickPage/{id}','FrontendController\HomeController@frontView')->name('quickPage.frontView');



























///Category Route
Route::get('/home/category', 'CategoryController@index')->name('category');

Route::get('/home/category/show', 'CategoryController@show')->name('category.show');

Route::post('/home/category/insert', 'CategoryController@insert')->name('category.insert');

Route::get('/home/category/update/{id}','CategoryController@update')->name('category.update');

Route::post('/home/category/update/confirm/{id}','CategoryController@updateConfirm')->name('category.update.confirm');

Route::get('/home/category/delete/{id}','CategoryController@delete')->name('category.delete');


// SubCategory Route
Route::get('/home/subcategory', 'SubCategoryController@index')->name('subcategory');

Route::get('/home/subcategory/show', 'SubCategoryController@show')->name('subcategory.show');

Route::post('/home/subcategory/insert', 'SubCategoryController@insert')->name('subcategory.insert');

Route::get('/home/subcategory/update/{id}','SubCategoryController@update')->name('subcategory.update');

Route::post('/home/subcategory/update/confirm/{id}','SubCategoryController@updateConfirm')->name('subcategory.update.confirm');

Route::get('/home/subcategory/delete/{id}','SubCategoryController@delete')->name('subcategory.delete');


//SubSubCategory Route
Route::get('/home/subsubcategory', 'SubSubCategoryController@index')->name('subsubcategory');

Route::get('/home/subsubcategory/show', 'SubSubCategoryController@show')->name('subsubcategory.show');

Route::post('/home/subsubcategory/insert', 'SubSubCategoryController@insert')->name('subsubcategory.insert');

Route::get('/home/subsubcategory/update/{id}','SubSubCategoryController@update')->name('subsubcategory.update');

Route::post('/home/subsubcategory/update/confirm/{id}','SubSubCategoryController@updateConfirm')->name('subsubcategory.update.confirm');

Route::get('/home/subsubcategory/delete/{id}','SubSubCategoryController@delete')->name('subsubcategory.delete');


//Brand Route
Route::get('/home/brand', 'BrandController@index')->name('brand');

Route::get('/home/brand/show', 'BrandController@show')->name('brand.show');

Route::post('/home/brand/insert', 'BrandController@insert')->name('brand.insert');

Route::get('/home/brand/update/{id}','BrandController@update')->name('brand.update');

Route::post('/home/brand/update/confirm/{id}','BrandController@updateConfirm')->name('brand.update.confirm');

Route::get('/home/brand/delete/{id}','BrandController@delete')->name('brand.delete');



//Products Route
Route::get('/home/product', 'ProductController@index')->name('product');

Route::get('/home/product/show','ProductController@show')->name('product.show');

Route::post('/home/product/insert', 'ProductController@insert')->name('product.insert');

Route::get('/home/product/singleDetails/{id}','ProductController@singleDetails')->name('product.singleDetails');

Route::post('/home/product/update/confirm/{id}','ProductController@updateConfirm')->name('product.update.confirm');

Route::get('/home/product/delete/{id}','ProductController@delete')->name('product.delete');

Route::get('/home/product/image/{id}','ProductController@imageDelete')->name('product.image.delete');



//dynamic dropdown
Route::post('/categoryDependSub','ProductController@categoryDependSub');
Route::post('/subCategoryDependSub','ProductController@subCategoryDependSub');



//Client Comment
Route::get('/home/ClientComment', 'ClientCommentController@index')->name('clientComment');

Route::get('/home/ClientComment/show', 'ClientCommentController@show')->name('clientComment.show');

Route::post('/home/ClientComment/insert', 'ClientCommentController@insert')->name('clientComment.insert');

Route::get('/home/ClientComment/update/{id}','ClientCommentController@update')->name('clientComment.update');

Route::post('/home/ClientComment/update/confirm/{id}','ClientCommentController@updateConfirm')->name('clientComment.update.confirm');

Route::get('/home/ClientComment/delete/{id}','ClientCommentController@delete')->name('clientComment.delete');



//Coupon
Route::get('/home/Coupon', 'CouponController@index')->name('coupon');

Route::get('/home/Coupon/create', 'CouponController@create')->name('coupon.create');

Route::post('/home/Coupon/store', 'CouponController@store')->name('coupon.store');

Route::get('/home/Coupon/delete/{id}','CouponController@delete')->name('coupon.delete');




/// Customer Routes for Backend
Route::get('/home/customers','Customer\CustomerBackendController@backendCustomer')->name('backendCustomer');

Route::get('/home/customers/show', 'Customer\CustomerBackendController@show')->name('customers.show');

Route::post('/home/customers/insert','Customer\CustomerBackendController@insert')->name('customers.insert');

Route::get('/home/customers/update/{id}','Customer\CustomerBackendController@update')->name('customers.update');

Route::post('/home/customers/update/confirm/{id}','Customer\CustomerBackendController@updateConfirm')->name('customers.update.confirm');

Route::get('/home/customers/delete/{id}','Customer\CustomerBackendController@delete')->name('customers.delete');




//Footer Pages
Route::get('/home/QuickPage', 'QuickPageController@index')->name('quickPage');

Route::get('/home/QuickPage/create', 'QuickPageController@create')->name('quickPage.create');

Route::post('/home/QuickPage/store', 'QuickPageController@store')->name('quickPage.store');

Route::get('/home/QuickPage/update/{id}','QuickPageController@update')->name('quickPage.update');

Route::post('/home/QuickPage/update/confirm/{id}','QuickPageController@updateConfirm')->name('quickPage.update.confirm');

Route::get('/home/QuickPage/delete/{id}','QuickPageController@delete')->name('quickPage.delete');








///TopBackground backend Routes

Route::get('/home/QuickPage/delete/{id}','QuickPageController@delete')->name('quickPage.delete');


///TopBackground Routes


Route::get('/home/TopBackground','TopBackgroundController@topbackground')->name('topbackground');

Route::post('/home/TopBackground/update',"TopBackgroundController@topbackgrounUpdate")->name('topbackground.update');


// Top Two Offers

Route::get('/home/TopTwoOffer','TopTwoOfferController@topTwoOffer')->name('topTwoOffer');

Route::get('/home/TopTwoOffer/show', 'TopTwoOfferController@show')->name('TopTwoOffer.show');

Route::post('/home/TopTwoOffer/insert', 'TopTwoOfferController@insert')->name('TopTwoOffer.insert');

//Route::get('/home/TopTwoOffer/update/{id}','TopTwoOfferController@update')->name('TopTwoOffer.update');

//Route::post('/home/TopTwoOffer/update/confirm/{id}','TopTwoOfferController@updateConfirm')->name('TopTwoOffer.update.confirm');

Route::get('/home/TopTwoOffer/delete/{id}','TopTwoOfferController@delete')->name('TopTwoOffer.delete');







//How To Order

Route::get('/home/HowToOrder', 'HowToOrderController@index')->name('howToOrder');

Route::get('/home/HowToOrder/create', 'HowToOrderController@create')->name('howToOrder.create');

Route::post('/home/HowToOrder/store', 'HowToOrderController@store')->name('howToOrder.store');

Route::get('/home/HowToOrder/delete/{id}','HowToOrderController@delete')->name('howToOrder.delete');

//Why People Love

Route::get('/home/whyPeopleLove', 'WhyPeopleLoveController@index')->name('whyPeopleLove');

Route::get('/home/whyPeopleLove/create', 'WhyPeopleLoveController@create')->name('whyPeopleLove.create');

Route::post('/home/whyPeopleLove/store', 'WhyPeopleLoveController@store')->name('whyPeopleLove.store');

Route::get('/home/whyPeopleLove/update/{id}','WhyPeopleLoveController@update')->name('whyPeopleLove.update');

Route::post('/home/QuickPage/update/confirm/{id}','WhyPeopleLoveController@updateConfirm')->name('whyPeopleLove.update.confirm');

Route::get('/home/whyPeopleLove/delete/{id}','WhyPeopleLoveController@destroy')->name('whyPeopleLove.delete');






//-------------------------------------------Frontend Routes---------------------------------------//



Route::get('/','FrontendController\HomeController@homeIndex');

Route::get('/category/{id}','FrontendController\HomeController@categoryView')->name('front.category.view');

Route::get('/subCategory/{id}','FrontendController\HomeController@subCategoryView')->name('front.subcategory.view');



//Products Controller

Route::post('/subSubDetails','FrontendController\ProductController@subSubDetails');

Route::get('/categoryProducts/{id}','FrontendController\ProductController@categoryProducts')->name('front.categoryproducts.view');

Route::get('/subCategoryProducts/{id}','FrontendController\ProductController@subCategoryProducts')->name('front.subCategoryproducts.view');

Route::get('/subSubProducts/{id}','FrontendController\ProductController@subSubProducts')->name('front.subsubproducts.view');

Route::get('/wholesaleProducts','FrontendController\ProductController@wholesaleProducts')->name('front.wholesaleProducts.view');

Route::get('/corporateProducts','FrontendController\ProductController@corporateProducts')->name('front.corporateProducts.view');






//Add to cart
Route::get('/add/to/cart/{product_id}','FrontendController\CartController@addtocart')->name('addtocart');

Route::get('/cart','FrontendController\CartController@cart')->name('cart');

Route::get('/cart/{coupon_name}','FrontendController\CartController@cart')->name('cart');

Route::get('/delete/from/cart/all','FrontendController\CartController@deletefromcartall')->name('deletefromcartall');

Route::get('/delete/from/cart/{cart_id}','FrontendController\CartController@deletefromcart')->name('deletefromcart');

Route::post('/update/quantity/{cart_id}','FrontendController\CartController@updateQuantity')->name('updateQuantity');

Route::post('/checkout','FrontendController\CartController@checkout')->name('checkout');

Route::post('/checkoutSubmit','FrontendController\CartController@checkoutSubmit')->name('checkoutSubmit');

Route::get('/place/order','FrontendController\CartController@placeOrder')->name('placeOrder');

Route::post('address/update/{id}', 'FrontendController\CartController@addressUpdate')->name('address.update');



//Customer Routes


Route::get('customer/login', 'Customer\LoginController@showLoginForm')->name('customer.login');
Route::post('customer/login', 'Customer\LoginController@login')->name('customer.login');
Route::get('customer/dashboard', 'CustomerController@dashboard')->name('customer.dashboard');
Route::get('customer.logout', 'CustomerController@logout')->name('customer.logout');


Route::get('customer/profile', 'FrontendController\CustomerProfileController@profile')->name('customer.profile');
Route::post('customer/profile/update/{id}', 'FrontendController\CustomerProfileController@update')->name('customer.profile.update');
Route::get('customer/changePassword', 'FrontendController\CustomerProfileController@changePassword')->name('customer.changePassword');
Route::post('customer/changePassword/store', 'FrontendController\CustomerProfileController@changePassword_store')->name('customer.changePassword_store');
Route::get('customer/orders', 'FrontendController\CustomerProfileController@customerOrders')->name('customer.orders');

Route::get('order/details/{order_id}', 'FrontendController\CustomerProfileController@orderDetails')->name('orderDetails');





///test route
Route::get('/test','FrontendController\CartController@test');

Route::get('customer/register', 'Customer\RegisterController@showRegistrationForm')->name('customer.register');
Route::post('customer/register', 'Customer\RegisterController@register')->name('customer.register');

//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
//Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
//
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


//Contact Us

Route::get('/contactUs','FrontendController\HomeController@contactUs')->name('contactUs');
Route::post('/contactUs','FrontendController\HomeController@contactUsMsg')->name('contactus.msg');


Route::get('/home/invoice/{id}','InvoiceController@createPDF')->name('invoice');

Route::get('/invoice',function (){
    return view('backend.pages.invoice');
});

/// Live Search
Route::get('/live','LiveSearchController@action')->name('product.livedata');
