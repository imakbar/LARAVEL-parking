<template>
    <div>
    	<!-- BREADCRUMB -->
		<section class="bg-pink pt-s3 pb-s3 text-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="d-lg-flex text-center">
							<div class="align-self-center mb-0--lg mb-s1--md mb-s1--sm mb-s1--xs">
								<h3 class="text-bold-400 text-size-s2 m-0 text-white">{{page.title}}</h3>
							</div>
							<div class="ml-auto align-self-center">
								<ol class="breadcrumb d-flex justify-content-center m-0 bg-none text-size-s1 p-0">
									<li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
									<li class="breadcrumb-item" aria-current="page">{{page.title}}</li>
								</ol>
							</div>
						</div>
					</div>
				</div> <!-- ROW -->
			</div> <!-- /CONTAINER -->
		</section> <!-- /SECTION -->
		<!-- /BREADCRUMB -->

		<section class="bg-white pt-100 pb-s1">
			<div class="container">
				<steps></steps>
			</div> <!-- /CONTAINER -->
		</section> <!-- /SECTION -->

		<section class="bg-white pt-s5 pb-s5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<p v-html="page.description"></p>
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
				page: [],
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
                axios.get('/page/how-it-works')
                    .then((res) => {
                        this.page = res.data
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