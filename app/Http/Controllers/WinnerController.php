<?php

namespace App\Http\Controllers;

use App\User;
use App\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    public function winners(Request $request){
        $user_id = User::get()->random();

        $winners = Winner::get();

        foreach($winners as $winner){
            if($winner->user_id == $user_id->id) {
                session()->flash('error', ('Already winner'));
                return redirect()->back();
            }
            if($winner->id == 80){
                session()->flash('error', ('Winners Completed'));
                return redirect()->back();
            }
        }

        $win = Winner::create([
            'winner_name' => $user_id->name,
            'user_id' => $user_id->id,
        ]);
        session()->flash('success', ('New Winner'));
        return redirect()->back();
    }
}
