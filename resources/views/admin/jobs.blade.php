@extends('app')

@section('content')

<div id="admin-jobs" class="container">
	<div>
		<b-pagination size="md" :total-rows="total" v-model="page" :per-page="amount" @change="paginationChanged"></b-pagination>
		<b-form-select v-model="amount" @change="selectChanged" :options="[10, 25, 50, 100, 200]"/>
	</div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Title</th>
					<th>Location</th>
					<th>Cpompany Name</th>
					<th>Description</th>
					<th>Cpompany Logo</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(job, index) in jobs" v-cloak>
					<td>[[ index + 1 ]]</td>
					<td>[[ job.name ]]</td>
					<td>[[ job.title ]]</td>
					<td>[[ job.location ]]</td>
					<td>[[ job.company_name ]]</td>
					<td v-html="job.description"></td>
					<td>
						<img :src="job.logo" class="company-logo">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div @click="loadJobs">Load</div>
</div>

@endsection

@section('styles')
	<style>
		.company-logo {
			width: 50px;
			height: 50px;
			border-radius: 50%;
			border: 1px solid #999;
		}
	</style>
@endsection

@section('scripts')
<script>
new Vue({
	el: '#admin-jobs',
	delimiters: ['[[', ']]'],
	data: {
		jobs: [],
		page: 1,
		amount: 10,
		total: 0
	},
	methods: {
		selectChanged (amount) {
			this.page = 1
			this.amount = amount
			this.loadJobs()
		},
		paginationChanged (page) {
			this.page = page
			this.loadJobs()
		},
		loadJobs() {
			axios.get('/admin/jobs/json', {
				params: {
					amount: this.amount,
					page: this.page
				}
			}).then(res => {
				this.jobs = res.data.jobs
				this.total = res.data.total
				this.amount = res.data.amount
			}).catch(res => {
				// this.errors = res.response.data.errors
			})
		}
	},
	created () {
		this.loadJobs()
	}
})
</script>
@endsection