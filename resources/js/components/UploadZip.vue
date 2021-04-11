<template>
    <div class="container-fluid">
        <div class="card card-primary">
            <vue-element-loading :active="isActive" spinner="bar-fade-scale" color="#FF6700" size="100"
                :text="'Loading '+percentage+' %'" :is-full-screen="true" />
            <h3 class=" p-4">Upload a zip</h3>

            <form role="form">
                <div class="card-body">
                    <div>
                        <div class="alert alert-danger mb-3" v-for="error in errors" :key="error">


                            <strong>Oups!</strong>&nbsp; {{error}}

                        </div>

                    </div>


                    <div class="container ">
                        <div class="form-group mt-2 mb-2">
                            <div class="d-flex flex-row bd-highlight">
                                <div class="p-2 bd-highlight">
                                    <h3 class="font-weight-normal">Upload file</h3>
                                </div>





                            </div>
                        </div>
                        <div class="rounded-top" style="border: 1px solid #ced4da;">
                            <div class="row" v-if="this.digital_link">

                                <a :href="`/channel/${this.channel.id}/download`" class="btn btn-primary mx-auto mt-4">Download file</a>
                            </div>


                            <div class="p-4">
                                <div class="input-group mt-2">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02"
                                            @change="uploadBinary($event)">
                                        <label class="custom-file-label" for="inputGroupFile02">{{digital_name}}</label>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>



                    <div class="mx-auto mt-4" style="width: 200px;">
                        <div class="row">
                            <a :href="`/networks/${this.channel.network_id}/channels`"
                                class="btn btn-danger ml-3">Annuler </a>
                            <button type="button" class="btn btn-primary ml-4" @click="submitAddFile()"
                                :disabled="disabled">Confirmer</button>
                        </div>
                    </div>

                </div>
            </form>




        </div>


    </div>
</template>

<script>
    export default {
        mounted() {
            if (this.channel.zip_file) {
                this.digital_link = this.channel.zip_file
            }

        },
        props: ['channel'],
        data() {
            return {
                isActive: false,
                percentage: 0,
                errors: [],
                digital_name: 'Upload a file',
                digital_link: '',
                disabled: false
            }

        },
        methods: {

            validateData() {
                if (this.digital_link == '') {


                    swal.fire(
                        'Error',
                        'Please upload a file',
                        'warning'
                    )
                    return false;
                }
                return true;

            },
            uploadBinary(event) {
                let file = this.$root.checkFile(event);
                if (!file) {
                    swal.fire(
                        'Error',
                        'Please upload a  zip file',
                        'warning'
                    )
                    return;
                }

                this.digital_link = file
                this.digital_name = file.name
            },
            submitAddFile() {

                let validate = this.validateData();

                if (validate) {
                    this.isActive=true
                    let config = {
                        onUploadProgress: progressEvent => {
                            let progress = Math.round((progressEvent.loaded * 100) / progressEvent.total)

                            this.percentage = progress
                        }
                    }

                    let body = new FormData()

                    body.append('zip_file', this.digital_link)

                    body.append('channel_id', this.channel.id)

                    axios.post(`/channel/${this.channel.id}/upload`, body, config)
                        .then((response) => {
                            this.isActive = false;
                            if (response.data.status == 200) {
                                swal.fire(
                                    'Success',
                                    'Zip uploaded',
                                    'success'
                                )
                            }
                        })
                        .catch((error) => {
                            this.isActive = false;
                            this.disabled = false;
                            console.log(error)
                            // if (error.response.status == 422) {
                            //     this.errors = []
                            //     let errors = Object.values(error.response.data.errors);
                            //     errors = _.flatMap(errors);
                            //     this.errors = errors;


                            //     window.scrollTo(0, 0);
                            // }
                        });

                }

            }
        }
    }

</script>
