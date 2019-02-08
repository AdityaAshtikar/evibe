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

Route::get('/', 'TicketController@index');
Route::post('/ticket', 'TicketController@book');	/*get ticket inquired details page*/
Route::get('/ticket/{ticketId}', 'TicketController@store');	/*update ticket status as per the user action*/
Route::get('/ticket/{ticketId/edit}', 'TicketController@edit');

Route::get('/inquiry', 'InquiryController@form');	/*tickets inquiry*/
Route::get('/inquiry/customer/{ticketId}', 'InquiryController@store');	/*storing helper for user Details*/