<template>
	<div>
		<section class="bg-white pt-s5 pb-s5 overlay-wrap" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="/assets/images/bg/bg-5.jpg">
			<div class="container overlay-container">

				<!-- LOGIN -->
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="row">
							<div class="col-md-12">
								<ul class="list-inline">
									<li class="list-inline-item">
										<a class="btn bg-white text-pink text-bold-600 text-spacing-5 text-uppercase text-size-15 mb-10 rounded-0 box-shadow-3 pt-12 pb-12 pl-20 pr-20" href="/login">Login</a>
									</li>
									<li class="list-inline-item">
										<a class="btn bg-white text-pink text-bold-600 text-spacing-5 text-uppercase text-size-15 mb-10 rounded-0 box-shadow-1 pt-12 pb-12 pl-20 pr-20" href="/register">Register</a>
									</li>
									<li class="list-inline-item">
										<a class="btn bg-pink text-white text-bold-600 text-spacing-5 text-uppercase text-size-15 mb-10 rounded-0 box-shadow-1 pt-12 pb-12 pl-20 pr-20" href="/password/reset"><i class="fa fa-lock"></i></a>
									</li>
								</ul>

								<div :class="'alert alert-dismissible mb-12 fade show alert-' + response.type" v-if="response.isVisible" role="alert">
									{{response.message}}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="tab-pane bg-white pt-30 pb-30 pl-30 pr-30 box-shadow-1 position-relative">
									<div class="c-loading" v-if="loading">
					                    <pulse-loader loading="loading" color="#ef0880" size="25px"></pulse-loader>
					                </div>
									<h3 class="text-bold-700 text-uppercase mb-20">Lost Password</h3>
									<form>
										<div class="form-group">
											Please enter your email address. You will receive a link to create a new password via email.
										</div>
										<div class="form-group">
											<label class="text-bold-700 text-uppercase text-size-13">Email</label>
											<input type="email" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="Email" v-model="record.email">
											<small v-if="errors.email != null" class="text-danger text-size-11">
												<span>
													{{errors.email[0]}}
												</span>
											</small>
										</div>
										<button type="submit" class="btn btn-pink text-white rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 mb-10 pt-12 pb-12 pl-20 pr-20" @click.prevent="resetPassword()">Reset Password</button>
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
	data() {
		return {
            loading: false,
			record: {
				email: '',
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
            this.loading = true;
			// var $mainForm = $('#mainForm');
			// var data = new FormData(mainForm);
			axios.post('/password/reset', this.record)
			.then((res) => {
				if (res.data.success == false) {
                    this.loading = false,
					// alert(res.data.errors.message);
					this.errors = res.data.errors,
					this.response = {
						isVisible: true,
						message: res.data.errors.message[0],
						type: 'danger',
					}
					// if(res.data.errors.message != null){
					// 	this.errors = []
					// }
				} else {
                    this.loading = false,
					this.clearForm()
					this.response = {
						isVisible: true,
						message: res.data.message,
						type: 'success',
					}
					this.errors = []
				}
			})
			.catch((err) => {

			})
		},
		clearForm() {
			this.record = {
				email: '',
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