<template>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Banner List <router-link to="banner-create" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus-circle"></i> Create</router-link></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <tr v-for="(banner,index) in banners" :key="banner.id">
                                <td>{{++index}}</td>
                                <td>{{banner.title}}</td>
                                <td>
                                    <img :src="banner.image" style="max-width: 120px;" alt="">
                                </td>
                                <td>
                                    <div v-if="banner.status=='active'" class="badge badge-success">{{banner.status}}</div>
                                    <div v-else class="badge badge-warning">{{banner.status}}</div>
                                </td>
                                <td>
                                    <router-link class="btn btn-sm btn-outline-info" :to="{name:'banner-edit',params:{id:banner.id}}"><i class="fas fa-edit"></i> </router-link>
                                    <a @click="deleteBanner(banner.id)" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="delete"><i class="fas fa-trash-alt"></i> </a>
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
    import Swal from "sweetalert2";

    export default {
        name: "index",
        created() {
            this.allBanners()
        },
        data(){
            return{
                banners:[]
            }
        },
        methods:{
            allBanners(){
                axios.get('banner')
                .then(({data})=>(this.banners=data))
                .catch()
            },
            deleteBanner(id){
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
                        axios.delete('/banner/'+id)
                            .then(()=>{
                                this.banners=this.banners.filter(banner=>{
                                    return banner.id != id
                                })
                            })
                            .catch(()=>{
                                this.$router.push({name:'/banner'})
                            })
                        Swal.fire(
                            'Deleted!',
                            'Data has been deleted.',
                            'success'
                        )
                    }
                })
            }
        },
    }

</script>

<style scoped>

</style>
