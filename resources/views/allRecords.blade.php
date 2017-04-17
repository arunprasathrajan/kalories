<div class="dropdown" style="margin-top: 3%">
  <button class="btn btn-primary btn-block" style="margin-bottom:2%;" type="button" data-target="#allRecords" data-toggle="collapse">See all Records
  <span class="caret"></span></button>


    <div id="allRecords" class="collapse {{ (!empty($getRecords) || !empty($filterDates) ) ? '' : 'in' }}">
        <button class="btn btn-success pull-right addNew" >Add  <span class="caret"></span></button>

        {{ Form::open(array('url' => '/store', 'method' => 'post', 'class' => 'form-horizontal' )) }}
           {{ csrf_field() }}

            <table class="table table-striped text-center" id="aru">
                <thead>
                    <tr>
                      <th class="text-center" style="display: none;">#</th>
                      <th class="text-center">Date</th>
                      <th class="text-center">Time</th>
                      <th class="text-center">Meal</th>
                      <th class="text-center">Kalories</th>
                      <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="data">
                        @if(!empty($datas))
                            @foreach($datas as $data)
                            <tr class="first">
                                <th scope="row" style="display: none;">{{ $data->id }}</th>
                                <td id="d_{{ $data->id }}">{{ Carbon\Carbon::parse($data->date)->format('d-m-Y') }}</td>
                                <td id="t_{{ $data->id }}">{{ Carbon\Carbon::parse($data->time)->format('H:i') }}</td>
                                <td id="m_{{ $data->id }}">{{ $data->meal }}</td>
                                <td id="c_{{ $data->id }}">{{ $data->calories }}</td>
                                <td>
                                    <button type="button" class="btn btn-info edit" name="1" id="e_{{ $data->id }}">Edit</button>
                                    <button type="button" class="btn btn-danger delete" id="{{ $data->id }}">Delete</button>

                                </td>
                            </tr>
                            @endforeach
                        @endif
                    <tr class ="second" style="display: {{ !empty($datas) ? 'none' : '' }}">
                        <th scope="row" style="display: none;">1</th>
                        <td>
                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-10">
                                    {{ Form::date('date[]',null, array('class' => 'form-control datpi', 'id' => 1, 'required','placeholder' => 'dd/mm/yyyy')) }}
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-2">
                            <div class="form-group">
                                <div class=" col-sm-offset-1 col-sm-10">
                                    {{ Form::text('time[]',null, array('class' => 'form-control timepicker', 'required', 'placeholder' => 'HH:ii')) }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class=" col-sm-offset-1 col-sm-10">
                                    {{ Form::text('meal[]',null, array('class' => 'form-control','required', 'placeholder' => 'meal name')) }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class=" col-sm-offset-1 col-sm-10">
                                    {{ Form::number('calorie[]',null, array('class' => 'form-control', 'required', 'placeholder' => 'number of calories')) }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger delete">Delete</button>
                        </td>
                      
                    </tr>
                </tbody>
            </table>
            
            <button type="submit" class="btn col-sm-offset-5 btn-primary" style="display:none;" id="submit">Submit the new entries</button>
        {{ Form::close() }}
    </div>
</div>

