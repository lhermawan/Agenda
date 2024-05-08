@include('layout_frontend.header')
{{-- @include('layout_frontend.sidebar') --}}

<script type="text/javascript">
    $(document).ready(function(){
         // set interval 1 detik
         setInterval(function(){
            // baca waktu saat ini
            var today = new Date();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            // cek kesesuaian waktu saat ini dg waktu skedul auto click
            if (time == "08:32:0") {
                document.querySelector('#auto-click-btn').click();
            } else if (time == "13:0:0"){
                document.querySelector('#image2').click();
            }
         }, 1000);
    });
    </script>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-4">
      <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
        <!-- judul halaman -->
        <div class="d-flex align-items-center me-md-auto">
          <i class="bi-mic-fill text-success me-3 fs-3"></i>
          <h1 class="h5 pt-2">Informasi Agenda BPKD Kabupaten Ciamis</h1>
        </div>
        <!-- breadcrumbs -->
        <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="http://www.indrasatya.com/"><i class="bi-house-fill text-success"></i></a></li>
              <li class="breadcrumb-item" aria-current="page">Dashboard</li>
              <li class="breadcrumb-item" aria-current="page">Agenda BPKD</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <!-- menampilkan informasi jumlah antrian -->
        {{-- <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-people text-warning"></i>
                </div>
                <div>
                  <p id="jumlah-antrian" class="fs-3 text-warning mb-1"></p>
                  <p class="mb-0">Jumlah Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- menampilkan informasi nomor antrian yang sedang dipanggil -->
        {{-- <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person-check text-success"></i>
                </div>
                <div>
                  <p id="antrian-sekarang" class="fs-3 text-success mb-1"></p>
                  <p class="mb-0">Antrian Sekarang</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi nomor antrian yang akan dipanggil selanjutnya -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person-plus text-info"></i>
                </div>
                <div>
                  <p id="antrian-selanjutnya" class="fs-3 text-info mb-1"></p>
                  <p class="mb-0">Antrian Selanjutnya</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi jumlah antrian yang belum dipanggil -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person text-danger"></i>
                </div>
                <div>
                  <p id="sisa-antrian" class="fs-3 text-danger mb-1"></p>
                  <p class="mb-0">Sisa Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>

      <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="table-responsive">
            <table id="tabel-agenda" class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Agenda</th>
                                <th>Lokasi</th>
                                <th>Tanggal & Waktu</th>





                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach ($agenda as $key => $item)
                    <tr>
                    <td>{{ ++$key }}</td>
                     <td id="id_agenda" hidden>{{ $item->id_agenda }}</td>
                        <td id="teks-suara">{{ $item->nama_agenda }}</td>
                        <td id="lokasi">{{ $item->lokasi }}</td>
                        <td>{{ date('d F Y', strtotime($item->tgl_agenda)) }} {{ $item->waktu }}</td>
                        <td class="text-right">
                          <button id="auto-click-btn" class="btn auto-click-btn btn-success btn-sm rounded-circle" onclick="var bell = document.getElementById('tingtung');

                          // Mainkan suara bell antrian
                          bell.pause();
                          bell.currentTime = 0;
                          bell.play();

                          // Set delay antara suara bell dengan suara nomor antrian
                          durasi_bell = bell.duration * 770;
                          setTimeout(function() {
                            responsiveVoice.speak('Agenda Pada {{ $item->waktu }} , {{ $item->nama_agenda }} , Bertempat di {{ $item->lokasi }}','Indonesian Female', {
            rate: 0.9,
            pitch: 1,
            volume: 1
        });
    }, durasi_bell);
                            // responsiveVoice.speak('Agenda Pada {{ $item->waktu }} , {{ $item->nama_agenda }} , Bertempat di {{ $item->lokasi }}','Indonesian Female');"><i class="bi-mic-fill"></i></button>
                        </td>
                    </tr>
                    @endforeach
              </thead>
            </table>

          </div>
        </div>
      </div>
    </div>
  </main>


@include('layout_frontend.footer')
