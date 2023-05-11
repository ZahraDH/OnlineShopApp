<!-- Scripts -->

<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js'"></script>
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/venobox.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/finalcountdown.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/nice-select.js')}}"></script>
<script src="{{asset('assets/js/price-range.js')}}"></script>
<script src="{{asset('assets/js/accordion.js')}}"></script>
<script src="{{asset('assets/js/venobox.js')}}"></script>
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script>


$(document).ready(function () {
    
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
    
        var ele = $(this);
    
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
});
</script>

<script>
  $(document).ready(function(){
    $(".icon-click").click(function(){

    let data_id = $(this).parents("li").attr('data-id');
    if ($("#" + data_id).is(':hidden')) {
        $("#" + data_id).show();
    } else {
        $("#" + data_id).hide();
    }
  }); 
});
</script>