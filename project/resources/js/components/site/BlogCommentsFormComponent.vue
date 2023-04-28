<template>
	<div>
        <section class="bg-white pt-s5 pb-s5">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-s3">
                        <h3 class="text-bold-600 text-dark text-capitalize">{{count.length}} Comments</h3>
                    </div>
                    <div class="row mb-s3">
                        <div class="col-md-12">
                            <div v-for="(item, index) in items" :key="index">
                                <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                    <a class="mr-s2 pt-s3 pl-s3" href="#">
                                        <img class="w--60 bs-solid bc-white bw-s4" v-if="item.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+item.created_by.profile.avatar" :alt="item.created_by.profile.first_name">
                                    </a>
                                    <div class="media-body">
                                        <div class="pt-s3 pb-s3 pr-s3">
                                            <div class="mb-s1">
                                                <h6 class="mb-0" v-if="item.created_by.profile.first_name != null">{{item.created_by.profile.first_name}}</h6>
                                                <span class="text-v7-dark text-size-13">{{fundate(item.created_date)}}</span>
                                            </div>
                                            <p class="mb-s1 text-dark" v-html="item.comment"></p>
                                        </div>
                                    </div>
                                    <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(item.id)"><i class="far fa-edit"></i> Reply</button>
                                </div>
                                <!-- REPLY -->
                                <div v-for="(reply, index) in item.replies" :key="index" class="ml-s4">
                                    <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                        <a class="mr-s2 pt-s3 pl-s3" href="#">
                                            <img class="w--60 bs-solid bc-white bw-s4" v-if="reply.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+reply.created_by.profile.avatar" :alt="reply.created_by.profile.first_name">
                                        </a>
                                        <div class="media-body">
                                            <div class="pt-s3 pb-s3 pr-s3">
                                                <div class="mb-s1">
                                                    <h6 class="mb-0" v-if="reply.created_by.profile.first_name != null">{{reply.created_by.profile.first_name}}</h6>
                                                    <span class="text-v7-dark text-size-13">{{fundate(reply.created_date)}}</span>
                                                </div>
                                                <p class="mb-s1 text-dark" v-html="reply.comment"></p>
                                            </div>
                                        </div>
                                        <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(reply.id)"><i class="far fa-edit"></i> Reply</button>
                                    </div>
                                    <!-- REPLY -->
                                    <div v-for="(reply, index) in reply.replies" :key="index" class="ml-s4">
                                        <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                            <a class="mr-s2 pt-s3 pl-s3" href="#">
                                                <img class="w--60 bs-solid bc-white bw-s4" v-if="reply.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+reply.created_by.profile.avatar" :alt="reply.created_by.profile.first_name">
                                            </a>
                                            <div class="media-body">
                                                <div class="pt-s3 pb-s3 pr-s3">
                                                    <div class="mb-s1">
                                                        <h6 class="mb-0" v-if="reply.created_by.profile.first_name != null">{{reply.created_by.profile.first_name}}</h6>
                                                        <span class="text-v7-dark text-size-13">{{fundate(reply.created_date)}}</span>
                                                    </div>
                                                    <p class="mb-s1 text-dark" v-html="reply.comment"></p>
                                                </div>
                                            </div>
                                            <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(reply.id)"><i class="far fa-edit"></i> Reply</button>
                                        </div>
                                        <!-- REPLY -->
                                        <div v-for="(reply, index) in reply.replies" :key="index" class="ml-s4">
                                            <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                                <a class="mr-s2 pt-s3 pl-s3" href="#">
                                                    <img class="w--60 bs-solid bc-white bw-s4" v-if="reply.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+reply.created_by.profile.avatar" :alt="reply.created_by.profile.first_name">
                                                </a>
                                                <div class="media-body">
                                                    <div class="pt-s3 pb-s3 pr-s3">
                                                        <div class="mb-s1">
                                                            <h6 class="mb-0" v-if="reply.created_by.profile.first_name != null">{{reply.created_by.profile.first_name}}</h6>
                                                            <span class="text-v7-dark text-size-13">{{fundate(reply.created_date)}}</span>
                                                        </div>
                                                        <p class="mb-s1 text-dark" v-html="reply.comment"></p>
                                                    </div>
                                                </div>
                                                <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(reply.id)"><i class="far fa-edit"></i> Reply</button>
                                            </div>
                                            <!-- REPLY -->
                                            <div v-for="(reply, index) in reply.replies" :key="index" class="ml-s4">
                                                <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                                    <a class="mr-s2 pt-s3 pl-s3" href="#">
                                                        <img class="w--60 bs-solid bc-white bw-s4" v-if="reply.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+reply.created_by.profile.avatar" :alt="reply.created_by.profile.first_name">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="pt-s3 pb-s3 pr-s3">
                                                            <div class="mb-s1">
                                                                <h6 class="mb-0" v-if="reply.created_by.profile.first_name != null">{{reply.created_by.profile.first_name}}</h6>
                                                                <span class="text-v7-dark text-size-13">{{fundate(reply.created_date)}}</span>
                                                            </div>
                                                            <p class="mb-s1 text-dark" v-html="reply.comment"></p>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(reply.id)"><i class="far fa-edit"></i> Reply</button>
                                                </div>
                                                <!-- REPLY -->
                                                <div v-for="(reply, index) in reply.replies" :key="index" class="ml-s4">
                                                    <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                                        <a class="mr-s2 pt-s3 pl-s3" href="#">
                                                            <img class="w--60 bs-solid bc-white bw-s4" v-if="reply.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+reply.created_by.profile.avatar" :alt="reply.created_by.profile.first_name">
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="pt-s3 pb-s3 pr-s3">
                                                                <div class="mb-s1">
                                                                    <h6 class="mb-0" v-if="reply.created_by.profile.first_name != null">{{reply.created_by.profile.first_name}}</h6>
                                                                    <span class="text-v7-dark text-size-13">{{fundate(reply.created_date)}}</span>
                                                                </div>
                                                                <p class="mb-s1 text-dark" v-html="reply.comment"></p>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(reply.id)"><i class="far fa-edit"></i> Reply</button>
                                                    </div>
                                                    <!-- REPLY -->
                                                    <div v-for="(reply, index) in reply.replies" :key="index" class="ml-s4">
                                                        <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                                            <a class="mr-s2 pt-s3 pl-s3" href="#">
                                                                <img class="w--60 bs-solid bc-white bw-s4" v-if="reply.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+reply.created_by.profile.avatar" :alt="reply.created_by.profile.first_name">
                                                            </a>
                                                            <div class="media-body">
                                                                <div class="pt-s3 pb-s3 pr-s3">
                                                                    <div class="mb-s1">
                                                                        <h6 class="mb-0" v-if="reply.created_by.profile.first_name != null">{{reply.created_by.profile.first_name}}</h6>
                                                                        <span class="text-v7-dark text-size-13">{{fundate(reply.created_date)}}</span>
                                                                    </div>
                                                                    <p class="mb-s1 text-dark" v-html="reply.comment"></p>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(reply.id)"><i class="far fa-edit"></i> Reply</button>
                                                        </div>
                                                        <!-- REPLY -->
                                                        <div v-for="(reply, index) in reply.replies" :key="index" class="ml-s4">
                                                            <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                                                <a class="mr-s2 pt-s3 pl-s3" href="#">
                                                                    <img class="w--60 bs-solid bc-white bw-s4" v-if="reply.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+reply.created_by.profile.avatar" :alt="reply.created_by.profile.first_name">
                                                                </a>
                                                                <div class="media-body">
                                                                    <div class="pt-s3 pb-s3 pr-s3">
                                                                        <div class="mb-s1">
                                                                            <h6 class="mb-0" v-if="reply.created_by.profile.first_name != null">{{reply.created_by.profile.first_name}}</h6>
                                                                            <span class="text-v7-dark text-size-13">{{fundate(reply.created_date)}}</span>
                                                                        </div>
                                                                        <p class="mb-s1 text-dark" v-html="reply.comment"></p>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(reply.id)"><i class="far fa-edit"></i> Reply</button>
                                                            </div>
                                                            <!-- REPLY -->
                                                            <div v-for="(reply, index) in reply.replies" :key="index" class="ml-s4">
                                                                <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                                                    <a class="mr-s2 pt-s3 pl-s3" href="#">
                                                                        <img class="w--60 bs-solid bc-white bw-s4" v-if="reply.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+reply.created_by.profile.avatar" :alt="reply.created_by.profile.first_name">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <div class="pt-s3 pb-s3 pr-s3">
                                                                            <div class="mb-s1">
                                                                                <h6 class="mb-0" v-if="reply.created_by.profile.first_name != null">{{reply.created_by.profile.first_name}}</h6>
                                                                                <span class="text-v7-dark text-size-13">{{fundate(reply.created_date)}}</span>
                                                                            </div>
                                                                            <p class="mb-s1 text-dark" v-html="reply.comment"></p>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(reply.id)"><i class="far fa-edit"></i> Reply</button>
                                                                </div>
                                                                <!-- REPLY -->
                                                                <div v-for="(reply, index) in reply.replies" :key="index" class="ml-s4">
                                                                    <div class="media bs-solid bc-light bw-s3 bg-white animate-parent--hover pt-s2--xs mb-s2">
                                                                        <a class="mr-s2 pt-s3 pl-s3" href="#">
                                                                            <img class="w--60 bs-solid bc-white bw-s4" v-if="reply.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+reply.created_by.profile.avatar" :alt="reply.created_by.profile.first_name">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <div class="pt-s3 pb-s3 pr-s3">
                                                                                <div class="mb-s1">
                                                                                    <h6 class="mb-0" v-if="reply.created_by.profile.first_name != null">{{reply.created_by.profile.first_name}}</h6>
                                                                                    <span class="text-v7-dark text-size-13">{{fundate(reply.created_date)}}</span>
                                                                                </div>
                                                                                <p class="mb-s1 text-dark" v-html="reply.comment"></p>
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-md btn-pink bg-dark--hover text-white text-uppercase text-size-s1 text-bold-600 rounded-0 position-absolute position-top-0 position-right-0 animate-fadeIn-child--hover" @click.prevent="commentOn(reply.id)"><i class="far fa-edit"></i> Reply</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /REPLY -->
                                                            </div>
                                                            <!-- /REPLY -->
                                                        </div>
                                                        <!-- /REPLY -->
                                                    </div>
                                                    <!-- /REPLY -->
                                                </div>
                                                <!-- /REPLY -->
                                            </div>
                                            <!-- /REPLY -->
                                        </div>
                                        <!-- /REPLY -->
                                    </div>
                                    <!-- /REPLY -->
                                </div>
                                <!-- /REPLY -->
                            </div>
                        </div>
                    </div> <!-- /ROW -->
                    <div class="mt-s5 mb-s3">
                        <h6 class="text-bold-700">Write a Comments</h6>
                        <p>Your email address will not be published.</p>
                    </div>
                    <!-- COMMENT FORM -->
                    <div v-if="this.authcheck == 'true'">
                        <form>
                            <div class="form-group">
                                <vue-ckeditor type="classic" v-model="record.comment" :config="config" />
                                <small>
                                    <span v-if="errors.comment != null" class="text-danger">
                                        {{errors.comment[0]}}
                                    </span>
                                </small>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-s5 pt-12 pb-12 pl-s3 pr-s3 mt-s1 mb-s1" @click.prevent="save()">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type" v-if="response.isVisible">
                        {{response.message}}
                    </div>

                    <div v-if="this.authcheck != 'true'">
                        <a href="/login">Kindly Login for Reply!</a>
                    </div>
                    <!-- COMMENT FORM -->
                </div>
            </div> <!-- /ROW -->
        </section> <!-- /SECTION -->
	</div>
</template>
<script type="text/javascript">
    export default {
        props: ['category','post','authcheck'],
        data(){
            return {
                config: {
                    toolbar: [
                        ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'Cut', 'Copy', '-', 'Undo', 'Redo', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'Styles', 'Font', 'FontSize', 'TextColor', 'BGColor', 'Maximize', 'ShowBlocks']
                    ],
                    height: 200
                },
                record: {
                    id: 0,
                    comment: '',
                    blogpost_id: this.post.id,
                    blogcategorysetup_id: this.post.blogcategorysetup_id,
                    blogcomment_id: '',
                },
                response: {
                    type: "success",
                    message: "",
                    isVisible: false
                },
                items: [],
                count: [],
                errors: [],
            }
        },
        created(){
            this.getData()
            this.getCountData()
        },
        methods:{
            fundate(datefun){
                var datecol = datefun.split('-', 3);
                // alert(datecol);
                var today = new Date(datecol);
                
                var mon = new Array();
                mon[0]  = "Jan";
                mon[1]  = "Feb";
                mon[2]  = "Mar";
                mon[3]  = "Apr";
                mon[4]  = "May";
                mon[5]  = "Jun";
                mon[6]  = "Jul";
                mon[7]  = "Aug";
                mon[8]  = "Sep";
                mon[9]  = "Oct";
                mon[10] = "Nov";
                mon[11] = "Dec";
                
                var month = new Array();
                month[0] = "January";
                month[1] = "February";
                month[2] = "March";
                month[3] = "April";
                month[4] = "May";
                month[5] = "June";
                month[6] = "July";
                month[7] = "August";
                month[8] = "September";
                month[9] = "October";
                month[10] = "November";
                month[11] = "December";

                var dd = today.getDate();
                var mm = mon[today.getMonth()];
                var yyyy = today.getFullYear();
        
                if(dd<10) {
                    dd = '0'+dd
                }
                if(mm<10) {
                    mm = '0'+mm
                }
        
                today = dd + ', ' + mm + ' ' + yyyy;
                // alert(today)
                return today;
            },
            commentOn(id){
                this.record.blogcomment_id = id
            },
            save() {
                axios.post('/blog-post-comment/save', this.record)
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
                            // this.record.id = res.data.id
                            this.getData()
                            setTimeout(() => this.response = {isVisible:false}, 1000);
                        }
                    })
                    .catch((err) => {})
            },
            getData() {
                // this.items = this.post.comments
                axios.get('/blog-comments-active-get/all/'+this.post.id)
                    .then((res) => {
                        this.items = res.data
                    })
            },
            getCountData() {
                axios.get('/blog-comments-active-get/count/'+this.post.id)
                    .then((res) => {
                        this.count = res.data
                    })
            },
            clearForm() {
                this.record = {
                    id: 0,
                    comment: '',
                    blogpost_id: this.post.id,
                    blogcategorysetup_id: this.post.blogcategorysetup_id,
                }
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                this.errors = []
            },
        },
    }
</script>