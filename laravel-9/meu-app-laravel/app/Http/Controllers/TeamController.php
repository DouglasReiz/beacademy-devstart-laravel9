<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
       //
    }

    public function show($id)
    {
        $team = Team::find($id);
        $team ->load('users');
    
        return $team;
    }

}
