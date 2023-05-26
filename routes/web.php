<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home');
});
Route::get('/users', function (Request $request) {

    $users =  User::query()
    ->when($request->search, function($query,$search){
     $query->where('name','like',"%{$search}%");
    })
    ->select('id','name')
    ->paginate(10)
    ->withQueryString();
    return Inertia::render('Users',[
        'users' => $users,
        'filters' => $request->search,
    ]);
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});
Route::post('/logout', function (Request $request) {
dd($request->name); 
});