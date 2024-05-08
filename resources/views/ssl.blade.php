@include('layout_admin.header')
@include('layout_admin.sidebar')


    <div class="content">
      <div class="row">
        <div class="col-md-12">
            <!-- Live Search -->
            <form action="/website/cari" method="GET">
                <div class="input-wrapper">
                    <button class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="25px" width="25px">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"></path>
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M22 22L20 20"></path>
                      </svg>
                    </button>
                    <input placeholder="search.." class="input" name="text" type="text">
                  </div>
            </form>
            <!-- Live Search -->
          <div class="card ">
            <div class="card-header">
              <h4 class="card-title"> Status Website</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table tablesorter " id="">
                  <thead class=" text-primary ">
                    <tr>
                      <th width="900px">
                        Name
                      </th>
                      <th>
                        Owner
                      </th>
                      <th>
                        Status
                      </th>
                      <th class="text-center">
                        Expired Days
                      </th>

                    </tr>
                  </thead>
                  @foreach ($ssl as $key => $item)

                  <tbody>
                    <tr>
                      <td style="font-size: 20px;">
                        @if($item->status =='certificate')
                        <img src="{{ URL::to('backend/images/Green_circle.gif') }}" style="height:1%; width:1%">
                                            @endif
                        @if($item->status =='expired')
                        <img src="{{ URL::to('backend/images/Red_circle.gif') }}" style="height:1%; width:1%">
                                            @endif
                        {{$item->host }}
                      </td>
                      <td style="font-size: 20px;">
                        {{$item->owner }}
                      </td>
                      <td>
                        @if($item->status =='certificate')
                                            <span class="badge bg-success text-dark" style="font-size: 18px;">{{ $item->status }}</span>
                                            @endif

											@if($item->status =='expired')
                        <span class="badge bg-danger text-dark" style="font-size: 18px;">{{ $item->status }}</span>
                      @endif
                      </td>
                      <td class="text-center" style="font-size: 20px;">
                        @if($item->status =='certificate')
                        <span class="badge bg-success text-dark" style="font-size: 18px;">{{$item->expiry_date }} Days</span>
                                            @endif

											@if($item->status =='expired')
                                            <span class="badge bg-danger text-dark" style="font-size: 18px;">{{$item->expiry_date }} Days</span>
                                            @endif

                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    @include('layout_admin.footer')
