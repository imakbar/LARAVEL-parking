<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 m-bottom-20">
                    <button class="btn btn-sm btn-primary" @click="clear()" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus"></i> Add</button>
                </div>
                <div class="col-md-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Role Name
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="group in groups" :key="group.id">
                                <td>
                                    {{group.name}}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal" @click="edit(group.id)">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Group Information</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 m-bottom-25">
                            <label for="">Group Name</label>
                            <input type="text" class="form-control" v-model="record.name">
                        </div>
                        <div v-for="(appmodule, index) in data" :key="index" class="col-md-12 col-sm-12">
                            <div class="card box-shadow-0 border-primary">
                                <div class="card-header card-head-inverse bg-primary">
                                    <h4 class="card-title">{{appmodule.name}}</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <div v-for="(form, index) in appmodule.forms" :key="index" class="col-md-3">
                                            <h6 class="text-uppercase text-bold-600">{{form.name}}</h6>
                                            <ul class="p-left-0 mb-20">
                                                <li v-for="(action, index) in form.actions" :key="index">
                                                    <label>
                                                        <input type="checkbox" :value="action.value" name="actions" v-model="record.actions">
                                                        <i>{{action.name}}</i>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-if="record.id == 0" class="btn btn-success" @click="save()" data-dismiss="modal">Save</button>
                        <button type="button" v-if="record.id != 0" class="btn btn-primary" @click="update()" data-dismiss="modal">update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                modules: [],
                groups: [],
                record: {
                    id: 0,
                    name: "",
                    actions: [],
                }
            }
        },
        created() {
            this.modules = this.data
            this.getGroups()
        },
        methods: {
            getGroups() {
                axios.get("/acl/group/all")
                    .then((res) => {
                        this.groups = res.data
                    })
            },
            save() {
                axios.post("/acl/group/save", this.record)
                    .then((res) => {
                        toastr.success("Group Saved")
                        $("#myModal").hide()
                        this.getGroups()
                        this.clear()
                    })
            },
            update() {
                axios.post("/acl/group/update", this.record)
                    .then((res) => {
                        toastr.success("Group Update")
                        $("#myModal").hide()
                        this.getGroups()
                        this.clear()
                    })
            },
            clear() {
                this.record = {
                    id: 0,
                    name: "",
                    actions: []
                }
            },
            edit(id) {
                axios.get("/acl/group/find/" + id)
                    .then((res) => {
                        this.record = res.data
                        // $("#myModal").show()
                    })
            }
        }
    }
</script>