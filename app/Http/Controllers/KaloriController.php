<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Kalorie;

use Carbon\Carbon;

use Validator;

use DB;

class KaloriController extends Controller
{
    /**
     * Display a listing of the records from the storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas = Kalorie::orderBy('date', 'desc')
       ->orderBy('time','desc')
        ->get();
       
       $calorieLimit = Kalorie::select('calorie_limit')
        ->first();

        return view('welcome', array('datas' => $datas,'calorieLimit' => $calorieLimit));
    }

    /**
     * Save the new records in the storage.
     *
     * @param  \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeNewDatas = $request->all();
        // dd($storeNewDatas);

        extract($storeNewDatas);

        for ($i=0; $i < count($date)  ; $i++) { 

            $kalorie = new Kalorie;

            $kalorie->date = date('Y-m-d', strtotime($date[$i]));
            $kalorie->time = date('H:i:s', strtotime($time[$i]));
            $kalorie->meal = $meal[$i];
            $kalorie->calories = $calorie[$i];
            $kalorie->save();
        }

        return redirect('/');
    }

   /**
     * Showing the list of data requested by the resource.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $dates = $request->all();
        extract($dates);

        $calorieLimit = Kalorie::select('calorie_limit')
        ->first();

        $filterDates = DB::table("kalories")
        ->where('date','>=',date('Y-m-d', strtotime($fromDate)))
        ->where('date','<=',date('Y-m-d', strtotime($toDate)))
        ->select('date')
        ->distinct()
        ->get();
       
        $datas = Kalorie::orderBy('date', 'desc')
        ->orderBy('time','desc')
        ->get();

        $totalCaloriesFordays = DB::table("kalories")
        ->where('date','>=',date('Y-m-d', strtotime($fromDate)))
        ->where('date','<=',date('Y-m-d', strtotime($toDate)))
        ->select('date', 'time', DB::raw("SUM(calories) as total"))
        ->distinct()
        ->groupBy('date')
        ->get();

        $totalCalories = 0;
        foreach ($totalCaloriesFordays as $totalCaloriesForday) {
            $totalCalories = $totalCalories + $totalCaloriesForday->total;
            
        }

        return view('welcome', array('datas' => $datas, 'filterDates' => $filterDates, 'fromDate' => $fromDate, 'toDate' => $toDate, 'totalCaloriesFordays' => $totalCaloriesFordays, 'calorieLimit' => $calorieLimit, 'totalCalories' => $totalCalories));
    }

    
    /**
     * Retireve the datas based on the specific dates given.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function date(Request $request)
    {
        $dates = $request->all();
        extract($dates);

        $calorieLimit = Kalorie::select('calorie_limit')
        ->first();

        $datas = Kalorie::orderBy('date', 'desc')
        ->orderBy('time','desc')
        ->get();

        $getRecords = Kalorie::where('date','>=',date('Y-m-d', strtotime($fromDate)))
        ->where('date','<=',date('Y-m-d', strtotime($toDate)))
        ->get();

        return view('welcome', array('datas' => $datas, 'getRecords' => $getRecords, 'fromDate' => $fromDate, 'toDate' => $toDate, 'calorieLimit' => $calorieLimit));

    }

    /**
     * Update the new record in the storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function update(Request $request)
    {
        $updateRecord = $request->all();
        extract($updateRecord);
        
        $update=Kalorie::where('id',$id)
        ->update(array('date' => date('Y-m-d', strtotime($date)), 'time' => date('H:i:s', strtotime($time)), 'meal' => $meal,'calories' => $calorie,));

    }


    /**
     * Remove the specified record from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function delete(Request $request)
    {
        $deleteRecord = $request->all();
        extract($deleteRecord);

        Kalorie::where('id', $id)->delete();
    }

    /**
     * Update the new calorie limit set by the user in the storage.
     *
     ** @param  \Illuminate\Http\Request  $request
     * 
     */
    public function setCalorieLimit(Request $request)
    {
        $setcalorieLimit = $request->all();

        $ids = Kalorie::get();

        extract($setcalorieLimit);

        if(!empty($userCalorieValue))
        {
            foreach ($ids as $id) {
                Kalorie::where('id','=', $id->id)->update(array('calorie_limit'=> $userCalorieValue));
            }    
        }
    }
}
