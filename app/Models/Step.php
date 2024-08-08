<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Step extends Model
{
    use HasFactory;

    protected $fillable = ['step_count', 'start_time', 'end_time', 'user_id'];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    
    function getClosestData($userId, $date = '') {

        if (empty($date)) {
            $date = date('Y-m-d 00:00:00');
        }

        // Get logged users steps count for the day
        //DB::enableQueryLog();


        $currentUserStepsRow = $this->where('user_id', $userId)->with('user')->where('start_time', $date)->first();

        $currentUserSteps = 0;
        if (!empty($currentUserStepsRow)) {
            $currentUserSteps = $currentUserStepsRow->step_count;
        }
        
        //$queries = DB::getQueryLog();
        //dd($currentUserSteps); 
        
        // Get users steps count greater than logged user
        $greaterSteps = $this->where('user_id', '!=', $userId)->with('user')->where('start_time', $date)->where('step_count', '>', $currentUserSteps )->orderBy('step_count', 'desc')->limit(3)->get();
        $queries = DB::getQueryLog();
        //dd($queries); 

        // Get users steps count less than logged user
        $lowerSteps =  $this->where('user_id', '!=', $userId)->with('user')->where('start_time', $date)->where('step_count', '<', $currentUserSteps )->orderBy('step_count', 'desc')->limit(3)->get();

        return [
            'greater_steps' => $greaterSteps,
            'current_user' => $currentUserStepsRow,
            'lower_steps' => $lowerSteps,
        ];
    }

    function getRanking($date = '') {

        if (empty($date)) {
            $date = date('Y-m-d 00:00:00');
        }

        return $this->with('user')->where('start_time', $date)->orderBy('step_count', 'desc')->limit(3)->get();
    }
}
