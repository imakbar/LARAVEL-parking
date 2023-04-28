<template>
	<div>

        <div class="c-loading" v-if="loading">
            <pulse-loader loading="loading" color="#ef0880" size="25px"></pulse-loader>
        </div>
                    
		<div class="row mt-30" >
			<div class="col-lg-8 col-md-12">

				<div class="row" v-if="record.booking_edit == 0">
				<div class="col-md-12">
					<h4>Your Information</h4>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="text-size-12 text-bold-500">Email Address<span class="text-danger">*</span></label>
							<input type="email" v-model="record.email" ref="email" name="email" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
							<small v-if="errors.email != null" class="text-danger text-size-11">
								<span>
									{{errors.email[0]}}
								</span>
							</small>
						</div>
						<div class="form-group col-md-6">
							<label class="text-size-12 text-bold-500">Confirm Email Address<span class="text-danger">*</span></label>
							<input type="email" v-model="record.confirm_email" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
							<small v-if="errors.confirm_email != null" class="text-danger text-size-11">
								<span>
									{{errors.confirm_email[0]}}
								</span>
							</small>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="form-group col-lg-4 col-md-4">
									<label class="text-size-12 text-bold-500">Title<span class="text-danger">*</span></label>
									<select v-model="record.title_id" class="form-control text-size-12 bg-light rounded-0 pt-9 pb-8">
										<option value="">-- select --</option>
										<option v-for="(title, index) in titles" :key="index" :value="title">{{title.title}}</option>
									</select>
									<small v-if="errors.title_id != null" class="text-danger text-size-11">
										<span>
											{{errors.title_id[0]}}
										</span>
									</small>
								</div>
								<div class="form-group col-lg-8 col-md-8">
									<label class="text-size-12 text-bold-500">First Name<span class="text-danger">*</span></label>
									<input type="text" v-model="record.first_name" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
									<small v-if="errors.first_name != null" class="text-danger text-size-11">
										<span>
											{{errors.first_name[0]}}
										</span>
									</small>
								</div>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="text-size-12 text-bold-500">Last Name<span class="text-danger">*</span></label>
							<input type="text" v-model="record.last_name" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
							<small v-if="errors.last_name != null" class="text-danger text-size-11">
								<span>
									{{errors.last_name[0]}}
								</span>
							</small>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="text-size-12 text-bold-500">Mobile Number<span class="text-danger">*</span></label>
							<input type="text" v-model="record.mobile_number" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
							<small v-if="errors.mobile_number != null" class="text-danger text-size-11">
								<span>
									{{errors.mobile_number[0]}}
								</span>
							</small>
						</div>
						<div class="form-group col-md-6">
							<label class="text-size-12 text-bold-500">Post Code<span class="text-danger">*</span></label>
							<input type="text" v-model="record.post_code" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
							<small v-if="errors.post_code != null" class="text-danger text-size-11">
								<span>
									{{errors.post_code[0]}}
								</span>
							</small>
						</div>
					</div>
					<hr>
					<h4>Travel Details</h4>
					<p>Do you know travel details?</p>
					<div class="row">
						<div class="form-group col-md-6">
							<b-form-group>
								<b-form-radio-group v-model="record.know_travel_detail">
									<b-form-radio value="1">Yes</b-form-radio>
									<b-form-radio value="0">No</b-form-radio>
								</b-form-radio-group>
							</b-form-group>
						</div>
					</div>
					<div class="row" v-if="record.know_travel_detail == 1">
						<div class="form-group col-md-6">
							<div class="row">
								<div class="col-md-6">
									<label class="text-size-12 text-bold-500">Depart Terminal<span class="text-danger">*</span></label>
									<select v-model="record.departterminal_id" class="form-control text-size-12 bg-light rounded-0 pt-9 pb-8">
										<option v-for="(terminal, index) in parking.airport.terminals" :key="index" :value="terminal">{{terminal.title}}</option>
									</select>
									<small v-if="errors.departterminal_id != null" class="text-danger text-size-11">
										<span>
											{{errors.departterminal_id[0]}}
										</span>
									</small>
								</div>
								<div class="col-md-6">
									<label class="text-size-12 text-bold-500">Outbound Flight</label>
									<input type="text" v-model="record.outbound_flight" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
									<small v-if="errors.outbound_flight != null" class="text-danger text-size-11">
										<span>
											{{errors.outbound_flight[0]}}
										</span>
									</small>
								</div>
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="row">
								<div class="col-md-6">
									<label class="text-size-12 text-bold-500">Arrival Terminal<span class="text-danger">*</span></label>
									<select v-model="record.arrivalterminal_id" class="form-control text-size-12 bg-light rounded-0 pt-9 pb-8">
										<option v-for="(terminal, index) in parking.airport.terminals" :key="index" :value="terminal">{{terminal.title}}</option>
									</select>
									<small v-if="errors.arrivalterminal_id != null" class="text-danger text-size-11">
										<span>
											{{errors.arrivalterminal_id[0]}}
										</span>
									</small>
								</div>
								<div class="col-md-6">
									<label class="text-size-12 text-bold-500">Inbound Flight</label>
									<input type="text" v-model="record.inbound_flight" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
									<small v-if="errors.inbound_flight != null" class="text-danger text-size-11">
										<span>
											{{errors.inbound_flight[0]}}
										</span>
									</small>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<h4>Vehicle Details</h4>
					<p>Do you know vehicle details?</p>
					<div class="row">
						<div class="form-group col-md-6">
							<b-form-group>
								<b-form-radio-group v-model="record.know_vehical_detail">
									<b-form-radio value="1">Yes</b-form-radio>
									<b-form-radio value="0">No</b-form-radio>
								</b-form-radio-group>
							</b-form-group>
						</div>
					</div>
					<div class="row" v-if="record.know_vehical_detail == 1">
						<div class="form-group col-md-6">
							<label class="text-size-12 text-bold-500">Make<span class="text-danger">*</span></label>
							<input type="text" v-model="record.make" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
							<small v-if="errors.make != null" class="text-danger text-size-11">
								<span>
									{{errors.make[0]}}
								</span>
							</small>
						</div>
						<div class="form-group col-md-6">
							<label class="text-size-12 text-bold-500">Model<span class="text-danger">*</span></label>
							<input type="text" v-model="record.model" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
							<small v-if="errors.model != null" class="text-danger text-size-11">
								<span>
									{{errors.model[0]}}
								</span>
							</small>
						</div>
					</div>
					<div class="row" v-if="record.know_vehical_detail == 1">
						<div class="form-group col-md-6">
							<label class="text-size-12 text-bold-500">Colour<span class="text-danger">*</span></label>
							<input type="text" v-model="record.colour" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
							<small v-if="errors.colour != null" class="text-danger text-size-11">
								<span>
									{{errors.colour[0]}}
								</span>
							</small>
						</div>
						<div class="form-group col-md-6">
							<label class="text-size-12 text-bold-500">Registration<span class="text-danger">*</span></label>
							<input type="text" v-model="record.registration" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
							<small v-if="errors.registration != null" class="text-danger text-size-11">
								<span>
									{{errors.registration[0]}}
								</span>
							</small>
						</div>
					</div>
					<hr>
					<!-- <h4>
						Pay with (Paypal)
						<i class="zmdi zmdi-paypal-alt text-size-30"></i>
					</h4> -->
					<div class="row mt-10">
						<div class="col-md-12">
							<b-form-checkbox v-model="record.accept_terms_condition" value="1">On making payment you agree to {{setting.title}} Ltd. 
						    </b-form-checkbox>
							<small v-if="errors.accept_terms_condition != null" class="text-danger text-size-11 d-block pl-25">
								<span>
									{{errors.accept_terms_condition[0]}}
								</span>
							</small>
						</div>
					</div>
				</div>
				</div>

				<div class="row" v-if="record.booking_edit == 1">
					<div class="col-md-12">
						<button class="btn btn-sm btn-warning" @click.prevent="booking_edit()">Edit</button>
					</div>
					<div class="col-md-12">
						<h3 class="text-uppercase text-size-20 text-bold-600 mt-20 mb-12">Your Information</h3>
					</div>
					<div class="col-md-12">
						<div class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Email</div>
							<div>{{record.email}}</div>
						</div>
						<div class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Name</div>
							<div>{{record.title_id.title}} {{record.first_name}} {{record.last_name}}</div>
						</div>
						<div class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Mobile #</div>
							<div>{{record.mobile_number}}</div>
						</div>
						<div class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Post Code</div>
							<div>{{record.post_code}}</div>
						</div>
					</div>
					<div class="col-md-12">
						<h3 class="text-uppercase text-size-20 text-bold-600 mt-20 mb-12">Travel Details</h3>
					</div>
					<div class="col-md-12">
						<div class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Do you know travel details?</div>
							<div v-if="record.know_travel_detail == 1">Yes</div>
							<div v-if="record.know_travel_detail == 0">No</div>
						</div>
						<div v-if="record.know_travel_detail == 1" class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Depart Terminal</div>
							<div>{{record.departterminal_id.title}}</div>
						</div>
						<div v-if="record.know_travel_detail == 1" class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Outbound Flight</div>
							<div>{{record.mobile_number}}</div>
						</div>
						<div v-if="record.know_travel_detail == 1" class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Arrival Terminal</div>
							<div>{{record.arrivalterminal_id.title}}</div>
						</div>
						<div v-if="record.know_travel_detail == 1" class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Inbound Flight</div>
							<div>{{record.inbound_flight}}</div>
						</div>
					</div>
					<div class="col-md-12">
						<h3 class="text-uppercase text-size-20 text-bold-600 mt-20 mb-12">Vehicle Details</h3>
					</div>
					<div class="col-md-12">
						<div class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Do you know vehicle details?</div>
							<div v-if="record.know_vehical_detail == 1">Yes</div>
							<div v-if="record.know_vehical_detail == 0">No</div>
						</div>
						<div v-if="record.know_vehical_detail == 1" class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Make</div>
							<div>{{record.make}}</div>
						</div>
						<div v-if="record.know_vehical_detail == 1" class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Model</div>
							<div>{{record.model}}</div>
						</div>
						<div v-if="record.know_vehical_detail == 1" class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Colour</div>
							<div>{{record.colour}}</div>
						</div>
						<div v-if="record.know_vehical_detail == 1" class="d-flex justify-content-between bs-solid bc-light bw-s1 mt-0 bl-0 br-0 pt-10 pb-10">
							<div>Registration</div>
							<div>{{record.registration}}</div>
						</div>
					</div>
				</div>

				<paypal-checkout
					@payment-completed="onComplete"
					:amount="this.bookingQuote"
					currency="USD"
					:client="paypal"
					env="sandbox"
					v-if="response.order_type == true">
				</paypal-checkout>

				<button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover mt-30" @click.prevent="order()" v-if="response.order_type == false">Confirm Booking</button>

				<div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type"
                        v-if="response.isVisible && response.order_completed == true">
                    {{response.message}}
                </div>

			</div>
			<div class="col-lg-4 col-md-12">
				<div data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.modalcontentsticky', 'padding': {'top': 110}}">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="bg-white text-center bs-solid bc-light bw-s1 p-35">
								<div>
									<img class="max-w--200" :src="'/uploads/parkings/'+parking.avatar" :alt="parking.title">
								</div>
								<div class="w-100 mt-15">
									<span class="bg-v7-warning pt-5 pb-5 pl-20 pr-20 text-dark rounded-s2">{{parking.parking_type.title}}</span>
								</div>
								<h4 class="mt-24 mb-0">{{parking.title}}</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="bg-white">
					<table class="w-100 text-size-12">
						<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
							<td class="p-8">Location</td>
							<td class="p-8 text-right">{{parkingrecorddata.airport_id.name}}</td>
						</tr>
						<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
							<td class="p-8">Drop-Off Date Time</td>
							<td class="p-8 text-right">{{ parkingrecorddata.drop_off_date | moment("DD, MMM YYYY") }} at {{parkingrecorddata.drop_off_hour}}:{{parkingrecorddata.drop_off_minute}}</td>
						</tr>
						<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
							<td class="p-8">Pick-Up Date Time</td>
							<td class="p-8 text-right">{{ parkingrecorddata.arrival_date | moment("DD, MMM YYYY") }} at {{parkingrecorddata.arrival_hour}}:{{parkingrecorddata.arrival_minute}}</td>
						</tr>
						<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
							<td class="p-8">Days</td>
							<td class="p-8 text-right">{{ this.totalDays }}</td>
						</tr>
						<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
							<td class="p-8">Booking Quote</td>
							<td class="p-8 text-right text-size-18 text-bold-600">${{ this.bookingQuote }}</td>
						</tr>
						<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
							<td class="p-8">Promo Code</td>
							<td class="p-8 text-right">None</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
    var moment = require('moment');
    export default {
        props: ['parkingrecorddata','recorddata','setting'],
        data(){
            return {
                loading: false,
            	paypal: {
					sandbox: 'AcBYheHNCOQ7e-6a-OUkklVhzBzeFbRi1U7a5llrJgjUnElOvCoFru5oF4Jxj6GQuPbQ65cCinAFaFt3',
					production: '<production client id>'
				},
            	record: {
            		drop_off_date: moment(new Date(this.parkingrecorddata.drop_off_date), 'YYYY MM DD').format('YYYY-MM-DD'),
            		arrival_date: moment(new Date(this.parkingrecorddata.arrival_date), 'YYYY MM DD').format('YYYY-MM-DD'),
            		id: 0,
            		email: 'm.akbarsarwar@gmail.com',
            		confirm_email: 'm.akbarsarwar@gmail.com',
            		title_id: '',
            		first_name: 'abc',
            		last_name: 'xyz',
            		mobile_number: '03221212121',
            		post_code: '54000',
            		know_travel_detail: 0,
            		departterminal_id: '',
            		outbound_flight: '',
            		arrivalterminal_id: '',
            		inbound_flight: '',
            		know_vehical_detail: 0,
            		// email: '',
            		// confirm_email: '',
            		// title_id: '',
            		// first_name: '',
            		// last_name: '',
            		// mobile_number: '',
            		// post_code: '',
            		// know_travel_detail: 1,
            		// departterminal_id: '',
            		// outbound_flight: '',
            		// arrivalterminal_id: '',
            		// inbound_flight: '',
            		// know_vehical_detail: 1,
            		make: '',
            		model: '',
            		colour: '',
            		registration: '',
            		accept_terms_condition: 0,
            		// payment_detail: 0,
            		// card_name: '',
            		// card_number: '',
            		// cv2: '',
            		// expiry_month: '',
            		// expiry_year: '',
            		mybookparking_id: this.recorddata.mybookparking_id,
            		parkingrecorddata: this.parkingrecorddata,
            		booking_edit: 0,
            		pay_data: {},
            	},
            	errors: [],
            	titles: [],
            	parking: {},
                response: {
                    type: "success",
                    message: "",
                    order_completed: false,
                    order_type: false,
                    isVisible: false,
                },
            }
        },
        created(){
            this.getParkingData()
            this.getTitles()
        },
        methods:{
         	onComplete(data){
                this.loading = true;
         		if(data.state == 'approved'){
         			axios.post('/order', this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                            this.loading = false,
                            this.errors = res.data.errors,
                                this.response = {
                                    isVisible: false,
                                }
                        } else {
                            // this.clearForm()
                            this.loading = false,
                            this.record.pay_data = data
                            this.response = {
                                isVisible: true,
                                order_completed: true,
                                message: res.data.message,
                                type: 'success'
                            }
                            setTimeout(() => this.clearForm(), 1000);
                            setTimeout(() => window.location.reload(), 1);
                        }
                    })
                    .catch((err) => {})
         		}
         	},
         	booking_edit(){
         		this.record.booking_edit = 0
         		this.response.order_type = false
         	},
            order() {
                this.loading = true,
                axios.post('/order/validate', this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                				this.loading = false,
	                        	this.record.booking_edit = 0,
                            	this.errors = res.data.errors,
                                this.response = {
                    				order_type: false,
                                    isVisible: false,
                                }
                        } else {
            				this.loading = false,
                            // this.clearForm()
                        	this.record.booking_edit = 1,
                            this.response = {
                                isVisible: true,
                    			order_type: true,
                                message: res.data.message,
                                type: 'success'
                            },
                			this.errors = []
                            // setTimeout(() => this.clearForm(), 1000);
                            // setTimeout(() => window.location.reload(), 1);
                        }
                    })
                    .catch((err) => {})
            },
            getParkingData() {
            	// alert(this.recorddata.mybookparking_id);
                axios.get('/parking/get/'+this.recorddata.mybookparking_id)
                    .then((res) => {
                        this.parking = res.data
                    })
                    // this.$refs['email'].focus();
            },
            getTitles() {
            	axios.get('/setup/titles-get-active/all')
            		.then((res) => {
            			this.titles = res.data
            		})
            },
            clearForm() {
                this.record = {
                    id: 0,
            		email: '',
            		confirm_email: '',
            		title_id: '',
            		first_name: '',
            		last_name: '',
            		mobile_number: '',
            		post_code: '',
            		know_travel_detail: 1,
            		departterminal_id: '',
            		outbound_flight: '',
            		arrivalterminal_id: '',
            		inbound_flight: '',
            		know_vehical_detail: 1,
            		make: '',
            		model: '',
            		colour: '',
            		registration: '',
            		accept_terms_condition: 0,
            		// payment_detail: 0,
            		// card_name: '',
            		// card_number: '',
            		// cv2: '',
            		// expiry_month: '',
            		// expiry_year: '',
            		mybookparking_id: '',
            		parkingrecorddata: '',
                }
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                this.errors = []
            },
        },
        computed: {
            totalDays: function(){
	        	var a = moment(new Date(this.parkingrecorddata.drop_off_date), 'DD/MM/YYYY');
				var b = moment(new Date(this.parkingrecorddata.arrival_date), 'DD/MM/YYYY');
				var days = b.diff(a, 'days');
                return days;
            },
            bookingQuote: function(){
            	// alert(this.totalDays);
            	// alert(totalDays);
				// var quote = this.parking.total * this.totalDays
				var quote = this.parking.total * this.totalDays
                return quote.toFixed(2).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,");
            },
        }
    }
</script>