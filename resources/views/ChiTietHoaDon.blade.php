@extends('adminMasterLayout')
@section('pageContent')


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Chi tiết hóa đơn</h3>
              
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
                    <h2>Chi tiết hóa đơn</h2>
                      <div id="tests"></div>
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
                   <div>
                     <div>
                      <h2>Thông tin thuê phòng:</h2>
                   @if(isset($dataRoom))
                       @foreach($dataRoom as $roomInfo)
                       <table class="table table-bordered">
                         <thead>
                           <th>Mã phòng</th>
                           <th>Mã khách hàng</th>
                           <th>Tên khách hàng</th>
                           <th>Ngày nhận phòng</th>
                                   <th>Ngày trả phòng</th>
                                   <th>Mã hóa đơn</th>
                         </thead>
                         <tbody>
                                 <td>{{ $roomInfo->maPhong }}</td>
                                 <td>{{ $roomInfo->maKH }}</td>
                       <td>{{ $roomInfo->tenGoiKH }}</td>
                       <td>{{ $roomInfo->ngayNhanPhong }}</td>
                       <td>{{ $roomInfo->ngayTraPhong }}</td>
                   <td>{{ $roomInfo->maHoaDon }}</td>
                         </tbody>
                       </table>
                 
                       @endforeach
                   @endif
                     </div>
                   </div>
         <div>
               <h2>Thông tin dịch vụ:</h2>
                   @if(isset($dataDV))
                    <table class="table table-bordered">
                         <thead>
                         
                           <th>Mã khách hàng</th>
                           <th>Mã dịch vụ</th>
                           <th>Tên dịch vụ</th>
                                   <th>Thời gian sử dụng</th>
                                   <th>Mã hóa đơn</th>
                         </thead>
                         <tbody>

                       @foreach($dataDV as $dv)
                       <tr>
                       <td>{{ $dv->maKH }}</td>
                       <td>{{ $dv->maLoaiDichVu }}</td>
                            <td>{{ $dv->tenDichVu }}</td>
                       <td>{{ $dv->ThoiGian }}</td>
                       <td>{{ $dv->maHoaDon }}</td>
            </tr>
                 
                       @endforeach
                         </tbody>
                 </table>
                   @endif
                     </div>
                   </div>
                  </div>
                </div>
              </div>

              

              

          
            </div>
          </div>
        </div>
        <!-- /page content -->

       @endsection