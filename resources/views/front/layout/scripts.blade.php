<script src="{{asset('tem_assets')}}/js/all.min.js"></script>
<script src="{{asset('tem_assets')}}/js/view-order.js"></script>
<script src="{{asset('tem_assets')}}/js/bootstrap.bundle.min.js"></script>

<!-- ============================================================================================================
  ================================ [End Footer ] ==================================================================
  ============================================================================================================= -->
<script src="{{asset('assets/js/all.min.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert', ({
                                          detail: {
                                              type,
                                              message
                                          }
                                      }) => {
        Toast.fire({
            icon: type,
            title: message
        })
    })
    @if(session()->has('success'))
    Toast.fire({
        icon: "success",
        title: "{{session('success')}}"
    })
    @endif
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        sendRequest();
        function sendRequest(){
            $.ajax({
                url: "{{route('front.ajax.last-seen')}}",
                success:
                    function(data){
                        console.log('done')

                    },
                complete: function() {
                    // Schedule the next request when the current one's complete
                    setInterval(sendRequest, 45000); // The interval set to 5 seconds
                }
            });
        };
    });
</script>
@stack('page_scripts')
@livewireScripts