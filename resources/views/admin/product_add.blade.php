
@include('includes/header')

<section id="product-add"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-success" v-if="success" v-cloak>
					Product has been added successfully!
				</div>
				<div class="alert alert-danger" v-if="failed" v-cloak>
					<div v-for="value in errors">
						<div v-for="error in value">
							@{{ error }}
						</div>
					</div>
				</div>

				<div class="login-form"><!--login form-->
					<h2>Create new product</h2>
					<form @submit.prevent="onSubmit">
						<input type="text" v-model="form.title" placeholder="product title">
						<select v-model="form.category_id">
							<option selected disabled>Please select category</option>
							<?php
							foreach ($categories as $key => $category) {
					echo "<option value='{$category['id']}'>{$category['name']}</option>";
							}
							?>
							
						</select>
						<br><br>
						<textarea v-model="form.description" placeholder="product description ..." rows="5"></textarea>
						<br><br>
						<input type="number" v-model="form.price" placeholder="product price">
						<input type="number" v-model="form.quantity" placeholder="product quantity">
						<input type="number" v-model="form.in_stock" placeholder="In Stock">
						<input type="file" name="avatar">
						<select v-model="form.type">
							<option disabled selected>Please select type</option>
							<option value="new">New Item</option>
							<option value="sale">Sale Item</option>
						</select>
						<input type="text" v-model="form.brand" placeholder="product brand">
						<select v-model="form.currency">
							<option disabled selected>Please select currency</option>
							<option value="egp">EGP</option>
							<option value="usd">USD</option>
						</select>
						<span>
							<input type="checkbox" v-model="form.available" class="checkbox"> 
							Available
						</span>
						<button type="submit" class="btn btn-default">
							<span v-cloak v-if="loading"><img src="/images/spinner.gif" width="40px"></span>
							<span v-else>Create</span>
						</button>
					</form>
				</div><!--/login form-->
			</div>
		</div>
	</div>
</section><!--/form-->
	
@include('includes/footer')

<script type="text/javascript">
	new Vue({
		el: '#product-add',
		data: {
			failed: false,
			loading: false,
			success: false,
			errors: {},
			form: {}
		},
		methods: {
			onSubmit () {
				this.loading = true
				axios.post('/admin/products/create', this.form).then(res => {
					console.log(res)
					this.loading = false
					this.success = true
					this.failed = false
					this.form = {}
				}).catch(res => {
					this.loading = false
					this.success = false
					this.failed = true
					this.errors = res.response.data.errors
					console.log(res.response.data)
				})
			}
		}
	})
</script>
