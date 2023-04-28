<template>
	<div>
		<div class="mb-s3">
			<div class="mb-20">
				<h6 class="text-bold-700">Recent Posts</h6>
				<hr class="mb-0 bs-double bc-v1-dark bw-s4 bt-0 bl-0 br-0">
			</div>
			<ul>
				<li v-for="(item, index) in items" :key="index">
					<div class="mb-s2">
						<div class="d-flex">
							<div class="mr-s2">
								<a :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug"><img class="w--70 img-responsive" :src="'/uploads/posts/xs-'+item.avatar" alt="News"></a>
							</div>
							<div>
								<h6 class="text-bold-600 text-size-15"><a class="text-dark text-pink--hover" :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug">{{item.title}}</a></h6>
								<ul class="list-inline text-size-10 text-bold-600 text-v5-dark mt-s1">
									<li class="list-inline-item">
										<i class="icon-clock"></i> &nbsp;{{fundate(item.created_date)}}
									</li>
									<li class="list-inline-item text-size-10">/</li>
									<li class="list-inline-item">
										<i class="icon-bubbles"></i>
										<a class="text-v5-dark text-pink--hover" :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug">{{item.blog_comments.length}}</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<hr class="bs-dashed bc-v1-dark">
				</li>
			</ul>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default {
		data(){
			return {
				items: [],
			}
		},
		created(){
			this.getData()
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
                axios.get('/blog-recent-posts-max-comments')
                    .then((res) => {
                        this.items = res.data
                    })
            },
		},
	}
</script>