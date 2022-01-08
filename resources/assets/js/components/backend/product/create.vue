<template>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product Create</h6>
        </div>
        <div class="card-body">
            <form v-on:submit.prevent="submit"  enctype="multipart/form-data">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" v-model="form.title" placeholder="Enter title">
                                        <small class="text-danger" v-if="errors.title">{{errors.title[0]}}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Slug</label>
                                        <input type="text" name="title" class="form-control" v-model="form.slug" placeholder="Enter slug">
                                        <small class="text-danger" v-if="errors.slug">{{errors.slug[0]}}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Unit Price</label>
                                        <input type="number" step="any" placeholder="Unit price" class="form-control" name="unit_price">
                                    </div>
                                </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Purchased Price</label>
                                        <input type="number" step="any" placeholder="Purchased price" class="form-control" name="purchased_price">
                                    </div>
                                </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Discount</label>
                                        <input type="number" step="any" placeholder="Discount" class="form-control" name="discount">
                                    </div>
                                </div>

                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Quantity</label>
                                        <input type="number" step="any" placeholder="Quantity" class="form-control" name="quantity">
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Summary</label>
                                        <textarea rows="5" type="text"  placeholder="Summary" class="form-control" name="summary"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Discription</label>
                                        <textarea rows="5" type="text"   placeholder="Discription" class="form-control" name="discription"></textarea>
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
        name: "create",
        data(){
            return{
                baseURL:data.baseURL,
                submitButton:{
                    message:'Create',
                },
                form:{
                    title:null,
                    slug:null,
                    unit_price:0,
                    purchased_price:0,
                    quantity:5,
                    discount:0,
                    summary:null,
                    description:null,
                    status:'active'
                },
                errors:{

                }
            }
        },
        methods:{
            submit(){
                axios.post('/dashboard/product/'+this.form)
                .then(()=>{
                this.$router.push({name:'product'})
                Notification.success();
                })
                .catch()
            },

             onFileSelected(event){
                let file=event.target.files[0];
                let reader=new FileReader();
                reader.onload=event=>{
                    this.form.image=event.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    }
</script>

<style scoped>

</style>
