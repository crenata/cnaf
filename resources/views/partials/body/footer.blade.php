<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-7 col-7">
                <h6 class="text-white font-weight-bold">sobat CNAF</h6>
                <div class="info text-white mt-xl-5 mt-lg-5 mt-md-4 mt-sm-3 row">
                    <div class="col-2 col-md-2">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="col-10 col-md-10 p-0">
                        <small class="">APL TOWER Central Park Floor 36th-Suite 3 <br> JL. Letjen S. Parman Kav.28 <br> Jakarta Barat - 11470</small>
                    </div>

                    <div class="col-2 col-md-2">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="col-10 col-md-10 p-0">
                        <small>info@sobatcnaf.com</small>
                    </div>

                    <div class="col-2 col-md-2">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="col-10 col-md-10 p-0">
                        <small>+6221 298 60770</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-5 col-5">
                <h6 class="text-white font-weight-bold pull-right">Leasing</h6>
                <div class="info text-white mt-xl-5 mt-lg-5 mt-md-4 mt-sm-3">
                    <p><a href="#" class="text-white"><small>Panduan Leasing</small></a></p>
                    <p><a href="{{ route('simulasi') }}" class="text-white"><small>Simulasi Leasing</small></a></p>
                    <p><a href="{{ route('faq') }}" class="text-white"><small>FAQ</small></a></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-7 col-7">
                <h6 class="text-white font-weight-bold">Lebih Banyak</h6>
                <div class="info text-white mt-xl-5 mt-lg-5 mt-md-4 mt-sm-3">
                    <p><a href="{{ route('tentangkami') }}" class="text-white"><small>Tentang Kami</small></a></p>
                    <p><a href="{{ route('articles') }}" class="text-white"><small>Artikel</small></a></p>
                    <p><a href="{{ route('articles') }}" class="text-white"><small>Kegiatan</small></a></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-2 col-sm-5 col-5">
                <h6 class="text-white font-weight-bold">Hubungi Kami</h6>
                <div class="info mt-xl-5 mt-lg-5 mt-md-4 mt-sm-3">
                    <a href="#"><img src="{{ asset('public/images/home/twitter.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('public/images/home/google.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('public/images/home/facebook.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('public/images/home/youtube.png') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container clearfix py-xl-2 py-lg-2 py-md-2 py-sm-0 py-0">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12 col-12 d-flex justify-content-lg-start justify-content-md-start justify-content-sm-center justify-content-center">
                <p class="text-white"><small>&copy;Sobat CNAF 2019 Rights Reserved</small></p>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12 col-12 d-flex justify-content-lg-end justify-content-md-end justify-content-sm-center justify-content-center">
                <div class="text-center">
                    <p class="float-lg-left float-md-left float-sm-left float-none"><a href="{{ route('terms.and.condition') }}" class="text-white"><small><b>Terms and Conditions</b></small></a></p>
                    <p class="float-lg-left float-md-left float-sm-left float-none ml-md-4 ml-sm-4 ml-0"><a href="#" class="text-white"><small><b>Complaints</b></small></a></p>
                    <p class="float-lg-left float-md-left float-sm-left float-none ml-md-4 ml-sm-4 ml-0"><a href="{{ route('privacy.policy') }}" class="text-white"><small><b>Privacy Policy</b></small></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>