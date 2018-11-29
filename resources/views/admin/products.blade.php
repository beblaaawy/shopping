
@include('includes/header')

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
				// echo $a['buttons'];
				?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Description</th>
							<th>Price</th>
							<th>Currency</th>
							<th>Availability</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $key => $product)
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $product['title']; ?></td>
							<td><?php echo $product['description']; ?></td>
							<td><?php echo $product['price']; ?></td>
							<td><?php echo $product['currency']; ?></td>
							<td>
								<?php
								if ($product['available'] == 1) {
									echo '<div style="width: 10px;height: 10px;border-radius: 50%; background: green"></div>';
								} else {
									echo '<div style="width: 10px;height: 10px;border-radius: 50%; background: #ddd"></div>';
								}
								?>								
							</td>
							<td>
								<a href="product_details.php?product_id=<?php echo $product['id']; ?>" class="btn btn-primary btn-xs" style="margin-top: 0;border-radius: 3px">View</a>
								<a href="product_update.php?product_id=<?php echo $product['id']; ?>" class="btn btn-success btn-xs">Edit</a>
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
