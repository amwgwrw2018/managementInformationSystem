@extends('adminMasterLayout')
@section('pageContent')

<script type="text/javascript">

function downloadCanvas(link,canvas) {
    document.getElementById(link).href = document.getElementById(canvas).toDataURL();
    document.getElementById(link).download = 'thongKe.png';
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
                     <canvas id="RoomChart"  style="height: 500px;float: left;margin-right: 40px;"></canvas>
                    <a id="downloadRoomChart" onclick="downloadCanvas('downloadRoomChart','RoomChart')"  class="btn btn-default" style="background-color: yellow;clear: both;">DOWNLOAD</a>
       @if(isset($dataChartForTable))
      <div class="container" style="clear: both;">
        <h2>Thống kê phòng trống-thuê</h2>         <table class="table table-bordered">
         <tr>
           <th>Số lượng phòng trống</th>
           <th>Tình trạng thuê phòng</th>
          </tr>
          <tr>
         <td>{{ $allRoom->soLuongPhong-$dataChartForTable ->soLuongPhongThue }}</td>
<td>Trống</td>
       </tr>
       

       <tr>
          <td>{{  $dataChartForTable ->soLuongPhongThue}}</td>
<td>Đã thuê</td>
       </tr>
    
        </table>
       <a href="{{ url('excelThongKePhong') }}" class="btn btn-default" style="background-color: yellow;">EXPORT EXCEL</a>
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