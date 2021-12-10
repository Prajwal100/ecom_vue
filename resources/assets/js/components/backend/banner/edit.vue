<template>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Banner Edit</h6>
        </div>
        <div class="card-body">
            <form v-on:submit.prevent="update"  enctype="multipart/form-data">

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <img  v-if="form.image" :src="form.image"  class="img-fluid" style="border: 1px solid #ddd;padding:4px;" alt="">
                            <img  v-else :src="baseURL+'backend/img/default-img.jpg'"  class="img-fluid" style="border: 1px solid #ddd;padding:4px;" alt="">
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" v-model="form.title" placeholder="Enter title">
                                        <small class="text-danger" v-if="errors.title">{{errors.title[0]}}</small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control" @change="onFileSelected">
                                    <small class="text-danger" v-if="errors.image">{{errors.image[0]}}</small>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control" v-model="form.status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        <small class="text-danger" v-if="errors.status">{{errors.status[0]}}</small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="form-group">
                    <button class="btn btn-info" type="submit">{{submitButton.message}}</button>
                    <router-link to="/banner" class="btn btn-warning">Back</router-link>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "edit",
        data:function () {
            return {
                baseURL:data.getBaseURL(),
                submitButton:{loading:false,message:'Update'},
                form:{
                    title:'',
                    image:'',
                    status:'',
                    new_image:'',
                },
                errors:{

                }
            }
        },
        created() {
            let id=this.$route.params.id;
            axios.get('banner/'+id)
            .then(({data})=>(this.form=data))
            .catch(console.log('error'));
        },

        methods:{
            update:function () {
                let id=this.$route.params.id;
                axios.patch('/banner/'+id,this.form)
                    .then(()=>{
                        this.$router.push({name:'banner'})
                        Notification.success();
                    })
                    .catch(error=>this.errors=error.response.data.errors)
            },

            onFileSelected(event){
                let file=event.target.files[0];

                let reader=new FileReader();
                reader.onload=event=>{
                    this.form.new_image=event.target.result
                }
                reader.readAsDataURL(file);
            },

            startLoading:function () {
                this.submitButton={
                    loading: true,
                    message: 'Loading'
                }
            },

            stopLoading:function () {
                this.submitButton={
                    loading: false,
                    message: 'Submit'
                }
            }
        }
    }
</script>

<style scoped>

</style>
