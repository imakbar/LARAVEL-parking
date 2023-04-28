<template>
	<div>
		<div class="modal fade modal-xl order-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-dialog modal_xl" role="document">
				<div class="modal-content">
					<button type="button" class="close btn-primary text-white site_model_close_btn bg-danger" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="modal-body">

			        	<div class="row tab-padding-0">
			        		<div class="col-md-12">
                                <b-tabs pills card>
                                    <b-tab class="nav-link" title="Booking Details">
                                        <table width="100%" cellspacing="0" cellpadding="10">
                                          <tr style="background: #ef0880;">
                                            <th style="text-align: center; color:#fff;" colspan="2">Booking Details</th>
                                          </tr>
                                          <tr style="background: #fafafa;">
                                            <th width="160" style="text-align: left;">Location:</th>
                                            <!-- <td>{{order.airport.name}}</td> -->
                                          </tr>
                                          <tr>
                                            <th style="text-align: left;">Drop-Off Date Time:</th>
                                            <td>
                                                {{order.drop_off_date}}
                                                at 
                                                {{order.drop_off_hour}}:{{order.drop_off_minute}}
                                            </td>
                                          </tr>
                                          <tr style="background: #fafafa;">
                                            <th style="text-align: left;">Pick-Up Date Time:</th>
                                            <td>
                                                {{order.arrival_date}} 
                                                at 
                                                {{order.arrival_hour}}:{{order.arrival_minute}}
                                            </td>
                                          </tr>
                                          <tr>
                                            <th style="text-align: left;">Days:</th>
                                            <td>{{order.days}}</td>
                                          </tr>
                                          <tr style="background: #fafafa;">
                                            <th style="text-align: left;">Booking Quote:</th>
                                            <td style="font-size: 18px;">${{order.amount}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align: left;">Promo Code:</th>
                                            <td>None</td>
                                          </tr>
                                        </table>
                                    </b-tab>
                                    <b-tab class="nav-link" title="User Information">
                                        <table width="100%" cellspacing="0" cellpadding="10">
                                          <tr style="background: #ef0880;">
                                            <th style="text-align: center; color:#fff;" colspan="2">User Information</th>
                                          </tr>
                                          <tr style="background: #fafafa;">
                                            <th width="160" style="text-align: left;">Email:</th>
                                            <td>{{order.email}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align: left;">Title:</th>
                                            <td>{{order.title.title}}</td>
                                          </tr>
                                          <tr style="background: #fafafa;">
                                            <th style="text-align: left;">First Name:</th>
                                            <td>{{order.first_name}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align: left;">Last Name:</th>
                                            <td>{{order.last_name}}</td>
                                          </tr>
                                          <tr style="background: #fafafa;">
                                            <th style="text-align: left;">Mobile Number:</th>
                                            <td>{{order.mobile_number}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align: left;">Post Code:</th>
                                            <td>{{order.post_code}}</td>
                                          </tr>
                                        </table>
                                    </b-tab>
                                    <b-tab class="nav-link" title="Travel Details">
                                        <table width="100%" cellspacing="0" cellpadding="10">
                                          <tr style="background: #ef0880;">
                                            <th style="text-align: center; color:#fff;" colspan="2">Travel Details</th>
                                          </tr>
                                          <tr>
                                            <th width="160" style="text-align: left;">Know travel detail?</th>
                                            <td>{{order.know_travel_detail == 0? 'No':'Yes'}}</td>
                                          </tr>
                                          <tr v-if="order.know_travel_detail == 1" style="background: #fafafa;">
                                            <th style="text-align: left;">Depart Terminal:</th>
                                            <td>{{order.depart_terminal.title}}</td>
                                          </tr>
                                          <tr v-if="order.know_travel_detail == 1">
                                            <th style="text-align: left;">Outbound Flight:</th>
                                            <td>{{order.outbound_flight}}</td>
                                          </tr>
                                          <tr v-if="order.know_travel_detail == 1" style="background: #fafafa;">
                                            <th style="text-align: left;">Arrival Terminal:</th>
                                            <td>{{order.arrival_terminal.title}}</td>
                                          </tr>
                                          <tr v-if="order.know_travel_detail == 1">
                                            <th style="text-align: left;">Inbound Flight:</th>
                                            <td>{{order.inbound_flight}}</td>
                                          </tr>
                                        </table>
                                    </b-tab>
                                    <b-tab class="nav-link" title="Vehicle Details">
                                        <table width="100%" cellspacing="0" cellpadding="10">
                                          <tr style="background: #ef0880;">
                                            <th style="text-align: center; color:#fff;" colspan="2">Vehicle Details</th>
                                          </tr>
                                          <tr>
                                            <th width="160" style="text-align: left;">Know Vehicle Details?</th>
                                            <td>{{order.know_vehical_detail == 0? 'No':'Yes'}}</td>
                                          </tr>
                                          <tr v-if="order.know_vehical_detail == 1" style="background: #fafafa;">
                                            <th style="text-align: left;">Make:</th>
                                            <td>{{order.make}}</td>
                                          </tr>
                                          <tr v-if="order.know_vehical_detail == 1">
                                            <th style="text-align: left;">Model:</th>
                                            <td>{{order.model}}</td>
                                          </tr>
                                          <tr v-if="order.know_vehical_detail == 1" style="background: #fafafa;">
                                            <th style="text-align: left;">Colour:</th>
                                            <td>{{order.colour}}</td>
                                          </tr>
                                          <tr v-if="order.know_vehical_detail == 1">
                                            <th style="text-align: left;">Registration:</th>
                                            <td>{{order.registration}}</td>
                                          </tr>
                                        </table>
                                    </b-tab>
                                </b-tabs>
			        		</div>
			        	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default{
        props: ['orderid'],
		data(){
            return {
            	record: {
            		// id: this.orderid.id,
            	},
                order: {}
            }
		},
		created(){
            this.getOrder()
        },
		methods: {
            getOrder() {
                axios.get('/order/'+this.orderid)
                    .then((res) => {
                        this.order = res.data
                    })
            },
		}
	}
</script>