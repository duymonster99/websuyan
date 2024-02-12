<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\MenuManageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostManageController;
use App\Http\Controllers\PostProcedureController;
use App\Http\Controllers\PostProjectController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ScheduleOpenningController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserMenu1Controller;
use App\Http\Controllers\UserpageController;
use App\Http\Controllers\UserRouteController;
use App\Models\Category;
use App\Models\Menu1;
use Illuminate\Support\Facades\Route;

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

/*
    -------------------------------------------------------------------------------------------
    user page
    -------------------------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'showHome'])->name("user.home");

// ----------------------------------------------------- Search
Route::get('search', [HomeController::class, 'search'])->name('user.search');

// ----------------------------------------------------- Login
Route::get('/dang-nhap', [AccountController::class, 'show_form_login'])->name("user.login.form");
Route::post('/dang-nhap', [AccountController::class, 'login'])->name("user.login");
Route::get('/dang-ky', [AccountController::class, 'show_form_signup'])->name("user.signup");
Route::post('/dang-ky', [AccountController::class, 'store'])->name("user.sign-up");
Route::get('/xac-thuc-tai-khoan/{email}', [AccountController::class, 'verify_account'])->name("user.verify.acc");
Route::get('/quen-mat-khau', [AccountController::class, 'forget_pass'])->name("acc.forget");
Route::post('/quen-mat-khau/success', [AccountController::class, 'forget_pass_success'])->name("acc.forget.success");
Route::get('/nhap-mat-khau-moi/{email}/{token}', [AccountController::class, 'reset_pass'])->name("acc.reset.pass");
Route::post('/nhap-mat-khau-moi', [AccountController::class, 'new_pass'])->name("acc.new.pass");
Route::get('/resubmit-email', [AccountController::class, 'resubmit_email'])->name("acc.resubmit.mail");
Route::get('/dang-xuat', [AccountController::class, 'logout'])->name("acc.logout");

Route::get('auth/google', [AccountController::class, 'redirectGoogle'])->name("acc.login.gg");
Route::get('/auth/google/callback', [AccountController::class, 'loginGoogle']);
Route::get('auth/facebook', [AccountController::class, 'redirectFacebook'])->name("acc.login.fb");
Route::get('/auth/facebook/callback', [AccountController::class, 'loginFacebook']);




/*
    --------------------------------------------------------------------------------------------------------
    ADMIN PAGE
    --------------------------------------------------------------------------------------------------------
*/
Route::prefix('/admin')->group(function(){
    // ------------------------------------------------------------------------------------ DASHBOARD
    Route::get('', [AdminController::class, 'dashboard'])->name("admin.dashboard");
    Route::post('/search', [AdminController::class, 'search'])->name("admin.search");

    // ------------------------------------------------------------------------------------ MENU MANAGE

    Route::get('/quan-ly-danh-muc', [MenuManageController::class, 'index'])->name("admin.menu");

    Route::get('/them-danh-muc', [MenuManageController::class, 'create'])->name("admin.create.level2");
    Route::post('/them-danh-muc', [MenuManageController::class, 'store'])->name("admin.store.level2");
    Route::get('/cap-nhat-danh-muc/{id}', [MenuManageController::class, 'edit'])->name("admin.edit.level2");
    Route::put('/cap-nhat-danh-muc/{id}', [MenuManageController::class, 'update'])->name("admin.update.level2");
    Route::get('/xoa-danh-muc/{id}', [MenuManageController::class, 'delete'])->name("admin.delete.level2");

    // ------------------------------------------------------------------------------------ POST MANAGE
    Route::get('/quan-ly-bai-viet', [PostManageController::class, 'index'])->name("admin.post");
    Route::get('/them-bai-viet', [PostManageController::class, 'createPost'])->name("admin.create.post");
    Route::post('/them-bai-viet', [PostManageController::class, 'store'])->name("admin.store.post");
    Route::post('/upload', [PostManageController::class, 'upload'])->name("admin.store.upload");
    Route::get('/cap-nhat-bai-viet/{id}', [PostManageController::class, 'edit'])->name("admin.edit.post");
    Route::put('/cap-nhat-bai-viet/{id}', [PostManageController::class, 'update'])->name("admin.update.post");
    Route::get('/xoa-bai-viet/{id}', [PostManageController::class, 'delete'])->name("admin.delete.post");
    Route::get('/hien-thi-bai-viet-len-trang-chu', [PostManageController::class, 'change_status_home'])->name("show.post.home");
    Route::get('/hien-thi-bai-viet-len-trang-chinh', [PostManageController::class, 'change_status_page'])->name("show.post.page");
    Route::get('/hien-thi-banner', [PostManageController::class, 'change_status_banner'])->name("show.banner.page");
    Route::get('/giam-stt', [PostManageController::class, 'change_decrease_stt'])->name("decrease.stt.post");
    Route::get('/tang-stt', [PostManageController::class, 'change_increase_stt'])->name("increase.stt.post");


    // ------------------------------------------------------------------------------------ USER MANAGE
    Route::get('/account-manage', [AdminController::class, 'acc_manage'])->name("acc.manage");
    Route::get('/account-edit/{id}', [AdminController::class, 'acc_edit'])->name("acc.edit");
    Route::put('/account-edit/{id}', [AdminController::class, 'acc_update'])->name("acc.update");
    Route::get('/delete-account/{id}', [AdminController::class, 'delete'])->name("acc.del");
    Route::get('/edit-status-account', [AdminController::class, 'edit_status'])->name("acc.status");


    // ------------------------------------------------------------------------------------ SLIDER MANAGE
    Route::get('/slider-manage', [SliderController::class, 'index'])->name("slider.manage");
    Route::get('/add-slider', [SliderController::class, 'create'])->name("add.slider");
    Route::post('/add-slider', [SliderController::class, 'store'])->name("store.slider");
    Route::get('/update-slider/{id}', [SliderController::class, 'edit'])->name("edit.slider");
    Route::put('/update-slider/{id}', [SliderController::class, 'update'])->name("update.slider");
    Route::get('/delete-slider/{id}', [SliderController::class, 'delete'])->name("delete.slider");
    Route::get('/update-status-slider', [SliderController::class, 'change_status'])->name("status.slider");
    Route::get('/decrease-stt-slider', [SliderController::class, 'change_decrease_stt'])->name("decrease.slider");
    Route::get('/increase-stt-slider', [SliderController::class, 'change_increase_stt'])->name("increase.slider");

    // ------------------------------------------------------------------------------------ CONTACT MANAGE
    Route::get('/contact-manage', [ContactController::class, 'index'])->name("contact.manage");
    Route::post('/create-contact', [ContactController::class, 'create'])->name("contact.create");
    Route::get('/delete-contact', [ContactController::class, 'delete'])->name("contact.delete");

});

// -----------------------------------------------------
// CATEGORY LEVEL 1
// -----------------------------------------------------
Route::get("/{slug}", [UserRouteController::class, "showMenu1"]);


/*
    -------------------------------------------------------------
    CATEGORY 2
    -------------------------------------------------------------
*/
Route::get("/{slug_par}/{slug}", [UserRouteController::class, "showMenu2"]);


/*
    -------------------------------------------------------------
    CATEGORY 3
    -------------------------------------------------------------
*/
Route::get("/{slug_par}/{slug_lv2}/{slug}", [UserRouteController::class, "showMenu3"]);
