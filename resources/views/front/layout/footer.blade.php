<footer class="text-start ">
    <div style="min-height: 200px;" class="p-4">
        <img style="width: 100px;" src="./images/white-logo.svg" alt="">
    </div>
    <div>
    </div>
    <div style="background-color: #0D1C1A;" class="py-4">

    </div>
</footer>

<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script type="text/javascript">
  $(function(){
    $(document).on('click','#headingOne', function() {
        $(this).siblings().toggleClass('collapse')
    })
  })
</script>
@yield('css')
</body>

</html>
