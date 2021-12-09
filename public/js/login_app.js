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
      var notif = util.notify('Logging in', 'loading');
      var loginData = this.getData();
      var URL = data.getBaseURL() + 'api/v1/login';
      axios.post(URL, loginData).then(function (response) {
        notif.close();
        if (util.showResult(response)) location.href = data.getBaseURL() + 'admin';
      })["catch"](function (error) {
        notif.close();
        util.showResult(error);
      });
    },
    getData: function getData() {
      return $("#login_form").serialize();
    }
  }
});
/******/ })()
;