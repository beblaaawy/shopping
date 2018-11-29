
@include('includes/header')

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
				// echo $a->buttons;
				?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Phone</th>
							<th>Gender</th>
							<th>Address</th>
							<th>ZipCode</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $key => $user)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $user->first_name }}</td>
							<td>{{ $user->last_name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->role }}</td>
							<td>{{ $user->phone }}</td>
							<td>{{ $user->gender }}</td>
							<td>{{ $user->address }}</td>
							<td>{{ $user->zipcode }}</td>
							<td>
								<a href="product_details.php?product_id={{ $user->id }}" class="btn btn-primary btn-xs" style="margin-top: 0;border-radius: 3px">View</a>
								<a href="product_update.php?product_id={{ $user->id }}" class="btn btn-success btn-xs">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
	
@include('includes/footer')