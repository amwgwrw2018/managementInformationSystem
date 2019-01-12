@extends('adminMasterLayout')
@section('pageContent')

<script type="text/javascript">
  function exportImageKHTiemNang(){
    var canvas=document.getElementById('KHTiemNangChart');
     var image = canvas.toDataURL("image/png");
   document.write('<img src="'+image+'"/>');
  }


</script>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Thống kê 10 khách hàng thân thiết</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thống kê 10 khách hàng thân thiết</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <canvas id="KHTiemNangChart"  ></canvas>
                      <a id="downloadRoomChart" onclick="downloadCanvas('downloadRoomChart','KHTiemNangChart')" class="btn btn-default" style="background-color: yellow;" >DOWNLOAD</a>
       @if(isset($dataKHTNangTable))
      <div class="container">
        <p style="font-size: 25px;">Thống kê 10 khách hàng thân thiết</p>
          <table class="table table-bordered">
          <tr>
            <th>Số lượng đặt phòng</th>
            <th>Mã khách hàng</th>

          </tr>
             @foreach($dataKHTNangTable as $data)
          <tr>
    
       <td>{{ $data->soluongdatphong }}</td>
       <td>{{ $data->maKH }} ({{ $data->tenGoiKH }})</td>
    </tr>
       @endforeach
        </table>
         <a href="{{ url('dataKHTNangExcel') }}" class="btn btn-default" style="background-color: yellow;">EXPORT EXCEL</a>
        
      </div>
       @endif
                  </div>
                </div>
              </div>

              

              

          
            </div>
          </div>
        </div>
        <!-- /page content -->

       @endsection