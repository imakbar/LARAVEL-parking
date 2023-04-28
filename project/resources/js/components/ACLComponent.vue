<template>
    <div class="row">
        <div class="col-md-6 m-bottom-20">
            <label for="" class="text-bold-600">Employee</label>
            <select @change="loadRights()" name="" id="" class="form-control" v-model="record.user_id">
                <option value="0">-- Select User --</option>
                <option :value="user.id" v-for="user in users" :key="user.id">{{user.email}}</option>
            </select>
        </div>
        <div class="col-md-6 m-bottom-20">
            <label for="" class="text-bold-600">Group</label>
            <select @change="overwrite()" name="" id="" class="form-control" v-model="groupid">
                <option value="0">-- Select Group --</option>
                <option :value="group.id" v-for="group in groups" :key="group.id">{{group.name}}</option>
            </select>
        </div>

        <div class="col-lg-12" v-if="record.user_id != 0" v-for="(appmodule, index) in data" :key="index">
            <div class="card">
                <div class="card-header">{{appmodule.name}}
                    <!-- <ul class="actions top-right">
                        <li><a href="javascript:void(0)" data-q-action="card-collapsed"><i class="icon dripicons-chevron-down"></i></a></li>
                        <li><a href="javascript:void(0)" data-q-action="card-expand"><i class="icon dripicons-expand-2"></i></a></li>
                    </ul> -->
                </div>
                <div class="card-body block-el row">
                    <div v-for="(form, index) in appmodule.forms" :key="index" class="col-md-3">
                        <h6 class="text-uppercase text-bold-600">{{form.name}}</h6>
                        <ul class="p-left-0 mb-20 list-style-none">
                            <li v-for="(action, index) in form.actions" :key="index">
                                <div class="custom-control custom-checkbox checkbox-primary form-check">
                                    <input type="checkbox" :value="action.value" name="actions" v-model="record.actions" class="custom-control-input" :id="action.value">
                                    <label class="custom-control-label" :for="action.value">
                                        <i>{{action.name}}</i>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-success" @click="save()">Save</button>
        </div>
        
    </div>
</template>

<script>
export default {
    props: ['data'],
    data() {
        return {
            modules: [],
            users: [],
            groupid: 0,
            groups: [],
            record: {
                user_id: 0,
                actions: []
            }
        }
    },
    created() {
        this.modules = this.data
        this.loadUsers()
        this.loadGroup()
    },
    methods: {
        save(){
            axios.post("/acl/user-permission/save", this.record)
            .then((res) => {
                this.groupid = 0,
                this.record.user_id = 0,
                this.record.actions = []
                toastr.success("Permissions updated")
                location.reload();
            })
        },
        loadUsers(){
            axios.get("/user/all")
            .then((res) => {
                this.users = res.data;
            })
        },
        loadRights(){
            axios.get("/user/rights/" + this.record.user_id)
            .then((res) => {
                this.record.actions = res.data
            })
        },
        loadGroup(){
            axios.get("/acl/group/all")
            .then((res) => {
                this.groups = res.data
            })
        },
        overwrite(){
            axios.get("/acl/group/find/" + this.groupid)
            .then((res) => {
                this.record.actions = res.data.actions
            })
        }
    }
}
</script>