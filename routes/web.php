<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Skill\BossController;

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

Route::get('/', function () {
    return redirect('/user/main');
});


Route::group(['namespace' => 'App\Http\Controllers\User', 'prefix'=>'user', 'middleware' => ['auth']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/main', 'HomeController@index')->name('user.main.index');
    });

    Route::group(['namespace' => 'Skill', 'prefix'=>'skills'], function () {
        Route::get('/', 'SkillController@index')->name('user.skill.index');
        Route::post('/', 'SkillController@store')->name('user.skill.store');
    });

    Route::group(['namespace' => 'Award', 'prefix'=>'awards'], function () {
        Route::get('/', 'AwardController@index')->name('user.award.index');
        Route::post('/', 'AwardController@store')->name('user.award.store');
        Route::post('/{award}', 'AwardController@buy')->name('user.award.buy');
        Route::delete('/{award}', 'AwardController@destroy')->name('user.award.destroy');
    });

    Route::group(['namespace' => 'Boss', 'prefix'=>'bosses'], function () {
        Route::get('/', 'BossController@index')->name('user.boss.index');
        Route::post('/', 'BossController@store')->name('user.boss.store');
        Route::post('/{boss}', 'BossController@damage')->name('user.boss.damage');
        Route::delete('/{boss}', 'BossController@destroy')->name('user.boss.destroy');
    });

    Route::group(['namespace' => 'Quest', 'prefix'=>'quests'], function () {
        Route::get('/', 'QuestController@index')->name('user.quest.index');
        Route::get('/create', 'QuestController@create')->name('user.quest.create');
        Route::get('/edit/{quest}', 'QuestController@edit')->name('user.quest.edit');
        Route::patch('/edit/{quest}', 'QuestController@update')->name('user.quest.update');
        Route::post('/', 'QuestController@store')->name('user.quest.store');

        Route::post('/{quest_id}', 'QuestController@complete')->name('user.quest.complete');
        Route::delete('/{id}', 'QuestController@destroy')->name('user.quest.destroy');
    });

});

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
