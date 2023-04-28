<template>
    <div>
        <!-- BREADCRUMB -->
        <section class="bg-pink pt-s3 pb-s3 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-lg-flex text-center">
                            <div class="align-self-center mb-0--lg mb-s1--md mb-s1--sm mb-s1--xs">
                                <h3 class="text-bold-400 text-size-s2 m-0 text-white">Review</h3>
                            </div>
                            <div class="ml-auto align-self-center">
                                <ol class="breadcrumb d-flex justify-content-center m-0 bg-none text-size-s1 p-0">
                                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Review</li>
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
                    <div class="col-md-12">
                    	<fieldset class="bs-dotted bc-dark bw-s1 p-20">
                    		<legend class="w-auto">Please Rate Us</legend>
	                    	<div class="rateit">
		                    	<div class="stars">
							        <input type="radio" name="star" v-model="record.rating" :value="1" class="star-1" id="star-1" />
							        <label class="star-1" for="star-1">1</label>
							        <input type="radio" name="star" v-model="record.rating" :value="2" class="star-2" id="star-2" />
							        <label class="star-2" for="star-2">2</label>
							        <input type="radio" name="star" v-model="record.rating" :value="3" class="star-3" id="star-3" />
							        <label class="star-3" for="star-3">3</label>
							        <input type="radio" name="star" v-model="record.rating" :value="4" class="star-4" id="star-4" />
							        <label class="star-4" for="star-4">4</label>
							        <input type="radio" name="star" v-model="record.rating" :value="5" class="star-5" id="star-5" />
							        <label class="star-5" for="star-5">5</label>
							        <span></span>
							    </div>
								<small v-if="errors.rating != null" class="text-danger text-size-11">
									<span>
										{{errors.rating[0]}}
									</span>
								</small>
						    </div>
						</fieldset>
                    	<div class="form-group">
							<label class="text-size-12 text-bold-500">Comment</label>
							<textarea type="email" v-model="record.comment" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark"></textarea>
							<small v-if="errors.comment != null" class="text-danger text-size-11">
								<span>
									{{errors.comment[0]}}
								</span>
							</small>
						</div>
                    </div>
                </div> <!-- /ROW -->
                <button class="btn bg-pink text-white text-shadow-s1 text-uppercase text-bold-600 text-size-s1 rounded-0 pt-8 pb-8 pl-20 pr-20 box-shadow-v1-s3--hover mt-30" @click.prevent="save()">Submit</button>

				<div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type"
                        v-if="response.isVisible">
                    {{response.message}}
                </div>
            </div> <!-- /CONTAINER -->
        </section> <!-- /SECTION -->

    </div>
</template>
<script type="text/javascript">
    export default {
    	props: ['review'],
        data(){
            return {
            	record: {
            		id: 0,
            		rating: '',
            		comment: '',
            	},
                // items: [],
                errors: [],
                response: {
                    type: "success",
                    message: "",
                    isVisible: false
                },
            }
        },
        created(){
            // this.getData()
        },
        methods:{
            save() {
                axios.post('/review/'+this.review.order_id+'/'+this.review.reference_no+'/'+this.review.token, this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                            this.errors = res.data.errors,
                                this.response = {
                                    isVisible: false,
                                }
                        } else {
                            // this.clearForm()
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success'
                            }
                            setTimeout(() => this.clearForm(), 1000);
                            setTimeout(() => window.location.reload(), 1);
                        }
                    })
                    .catch((err) => {})
            },
            // getData() {
            //     axios.get('/faqs-active')
            //         .then((res) => {
            //             this.items = res.data
            //         })
            // },
        },
    }
</script>