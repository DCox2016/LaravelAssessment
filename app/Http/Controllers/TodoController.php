<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //
    function show() {
        return Todo::get();
    }

    function create(Request $request){
        $newTask = [
            'name' => $request->Name,
            'complete' => false,
            'active' => true,
        ];
        DB::table('todo')->insert($newTask);
    }

    function delete(Request $request) {
        DB::table('todo')->where('id', $request->Id)->update(['active' => false]);
    }

    function complete_incomplete(Request $request) {
        DB::table('todo')->where('id', $request->Id)->update(['complete' => $request->Status]);
    }
}
