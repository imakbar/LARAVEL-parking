<template>
	<div>
		<div class="modal fade" :id="'taken-remarks'+order.id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<button type="button" class="close btn-primary text-white site_model_close_btn bg-danger" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="modal-body">

			        	<div class="row">
			        		<div class="col-md-12">
			        			<h3>Remarks</h3>
			        		</div>
			        		<div class="col-md-12">
			        			<div class="form-group">
				        			<textarea v-model="record.taken_remarks" class="form-control bg-light text-size-12 pt-8 pb-8 pl-20 pr-20 text-bold-600 rounded-0 bc-v1-dark"></textarea>
			        			</div>
								<small v-if="errors.taken_remarks != null" class="text-danger text-size-11">
									<span>
										{{errors.taken_remarks[0]}}
									</span>
								</small>
			        		</div>
			        	</div>

			        	<div class="mt-20">
			        		<button class="btn btn-primary" @click.prevent="save()">Save</button>
			        	</div>

						<div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type"
		                        v-if="response.isVisible">
		                    {{response.message}}
		                </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default{
        props: ['order'],
		data(){
            return {
            	record: {
            		id: this.order.id,
            		taken_remarks: '',
            	},
            	errors: [],
                response: {
                    type: "success",
                    message: "",
                    isVisible: false,
                },
            }
		},
		created(){
            // this.getRatings()
        },
		methods: {
			save(){
				axios.post('/order-taken-remarks', this.record)
					.then((res) => {
                        if (res.data.success == false) {
                            	this.errors = res.data.errors,
                                this.response = {
                                    isVisible: false,
                                }
                        } else {
                            // this.clearForm()
                        	this.record.booking_edit = 1,
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success'
                            },
                			this.errors = []
                			// this.$modal.hide(this.$parent.name)
                            // setTimeout(() => this.clearForm(), 1000);
                            // setTimeout(() => window.location.reload(), 1);
                        }	
					})
			},
            clearForm() {
                this.record = {
            		id: this.order.id,
            		taken_remarks: '',
                }
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                this.errors = []
            },
            // getRatings() {
            //     axios.get('/ratings')
            //         .then((res) => {
            //             this.ratings = res.data
            //         })
            // },
		}
	}
</script>