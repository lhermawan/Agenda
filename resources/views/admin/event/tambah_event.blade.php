
@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')



<div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Tambah Event Baru</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Event</a></li>
									<li class="breadcrumb-item active">Tambah Event Baru</li>
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
									<h4 class="card-title mb-0">Form Tambah Event</h4>
								</div>
								<div class="card-body">
                                <form action="{{ route('saveevent') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Author</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('author') is-invalid @enderror" value="Admin" name="author" value="{{ old('author') }}" type="text" id="author" placeholder="Masukkan nama lengkap" readonly required>
                                                <input class="form-control @error('hits') is-invalid @enderror" value="0" name="hits" value="{{ old('hits') }}" type="hidden" id="hits"  readonly required>
                                                @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kategori Post</label>
                                            <div class="col-sm-10">
                                            <select class="form-control @error('id_kategori_post') is-invalid @enderror" name="id_kategori_post" id="id_kategori_post" required>
                                                <option  value="">---Pilih Jenis Kategori Post---</option>
                                                @foreach ($kategori as $k)
                                                    <option  value="{{$k->id_kategori_post}}">{{$k->nama_kategori}}</option>
                                                @endforeach
                                                </select>
                                                @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Judul Post</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" type="text" id="title" placeholder="Masukkan Judul event" onkeyup="createTextSlug()" required>
                                                @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title Slug (Terisi Otomatis)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('title_slug') is-invalid @enderror" name="title_slug" value="{{ old('title_slug') }}" type="text" id="title_slug"  readonly required>
                                                @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" type="date" id="tanggal_mulai" placeholder="Jadwal Event" required>
                                                @error('tanggal_mulai')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Selesai</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" type="date" id="tanggal_selesai" placeholder="Jadwal Event" required>
                                                    @error('tanggal_selesai')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Lokasi Event</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" type="text" id="lokasi" placeholder="Lokasi Event" required>
                                                    @error('lokasi')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>




                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto Post</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('avatar') is-invalid @enderror" type="file" name="avatar" id="avatar" accept="image/*" multiple="" required>
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Status Postingan</label>
                                            <div class="col-sm-10">
                                            <select class="form-control @error('post_status') is-invalid @enderror" name="post_status" id="post_status" required>
                                                    <option selected disabled>--Status Postingan--</option>
                                                    <option value="Publikasi">Publikasi</option>
                                                    <option value="Draft">Draft</option>
                                                </select>
                                                @error('role_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Publikasi</button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
                                            </div>
                                        </div>

										</div>
									</form>
								</div>
							</div>

        </div>
    </div>
    <!-- content -->
    @include('layouts/footer')


    <script>
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
</script>
