<?php

namespace App\Http\Controllers;

use App\Models\Htmlcss;
use App\Models\Js;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::orderBy('created_at','ASC')->get();
        $htmlcss = Htmlcss::orderBy('created_at','ASC')->get();
        $js = Js::orderBy('created_at','ASC')->get();
        return view('backend.admin.dashboard',[
            'users' => $users,
            'htmlcss' => $htmlcss,
            'js' => $js,
        ]);
    }
}
