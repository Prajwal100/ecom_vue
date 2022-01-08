<template>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product List <router-link to="product-create" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus-circle"></i> Create</router-link></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Unit Price</th>
                            <th>Purchased Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Unit Price</th>
                            <th>Purchased Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr v-for="(product,index) in products" :key="product.id">
                            <td>{{++index}}</td>
                            <td>{{product.title}}</td>
                            <td>
                                <img :src="product.thumbnail_image" style="max-width: 120px;" alt="">
                            </td>
                            <td>
                                <div v-if="product.status=='active'" class="badge badge-success">{{product.status}}</div>
                                <div v-else class="badge badge-warning">{{product.status}}</div>
                            </td>
                            <td>
                                <router-link class="btn btn-sm btn-outline-info" :to="{name:'product-edit',params:{id:product.id}}"><i class="fas fa-edit"></i> </router-link>
                                <a @click="deleteProduct(product.id)" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="delete"><i class="fas fa-trash-alt"></i> </a>
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
        name: "index",
        data(){
            return{
                products:[],
            }
        },
        created() {
            this.allProducts();
        },
        methods:{
            allProducts(){
                axios.get('/product').
                    then(({data})=>this.products=data)
            },
            deleteProduct(id){
                axios.delete('/product/${id}').
                    then(data=>{
                        let i=this.products.map(product=>product.id).indexOf(id);
                        console(i);
                        this.products.splice(i,1);
                })
            }
        }

    }
</script>

<style scoped>

</style>
