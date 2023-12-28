<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\MenuManageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostProcedureController;
use App\Http\Controllers\PostProjectController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ScheduleOpenningController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserpageController;
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

/*  -------------------------------------------------------------------------------------------
    user page
    -------------------------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'showHome'])->name("user.home");

// ----------------------------------------------------- About Us
Route::get('/ve-chung-toi', [AboutController::class, 'show_aboutus'])->name("user.aboutus");
Route::get('/thanh-tich-hoc-vien', [AboutController::class, 'show_achievement'])->name("user.achievement");
Route::get('/quyen-loi-hoc-vien', [AboutController::class, 'show_benefit'])->name("user.benefit");
Route::get('/feedback-hoc-vien', [AboutController::class, 'show_review'])->name("user.review");
Route::get('/giang-vien', [AboutController::class, 'show_teacher'])->name("user.teacher");


// ----------------------------------------------------- Project
Route::get('/khoa-hoc', [ProjectController::class, 'show_project'])->name("user.project");


// ----------------------------------------------------- Library
Route::get('/tu-vung', [LibraryController::class, 'show_vocab'])->name("user.vocab");
Route::get('/thanh-ngu', [LibraryController::class, 'show_thanh_ngu'])->name("user.thanh.ngu");
Route::get('/ngu-phap', [LibraryController::class, 'show_grammar'])->name("user.grammar");
Route::get('/du-hoc', [LibraryController::class, 'show_duhoc'])->name("user.duhoc");
Route::get('/kinh-nghiem-thi-hsk', [LibraryController::class, 'show_thi_hsk'])->name("user.thi.hsk");


// ----------------------------------------------------- Page simple
Route::get('/lich-khai-giang', [UserpageController::class, 'show_lich'])->name("user.lich");
Route::get('/tuyen-dung', [UserpageController::class, 'show_employ'])->name("user.employ");
Route::get('/lien-he', [UserpageController::class, 'show_contact'])->name("user.contact");


// ----------------------------------------------------- Login
Route::get('/dang-nhap', [AccountController::class, 'show_form_login'])->name("user.login.form");
Route::post('/dang-nhap', [AccountController::class, 'login'])->name("user.login");
Route::get('/dang-ky', [AccountController::class, 'show_form_signup'])->name("user.signup");
Route::post('/dang-ky', [AccountController::class, 'store'])->name("user.sign-up");
Route::get('/xac-thuc-tai-khoan/{email}', [AccountController::class, 'verify_account'])->name("user.verify.acc");
Route::get('/quen-mat-khau', [AccountController::class, 'forget_pass'])->name("acc.forget");
Route::get('/quen-mat-khau/success', [AccountController::class, 'forget_pass_success'])->name("acc.forget.success");
Route::get('/nhap-mat-khau-moi', [AccountController::class, 'reset_pass'])->name("acc.reset.pass");
Route::get('/dang-xuat', [AccountController::class, 'logout'])->name("acc.logout");




/*
--------------------------------------------------------------------------------------------------------
ADMIN PAGE
--------------------------------------------------------------------------------------------------------
*/
Route::prefix('/admin')->group(function(){
    // ------------------------------------------------------------------------------------ DASHBOARD
    Route::get('', [AdminController::class, 'dashboard'])->name("admin.dashboard");

    // ------------------------------------------------------------------------------------ MENU MANAGE

    Route::get('/quan-ly-danh-muc', [MenuManageController::class, 'index'])->name("admin.menu");

    Route::get('/them-danh-muc', [MenuManageController::class, 'create_level1'])->name("admin.create.level1");
    Route::post('/them-danh-muc', [MenuManageController::class, 'store_level1'])->name("admin.store.level1");
    Route::get('/cap-nhat-danh-muc/{id}', [MenuManageController::class, 'edit_level1'])->name("admin.edit.level1");
    Route::put('/cap-nhat-danh-muc/{id}', [MenuManageController::class, 'update_level1'])->name("admin.update.level1");
    Route::get('/xoa-danh-muc/{id}', [MenuManageController::class, 'delete_level1'])->name("admin.delete.level1");

    Route::get('/them-danh-muc-2', [MenuManageController::class, 'create_level2'])->name("admin.create.level2");
    Route::post('/them-danh-muc-2', [MenuManageController::class, 'store_level2'])->name("admin.store.level2");
    Route::get('/cap-nhat-danh-muc-2/{id}', [MenuManageController::class, 'edit_level2'])->name("admin.edit.level2");
    Route::put('/cap-nhat-danh-muc-2/{id}', [MenuManageController::class, 'update_level2'])->name("admin.update.level2");
    Route::get('/xoa-danh-muc-2/{id}', [MenuManageController::class, 'delete_level2'])->name("admin.delete.level2");

    Route::get('/them-danh-muc-3', [MenuManageController::class, 'create_level3'])->name("admin.create.level3");
    Route::post('/them-danh-muc-3', [MenuManageController::class, 'store_level3'])->name("admin.store.level3");
    Route::get('/cap-nhat-danh-muc-3/{id}', [MenuManageController::class, 'edit_level3'])->name("admin.edit.level3");
    Route::put('/cap-nhat-danh-muc-3/{id}', [MenuManageController::class, 'update_level3'])->name("admin.update.level3");
    Route::get('/xoa-danh-muc-3/{id}', [MenuManageController::class, 'delete_level3'])->name("admin.delete.level3");

    // ------------------------------------------------------------------------------------ POST MANAGE
    Route::get('/quan-ly-bai-viet', [ShowPostController::class, 'index'])->name("admin.post");

    Route::get('/them-bai-viet-gioi-thieu', [PostProcedureController::class, 'create_home'])->name("admin.create.home");
    Route::post('/them-bai-viet-gioi-thieu', [PostProcedureController::class, 'store'])->name("admin.store.home");
    Route::get('/cap-nhat-bai-viet-gioi-thieu/{id}', [PostProcedureController::class, 'edit_home'])->name("admin.edit.home");
    Route::put('/cap-nhat-bai-viet-gioi-thieu/{id}', [PostProcedureController::class, 'update_home'])->name("admin.update.home");
    Route::get('/xoa-bai-viet-gioi-thieu/{id}', [PostProcedureController::class, 'delete_home'])->name("admin.delete.home");
    Route::get('/update-status-home-procedure', [PostProcedureController::class, 'change_status_home'])->name("post.proc.home");
    Route::get('/update-status-page-procedure', [PostProcedureController::class, 'change_status_page'])->name("post.proc.page");
    Route::get('/decrease-stt-procedure', [PostProcedureController::class, 'change_decrease_stt'])->name("post.decrease.proc");
    Route::get('/increase-stt-procedure', [PostProcedureController::class, 'change_increase_stt'])->name("post.increase.proc");

    // --------- post project all
    Route::get('/add-post-project', [PostProjectController::class, 'create'])->name("create.proj");
    Route::post('/add-post-project', [PostProjectController::class, 'store'])->name("store.proj");
    Route::get('/update-post-project/{id}', [PostProjectController::class, 'edit'])->name("edit.proj");
    Route::put('/update-post-project/{id}', [PostProjectController::class, 'update'])->name("update.proj");
    Route::get('/delete-post-project/{id}', [PostProjectController::class, 'delete'])->name("delete.proj");
    Route::get('/update-status-home-procject', [PostProjectController::class, 'change_status_home'])->name("status.proj.home");
    Route::get('/update-status-page-project', [PostProjectController::class, 'change_status_page'])->name("status.proj.page");
    Route::get('/decrease-stt-project', [PostProjectController::class, 'change_decrease_stt'])->name("post.decrease.proj");
    Route::get('/increase-stt-project', [PostProjectController::class, 'change_increase_stt'])->name("post.increase.proj");

    // schedule openning
    Route::get('/add-post-schedule-openning', [ScheduleOpenningController::class, 'create'])->name("create.sche");
    Route::post('/add-post-schedule-openning', [ScheduleOpenningController::class, 'store'])->name("store.sche");
    Route::get('/update-post-schedule-openning/{id}', [ScheduleOpenningController::class, 'edit'])->name("edit.sche");
    Route::put('/update-post-schedule-openning/{id}', [ScheduleOpenningController::class, 'update'])->name("update.sche");
    Route::get('/delete-post-schedule-openning/{id}', [ScheduleOpenningController::class, 'delete'])->name("delete.sche");
    Route::get('/update-status-home-schedule-openning', [ScheduleOpenningController::class, 'change_status_home'])->name("status.sche.home");
    Route::get('/update-status-page-schedule-openning', [ScheduleOpenningController::class, 'change_status_page'])->name("status.sche.page");
    Route::get('/decrease-stt-schedule-openning', [ScheduleOpenningController::class, 'change_decrease_stt'])->name("post.decrease.sche");
    Route::get('/increase-stt-schedule-openning', [ScheduleOpenningController::class, 'change_increase_stt'])->name("post.increase.sche");

    // library
    Route::get('/add-post-library', [LibraryController::class, 'create'])->name("create.lib");
    Route::post('/add-post-library', [LibraryController::class, 'store'])->name("store.lib");
    Route::get('/update-post-library/{id}', [LibraryController::class, 'edit'])->name("edit.lib");
    Route::put('/update-post-library/{id}', [LibraryController::class, 'update'])->name("update.lib");
    Route::get('/delete-post-library/{id}', [LibraryController::class, 'delete'])->name("delete.lib");
    Route::get('/update-status-home-library', [LibraryController::class, 'change_status_home'])->name("status.lib.home");
    Route::get('/update-status-page-library', [LibraryController::class, 'change_status_page'])->name("status.lib.page");
    Route::get('/decrease-stt-library', [LibraryController::class, 'change_decrease_stt'])->name("post.decrease.lib");
    Route::get('/increase-stt-library', [LibraryController::class, 'change_increase_stt'])->name("post.increase.lib");

    // employee
    Route::get('/add-post-employ', [EmployeeController::class, 'create'])->name("create.emp");
    Route::post('/add-post-employ', [EmployeeController::class, 'store'])->name("store.emp");
    Route::get('/update-post-employ/{id}', [EmployeeController::class, 'edit'])->name("edit.emp");
    Route::put('/update-post-employ/{id}', [EmployeeController::class, 'update'])->name("update.emp");
    Route::get('/delete-post-employ/{id}', [EmployeeController::class, 'delete'])->name("delete.emp");
    Route::get('/update-status-home-employ', [EmployeeController::class, 'change_status_home'])->name("status.emp.home");
    Route::get('/update-status-page-employ', [EmployeeController::class, 'change_status_page'])->name("status.emp.page");
    Route::get('/decrease-stt-employ', [EmployeeController::class, 'change_decrease_stt'])->name("post.decrease.emp");
    Route::get('/increase-stt-employ', [EmployeeController::class, 'change_increase_stt'])->name("post.increase.emp");


    // ------------------------------------------------------------------------------------ USER MANAGE
    Route::get('/account-manage', [AdminController::class, 'acc_manage'])->name("acc.manage");
    Route::get('/account-edit/{id}', [AdminController::class, 'acc_edit'])->name("acc.edit");
    Route::put('/account-edit/{id}', [AdminController::class, 'acc_update'])->name("acc.update");
    Route::get('/delete-account/{id}', [AdminController::class, 'delete'])->name("acc.del");
    Route::get('/edit-status-account', [AdminController::class, 'edit_status'])->name("acc.status");


    // ------------------------------------------------------------------------------------ SLIDER MANAGE
    Route::get('/slider-manage', [SliderController::class, 'index'])->name("slider.manage");

    // slide home
    Route::get('/add-slider-home', [SliderController::class, 'create_home'])->name("add.slider.home");
    Route::post('/add-slider-home', [SliderController::class, 'store_home'])->name("store.slider.home");
    Route::get('/update-slider-home/{id}', [SliderController::class, 'edit_home'])->name("edit.slider.home");
    Route::put('/update-slider-home/{id}', [SliderController::class, 'update_home'])->name("update.slider.home");
    Route::get('/delete-slider-home/{id}', [SliderController::class, 'delete_home'])->name("delete.slider.home");

    // slide home
    Route::get('/add-slider-about', [SliderController::class, 'create_about'])->name("add.slider.about");
    Route::post('/add-slider-about', [SliderController::class, 'store_about'])->name("store.slider.about");
    Route::get('/update-slider-about/{id}', [SliderController::class, 'edit_about'])->name("edit.slider.about");
    Route::put('/update-slider-about/{id}', [SliderController::class, 'update_about'])->name("update.slider.about");
    Route::get('/delete-slider-about/{id}', [SliderController::class, 'delete_about'])->name("delete.slider.about");
});
