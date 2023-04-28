<template>
    <div class="card clearfix p-20">
        <div class="">
            <form id="myForm">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group tooltip_error">
                            <label for="icon">Icons</label>
                            <v-select v-model="record.icon" label="name" :options="icons"></v-select>
                            <small v-if="errors.icon != null" class="text-danger text-size-11">
                                <span>
                                    {{errors.icon[0]}}
                                </span>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" required="" ref="name" class="form-control mr-sm-2" v-model="record.name">
                            <small>
                                <span v-if="errors.name != null" class="text-danger">
                                    {{errors.name[0]}}
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
                            <input type="radio" name="status" required="" value="1" v-model="record.status"
                                checked="" class="custom-control-input" id="Active">
                            <label class="custom-control-label" for="Active">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="status" required="" value="0" v-model="record.status"
                                class="custom-control-input" id="InActive">
                            <label class="custom-control-label" for="InActive">InActive</label>
                        </div>
                        </fieldset>
                    </div>
                </div>
                <div>
                    <button type="submit" id="submit" v-if="record.id == 0 && permissions.includes('social-setup-add')" class="btn btn-primary btn-rounded btn-floating" @click.prevent="save()">Save</button>
                    <button type="submit" id="submit" v-if="record.id != 0 && permissions.includes('social-setup-update')" class="btn btn-primary btn-rounded btn-floating" @click.prevent="update()">Update</button>
                    <button type="button" class="btn btn-info btn-rounded btn-floating" @click.prevent="clearForm()">Clear
                        Form</button>
                </div>
            </form>

            <div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type"
                v-if="response.isVisible">
                {{response.message}}
            </div>

            <hr class="dashed">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table-table table table-striped table-bordered thead-inverse dataex-res-configuration bg-white">
                        <thead>
                            <tr>
                                <th width="60">S.No</th>
                                <th width="60" class="text-center">Icon</th>
                                <th>Name</th>
                                <th width="60" class="text-center">Active</th>
                                <th width="90" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            <tr v-for="(item, index) in items" :key="index">
                                <td>{{index + 1}}</td>
                                <td width="60" class="text-center"><i :class="item.icon"></i></td>
                                <td>{{item.name}}</td>
                                <td v-if="item.status == 1" class="text-center">
                                    <i class="zmdi zmdi-check"></i>
                                </td>
                                <td v-if="item.status != 1" class="text-center">
                                    <i class="la la-close"></i>
                                </td>
                                <td class="text-center">
                                    <button v-if="permissions.includes('social-setup-update')" type="button" @click="edit(item.id)" class="btn-pointer btn-warning btn-floating">
                                        <i class="icon-pencil text-size-10 text-white"></i>
                                    </button>
                                    <button v-if="permissions.includes('social-setup-delete')" type="button" @click="recordDelete(item.id)" class="btn-pointer btn-danger btn-floating">
                                        <i class="icon-trash text-size-10 text-white"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['icons_data'],
        data() {
            return {
                record: {
                    id: 0,
                    name: '',
                    icon: '',
                    status: 1,
                },
                response: {
                    type: "success",
                    message: "",
                    isVisible: false
                },
                items: [],
                errors: [],
                permissions: [],
                icons: [],
            }
        },
        created() {
            this.icons = this.icons_data
            this.getPermissions()
            this.getData()
        },

        methods: {
            getPermissions() {
                axios.get('/user/permissions')
                    .then((res) => {
                        this.permissions = res.data
                    })
            },
            save() {
                // var $myForm = $('#myForm');
                axios.post('/social-setup/save', this.record)
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
                        }
                    })
                    .catch((err) => {

                    })
                // } 
                // else console.log("invalid form");

            },
            getData() {
                axios.get('/social-setup-get/all')
                    .then((res) => {
                        this.items = res.data
                    })
            },
            edit(id) {
                axios.get('/social-setup/find/' + id)
                    .then((res) => {
                        this.record = res.data
                    })
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                this.$refs.name.focus();
            },
            update() {
                axios.post('/social-setup/update', this.record)
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

                        }
                    })
            },
            clearForm() {
                this.record = {
                    id: 0,
                    name: '',
                    icon: '',
                    status: 1,
                }
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                this.errors = []
            },
            recordDelete(id) {
                axios.get('/social-setup-delete/' + id)
                    .then((res) => {
                        this.response = {
                            isVisible: true,
                            message: res.data.message,
                            type: 'danger'
                        }
                        this.errors = []
                        this.getData()
                        this.$refs.name.focus();
                    })

            },
        }
    }

</script>
