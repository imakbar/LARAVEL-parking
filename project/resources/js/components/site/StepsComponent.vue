<template>
	<div>
		<div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12" v-for="(step, index) in steps" :key="index">
                <div class="mt-s2 mb-s2 mb-60--md mb-60--sm mb-60--xs box-shadow-parent--hover mt--parent--hover">
                    <div class="bg-white text-center pt-s4 bs-solid bc-light bw-s1 position-relative">
                        <div class="hero-section-container-tl w-100 mt--s4 mt--s5-child">
                            <img class="w--100 rounded-circle bs-solid bc-white bw-s5 box-shadow-v2-s3-child--hover" :src="'/uploads/steps/'+step.avatar" :alt="step.title">
                        </div>
                        <div class="p-s2 mt-s2 mb-s2">
                            <span class="text-pink text-bold-600">{{step.short_title}}</span>
                            <h5 class="mt-s1 mb-0 text-bold-600">{{step.title}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /ROW -->
	</div>
</template>
<script type="text/javascript">
    export default {
        data(){
            return {
                steps: [],
            }
        },
        created(){
            this.getStepsData()
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
            getStepsData() {
                axios.get('/steps-active')
                    .then((res) => {
                        this.steps = res.data
                    })
            },
        },
    }
</script>