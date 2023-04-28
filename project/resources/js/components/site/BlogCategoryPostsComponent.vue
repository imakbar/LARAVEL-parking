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
				<ul class="row" v-masonry transition-duration="0.3s" item-selector=".item">
					<li v-masonry-tile class="col-lg-4 col-md-6 item" v-for="(item, index) in items.data" :key="index">
						<div class="mt-s2 mb-s2">
							<a :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug"><img class="img-responsive" :src="'/uploads/posts/'+item.avatar" :alt="item.blog_category_setup.title"></a>
							<div class="pt-s3">
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
								<h2 class="text-size-20 text-bold-600 text-capitalize mb-12"><a class="text-dark text-pink--hover" :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug">{{item.title}}</a></h2>
								<p class="mb-s1" v-html="item.description.substring(0,150)"></p>
								<div class="mt-12">
									<a class="text-size-12 text-bold-600 text-dark text-pink--hover" :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug">Read More <i class="fa fa-long-arrow-alt-right ml-5"></i></a>
								</div>
							</div>
						</div>
					</li>
				</ul> <!-- /ROW -->
				<pagination :data="items" @pagination-change-page="getData"></pagination>
			</div> <!-- /CONTAINER -->
		</section> <!-- /SECTION -->
    </div>
</template>
<script>
    export default {
        props: ['category'],
        data() {
            return {
                items: [],
                permissions: [],
            }
        },
        created() {
            this.getPermissions()
            this.getData()
        },

        methods: {
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
            getPermissions() {
                axios.get('/user/permissions')
                    .then((res) => {
                        this.permissions = res.data
                    })
            },
            getData(page = 1) {
                axios.get('/blog-category-posts-active-get/all/'+this.category.slug+'/?page='+page)
                    .then((res) => {
                        this.items = res.data
                    })
            },
        }
    }

</script>