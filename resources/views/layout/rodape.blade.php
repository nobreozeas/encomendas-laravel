
<script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/chart.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{asset('assets/js/jquery.mask.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap5.min.js')}}"></script>
@stack('scripts')
<script>
    $.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
</script>
</body>
</html>
