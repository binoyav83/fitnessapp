<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Step;

class StepController extends Controller
{
    function index() {
        
        $step = new Step();
        $data = $step->getData();
        response()->json(['data' => $user,
    }

    function store(Request $request) {
        //return response()->json(['errors' => 'Not logged in'], 401);
        $user = $request->user();
        
        $validated = $request->validate([
            '*.stepsCount' => 'required|integer',
            '*.start_time' => 'required|date',
            '*.end_time' => 'required|date',
        ]);

        //dd($user);
        $userId = $user->id;
        //echo $userId; exit;

        foreach ($validated as $row) {

            // Check in table
            $step = Step::where('start_time', $row['start_time'])->where('user_id', $userId)->first();
            if ($step) {
                
                $step->update([
                    'step_count' => $row['stepsCount'],
                ]);
            } else {
                // new 
                $step = Step::create([
                    'step_count' => $row['stepsCount'],
                    'start_time' => $row['start_time'],
                    'end_time' => $row['end_time'],
                    'user_id' => $userId
                ]);
            }
        }
        return response()->json(['success' => true, 'message' => 'Successfully saved the data'], 200);
    }
}
