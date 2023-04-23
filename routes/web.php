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

    // today's date
    // $today = date('y-m-d');

    // fetching todays chatdata 
    $todayChatMarks = DB::table('marks')
                        ->where('is_call',0)
                        ->where('user_id',$id)
                        ->where('date', date('Y-m-d'))
                        ->get();

    // fetching todays calldata

    $todayCallMarks = DB::table('marks')
                        ->where('is_call',1)
                        ->where('user_id',$id)
                        ->where('date', date('Y-m-d'))
                        ->get();

    // fetching weeks chatdata

    $lastMonday = Carbon::now()->startOfWeek()->subWeek()->toDateString();
    $currentDay = Carbon::now()->toDateString();

    $weekChatMarks = DB::table('marks')
        ->where('user_id', $id)
        ->where('is_call', 0)
        ->whereBetween('date', [$lastMonday, $currentDay])
        ->get();

    // fetching weeks calldata

    $weekCallMarks = DB::table('marks')
        ->where('user_id', $id)
        ->where('is_call', 1)
        ->whereBetween('date', [$lastMonday, $currentDay])
        ->get();

    // fetching months chatdata


    // fetching months calldata

    
    // fetching username and user id
    $user = User::find($id);
    session(['current_user' => $user]);
   
    return view('dashboard', [
        'user' => $user,
        'todayChatMarks' => $todayChatMarks,
        'todayCallMarks' => $todayCallMarks,
        'weekChatMarks' => $weekChatMarks,
        'weekCallMarks' => $weekCallMarks
    ]);
});

Route::post('/form/{user_id}', function(Request $request, $user_id) {
    $mark = new Mark;
    $mark->user_id = $user_id;

    if($request->input('phone')){
        $mark->phone = $request->input('phone');
        $mark->is_call = true;
    }
    else{
        $mark->phone = null;
        $mark->is_call = false;
    }

    $mark->date = now()->format('Y-m-d H:i:s');
    $mark->opening = $request->input('opening');
    $mark->assurance = $request->input('assurance');
    $mark->apologies = $request->input('apologies');
    $mark->resolution = $request->input('resolution');
    $mark->querry = $request->input('querry');
    $mark->closing = $request->input('closing');
    $mark->total = $request->input('opening') + $request->input('assurance') + $request->input('apologies') + $request->input('resolution') + $request->input('querry') + $request->input('closing');
    $mark->save();


    return redirect('/')->with('success','Submission successful!');
});

Route::get('/form', function(){
    $currentUser = session('current_user');
    return view('form',['user' => $currentUser]);
});
