<template>
	<div>
		<div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12" v-for="(service, index) in services" :key="index">
                <div class="mt-s2 mb-s2 box-shadow-parent--hover">
                    <div class="d-flex align-items-center mb-s2">
                        <div class="mr-s2">
                            <div class="text-size-s1 rounded-s3 bg-pink text-white text-center h--40 w--40 d-flex justify-content-center align-items-center box-shadow-v2-s3-child--hover">
                                <i :class="service.icon"></i>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-size-18 text-bold-600 m-0">{{service.title}}</h2>
                        </div>
                    </div>
                    <p class="m-0" v-html="service.description.substring(0,130)"></p>
                </div>
            </div>
        </div> <!-- /ROW -->
	</div>
</template>
<script type="text/javascript">
    export default {
        data(){
            return {
                services: [],
            }
        },
        created(){
            this.getservicesData()
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
            getservicesData() {
                axios.get('/services-active')
                    .then((res) => {
                        this.services = res.data
                    })
            },
        },
    }
</script>