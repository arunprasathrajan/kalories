<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">
	<link rel="stylesheet" href="css/custom.css">
	<script src="js/app.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">

				<!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

				<!-- Branding Image -->
				<a class="navbar-brand" href="{{ url('/') }}">
					Kalories
				</a>
			</div>

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				

				 <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" style="cursor: pointer"  data-toggle="dropdown"><span class="glyphicon glyphicon-wrench" style="font-size: 1em;" aria-hidden="true"></span>Settings<span class="caret"></span>
						</a>
						 
						 <div class="dropdown-menu align-center" >
			             	<div class="div" style="padding-left: 10px; padding-right: 10px; ">
			             	<input type="number" id="expected" style=" margin-bottom: 5px;" name="calorieLimit" placeholder="number of Calories" required>
			             	<button type="button"  style="margin-left:20px;" class="btn btn-primary btn-sm" id="calorieSet">Set</button>
			             	</div>
			            </div>
                    </li>
                </ul>
			</div>
		</div>
	</nav>

	@yield('content')
	<script src="js/kalori.js"></script>
	
</body>
</html>