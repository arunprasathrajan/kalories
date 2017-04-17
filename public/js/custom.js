$(function(){
	
	//Jquery datepicker functionality
	$('.datepicker').datepicker({ 
		changeYear: true ,
		changeMonth: true ,
		dateFormat: "dd-mm-yy",
	});


	//Increment the index of the row 
	$lastId = parseInt($('tr.first th:last').text());
	if($lastId !== null )
	{
		$id = $lastId + 1;

		$('#aru tbody tr th:last').text($id);
	}

	// Adding a new record 
	$(".addNew").on('click', function(){
		if($('.second').is(":hidden"))
			{

				$('.second').show().removeClass('second');
				$('#submit').show();
			}
		else
		{
			$number = parseInt($('#aru tbody tr th:last').text());
			$datepickerId = parseInt($('#aru tbody tr:last td:first .form-group div input').attr('id'));
			$( '#aru tbody tr:last td:first .form-group div input' ).removeClass( "hasDatepicker" );
			$("#aru tbody tr:last" ).clone(true).appendTo("tbody#data");

			$('#aru tbody tr th:last').text($number + 1);
			$('#aru tbody tr:last td:first .form-group div input').attr('id', $datepickerId + 1 );
			$("#aru tbody tr:last td input").val('');
			$('.timepicker').timepicker({
				'timeFormat': 'H:i'
			});
		}
	});

	//Jquery timepicker functionality
	$('.timepicker').timepicker({
		'timeFormat': 'H:i'
	});

	// Editing and updating the new records using ajax
	$('.edit').on('click', function(){

		$editOrSave=$(this).attr("name");
		$alter = $(this).attr("id");
		$a=$alter.split('_').pop();

		$date = $('#d_'+$a).html();
		$time = $('#t_'+$a).html();
		$meal = $('#m_'+$a).html();
		$calorie = $('#c_'+$a).html();
		console.log($date);

		if($editOrSave==1){
			$('#d_'+$a).replaceWith('<td class="text-center">\
	            <div class="form-group">\
	            <div class="col-sm-offset-1 col-sm-10">\
	            <input id="d_'+ $a+'" class="form-control datpi" name="date" type="text" value='+$date+' >\
	            </div>\
	            </div>\
	            </td>');
			$('#t_'+$a).replaceWith(' <td class=" text-centercol-sm-2">\
	            <div class="form-group">\
	            <div class=" col-sm-offset-1 col-sm-10">\
	            <input id="t_'+ $a+'" class="form-control timepicker ui-timepicker-input" name="time" type="text"  value='+$time+' autocomplete="off">\
	            </div>\
	            </div>\
	            </td>');
			$('#m_'+$a).replaceWith('<td class="text-center">\
	            <div class="form-group">\
	            <div class=" col-sm-offset-1 col-sm-10">\
	            <input id="m_'+ $a+'" class="form-control" name="meal" value='+$meal+' type="text">\
	            </div>\
	            </div>\
	            </td>');
			$('#c_'+$a).replaceWith(' <td class="text-center">\
	            <div class="form-group">\
	            <div class=" col-sm-offset-1 ">\
	            <input  id="c_'+ $a+'" class="form-control" name="kalori" value='+$calorie+' type="number">\
	            </div>\
	            </div>\
	            </td>');
			$(this).removeClass("btn btn-info").addClass("btn btn-success");
			$(this).prev('td').remove();
			$(this).attr({name:"2"});
			$(this).text('Save');
			$('.timepicker').timepicker({
				'timeFormat': 'H:i'
			});
		}

		if($editOrSave==2){
			
			$date=$('#d_'+$a).val();
			$time=$('#t_'+$a).val();
			$meal=$('#m_'+$a).val();
			$calorie=$('#c_'+$a).val();

			$.ajax({
				method: 'post',
				url: "/update",
				data: {
					id: $a,
					date: $date,
					time: $time,
					meal: $meal,
					calorie: $calorie,
					_token: $('input[name=_token]').val()
				},
			});

			$('#d_'+$a).replaceWith('<td style="position:absolute; margin-left:25%;" id="d_'+ $a+'">'+$date+'</td>');
			$('#t_'+$a).replaceWith('<td style="position:absolute; margin-left:25%;" id="t_'+ $a+'">'+$time+'</td>');
			$('#m_'+$a).replaceWith('<td style="position:absolute; margin-left:25%;" id="m_'+ $a+'">'+$meal+'</td>');
			$('#c_'+$a).replaceWith('<td style="position:absolute; margin-left:5%;" id="c_'+ $a+'">'+$calorie+'</td>');

			
			$(this).removeClass("btn btn-success").addClass("btn btn-info");
			$(this).attr({name:"1"});
			$(this).text('Edit');
		}
	});


	//Deleting the record using Ajax.
	$('.delete').on('click', function(){
		$deleteId = parseInt($(this).attr("id"));

		if(!(isNaN($deleteId)))
		{
			$.ajax({
				method: 'post',
				url: "/delete",
				data: {
					id: $deleteId,
					_token: $('input[name=_token]').val()
				},
			});
		}
        $(this).closest('tr').remove();
		console.log($deleteId);
	});

	//Updating the calorie value using Ajax.
	$('#calorieSet').on('click', function(){
		$userCalorie = parseInt($('#expected').val());
		$('.first td span').css('color','red');
		if(!(isNaN($userCalorie)))
		{
			console.log($userCalorie);
			$.ajax({
				method: 'post',
				url: "/calorieSet",
				data: {
					userCalorieValue: $userCalorie,
					_token: $('input[name=_token]').val()
				},
			});
			$( 'span[id*="'+$userCalorie+'"]' ).css('color','green');
		
			$('#userSetCalorieLimit').text($userCalorie);
			$('#expected').val('');
	    	
    	}
	});

});
