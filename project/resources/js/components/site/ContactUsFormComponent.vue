<template>
	<div>

		<form>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="text" v-model="record.name" class="form-control bg-light text-size-12 pt-16 pb-16 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark" placeholder="Name*">
					<small v-if="errors.name != null" class="text-danger text-size-11">
						<span>
							{{errors.name[0]}}
						</span>
					</small>
				</div>
				<div class="form-group col-md-6">
					<input type="email" v-model="record.email" class="form-control bg-light text-size-12 pt-16 pb-16 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark" placeholder="Email*">
					<small v-if="errors.email != null" class="text-danger text-size-11">
						<span>
							{{errors.email[0]}}
						</span>
					</small>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<input type="text" v-model="record.subject" class="form-control bg-light text-size-12 pt-16 pb-16 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark" placeholder="Subject*">
					<small v-if="errors.subject != null" class="text-danger text-size-11">
						<span>
							{{errors.subject[0]}}
						</span>
					</small>
				</div>
			</div>
			<div class="form-group">
				<textarea class="form-control bg-light text-size-12 pt-16 pb-16 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark" rows="5" placeholder="Your Message*" v-model="record.message"></textarea>
				<small v-if="errors.message != null" class="text-danger text-size-11">
					<span>
						{{errors.message[0]}}
					</span>
				</small>
			</div>
			<button type="submit" @click.prevent="save()" class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-s5 pt-12 pb-12 pl-s3 pr-s3 mt-s1 mb-s1">Send Message</button>
		</form>

		<div :class="'alert alert-dismissible fade show alert-' + response.type" v-if="response.isVisible" role="alert">
			{{response.message}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

	</div>
</template>
<script type="text/javascript">
export default {
	data() {
		return {
			record: {
				name: '',
				email: '',
				subject: '',
				message: '',
				status: 1,
			},
			response: {
				type: "success",
				message: "",
				isVisible: false
			},
			errors: [],
			permissions: [],
		}
	},
	created() {},
	methods: {
		getPermissions() {
			axios.get('/user/permissions')
			.then((res) => {
				this.permissions = res.data
			})
		},
		save() {
			// var $mainForm = $('#mainForm');
			// var data = new FormData(mainForm);
			axios.post('/contact-us-post', this.record)
			.then((res) => {
				if (res.data.success == false) {
					this.errors = res.data.errors,
					this.response = {
						isVisible: false,
					}
				} else {
					this.clearForm()
					this.response = {
						isVisible: true,
						message: res.data.message,
						type: 'success'
					}
					this.errors = []
				}
			})
			.catch((err) => {

			})
		},
		clearForm() {
			this.record = {
				name: '',
				email: '',
				subject: '',
				message: '',
				status: 1,
			}
			this.response = {
				type: "success",
				message: "",
				isVisible: false
			}
			this.errors = []
		},
	}
}
</script>