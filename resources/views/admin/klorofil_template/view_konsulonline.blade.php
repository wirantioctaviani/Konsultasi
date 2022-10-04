@extends('admin.master')

@section('content')
<div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
              <!-- TABLE HOVER -->
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                  <h2 class="panel-title">Layanan Konsultasi</h2>
                </div>

                  <div class="panel-body">
                    @foreach($data_konsul_online as $data_konsul_online)
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->nama}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Unit Kerja</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->unit_kerja}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->jabatan}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Layanan</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->jenis_layanan}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->judul}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>
                      @endforeach

                    
                    <div class="tab-content">
                      <div class="tab-pane fade in active" id="tab-bottom-left1">
                        <ul class="comment-section">
                        <ul class="list-unstyled activity-timeline">
                          @foreach($data_konsul_detail as $data_konsul_detail)
                          <li>
                            <i class="fa fa-comment activity-icon"></i>
                            <p>{{$data_konsul_detail->detail}}<span class="timestamp">{{$data_konsul_detail->created_by}} {{$data_konsul_detail->created_at}}</span></p>
                          </li>
                          @endforeach 
                        </ul>
                        </ul>
                      </div>
                    </div>
                         
                      </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT -->
</div>
@stop


