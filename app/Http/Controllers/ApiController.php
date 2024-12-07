<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function statusJson(){
        return DB::table('repairorders')
        ->where('active', 1)
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
    }
}