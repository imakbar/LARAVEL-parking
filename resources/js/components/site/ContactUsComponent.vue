<template>
    <div>
        <!-- BREADCRUMB -->
        <section class="bg-pink pt-s3 pb-s3 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-lg-flex text-center">
                            <div class="align-self-center mb-0--lg mb-s1--md mb-s1--sm mb-s1--xs">
                                <h3 class="text-bold-400 text-size-s2 m-0 text-white">Contact Us</h3>
                            </div>
                            <div class="ml-auto align-self-center">
                                <ol class="breadcrumb d-flex justify-content-center m-0 bg-none text-size-s1 p-0">
                                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Contact Us</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div> <!-- ROW -->
            </div> <!-- /CONTAINER -->
        </section> <!-- /SECTION -->
        <!-- /BREADCRUMB -->

        <section class="bg-v5-light pt-s2 pb-s2">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="mt-s2 mb-s2 box-shadow-parent--hover">
							<div class="d-flex">
								<div class="mr-s2">
									<div class="text-size-s2 rounded-circle bg-pink text-white text-center h--70 w--70 d-flex justify-content-center align-items-center box-shadow-v2-s3 box-shadow-v3-s3-child--hover">
										<i class="icon-phone"></i>
									</div>
								</div>
								<div>
									<h2 class="text-size-18 text-bold-600">Call Us</h2>
									<p class="m-0">+(211) 354-5565</p>
									<p class="m-0">+(201) 343-4545</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="mt-s2 mb-s2 box-shadow-parent--hover">
							<div class="d-flex">
								<div class="mr-s2">
									<div class="text-size-s2 rounded-circle bg-pink text-white text-center h--70 w--70 d-flex justify-content-center align-items-center box-shadow-v2-s3 box-shadow-v3-s3-child--hover">
										<i class="icon-envelope-open"></i>
									</div>
								</div>
								<div>
									<h2 class="text-size-18 text-bold-600">Email Us</h2>
									<p class="m-0">admin@email.com</p>
									<p class="m-0">info@email.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="mt-s2 mb-s2 box-shadow-parent--hover">
							<div class="d-flex">
								<div class="mr-s2">
									<div class="text-size-s2 rounded-circle bg-pink text-white text-center h--70 w--70 d-flex justify-content-center align-items-center box-shadow-v2-s3 box-shadow-v3-s3-child--hover">
										<i class="icon-calendar"></i>
									</div>
								</div>
								<div>
									<h2 class="text-size-18 text-bold-600">Working Hours</h2>
									<p class="m-0">Mon-Sat 09:00 - 19:00</p>
									<p class="m-0">Sun 10:00 - 13:00</p>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- /ROW -->
			</div> <!-- /CONTAINER -->
		</section> <!-- /SECTION -->

		<section class="bg-white pt-s5 pb-s5">
			<div class="container">
				<div class="mb-s4">
					<h6 class="text-bold-700 text-pink">Get In Touch</h6>
					<h2 class="text-bold-700 text-dark text-capitalize">What can we help you with?</h2>
					<hr class="w--60 bs-solid bc-pink bw-s5 bt-0 bl-0 br-0 mt-s2 ml-0">
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<contact-us-form></contact-us-form>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="bs-solid bc-v1-dark bw-s1 p-s1">
							<div id="googlemaps" class="min-h--300"></div>
						</div>
					</div>
				</div> <!-- /ROW -->
			</div> <!-- /CONTAINER -->
		</section> <!-- /SECTION -->

    </div>
</template>
<script type="text/javascript">
    export default {
        data(){
            return {
                // items: [],
                map:"",
                mapOptions:{}
            }
        },
        created(){
            // this.getData()
        },
        mounted(){
            this.initMap();
        },
        methods:{
            initMap: function(){
                
                var CMAP = {lat: -25.363, lng: 131.044};
                var map = new google.maps.Map(document.getElementById('googlemaps'), {
                  zoom: 4,
                  center: CMAP
                });

                var contentString = '<div id="content">'+
                '<strong>New York Office</strong>'+
                '<p>New York, NY 10017</p>'+
                '</div>';

                var infowindow = new google.maps.InfoWindow({
                  content: contentString
                });

                var marker = new google.maps.Marker({
                  position: CMAP,
                  map: map,
                  title: 'CMAP (Ayers Rock)'
                });
                marker.addListener('click', function() {
                  infowindow.open(map, marker);
                });

                // this.mapOptions = {
                //     center: new google.maps.LatLng(12.139808079490507, 79.07690763473511),
                //     zoom: 10,
                //     mapTypeId: 'roadmap',
                //     title: 'Golden Gate Bridge'
                // }
                // this.map = new google.maps.Map(document.getElementById("googlemaps"), this.mapOptions);

                // var myLatLng = {lat: -25.363, lng: 131.044};

                //   var map = new google.maps.Map(document.getElementById('googlemaps'), {
                //     zoom: 4,
                //     center: myLatLng
                //   });

                //   var marker = new google.maps.Marker({
                //     position: myLatLng,
                //     map: map,
                //     title: 'Hello World!',
                //   });
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
            // getData() {
            //     axios.get('/faqs-active')
            //         .then((res) => {
            //             this.items = res.data
            //         })
            // },
        },
    }
</script>