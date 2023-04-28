<template>
	<div>

        <!-- <div class="card card-tabs">
            <div class="card-header p-0 no-border">
                <ul class="nav nav-tabs primary-tabs p-l-30 m-0">
                    <li class="nav-item" role="presentation"><a @click="tabChange(0)" href="#tab1" class="nav-link active show" data-toggle="tab" aria-expanded="true">About</a></li>
                    <li class="nav-item" role="presentation"><a @click="tabChange(1)" href="#tab2" class="nav-link" data-toggle="tab" aria-expanded="true">Photos</a></li>
                    <li class="nav-item" role="presentation"><a @click="tabChange(2)" href="#tab3" class="nav-link" data-toggle="tab" aria-expanded="true">Contacts</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fadeIn active" id="tab1">
                        <div class="profile-wrapper" v-if="this.tab0">
                            asdf
                        </div>
                        <div class="tab-pane fadeIn" id="tab2" v-if="this.tab1">
                            asdfsadf
                        </div>
                        <div class="tab-pane fadeIn" id="tab3" v-if="this.tab2">
                            asdfsadfasdf
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="c_tabs card">
            <b-tabs pills card>
                <b-tab class="nav-link" title="Global Setting" active>
                    <div class="">
                        <form id="mainForm" class="form-horizontal">

                            <!-- <h3 class="text-bold-700 m-bottom-20">Settings</h3>
                        
                            <div class="hr dark text-left m-bottom-20">
                                <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                            </div> -->

                            <div class="form-group row">
                                <label class="text-bold-600 text-uppercase text-size-11 control-label text-right col-md-3">Title</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" v-model="record.title" class="form-control text-size-12 form-control-lg" placeholder="Title">
                                </div>
                                <small>
                                    <span v-if="errors.title != null" class="text-danger">
                                        {{errors.title[0]}}
                                    </span>
                                </small>
                            </div>

                            <div class="form-group row">
                                <label class="text-bold-600 text-uppercase text-size-11 control-label text-right col-md-3">Slogan</label>
                                <div class="col-md-9">
                                    <input type="text" name="slogan" v-model="record.slogan" class="form-control text-size-12 form-control-lg" placeholder="Slogan">
                                </div>
                                <small>
                                    <span v-if="errors.slogan != null" class="text-danger">
                                        {{errors.slogan[0]}}
                                    </span>
                                </small>
                            </div>

                            <div class="form-group row">
                                <label class="text-bold-600 text-uppercase text-size-11 control-label text-right col-md-3">Phone</label>
                                <div class="col-md-9">
                                    <input type="text" name="phone" v-model="record.phone" class="form-control text-size-12 form-control-lg" placeholder="Phone">
                                </div>
                                <small>
                                    <span v-if="errors.phone != null" class="text-danger">
                                        {{errors.phone[0]}}
                                    </span>
                                </small>
                            </div>

                            <div class="form-group row">
                                <label class="text-bold-600 text-uppercase text-size-11 control-label text-right col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="text" name="email" v-model="record.email" class="form-control text-size-12 form-control-lg" placeholder="Email">
                                </div>
                                <small>
                                    <span v-if="errors.email != null" class="text-danger">
                                        {{errors.email[0]}}
                                    </span>
                                </small>
                            </div>

                            <div class="form-group row">
                                <label class="text-bold-600 text-uppercase text-size-11 control-label text-right col-md-3">Office Timing</label>
                                <div class="col-md-9">
                                    <input type="text" name="office_timing" v-model="record.office_timing" class="form-control text-size-12 form-control-lg" placeholder="Office Timing">
                                </div>
                                <small>
                                    <span v-if="errors.office_timing != null" class="text-danger">
                                        {{errors.office_timing[0]}}
                                    </span>
                                </small>
                            </div>

                            <div class="form-group row">
                                <label class="text-bold-600 text-uppercase text-size-11 control-label text-right col-md-3">Address</label>
                                <div class="col-md-9">
                                    <input type="text" name="address" v-model="record.address" class="form-control text-size-12 form-control-lg" placeholder="Address">
                                </div>
                                <small>
                                    <span v-if="errors.address != null" class="text-danger">
                                        {{errors.address[0]}}
                                    </span>
                                </small>
                            </div>

                            <div class="form-group row">
                                <label class="text-bold-600 text-uppercase text-size-11 control-label text-right col-md-3">Copy Rights</label>
                                <div class="col-md-9">
                                    <input type="text" name="copy_rights" v-model="record.copy_rights" class="form-control text-size-12 form-control-lg" placeholder="Copy Rights">
                                </div>
                                <small>
                                    <span v-if="errors.copy_rights != null" class="text-danger">
                                        {{errors.copy_rights[0]}}
                                    </span>
                                </small>
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

                                <div class="col-md-6" v-for="(social, index) in record.ourSocials" :key="index">
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

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn btn-primary" @click.prevent="update()">Save Changes</button>
                                    <div :class="'m-top-20 alert-rounded alert-dismissible alert alert-' + response.type"
                                        v-if="response.isVisible">
                                        {{response.message}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <h3 class="text-bold-700 m-top-20 m-bottom-20">Logos</h3>
                                
                                    <div class="hr dark text-left m-bottom-20">
                                        <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <img :src="'/uploads/settings/md-'+record.logo_light" alt='Image preview' class='img-thumbnail card-img-top'>
                                    <button type="button" class="btn btn-primary btn-block m-top-20" data-toggle="modal" data-target="#LOGOLIGHT">
                                        <i class="fa fa-image"></i>
                                        Change Image
                                    </button>
                                    <!-- MODAL -->
                                    <div class="modal fade" id="LOGOLIGHT" tabindex="-1" role="dialog"  aria-hidden="true">
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
                                                                    <input type="file" name="logo_light" id="avatar">
                                                                </span>
                                                                <span class="btn btn-danger rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-top-12 p-bottom-12 p-left-20 p-right-20 m-top-20 img-remove-btn">Remove</span>
                                                            </div>
                                                            <img :src="'/uploads/settings/'+record.logo_light" alt='Image preview' class='img-thumbnail w-100'>
                                                        </div>
                                                    </div>
                                                    <div class="m-top-20 m-bottom-10">
                                                        <small>
                                                            <span v-if="errors.logo_light != null" class="text-danger">
                                                                {{errors.logo_light[0]}}
                                                            </span>
                                                        </small>
                                                    </div>
                                                    <!-- File End -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" @click.prevent="updateLogos()">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /MODAL -->
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <img :src="'/uploads/settings/md-'+record.logo_dark" alt='Image preview' class='img-thumbnail card-img-top'>
                                    <button type="button" class="btn btn-primary btn-block m-top-20" data-toggle="modal" data-target="#LOGODARK">
                                        <i class="fa fa-image"></i>
                                        Change Image
                                    </button>
                                    <!-- MODAL -->
                                    <div class="modal fade" id="LOGODARK" tabindex="-1" role="dialog"  aria-hidden="true">
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
                                                                    <input type="file" name="logo_dark" id="avatar">
                                                                </span>
                                                                <span class="btn btn-danger rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-top-12 p-bottom-12 p-left-20 p-right-20 m-top-20 img-remove-btn">Remove</span>
                                                            </div>
                                                            <img :src="'/uploads/settings/'+record.logo_dark" alt='Image preview' class='img-thumbnail w-100'>
                                                        </div>
                                                    </div>
                                                    <div class="m-top-20 m-bottom-10">
                                                        <small>
                                                            <span v-if="errors.logo_dark != null" class="text-danger">
                                                                {{errors.logo_dark[0]}}
                                                            </span>
                                                        </small>
                                                    </div>
                                                    <!-- File End -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" @click.prevent="updateLogos()">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /MODAL -->
                                </div>

                            </div>

                        </form>
                    </div>
                </b-tab>
                <b-tab class="nav-link" title="Blog Setting">
                    <div class="form-group row">
                        <label class="text-bold-600 text-uppercase text-size-11 control-label text-right col-md-3 m-top-6">Comments Approved By</label>
                        <div class="col-md-9">
                            <fieldset>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="blog_comments_approved_by" required="" value="admin" v-model="record.blog_comments_approved_by"
                                        checked="" class="custom-control-input" id="Active">
                                    <label class="custom-control-label" for="Active">Admin</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="blog_comments_approved_by" required="" value="direct" v-model="record.blog_comments_approved_by"
                                        class="custom-control-input" id="InActive">
                                    <label class="custom-control-label" for="InActive">Direct</label>
                                </div>
                            </fieldset>
                        </div>
                        <small>
                            <span v-if="errors.blog_comments_approved_by != null" class="text-danger">
                                {{errors.blog_comments_approved_by[0]}}
                            </span>
                        </small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" @click.prevent="update()">Save Changes</button>
                    <div :class="'m-top-20 alert-rounded alert-dismissible alert alert-' + response.type"
                        v-if="response.isVisible">
                        {{response.message}}
                    </div>

                </b-tab>
                <b-tab class="nav-link" title="Agency Setting">
                    Disabled tab!
                </b-tab>
            </b-tabs>
        </div>
	</div>
</template>
<script>
export default {
	data() {
        return {
            // tab0: false,
            // tab1: false,
            // tab2: false,
            record: {
                user_verification: '',
                title: '',
				slogan: '',
				phone: '',
				email: '',
				office_timing: '',
				address: '',
                copy_rights: '',
				blog_comments_approved_by: 'direct',
                socialsetup_id: {},
                ourSocials: [],
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
        this.getOurSocials()
	},
	methods: {
        // tabChange(id) {
        //     if (id == 0) {
        //         this.tab0 = true;
        //         this.tab1 = false;
        //         this.tab2 = false;
        //     } else if (id == 1) {
        //         this.tab0 = false;
        //         this.tab1 = true;
        //         this.tab2 = false;
        //     } else if (id == 2) {
        //         this.tab0 = false;
        //         this.tab1 = false;
        //         this.tab2 = true;
        //     }
        // },
        addSocial(){
            if(this.existSocial() == true){
                this.record.ourSocials.push({
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
            if(this.record.ourSocials.find(item => item.socialsetup_id === this.record.socialsetup_id.id)){
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
            axios.get('/settings/get')
                .then((res) => {
                    this.record.title           = res.data.title
                    this.record.slogan 			= res.data.slogan
                    this.record.phone 			= res.data.phone
                    this.record.email 			= res.data.email
                    this.record.office_timing 	= res.data.office_timing
                    this.record.address 		= res.data.address
                    this.record.copy_rights 	= res.data.copy_rights
                    this.record.logo_light 		= res.data.logo_light
                    this.record.logo_dark       = res.data.logo_dark
                    this.record.blog_comments_approved_by = res.data.blog_comments_approved_by
                })
        },
        getOurSocials() {
            axios.get('/settings-socials/get')
                .then((res) => {
                    this.record.ourSocials 		= res.data
                })
        },
		update() {
			axios.post('/settings', this.record)
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
        updateLogos() {
            var $mainForm = $('#mainForm');
            var data = new FormData(mainForm);
            axios.post('/settings/logos', data)
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
            this.$delete(this.record.ourSocials, index);
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