<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#oneDay">
        View entries for Specific Dates  <span class="caret"></span></button>

<div id="oneDay" class="collapse {{ !empty($getRecords) ? 'in' : '' }}">
    {{ Form::open(array('url' => '/dates', 'method' => 'post', 'class' => 'form-inline' )) }}
        {{ csrf_field() }}
        <div class="form-group">
          {{ Form::label('fromDate', 'From Date: ') }}
          {{ Form::text('fromDate',!empty($getRecords) ? $fromDate : '', array('class' => 'datepicker', 'id' => 'onefromdate', 'placeholder' => !empty($getRecords) ? $fromDate :'dd/mm/yyyy'  )) }}
        </div>
        <div class="form-group">
          {{ Form::label('toDate', 'To Date: ') }}
          {{ Form::text('toDate',!empty($getRecords) ? $toDate : '', array('class' => 'datepicker', 'id' => 'onetoDate', 'placeholder' => !empty($getRecords) ? $toDate :'dd/mm/yyyy')) }}
        </div>
    <button type="submit" class="btn btn-default">Submit</button>
  {{ Form::close() }}
   @if(!empty($getRecords))
        <table class="table table-striped text-center">
            <thead>
                <tr>
                  <th class="text-center">Date</th>
                  <th class="text-center">Time</th>
                  <th class="text-center">Meal</th>
                  <th class="text-center">Calorie</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($getRecords as $getRecord)
                   
                    <tr>
                        <td>{{ Carbon\Carbon::parse($getRecord->date)->format('d-m-Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($getRecord->time)->format('H:i') }}</td>
                        <td>{{ $getRecord->meal }}</td>
                        <td>{{ $getRecord->calories }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>