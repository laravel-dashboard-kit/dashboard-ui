{!! $slot !!}

@push('script')
    <script type="text/javascript">
        (function() {
            document.getElementById("{{ $id }}").addEventListener('click', function() {
                Swal.fire(@json($options)).then(function(result) {
                    if (result.value) {
                        document.getElementById("{{ $id }}").dispatchEvent(
                            new CustomEvent('confirmed', {
                                detail: result
                            })
                        );
                    } else {
                        document.getElementById("{{ $id }}").dispatchEvent(
                            new CustomEvent('cancelled', {
                                detail: result
                            })
                        );
                    }
                });
            })
        })();
    </script>
@endpush
