@include('front.layout.topNavbar')
<section class=" container pt-2 mt-2 mb-5">
    <div class="personal">
        <div class="personal-info">
            <div class="container">
                <div class="col-12 px-0 row ">
                    @include('front.layout.pages.rightNavbarPages')
                    <div class="col-12 col-md-9 px-2 py-2 py-md-4">
                        @yield('content_page')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.layout.footer')