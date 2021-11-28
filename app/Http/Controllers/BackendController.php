<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BackendController extends Controller
{
    public function home()
    {
        $auth = session("user");
        $users = User::where("id","!=", $auth->id)
        ->paginate(5);
        $data = [
            "users"
        ];
        return view("list",compact($data));
    }
}
