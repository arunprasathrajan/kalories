<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#filter">
         Filter  <span class="caret"></span></button>
        <div id="filter" class="collapse {{ !empty($filterDates) ? 'in' : '' }}">
            {{ Form::open(array('url' => '/filter', 'method' => 'post', 'class' => 'form-inline' )) }}
                {{ csrf_field() }}
                <div class="form-group">
                  {{ Form::label('fromDate', 'From Date: ') }}
                  {{ Form::text('fromDate',!empty($filterDates) ? $fromDate : '', array('class' => 'datepicker', 'id' => 'fromdate', 'placeholder' => !empty($filterDates) ? $fromDate :'dd/mm/yyyy'  )) }}
                </div>
                <div class="form-group">
                  {{ Form::label('toDate', 'To Date: ') }}
                  {{ Form::text('toDate',!empty($filterDates) ? $toDate : '', array('class' => 'datepicker', 'id' => 'toDate', 'placeholder' => !empty($filterDates) ? $toDate :'dd/mm/yyyy')) }}
                </div>
            <button type="submit" class="btn btn-default">Submit</button>
          {{ Form::close() }}

            @if(!empty($filterDates))
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                          <th class="text-center">Date</th>
                          <th class="text-center">Total Calories for that Day</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($filterDates as $filterDateIndex=>$filterDate)
                           
                            <tr class="first">
                                <td>{{ Carbon\Carbon::parse($filterDate->date)->format('d-m-Y') }}</td>
                                <td>
                                     @foreach($totalCaloriesFordays as $totalCaloriesForday)
                                    @if($totalCaloriesForday->date==$filterDate->date )
                                        
                                        <span id="{{ $totalCaloriesForday->total}}" style="color:{{ ($totalCaloriesForday->total == $calorieLimit->calorie_limit) ? 'green' : 'red' }}">
                                            
                                        {{ $totalCaloriesForday->total}}
                                        </span>
                                        
                                        <?php break; ?>
                                    @endif
                                @endforeach
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td>Total Calories</td>
                        <td>{{$totalCalories}}</td>
                    </tfoot>
                </table>
            @endif
        </div>