
import {routes} from './routes';

const router=new VueRouter({
    routes,
    // mode:'history'
});

import Notification from './Helpers/notification';
window.Notification=Notification
//import Sweet alert
import Swal from "sweetalert2";

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast=Toast

// Initialize Vue
const app = new Vue({
    router,
    el:"#wrapper",
    data:{
        baseURL: data.getBaseURL(),
        storageURL: data.getStorageURL(),
        adminId: data.getAdminId(),

        try:0,
        notif:'',
    },
    created(){
        data.setAdmin({
            name:"Loading...",
        });
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
        },

        getCategories:function(){
            axios.get(this.baseURL+'category')
                .then(function (response) {
                    this.try=0;
                    this.notif.close();
                    data.setCategories(response.data);
                })
                .catch(function (error) {
                    util.log(error);
                    if(this.try<3){
                        this.try++;
                        this.getCategories();
                    }else{
                        util.notify("An error occurred");
                    }

                })
        },

        logout: function() {
            var vm = this;
            util.notify('Logging out', 'loading');
            axios.get(this.baseURL+'logout')
                .then( function(response) {
                    location.href = vm.baseURL+"admin/login";
                })
                .catch( function(error) {
                    util.log(error);
                    util.notify('An error occured', 'error');
                });
        },
    },
    computed: {
        admin: function() {
            return data.admin;
        },
        categories:function () {
            return data.categories;
        }
    }
})
