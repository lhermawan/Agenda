
@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')



<div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Tambah Agenda Baru</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Agenda</a></li>
									<li class="breadcrumb-item active">Tambah Agenda Baru</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					{{-- message --}}
                    {{-- {!! Toastr::message() !!} --}}
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Form Tambah Agenda</h4>
								</div>
								<div class="card-body">
                                    <form action="{{ route('saveAgenda') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Nama Agenda</label>
                                                <input type="text" class="form-control" id="nama_agenda" name="nama_agenda" placeholder="Masukkan Agenda Baru" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Lokasi Agenda</label>
                                                <textarea class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi Agenda Baru" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Tanggal Agenda</label>
                                                <input type="date" class="form-control" id="tgl_agenda" name="tgl_agenda" placeholder="Masukkan Tanggal Agenda Baru" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Waktu Agenda</label>
                                                <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Masukkan Waktu Agenda Baru" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Deskripsi Agenda</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Agenda Baru" required>
                                            </div>


                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                                            </div>
                                        </form>
								</div>
							</div>

        </div>
    </div>
    <!-- content -->
    @include('layouts/footer')


    {{-- <script>
    function createTextSlug()
    {
        var title = document.getElementById("title").value;
                    document.getElementById("title_slug").value = generateSlug(title);
    }
    function generateSlug(text)
    {
        return text.toString().toLowerCase()
            .replace(/^-+/, '')
            .replace(/-+$/, '')
            .replace(/\s+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/[^\w\-]+/g, '');
    }
</script> --}}
