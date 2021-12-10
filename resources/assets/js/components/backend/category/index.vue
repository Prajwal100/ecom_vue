<template>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category List <router-link to="category-create" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus-circle"></i> Create</router-link></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Is Parent</th>
                            <th>Parent Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Is Parent</th>
                            <th>Parent Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr v-for="(category,index) in categories" :key="category.id">
                            <td>{{++index}}</td>
                            <td>{{category.title}}</td>
                            <td>
                                <img :src="category.image" style="max-width: 120px;" alt="">
                            </td>
                            <td>
                                {{category.is_parent}}
                            </td>
                            <td>
                                {{category.parent_id}}
                            </td>
                            <td>
                                <div v-if="category.status=='active'" class="badge badge-success">{{category.status}}</div>
                                <div v-else class="badge badge-warning">{{category.status}}</div>
                            </td>
                            <td>
                                <router-link class="btn btn-sm btn-outline-info" :to="{name:'category-edit',params:{id:category.id}}"><i class="fas fa-edit"></i> </router-link>
                                <a @click="deleteCategory(category.id)" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="delete"><i class="fas fa-trash-alt"></i> </a>
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
    import Swal from 'sweetalert2';
    export default {
        name: "index.vue",
        created() {
            this.allCategories();
        },
        data(){
            return{
                categories:[]
            }
        },
        methods:{
            allCategories(){
                axios.get('category')
                .then(({data})=>(this.categories=data))
                .catch()
            },
            deleteCategory(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete('/category/'+id)
                            .then(()=>{
                                this.categories=this.categories.filter(category=>{
                                    return category.id != id
                                })
                            })
                            .catch(()=>{
                                this.$router.push({name:'/category'})
                            })
                        Swal.fire(
                            'Deleted!',
                            'Data has been deleted.',
                            'success'
                        )
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
