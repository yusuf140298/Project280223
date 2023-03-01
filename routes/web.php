<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Reimbursements;
use App\Http\Livewire\Users;
use App\Http\Livewire\Payments;
use App\Http\Livewire\CreateReimbursement;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('reimbursements', Reimbursements::class)->name('reimbursement');

Route::get('users', Users::class)->name('user');

Route::get('payments', Payments::class)->name('payment');

Route::get('createreimbursement', CreateReimbursement::class)->name('create-r');










