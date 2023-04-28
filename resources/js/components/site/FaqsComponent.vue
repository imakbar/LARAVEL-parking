<template>
    <div>
    	<!-- BREADCRUMB -->
		<section class="bg-pink pt-s3 pb-s3 text-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="d-lg-flex text-center">
							<div class="align-self-center mb-0--lg mb-s1--md mb-s1--sm mb-s1--xs">
								<h3 class="text-bold-400 text-size-s2 m-0 text-white">FAQs</h3>
							</div>
							<div class="ml-auto align-self-center">
								<ol class="breadcrumb d-flex justify-content-center m-0 bg-none text-size-s1 p-0">
									<li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
									<li class="breadcrumb-item" aria-current="page">FAQs</li>
								</ol>
							</div>
						</div>
					</div>
				</div> <!-- ROW -->
			</div> <!-- /CONTAINER -->
		</section> <!-- /SECTION -->
		<!-- /BREADCRUMB -->

		<section class="bg-white pt-s5 pb-s5">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-12">
						<div class="mt-s2 mb-s2">
							<div class="mb-s3">
								<h6 class="text-bold-700 text-pink">FAQs</h6>
								<h3 class="text-bold-700 text-dark text-capitalize">Get perfect answers from us !</h3>
							</div>
							<div class="accordion" id="accordion-acc16">
								<div class="card border-none bg-none mb-s2" v-for="(item, index) in items" :key="index">
									<div id="headingOne-acc16-1">
										<h5 class="mb-0">
											<button class="btn btn-link btn-block text-uppercase text-size-s1 text-bold-600 text-dark rounded-s5 text-left bs-solid bc-pink--active bw-s4 text-pink--active text-pink--hover active collapsed pt-s1 pb-s1" type="button" data-toggle="collapse" :data-target="'#collapseOne-acc16-'+item.id" aria-expanded="false" aria-controls="collapseOne-acc16-1">
												<span class="mr-s1">
													<span>
														<i class="fa fa-plus hide"></i>
														<i class="fa fa-minus show"></i>
													</span>
												</span>
												{{item.title}}
											</button>
										</h5>
									</div>

									<div :id="'collapseOne-acc16-'+item.id" class="collapse" aria-labelledby="headingOne-acc16-1" data-parent="#accordion-acc16">
										<div class="card-body pt-s3 pb-s3">
											<p v-html="item.description"></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5 col-md-12">
						<div class="mt-s2 mb-s2">
							<div class="mb-s3">
								<h6 class="text-bold-700 text-pink">Question Us</h6>
								<h3 class="text-bold-700 text-dark">Have You Any Question?</h3>
							</div>
							<div class="p-s3 bg-white box-shadow-v1-s3 bs-solid bc-v1-dark bw-s5">
								<form>
									<div class="form-row">
										<div class="form-group col-md-12">
											<input type="text" class="form-control bg-light text-size-12 pt-10 pb-10 pl-15 pr-15 text-bold-600 rounded-0 bc-v1-dark" placeholder="Name">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											<input type="email" class="form-control bg-light text-size-12 pt-10 pb-10 pl-15 pr-15 text-bold-600 rounded-0 bc-v1-dark" placeholder="Email">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											<input type="text" class="form-control bg-light text-size-12 pt-10 pb-10 pl-15 pr-15 text-bold-600 rounded-0 bc-v1-dark" placeholder="Subject">
										</div>
									</div>
									<div class="form-group">
										<textarea class="form-control bg-light text-size-12 pt-10 pb-10 pl-15 pr-15 text-bold-600 rounded-0 bc-v1-dark" rows="5" placeholder="Your Message"></textarea>
									</div>
									<button type="submit" class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-12 pb-12 pl-s3 pr-s3 mt-s1 mb-s1">Submit</button>
								</form>
							</div>
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
				items: [],
				// count: [],
			}
		},
		created(){
			this.getData()
			// this.getCountData()
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
			getData() {
                axios.get('/faqs-active')
                    .then((res) => {
                        this.items = res.data
                    })
            },
            // getCountData() {
            //     axios.get('/faqs-active/count')
            //         .then((res) => {
            //             this.count = res.data
            //         })
            // },
		},
	}
</script>