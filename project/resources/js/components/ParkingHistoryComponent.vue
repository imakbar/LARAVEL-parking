<template>
	<div>
        <div class="row m-bottom-30 col-border-xl">
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card-body">
                    <div class="icon-rounded icon-rounded-primary float-left m-r-20">
                        <i class="zmdi zmdi-airplane"></i>
                    </div>
                    <h5 class="card-title m-b-5">{{orders.filter(u=>u.order_status == 'up-coming').length}}</h5>
                    <h6 class="text-muted m-t-10">
                        Up-Coming
                    </h6>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card-body">
                    <div class="icon-rounded icon-rounded-accent float-left m-r-20">
                        <i class="zmdi zmdi-airplane"></i>
                    </div>
                    <h5 class="card-title m-b-5">{{orders.filter(u=>u.order_status == 'taken').length}}</h5>
                    <h6 class="text-muted m-t-10">
                        Out-Going
                    </h6>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card-body">
                    <div class="icon-rounded icon-rounded-success float-left m-r-20">
                        <i class="zmdi zmdi-airplane"></i>
                    </div>
                    <h5 class="card-title m-b-5">{{orders.filter(u=>u.order_status == 'completed').length}}</h5>
                    <h6 class="text-muted m-t-10">
                        Completed
                    </h6>
                </div>
            </div>
        </div>
        <div class="m-bottom-25">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <div class="input-group mini-search">
                        <div class="input-group-prepend">
                            <button type="submit" id="submit" class="btn btn-info btn-rounded btn-floating" @click.prevent="clearForm(); clearFormData()">Clear</button>
                            <button type="submit" id="submit" class="btn btn-success btn-rounded btn-floating" @click.prevent="searchData()">Search</button>
                        </div>
                        <!-- <datepicker v-model="search.order_date" :format="customFormatter"></datepicker> -->
                        <select class="form-control" v-model="search.order_status">
                            <option value="up-coming">Up Coming</option>
                            <option value="taken">Out Going</option>
                            <option value="completed">Completed</option>
                        </select>
                        <input type="text" class="form-control" v-model="search.name">
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table-table table table-striped table-bordered thead-inverse dataex-res-configuration bg-white">
                    <thead>
                        <tr>
                            <th width="60">S.No</th>
                            <th width="70">Amount</th>
                            <th width="70">Reference#</th>
                            <th>Drop off <i class="icon-calendar"></i></th>
                            <th>Arrival <i class="icon-calendar"></i></th>
                            <th>Days</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th width="60" class="text-center">Status</th>
                            <th width="90" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        <tr v-for="(item, index) in items.data" :key="index">
                            <td>{{index + 1}}</td>
                            <td>${{item.amount}}</td>
                            <td>{{item.reference_no}}</td>
                            <td>
                            	{{ item.drop_off_date | moment("DD, MMM YYYY") }} <br>
                            	{{item.drop_off_hour}}:{{item.drop_off_minute}}
                            </td>
                            <td>
                            	{{ item.arrival_date | moment("DD, MMM YYYY") }} <br>
                            	{{item.arrival_hour}}:{{item.arrival_minute}}
                            </td>
                            <td>{{item.days}}</td>
                            <td>{{item.email}}</td>
                            <td>{{item.first_name}} {{item.last_name}}</td>
                            <td>{{item.mobile_number}}</td>
                            <td class="text-center">

                                <!-- MODAL -->
                                <!-- <order-view-model :order="item"></order-view-model> -->
                                <!-- <order-taken-remarks-model :order="item"></order-taken-remarks-model> -->
                                <!-- <order-completed-remarks-model :order="item"></order-completed-remarks-model> -->
                                <!-- /MODAL -->

                            	<span v-if="item.order_status == 'up-coming'">
                                	<span class="badge badge-pill badge-primary border-0" data-toggle="modal" data-target="#taken-remarks" @click.prevent="orderTakenModal(item.id)">
                                		Up-Coming
                                	</span>
                                	<!-- <span class="badge badge-pill badge-warning">
                                        {{dFormat(item.drop_off_date)}} <br>
                                		{{isUpDate(item.drop_off_date,item.drop_off_hour,item.drop_off_minute)}}
                                	</span> -->
                                    <!-- <div class="sm-countdown mt-10 d-block">
<Countdown :end="item.drop_off_date" v-if="dateSplit(item.drop_off_date) >= currentDate"></Countdown>
                                    </div> -->
                            	</span>

                            	<span v-if="item.order_status == 'taken'">
                                    <span class="badge badge-pill badge-primary border-0" data-toggle="modal" data-target="#completed-remarks" @click.prevent="orderCompletedModal(item.id)">
                                        Out-Going
                                    </span>
                                    <!-- <span class="badge badge-pill badge-warning">
                                        {{isUpDate(item.arrival_date,item.arrival_hour,item.arrival_minute)}}
                                    </span> -->
                                    <!-- <div class="sm-countdown mt-10 d-block">
<Countdown :end="item.arrival_date" v-if="dateSplit(item.arrival_date) >= currentDate"></Countdown>
                                    </div> -->
                            	</span>

                            	<span class="badge badge-pill badge-success" v-if="item.order_status == 'completed'">
                            		Completed
                            	</span>

                            </td>
                            <td width="90" class="text-center">
                                <button class="btn-pointer btn-info btn-floating" data-toggle="modal" data-target="#order-view" @click.prevent="orderView(item.id)">
                                    <i class="icon-eye text-size-10 text-white"></i>
                                </button>
                                <!-- <button v-if="permissions.includes('parking-delete')" type="button" @click="recordDelete(item.id)" class="btn-pointer btn-danger btn-floating">
                                    <i class="icon-trash text-size-10 text-white"></i>
                                </button> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <pagination v-if="search.name == null" :data="items" @pagination-change-page="getData"></pagination>
                <pagination v-if="search.name != null" :data="items" @pagination-change-page="searchData"></pagination>

                <!-- RECORD VIEW MODAL -->
                <div class="modal fade modal-xl" id="order-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal_xl" role="document">
                        <div class="modal-content">
                            <button type="button" class="close btn-primary text-white site_model_close_btn bg-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body" v-if="record.id != 0 && record.order_view != 0">
                                <div class="row tab-padding-0">
                                    <div class="col-md-12">
                                        <b-tabs pills card>
                                            <b-tab class="nav-link" title="Booking Details">
                                                <table width="100%" cellspacing="0" cellpadding="10">
                                                  <tr style="background: #ef0880;">
                                                    <th style="text-align: center; color:#fff;" colspan="2">Booking Details</th>
                                                  </tr>
                                                  <tr style="background: #fafafa;">
                                                    <th width="160" style="text-align: left;">Location:</th>
                                                    <td>{{order.airport.name}}</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="text-align: left;">Drop-Off Date Time:</th>
                                                    <td>
                                                        {{order.drop_off_date}}
                                                        at 
                                                        {{order.drop_off_hour}}:{{order.drop_off_minute}}
                                                    </td>
                                                  </tr>
                                                  <tr style="background: #fafafa;">
                                                    <th style="text-align: left;">Pick-Up Date Time:</th>
                                                    <td>
                                                        {{order.arrival_date}} 
                                                        at 
                                                        {{order.arrival_hour}}:{{order.arrival_minute}}
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <th style="text-align: left;">Days:</th>
                                                    <td>{{order.days}}</td>
                                                  </tr>
                                                  <tr style="background: #fafafa;">
                                                    <th style="text-align: left;">Booking Quote:</th>
                                                    <td style="font-size: 18px;">${{order.amount}}</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="text-align: left;">Promo Code:</th>
                                                    <td>None</td>
                                                  </tr>
                                                </table>
                                            </b-tab>
                                            <b-tab class="nav-link" title="User Information">
                                                <table width="100%" cellspacing="0" cellpadding="10">
                                                  <tr style="background: #ef0880;">
                                                    <th style="text-align: center; color:#fff;" colspan="2">User Information</th>
                                                  </tr>
                                                  <tr style="background: #fafafa;">
                                                    <th width="160" style="text-align: left;">Email:</th>
                                                    <td>{{order.email}}</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="text-align: left;">Title:</th>
                                                    <td>{{order.title.title}}</td>
                                                  </tr>
                                                  <tr style="background: #fafafa;">
                                                    <th style="text-align: left;">First Name:</th>
                                                    <td>{{order.first_name}}</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="text-align: left;">Last Name:</th>
                                                    <td>{{order.last_name}}</td>
                                                  </tr>
                                                  <tr style="background: #fafafa;">
                                                    <th style="text-align: left;">Mobile Number:</th>
                                                    <td>{{order.mobile_number}}</td>
                                                  </tr>
                                                  <tr>
                                                    <th style="text-align: left;">Post Code:</th>
                                                    <td>{{order.post_code}}</td>
                                                  </tr>
                                                </table>
                                            </b-tab>
                                            <b-tab class="nav-link" title="Travel Details">
                                                <table width="100%" cellspacing="0" cellpadding="10">
                                                  <tr style="background: #ef0880;">
                                                    <th style="text-align: center; color:#fff;" colspan="2">Travel Details</th>
                                                  </tr>
                                                  <tr>
                                                    <th width="160" style="text-align: left;">Know travel detail?</th>
                                                    <td>{{order.know_travel_detail == 0? 'No':'Yes'}}</td>
                                                  </tr>
                                                  <tr v-if="order.know_travel_detail == 1" style="background: #fafafa;">
                                                    <th style="text-align: left;">Depart Terminal:</th>
                                                    <td>{{order.depart_terminal.title}}</td>
                                                  </tr>
                                                  <tr v-if="order.know_travel_detail == 1">
                                                    <th style="text-align: left;">Outbound Flight:</th>
                                                    <td>{{order.outbound_flight}}</td>
                                                  </tr>
                                                  <tr v-if="order.know_travel_detail == 1" style="background: #fafafa;">
                                                    <th style="text-align: left;">Arrival Terminal:</th>
                                                    <td>{{order.arrival_terminal.title}}</td>
                                                  </tr>
                                                  <tr v-if="order.know_travel_detail == 1">
                                                    <th style="text-align: left;">Inbound Flight:</th>
                                                    <td>{{order.inbound_flight}}</td>
                                                  </tr>
                                                </table>
                                            </b-tab>
                                            <b-tab class="nav-link" title="Vehicle Details">
                                                <table width="100%" cellspacing="0" cellpadding="10">
                                                  <tr style="background: #ef0880;">
                                                    <th style="text-align: center; color:#fff;" colspan="2">Vehicle Details</th>
                                                  </tr>
                                                  <tr>
                                                    <th width="160" style="text-align: left;">Know Vehicle Details?</th>
                                                    <td>{{order.know_vehical_detail == 0? 'No':'Yes'}}</td>
                                                  </tr>
                                                  <tr v-if="order.know_vehical_detail == 1" style="background: #fafafa;">
                                                    <th style="text-align: left;">Make:</th>
                                                    <td>{{order.make}}</td>
                                                  </tr>
                                                  <tr v-if="order.know_vehical_detail == 1">
                                                    <th style="text-align: left;">Model:</th>
                                                    <td>{{order.model}}</td>
                                                  </tr>
                                                  <tr v-if="order.know_vehical_detail == 1" style="background: #fafafa;">
                                                    <th style="text-align: left;">Colour:</th>
                                                    <td>{{order.colour}}</td>
                                                  </tr>
                                                  <tr v-if="order.know_vehical_detail == 1">
                                                    <th style="text-align: left;">Registration:</th>
                                                    <td>{{order.registration}}</td>
                                                  </tr>
                                                </table>
                                            </b-tab>
                                            <b-tab class="nav-link" title="Remarks">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table width="100%" cellspacing="0" cellpadding="10" v-if="order.taken_remarks != null">
                                                          <tr style="background: #ef0880;">
                                                            <th style="text-align: center; color:#fff;" colspan="2">Up-Coming Remarks</th>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="2">{{order.taken_remarks}}</td>
                                                          </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table width="100%" cellspacing="0" cellpadding="10" v-if="order.completed_remarks != null">
                                                          <tr style="background: #ef0880;">
                                                            <th style="text-align: center; color:#fff;" colspan="2">Out-Going Remarks</th>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="2">{{order.completed_remarks}}</td>
                                                          </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </b-tab>
                                            <b-tab class="nav-link" title="Review">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table width="100%" cellspacing="0" cellpadding="10" v-if="order.order_status == 'completed'">
                                                          <tr style="background: #ef0880;">
                                                            <th style="text-align: center; color:#fff;" colspan="2">Review</th>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2">
                                                                  <div v-if="order.review.rating == 1">
                                                                        <div class="star-rating star-rating-s3 text-pink mb-8 mt-15 ml-0" v-b-tooltip.hover title="1 Start">
                                                                            <span class="w-20"></span>
                                                                        </div>
                                                                        <span>Rating {{order.review.rating}} / 5</span>
                                                                    </div>
                                                                    <div v-if="order.review.rating == 2">
                                                                        <div class="star-rating star-rating-s3 text-pink mb-8 mt-15 ml-0" v-b-tooltip.hover title="2 Start">
                                                                            <span class="w-40"></span>
                                                                        </div>
                                                                        <span>Rating {{order.review.rating}} / 5</span>
                                                                    </div>
                                                                    <div v-if="order.review.rating == 3">
                                                                        <div class="star-rating star-rating-s3 text-pink mb-8 mt-15 ml-0" v-b-tooltip.hover title="3 Start">
                                                                            <span class="w-60"></span>
                                                                        </div>
                                                                        <span>Rating {{order.review.rating}} / 5</span>
                                                                    </div>
                                                                    <div v-if="order.review.rating == 4">
                                                                        <div class="star-rating star-rating-s3 text-pink mb-8 mt-15 ml-0" v-b-tooltip.hover title="4 Start">
                                                                            <span class="w-80"></span>
                                                                        </div>
                                                                        <span>Rating {{order.review.rating}} / 5</span>
                                                                    </div>
                                                                    <div v-if="order.review.rating == 5">
                                                                        <div class="star-rating star-rating-s3 text-pink mb-8 mt-15 ml-0" v-b-tooltip.hover title="5 Start">
                                                                            <span class="w-100"></span>
                                                                        </div>
                                                                        <span>Rating {{order.review.rating}} / 5</span>
                                                                    </div>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="2">{{order.review.comment}}</td>
                                                          </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </b-tab>
                                        </b-tabs>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /RECORD VIEW MODAL -->

                <!-- ORDER TAKEN REMARKS MODAL -->
                <div class="modal fade" id="taken-remarks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close btn-primary text-white site_model_close_btn bg-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Up-Coming Remarks</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea v-model="record.taken_remarks" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark"></textarea>
                                        </div>
                                        <small v-if="errors.taken_remarks != null" class="text-danger text-size-11">
                                            <span>
                                                {{errors.taken_remarks[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>

                                <div class="mt-20">
                                    <button class="btn btn-primary" @click.prevent="takenRemarks()">Save</button>
                                </div>

                                <div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type"
                                        v-if="response.isVisible">
                                    {{response.message}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /ORDER TAKEN REMARKS MODAL -->

                <!-- ORDER COMPLETED REMARKS MODAL -->
                <div class="modal fade" id="completed-remarks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close btn-primary text-white site_model_close_btn bg-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Out-Going Remarks</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea v-model="record.completed_remarks" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark"></textarea>
                                        </div>
                                        <small v-if="errors.completed_remarks != null" class="text-danger text-size-11">
                                            <span>
                                                {{errors.completed_remarks[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>

                                <div class="mt-20">
                                    <button class="btn btn-primary" @click.prevent="completedRemarks()">Save</button>
                                </div>

                                <div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type"
                                        v-if="response.isVisible">
                                    {{response.message}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /ORDER COMPLETED REMARKS MODAL -->

            </div>
        </div>
	</div>
</template>
<script>
    var moment = require('moment');
    export default {
        props: ['parking'],
        data() {
            return {
                record: {
                    // id: 0,
                    order_view: 0,
                    id: 0,
                    taken_remarks: '',
                    completed_remarks: '',
                },
                response: {
                    type: "success",
                    message: "",
                    isVisible: false
                },
                search: {
                    name: '',
                    // order_date: moment(new Date()).format('DD MMM YYYY'),
                    order_status: 'up-coming',
                },
                errors: [],
                permissions: [],
                items: [],
                orders: [],
                order: {},
            }
        },
        created() {
            this.getPermissions()
            this.getData()
            this.getParkingOrders()
        },

        methods: {
            customFormatter(date) {
              return moment(date).format('DD MMM YYYY');
            },
            orderView(id){
                this.record.id = id,
                this.record.order_view = 1,
                axios.get('/order/'+id)
                    .then((res) => {
                        this.order = res.data
                    })
            },
            orderTakenModal(id){
                this.record.id = id
            },
            orderCompletedModal(id){
                this.record.id = id
            },
            takenRemarks(){
                axios.post('/order-taken-remarks', this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                                this.errors = res.data.errors,
                                this.response = {
                                    isVisible: false,
                                }
                        } else {
                            // this.clearForm()
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success'
                            },
                            this.errors = []
                            this.getData()
                            // this.$modal.hide(this.$parent.name)
                            // setTimeout(() => this.clearForm(), 1000);
                            // setTimeout(() => window.location.reload(), 1);
                        }   
                    })
            },
            completedRemarks(){
                axios.post('/order-completed-remarks', this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                                this.errors = res.data.errors,
                                this.response = {
                                    isVisible: false,
                                }
                        } else {
                            // this.clearForm()
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success'
                            },
                            this.errors = []
                            this.getData()
                            // this.$modal.hide(this.$parent.name)
                            // setTimeout(() => this.clearForm(), 1000);
                            // setTimeout(() => window.location.reload(), 1);
                        }   
                    })
            },
            dateSplit(date){
                var date = moment(new Date(date), 'YYYY MM DD').format('YYYY MM DD');
                return date;
            },
            // isUpComingDate(date, hours, minutes){
            //     var now = moment(new Date());
            //     var full_date = moment(date+hours+minutes, 'YYYY MM DD h:mm:ss');
            //     // alert(full_date);
            //     var end_date = moment(new Date(full_date));
            //     var days = end_date.diff(now, 'days');
            //     if(days == 0){
            //         return 'Today';
            //     }
            //     else if(days == 0)
            //     {
            //         return moment(new Date(days)) + ' Days';
            //     }
            //     else
            //     {
            //         return moment(new Date(days)) + ' Days';
            //     }
            // },
            
            // dFormat(date, hours, minutes){
            //     // return moment(drop_off_date).format('MMMM DD, YYYY')
            //     var full_date = moment(date+hours+minutes, 'YYYY MM DD h:mm:ss');
            //     return moment(new Date(full_date)).format('YYYY MM DD h:mm:ss');
            // },

            dFormat(date, hours, minutes){
                // return moment(drop_off_date).format('MMMM DD, YYYY')
                var full_date = moment(date+hours+minutes, 'YYYY MM DD h:mm:ss');
                return moment(new Date(full_date)).format('YYYY MM DD h:mm:ss');
            },
            /*
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
            */
            getPermissions() {
                axios.get('/user/permissions')
                    .then((res) => {
                        this.permissions = res.data
                    })
            },
            getData(page = 1) {
                axios.get('/parking-history/'+this.parking.id+'/?page='+page)
                    .then((res) => {
                        this.items = res.data
                    })
            },
            getParkingOrders() {
                axios.get('/parking-orders/'+this.parking.id)
                    .then((res) => {
                        this.orders = res.data
                    })
            },
            searchData(page = 1) {
                axios.post('/parking-history/search/'+this.parking.id+'/?page='+page, this.search)
                    .then((res) => {
                        this.items = res.data
                    })
            },
            clearForm() {
                this.record = {
                    id: 0,
                }
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                this.errors = []
                this.search = {
                    name: '',
                    // order_date: moment(new Date()).format('DD MMM YYYY'),
                    order_status: 'up-coming',
                }
            },
            clearFormData() {
                this.items.data = this.getData()
            },
        },
        computed: {
            currentDate: function(){
                var currentDate = moment(new Date(), 'DD/MM/YYYY').format('YYYY MM DD');
                return currentDate;
            },
        }
    }

</script>