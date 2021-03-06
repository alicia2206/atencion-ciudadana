<script>
    $(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "4000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if (session('success'))
            toastr["success"]("{{ session('success') }}");
        @endif
        @if (session('info'))
            toastr["info"]("{{ session('info') }}");
        @endif
        @if (session('warning'))
            toastr["warning"]("{{ session('warning') }}");
        @endif
        @if (session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif
    })
</script>
