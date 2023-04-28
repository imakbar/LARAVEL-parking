<template>
	<div>
		<section class="bg-white pt-s5 pb-s5 overlay-wrap" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="/assets/images/bg/bg-5.jpg">
			<div class="container overlay-container">

				<!-- LOGIN -->
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="row">

							<div class="col-md-12">

								<div :class="'alert alert-dismissible fade show alert-' + response.type" v-if="response.isVisible" role="alert">
									{{response.message}}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="tab-pane bg-white pt-30 pb-30 pl-30 pr-30 box-shadow-1">
									<h3 class="text-bold-700 text-uppercase mb-20">Change Password</h3>
									<form>
										<div class="form-group">
											<label class="text-bold-700 text-uppercase text-size-13">Password</label>
											<input type="password" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="Password" v-model="record.password">
											<small v-if="errors.password != null" class="text-danger text-size-11">
												<span>
													{{errors.password[0]}}
												</span>
											</small>
										</div>
										<div class="form-group mb-30">
											<label class="text-bold-700 text-uppercase text-size-13">Confirm Password</label>
											<input type="password" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="Confirm Password" v-model="record.confirm_password">
											<small v-if="errors.confirm_password != null" class="text-danger text-size-11">
												<span>
													{{errors.confirm_password[0]}}
												</span>
											</small>
										</div>
										<button type="submit" class="btn btn-pink text-white rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 mb-10 pt-12 pb-12 pl-20 pr-20" @click.prevent="resetPassword()">Reset</button>
									</form>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- /LOGIN -->

			</div>
			<div class="overlay bg-v5-dark"></div>
		</section> <!-- /SECTION -->
	</div>
</template>
<script>
export default {
	props: [
		'user_id',
		'token',
	],
	data() {
		return {
			record: {
				user_id: this.user_id,
				token: this.token,
				password: '',
				confirm_password: '',
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
		resetPassword() {
			// var $mainForm = $('#mainForm');
			// var data = new FormData(mainForm);
			axios.post('/password/reset/form', this.record)
			.then((res) => {
				if (res.data.success == false) {
					this.errors = res.data.errors,
					this.response = {
						isVisible: true,
						message: res.data.errors.message[0],
						type: 'danger',
					}
				} else {
					this.clearForm()
					this.response = {
						isVisible: true,
						message: res.data.message,
						type: 'success',
					}
					this.errors = []
					setTimeout(() => window.location = '/login', 1000);
				}
			})
			.catch((err) => {

			})
		},
		clearForm() {
			this.record = {
				user_id: this.user_id,
				token: this.token,
				password: '',
				confirm_password: '',
			}
			this.response = {
				type: "success",
				message: "",
				isVisible: false
			}
			this.errors = []
		},
	}
};
</script>