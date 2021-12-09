

const admin=(resolve)
//Setting up Routes
const routes=[
    {
        path:'/admin',
        component:admin,
        children:[
            {path:'',component: adminIndex}
        ]
    }
]

// Initialize Vue
const app = new Vue({
    el:"#wrapper",
    data:{
        baseURL:data.getBaseURL(),
        adminId:data.getAdminId(),
        storageURL:data.getStorageURL(),

        try:0,
        notif:'',
    },

    created(){
        data.setAdmin({
            name:"Loading...",
        });
        this.notif=util.notify('Please wait...','loading');
        this.getAdmin(this.adminId);
    },
    methods:{
        /**
         * Get Admin information
         * @param Int Admin Id
         * @return Object admin
         */
        getAdmin:function(adminId) {
            var vm=this;
            axios.get(this.baseURL+'api/v1/admin/'+adminId)
                .then(function (response) {
                    vm.try=0;
                    data.setAdmin(response.data);
                })
                .catch(function (error) {
                    util.log(error);
                    if(this.try<3){
                        this.try++;
                        this.getAdmin(adminId);
                    }
                    else{
                        util.notif("An error occurred, Please try to refresh",'error');
                    }

                })
        }
    }
})
