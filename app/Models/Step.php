<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Client as MongoClient;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
class Step extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'steps';
    protected $primaryKey = '_id'; 
    protected $keyType = 'string';
    protected $fillable = ['stepsCount', 'start_time', 'end_time', 'user_id'];

    protected $casts = [
        'stepsCount' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    protected function startTime(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value),
            set: fn ($value) => $value instanceof Carbon ? $value->toDateTimeString() : $value
        );
    }

    protected function endTime(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value),
            set: fn ($value) => $value instanceof Carbon ? $value->toDateTimeString() : $value
        );
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    
    /**
     * Get steps closer to logged user
     */
    function getClosestData($userId, $date = '') {

        if (empty($date)) {
            $date = Carbon::parse(date('Y-m-d 00:00:00'));
        }

        // Get steps count of user
        $currentUserStepsRow = $this
                                ->with('user')
                                ->where('user_id', $userId)
                                ->where('start_time', $date)
                                ->first();
         
        $currentUserSteps = 0;
        if (!empty($currentUserStepsRow)) {
            $currentUserSteps = $currentUserStepsRow->stepsCount;
        }
        
        //dd($currentUserSteps); 
        
        // Get users steps count greater than logged/passed user
        $greaterSteps = $this
                        ->where('user_id', '!=', $userId)
                        ->with('user')
                        ->where('start_time', $date)
                        ->where('stepsCount', '>', $currentUserSteps )
                        ->orderBy('stepsCount', 'desc')
                        ->limit(3)
                        ->get()
                        ;
       
        //dd($greaterSteps->toMql(), $greaterSteps->getBindings()); 
        // Get users steps count less than logged user
        $lowerSteps =  $this
                        ->where('user_id', '!=', $userId)
                        ->with('user')
                        ->where('start_time', $date)
                        ->where('stepsCount', '<', $currentUserSteps)
                        ->orderBy('stepsCount', 'desc')
                        ->limit(3)
                        ->get();

        return [
            'greater_steps' => $greaterSteps,
            'current_user' => $currentUserStepsRow,
            'lower_steps' => $lowerSteps,
        ];
    }

    function getRanking($date = '') {

        if (empty($date)) {
            $date = Carbon::parse(date('Y-m-d 00:00:00'));
        }

        return $this
                ->with('user')
                ->where('start_time', $date)
                ->orderBy('stepsCount', 'desc')
                ->limit(3)
                ->get();
    }
}
