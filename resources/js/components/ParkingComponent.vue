<template>
    <div>
        <header class="page-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h1 class="separator">Parking</h1>
                    <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="icon dripicons-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Parking</li>
                        </ol>
                    </nav>
                </div>
                <div class="actions top-right">
                    <a class="btn btn-primary btn-floating btn-rounded text-white" @click.prevent="addForm()" v-if="record.add_form != 1 && record.id == 0 && record.edit_form == 0">Add</a>
                    <button type="button" class="btn btn-info btn-rounded btn-floating" @click.prevent="clearForm()" v-if="record.history == 1">Back</button>
                </div>
            </div>
        </header>
        <section class="page-content container-fluid">
            <div class="card clearfix">
                <div class="card-body">
                    <form id="myForm">
                        <div class="m-bottom-25" v-if="record.id == 0 && record.edit_form == 0 && record.history == 0 && record.add_form == 0">
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
                        <div v-if="record.edit_form != 0 || record.add_form == 1 && record.history == 0">
                            <!-- TABS -->
                            <div class="parking-vertical-tabs">
                            <b-tabs pills card> <!-- vertical -->
                                <b-tab class="nav-link" title="Logo" v-if="record.id != 0" @click="btnClickShowHide(0)">
                                    <div class="row">
                                        <div class="col-md-3 m-bottom-20 text-center">
                                            <img :src="'/uploads/parkings/'+record.avatar" :alt='record.avatar' class='img-thumbnail card-img-top' v-if="record.avatar">
                                            <button type="button" class="btn btn-primary btn-block m-top-20" data-toggle="modal" data-target="#profileImage">
                                                <i class="fa fa-image"></i>
                                                Change Image
                                            </button>
                                            <!-- MODAL -->
                                            <div class="modal fade" id="profileImage" tabindex="-1" role="dialog"  aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Image</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class="zmdi zmdi-close"></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div style="margin-top: 20px" :class="'mt-20 alert-rounded alert-dismissible alert alert-' + response.type" v-if="response.isVisible">
                                                                {{response.message}}
                                                            </div>
                                                            <!-- File Begin -->
                                                            <div class="img-upload">
                                                                <div class="img-file-tab">
                                                                    <div>
                                                                        <span class="btn btn-primary btn-file img-select-btn">
                                                                            <span>Select Image</span>
                                                                            <input type="file" name="avatar" id="avatar">
                                                                        </span>
                                                                        <span class="btn btn-danger rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-top-12 p-bottom-12 p-left-20 p-right-20 m-top-20 img-remove-btn">Remove</span>
                                                                    </div>
                                                                    <img :src="'/uploads/parkings/'+record.avatar" :alt='record.avatar' class='img-thumbnail w-100' v-if="record.avatar">
                                                                </div>
                                                            </div>
                                                            <div class="m-top-20 m-bottom-10">
                                                                <small>
                                                                    <span v-if="errors.avatar != null" class="text-danger">
                                                                        {{errors.avatar[0]}}
                                                                    </span>
                                                                </small>
                                                            </div>
                                                            <!-- File End -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" @click.prevent="updateAvatar()">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /MODAL -->
                                        </div>
                                    </div>
                                </b-tab>
                                <b-tab class="nav-link" title="Parking Info" @click="btnClickShowHide(1)">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group tooltip_error">
                                                <label for="airport_id">Airport</label>
                                                <multiselect
                                                    v-model="record.airport_id"
                                                    :options="airports"
                                                    label="name">
                                                </multiselect>
                                                <small v-if="errors.airport_id != null" class="text-danger">
                                                    <span>
                                                        {{errors.airport_id[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group tooltip_error">
                                                <label for="parkingtype_id">Parking Type</label>
                                                <multiselect
                                                    v-model="record.parkingtype_id"
                                                    :options="parking_types"
                                                    label="title">
                                                </multiselect>
                                                <small v-if="errors.parkingtype_id != null" class="text-danger">
                                                    <span>
                                                        {{errors.parkingtype_id[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group tooltip_error">
                                                <label for="cancellation_id">Cancellation</label>
                                                <multiselect
                                                    v-model="record.cancellation_id"
                                                    :options="cancellations"
                                                    label="title">
                                                </multiselect>
                                                <small v-if="errors.cancellation_id != null" class="text-danger">
                                                    <span>
                                                        {{errors.cancellation_id[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Parking Name</label>
                                                <input type="text" required="" ref="title" id="title" class="form-control mr-sm-2" v-model="record.title">
                                                <small>
                                                    <span v-if="errors.title != null" class="text-danger">
                                                        {{errors.title[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" required="" ref="email" id="email" class="form-control mr-sm-2" v-model="record.email">
                                                <small>
                                                    <span v-if="errors.email != null" class="text-danger">
                                                        {{errors.email[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="distance">Distance</label>
                                                <input type="text" required="" ref="distance" id="distance" class="form-control mr-sm-2" v-model="record.distance">
                                                <small>
                                                    <span v-if="errors.distance != null" class="text-danger">
                                                        {{errors.distance[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="transfer">Transfer</label>
                                                <input type="text" required="" ref="transfer" id="transfer" class="form-control mr-sm-2" v-model="record.transfer">
                                                <small>
                                                    <span v-if="errors.transfer != null" class="text-danger">
                                                        {{errors.transfer[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dashed ">
                                    <label>Parking Services</label>
                                    <div class="row m-bottom-12">
                                        <div class="col-md-4" v-for="(item, index) in parking_services" :key="index">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" v-model="record.checkedParkingServices" :value="item.id" :id="item.id">
                                                <label class="form-check-label" :for="item.id">
                                                    {{item.title}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dashed ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_tags">Meta Tags</label>
                                                <input type="text" required="" ref="meta_tags" id="meta_tags" class="form-control mr-sm-2" v-model="record.meta_tags">
                                                <small>
                                                    <span v-if="errors.meta_tags != null" class="text-danger">
                                                        {{errors.meta_tags[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_description">Meta Description</label>
                                                <input type="text" required="" ref="meta_description" id="meta_description" class="form-control mr-sm-2" v-model="record.meta_description">
                                                <small>
                                                    <span v-if="errors.meta_description != null" class="text-danger">
                                                        {{errors.meta_description[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </b-tab>
                                <b-tab class="nav-link" title="Rate" @click="btnClickShowHide(1)">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="rate">Rate</label>
                                                <input type="text" required="" ref="rate" id="rate" class="form-control mr-sm-2" v-model="record.rate">
                                                <small>
                                                    <span v-if="errors.rate != null" class="text-danger">
                                                        {{errors.rate[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group tooltip_error">
                                                <label for="offer">Offer</label>
                                                <select class="form-control form-control-sm" v-model="record.offer">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                <small v-if="errors.offer != null" class="text-danger">
                                                    <span>
                                                        {{errors.offer[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-2" v-if="record.offer == 1">
                                            <div class="form-group tooltip_error">
                                                <label for="offer_type">Offer Type</label>
                                                <select class="form-control form-control-sm" v-model="record.offer_type">
                                                    <option value="flat">Flat</option>
                                                    <option value="percentage">Percentage</option>
                                                </select>
                                                <small v-if="errors.offer_type != null" class="text-danger">
                                                    <span>
                                                        {{errors.offer_type[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-2" v-if="record.offer_type == 'flat' && record.offer == 1">
                                            <div class="form-group">
                                                <label for="offer_rate">Offer Rate</label>
                                                <input type="text" required="" ref="offer_rate" id="offer_rate" class="form-control form-control-sm mr-sm-2" v-model="record.offer_rate">
                                                <small>
                                                    <span v-if="errors.offer_rate != null" class="text-danger">
                                                        {{errors.offer_rate[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-2" v-if="record.offer_type == 'percentage' && record.offer == 1">
                                            <div class="form-group tooltip_error">
                                                <label for="offer_rate">Offer Rate</label>
                                                <select class="form-control form-control-sm" v-model="record.offer_rate">
                                                    <option v-for="index in 90" :key="index" :value="index">{{index}}%</option>
                                                </select>
                                                <small v-if="errors.offer_rate != null" class="text-danger">
                                                    <span>
                                                        {{errors.offer_rate[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-2" v-if="record.offer == 1">
                                            <div class="form-group">
                                                <label for="discount">Discount</label>
                                                <input type="text" class="form-control form-control-sm mr-sm-2" v-model="this.discount" disabled>
                                                <small>
                                                    <span v-if="errors.discount != null" class="text-danger">
                                                        {{errors.discount[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-2" v-if="record.offer == 1">
                                            <div class="form-group">
                                                <label for="total">Total</label>
                                                <input type="text" class="form-control form-control-sm mr-sm-2" v-model="this.total" disabled>
                                                <small>
                                                    <span v-if="errors.total != null" class="text-danger">
                                                        {{errors.total[0]}}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </b-tab>
                                <b-tab class="nav-link" title="Overview" @click="btnClickShowHide(1)">
                                    <div class="row m-bottom-15">
                                        <div class="col-md-12">
                                            <vue-ckeditor type="classic" v-model="record.overview" :config="config" />
                                        </div>
                                    </div>
                                </b-tab>
                                <b-tab class="nav-link" title="Return Procedure" @click="btnClickShowHide(1)">
                                    <div class="row m-bottom-15">
                                        <div class="col-md-12">
                                            <vue-ckeditor type="classic" v-model="record.return_procedure" :config="config" />
                                        </div>
                                    </div>
                                </b-tab>
                                <b-tab class="nav-link" title="Drop-Off Procedure" @click="btnClickShowHide(1)">
                                    <div class="row m-bottom-15">
                                        <div class="col-md-12">
                                            <vue-ckeditor type="classic" v-model="record.drop_off_procedure" :config="config" />
                                        </div>
                                    </div>
                                </b-tab>
                                <b-tab class="nav-link" title="Terms & Conditions" @click="btnClickShowHide(1)">
                                    <div class="row m-bottom-15">
                                        <div class="col-md-12">
                                            <vue-ckeditor type="classic" v-model="record.terms_and_conditions" :config="config" />
                                        </div>
                                    </div>
                                </b-tab>
                                <b-tab class="nav-link" title="Important" @click="btnClickShowHide(1)">
                                    <div class="row m-bottom-15">
                                        <div class="col-md-12">
                                            <vue-ckeditor type="classic" v-model="record.important" :config="config" />
                                        </div>
                                    </div>
                                </b-tab>
                            </b-tabs>
                            </div>
                            <!-- /TABS -->
                            <div class="row m-bottom-15" v-if="this.tabShowHideData">
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
                            <hr v-if="this.tabShowHideData">
                            <div v-if="this.tabShowHideData">
                                <button type="submit" id="submit" v-if="record.id == 0 && permissions.includes('parking-add')" class="btn btn-success btn-rounded btn-floating" @click.prevent="save()">Save</button>
                                <button type="submit" id="submit" v-if="record.id != 0 && permissions.includes('parking-update')" class="btn btn-primary btn-rounded btn-floating" @click.prevent="update()">Update</button>
                                <button type="button" class="btn btn-info btn-rounded btn-floating" v-if="record.id == 0" @click.prevent="clearForm()">Clear Form</button>
                                <button type="button" class="btn btn-info btn-rounded btn-floating" v-if="record.id != 0" @click.prevent="clearForm()">Back</button>
                            </div>
                        </div>

                        <!-- PARKING HISTORY -->
                        <parking-history :parking="record" v-if="record.id != 0 && record.history != 0 && record.edit_form == 0 && record.add_form == 0"></parking-history>

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
                                        <th width="70">Orders</th>
                                        <th width="70">Image</th>
                                        <th>Title</th>
                                        <th>email</th>
                                        <th width="60" class="text-center">Active</th>
                                        <th width="90" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-striped">
                                    <tr v-for="(item, index) in items.data" :key="index">
                                        <td>{{index + 1}}</td>
                                        <td width="70">
                                            <button class="btn-pointer btn-success btn-floating" @click.prevent="history(item.id)">
                                                {{item.orders.length}}
                                            </button>
                                        </td>
                                        <td width="70"><img :src="'/uploads/parkings/'+item.avatar" alt='Image preview' class='img-thumbnail card-img-top' v-if="item.avatar != null"></td>
                                        <td>{{item.title}}</td>
                                        <td>{{item.email}}</td>
                                        <td width="60" v-if="item.status == 1" class="text-center">
                                            <i class="zmdi zmdi-check"></i>
                                        </td>
                                        <td width="60" v-if="item.status != 1" class="text-center">
                                            <i class="la la-close"></i>
                                        </td>
                                        <td width="90" class="text-center">
                                            <button v-if="permissions.includes('parking-update')" type="button" @click="edit(item.id)" class="btn-pointer btn-warning btn-floating">
                                                <i class="icon-pencil text-size-10 text-white"></i>
                                            </button>
                                            <button v-if="permissions.includes('parking-delete')" type="button" @click="recordDelete(item.id)" class="btn-pointer btn-danger btn-floating">
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
                config: {
                    toolbar: [
                        ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'Cut', 'Copy', '-', 'Undo', 'Redo', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'Table', 'Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor', 'Maximize', 'ShowBlocks','Image','HorizontalRule']
                    ],
                    height: 200,
                    // extraPlugins: 'autogrow,uploadimage',
                    filebrowserBrowseUrl: '/laravel-filemanager',
                    filebrowserUploadUrl: '/laravel-filemanager/upload',
                    filebrowserImageBrowseUrl: '/laravel-filemanager',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload',
                },
                record: {
                    id: 0,
                    airport_id: '',
                    parkingtype_id: '',
                    cancellation_id: '',
                    title: '',
                    email: '',
                    meta_tags: '',
                    meta_description: '',
                    description: '',
                    avatar: '',
                    checkedParkingServices: [],

                    overview: '',
                    return_procedure: '',
                    drop_off_procedure: '',
                    terms_and_conditions: '',
                    important: '',

                    active_overview: 1,
                    active_return_procedure: 1,
                    active_drop_off_procedure: 1,
                    active_terms_and_conditions: 1,
                    active_important: 1,

                    status: 1,

                    rate: '',
                    offer: 0,
                    offer_type: 'percentage',
                    offer_rate: 0,
                    // discount: this.discount,
                    // total: this.total,

                    edit_form: 0,
                    add_form: 0,
                    history: 0,
                },
                tabShowHideData: false,
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
                airports: [],
                parking_services: [],
                cancellations: [],
                parking_types: [],
                // total: 0,
            }
        },
        created() {
            this.getPermissions()
            this.getData()
            this.getAirports()
            this.getParkingServices()
            this.getCancellations()
            this.getParkingTypes()
        },

        methods: {
            history(id){
                this.record.id = id;
                this.record.edit_form = 0;
                this.record.add_form = 0;
                this.record.history = 1;
            },
            btnClickShowHide(id){
                if (id == 0) {
                    this.tabShowHideData = false;
                }
                if (id == 1) {
                    this.tabShowHideData = true;
                }
            },
            addForm() {
                this.record.add_form = 1;
                this.record.edit_form = 0;
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
                axios.post('/parking/save', this.record)
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
                            this.errors = []
                            this.record.id = res.data.id
                            this.getData()
                            setTimeout(() => this.response = {isVisible:false}, 1000);
                        }
                    })
                    .catch((err) => {})
            },
            getData(page = 1) {
                axios.get('/parking-get/all/?page='+page)
                    .then((res) => {
                        this.items = res.data
                    })
            },
            searchData(page = 1) {
                axios.post('/parking/search/?page='+page, this.search)
                    .then((res) => {
                        this.items = res.data
                    })
            },
            edit(id) {
                axios.get('/parking/find/' + id)
                    .then((res) => {
                        this.record = res.data
                        this.record.airport_id = res.data.airport
                        this.record.parkingtype_id = res.data.parking_type
                        this.record.cancellation_id = res.data.cancellation
                        // this.record.checkedParkingServices = res.data.parking_services_details
                        this.record.edit_form = id;
                        this.record.add_form = 0;
                        this.record.history = 0;
                    })
                this.response = {
                    type: "success",
                    message: "",
                    isVisible: false
                }
                axios.get('/parking/find/selected-parking-services/' + id)
                    .then((res) => {
                        this.record.checkedParkingServices = res.data
                        // this.record.airport_id = res.data.airport.name
                        this.record.edit_form = id;
                        this.record.add_form = 0;
                    })
                // this.$refs.name.focus();
            },
            update() {
                axios.post('/parking/update', this.record)
                    .then((res) => {
                        if (res.data.success == false) {
                            this.errors = res.data.errors
                            this.response = {
                                isVisible: false
                            }
                        } else {
                            // this.clearForm()
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success'
                            }
                            this.errors = []
                            // this.getData()
                            setTimeout(() => this.response = {isVisible: false}, 1000);
                        }
                    })
            },
            updateAvatar() {
                var $myForm = $('#myForm');
                var data = new FormData(myForm);
                data.append('id', this.record.id);
                data.append('title', this.record.title);
                axios.post('/parking/update/avatar', data)
                    .then((res) => {
                        if (res.data.success == false) {
                            this.errors = res.data.errors
                            this.response = {
                                isVisible: false
                            }
                        } else {
                            this.response = {
                                isVisible: true,
                                message: res.data.message,
                                type: 'success'
                            }
                            setTimeout(() => window.location.reload(), 50);
                        }
                    })
            },
            clearForm() {
                this.record = {
                    id: 0,
                    airport_id: '',
                    parkingtype_id: '',
                    cancellation_id: '',
                    title: '',
                    rate: '',
                    email: '',
                    meta_tags: '',
                    meta_description: '',
                    description: '',
                    avatar: '',
                    checkedParkingServices: [],

                    overview: '',
                    return_procedure: '',
                    drop_off_procedure: '',
                    terms_and_conditions: '',
                    important: '',

                    active_overview: 1,
                    active_return_procedure: 1,
                    active_drop_off_procedure: 1,
                    active_terms_and_conditions: 1,
                    active_important: 1,

                    status: 1,

                    edit_form: 0,
                    add_form: 0,
                    history: 0,
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
                axios.get('/parking-delete/' + id)
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
            getAirports() {
                axios.get('/setup/airports-get-active/all')
                    .then((res) => {
                        this.airports = res.data
                    })
            },
            getParkingServices() {
                axios.get('/setup/parking-services-get-active/all')
                    .then((res) => {
                        this.parking_services = res.data
                    })
            },
            getCancellations() {
                axios.get('/setup/cancellations-get-active/all')
                    .then((res) => {
                        this.cancellations = res.data
                    })
            },
            getParkingTypes() {
                axios.get('/setup/parking-types-get-active/all')
                    .then((res) => {
                        this.parking_types = res.data
                    })
            },
        },
        computed: {
            total: function(){
                // alert(this.record.offer_type);
                var offerType = this.record.offer_type;
                if(offerType == 'percentage'){
                    var total = (this.record.rate / 100) * this.record.offer_rate;
                    return this.record.rate - total;
                }
                if(offerType == 'flat'){
                    var total = this.record.rate - this.record.offer_rate;
                    return total;
                }
                // return total;
            },
            discount: function(){
                var offerType = this.record.offer_type;
                if(offerType == 'percentage'){
                    var total = (this.record.rate / 100) * this.record.offer_rate;
                    return total;
                }
                if(offerType == 'flat'){
                    var total = this.record.offer_rate;
                    return total;
                }
            },
        }
    }

</script>
