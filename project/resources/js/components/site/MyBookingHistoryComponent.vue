<template>
	<div class="tab-padding-0">
		<b-tabs pills card>
            <b-tab class="nav-link" title="Scheduled">
                <div v-if="this.orders.filter(item=>item.order_status != 'completed').length > 0">
                    <table class="table table-bordered text-size-11">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th width="60">S.No</th>
                                <th>Parking At</th>
                                <th class="text-center" width="70">Amount</th>
                                <th width="70">Reference#</th>
                                <th>Drop off <i class="icon-calendar"></i></th>
                                <th>Arrival <i class="icon-calendar"></i></th>
                                <th class="text-center" width="50">Days</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th width="60" class="text-center">Status</th>
                                <!-- <th width="90" class="text-center">Action</th> -->
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            <tr v-for="(item, index) in this.orders.filter(item=>item.order_status != 'completed')" :key="index">
                                <td>{{index + 1}}</td>
                                <td>{{item.parking.title}}</td>
                                <td class="text-center">${{item.amount}}</td>
                                <td>{{item.reference_no}}</td>
                                <td>
                                    {{ item.drop_off_date | moment("DD, MMM YYYY") }} <br>
                                    {{item.drop_off_hour}}:{{item.drop_off_minute}}
                                </td>
                                <td>
                                    {{ item.arrival_date | moment("DD, MMM YYYY") }} <br>
                                    {{item.arrival_hour}}:{{item.arrival_minute}}
                                </td>
                                <td class="text-center">{{item.days}}</td>
                                <td>{{item.email}}</td>
                                <td>{{item.first_name}} {{item.last_name}}</td>
                                <td>{{item.mobile_number}}</td>
                                <td>

                                    <span v-if="item.order_status == 'up-coming'">
                                        <span class="badge badge-pill badge-primary border-0">
                                            Up-Coming
                                        </span>
                                        <!-- <span class="badge badge-pill badge-warning">
                                            {{isUpDate(item.drop_off_date,item.drop_off_hour,item.drop_off_minute)}}
                                        </span> -->
                                        <!-- <div class="sm-countdown mt-10 d-block">
<div>{{isUpDate(item.drop_off_date)}}</div>
{{currentDate}}
{{dateSplit(item.drop_off_date)}}
<div v-if="dateSplit(item.drop_off_date) >= currentDate">
<Countdown :end="item.drop_off_date"></Countdown>
</div>
                                        </div> -->
                                    </span>

                                    <span v-if="item.order_status == 'taken'">
                                        <span class="badge badge-pill badge-primary border-0">
                                            Out-Going
                                        </span>
                                        <!-- <span class="badge badge-pill badge-warning">
                                            {{isUpDate(item.arrival_date,item.arrival_hour,item.arrival_minute)}}
                                        </span> -->
                                        <!-- <div class="sm-countdown mt-10 d-block">
<Countdown :end="dFormat(item.arrival_date,item.arrival_hour,item.arrival_minute)"></Countdown>
<div>{{isUpDate(item.arrival_date)}}</div>
<Countdown :end="item.arrival_date" v-if="dateSplit(item.arrival_date) >= currentDate"></Countdown>
                                        </div> -->
                                    </span>

                                    <span class="badge badge-pill badge-success" v-if="item.order_status == 'completed'">
                                        Completed
                                    </span>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pt-50 pb-30" v-if="this.orders.filter(item=>item.order_status != 'completed').length == 0">
                    <div class="text-center">
                        <i class="zmdi zmdi-calendar text-light text-size-100 mt-30 mb-30"></i>
                        <h4>You don't have any booking</h4>
                    </div>
                </div>
            </b-tab>
            <b-tab class="nav-link" title="History">
                <table class="table table-bordered text-size-11">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th width="60">S.No</th>
                            <th>Parking At</th>
                            <th class="text-center" width="70">Amount</th>
                            <th width="70">Reference#</th>
                            <th>Drop off <i class="icon-calendar"></i></th>
                            <th>Arrival <i class="icon-calendar"></i></th>
                            <th class="text-center" width="50">Days</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th width="60" class="text-center">Status</th>
                            <!-- <th width="90" class="text-center">Action</th> -->
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        <tr v-for="(item, index) in this.orders.filter(item=>item.order_status == 'completed')" :key="index">
                            <td>{{index + 1}}</td>
                            <td>{{item.parking.title}}</td>
                            <td class="text-center">${{item.amount}}</td>
                            <td>{{item.reference_no}}</td>
                            <td>
                                {{ item.drop_off_date | moment("DD, MMM YYYY") }} <br>
                                {{item.drop_off_hour}}:{{item.drop_off_minute}}
                            </td>
                            <td>
                                {{ item.arrival_date | moment("DD, MMM YYYY") }} <br>
                                {{item.arrival_hour}}:{{item.arrival_minute}}
                            </td>
                            <td class="text-center">{{item.days}}</td>
                            <td>{{item.email}}</td>
                            <td>{{item.first_name}} {{item.last_name}}</td>
                            <td>{{item.mobile_number}}</td>
                            <td>

                                <span v-if="item.order_status == 'up-coming'">
                                    <span class="badge badge-pill badge-primary border-0">
                                        Up-Coming
                                    </span>
                                    <!-- <span class="badge badge-pill badge-warning">
                                        {{isUpDate(item.drop_off_date,item.drop_off_hour,item.drop_off_minute)}}
                                    </span> -->
                                </span>

                                <span v-if="item.order_status == 'taken'">
                                    <span class="badge badge-pill badge-primary border-0">
                                        Out-Going
                                    </span>
                                    <!-- <span class="badge badge-pill badge-warning">
                                        {{isUpDate(item.arrival_date,item.arrival_hour,item.arrival_minute)}}
                                    </span> -->
                                </span>

                                <span class="badge badge-pill badge-success" v-if="item.order_status == 'completed'">
                                    Completed
                                </span>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </b-tab>
        </b-tabs>
	</div>
</template>
<script type="text/javascript">
    var moment = require('moment');
    export default {
        props: ['orders'],
        data(){
            return {
            	// 
            }
        },
        created(){
        	// 
        },
        methods:{
            // dFormat(date, hours, minutes){
            //     // return moment(drop_off_date).format('MMMM DD, YYYY')
            //     var full_date = moment(date+hours+minutes, 'YYYY MM DD h:mm:ss');
            //     return moment(new Date(full_date)).format('YYYY MM DD h:mm:ss');
            // },
            dateSplit(date){
                var date = moment(new Date(date), 'YYYY MM DD').format('YYYY MM DD');
                return date;
            },
            isUpDate(date){
                var now = moment(new Date());
                var full_date = moment(new Date(date), 'YYYY MM DD');
                var xDuration = full_date.diff(now, 'days');
                var days = full_date.diff(now);
                var duDays = moment.duration(days);
                // alert(xDuration);
                if(xDuration == 0){
                    return 'Today' +' '+ duDays.asHours().toFixed(0) + ' Hours';
                }
                else if(xDuration == 1)
                {
                    return moment(new Date(duDays.asDays())) + ' Day';
                }
                else
                {
                    return moment(new Date(duDays.asDays())) + ' Days';
                }
            },
            
        },
        computed: {
            currentDate: function(){
                var currentDate = moment(new Date(), 'DD/MM/YYYY').format('YYYY MM DD');
                return currentDate;
            },
        }
    }
</script>