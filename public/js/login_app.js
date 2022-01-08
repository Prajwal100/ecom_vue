/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/assets/js/login_app.js ***!
  \******************************************/
var login_app = new Vue({
  el: "#login_app",
  data: {
    email: '',
    password: ''
  },
  created: function created() {},
  methods: {
    submit: function submit() {
      // let notif = util.notify('Logging in', 'loading');
      var loginData = this.getData();
      var URL = data.getBaseURL() + 'login';
      axios.post(URL, loginData).then(function (response) {
        // notif.close();
        if (util.showResult(response)) location.href = data.getBaseURL() + 'dashboard';
        Notification.success();
      })["catch"](function (error) {
        Notification.error();
      });
    },
    getData: function getData() {
      return $("#login_form").serialize();
    }
  }
});
/******/ })()
;