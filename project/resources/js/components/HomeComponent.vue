<template>
    <div>
        <section class="pt-s5 pb-s5 overlay-wrap" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="assets/images/bg/bg-1.jpg">
            <div class="container overlay-container pt-s2 pb-s5">
                <div class="pb-s5">
                    <div class="hero-section-container-tl w-100 h-100 d-flex justify-content-center align-items-center">
                        <div class="text-center mb-s2">
                            <div class="mt-s3 text-white">
                                <h6>Find best airport parking deals</h6>
                            </div>
                            <div class="mt-s1 mb-s5 text-white">
                                <h1 class="animated-headline letters type mb-s2 text-white text-size-20--xs text-size-30--sm">
                                    <span class="headline-wrapper text-pink text-capitalize">
                                        <b class="is-visible">Compare Multiple providers</b>
                                        <b>Lowest prices</b>
                                        <b>Secure Booking Process</b>
                                        <b>A brand you can trust</b>
                                    </span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /CONTAINER -->
            <div class="overlay bg-v9-dark"></div>
        </section> <!-- /SECTION -->

        <section class="bg-v5-light pt-s3 pb-s3">
            <div class="quote-setting container">
                <div class="bg-white p-s3 bs-solid bc-light bw-s1 rounded-s2 box-shadow-v1-s5 position-relative">
                    <div class="c-loading" v-if="loading">
                        <pulse-loader loading="loading" color="#ef0880" size="25px"></pulse-loader>
                    </div>
                    <form class="quote-hr">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group tooltip_error">
                                    <label for="airport_id">Airport</label>
                                    <!-- <multiselect
                                        class="text-size-12"
                                        v-model="record.airport_id"
                                        :options="airports"
                                        label="name">
                                    </multiselect> -->
                                    <select class="form-control rounded-s5 text-size-12" v-model="record.airport_id">
                                        <option v-for="(airport, index) in airports" :key="index" :value="airport">{{airport.name}}</option>
                                    </select>
                                    <small v-if="errors.airport_id != null" class="text-danger">
                                        <span>
                                            {{errors.airport_id[0]}}
                                        </span>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Drop off Date Time</label>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <!-- <input type="date" class="form-control text-size-12 rounded-s5 bc-v1-dark"> -->
                                        <!-- <vuejs-datepicker></vuejs-datepicker> -->
                                        <!-- <vuejs-datepicker
                                             v-model="model.date"
                                             :format="DatePickerFormat"
                                             :disabledDates="disabledDates">
                                        </vuejs-datepicker> -->
                                        <!-- <datepicker></datepicker> -->
                                        <datepicker v-model="record.drop_off_date" :format="customFormatter" :disabledDates="disabledDates" @selected="getParkings()"></datepicker>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6">
                                        <select v-model="record.drop_off_hour" class="form-control rounded-s5 text-size-12">
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6">
                                        <select v-model="record.drop_off_minute" class="form-control rounded-s5 text-size-12">
                                            <option value="00">00</option>
                                            <option value="05">05</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Arrival Date Time</label>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <datepicker v-model="record.arrival_date" :format="customFormatter" :disabledDates="disabledDates" @selected="getParkings()"></datepicker>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6">
                                        <select v-model="record.arrival_hour" class="form-control rounded-s5 text-size-12">
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6">
                                        <select v-model="record.arrival_minute" class="form-control rounded-s5 text-size-12">
                                            <option value="00">00</option>
                                            <option value="05">05</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                        </select>
                                    </div>
                                </div>
                                <small v-if="errors.arrival_date != null" class="text-danger">
                                    <span>
                                        {{errors.arrival_date[0]}}
                                    </span>
                                </small>
                            </div>
                            <!-- <div class="col-lg-4">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Discount Code</label>
                                        <input type="text" class="form-control text-size-12 rounded-s5 bc-v1-dark">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 mt-30 rounded-s5 mb-s1 btn-block">Get Quote</button>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-2">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" @click.prevent="getParkings()" class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 mt-30 rounded-s5 mb-s1 btn-block">Get Quote</button>
                                        <button type="submit" @click.prevent="clearForm()" v-if="response.isVisible" class="btn bg-warning text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 mt-30 rounded-s5 mb-s1 btn-block">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- /CONTAINER -->

            <!-- <div class="c-loading">
                <pulse-loader loading="loading" color="red" size="50px"></pulse-loader>
            </div> -->

            <div v-if="response.isVisible == true" class="mt-25">
                <parkings :getparkings="this.get_parkings" :recorddata="this.record" :setting="setting" :isloadinghome="loading"></parkings>
            </div>

            <div class="container pt-s4" v-if="response.isVisible == false">
                <services></services>
            </div> <!-- /CONTAINER -->
        </section> <!-- /SECTION -->

        <section v-if="response.isVisible == false" class="pt-s5 pb-s5 overlay-wrap" data-video-path="assets/videos/light" data-plugin-video-background data-plugin-options="{'posterType': 'jpg', 'position': '50% 50%'}">
            <div class="container overlay-container">
                <div class="mb-80 text-center">
                    <h6 class="text-bold-700 text-pink">Airport Parking</h6>
                    <h2 class="text-bold-700 text-white">Airport Parking in 3 Simple Steps</h2>
                    <div class="mb-s3">
                        <hr class="mb-0 bc-v1-dark">
                        <hr class="w--60 bs-solid bc-pink bw-s5 bt-0 bl-0 br-0 mt-0">
                    </div>
                </div>
                <steps></steps>
            </div> <!-- /CONTAINER -->
            <div class="overlay bg-dark-g opacity-v9"></div>
        </section> <!-- /SECTION -->

        <section v-if="response.isVisible == false" class="bg-white pt-s5 pb-s5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <h4 class="text-bold-700">Testimonials</h4>
                                    <hr class="mt-0 mb-s1 bc-v1-dark">
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="owl-carousel owl-theme owl-nav-bg show-nav-title" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 1}, '979': {'items': 1}, '1199': {'items': 1}}, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
                                            <div v-for="(item, index) in reviews" :key="index">
                                                <div class="mt-s2 mb-s2 box-shadow-parent--hover">
                                                    <div>
                                                        <p class="mb-s1 text-size-s2 font-italic">{{item.comment}}</p>
                                                    </div>
                                                    <div class="d-flex mt-s2 ml-20">
                                                        <div class="rounded-circle h--45 w--45 mr-s2 d-flex justify-content-center align-items-center box-shadow-v2-s3-child--hover">
                                                            <img class="w-100 rounded-circle bs-solid bc-light bw-s3" src="assets/images/testimonials/user-1.jpg" alt="Testimonials">
                                                        </div>
                                                        <div>                                   
                                                            <span class="text-bold-600 text-dark d-block">John Doe</span>
                                                            <!-- <span class="text-size-s1 text-muted">Google Inc.</span> -->
                                                            <div v-if="item.rating == 1">
                                                                <div class="star-rating star-rating-s1 text-pink mb-8 mt-4 ml-0" v-b-tooltip.hover title="1 Start">
                                                                    <span class="w-20"></span>
                                                                </div>
                                                            </div>
                                                            <div v-if="item.rating == 2">
                                                                <div class="star-rating star-rating-s1 text-pink mb-8 mt-4 ml-0" v-b-tooltip.hover title="2 Start">
                                                                    <span class="w-40"></span>
                                                                </div>
                                                            </div>
                                                            <div v-if="item.rating == 3">
                                                                <div class="star-rating star-rating-s1 text-pink mb-8 mt-4 ml-0" v-b-tooltip.hover title="3 Start">
                                                                    <span class="w-60"></span>
                                                                </div>
                                                            </div>
                                                            <div v-if="item.rating == 4">
                                                                <div class="star-rating star-rating-s1 text-pink mb-8 mt-4 ml-0" v-b-tooltip.hover title="4 Start">
                                                                    <span class="w-80"></span>
                                                                </div>
                                                            </div>
                                                            <div v-if="item.rating == 5">
                                                                <div class="star-rating star-rating-s1 text-pink mb-8 mt-4 ml-0" v-b-tooltip.hover title="5 Start">
                                                                    <span class="w-100"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /ROW -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="mb-s2 mt-s3--md mt-s3--sm mt-s3--xs">
                            <h4 class="text-bold-700">Type of Parking</h4>
                            <hr class="mt-0 mb-s1 bc-v1-dark">
                        </div>
                        <div class="accordion" id="accordion-acc7">
                            <div class="card border-none bg-none">
                                <div id="headingOne-acc7-1">
                                    <h5 class="mb-s1">
                                        <button class="btn btn-link btn-block text-size-s1 text-bold-600 text-dark rounded-0 text-left bg-v5-light bg-pink--active text-white--active text-pink--hover active collapsed pt-s1 pl-s2 pr-s2 pb-s1" type="button" data-toggle="collapse" data-target="#collapseOne-acc7-1" aria-expanded="true" aria-controls="collapseOne-acc7-1">
                                            <span class="mr-s1">
                                                <span>
                                                    <i class="fa fa-plus hide"></i>
                                                    <i class="fa fa-minus show"></i>
                                                </span>
                                            </span>
                                            Meet and Greet
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne-acc7-1" class="collapse show" aria-labelledby="headingOne-acc7-1" data-parent="#accordion-acc7">
                                    <div class="card-body pt-s2 pb-s2">
                                        <p>No parking stress, no hassle! Leave and pick your car from airport terminal. Professional & insured chauffeurs will greet you at the airport and safely park your car. Compare the cheapest meet and greet rates from trusted parking suppliers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-none bg-none">
                                <div id="headingTwo-acc7-2">
                                    <h5 class="mb-s1">
                                        <button class="btn btn-link btn-block text-size-s1 text-bold-600 text-dark rounded-0 text-left bg-v5-light bg-pink--active text-white--active text-pink--hover collapsed pt-s1 pl-s2 pr-s2 pb-s1" type="button" data-toggle="collapse" data-target="#collapseTwo-acc7-2" aria-expanded="false" aria-controls="collapseTwo-acc7-2">
                                            <span class="mr-s1">
                                                <span>
                                                    <i class="fa fa-plus hide"></i>
                                                    <i class="fa fa-minus show"></i>
                                                </span>
                                            </span>
                                            Park and Ride
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo-acc7-2" class="collapse" aria-labelledby="headingTwo-acc7-2" data-parent="#accordion-acc7">
                                    <div class="card-body pt-s2 pb-s2">
                                        <p>The most affordable & convenient way to park your car in our close to the airport car parks. Save money by comparing unbeatable park and ride offers at UK airports.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-none bg-none">
                                <div id="headingThree-acc7-3">
                                    <h5 class="mb-s1">
                                        <button class="btn btn-link btn-block text-size-s1 text-bold-600 text-dark rounded-0 text-left bg-v5-light bg-pink--active text-white--active text-pink--hover collapsed pt-s1 pl-s2 pr-s2 pb-s1" type="button" data-toggle="collapse" data-target="#collapseThree-acc7-3" aria-expanded="false" aria-controls="collapseThree-acc7-3">
                                            <span class="mr-s1">
                                                <span>
                                                    <i class="fa fa-plus hide"></i>
                                                    <i class="fa fa-minus show"></i>
                                                </span>
                                            </span>
                                            On Site Airport Parking
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree-acc7-3" class="collapse" aria-labelledby="headingThree-acc7-3" data-parent="#accordion-acc7">
                                    <div class="card-body pt-s2 pb-s2">
                                        <p>We have cheap offers for on-site parking at all major UK airports. Compare our prices and save up to 60% on booking UK airport parking now. Trusted by thousands of satisfied customers, our airport parking offers are simply unbeatable.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /ROW -->
            </div> <!-- /CONTAINER -->
        </section> <!-- /SECTION -->

    </div>
</template>
<script type="text/javascript">
    var moment = require('moment');
    export default {
        props: ['setting'],
        data(){

            return {
                loading: false,
                record: {
                    id: 0,
                    airport_id: '',
                    drop_off_date: moment(new Date()).format('DD MMM YYYY'),
                    drop_off_hour: moment(new Date()).format('hh'),
                    drop_off_minute: '00',
                    // arrival_date: moment(new Date()).format('DD MMM YYYY'),
                    arrival_date: moment(new Date()).add(3, 'd').format('DD MMM YYYY'),
                    arrival_hour: moment(new Date()).format('hh'),
                    arrival_minute: '00',
                },
                errors: [],
                get_parkings: [],
                steps: [],
                airports: [],
                reviews: [],
                disabledDates: {
                    to: new Date(moment(new Date()).subtract(1, 'd') - 8640000)
                },
                response: {
                    type: "success",
                    message: "",
                    isVisible: false
                },
            }
        },
        created(){
            // this.getParkings()
            this.getStepsData()
            this.getAirports()
            this.getReviews()
        },
        methods:{
            customFormatter(date) {
              return moment(date).format('DD MMM YYYY');
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
            getParkings() {
                this.loading = true;
                axios.post('/get-parkings', this.record)
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
                            this.get_parkings = res.data,
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success'
                            }
                            this.errors = []
                            // this.record.id = res.data.id
                            // this.getData()
                            // setTimeout(() => this.response = {isVisible:false}, 1000);
                        }
                    })
                    .catch((err) => {})
            },
            getReviews() {
                axios.get('/mini-customer-reviews')
                    .then((res) => {
                        this.reviews = res.data
                    })
            },
            clearForm() {

                this.record = {
                    id: 0,
                    airport_id: '',
                    drop_off_date: moment(new Date()).format('DD MMM YYYY'),
                    drop_off_hour: moment(new Date()).format('hh'),
                    drop_off_minute: '00',
                    arrival_date: moment(new Date()).add(3, 'd').format('DD MMM YYYY'),
                    arrival_hour: moment(new Date()).format('hh'),
                    arrival_minute: '00',
                }
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                this.errors = []
                this.get_parkings = []
            },
            getStepsData() {
                axios.get('/steps-active')
                    .then((res) => {
                        this.steps = res.data
                    })
            },
            getAirports() {
                axios.get('/setup/airports-get-active/all')
                    .then((res) => {
                        this.airports = res.data
                    })
            },
        },
    }
</script>