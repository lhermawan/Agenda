@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')
<div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Kategori Post</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Post</a></li>
									<li class="breadcrumb-item active">Kategori Post</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" class="btn add-btn" data-toggle="modal" data-target="#add_kategori" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah Kategori Post</button>
							</div>
						</div>
					</div>
					<!-- /Page Header -->


<!-- /Search Filter -->
@include('sweetalert::alert')

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
                                                    <th>Kategori</th>
                                                    <th>Jenis</th>


											<th class="text-right">Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>{{ $item->jenis }}</td>
											<td class="text-right">
                                             <button type="button" class="btn btn-warning" href="#"  data-toggle="modal" data-target="#update_kategori" class="edit-icon"
                                            data-idkate="{{$item->id_kategori_post}}"
                                            data-kate="{{$item->nama_kategori}}"
                                            data-jns="{{$item->jenis}}"
                                            ><i class="fa fa-pencil"></i> Edit</a></button>


                                            <button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_kategori" class="edit-icon" data-idkate="{{$item->id_kategori_post}}" data-kate="{{$item->kategori}}"  ><i class="fa fa-trash"></i> Delete</a></button>
                                            </td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>




  <div class="modal fade" role="dialog" id="imgmodal">
    <div class="modal-dialog">
        <div class="modal-content"></div>
                    <img class="img-responsive" src="" id="show-img" width="100%" height="100%" />
        </div>
    </div>
</div>


    <!-- content -->

    <div class="modal fade" id="add_kategori" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveKategoriPost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kategori Post</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Kategori Post Baru" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                            <option  value="">---Pilih Jenis Kategori---</option>
                            <option  value="Berita">Berita</option>
                            <option  value="Event">Event</option>

                            </select>
                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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


<div class="modal fade" id="hapus_kategori" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteKategoriPost') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Apakah anda yakin akan menghapus kategori post tersebut, jika dihapus maka semua post dengan kategori tersebut akan terhapus?</label>
                        <input type="hidden" class="form-control" id="id_kategori_post" name="id_kategori_post" readonly required>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" readonly required>
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



<div class="modal fade" id="update_kategori" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Kategori Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('admin/post/kategori_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kategori</label>
                        <input type="hidden" class="form-control" id="id_kategori_post" name="id_kategori_post" readonly required>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Kategori Post" required>
                    </div>



                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    @include('layouts/footer')




<script type="text/javascript">

$('#update_kategori').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget)
var ID = button.data('idkate')
var Kate = button.data('kate')


var modal = $(this)
modal.find('.modal-body #id_kategori_post').val(ID)
modal.find('.modal-body #nama_kategori').val(Kate)



})


$('#hapus_kategori').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idkate')
var Kate = button.data('kate')


var modal = $(this)
modal.find('.modal-body #id_kategori_post').val(ID)
modal.find('.modal-body #nama_kategori').val(Kate)

})

</script>
