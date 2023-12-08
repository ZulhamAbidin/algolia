<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\ProcessCSVData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Database\Eloquent\Builder;

class TutorialController extends Controller
{
    public function index(Request $request)
    {
        $users = User::search($request->q)->paginate(5);

        return view('welcome', compact('users'));
    }
}
