<template>
	<div>
		<h4>Customer Reviews</h4>
		<div class="bs-dashed bc-v1-dark bw-s1 p-18 rounded-s2 bg-v6-light p-18 mb-12" v-for="(order, index) in parking.orders" :key="index" v-if="order.review.completed_at != null">
			<div class="row">
				<div class="col-md-3 text-center">
					<div>{{order.first_name}} {{order.last_name}}</div>
					<div v-if="order.review.rating == 1">
						<div class="star-rating star-rating-s3 text-pink mb-8 mt-15 m-auto" v-b-tooltip.hover title="1 Start">
							<span class="w-20"></span>
						</div>
						<span>Rating {{order.review.rating}} / 5</span>
					</div>
					<div v-if="order.review.rating == 2">
						<div class="star-rating star-rating-s3 text-pink mb-8 mt-15 m-auto" v-b-tooltip.hover title="2 Start">
							<span class="w-40"></span>
						</div>
						<span>Rating {{order.review.rating}} / 5</span>
					</div>
					<div v-if="order.review.rating == 3">
						<div class="star-rating star-rating-s3 text-pink mb-8 mt-15 m-auto" v-b-tooltip.hover title="3 Start">
							<span class="w-60"></span>
						</div>
						<span>Rating {{order.review.rating}} / 5</span>
					</div>
					<div v-if="order.review.rating == 4">
						<div class="star-rating star-rating-s3 text-pink mb-8 mt-15 m-auto" v-b-tooltip.hover title="4 Start">
							<span class="w-80"></span>
						</div>
						<span>Rating {{order.review.rating}} / 5</span>
					</div>
					<div v-if="order.review.rating == 5">
						<div class="star-rating star-rating-s3 text-pink mb-8 mt-15 m-auto" v-b-tooltip.hover title="5 Start">
							<span class="w-100"></span>
						</div>
						<span>Rating {{order.review.rating}} / 5</span>
					</div>
				</div>
				<div class="col-md-9">
					<div>
						{{order.review.comment}}
					</div>
					<div class="row text-size-12 pt-10 mt-10">
						<div class="col-md-6">Confirmed Purchase: {{ order.created_at | moment("DD, MMMM YYYY") }}</div>
						<div class="col-md-6 text-right text-left--xs text-left--sm">Reviewed: {{ order.review.completed_at | moment("DD, MMMM YYYY") }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
    var moment = require('moment');
    export default {
        props: ['parking'],
        data(){
            return {
            	// record: {
            	// 	id: 0,
            	// },
            }
        },
        created(){
            // this.getParkingData()
        },
        methods:{
            // getParkingData() {
            // 	// alert(this.recorddata.mybookparking_id);
            //     axios.get('/parking/get/'+this.recorddata.mybookparking_id)
            //         .then((res) => {
            //             this.parking = res.data
            //         })
            //         // this.$refs['email'].focus();
            // },
        },
        computed: {
    //         totalDays: function(){
	   //      	var a = moment(new Date(this.parkingrecorddata.drop_off_date), 'DD/MM/YYYY');
				// var b = moment(new Date(this.parkingrecorddata.arrival_date), 'DD/MM/YYYY');
				// var days = b.diff(a, 'days');
    //             return days;
    //         },
        }
    }
</script>