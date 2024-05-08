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
								<h3 class="page-title">Agenda BKPD</h3>
								<ul class="breadcrumb">

									<li class="breadcrumb-item active">Agenda BPKD</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" class="btn add-btn" data-toggle="modal" data-target="#add_agenda" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah Agenda Baru</button>
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
                                                    <th>Nama Agenda</th>
                                                    <th>Lokasi</th>
                                                    <th>Tanggal dan Waktu</th>


											<th class="text-right">Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_agenda }}</td>
                                            <td>{{ $item->lokasi }}</td>
                                            <td>{{ date('d F Y', strtotime($item->tgl_agenda)) }} {{ $item->waktu }}</td>
											<td class="text-right">
                                             <button type="button" class="btn btn-warning" href="#"  data-toggle="modal" data-target="#update_agenda" class="edit-icon"
                                            data-idagnd="{{$item->id_agenda}}"
                                            data-nmagnd="{{$item->nama_agenda}}"
                                            data-tgl="{{$item->tgl_agenda}}"
                                            data-wkt="{{$item->waktu}}"
                                            ><i class="fa fa-pencil"></i> Edit</a></button>


                                            <button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_agenda" class="edit-icon" data-idagnd="{{$item->id_agenda}}" data-agnd="{{$item->nama_agenda}}"  ><i class="fa fa-trash"></i> Delete</a></button>
                                            </td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>




  {{-- <div class="modal fade" role="dialog" id="imgmodal">
    <div class="modal-dialog">
        <div class="modal-content"></div>
                    <img class="img-responsive" src="" id="show-img" width="100%" height="100%" />
        </div>
    </div> --}}
</div>


    <!-- content -->

    <div class="modal fade" id="add_agenda" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveAgenda') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Agenda</label>
                        <input type="text" class="form-control" id="nama_agenda" name="nama_agenda" placeholder="Masukkan Agenda Baru" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Lokasi Agenda</label>
                        <textarea class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi Agenda Baru" required></textarea>
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
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Agenda Baru" required></textarea>
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


<div class="modal fade" id="hapus_agenda" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteAgenda') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Apakah anda yakin akan menghapus Agenda tersebut ?</label>
                        <input type="hidden" class="form-control" id="id_agenda" name="id_agenda" readonly required>
                        <input type="text" class="form-control" id="nama_agenda" name="nama_agenda" readonly required>
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



<div class="modal fade" id="update_agenda" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('admin/agenda/agenda_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Agenda</label>
                        <input type="hidden" class="form-control" id="id_agenda" name="id_agenda" readonly required>
                        <input type="text" class="form-control" id="nama_agenda" name="nama_agenda" placeholder="Masukkan Kategori Post" required>
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

$('#update_agenda').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget)
var ID = button.data('idagnd')
var Agnd = button.data('agnd')


var modal = $(this)
modal.find('.modal-body #id_agenda').val(ID)
modal.find('.modal-body #nama_agenda').val(Agnd)



})


$('#hapus_agenda').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idagnd')
var agnd = button.data('agnd')


var modal = $(this)
modal.find('.modal-body #id_agenda').val(ID)
modal.find('.modal-body #nama_agenda').val(agnd)

})

</script>
