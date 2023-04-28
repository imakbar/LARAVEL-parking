<template>
    <div>
        <!-- BREADCRUMB -->
        <section class="bg-pink pt-s3 pb-s3 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-lg-flex text-center">
                            <div class="align-self-center mb-0--lg mb-s1--md mb-s1--sm mb-s1--xs">
                                <h3 class="text-bold-400 text-size-s2 m-0 text-white">My Bookings</h3>
                            </div>
                            <div class="ml-auto align-self-center">
                                <ol class="breadcrumb d-flex justify-content-center m-0 bg-none text-size-s1 p-0">
                                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">My Bookings</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div> <!-- ROW -->
            </div> <!-- /CONTAINER -->
        </section> <!-- /SECTION -->
        <!-- /BREADCRUMB -->

        <section class="bg-white pt-s5 pb-s5">
            <div class="container" v-if="this.authcheck == 'false'">
                <div v-if="record.searched != 1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="record.search" id="withreference" value="withreference">
                                <label class="form-check-label text-size-16 mb-10" for="withreference">
                                    Yes, I have Booking Reference.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="record.search" id="withoutreference" value="withoutreference">
                                <label class="form-check-label text-size-16 mb-10" for="withoutreference">
                                    No, I do not have Booking Reference.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="record.search" id="logindetail" value="logindetail">
                                <label class="form-check-label text-size-16 mb-10" for="logindetail">
                                    Yes, I do have Customer Login Detail.
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div v-if="record.search == 'withreference'">
                                <div class="mb-30">
                                    <h3 class="text-bold-700 text-dark">Search Booking By Reference No</h3> 
                                    <div class="mb-s3">
                                        <hr class="mb-0 bc-v1-dark">
                                        <hr class="w--60 bs-solid bc-pink bw-s5 bt-0 bl-0 br-0 mt-0 ml-0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="text-size-12 text-bold-500">Booking Reference<span class="text-danger">*</span></label>
                                        <input type="text" v-model="record.reference_no" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
                                        <small class="d-block">Enter Booking Reference e.g QV-0000-00</small>
                                        <small v-if="errors.reference_no != null" class="text-danger text-size-11">
                                            <span>
                                                {{errors.reference_no[0]}}
                                            </span>
                                        </small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-size-12 text-bold-500">Email Address<span class="text-danger">*</span></label>
                                        <input type="email" v-model="record.email" ref="email" name="email" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
                                        <small class="d-block">Enter Email Address used at the time of Booking</small>
                                        <small v-if="errors.email != null" class="text-danger text-size-11">
                                            <span>
                                                {{errors.email[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>

                                <button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover mt-10" @click.prevent="myBookings()">Search Booking(s)</button>

                                <div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type" v-if="response.isVisible">
                                    {{response.message}}
                                </div>

                                <div :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type" v-if="response.isVisibleError && response.res_type == 'error'">
                                    {{response.message}}
                                </div>
                            </div>
                            <div v-if="record.search == 'withoutreference'">
                                <div class="mb-30">
                                    <h3 class="text-bold-700 text-dark">Search Booking By Email Address</h3> 
                                    <div class="mb-s3">
                                        <hr class="mb-0 bc-v1-dark">
                                        <hr class="w--60 bs-solid bc-pink bw-s5 bt-0 bl-0 br-0 mt-0 ml-0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="text-size-12 text-bold-500">Email Address<span class="text-danger">*</span></label>
                                        <input type="email" v-model="record.email" ref="email" name="email" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
                                        <small class="d-block">Enter Email Address used at the time of Booking</small>
                                        <small v-if="errors.email != null" class="text-danger text-size-11">
                                            <span>
                                                {{errors.email[0]}}
                                            </span>
                                        </small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-size-12 text-bold-500">Mobile or Vehicle Reg Number<span class="text-danger">*</span></label>
                                        <input type="text" v-model="record.mobile_reg" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
                                        <small class="d-block">Enter Mobile Number e.g 0700 000 000</small>
                                        <small v-if="errors.mobile_reg != null" class="text-danger text-size-11">
                                            <span>
                                                {{errors.mobile_reg[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>

                                <button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover mt-10" @click.prevent="myBookings()">Search Booking(s)</button>

                                <div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type" v-if="response.isVisible">
                                    {{response.message}}
                                </div>

                                <div :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type" v-if="response.isVisibleError && response.res_type == 'error'">
                                    {{response.message}}
                                </div>
                            </div>
                            <div v-if="record.search == 'logindetail'">
                                <div class="mb-30">
                                    <h3 class="text-bold-700 text-dark">Customer Login</h3> 
                                    <div class="mb-s3">
                                        <hr class="mb-0 bc-v1-dark">
                                        <hr class="w--60 bs-solid bc-pink bw-s5 bt-0 bl-0 br-0 mt-0 ml-0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="text-size-12 text-bold-500">Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="Email" name="email" v-model="record.email">
                                        <small v-if="errors.email != null" class="text-danger text-size-11">
                                            <span>
                                                {{errors.email[0]}}
                                            </span>
                                        </small>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="text-size-12 text-bold-500">Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-lg rounded-0 bg-light-5 text-size-14" placeholder="Password" name="password" v-model="record.password">
                                        <small v-if="errors.password != null" class="text-danger text-size-11">
                                            <span>
                                                {{errors.password[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>

                                <button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover mt-10" @click.prevent="myBookings()">Login</button>

                                <div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type" v-if="response.isVisible">
                                    {{response.message}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="record.searched != 0">
                    <button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover mb-20" @click.prevent="clear()">Other Search</button>
                    <my-booking-history :orders="record.orders"></my-booking-history>
                </div>
            </div> <!-- /CONTAINER -->
            <div class="container" v-if="this.authcheck == 'true'">

                <my-booking-history :orders="myorders"></my-booking-history>

            </div> <!-- /CONTAINER -->
        </section> <!-- /SECTION -->

    </div>
</template>
<script type="text/javascript">
    var moment = require('moment');
    export default {
        props: ['authcheck','myorders'],
        data(){
            return {
                record: {
                    id: 0,

                    search: 'withreference',
                    email: '',
                    reference_no: '',

                    mobile_reg: '',

                    password: '',

                    searched: 0,
                },
                mybookings: [],
                errors: [],
                response: {
                    type: "success",
                    message: "",
                    res_type: "",
                    order_completed: false,
                    order_type: false,
                    isVisible: false,
                    isVisibleError: false,
                },
                orders: [],
            }
        },
        created(){
            // this.myBookings()
        },
        methods:{
            isUpDate(date, hours, minutes){
                var now = moment(new Date());
                var full_date = moment(date+hours+minutes, 'YYYY MM DD h:mm:ss');
                // alert(full_date);
                var end_date = moment(new Date(full_date));
                var xDuration = end_date.diff(now, 'days');
                var days = end_date.diff(now);
                var duDays = moment.duration(days);
                // alert(xDuration);
                if(xDuration == 0){
                    return 'Today' +' '+ duDays.asHours().toFixed(0) + ' Hours';
                }
                else if(xDuration == 1)
                {
                    return moment(new Date(duDays.asDays())) + ' Day';
                }
                else
                {
                    return moment(new Date(duDays.asDays())) + ' Days';
                }
            },
            myBookings() {
                if(this.record.search != 'logindetail'){
                    axios.post('/my-bookings', this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                            if(res.data.res_type == 'error'){
                                this.errors = []
                            }
                            else
                            {
                                this.errors = res.data.errors
                            }
                            this.record.searched = 0,
                            this.response = {
                                isVisible: false,
                                isVisibleError: true,
                                message: res.data.message,
                                res_type: res.data.res_type,
                            }
                        } else {
                            this.record.searched = 1,
                            this.record.orders = res.data,
                            this.response = {
                                isVisible: true,
                                isVisibleError: false,
                                message: res.data.message,
                                type: 'success',
                                res_type: '',
                            },
                            this.errors = []
                        }
                    })
                    .catch((err) => {})
                }
                else
                {
                    axios.post('/login', this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                            // alert(res.data.errors.message);
                            this.errors = res.data.errors,
                            this.response = {
                                isVisible: true,
                                message: res.data.errors.message[0],
                                type: 'danger',
                            }
                            // if(res.data.errors.message != null){
                            //  this.errors = []
                            // }
                        } else {
                            this.clear()
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success',
                            }
                            this.errors = []
                            setTimeout(() => window.location = '/'+res.data.url, 1000);
                        }
                    })
                }
            },
            clear() {
                this.record = {
                    id: 0,

                    search: 'withreference',
                    email: '',
                    reference_no: '',

                    searched: 0,
                }
                this.response = {
                    isVisible: false,
                    isVisibleError: false,
                    message: '',
                    type: 'success',
                    res_type: '',
                }
                this.errors = []
            },
        },
    }
</script>