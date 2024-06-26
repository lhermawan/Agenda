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
                    <h3 class="page-title">Event</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Event</a></li>
                        <li class="breadcrumb-item active">Semua Event</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                <a href="{{ route('admin/event/tambah_event') }}" class="btn add-btn"><i class="fa fa-plus"></i> Tambah Event Baru</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->


<!-- Search Filter -->


<div class="row filter-row">



<div class="col-sm-6 col-md-2">
<form class="form" method="get">
<div class="form-group form-focus">
<select class="form-control @error('id_kategori_post') is-invalid @enderror" value="{{ request('id_kategori_post') }}" name="id_kategori_post" id="id_kategori_post" required>
                                    <option  value=""></option>
                                    @foreach ($kategori as $kate)
                                        <option  value="{{$kate->id_kategori_post}}">{{$kate->nama_kategori}}</option>
                                    @endforeach
                                    </select>

<label class="focus-label">Kategori Event</label>
</div>
</div>




<div class="col-sm-6 col-md-1">
<button type="submit" class="btn btn-success btn-block"> Cari </a></button>
</div>
</form>

<div class="col-sm-6 col-md-2">
<a href="{{ route('admin/event/data_event') }}" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
</div>

</div>


    <script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>




						<div class="col-md-12">
							<div class="table-responsive-sm">
								<table class="table tablesorter datatable">
									<thead>
										<tr>
                                                    <th>NO</th>
                                                    <th>Kategori</th>
                                                    <th>Judul event</th>
                                                    <th width="400px">Foto event</th>

                                                    <th>Tanggal Waktu</th>
                                                    <th>Status Posting</th>

											<th class="text-right">Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->kategori_post->nama_kategori }}</td>
                                            <td>{{ $item->title }}</td>


                                            <td>
                                            <a class="thumbnail" href="#"> <img class="img-responsive" src="{{ URL::to('/images/event/'. $item->avatar) }}" alt="{{ $item->title }}" width="10%" height="20%"></a>
                                            <P style="color:red;">(Klik Gambar Untuk Memperbesar)</p>
                                            </td>

                                            <td>{{ date('d F', strtotime($item->tanggal_mulai)) }} - {{ date('d F Y', strtotime($item->tanggal_selesai)) }}</td>
											<td>{{ $item->post_status }}</td>


											<td class="text-right">
                                            <a type="button" class="btn btn-warning"  href="{{ url('admin/event/edit_event/'.$item->id_event) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                            <!-- <button type="button" class="btn btn-warning" href="#"  data-toggle="modal" data-target="#update_cabor" class="edit-icon"
                                            data-idcabor="{{$item->id_jenis_cabor}}"
                                            data-jenis="{{$item->jenis_olahraga}}"
                                            data-alamatt="{{$item->alamat}}"
                                            data-kapasitass="{{$item->kapasitas}}"
                                            data-keterangann="{{$item->keterangan}}"
                                            data-kordinatt="{{$item->kordinat}}"
                                            data-venue="{{ URL::to('/images/venue/'. $item->venue) }}"
                                            data-venue2="{{$item->venue}}"
                                            ><i class="fa fa-pencil"></i> Edit</a></button> -->

                                            <button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_event" class="edit-icon" data-idevent="{{$item->id_event}}" data-title="{{$item->title}}"><i class="fa fa-trash"></i> Hapus</a></button>
                                            </td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
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




<div class="modal fade" id="hapus_event" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteevent') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Apalah kamu yakin akan menghapus event dengan judul tersebut?</label>
                        <input type="hidden" class="form-control" id="id_event" name="id_event" readonly required>
                        <input type="text" class="form-control" id="title" name="title"readonly required>
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


$('#hapus_event').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idevent')
var Title = button.data('title')


var modal = $(this)
modal.find('.modal-body #id_event').val(ID)
modal.find('.modal-body #title').val(Title)

})

</script>
