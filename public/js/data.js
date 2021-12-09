var data=new Vue({
    data:function () {
        return {
            baseURL:'',
        }
    },
    methods:{
        setBaseURL:function (baseURL) {
            this.baseURL=baseURL;
        },

        getBaseURL:function () {
            return this.baseURL;
        }
    }
})
