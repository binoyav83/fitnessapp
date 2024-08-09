<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Step;
use App\Http\Resources\StepResource;
use Carbon\Carbon; 

class StepController extends Controller
{
    function index(Request $request) {
        
        $user = $request->user();
        $step = new Step();
        $data = $step->getClosestData($user->id);
        $rank = $step->getRanking();
        $data = [
             'list' => [
                 'greater_steps' => StepResource::collection($data['greater_steps']),
                 'current_user' => new StepResource($data['current_user']),
                 'lower_steps' => StepResource::collection($data['lower_steps']),
             ],
             'rank' =>  StepResource::collection($rank)
        ];

        return response()->json(['data' => $data]);
    }

    function store(Request $request) {
 
        $user = $request->user();
        
        $validated = $request->validate([
            '*.stepsCount' => 'required|integer',
            '*.start_time' => 'required|date',
            '*.end_time' => 'required|date',
        ]);

        //dd($user);
        $userId = $user->id;

        foreach ($validated as $row) {

            // Check in table
            $step = Step::where('start_time', Carbon::parse($row['start_time']))
                ->where('user_id', $userId)
                ->first();

            if ($step) {
                
                $step->update([
                    'stepsCount' => $row['stepsCount'],
                ]);
            } else {
                // new 
                $step = Step::create([
                    'stepsCount' => (int) $row['stepsCount'],
                    'start_time' => Carbon::parse($row['start_time']),
                    'end_time' => Carbon::parse($row['end_time']),
                    'user_id' => $userId
                ]);
            }
        }
        return response()->json(['success' => true, 'message' => 'Successfully saved the data'], 200);
    }
}
