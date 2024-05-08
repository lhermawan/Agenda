<!-- Footer -->
<footer class="footer mt-auto py-4">
    <div class="container">
      <hr class="my-4">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2024 - Made With Love By.<a href="https://www.instagram.com/luckyhrmwnroza/" target="_blank" class="text-danger text-decoration-none">@luckyhrmwnroza </a>.
      </div>
    </div>
  </footer>

  <!-- load file audio bell antrian -->
  <audio id="tingtung" src="{{ URL::to('template/audio/tingtung.mp3') }}"></audio>

  <!-- jQuery Core -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>
  {{-- <script type="text/javascript">
    $(function () {
          var table = $('#tabel-agenda').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('home') }}",
              columns: [
                  {data: 'nama_agenda', name: 'nama_agenda'},
                  {data: 'lokasi', name: 'lokasi'},
                  {data: 'tgl_agenda', name: 'tgl_agenda'},
              ]
          });
        });
</script> --}}

  <script type="text/javascript">



    //   var table = $('#tabel-agenda').DataTable({
    //     "lengthChange": false,              // non-aktifkan fitur "lengthChange"
    //     "searching": false,                 // non-aktifkan fitur "Search"
    //     "ajax": "{{ route('home') }}",          // url file proses tampil data dari database
    //     // menampilkan data
    //     "columns": [


    //         {
    //         "data": "nama_agenda",
    //         "width": '250px',
    //         "className": 'text-center'
    //       },
    //       {
    //         "data": "lokasi",
    //         "width": '250px',
    //         "className": 'text-center'
    //       },
    //       {
    //         "data": "waktu",
    //         "width": '250px',
    //         "className": 'text-center'
    //       },
    //       {
    //         "data": "tgl_agenda",
    //         "width": '250px',
    //         "className": 'text-center'
    //       },
    //       {
    //         "data": "status",
    //         "visible": false
    //       },
    //       {
    //         "data": null,
    //         "orderable": false,
    //         "searchable": false,
    //         "width": '100px',
    //         "className": 'text-center',
    //         "render": function(data, type, row) {
    //           // jika tidak ada data "status"
    //           if (data["status"] === "") {
    //             // sembunyikan button panggil
    //             var btn = "-";
    //           }
    //           // jika data "status = 0"
    //           else if (data["status"] === "1") {
    //             // tampilkan button panggil
    //             var btn = "<button id=\"mic\" class=\"btn btn-success btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
    //           }
    //           // jika data "status = 1"
    //           else if (data["status"] === "0") {
    //             // tampilkan button ulangi panggilan
    //             var btn = "<button id=\"mic\" class=\"btn btn-secondary btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
    //           };
    //           return btn;
    //         }
    //       },
    //     ],
    //     "order": [
    //       [0, "desc"]             // urutkan data berdasarkan "no_antrian" secara descending
    //     ],
    //     "iDisplayLength": 10,     // tampilkan 10 data per halaman

    //   });





// Event handler untuk tombol
$('#tabel-agenda tbody').on('click', 'button', function() {
    // Ambil data dari DataTable
    var data = table.row($(this).parents('tr')).data();
    // Buat variabel untuk menampilkan data "id"
    var id = data["id_agenda"];
    // Buat variabel untuk menampilkan audio bell antrian
    var bell = document.getElementById('tingtung');

    // Mainkan suara bell antrian
    bell.pause();
    bell.currentTime = 0;
    bell.play();

    // Set delay antara suara bell dengan suara nomor antrian
    durasi_bell = bell.duration * 770;

    // Mainkan suara nomor antrian
    setTimeout(function() {
        responsiveVoice.speak("Agenda pada "+ data["waktu"] +"," + data["nama_agenda"] + ", bertempat di ,"+ data["lokasi"] +" " , "Indonesian Male", {
            rate: 0.9,
            pitch: 1,
            volume: 1
        });
    }, durasi_bell);

    // Proses update data
    $.ajax({
        type: "POST",               // Mengirim data dengan method POST
        url: "{{ route('admin/agenda/agenda_update') }}",          // Url file proses update data
        data: { id_agenda: id }            // Tentukan data yang dikirim
    });
});


  </script>




</body>

</html>
