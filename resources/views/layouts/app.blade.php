<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <meta name="viewport" content="width=device-width, initial-scale=1">
   	   <title>{{ config('app.name', 'Laravel') }}</title>
   	   <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	   <script src="/js/jquery-3.1.1.min.js" ></script>
	   <script src="/js/bootstrap.min.js" ></script>
   </head>
   <body>
   	  
   	  <!-- CONTENT -->
   	  <div class="container">
   	  	<!-- SHOWCASE -->
   	    @include('inc.showcase')
   	  	<div class="row">

   	  	   <div class="col-md-12 col-lg-12">
   	  	   	  @yield('content')
   	  	   </div>

   	  	</div>
   	  </div>

   	  <!-- FOOTER -->
   	  <footer id="footer" class="text-center">
   	  	 <p>Copyright 2023 &copy; User Listing App</p>
   	  </footer>

   </body>
</html>



<!--Modal -->
<div id="usercrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			
			<form method="post" id="api_crud_form">
			{{csrf_field()}}
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Data</h4>
				</div>
				<!-- Modal Body-->
				<div class="modal-body">

						<div class="form-group">
							<label> Name</label>
							<input type="text" name="name" id="name" class="form-control" />
							<div id="name_error"></div>
						</div>

						<div class="form-group">
									<label>Surname</label>
									<input type="text" name="surname" id="surname" class="form-control" />
									<div id="surname_error"></div>
						</div>

						<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" id="email" class="form-control" />
									<div id="email_error"></div>
						</div>

						<div class="form-group">
									<label>Position</label>
									<input type="text" name="position" id="position" class="form-control" />
									<div id="position_error"></div>
					    </div>

				</div>
				<!-- Modal Footer -->
				<div class="modal-footer">
				    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
				</div>

			</form>

		</div>
	</div>
</div>


<!--# SCRIPT  -->
<script type="text/javascript">

$(document).ready( function(){


   //SHOW THE ADD NEW USER MODAL
	$('#add_button').click(function(){
			$('#action').val('insert');
			$('#button_action').val('Save');
			$('.modal-title').text('Add new user');
			$('#usercrudModal').modal('show');

   });

   	//ADD USER
	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();

		//Test for empty input field
		if( $('#name').val() == '' ){
			$('#name_error').html("<div style='color:red;'>Please enter your name</div>");

		}else if( $('#surname').val() == '' ){
			$('#surname_error').html("<div style='color:red;'>Please enter your surname</div>");

		}else if( $('#email').val() == '' ){
			$('#email_error').html("<div style='color:red;'>Please enter your email</div>");

		}else if( $('#position').val() == '' ){
			$('#position_error').html("<div style='color:red;'>Please enter your current position</div>");

		}else{
			var form_data = $(this).serialize();

			$.ajax({
				url:"/users/store",
				method:"POST",
				data:form_data,
				success:function(data){

					$('#api_crud_form')[0].reset(); //reset the form
					$('#usercrudModal').modal('hide');
					
					alert("User added successful");
					location.reload('/users');
	
				}

			});
		}


	});


	//DELETE USER
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");

		if( confirm("Please confirm if you would like to delete this user.") ){

			$.ajax({
				url:"/user/"+id ,
				method:"POST",
				data:{'_token':"{{ csrf_token() }}" },
				success:function(data){
					alert("User deleted successful");
					location.reload('/users');
				}
			});

		}

	});

	




});
</script>
