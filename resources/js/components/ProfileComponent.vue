<template>
	<div>
		<div class="card">
			<div class="card-body">
				<form id="mainForm">

                    <div class="row">

                        <div class="col-lg-3 col-md-3">
                            <img :src="'/uploads/profiles/'+record.avatar" alt='Image preview' class='img-thumbnail card-img-top'>
                            <button type="button" class="btn btn-primary btn-block m-top-20" data-toggle="modal" data-target="#profileImage">
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
                                                        <span class="btn btn-primary m-top-20 btn-file img-select-btn"><i class="fa fa-image"></i>
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
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" @click.prevent="updateAvatar()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /MODAL -->
                        </div>

                        <div class="col-lg-9 col-md-9">
        
                            <h3 class="text-bold-700 m-bottom-20">My Profile</h3>
                        
                            <div class="hr dark text-left m-bottom-20">
                                <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-bold-600 text-uppercase text-size-11">First Name</label>
                                        <input type="text" name="first_name" v-model="record.first_name" class="form-control text-size-12 form-control-lg" placeholder="First Name">
                                        <small>
			                                <span v-if="errors.first_name != null" class="text-danger">
			                                    {{errors.first_name[0]}}
			                                </span>
			                            </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-bold-600 text-uppercase text-size-11">Last Name</label>
                                        <input type="text" name="last_name" v-model="record.last_name" class="form-control text-size-12 form-control-lg" placeholder="Last Name">
                                        <small>
			                                <span v-if="errors.last_name != null" class="text-danger">
			                                    {{errors.last_name[0]}}
			                                </span>
			                            </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-bold-600 text-uppercase text-size-11">Phone #</label>
                                        <input type="text" name="phone" v-model="record.phone" class="form-control text-size-12 form-control-lg" placeholder="Phone Number">
                                        <small>
			                                <span v-if="errors.phone != null" class="text-danger">
			                                    {{errors.phone[0]}}
			                                </span>
			                            </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-bold-600 text-uppercase text-size-11">Mobile #</label>
                                        <input type="text" name="mobile" v-model="record.mobile" class="form-control text-size-12 form-control-lg" placeholder="Mobile Number">
                                        <small>
			                                <span v-if="errors.mobile != null" class="text-danger">
			                                    {{errors.mobile[0]}}
			                                </span>
			                            </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-bold-600 text-uppercase text-size-11">Email</label>
                                        <input type="email" name="email" v-model="record.email" class="form-control text-size-12 form-control-lg" placeholder="Email">
                                        <small>
			                                <span v-if="errors.email != null" class="text-danger">
			                                    {{errors.email[0]}}
			                                </span>
			                            </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-bold-600 text-uppercase text-size-11">About Me</label>
                                        <textarea rows="8" name="about_me" v-model="record.about_me" class="form-control text-size-12 form-control-lg" placeholder="About Me"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <h3 class="text-bold-700 m-top-20 m-bottom-20">My Social</h3>
                                
                                    <div class="hr dark text-left m-bottom-20">
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
                                            <button class="btn btn-sm btn-primary text-white" @click.prevent="addSocial()">
                                                <i class="zmdi zmdi-plus text-white"></i> add
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
                                            <button class="btn btn-danger text-white rounded-0" @click.prevent="delSocial(index)"><i class="la la-trash text-white"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary" @click.prevent="update()">Save Changes</button>

				            <div :class="'m-top-20 alert-rounded alert-dismissible alert alert-' + response.type"
				                v-if="response.isVisible">
				                {{response.message}}
				            </div>

                        </div>

                    </div>

                </form>
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
            axios.get('/profile/get')
                .then((res) => {
                    this.record.first_name = res.data.first_name
                    this.record.last_name = res.data.last_name
                    this.record.phone = res.data.phone
                    this.record.mobile = res.data.mobile
                    this.record.email = res.data.user.email
                    this.record.about_me = res.data.about_me
                    this.record.avatar = res.data.avatar
                    this.record.mySocials = res.data.socials
                })
        },
		update() {
            // var $mainForm = $('#mainForm');
            // var form = $('#PROGRAMadd-form')[0];
            // var data = new FormData(mainForm);
			axios.post('/profile', this.record)
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
					setTimeout(() => window.location.reload(), 2000);
				}
			})
			.catch((err) => {

			})
		},
        updateAvatar() {
            var $mainForm = $('#mainForm');
            var data = new FormData(mainForm);
            axios.post('/profile/avatar', data)
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
            axios.get('/socials-setup/data')
            .then((res) => {
                this.socialsetups = res.data
            })
        },
	},
};
</script>