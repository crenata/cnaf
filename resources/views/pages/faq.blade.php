@extends('template')

@section('title', 'FAQ')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/faq/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/faq/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/faq/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/faq/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/faq/xl.css') }}" media="screen and (min-width: 1200px)">
@endsection

@section('content-container')
    <h5 class="font-weight-bold text-danger mt-5 mt-sm-5 mt-md-5 mt-lg-5 mt-xl-5">FAQ</h5>
    <div class="accordion mt-5 mt-sm-5 mt-md-5 mt-lg-5 mt-xl-5" id="accordion-faq">
        <div class="faq-item">
            <div class="" id="heading1">
                <h6 class="font-weight-bold">
                    <a class="d-block text-danger collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        Apakah SobatCNAF itu?
                    </a>
                </h6>
            </div>
            <div id="collapse1" class="collapse mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3" aria-labelledby="heading1" data-parent="#accordion-faq">
                <p>www.sobatcnaf.com, www.sobatcnaf.id, www.sobatcnaf.co.id, selanjutnya disebut sobatcnaf, adalah situs resmi yang merupakan hasil kerjasama dengan PT. CIMB Niaga Auto Finance selanjutnya disebut dengan CNAF, untuk memberikan informasi kepada publik mengenai fasilitas Kredit Multi Guna yaitu pembiayaan dengan jaminan kendaraan bermotor roda empat serta memberikan jasa untuk membantu konsumen yang ingin mengajukan fasilitas pembiayaan tersebut. Selain itu sobatcnaf juga menawarkan berbagai produk dengan penawaran khusus dan eksklusif bagi konsumen pilihan CNAF dan/atau konsumen yang mengajukan dan telah mendapatkan persetujuan fasilitas pembiayaan melalui sobatcnaf.</p>
            </div>
            <hr>
        </div>

        <div class="faq-item">
            <div class="" id="heading2">
                <h6 class="font-weight-bold">
                    <a class="d-block text-danger collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Apa yang dimaksud dengan Kredit Multi Guna dan apa saja keuntungannya?
                    </a>
                </h6>
            </div>
            <div id="collapse2" class="collapse mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3" aria-labelledby="heading2" data-parent="#accordion-faq">
                <p>Kredit Multi Guna adalah produk finansial yang memberikan pinjaman kepada nasabah dengan jaminan asset seperti tanah dan kendaraan bermotor baik roda 2 maupun roda 4. Untuk saat ini sobatcnaf hanya menawarkan fasilitas Kredit Multi Guna dengan jaminan kendaraan bermotor roda 4 dari CNAF. Kredit Multi Guna dapat digunakan untuk berbagai keperluan konsumen baik keperluan pembelian konsumtif maupun untuk keperluan usaha.</p>
                <p>Keuntungan fasilitas Kredit Multi Guna adalah :</p>
                <ul>
                    <li>Limit Kredit yang cukup tinggi hingga 80% dari nilai jaminan</li>
                    <li>Jangka waktu cicilan yang fleksibel dari 1 - 4 tahun</li>
                </ul>
            </div>
            <hr>
        </div>

        <div class="faq-item">
            <div class="" id="heading3">
                <h6 class="font-weight-bold">
                    <a class="d-block text-danger collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        Apa kelebihan yang diperoleh dengan mengajukan fasilitas pembiayaan melalui SobatCNAF?
                    </a>
                </h6>
            </div>
            <div id="collapse3" class="collapse mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3" aria-labelledby="heading3" data-parent="#accordion-faq">
                <p>Beberapa kelebihan dan keuntungan pengajuan melalui sobatcnaf :</p>
                <ul>
                    <li>Sobatcnaf merupakan mitra yang ditunjuk secara resmi oleh CNAF sehingga memberikan jaminan keamanan bagi pengguna terhadap data pengguna maupun berbagai infomasi yang tersedia</li>
                    <li>Pengguna dapat memperoleh  berbagai informasi yang berkaitan dengan fasilitas pembiayaan serta berbagai informasi berkaitan dengan biaya-biaya serta suku bunga yang dikenakan secara terbuka / transparan</li>
                    <li>Biaya dan suku bunga yang bersaing, proses pengajuan sangat mudah dan cepat dengan metode online dan real-time, proses persetujuan maksimum 1 jam (60 menit) apabila pengajuan pada hari dan jam kerja serta data dan dokumen memenuhi persyaratan, proses pencairan cepat berdasarkan ketersediaan waktu pengguna mengunjungi cabang CNAF yang dipilih untuk menandatangani perjanjian kredit</li>
                    <li>Kantor cabang tersebar hampir di seluruh kota di Indonesia</li>
                    <li>Berbagai penawaran khusus yang hanya bisa didapatkan melalui sobatcnaf</li>
                    <li>Bagi pengguna yang belum maupun sudah memanfaatkan fasilitas pembiayaan dapat mengikuti program Referral atau Member Get Member yang akan memberikan bonus tunai yang sangat menarik, syarat dan ketentuan berlaku, bagi pengguna yang berminat silahkan <a href="#" class="">klik disini</a></li>
                </ul>
            </div>
            <hr>
        </div>

        <div class="faq-item">
            <div class="" id="heading4">
                <h6 class="font-weight-bold">
                    <a class="d-block text-danger collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        Apakah pengguna harus mendaftarkan diri menjadi anggota sobatcnaf?
                    </a>
                </h6>
            </div>
            <div id="collapse4" class="collapse mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3" aria-labelledby="heading4" data-parent="#accordion-faq">
                <p>Untuk mendapatkan berbagai informasi hingga layanan pengajuan fasilitas pembiayaan, pengguna tidak perlu mendaftarkan diri sebagai anggota namun kami sarankan Anda mendaftarkan diri agar selalu mendapatkan update berbagai penawaran menarik, informasi maupun program promosi. Setiap pengguna yang mendaftarkan diri dan/atau memanfaatkan fasilitas pembiayaan melalui sobatcnaf, secara otomatis terdaftar sebagai anggota sobatcnaf dan anggota deGadai.</p>
            </div>
            <hr>
        </div>

        <div class="faq-item">
            <div class="" id="heading5">
                <h6 class="font-weight-bold">
                    <a class="d-block text-danger collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        Apa keuntungan mengikuti program Member Get Member?
                    </a>
                </h6>
            </div>
            <div id="collapse5" class="collapse mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3" aria-labelledby="heading5" data-parent="#accordion-faq">
                <p>Dengan menjadi anggota program MGM (Member Get Member) sobatcnaf, maka anggota program MGM dapat membantu kerabat ataupun rekan-rekan yang memerlukan fasilitas pembiayaan khususnya dengan jaminan BPKB kendaraan bermotor roda empat. Untuk setiap pengguna yang memanfaatkan fasilitas pembiayaan melalui sobatcnaf atas referensi anggota program MGM, maka anggota program MGM akan mendapatkan bonus tunai sesuai dengan ketentuan yang ada.</p>
            </div>
            <hr>
        </div>

        <div class="faq-item">
            <div class="" id="heading6">
                <h6 class="font-weight-bold">
                    <a class="d-block text-danger collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                        Bagaimana cara mengikuti program MGM sobatcnaf?
                    </a>
                </h6>
            </div>
            <div id="collapse6" class="collapse mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3" aria-labelledby="heading6" data-parent="#accordion-faq">
                <p>Berikut adalah cara mengikuti program MGM sobatcnaf :</p>
                <ul>
                    <li>Program MGM sobatcnaf terbuka bagi siapapun yang mendaftarkan diri menjadi anggota program MGM sobatcnaf dengan ketentuan umum adalah Warga Negara Indonesia telah berusia minimum 17 tahun dan telah memiliki kartu identitas yang sah seta memiliki akun bank/rekening bank atas nama peserta sendiri</li>
                    <li>Pengguna wajib mengisi formulir pendaftaran program MGM sobatcnaf yang tersedia atau silahkan <a href="#" class="">klik disini</a></li>
                    <li>Pengguna wajib mengisi seluruh data dengan sebenar-benarnya termasuk data rekening bank yang diperlukan untuk transfer bonus yang diperoleh</li>
                    <li>Setelah mengisi formulir, sertakan nomor NPWP, klik persetujuan syarat dan ketentuan program MGM dan submit</li>
                    <li>Pengguna akan diminta untuk melakukan verifikasi alamat email</li>
                    <li>Setelah terverifikasi, maka pengguna akan mendapatkan nomor anggota MGM sobatcnaf yang berlaku sebagai kode referral dan alamat tautan/link yang dapat dikirimkan kepada kerabat dan rekanyang pengguna anggap memerlukan fasilitas pembiayaan, pada tautan ini sudah berisi informasi mengenai kode refrerral pengguna sehingga apabila penerima tautan/link ini sudah disetujui dan menerima fasilitas pembiayaan tersebut, secara otomatis pengguna yang memberikan referensi akan menerima bonus seusai dengan ketentuan dan akan langsung dibayarkan kepada rekening yang telah didaftarkan</li>
                    <li>Untuk mendapatkan bonus program MGM, seluruh pengguna yang direferensikan harus mengajukan permohonan fasilitas pembiayaan melalui tautan/link yang diberikan oleh pemberi referensi/referral, atau memasukkan kode referral dari program MGM yang memberikan referensi. Apabila pengguna baru tersebut tidak melalui tautan/link tersebut atau memasukkan kode referral pada kolom referral pada saat mengisi formulir pengajuan fasilitas pembiayaan, maka sistem sobatcnaf dapat mengidentifikasi pemberi referensi, dan pemberi referensi tidak akan mendapatkan bonus program MGM tersebut dan tidak dapat menuntut sobatcnaf atas hal ini</li>
                </ul>
            </div>
            <hr>
        </div>

        <div class="faq-item">
            <div class="" id="heading7">
                <h6 class="font-weight-bold">
                    <a class="d-block text-danger collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                        Bagaimana cara mengajukan fasilitas pembiayaan melalui sobatcnaf? (Create image process flow)
                    </a>
                </h6>
            </div>
            <div id="collapse7" class="collapse mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3" aria-labelledby="heading7" data-parent="#accordion-faq">
                <p>Berikut adalah cara mengajukan fasilitas pembiayaan melalui sobatcnaf :</p>
                <ul>
                    <li>Setelah masuk pada situs sobatcnaf Pengguna diwajibkan untuk membaca, memahami dan dianggap telah mengerti,  menyetujui dan tunduk pada Syarat dan Ketentuan penggunaan situs sobatcnaf</li>
                    <li>Silakan membaca dan mempelajari berbagai informasi yang tersedia berkaitan dengan pengajuan fasilitas pembiayaan</li>
                    <li>Pengguna dapat menggunakan kalkulator simulasi pembiayaan yang tersedia dengan memilih Merek, Type dan Tahun pembuatan kendaraan, Jangka waktu Kredit dan Jenis Asuransi, saat ini CNAF hanya memberikan fasilitas pembiayaan atas merek, type dan tahun pembuatan kendaraan sesuai dengan yang tertera pada menu pilihan, apabila merek, type dan tahun pembuatan kendaraan tidak tersedia maka Pengguna tidak dapat mengajukan fasilitas pembiayaan kepada CNAF</li>
                    <li>Setelah memasukan data tersebut diatas, maka Pengguna akan mendapatkan informasi maksimum nilai pembiayaan dan nilai angsuran per-bulan, Pengguna dapat merubah jangka waktu kredit dan/atau jenis asuransi untuk menyesuaikan nilai angsuran yang diinginkan</li>
                    <li>Pengguna juga dapat menyesuaikan nilai pembiayaan yang diinginkan dibawah nilai maksimum yang diberikan</li>
                    <li>Apabila Pengguna ingin mengajukan fasilitas pembiayaan, Pengguna dapat menekan tombol “Ajukan Pembiayaan”</li>
                    <li>Pengguna wajib melengkapi Formulir Pengajuan dengan mengisi seluruh data yang diminta dengan sebenar-benarnya serta melampirkan foto kartu identitas diri, foto BPKB serta 6 foto kendaraan dari 6 sudut sesuai dengan arahan yang diminta</li>
                    <li>Silakan periksa lagi data Anda dengan benar, bila sudah, silakan klik pada kolom Pernyataan keabsahan data diri dan kolom menyetujui syarat dan ketentuan pengajuan pembiayaan oleh CNAF lalu silakan tekan tombol Ajukan/ Submit</li>
                    <li>Pengguna  akan menerima konfirmasi bahwa pengajuan Pengguna akan segera diproses</li>
                    <li>Apabila pengajuan dilakukan pada hari dan jam kerja serta seluruh data dan dokumen memenuhi syarat maka Pengguna akan menerima jawaban atas pengajuan fasilitas pembiayaan tersebut selambatnya 60 menit, namun sobatcnaf tdiak bertanggung jawab atas keterlambatan proses akibat berbagai hal diluar kuasa sobatcnaf diantaranya akibat masalah jaringan koneksi, masalah kelistrikan ataupun kegagalan system</li>
                    <li>Pengguna akan menerima pemberitahuan melalui email atas hasil pengajuan fasilitas pembiayaan. Apabila disetujui dan Pengguna akan mengambil fasilitas pembiayaan tersebut, maka Pengguna wajib mengisi formulir konfirmasi jadual penandatanganan perjanjian kredit dengan memilih lokasi cabang CNAF yang terdekat serta hari dan waktu kedatangan yang tersedia</li>
                    <li>Keputusan atas hasil pengajuan fasilitas pembiayaan adalah sepenuhnya hak dan tanggung jawab CNAF dan Pengguna membebaskan sobatcnaf dari segala tuntutan</li>
                    <li>Persetujuan yang diberikan oleh CNAF adalah persetujuan prinsip dimana keputusan final adalah setelah Pengguna mengunjungi cabang CNAF sesuai dengan formulir konfirmasi serta membawa seluruh dokumen pendukung asli dan kendaraan yang diajukan untuk dilakukan pengecekan fisik oleh CNAF</li>
                </ul>
            </div>
            <hr>
        </div>
    </div>
@endsection