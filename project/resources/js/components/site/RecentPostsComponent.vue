<template>
	<div>
		<div class="row">
			<div class="col-lg-4 col-md-6" v-for="(item, index) in items" :key="index">
                <div class="mt-s2 mb-s2 bg-white box-shadow-v1-s1 box-shadow-v1-s3--hover">
                    <a :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug"><img class="img-responsive" :src="'/uploads/posts/'+item.avatar" alt="News"></a>
                    <div class="p-s3">
                        <ul class="list-inline text-size-s1 text-bold-600 mb-6">
                            <li class="list-inline-item">
                                by {{item.created_by.profile.first_name}}
                            </li>
                            <li class="list-inline-item text-size-10">|</li>
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
                        <p class="mb-s1" v-html="item.description.substring(0,140)"></p>
                        <div class="mt-20">
                            <a class="btn bg-pink text-white text-bold-600 text-size-12 rounded-0 bs-solid bc-pink bw-s2 box-shadow-v1-s3--hover pt-4 pb-4 pl-12 pr-12" :href="'/blog/'+item.blog_category_setup.slug+'/'+item.slug">Read More <i class="fa fa-long-arrow-alt-right ml-5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
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
                axios.get('/blog-recent-posts')
                    .then((res) => {
                        this.items = res.data
                    })
            },
		},
	}
</script>