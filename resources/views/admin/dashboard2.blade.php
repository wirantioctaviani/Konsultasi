@extends('admin.master2')

@section('content')
<section class="content-header">
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">LAYANAN KONSULTASI ONLINE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="panel-heading">
                  <h3 class="panel-title">Welcome, {{request()->session()->get('namalengkap')}}</h3>
              <p class="panel-subtitle">{{$mytime}}</p>
              </div>
                <div class="row">
                  @foreach($data_konsul_online as $data_konsul_online)
                        <div class="col-md-2">
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h1 style="text-align: center;"><b>{{$data_konsul_online->jumlah}}</b></h1>

                              <p style="text-align: center;"><b>{{$data_konsul_online->jenis_layanan}}</b></p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                            </div>
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                  @endforeach
                      </div>
                      <br>
                      <br>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
</section>
@stop
