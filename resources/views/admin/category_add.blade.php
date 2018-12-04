

@include('includes/header')

<section>
	<div class="container" id="category-add">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-success" v-if="success">
					Cateogry has been added successfully!
				</div>
				<div class="alert alert-danger" v-if="failed">
					<div v-for="value in errors">
						<div v-for="error in value">
							@{{ error }}
						</div>
					</div>
				</div>
				<div class="login-form">
					<h2>Create new category</h2>
					<form @submit.prevent="onSubmit">
						<input type="text" v-model="name" placeholder="category name">
						<span>
							<input type="checkbox" v-model="available" class="checkbox"> 
							Available
						</span>
						<button type="submit" class="btn btn-default">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
	
@include('includes/footer')

<script type="text/javascript">
	new Vue({
	el: '#category-add',
	data: {
		name: '',
		available: false,
		success: false,
		failed: false,
		errors: {}
	},
	methods: {
		onSubmit () {
			// /admin/categories/create
			console.log('submitted!!!')
			axios.post('/admin/categories/create', {
				name: this.name,
				available: this.available
			}).then(res => {
				this.name = ''
				this.failed = false
				this.success = true
				this.available = false
				console.log(res)
			}).catch(res => {
				this.success = false
				this.failed = true
				this.errors = res.response.data.errors
				console.log()
			})
		}
	}
	})
</script>

