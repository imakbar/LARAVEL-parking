<template>
    <div>
    	<!-- BREADCRUMB -->
		<section class="bg-pink pt-s3 pb-s3 text-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="d-lg-flex text-center">
							<div class="align-self-center mb-0--lg mb-s1--md mb-s1--sm mb-s1--xs">
								<h3 class="text-bold-400 text-size-s2 m-0 text-white">{{category.title}}</h3>
							</div>
							<div class="ml-auto align-self-center">
								<ol class="breadcrumb d-flex justify-content-center m-0 bg-none text-size-s1 p-0">
									<li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
									<li class="breadcrumb-item"><a class="text-white" href="/blog">Blog</a></li>
									<li class="breadcrumb-item" aria-current="page">{{category.title}}</li>
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
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="match-height d-flex justify-content-center align-items-center">
									<div>
										<img class="img-responsive" :src="'/uploads/posts/'+post.avatar" :alt="post.title">
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="match-height pt-s3 pb-s3 pl-s3--md pl-s3--sm pl-s3--xs pr-s3">
									<ul class="list-inline text-size-s1 text-bold-600 mb-6">
										<li class="list-inline-item" v-if="post.created_by.profile.first_name != null">
											by {{post.created_by.profile.first_name}}
										</li>
										<li class="list-inline-item text-size-10" v-if="post.created_by.profile.first_name != null">|</li>
										<li class="list-inline-item">
											{{fundate(post.created_date)}}
										</li>
										<li class="list-inline-item text-size-10">|</li>
										<li class="list-inline-item">
											<a :href="'/blog/'+category.slug" class="text-dark">
												{{category.title}}
											</a>
										</li>
									</ul>
									<h2 class="text-pink text-size-20 text-bold-600 text-capitalize mb-12">{{post.title}}</h2>
									<p class="m-bottom-s1" v-html="post.description"></p>
								</div>
							</div>
						</div> <!-- /ROW -->

						<hr class="bs-double bc-v1-dark bw-s4 bt-0 bl-0 br-0 mb-50">

						<div class="row">
							<div class="col-md-12">
								<div class="media bg-v5-light animate-parent--hover">
									<a class="mr-s2 pt-s3 pl-s3">
										<img class="w--60 bs-solid bc-white bw-s4" v-if="post.created_by.profile.avatar != null" :src="'/uploads/profiles/sm-'+post.created_by.profile.avatar" :alt="post.created_by.profile.first_name">
									</a>
									<div class="media-body">
										<div class="pt-s3 pb-s3 pr-s3">
											<div class="mb-s1">
												<h6 class="mb-0">{{post.created_by.profile.first_name}}</h6>
												<span class="text-v7-dark text-size-13" v-if="post.created_by.type == 'admin'">Admin</span>
												<span class="text-v7-dark text-size-13" v-if="post.created_by.type != 'admin'">Author</span>
											</div>
											<p class="mb-s2 text-dark" v-html="post.created_by.profile.about_me"></p>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- /ROW -->
						<!-- /AUTHOR -->

						<!-- COMMENTS & COMMENT FORM -->
	                    <blog-comment-form :category="category" :post="this.post" :authcheck="this.authcheck"></blog-comment-form>
	                    <!-- /COMMENTS & COMMENT FORM -->
					</div>
				</div> <!-- /ROW -->
			</div> <!-- /CONTAINER -->
		</section> <!-- /SECTION -->
    </div>
</template>
<script type="text/javascript">
	export default {
        props: ['category','post','authcheck'],
		data(){
			return {
				// items: [],
			}
		},
		created(){
			// this.getData()
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
			// getData(page = 1) {
   //              axios.get('/blog/active/all/?page='+page)
   //                  .then((res) => {
   //                      this.items = res.data
   //                  })
   //          },
		},
	}
</script>