<template>
	<div>
		<div class="modal fade text-xs-left modal-xl" :id="'more-info'+parking.id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-dialog modal_xl" role="document">
				<div class="modal-content modalcontentsticky">
					<button type="button" class="close btn-primary text-white site_model_close_btn bg-danger" data-dismiss="modal" aria-label="Close" @click.prevent="back()">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="modal-body">

			        	<div class="row" v-if="record.mybookparking_id != 0">
			        		<div class="col-md-12 text-right">
			        			<button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover" @click.prevent="back()">Back</button>
			        		</div>
			        		<div class="col-md-12">
			        			<booking :parkingrecorddata="parkingrecorddata" :recorddata="recorddata" :setting="setting"></booking>
			        		</div>
			        	</div>

						<div class="row" v-if="record.mybookparking_id == 0">
							<div class="col-md-9 col-md-9">
								<div class="site_model_tabs">
								<b-tabs pills card>
						            <b-tab class="nav-link" title="Overview">
						                <div class="row m-bottom-15">
						                    <div class="col-md-12">
						                        <p class="editor-list" v-html="parking.overview"></p>
						                    </div>
						                </div>
						            </b-tab>
						            <b-tab class="nav-link" title="Return Procedure">
						                <div class="row m-bottom-15">
						                    <div class="col-md-12">
						                        <p class="editor-list" v-html="parking.return_procedure"></p>
						                    </div>
						                </div>
						            </b-tab>
						            <b-tab class="nav-link" title="Drop-Off Procedure">
						                <div class="row m-bottom-15">
						                    <div class="col-md-12">
						                        <p class="editor-list" v-html="parking.drop_off_procedure"></p>
						                    </div>
						                </div>
						            </b-tab>
						            <b-tab class="nav-link" title="Terms & Conditions">
						                <div class="row m-bottom-15">
						                    <div class="col-md-12">
						                        <p class="editor-list" v-html="parking.terms_and_conditions"></p>
						                    </div>
						                </div>
						            </b-tab>
						            <b-tab class="nav-link" title="Important">
						                <div class="row m-bottom-15">
						                    <div class="col-md-12">
						                        <p class="editor-list" v-html="parking.important"></p>
						                    </div>
						                </div>
						            </b-tab>
						            <b-tab class="nav-link" title="Reviews">
						                <div class="row m-bottom-15">
						                    <div class="col-md-12">
						                        <parking-reviews :parking="parking"></parking-reviews>
						                    </div>
						                </div>
						            </b-tab>
						        </b-tabs>
						        </div>
							</div>
							<div class="col-lg-3 col-md-3">
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
										<div class="col-lg-12 col-md-12">
											<div class="bg-v5-light pt-s3 pl-s3 pr-s3 pb-s3 position-relative">
												<div class="ribbon ribbon-top-left"><span class="bg-pink text-white box-shadow-v2-s3">Offer</span></div>
												<div class="row">
													<div class="col-lg-12 col-md-12">
														<div class="text-size-30 mt-s3 mb-18" v-if="parking.offer != 1">{{ parking.total * totalDays | currency('$', 2) }}</div>
														<div class="text-size-30 mt-s3 mb-18" v-if="parking.offer == 1">{{ parking.total * totalDays | currency('$', 2) }} <del>{{parking.rate * totalDays}}</del></div>
														<div class="star-rating star-rating-s2 text-pink mb-6" v-b-tooltip.hover :title="ratings.filter(u => u.parking_id == parking.id)[0].rating + ' Rating'"><span :class="'w-'+Math.round((ratings.filter(u => u.parking_id == parking.id)[0].rating / 5) * 100)"></span></div>
														<h2 class="text-size-20 text-bold-600 text-capitalize mb-8">{{parking.title}}</h2>
														<h6 class="text-danger">{{parking.transfer}}</h6>
														<span>{{parking.cancellation.title}}</span>
														<div class="mt-20">
															<a class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover" @click="bookparking(parking.id)">Book Now</a>
														</div>
													</div>
													<div class="col-lg-12 col-md-12">
														<ul class="row mt-20 mb-15">
															<li class="col-lg-12 col-md-12 col-sm-12 mt-6 mb-6" v-for="(service, index) in parking.parking_services_details">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
    var moment = require('moment');
	export default{
        props: ['parkingrecorddata','setting','parking'],
		data(){
            return {
            	record: {
            		mybookparking_id: 0,
            	},
        		recorddata: {},
                ratings: [],
            }
		},
		created(){
            this.getRatings()
        },
		methods: {
        	bookparking(id) {
        		this.record.mybookparking_id = id
        		this.recorddata.mybookparking_id = id
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
		},
        computed: {
            totalDays: function(){
	        	var a = moment(new Date(this.parkingrecorddata.drop_off_date), 'DD/MM/YYYY');
				var b = moment(new Date(this.parkingrecorddata.arrival_date), 'DD/MM/YYYY');
				var days = b.diff(a, 'days');
                return days;
            },
    //         bookingQuote: function(){
    //         	// alert(this.totalDays);
    //         	// alert(totalDays);
				// // var quote = this.parking.total * this.totalDays
				// var quote = this.parking.total * this.totalDays
    //             return quote.toFixed(2).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,");
    //         },
        }
	}
</script>