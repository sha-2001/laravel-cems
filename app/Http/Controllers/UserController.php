<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function insert()
    {
        $data = [
            ['name' => 'Himanshu'],
            ['name' => 'Yash'],
            ['name' => 'Ankit'],
            ['name' => 'Kartikey'],
            ['name' => 'Sid'],
            ['name' => 'Kevin'],
            ['name' => 'Vishal']
        ];

        User::insert($data);

        return 'Inserted Successfully';
    }
}