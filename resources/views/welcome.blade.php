@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom: 20%;">

    <div class="row">
         @if(!empty($calorieLimit))
         <p>Number of Calories per day is <span id="userSetCalorieLimit">{{ $calorieLimit->calorie_limit }}</span></p>
         @endif
    </div>

    <div class="row" style="margin-bottom: 2%;">
         @include('recordsForTotalCalories') 
        
    </div>

    <div class="row">
        
        @include('userSpecifiedRecords') 
   

        @include('allRecords') 
    </div>
</div>

@endsection
