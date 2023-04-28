<template>
	<div>
		<div class="row mt-30">
			<div class="col-lg-8 col-md-12">
				<h4>Your Information</h4>
				<div class="row">
					<div class="form-group col-md-6">
						<label class="text-size-12 text-bold-500">Email Address<span class="text-danger">*</span></label>
						<input type="email" v-model="record.email" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
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
						<input type="email" v-model="record.last_name" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
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
								<input type="email" v-model="record.outbound_flight" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
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
								<input type="email" v-model="record.inbound_flight" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
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
				<!-- <h4>Payment Details</h4>
				<div class="row">
					<div class="form-group col-md-6">
						<select v-model="record.payment_detail" class="form-control text-size-12 bg-light rounded-0 pt-9 pb-8">
							<option :value="0">-- select --</option>
							<option :value="1">Paypal</option>
							<option :value="2">Card</option>
						</select>
					</div>
				</div>
				<div class="row" v-if="record.payment_detail == 2">
					<div class="form-group col-md-6">
						<label class="text-size-12 text-bold-500">Card Name<span class="text-danger">*</span></label>
						<input type="text" v-model="record.card_name" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
						<small v-if="errors.card_name != null" class="text-danger text-size-11">
							<span>
								{{errors.card_name[0]}}
							</span>
						</small>
					</div>
					<div class="form-group col-md-6">
						<label class="text-size-12 text-bold-500">Card Number<span class="text-danger">*</span></label>
						<input type="text" v-model="record.card_number" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
						<small v-if="errors.card_number != null" class="text-danger text-size-11">
							<span>
								{{errors.card_number[0]}}
							</span>
						</small>
					</div>
				</div>
				<div class="row" v-if="record.payment_detail == 2">
					<div class="form-group col-md-6">
						<label class="text-size-12 text-bold-500">CV2<span class="text-danger">*</span></label>
						<input type="text" v-model="record.cv2" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
						<small v-if="errors.cv2 != null" class="text-danger text-size-11">
							<span>
								{{errors.cv2[0]}}
							</span>
						</small>
					</div>
					<div class="form-group col-md-6">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<label class="text-size-12 text-bold-500">Expiry Month<span class="text-danger">*</span></label>
								<input type="text" v-model="record.expiry_month" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
								<small v-if="errors.expiry_month != null" class="text-danger text-size-11">
									<span>
										{{errors.expiry_month[0]}}
									</span>
								</small>
							</div>
							<div class="col-lg-6 col-md-12">
								<label class="text-size-12 text-bold-500">Expiry Year<span class="text-danger">*</span></label>
								<input type="text" v-model="record.expiry_year" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark">
								<small v-if="errors.expiry_year != null" class="text-danger text-size-11">
									<span>
										{{errors.expiry_year[0]}}
									</span>
								</small>
							</div>
						</div>
					</div>
				</div> -->
				<div class="row mt-10">
					<div class="col-md-12">
						<b-form-checkbox v-model="record.accept" value="accepted">On making payment you agree to {{setting.title}} Ltd. 
					    </b-form-checkbox>
					</div>
				</div>
				<button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover mt-30" @click.prevent="save()">Confirm Booking</button>
			</div>
			<div class="col-lg-4 col-md-12">
				<div data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.modalcontentsticky', 'padding': {'top': 110}}">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="bg-white text-center bs-solid bc-light bw-s1 p-35">
								<div>
									<img class="max-w--200" :src="'/uploads/parkings/'+parking.avatar" :alt="parking.title">
								</div>
								<div class="w-100">
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
            	record: {
            		id: 0,
            		email: '',
            		confirm_email: '',
            		title_id: 1,
            		first_name: '',
            		last_name: '',
            		mobile_number: '',
            		post_code: '',
            		know_travel_detail: 1,
            		depart_terminal: '',
            		outbound_flight: '',
            		arrival_terminal: '',
            		inbound_flight: '',
            		know_vehical_detail: 1,
            		make: '',
            		model: '',
            		colour: '',
            		registration: '',
            		payment_detail: 0,
            		card_name: '',
            		card_number: '',
            		cv2: '',
            		expiry_month: '',
            		expiry_year: '',
            		accept: 0,
            		mybookparking_id: 0,
            	},
            	errors: [],
            	titles: [],
            	parking: {},
            }
        },
        created(){
            this.getParkingData()
            this.getTitles()
        },
        methods:{
        	// bookparking(id) {
        	// 	this.record.mybookparking_id = id
        	// },
         //    back() {
         //    	this.record.mybookparking_id = 0
         //    },
            getParkingData() {
            	// alert(this.recorddata.mybookparking_id);
                axios.get('/parking/get/'+this.recorddata.mybookparking_id)
                    .then((res) => {
                        this.parking = res.data
                    })
            },
            getTitles() {
            	axios.get('/setup/titles-get-active/all')
            		.then((res) => {
            			this.titles = res.data
            		})
            }
        },
        computed: {
            totalDays: function(){
	        	var a = moment(this.parkingrecorddata.drop_off_date, 'DD/MM/YYYY');
				var b = moment(this.parkingrecorddata.arrival_date, 'DD/MM/YYYY');
				var days = b.diff(a, 'days');
                return days;
            },
            bookingQuote: function(){
            	// alert(this.totalDays);
            	// alert(totalDays);
				var quote = this.parking.rate * this.totalDays
                return quote;
            },
        }
    }
</script>