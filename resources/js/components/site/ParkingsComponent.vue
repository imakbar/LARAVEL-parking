<template>
    <div>
        <div class="container">
        	
        	<div class="bg-white p-20" v-if="record.mybookparking_id != 0">
        	<div class="row">
        		<div class="col-md-12 text-right">
        			<button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover" @click.prevent="back()">Back</button>
        		</div>
        		<div class="col-md-12">
        			<booking :parkingrecorddata="recorddata" :recorddata="record" :setting="setting"></booking>
        		</div>
        	</div>
        	</div>

        	<div class="row pl-16" v-if="record.mybookparking_id == 0">
				<div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="row" v-if="getparkings.length == 0">
                        <div class="col-md-12">
                            <h1>No record found</h1>
                        </div>
                    </div>
					<div class="row">

                        <div class="c-loading" v-if="this.isloadinghome">
                            <pulse-loader loading="loading" color="#ef0880" size="25px"></pulse-loader>
                        </div>
                        
						<div class="col-lg-12 col-md-6 position-relative" v-for="(item, index) in getparkings" :key="index">

							<!-- MODAL -->
							<parking-model :parkingrecorddata="recorddata" :setting="setting" :parking="item"></parking-model>
							<!-- /MODAL -->

							<div class="mb-s2 box-shadow-v1-s2--hover position-relative" v-match-heights="{ el: ['.match-height'], disabled: [575,768,[768, 992, 1200]] }">

								<div class="row">
									<div class="col-lg-4 col-md-12 p-0">
										<div class="bg-white hero-section-parent d-flex justify-content-center position-relative align-items-center bs-solid bc-light bw-s1 match-height min-h--260--md min-h--260--sm min-h--260--xs">
											<div>
												<img class="max-w--200" :src="'/uploads/parkings/'+item.avatar" :alt="item.title">
											</div>
											<div class="hero-section-container-bl w-100 d-flex align-items-center justify-content-center">
												<span class="bg-v7-warning pt-5 pb-5 pl-20 pr-20 text-dark rounded-tl-s2 rounded-tr-s2">{{item.parking_type.title}}</span>
											</div>
										</div>
									</div>
									<div class="col-lg-8 col-md-12 p-0">
										<div class="bg-white pt-s3 pl-s3 pr-s3 pb-s3 match-height">
											<div class="ribbon ribbon-top-left" v-if="item.offer == 1"><span class="bg-pink text-white box-shadow-v2-s3">Offer</span></div>
											<div class="row">
												<div class="col-lg-7 col-md-12">
                                                    <div class="text-size-30 mt-s3 mb-18" v-if="item.offer != 1">{{ item.total * totalDays | currency('$', 2) }}</div>
													<div class="text-size-30 mt-s3 mb-18" v-if="item.offer == 1">{{ item.total * totalDays | currency('$', 2) }} <del>{{item.rate * totalDays}}</del></div>
													<div class="star-rating star-rating-s2 text-pink mb-6" v-b-tooltip.hover :title="ratings.filter(u => u.parking_id == item.id)[0].rating + ' Rating'"><span :class="'w-'+Math.round((ratings.filter(u => u.parking_id == item.id)[0].rating / 5) * 100)"></span></div>
													<h2 class="text-size-20 text-bold-600 text-capitalize mb-8">{{item.title}}</h2>
													<h6 class="text-danger">{{item.transfer}}</h6>
													<span>{{item.cancellation.title}}</span>
													<div class="mt-20">
														<button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover" @click="bookparking(item.id)">Book Now</button>
														<a class="btn bg-warning text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover" data-toggle="modal" :data-target="'#more-info'+item.id">More Info</a>
													</div>
												</div>
												<div class="col-lg-5 col-md-12">
													<ul class="row mt-20 mb-15">
														<li class="col-lg-12 col-md-12 col-sm-12 mt-6 mb-6" v-for="(service, index) in item.parking_services_details">
															<img class="w--30" :src="'/uploads/parking-services/'+service.parking_service.avatar" :alt="service.parking_service.title">
															{{service.parking_service.title}}
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
					</div> <!-- /ROW -->
				</div>
				<div class="col-lg-3 col-md-12 col-sm-12">
					<div data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">
						<div class="bg-white box-shadow-v1-s3 position-relative">
                            <div class="c-loading" v-if="this.isloadinghome">
                                <pulse-loader loading="loading" color="#ef0880" size="25px"></pulse-loader>
                            </div>
							<div class="bg-pink pt-8 pb-8 pl-20 pr-20 text-white text-center text-size-20 text-bold-600">
								Your Quote Detail
							</div>
							<table class="w-100 text-size-12">
								<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
									<td class="p-8">Location</td>
									<td class="p-8 text-right">{{recorddata.airport_id.name}}</td>
								</tr>
								<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
									<td class="p-8">Drop-Off Date</td>
									<td class="p-8 text-right">{{ recorddata.drop_off_date | moment("DD, MMM YYYY") }}</td>
								</tr>
								<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
									<td class="p-8">Drop-Off Time</td>
									<td class="p-8 text-right">{{recorddata.drop_off_hour}}:{{recorddata.drop_off_minute}}</td>
								</tr>
								<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
									<td class="p-8">Pick-Up Date</td>
									<td class="p-8 text-right">{{ recorddata.arrival_date | moment("DD, MMM YYYY") }}</td>
								</tr>
								<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
									<td class="p-8">Pick-Up Time</td>
									<td class="p-8 text-right">{{recorddata.arrival_hour}}:{{recorddata.arrival_minute}}</td>
								</tr>
								<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
									<td class="p-8">Days</td>
									<td class="p-8 text-right">{{ this.totalDays }}</td>
								</tr>
								<tr class="bs-solid bc-light bw-s1 mt-0 bl-0 br-0">
									<td class="p-8">Promo Code</td>
									<td class="p-8 text-right">None</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div> <!-- /ROW -->
			<!-- /PAGINATION -->
            <!-- <pagination :data="getparkings" @pagination-change-page="getData" v-if="getparkings > 0"></pagination> -->
            <!-- /PAGINATION -->
        </div> <!-- /CONTAINER -->
    </div>
</template>
<script type="text/javascript">
    var moment = require('moment');
    // var round = require('vue-round-filter');
    export default {
        props: ['recorddata','getparkings','setting','isloadinghome'],
        data(){
            return {
            	record: {
            		mybookparking_id: 0,
            	},
                myrating: '',
            	errors: [],
                ratings: [],
                // count: [],
            }
        },
        created(){
            this.getRatings()
            // this.getCountData()
        },
        methods:{
        	bookparking(id) {
        		this.record.mybookparking_id = id
        	},
            back() {
            	this.record.mybookparking_id = 0
            },
            getRatings() {
                axios.get('/ratings')
                    .then((res) => {
                        this.ratings = res.data
                    })
            },
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
            // getData(page = 1) {
            //     axios.get('/active-parkings/?page='+page)
            //         .then((res) => {
            //             this.items = res.data
            //         })
            // },
            // getCountData() {
            //     axios.get('/faqs-active/count')
            //         .then((res) => {
            //             this.count = res.data
            //         })
            // },
        },
        computed: {
            totalDays: function(){
                // alert(this.recorddata.drop_off_date);
                // alert(this.recorddata.arrival_date);
	        	var a = moment(new Date(this.recorddata.drop_off_date), 'DD/MM/YYYY');
				var b = moment(new Date(this.recorddata.arrival_date), 'DD/MM/YYYY');
                // alert(a);
                // alert(b);
                // alert(b.diff(a, 'days'));
				var days = b.diff(a, 'days');
                return days;
            }
        }
    }
</script>