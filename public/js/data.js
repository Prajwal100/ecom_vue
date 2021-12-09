var data=new Vue({
    data:function () {
        return {
            baseURL:'',

            admin:{},
            adminId:0,

        }
    },
    methods:{
        setBaseURL:function (baseURL) {
            this.baseURL=baseURL;
        },

        getBaseURL:function () {
            return this.baseURL;
        },

        getStorageURL:function (baseURL) {
            return this.getBaseURL()+'storage/';
        },

        setAdminId:function (adminId) {
            this.adminId=adminId;
        },

        getAdminId:function () {
            return this.adminId;
        },

        /**
         * Set Admin
         * @param Object admin
         *
         */
        setAdmin: function(admin) {
            this.admin = admin;
        },

        /** Get Admin
         *
         * @return Object admin
         */
        getAdmin: function() {
            return this.admin;
        },

    }
})
