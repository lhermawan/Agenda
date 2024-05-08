@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')
@include('layouts.image')

<div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Regulasi</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Regulasi</a></li>
									<li class="breadcrumb-item active">Semua Regulasi</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" class="btn add-btn" data-toggle="modal" data-target="#add_regulasi" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah Regulasi Baru</button>
							</div>
						</div>
					</div>
					<!-- /Page Header -->



{{-- @include('sweetalert::alert') --}}

{{-- message --}}
    {{-- {!! Toastr::message() !!} --}}

    <script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>



					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                                    <th>NO</th>
                                                    <th>Judul</th>
                                                    <th>Jenis FIle</th>
                                                    <th>Tanggal</th>
                                                    <th>File</th>
                                                    <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                            <td>{{ ++$key }}</td>
         									<td>{{ $item->judul }}</td>
                                             <td>{{ $item->jenis }}</td>
                                             <td>{{ $item->tanggal }}</td>
                                            <td><a href="{{ url('admin/regulasi/download_file/'.$item->id_regulasi) }}" type="button" class="btn btn-info"><i class="fa fa-cloud-download"></i> Download</a></td>
                                            <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_regulasi" class="edit-icon" data-id="{{$item->id_regulasi}}" data-judul="{{$item->judul}}"><i class="fa fa-trash"></i> Hapus</a></button>
                                            </td>


										</tr>
                                        @endforeach
									</tbody>
								</table>
                                {{ $data->links() }}
							</div>
						</div>
					</div>
                </div>



    <div class="modal fade" id="add_regulasi" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Regulasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveRegulasi') }}" method="POST" enctype="multipart/form-data">
                @csrf



                    <div class="form-group">
                        <label for="formGroupExampleInput2">Judul Regulasi</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>

                    <div class="form-group">
                        <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                            <option  value="">---Pilih Jenis File---</option>
                            <option  value="Peraturan Organisasi">Peraturan Organisasi</option>
                            <option  value="RENSTRA">RENSTRA</option>
                            <option  value="Anggaran Rumah Tangga">Anggaran Rumah Tangga </option>
                            <option  value="SK Organisasi">SK Organisasi</option>
                            <option  value="Form">Form</option>
                            <option  value="Peraturan Olahraga Mobil">Peraturan Olahraga Mobil</option>
                            <option  value="Peraturan Olahraga Motor">Peraturan Olahraga Motor</option>
                            </select>
                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">File</label>
                        <input type="file" class="form-control" id="file" name="file" required>
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

<div class="modal fade" id="hapus_regulasi" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Regulasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteRegulasi') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                    <label for="formGroupExampleInput">Apakah kamu yakin akan menghapus regulasi dengan judul tersebut?</label>
                        <input type="hidden" class="form-control" id="id_regulasi" name="id_regulasi" readonly required>
                        <input type="text" class="form-control" id="judul" readonly required>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- content -->


    @include('layouts/footer')

<script>
    $(document).ready(function(){
        $("img").click(function(){
           var img=$(this).attr('src');
             $("#show-img").attr('src',img);
             $("#imgmodal").modal('show');
        });
    });
</script>


<script type="text/javascript">


$('#hapus_regulasi').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Judul = button.data('judul')


var modal = $(this)
modal.find('.modal-body #id_regulasi').val(ID)
modal.find('.modal-body #judul').val(Judul)

})

</script>

