<script src="{{asset('AdminAssets/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('AdminAssets/lib/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('AdminAssets/lib/jquery-ui/jquery-ui.js')}}"></script>
<!-- Datatable -->
<script src="{{asset('AdminAssets/lib/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('AdminAssets/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{asset('AdminAssets/lib/select2/js/select2.min.js')}}"></script>
<!-- bootbox -->
<script src="{{asset('AdminAssets/js/bootbox.all.min.js')}}"></script>
{{-- toastr js notification --}}
<script src="{{asset('AdminAssets/js/toastr.min.js')}}"></script>
<script src="{{asset('AdminAssets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
<script src="{{asset('AdminAssets/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>

{{-- specific page scripts --}}
@stack('js')

{{-- custom js --}}
<script src="{{asset('AdminAssets/js/starlight.js')}}"></script>
<script src="{{asset('AdminAssets/js/ResizeSensor.js')}}"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if(Session::has('message'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('message') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
    @endif

    $(".delete").on("click", function(e) {
        e.preventDefault();

        var del = $(this).attr("href");
        bootbox.confirm("Are your sure to delete?", function(confirmed) {
            if (confirmed) {
                window.location.href = del;
            }
        });
    });
</script>
