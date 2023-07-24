@if (Session::has('success'))
<script>
    toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.success ("{{ Session::get('success')}}",'Success!', {timeOut: 12000});
</script>
@elseif (Session::has('fail'))

<script>
    toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.error ("{{ Session::get('fail')}}",'Failed!', {timeOut: 12000});
</script>
@endif