@extends('adminMasterLayout')
@section('pageContent')

<script type="text/javascript">
  function exportImageTKDatPhong(){
    var canvas=document.getElementById('ReservedRoomChart');
 var image = canvas.toDataURL("image/png");
   document.write('<img src="'+image+'"/>');
  }


</script>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Phòng</h3>
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
                    <h2>Phòng</h2>
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
                     <canvas id="ReservedRoomChart"  ></canvas>
                        <a id="downloadRoomChart" class="btn btn-default" style="background-color: yellow;"  onclick="downloadCanvas('downloadRoomChart','ReservedRoomChart')" >DOWNLOAD</a>
       @if(isset($dataReservedRoomTable))
      <div class="container">
        <p style="font-size: 25px;">Số lượng thuê phòng 12 tháng gần nhất</p>
          <table class="table table-bordered">
          <tr>
            <th>Tháng năm</th>
            <th>Số lượng thuê phòng</th>

          </tr>
             @foreach($dataReservedRoomTable as $data)
          <tr>
    
       <td>{{ $data->month }}-{{ $data->year }}</td>
       <td>{{ $data->soLuongDatPhong }}</td>
    </tr>
       @endforeach
        </table>
         <a href="{{ url('excelThongKeDatPhong') }}" class="btn btn-default" style="background-color: yellow;">EXPORT EXCEL</a>
        
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