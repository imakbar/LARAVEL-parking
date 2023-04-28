<template>
    <div>
    	<!-- BREADCRUMB -->
		<section class="bg-pink pt-s3 pb-s3 text-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="d-lg-flex text-center">
							<div class="align-self-center mb-0--lg mb-s1--md mb-s1--sm mb-s1--xs">
								<h3 class="text-bold-400 text-size-s2 m-0 text-white">Blog</h3>
							</div>
							<div class="ml-auto align-self-center">
								<ol class="breadcrumb d-flex justify-content-center m-0 bg-none text-size-s1 p-0">
									<li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
									<li class="breadcrumb-item" aria-current="page">Blog</li>
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
					<!-- SIDEBAR -->
					<div class="col-lg-3 col-md-12 col-sm-12">
						<div class="mb-s3">
							<div class="input-group">
								<input type="text" class="form-control bc-v1-dark text-size-s1 br-0" placeholder="Search">
								<div class="input-group-append">
									<button class="btn bg-none text-dark bs-solid bc-v1-dark bl-0" type="button"><i class="icon-magnifier text-size-12"></i></button>
								</div>
							</div>
						</div>
						<recent-posts-max-comments></recent-posts-max-comments>
						<div class="mb-s3">
							<div class="mb-20">
								<h6 class="text-bold-700">Testimonials</h6>
								<hr class="mb-0 bs-double bc-v1-dark bw-s4 bt-0 bl-0 br-0">
							</div>
							<div class="row mt-s2 mb-s2">
								<div class="col-lg-12 col-sm-12">
									<div class="owl-carousel owl-theme owl-nav-bordered owl-nav-circle owl-dots-inside-top-right mt-s1 mb-s1" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 1}, '979': {'items': 1}, '1199': {'items': 1}}, 'margin': 10, 'loop': false, 'nav': false, 'dots': true}">
										<div>
											<div class="mb-s3 box-shadow-parent--hover">
												<div>
													<div class="bg-v5-light bs-solid bc-light bw-s1 pt-s3 pb-s3 pl-s3 pr-s3">
														<p class="mt-s1 mb-s1 font-italic">Donec eleifend, nulla eu dapibus malesuada, nisi elit interdum ipsum, a feugiat est erat nec libero.</p>
													</div>
												</div>
												<div class="d-flex mt-s3 ml-s3">
													<div class="rounded-circle h--45 w--45 mr-s2 d-flex justify-content-center align-items-center box-shadow-v2-s3-child--hover">
														<img class="w-100 rounded-circle bs-solid bc-light bw-s3" src="assets/images/testimonials/user-1.jpg" alt="Testimonials">
													</div>
													<div>									
														<span class="text-bold-600 text-dark d-block">John Doe</span>
														<span class="text-size-s1 text-muted">Google Inc.</span>
													</div>
												</div>
											</div>
										</div>
										<div>
											<div class="mb-s3 box-shadow-parent--hover">
												<div>
													<div class="bg-v5-light bs-solid bc-light bw-s1 pt-s3 pb-s3 pl-s3 pr-s3">
														<p class="mt-s1 mb-s1 font-italic">Donec eleifend, nulla eu dapibus malesuada, nisi elit interdum ipsum, a feugiat est erat nec libero.</p>
													</div>
												</div>
												<div class="d-flex mt-s3 ml-s3">
													<div class="rounded-circle h--45 w--45 mr-s2 d-flex justify-content-center align-items-center box-shadow-v2-s3-child--hover">
														<img class="w-100 rounded-circle bs-solid bc-light bw-s3" src="assets/images/testimonials/user-2.jpg" alt="Testimonials">
													</div>
													<div>									
														<span class="text-bold-600 text-dark d-block">Steve Jobs</span>
														<span class="text-size-s1 text-muted">Supper Inc.</span>
													</div>
												</div>
											</div>
										</div>
										<div>
											<div class="mb-s3 box-shadow-parent--hover">
												<div>
													<div class="bg-v5-light bs-solid bc-light bw-s1 pt-s3 pb-s3 pl-s3 pr-s3">
														<p class="mt-s1 mb-s1 font-italic">Donec eleifend, nulla eu dapibus malesuada, nisi elit interdum ipsum, a feugiat est erat nec libero.</p>
													</div>
												</div>
												<div class="d-flex mt-s3 ml-s3">
													<div class="rounded-circle h--45 w--45 mr-s2 d-flex justify-content-center align-items-center box-shadow-v2-s3-child--hover">
														<img class="w-100 rounded-circle bs-solid bc-light bw-s3" src="assets/images/testimonials/user-3.jpg" alt="Testimonials">
													</div>
													<div>									
														<span class="text-bold-600 text-dark d-block">Mary Jane</span>
														<span class="text-size-s1 text-muted">Apple Inc.</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> <!-- /ROW -->
						</div>
					</div> <!-- /SIDEBAR -->
					<div class="col-lg-9 col-md-12 col-sm-12">
						<div class="row" v-if="count.length > 0">
							<div class="col-lg-12 col-md-12" v-for="(item, index) in items.data" :key="index">
								<div class="mb-s2 bg-v5-light">
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="match-height d-flex justify-content-center align-items-center">
												<div>
													<a :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug"><img class="img-responsive" :src="'/uploads/posts/'+item.avatar" alt="News"></a>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="match-height pt-s3 pb-s3 pl-s3--md pl-s3--sm pl-s3--xs pr-s3">
												<ul class="list-inline text-size-s1 text-bold-600 mb-6">
													<li class="list-inline-item" v-if="item.created_by.profile.first_name != null">
														by {{item.created_by.profile.first_name}}
													</li>
													<li class="list-inline-item text-size-10" v-if="item.created_by.profile.first_name != null">|</li>
													<li class="list-inline-item">
														{{fundate(item.created_date)}}
													</li>
													<li class="list-inline-item text-size-10">|</li>
													<li class="list-inline-item">
														<a :href="'/blog/'+item.blog_category_setup.slug" class="text-dark">
															{{item.blog_category_setup.title}}
														</a>
													</li>
												</ul>
												<h2 class="text-size-20 text-bold-600 text-capitalize mb-12"><a class="text-pink text-dark--hover" :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug">{{item.title}}</a></h2>
												<p class="m-bottom-s1" v-html="item.description.substring(0,140)"></p>
												<div class="mt-20">
													<a class="btn bg-pink text-white text-bold-600 text-size-12 rounded-0 bs-solid bc-pink bw-s2 box-shadow-v1-s3--hover pt-4 pb-4 pl-12 pr-12" :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug">Read More <i class="fa fa-long-arrow-alt-right ml-5"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- /ROW -->
		                <div class="row text-center m-top-100 m-bottom-100" v-else>
		                	<div class="col-md-12">
		                		<h1>No Post Found!</h1>
		                	</div>
		                </div> <!-- /ROW -->
						<!-- /PAGINATION -->
	                    <pagination :data="items" @pagination-change-page="getData" v-if="count.length > 0"></pagination>
	                    <!-- /PAGINATION -->
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
				count: [],
			}
		},
		created(){
			this.getData()
			this.getCountData()
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
			getData(page = 1) {
                axios.get('/blog-active-all/?page='+page)
                    .then((res) => {
                        this.items = res.data
                    })
            },
            getCountData() {
                axios.get('/blog-active-all/count')
                    .then((res) => {
                        this.count = res.data
                    })
            },
		},
	}
</script>