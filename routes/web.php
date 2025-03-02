<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Settings\SettingsController;
use App\Http\Controllers\User\Main\HomeController;
use App\Http\Controllers\User\Skill\SkillController;
use App\Http\Controllers\User\Award\AwardController;
use App\Http\Controllers\User\Boss\BossController;
use App\Http\Controllers\User\Quest\QuestController;
use App\Http\Controllers\User\Post\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use SocialiteProviders\Manager\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;



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

Route::redirect('/', '/user/main');
Route::redirect('/home', '/user/main');

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {

    // Настройки
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/settings', 'index')->name('user.settings');
        Route::post('/avatar/update', 'updateAvatar')->name('user.settings.updateAvatar');
        Route::post('/name/update', 'updateName')->name('user.settings.updateName');
    });

    // Главная
    Route::get('/main', [HomeController::class, 'index'])->name('user.main.index');

    // Навыки
    Route::resource('skills', SkillController::class)->only(['index', 'store', 'destroy'])->names([
        'index' => 'user.skill.index',
        'store' => 'user.skill.store',
        'destroy' => 'user.skill.destroy',
    ]);

    // Награды
    Route::controller(AwardController::class)->prefix('awards')->group(function () {
        Route::get('/', 'index')->name('user.award.index');
        Route::post('/', 'store')->name('user.award.store');
        Route::post('/{award}', 'buy')->name('user.award.buy');
        Route::delete('/{award}', 'destroy')->name('user.award.destroy');
    });

    // Боссы
    Route::controller(BossController::class)->prefix('bosses')->group(function () {
        Route::get('/', 'index')->name('user.boss.index');
        Route::post('/', 'store')->name('user.boss.store');
        Route::post('/{boss}', 'damage')->name('user.boss.damage');
        Route::delete('/{boss}', 'destroy')->name('user.boss.destroy');
    });

    // Квесты
    Route::controller(QuestController::class)->prefix('quests')->group(function () {
        Route::get('/', 'index')->name('user.quest.index');
        Route::get('/create', 'create')->name('user.quest.create');
        Route::get('/edit/{quest}', 'edit')->name('user.quest.edit');
        Route::patch('/edit/{quest}', 'update')->name('user.quest.update');
        Route::post('/', 'store')->name('user.quest.store');
        Route::post('/{quest_id}', 'complete')->name('user.quest.complete');
        Route::delete('/{id}', 'destroy')->name('user.quest.destroy');
    });

    Route::controller(PostController::class)->prefix('posts')->group(function () {
        Route::get('/', 'index')->name('user.post.index');
        Route::get('/create', 'create')->name('user.post.create');
        Route::get('/show/{post}', 'show')->name('user.post.show');
        Route::post('/', 'store')->name('user.post.store');
        Route::get('/{post}/edit', 'edit')->name('user.post.edit');
        Route::put('/{post}', 'update')->name('user.post.update');
        Route::delete('/{post}', 'destroy')->name('user.post.destroy');

    });

});


Route::get('/auth/yandex', [LoginController::class, 'redirectToProvider'])->name('auth.yandex');
Route::get('/auth/yandex/callback', [LoginController::class, 'handleProviderCallback']);





Auth::routes(['verify' => true, 'reset' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

