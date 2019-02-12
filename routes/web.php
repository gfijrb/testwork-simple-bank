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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//  {"user":{
//      "id":1,"name":"Paul Bolhar","email":"paul.bolhar@gmail.com",
//      "email_verified_at":null,"created_at":"2019-02-09 10:23:40","updated_at":"2019-02-09 10:23:40"
//  }}
Route::get('/get_user', 'BankController@getUser');

Route::get('/test', 'BankController@getUser');

// получить доступный баланс аккаунта
Route::get('/testT/{id}', 'TransactionController@balanceAvaliable');
// получить список всех аккаунтов
Route::get('/test/accountlist', 'AccountController@getAccountsList');

Route::get('/test/newaccount', 'AccountController@newAccount');

Route::get('/test/total', 'AccountController@totalSupply');


Route::get('/test/user/account', 'UserController@account');






