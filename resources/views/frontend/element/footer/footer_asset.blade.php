<script src="{{ asset('public/frontend') }}/assets/js/jquery-3.4.1.min.js"></script>
<script src="{{ asset('/public/admin-elite/assets/node_modules/datatables/jquery.dataTables.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('public/frontend') }}/assets/js/bootstrap.min.js"></script>
<!-- owl carousel -->
<script src="{{ asset('public/frontend') }}/assets/js/owl.carousel.js"></script>
<!-- magnific popup -->
<script src="{{ asset('public/frontend') }}/assets/js/jquery.magnific-popup.js"></script>
<!-- filterizr js -->
<script src="{{ asset('public/frontend') }}/assets/js/jquery.filterizr.min.js"></script>
<!-- wow js-->
<script src="{{ asset('public/frontend') }}/assets/js/wow.min.js"></script>

<!-- clock js -->
<script src="{{ asset('public/frontend') }}/assets/js/clock.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/jquery.appear.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/odometer.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/oddometer-active.js"></script>
<!-- main -->
<script src="{{ asset('public/frontend') }}/assets/js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>

<script>
	$(document).ready(function () {
		$(".select2").select2({
	      tags: false,
	      
		});
	})
</script>

<script>
    $(document).ready(function() {
        var updateThis ;

        var table = $('#dataTable').DataTable( {
            "orderable": false,
            "bSort" : false,
            "pageLength": 25,
        } );
        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

    });
                
</script>

<script>
  $(document).ready(function(){
        $('.alert-success').fadeIn().delay(7000).fadeOut();
  });
</script>