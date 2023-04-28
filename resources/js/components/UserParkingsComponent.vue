<template>
    <div>
        <header class="page-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h1 class="separator">User Parkings</h1>
                    <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="icon dripicons-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Parkings</li>
                        </ol>
                    </nav>
                </div>
                <div class="actions top-right">
                    <a class="btn btn-primary btn-floating btn-rounded text-white" @click.prevent="addForm()" v-if="record.add_form != 1 && record.id == 0">Add</a>
                </div>
            </div>
        </header>
        <section class="page-content container-fluid">
            <div class="card clearfix p-20">
                <div class="">
                    <form id="myForm">
                        <div class="m-bottom-25" v-if="record.id == 0 && record.add_form == 0">
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="submit" id="submit" class="btn btn-info btn-rounded btn-floating" @click.prevent="clearForm(); clearFormData()">Clear</button>
                                            <button type="submit" id="submit" class="btn btn-success btn-rounded btn-floating" @click.prevent="searchData()">Search</button>
                                        </div>
                                        <input type="text" required="" id="name" class="form-control" v-model="search.name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="record.id != 0 || record.add_form == 1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
										<label>User</label>
										<select v-model="record.user_id" class="form-control rounded-0 bg-light-5 text-size-14">
											<option v-for="(user, index) in users" :key="index" :value="user.id">{{user.email}}</option>
										</select>
										<small v-if="errors.user_id != null" class="text-danger text-size-11">
											<span>
												{{errors.user_id[0]}}
											</span>
										</small>
									</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
										<label>Parking</label>
										<select v-model="record.parking_id" class="form-control rounded-0 bg-light-5 text-size-14">
											<option v-for="(parking, index) in parkings" :key="index" :value="parking.id">{{parking.title}}</option>
										</select>
										<small v-if="errors.parking_id != null" class="text-danger text-size-11">
											<span>
												{{errors.parking_id[0]}}
											</span>
										</small>
									</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <fieldset>
                                    <label class="m-right-20">
                                        Status:
                                    </label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="status" required="" value="1" v-model="record.status" checked="" class="custom-control-input" id="Active">
                                        <label class="custom-control-label" for="Active">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="status" required="" value="0" v-model="record.status" class="custom-control-input" id="InActive">
                                        <label class="custom-control-label" for="InActive">InActive</label>
                                    </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div>
                                <button type="submit" id="submit" v-if="record.id == 0 && permissions.includes('user-parkings-add')" class="btn btn-success btn-rounded btn-floating" @click.prevent="save()">Save</button>
                                <button type="submit" id="submit" v-if="record.id != 0 && permissions.includes('user-parkings-update')" class="btn btn-primary btn-rounded btn-floating" @click.prevent="update()">Update</button>
                                <button type="button" class="btn btn-info btn-rounded btn-floating" @click.prevent="clearForm()">Clear Form</button>
                            </div>
                        </div>
                    </form>

                    <div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type"
                        v-if="response.isVisible">
                        {{response.message}}
                    </div>

                    <div class="row" v-if="record.id == 0 && record.add_form == 0">
                        <div class="col-md-12 table-responsive">
                            <table class="table-table table table-striped table-bordered thead-inverse dataex-res-configuration bg-white">
                                <thead>
                                    <tr>
                                        <th width="60">S.No</th>
                                        <th>Email</th>
                                        <th>Parking</th>
                                        <th width="60" class="text-center">Status</th>
                                        <th width="90" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-striped">
                                    <tr v-for="(item, index) in items.data" :key="index">
                                        <td width="60">{{index + 1}}</td>
                                        <td>{{item.user.email}}</td>
                                        <td>{{item.parking.title}}</td>
                                        <td width="60" v-if="item.status == 1" class="text-center">
                                            <i class="zmdi zmdi-check"></i>
                                        </td>
                                        <td width="60" v-if="item.status != 1" class="text-center">
                                            <i class="la la-close"></i>
                                        </td>
                                        <td width="90" class="text-center">
                                            <button v-if="permissions.includes('user-parkings-update')" type="button" @click="edit(item.id)" class="btn-pointer btn-warning btn-floating">
                                                <i class="icon-pencil text-size-10 text-white"></i>
                                            </button>
                                            <button v-if="permissions.includes('user-parkings-delete')" type="button" @click="recordDelete(item.id)" class="btn-pointer btn-danger btn-floating">
                                                <i class="icon-trash text-size-10 text-white"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <pagination v-if="search.name == null" :data="items" @pagination-change-page="getData"></pagination>
                            <pagination v-if="search.name != null" :data="items" @pagination-change-page="searchData"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                record: {
                    id: 0,
					user_id: '',
					parking_id: '',
                    status: 1,

                    add_form: 0,
                },
                response: {
                    type: "success",
                    message: "",
                    isVisible: false
                },
                search: {
                    name: '',
                },
                items: {},
                errors: [],
                permissions: [],
                users: [],
                parkings: [],
            }
        },
        created() {
            this.getPermissions()
            this.getData()
            this.getUsers()
            this.getParkings()
        },

        methods: {
            addForm() {
                this.record.add_form = 1;
                this.response = {
                    isVisible: false,
                }
                // this.$refs.name.focus();
            },
            getPermissions() {
                axios.get('/user/permissions')
                    .then((res) => {
                        this.permissions = res.data
                    })
            },
            save() {
                axios.post('/user-parkings/save', this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                            this.errors = res.data.errors,
                                this.response = {
                                    isVisible: false,
                                }
                        } else {
                            this.clearForm()
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success'
                            }
                            this.errors = []
                            this.getData()
                            setTimeout(() => this.clearForm(), 1000);
                        }
                    })
                    .catch((err) => {})
            },
            getData(page = 1) {
                axios.get('/user-parkings-get/all/?page='+page)
                    .then((res) => {
                        this.items = res.data
                    })
            },
            searchData(page = 1) {
                axios.post('/user-parkings/search/?page='+page, this.search)
                    .then((res) => {
                        this.items = res.data
                    })
            },
            edit(id) {
                axios.get('/user-parkings/find/' + id)
                    .then((res) => {
                        this.record = res.data
                        this.record.status = res.data.profile.status
                        this.record.add_form = 0;
                    })
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                // this.$refs.name.focus();
            },
            update() {
                axios.post('/user-parkings/update', this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                            this.errors = res.data.errors
                            this.response = {
                                isVisible: false
                            }
                        } else {
                            this.clearForm()
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success'
                            }
                            this.errors = []
                            this.getData()
                            setTimeout(() => this.clearForm(), 1000);
                        }
                    })
            },
            clearForm() {
                this.record = {
                    id: 0,
					user_id: '',
					parking_id: '',
                    status: 1,

                    add_form: 0,
                }
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                this.errors = []
                this.search = {
                    name: '',
                }
            },
            clearFormData() {
                this.items.data = this.getData()
            },
            recordDelete(id) {
                axios.get('/user-parkings-delete/' + id)
                    .then((res) => {
                        this.response = {
                            isVisible: true,
                            message: res.data.message,
                            type: 'danger'
                        }
                        this.errors = []
                        this.getData()
                        setTimeout(() => this.clearForm(), 1000);
                    })
            },
            getUsers() {
                axios.get('/users-get-active/all')
                    .then((res) => {
                        this.users = res.data
                    })
            },
            getParkings() {
                axios.get('/parkings-get-active/all')
                    .then((res) => {
                        this.parkings = res.data
                    })
            },
        }
    }

</script>
