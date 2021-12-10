<!-- Bootstrap core JavaScript-->
<script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('backend')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
{{--<script src="{{asset('backend')}}/vendor/chart.js/Chart.min.js"></script>--}}

{{--<script src="{{asset('backend')}}/js/demo/chart-area-demo.js"></script>--}}
{{--<script src="{{asset('backend')}}/js/demo/chart-pie-demo.js"></script>--}}

<script src="{{asset('backend')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('backend')}}/js/demo/datatables-demo.js"></script>

<script src="{{ asset('js/Vue.js') }}"></script>
<script src="{{ asset('js/vue-router.js') }}"></script>
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/axios.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script src="{{ asset('js/data.js') }}"></script>
<script>

    //config
    var util = new util(true);
    data.setBaseURL("{{ asset('') }}");
    data.setAdminId({{ session('ID') }});
</script>
<script src="{{ asset('js/app.js') }}"></script>
