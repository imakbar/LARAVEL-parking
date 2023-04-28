<template>
    <div>
        <div class="owl-carousel owl-theme owl-nav-bg show-nav-title" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 1}, '979': {'items': 1}, '1199': {'items': 1}}, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
            <div v-for="(item, index) in reviews" :key="index">
                <div class="mt-s2 mb-s2 box-shadow-parent--hover">
                    <div>
                        <p class="mb-s1 text-size-s2 font-italic">{{item.comment}}</p>
                    </div>
                    <div class="d-flex mt-s2 ml-20">
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
        </div>
    </div>
</template>
<script type="text/javascript">
    var moment = require('moment');
    export default {
        data(){
            return {
                reviews: [],
            }
        },
        created(){
            this.getReviews()
        },
        methods:{
            getReviews() {
                axios.get('/mini-customer-reviews')
                    .then((res) => {
                        this.reviews = res.data
                    })
            },
        },
    }
</script>