<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleMenuController;
use App\Http\Controllers\RolePermissionController;

use App\Http\Controllers\Approval\WorkflowDefinitionController;
use App\Http\Controllers\Approval\WorkflowApprovalController;
use App\Http\Controllers\Approval\ApprovalStatusController;
use App\Http\Controllers\Approval\ApproverTypeController;
use App\Http\Controllers\Approval\WorkflowApprovalStageController;
use App\Http\Controllers\Approval\WorkflowApproverController;
use App\Http\Controllers\Approval\DelegatedApproverController;
use App\Http\Controllers\Approval\WorkflowRequestController;
use App\Http\Controllers\Approval\ApprovalController;
use App\Http\Controllers\Approval\ApprovalHistoryController;

use App\Http\Controllers\Blog\CategoryController as BlogCategoryController;
use App\Http\Controllers\Blog\PostController as BlogPostController;
use App\Http\Controllers\MessageController;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\BlogController as WebBlogController;
use App\Http\Controllers\Web\GalleryController as WebGalleryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Fleet\FleetCategoryController;
use App\Http\Controllers\Fleet\FleetPhotoController;

Auth::routes();

// =====================================================================
// PUBLIC – Company Profile Website
// =====================================================================
Route::group(['as' => 'web.'], function () {
    Route::get('/',               [HomeController::class,    'index'])->name('home');
    Route::get('/tentang-kami',   [AboutController::class,   'index'])->name('about');
    Route::get('/layanan',        [ServiceController::class, 'index'])->name('services');

    // Blog
    Route::get('/blog',           [WebBlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}',    [WebBlogController::class, 'show'])->name('blog.show');

    // Contact
    Route::get('/kontak',         [ContactController::class, 'index'])->name('contact');
    Route::post('/kontak',        [ContactController::class, 'store'])->name('contact.store');

    // Gallery
    Route::get('/galeri',         [WebGalleryController::class, 'index'])->name('gallery');
});

Route::get('component-ui', function() {
    return view('components-showcase');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('home');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('leave-impersonate', [UserController::class, 'leaveImpersonate'])->name('leave-impersonate');

    Route::group(['middleware' => ['permission']], function () {
        Route::get('impersonate/{user}', [UserController::class, 'impersonate'])->name('impersonate');

        // ---------------------- Super Admin Routes ------------------ //
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('create', [UserController::class, 'create'])->name('user.create');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::get('change-password/{id}', [UserController::class, 'changePassword'])->name('user.change-password');

            Route::post('/', [UserController::class, 'store'])->name('user.store');
            Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
            Route::put('update-password/{id}', [UserController::class, 'updatePassword'])->name('user.update-password');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        });

        Route::group(['prefix' => 'role'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('role.index');
            Route::get('create', [RoleController::class, 'create'])->name('role.create');
            Route::get('edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
            
            // Role Menu Management
            Route::get('menu/{id}', [RoleMenuController::class, 'show'])->name('role.menu.show');
            Route::post('menu/{id}', [RoleMenuController::class, 'update'])->name('role.menu.update');
            
            // Role Permission Management
            Route::get('permission/{id}', [RolePermissionController::class, 'show'])->name('role.permission.show');
            Route::post('permission/{id}', [RolePermissionController::class, 'update'])->name('role.permission.update');

            Route::post('/', [RoleController::class, 'store'])->name('role.store');
            Route::put('/{id}', [RoleController::class, 'update'])->name('role.update');
            Route::delete('/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
        });

        Route::group(['prefix' => 'route'], function () {
            Route::get('/', [RouteController::class, 'index'])->name('route.index');
            Route::get('create', [RouteController::class, 'create'])->name('route.create');
            Route::get('edit/{id}', [RouteController::class, 'edit'])->name('route.edit');

            Route::post('/', [RouteController::class, 'store'])->name('route.store');
            Route::put('/{id}', [RouteController::class, 'update'])->name('route.update');
            Route::delete('/{id}', [RouteController::class, 'destroy'])->name('route.destroy');
        });

        Route::group(['prefix' => 'menu'], function () {
            Route::get('/', [MenuController::class, 'index'])->name('menu.index');
            Route::get('create', [MenuController::class, 'create'])->name('menu.create');
            Route::get('edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');

            Route::post('/', [MenuController::class, 'store'])->name('menu.store');
            Route::put('/{id}', [MenuController::class, 'update'])->name('menu.update');
            Route::delete('/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
        });

        // ---------------------- Approval Module Routes ------------------ //
        Route::group(['prefix' => 'approval'], function () {

            Route::group(['prefix' => 'workflow-definition'], function () {
                Route::get('/', [WorkflowDefinitionController::class, 'index'])->name('approval.workflow-definition.index');
                Route::get('create', [WorkflowDefinitionController::class, 'create'])->name('approval.workflow-definition.create');
                Route::get('edit/{id}', [WorkflowDefinitionController::class, 'edit'])->name('approval.workflow-definition.edit');
                Route::post('/', [WorkflowDefinitionController::class, 'store'])->name('approval.workflow-definition.store');
                Route::put('/{id}', [WorkflowDefinitionController::class, 'update'])->name('approval.workflow-definition.update');
                Route::delete('/{id}', [WorkflowDefinitionController::class, 'destroy'])->name('approval.workflow-definition.destroy');
            });

            Route::group(['prefix' => 'workflow-approval'], function () {
                Route::get('/', [WorkflowApprovalController::class, 'index'])->name('approval.workflow-approval.index');
                Route::get('create', [WorkflowApprovalController::class, 'create'])->name('approval.workflow-approval.create');
                Route::get('edit/{id}', [WorkflowApprovalController::class, 'edit'])->name('approval.workflow-approval.edit');
                Route::post('/', [WorkflowApprovalController::class, 'store'])->name('approval.workflow-approval.store');
                Route::put('/{id}', [WorkflowApprovalController::class, 'update'])->name('approval.workflow-approval.update');
                Route::delete('/{id}', [WorkflowApprovalController::class, 'destroy'])->name('approval.workflow-approval.destroy');
            });

            Route::group(['prefix' => 'approval-status'], function () {
                Route::get('/', [ApprovalStatusController::class, 'index'])->name('approval.approval-status.index');
                Route::get('create', [ApprovalStatusController::class, 'create'])->name('approval.approval-status.create');
                Route::get('edit/{id}', [ApprovalStatusController::class, 'edit'])->name('approval.approval-status.edit');
                Route::post('/', [ApprovalStatusController::class, 'store'])->name('approval.approval-status.store');
                Route::put('/{id}', [ApprovalStatusController::class, 'update'])->name('approval.approval-status.update');
                Route::delete('/{id}', [ApprovalStatusController::class, 'destroy'])->name('approval.approval-status.destroy');
            });

            Route::group(['prefix' => 'approver-type'], function () {
                Route::get('/', [ApproverTypeController::class, 'index'])->name('approval.approver-type.index');
                Route::get('create', [ApproverTypeController::class, 'create'])->name('approval.approver-type.create');
                Route::get('edit/{id}', [ApproverTypeController::class, 'edit'])->name('approval.approver-type.edit');
                Route::post('/', [ApproverTypeController::class, 'store'])->name('approval.approver-type.store');
                Route::put('/{id}', [ApproverTypeController::class, 'update'])->name('approval.approver-type.update');
                Route::delete('/{id}', [ApproverTypeController::class, 'destroy'])->name('approval.approver-type.destroy');
            });

            Route::group(['prefix' => 'workflow-approval-stage'], function () {
                Route::get('/', [WorkflowApprovalStageController::class, 'index'])->name('approval.workflow-approval-stage.index');
                Route::get('create', [WorkflowApprovalStageController::class, 'create'])->name('approval.workflow-approval-stage.create');
                Route::get('edit/{id}', [WorkflowApprovalStageController::class, 'edit'])->name('approval.workflow-approval-stage.edit');
                Route::post('/', [WorkflowApprovalStageController::class, 'store'])->name('approval.workflow-approval-stage.store');
                Route::put('/{id}', [WorkflowApprovalStageController::class, 'update'])->name('approval.workflow-approval-stage.update');
                Route::delete('/{id}', [WorkflowApprovalStageController::class, 'destroy'])->name('approval.workflow-approval-stage.destroy');
            });

            Route::group(['prefix' => 'workflow-approver'], function () {
                Route::get('/', [WorkflowApproverController::class, 'index'])->name('approval.workflow-approver.index');
                Route::get('create', [WorkflowApproverController::class, 'create'])->name('approval.workflow-approver.create');
                Route::get('edit/{id}', [WorkflowApproverController::class, 'edit'])->name('approval.workflow-approver.edit');
                Route::post('/', [WorkflowApproverController::class, 'store'])->name('approval.workflow-approver.store');
                Route::put('/{id}', [WorkflowApproverController::class, 'update'])->name('approval.workflow-approver.update');
                Route::delete('/{id}', [WorkflowApproverController::class, 'destroy'])->name('approval.workflow-approver.destroy');
            });

            Route::group(['prefix' => 'delegated-approver'], function () {
                Route::get('/', [DelegatedApproverController::class, 'index'])->name('approval.delegated-approver.index');
                Route::get('create', [DelegatedApproverController::class, 'create'])->name('approval.delegated-approver.create');
                Route::get('edit/{id}', [DelegatedApproverController::class, 'edit'])->name('approval.delegated-approver.edit');
                Route::post('/', [DelegatedApproverController::class, 'store'])->name('approval.delegated-approver.store');
                Route::put('/{id}', [DelegatedApproverController::class, 'update'])->name('approval.delegated-approver.update');
                Route::delete('/{id}', [DelegatedApproverController::class, 'destroy'])->name('approval.delegated-approver.destroy');
            });

            Route::group(['prefix' => 'workflow-request'], function () {
                Route::get('/', [WorkflowRequestController::class, 'index'])->name('approval.workflow-request.index');
                Route::get('create', [WorkflowRequestController::class, 'create'])->name('approval.workflow-request.create');
                Route::get('show/{id}', [WorkflowRequestController::class, 'show'])->name('approval.workflow-request.show');
                Route::post('/', [WorkflowRequestController::class, 'store'])->name('approval.workflow-request.store');
                Route::delete('/{id}', [WorkflowRequestController::class, 'destroy'])->name('approval.workflow-request.destroy');
            });

            Route::group(['prefix' => 'approval-action'], function () {
                Route::get('/', [ApprovalController::class, 'index'])->name('approval.approval.index');
                Route::get('create', [ApprovalController::class, 'create'])->name('approval.approval.create');
                Route::get('show/{id}', [ApprovalController::class, 'show'])->name('approval.approval.show');
                Route::post('/', [ApprovalController::class, 'store'])->name('approval.approval.store');
            });

            Route::group(['prefix' => 'approval-history'], function () {
                Route::get('/', [ApprovalHistoryController::class, 'index'])->name('approval.approval-history.index');
                Route::get('show/{id}', [ApprovalHistoryController::class, 'show'])->name('approval.approval-history.show');
            });

            // ---------------------- Blog Routes ---------------------- //
            Route::group(['prefix' => 'blog'], function () {

                Route::group(['prefix' => 'category'], function () {
                    Route::get('/', [BlogCategoryController::class, 'index'])->name('blog.category.index');
                    Route::get('create', [BlogCategoryController::class, 'create'])->name('blog.category.create');
                    Route::get('edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog.category.edit');
                    Route::post('/', [BlogCategoryController::class, 'store'])->name('blog.category.store');
                    Route::put('/{id}', [BlogCategoryController::class, 'update'])->name('blog.category.update');
                    Route::delete('/{id}', [BlogCategoryController::class, 'destroy'])->name('blog.category.destroy');
                });

                Route::group(['prefix' => 'post'], function () {
                    Route::get('/', [BlogPostController::class, 'index'])->name('blog.post.index');
                    Route::get('create', [BlogPostController::class, 'create'])->name('blog.post.create');
                    Route::get('edit/{id}', [BlogPostController::class, 'edit'])->name('blog.post.edit');
                    Route::post('/', [BlogPostController::class, 'store'])->name('blog.post.store');
                    Route::put('/{id}', [BlogPostController::class, 'update'])->name('blog.post.update');
                    Route::delete('/{id}', [BlogPostController::class, 'destroy'])->name('blog.post.destroy');
                });

            });

            // -------------------- Message Routes --------------------- //
            Route::group(['prefix' => 'message'], function () {
                Route::get('/', [MessageController::class, 'index'])->name('message.index');
                Route::get('show/{id}', [MessageController::class, 'show'])->name('message.show');
                Route::delete('/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
            });

            // -------------------- Gallery Routes --------------------- //
            Route::group(['prefix' => 'gallery'], function () {
                Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
                Route::get('create', [GalleryController::class, 'create'])->name('gallery.create');
                Route::get('edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
                Route::post('/', [GalleryController::class, 'store'])->name('gallery.store');
                Route::put('/{id}', [GalleryController::class, 'update'])->name('gallery.update');
                Route::delete('/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
            });

            // -------------------- Fleet Routes ----------------------- //
            Route::group(['prefix' => 'fleet'], function () {

                Route::group(['prefix' => 'category'], function () {
                    Route::get('/', [FleetCategoryController::class, 'index'])->name('fleet.category.index');
                    Route::get('create', [FleetCategoryController::class, 'create'])->name('fleet.category.create');
                    Route::get('edit/{id}', [FleetCategoryController::class, 'edit'])->name('fleet.category.edit');
                    Route::post('/', [FleetCategoryController::class, 'store'])->name('fleet.category.store');
                    Route::put('/{id}', [FleetCategoryController::class, 'update'])->name('fleet.category.update');
                    Route::delete('/{id}', [FleetCategoryController::class, 'destroy'])->name('fleet.category.destroy');
                });

                Route::group(['prefix' => 'photo'], function () {
                    Route::get('/', [FleetPhotoController::class, 'index'])->name('fleet.photo.index');
                    Route::get('create', [FleetPhotoController::class, 'create'])->name('fleet.photo.create');
                    Route::get('edit/{id}', [FleetPhotoController::class, 'edit'])->name('fleet.photo.edit');
                    Route::post('/', [FleetPhotoController::class, 'store'])->name('fleet.photo.store');
                    Route::put('/{id}', [FleetPhotoController::class, 'update'])->name('fleet.photo.update');
                    Route::delete('/{id}', [FleetPhotoController::class, 'destroy'])->name('fleet.photo.destroy');
                });

            });

        });
    });
});