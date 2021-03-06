@extends('adminMasterLayout')
@section('pageContent')


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lương chi tiết</h3>
                     <h5 id="tttt"></h5>
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
                    <h2>Lương chi tiết</h2>
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
                   
                    <table id="dataXemLuong" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                     
                          <th>Tên NV</th>
                          <th>Tháng trả lương</th>
                          <th>Lương tháng</th>
                          <th>Lương thưởng thêm</th>
                          <th>Lương trừ</th>
                          <th>Tổng lương</th>
                          <th>Tình trạng chi trả</th>
                          <th>Hình thức chi trả</th>
                        <th>Thời gian chi trả</th>
                        <th>Tình trạng duyệt lương</th>
                        
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($salaryData))

                       @foreach($salaryData as $salary )
<td>{{ $salary->maNV }}</td>
<td>{{ $salary->ThangTraLuong }}</td>
<td>{{ $salary->LuongThang }}</td>
<td>{{ $salary->LuongThuongThem }}</td>
<td>{{ $salary->LuongBiTru }}</td>
<td>{{ $salary->LuongThang+$salary->LuongThuongThem-$salary->LuongBiTru }}</td>
<td>{{ $salary->TinhTrangChiTra }}</td>
<td>{{ $salary->HinhThucChiTra }}</td>
<td>{{ $salary->thoiGianDuocChiTra }}</td>
@if($salary->tinhTrangDuyetLuong==0)
  <td>Chưa</td>
@else
<td>Rồi</td>
@endif



        

                 @endforeach
                 
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              

              

          
            </div>
          </div>
        </div>
        <!-- /page content -->

       @endsection