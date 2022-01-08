const login_app=new Vue({
    el:"#login_app",
    data:{
        email:'',
        password:'',
    },

    created(){

    },

    methods:{
        submit:function () {
            // let notif = util.notify('Logging in', 'loading');

            let loginData = this.getData();
            let URL = data.getBaseURL() + 'login';

            axios.post(URL, loginData)
                .then( function(response) {
                    // notif.close();
                    if (util.showResult(response))
                        location.href = data.getBaseURL() + 'dashboard';
                    Notification.success()
                })
                .catch( function(error) {
                    Notification.error();
                })
        },
        getData:function () {
            return $("#login_form").serialize();
        }
    },

})
