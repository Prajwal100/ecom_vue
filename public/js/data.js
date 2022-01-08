var data=new Vue({
    data:function () {
        return {
            baseURL:'',

            admin:{},
            adminId:0,

            categories:[],
            category:{},

            products:[],
            product:{},

            orders:[],

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

        setCategories:function(categories){
            this.categories=categories;
        },

        getCategories:function(){
            return this.categories;
        },

        setProducts:function(products){
            this.products=products;
        },
        getProducts:function(){
            return this.products;
        },

        setOrders:function(orders){
            this.orders=orders;
        },
        getOrders:function(){
            return this.orders;
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
