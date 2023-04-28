<template>
	<div>
		<b-tabs pills card>
            <b-tab class="nav-link" title="Overview">
                <div class="row m-bottom-15">
                    <div class="col-md-12">
                        <vue-ckeditor type="classic" v-model="record.overview" :config="config" />
                    </div>
                </div>
            </b-tab>
            <b-tab class="nav-link" title="Return Procedure">
                <div class="row m-bottom-15">
                    <div class="col-md-12">
                        <vue-ckeditor type="classic" v-model="record.return_procedure" :config="config" />
                    </div>
                </div>
            </b-tab>
            <b-tab class="nav-link" title="Drop-Off Procedure">
                <div class="row m-bottom-15">
                    <div class="col-md-12">
                        <vue-ckeditor type="classic" v-model="record.drop_off_procedure" :config="config" />
                    </div>
                </div>
            </b-tab>
            <b-tab class="nav-link" title="Terms & Conditions">
                <div class="row m-bottom-15">
                    <div class="col-md-12">
                        <vue-ckeditor type="classic" v-model="record.terms_and_conditions" :config="config" />
                    </div>
                </div>
            </b-tab>
            <b-tab class="nav-link" title="Important">
                <div class="row m-bottom-15">
                    <div class="col-md-12">
                        <vue-ckeditor type="classic" v-model="record.important" :config="config" />
                    </div>
                </div>
            </b-tab>
        </b-tabs>
	</div>
</template>
<script>
    export default {
        props: ['parking'],
        data() {
            return {
                config: {
                    toolbar: [
                        ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'Cut', 'Copy', '-', 'Undo', 'Redo', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'Table', 'Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor', 'Maximize', 'ShowBlocks','Image']
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
                    meta_tags: '',
                    meta_description: '',
                    description: '',
                    avatar: '',
                    checkedParkingServices: [],
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
                airports: [],
                parking_services: [],
                cancellations: [],
                parking_types: [],
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
                        this.record.add_form = 0;
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
                    meta_tags: '',
                    meta_description: '',
                    description: '',
                    avatar: '',
                    checkedParkingServices: [],
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
        }
    }

</script>