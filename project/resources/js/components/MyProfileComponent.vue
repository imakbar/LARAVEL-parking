<template>
	<div>
		<!--
		#################################
		    - Begin: PAGE HEADER -
		#################################
		-->
		<div class="page-header bg-base p-top-30 p-bottom-30">
			<div class="container">

				<div class="row d-flex align-items-center">

					<div class="col-md-8 text-center-sm">
						<h3 class="text-white text-uppercase text-bold-700 m-bottom-0">My Profile</h3>
					</div>

					<div class="col-md-4 text-right text-center-sm">
						<ol class="breadcrumb bg-white rounded-0">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
							<li class="breadcrumb-item active">My Profile</li>
						</ol>
					</div>

				</div>

			</div>
		</div>
		<!-- End: PAGE HEADER -
		################################################################## -->
		<div class="bg-light-3 p-top-80 p-bottom-80">
	        <div class="container">

	            <!-- DATA -->
	            <div class="row m-bottom-30">

	                <div class="col-lg-12 col-md-12">

	                    <ul class="">
	                        <li class="pull-left">
	                            <a class="btn btn-white box-shadow-1 box-shadow-4-hover hover-1 rounded-0 p-top-30 p-bottom-30 p-left-30 p-right-30 m-right-4" href="/submit-property">
	                                <i class="fa fa-mail-forward d-block m-bottom-10 text-size-25"></i>
	                                Submit Property
	                            </a>
	                        </li>
	                        <li class="pull-left">
	                            <a class="btn btn-white box-shadow-1 active box-shadow-4 hover-1 rounded-0 p-top-30 p-bottom-30 p-left-30 p-right-30 m-right-4" href="/my-profile">
	                                <i class="fa fa-user d-block m-bottom-10 text-size-25"></i>
	                                Profile
	                            </a>
	                        </li>
	                        <li class="pull-left">
	                            <a class="btn btn-white box-shadow-1 box-shadow-4-hover hover-1 rounded-0 p-top-30 p-bottom-30 p-left-30 p-right-30 m-right-4" href="/my-properties">
	                                <i class="fa fa-building-o d-block m-bottom-10 text-size-25"></i>
	                                Properties
	                            </a>
	                        </li>
	                        <li class="pull-left">
	                            <a class="btn btn-white box-shadow-1 box-shadow-4-hover hover-1 rounded-0 p-top-30 p-bottom-30 p-left-30 p-right-30 m-right-4" href="/my-bookmarked">
	                                <i class="fa fa-star-o d-block m-bottom-10 text-size-25"></i>
	                                Bookmarked
	                            </a>
	                        </li>
	                        <li class="pull-left">
	                            <a class="btn btn-white box-shadow-1 box-shadow-4-hover hover-1 rounded-0 p-top-30 p-bottom-30 p-left-30 p-right-30 m-right-4" href="/change-password">
	                                <i class="fa fa-unlock-alt d-block m-bottom-10 text-size-25"></i>
	                                Change Password
	                            </a>
	                        </li>
	                        <li class="pull-left">
	                            <a class="btn btn-white box-shadow-1 box-shadow-4-hover hover-1 rounded-0 p-top-30 p-bottom-30 p-left-30 p-right-30" href="/logout">
	                                <i class="fa fa-power-off d-block m-bottom-10 text-size-25"></i>
	                                Log Out
	                            </a>
	                        </li>
	                    </ul>

	                </div>

	            </div>

	            <div class="bg-white box-shadow-1 p-top-30 p-bottom-30 p-left-30 p-right-30 m-bottom-30">

	                <form id="mainForm">

	                    <div class="row">

	                            <div class="col-lg-3 col-md-3">
									<img :src="'/uploads/profiles/'+record.avatar" alt='Image preview' class='img-thumbnail w-100'>
	                            	<button type="button" class="btn btn-base btn-block rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-top-12 p-bottom-12 p-left-20 p-right-20 m-top-20" data-toggle="modal" data-target="#profileImage">
										<i class="fa fa-image"></i>
										Change Image
									</button>
									<!-- MODAL -->
									<div class="modal fade" id="profileImage" tabindex="-1" role="dialog"  aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">{{record.first_name}}</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true" class="zmdi zmdi-close"></span>
													</button>
												</div>
												<div class="modal-body">
										            <div :class="'m-top-20 alert-rounded alert-dismissible alert alert-' + response.type"
										                v-if="response.isVisible">
										                {{response.message}}
										            </div>
													<!-- File Begin -->
													<div class="img-upload">
														<div class="img-file-tab">
															<div>
																<span class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-top-12 p-bottom-12 p-left-20 p-right-20 m-top-20 btn-file img-select-btn"><i class="fa fa-image"></i>
																	<span>Select Image</span>
																	<input type="file" name="avatar" id="avatar">
																</span>
																<span class="btn btn-danger rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-top-12 p-bottom-12 p-left-20 p-right-20 m-top-20 img-remove-btn">Remove</span>
															</div>
															<img :src="'/uploads/profiles/'+record.avatar" alt='Image preview' class='img-thumbnail w-100'>
														</div>
													</div>
		                                            <div class="m-top-20 m-bottom-10">
			                                            <small>
							                                <span v-if="errors.avatar != null" class="text-danger">
							                                    {{errors.avatar[0]}}
							                                </span>
							                            </small>
						                            </div>
													<!-- File End -->
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13" @click.prevent="updateAvatar()">Save</button>
												</div>
											</div>
										</div>
									</div>
									<!-- /MODAL -->
	                            </div>

	                            <div class="col-lg-9 col-md-9">
	            
	                                <h3 class="text-bold-700 m-bottom-10">My Profile</h3>
	                    
	                                <div class="hr dark text-left m-bottom-20">
	                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
	                                    <div class="icons text-light">
	                                        <i class="fa fa-circle-o"></i>
	                                        <i class="fa fa-circle-o"></i>
	                                        <i class="fa fa-circle-o"></i>
	                                    </div>
	                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
	                                </div>

	                                <div class="row">

	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label class="text-bold-700 text-uppercase text-size-13">First Name</label>
	                                            <div class="input-group">
	                                                <div class="input-group-addon bg-light-7 border-1 border-light rounded-0 width-40 text-center">
	                                                    <i class="fa fa-user"></i>
	                                                </div>
	                                                <input type="text" name="first_name" v-model="record.first_name" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="First Name">
	                                            </div>
	                                            <small>
					                                <span v-if="errors.first_name != null" class="text-danger">
					                                    {{errors.first_name[0]}}
					                                </span>
					                            </small>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label class="text-bold-700 text-uppercase text-size-13">Last Name</label>
	                                            <div class="input-group">
	                                                <div class="input-group-addon bg-light-7 border-1 border-light rounded-0 width-40 text-center">
	                                                    <i class="fa fa-user"></i>
	                                                </div>
	                                                <input type="text" name="last_name" v-model="record.last_name" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="Last Name">
	                                            </div>
	                                            <small>
					                                <span v-if="errors.last_name != null" class="text-danger">
					                                    {{errors.last_name[0]}}
					                                </span>
					                            </small>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label class="text-bold-700 text-uppercase text-size-13">Phone #</label>
	                                            <div class="input-group">
	                                                <div class="input-group-addon bg-light-7 border-1 border-light rounded-0 width-40 text-center">
	                                                    <i class="fa fa-phone"></i>
	                                                </div>
	                                                <input type="text" name="phone" v-model="record.phone" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="Phone Number">
	                                            </div>
	                                            <small>
					                                <span v-if="errors.phone != null" class="text-danger">
					                                    {{errors.phone[0]}}
					                                </span>
					                            </small>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label class="text-bold-700 text-uppercase text-size-13">Mobile #</label>
	                                            <div class="input-group">
	                                                <div class="input-group-addon bg-light-7 border-1 border-light rounded-0 width-40 text-center">
	                                                    <i class="fa fa-mobile"></i>
	                                                </div>
	                                                <input type="text" name="mobile" v-model="record.mobile" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="Mobile Number">
	                                            </div>
	                                            <small>
					                                <span v-if="errors.mobile != null" class="text-danger">
					                                    {{errors.mobile[0]}}
					                                </span>
					                            </small>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label class="text-bold-700 text-uppercase text-size-13">Email</label>
	                                            <div class="input-group">
	                                                <div class="input-group-addon bg-light-7 border-1 border-light rounded-0 width-40 text-center">
	                                                    <i class="fa fa-envelope"></i>
	                                                </div>
	                                                <input type="email" name="email" v-model="record.email" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="Email">
	                                            </div>
	                                            <small>
					                                <span v-if="errors.email != null" class="text-danger">
					                                    {{errors.email[0]}}
					                                </span>
					                            </small>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label class="text-bold-700 text-uppercase text-size-13">I am</label>
	                                            <div class="input-group">
	                                                <div class="m-top-10">
	                                                <label class="custom-control custom-radio">
	                                                    <input id="radio1" name="i_am" v-model="record.i_am" value="buying_agent" type="radio" class="custom-control-input" checked="">
	                                                    <span class="custom-control-indicator"></span>
	                                                    <span class="custom-control-description">Buying Agent</span>
	                                                </label>
	                                                <label class="custom-control custom-radio">
	                                                    <input id="radio2" name="i_am" v-model="record.i_am" value="selling_agent" type="radio" class="custom-control-input">
	                                                    <span class="custom-control-indicator"></span>
	                                                    <span class="custom-control-description">Selling Agent</span>
	                                                </label>
	                                                <label class="custom-control custom-radio">
	                                                    <input id="radio3" name="i_am" v-model="record.i_am" value="buying_selling_agent" type="radio" class="custom-control-input">
	                                                    <span class="custom-control-indicator"></span>
	                                                    <span class="custom-control-description">Both</span>
	                                                </label>
	                                                </div>
	                                            </div>
	                                            <small>
					                                <span v-if="errors.i_am != null" class="text-danger">
					                                    {{errors.i_am[0]}}
					                                </span>
					                            </small>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-12">
	                                        <div class="form-group">
	                                            <label class="text-bold-700 text-uppercase text-size-13">About Me</label>
	                                            <div class="input-group">
	                                                <div class="input-group-addon bg-light-7 border-1 border-light rounded-0 width-40 text-center">
	                                                    <i class="fa fa-user"></i>
	                                                </div>
	                                                <textarea rows="8" name="about_me" v-model="record.about_me" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="About Me"></textarea>
	                                            </div>
	                                        </div>
	                                    </div>

	                                </div>

	                                <div class="row">

	                                    <div class="col-md-12">
	                                        <h3 class="text-bold-700 m-top-60 m-bottom-10">My Social</h3>
	                            
	                                        <div class="hr dark text-left m-bottom-20">
	                                            <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
	                                            <div class="icons text-light">
	                                                <i class="fa fa-circle-o"></i>
	                                                <i class="fa fa-circle-o"></i>
	                                                <i class="fa fa-circle-o"></i>
	                                            </div>
	                                            <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
	                                        </div>
	                                    </div>

					                    <div class="col-md-12">
						                    <div class="row">
						                    	<div class="col-md-3">
							                        <div class="form-group tooltip_error">
							                            <v-select v-model="record.socialsetup_id" label="name" :options="socialsetups"></v-select>
							                        </div>
							                    </div>
							                    <div class="col-md-3">
							                    	<button class="btn btn-sm btn-primary" @click.prevent="addSocial()">
							                    		<i class="zmdi zmdi-plus"></i> add
							                    	</button>
							                    </div>
						                    </div>
					                    </div>

	                                    <div class="col-md-6" v-for="(social, index) in record.mySocials" :key="index">
	                                        <div class="form-group">
	                                            <label class="text-bold-700 text-uppercase text-size-13">{{social.name}}</label>
	                                            <div class="input-group">
	                                                <div class="input-group-addon bg-light-7 border-1 border-light rounded-0 width-40 text-center">
	                                                    <i :class="social.icon"></i>
	                                                </div>
	                                                <input type="text" v-model="social.social_link" name="social_link" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14">
	                                                <button class="btn btn-sm btn-danger rounded-0" @click.prevent="delSocial(index)"><i class="la la-trash"></i></button>
	                                            </div>
	                                        </div>
	                                    </div>

	                                </div>

                                    <button type="submit" class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-top-12 p-bottom-12 p-left-20 p-right-20" @click.prevent="update()">Save Changes</button>

						            <div :class="'m-top-20 alert-rounded alert-dismissible alert alert-' + response.type"
						                v-if="response.isVisible">
						                {{response.message}}
						            </div>

	                            </div>

	                    </div>

	                </form>

	            </div>
	            <!-- /DATA -->

	        </div>
	    </div>
	</div>
</template>
<script>
export default {
	data() {
		return {
			record: {
				first_name: '',
				last_name: '',
				phone: '',
				mobile: '',
				email: '',
				i_am: '',
				about_me: '',
				avatar: '',
				status: 1,
				socialsetup_id: {},
				mySocials: [],
			},
			response: {
				type: "success",
				message: "",
				isVisible: false
			},
			errors: [],
			permissions: [],
			socialsetups: [],
		}
	},
	created() {
		this.getData()
		this.getSocialSetups()
	},
  //   mounted() {
		// $('.img-upload').imgUpload();
  //   },
	methods: {
		addSocial(){
			if(this.existSocial() == true){
				this.record.mySocials.push({
					socialsetup_id: this.record.socialsetup_id.id,
					name: this.record.socialsetup_id.name,
					icon: this.record.socialsetup_id.icon,
					social_link: '',
				});
			}
			else
			{
				alert('already exist');
			}
		},
		existSocial(){
			if(this.record.mySocials.find(item => item.socialsetup_id === this.record.socialsetup_id.id)){
				return false;
			}
			else
			{
				return true;
			}
		},
		getPermissions() {
			axios.get('/user/permissions')
			.then((res) => {
				this.permissions = res.data
			})
		},
        getData() {
            axios.get('/my-profile/get')
                .then((res) => {
                    this.record.first_name = res.data.first_name
                    this.record.last_name = res.data.last_name
                    this.record.phone = res.data.phone
                    this.record.mobile = res.data.mobile
                    this.record.email = res.data.user.email
                    this.record.i_am = res.data.i_am
                    this.record.about_me = res.data.about_me
                    this.record.avatar = res.data.avatar
                    this.record.mySocials = res.data.socials
                })
        },
		update() {
			axios.post('/my-profile', this.record)
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
					setTimeout(() => this.clearForm(), 2000);
				}
			})
			.catch((err) => {})
		},
		updateAvatar() {
            var $mainForm = $('#mainForm');
            var data = new FormData(mainForm);
			axios.post('/my-profile/avatar', data)
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
					setTimeout(() => this.clearForm(), 2000);
					setTimeout(() => window.location.reload(), 500);
				}
			})
			.catch((err) => {})
		},
		delSocial(index){
			this.$delete(this.record.mySocials, index);
		},
		clearForm() {
			this.response = {
				type: "success",
				message: "",
				isVisible: false
			}
			this.errors = []
		},
		getSocialSetups() {
			axios.get('/socials-setup')
			.then((res) => {
				this.socialsetups = res.data
			})
		},
	},
};
</script>