@extends('layouts.app')

@section('content')

    <h3 align="center">User Listing</h3>
    <br />
    <div align="right" style="margin-bottom: 5px;">
        <button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Add new user</button>
    </div>

    <div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Email</th>
						<th>Delete</th>
					</tr>
				</thead> 
				<tbody>
                    @foreach ( $users as $user )
                           <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                   
                                    <i name="delete"  class="glyphicon glyphicon-trash delete" id="{{  $user->id }}" style="color:red;"  ></i>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
			</table>
	</div>


     
@endsection

