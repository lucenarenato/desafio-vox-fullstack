<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\BoardMemberController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/post-group', [GroupController::class, 'postGroup']);
// TODO: MOVE TO AUTH
Route::post('/board/set-board-admin', [BoardController::class, 'setBaordAdmin']);

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    //Route::resource('roles', RoleController::class);
    Route::group(['middleware' => ['permission:role-list']], function () {
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    });

    Route::group(['middleware' => ['permission:role-create']], function () {
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    });

    Route::group(['middleware' => ['permission:role-edit']], function () {
        Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    });

    Route::group(['middleware' => ['permission:role-delete']], function () {
        Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });


    //Route::get('dashboard', ['middleware' => 'auth', 'uses' => 'UserController@getDashboard', 'as' => 'user.dashboard',]);
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [UserController::class, 'getDashboard'])->name('user.dashboard');
        Route::get('profile', [UserController::class, 'getProfile'])->name('user.profile');

    });
    Route::resource('users', UserController::class);

});


// todo: DUPLICATE ROUTE
// Boards
Route::post('postBoard', [BoardController::class, 'postBoard'])
    ->middleware('auth');

Route::post('update-board-favourite', [BoardController::class, 'updateBoardFavourite'])
    ->middleware('auth');

// User Activity
Route::get('activity', [UserActivityController::class, 'getUserActivity'])
    ->middleware('auth')
    ->name('user.activity');

Route::get('setting', [UserActivityController::class, 'getUserSetting'])
    ->middleware('auth')
    ->name('user.setting');

Route::post('create-user-activity', [UserActivityController::class, 'createUserActivity']);

/**
 * Board
 */
Route::prefix('board')->group(function () {
    // Listas
    Route::post('postListName', [ListController::class, 'postListName']);
    Route::post('delete-list', [ListController::class, 'deleteList']);
    Route::post('update-list-name', [ListController::class, 'updateListName']);

    // Cards
    Route::post('postCard', [CardController::class, 'postCard']);
    Route::post('changeCardList', [CardController::class, 'changeCardList']);
    Route::post('deleteCard', [CardController::class, 'deleteCard']);
    Route::post('getCardDetail', [CardController::class, 'getCardDetail']);
    Route::post('update-card-data', [CardController::class, 'updateCardData']);

    // Comentários
    Route::post('save-comment', [CommentController::class, 'saveComment']);

    // Tasks
    Route::post('save-task', [TaskController::class, 'saveTask']);
    Route::post('delete-task', [TaskController::class, 'deleteTask']);
    Route::post('update-task-completed', [TaskController::class, 'updateTaskCompleted']);

    // Boards
    Route::get('{id?}', [BoardController::class, 'getBoardDetail'])
        ->middleware('auth')
        ->name('user.boardDetail');

    Route::post('postBoard', [BoardController::class, 'postBoard'])
        ->middleware('auth');

    // Atividade de usuários
    Route::post('create-user-activity', [UserActivityController::class, 'createUserActivity']);

    // Membros do board
    Route::post('create-board-member', [BoardMemberController::class, 'create']);
});



