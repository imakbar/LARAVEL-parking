<template>
	<div>
		<section class="bg-white pt-s5 pb-s5 overlay-wrap" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="/assets/images/bg/bg-5.jpg">
			<div class="container overlay-container">

				<!-- LOGIN -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="row">
							<div class="col-md-12">

								<!-- <div :class="'alert alert-dismissible fade show alert-' + response.type" v-if="response.isVisible" role="alert">
									{{response.message}}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div> -->

								<!-- <div class="tab-pane bg-white pt-30 pb-30 pl-30 pr-30 box-shadow-1"> -->
								<div>
									<h3 class="text-bold-700 text-uppercase mb-20">Change Password</h3>
									<form id="mainForm">

					                    <div class="row">

			                                <div class="col-md-6">
			                                    <div class="form-group">
			                                        <label class="text-bold-600 text-uppercase text-size-11">Password</label>
			                                        <input type="password" name="password" v-model="record.password" class="form-control text-size-12 form-control-lg" placeholder="Password">
			                                        <small>
						                                <span v-if="errors.password != null" class="text-danger">
						                                    {{errors.password[0]}}
						                                </span>
						                            </small>
			                                    </div>
			                                </div>
			                                <div class="col-md-6">
			                                    <div class="form-group">
			                                        <label class="text-bold-600 text-uppercase text-size-11">Confirm Password</label>
			                                        <input type="password" name="confirm_password" v-model="record.confirm_password" class="form-control text-size-12 form-control-lg" placeholder="Confirm Password">
			                                        <small>
						                                <span v-if="errors.confirm_password != null" class="text-danger">
						                                    {{errors.confirm_password[0]}}
						                                </span>
						                            </small>
			                                    </div>
			                                </div>

			                            </div>

			                            <button type="submit" class="btn btn-primary" @click.prevent="update()">Save Changes</button>

							            <div :class="'m-top-20 alert-rounded alert-dismissible alert alert-' + response.type"
							                v-if="response.isVisible">
							                {{response.message}}
							            </div>

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
            record: {
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
	created() {
	},
	methods: {
		getPermissions() {
			axios.get('/user/permissions')
			.then((res) => {
				this.permissions = res.data
			})
		},
		update() {
            // var $mainForm = $('#mainForm');
            // var form = $('#PROGRAMadd-form')[0];
            // var data = new FormData(mainForm);
			axios.post('/change-password', this.record)
			.then((res) => {
				if (res.data.success == false) {
					this.errors = res.data.errors,
					this.response = {
						isVisible: true,
						message: res.data.errors.message[0],
						type: 'danger',
					}
				} else {
					this.response = {
						isVisible: true,
						message: res.data.message,
						type: 'success',
					}
					this.errors = []
					setTimeout(() => this.clearForm(), 1000);
				}
			})
			.catch((err) => {

			})
		},
		clearForm() {
            this.record = {
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
	},
};
</script>