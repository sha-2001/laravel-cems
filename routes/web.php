<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Mark;
use Illuminate\Http\Request;
use Carbon\Carbon;

Route::get('/test',function(){
    return view('test');
});

Route::get('/', [UserController::class, 'show']);

Route::get('/insert', [UserController::class,'insert']);

Route::get('/user/{id}', function($id) {



    $user = User::find($id);
    return view('dashboard', ['user' => $user]);
});

Route::post('/marks/{user_id}', function(Request $request, $user_id) {
    $mark = new Mark;
    $mark->user_id = $user_id;
    $mark->date = now()->format('Y-m-d H:i:s');
    $mark->opening = $request->input('opening');
    $mark->assurance = $request->input('assurance');
    $mark->apologies = $request->input('apologies');
    $mark->resolution = $request->input('resolution');
    $mark->querry = $request->input('querry');
    $mark->closing = $request->input('closing');
    $mark->total = $request->input('opening') + $request->input('assurance') + $request->input('apologies') + $request->input('resolution') + $request->input('querry') + $request->input('closing');
    $mark->save();

    return "submission successful";
});

