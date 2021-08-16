<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware('is_admin')->group(function (){
    //route to controller function which returns all employees
    Route::get('/employees/list','EmployeeController@list');

    //route to function to return create employee form
    Route::get('/employees/create','EmployeeController@create');

    //route to function to add employee
    Route::post('/employees/add','EmployeeController@add');

    //route to function to update employee
    Route::post('/employees/update/{id}','EmployeeController@update');

    //route to controller function to delete employee
    Route::get('employees/delete/{id}','EmployeeController@delete');

    //route to controller function which returns all companies
    Route::get('/companies/list','CompanyController@list');

    //route to controller function which returns the company with specific id
    Route::get('/companies/show/{id}','CompanyController@show');

    //route to function to return create company form
    Route::get('/companies/create','CompanyController@create');

    //route to function to add company
    Route::post('/companies/add','CompanyController@add');

    //route to function to return create edit company form
    Route::get('/companies/edit/{id}','CompanyController@edit');

    //route to function to update company
    Route::post('/companies/update/{id}','CompanyController@update');

    //route to controller function to delete company
    Route::get('companies/delete/{id}','CompanyController@delete');

    // Route to admin dashboard
    Route::get('admin/dashboard','adminController@dashboard');
});

//middleware to check if the user is a guest
Route::middleware('is_guest')->group(function (){
// Route to return registration form
Route::get('register','AuthController@register');
// Route to handle registration
Route::post('handle-register','AuthController@handleRegister');
// Route to return login form
Route::get('login','AuthController@login');
// Route to handle login
Route::post('handle-login','AuthController@handleLogin');
});


//middleware to check if user is logged in
Route::middleware('is_login')->group(function (){
    //route to function to return create edit employee form
    Route::get('/employees/edit/{id}','EmployeeController@edit');

    //route to controller function which returns the employee with specific id
    Route::get('/employees/show/{id}','EmployeeController@show');

    // Route to logout
    Route::get('logout','AuthController@logout');
});

//middleware to check if user is employee
Route::middleware('is_employee')->group(function (){
    // Route to logout
    Route::get('home','EmployeeController@home');
});




