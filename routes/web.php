<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Settings\SettingsController;
use App\Http\Controllers\User\Main\HomeController;
use App\Http\Controllers\User\Skill\SkillController;
use App\Http\Controllers\User\Award\AwardController;
use App\Http\Controllers\User\Boss\BossController;
use App\Http\Controllers\User\Quest\QuestController;

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

});

Auth::routes(['verify' => true, 'reset' => true]);

