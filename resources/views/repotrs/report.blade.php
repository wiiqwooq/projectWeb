@extends('layouts.menureport')

@section('menurep')

            <h3><i class="fa fa-angle-right"></i>Reports</h3>
              <!-- page start-->
              <div id="morris">
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> รายงานข้อมูลรายได้</h4>
                            <div class="form-inline">
                            <div class="form-group">
                                <div class="col-sm-10">
                                        <select class="form-control round-form" name="month" >
                                            <option value="1">January</option>
                                        </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-10">
                                    <select class="form-control round-form" name="year">
                                        @for ($year=1900; $year <= 2021; $year--)
                                        <option value="{{$year}}">{{$year}}</option>
                                        @endfor
                                    </select>
                                </div>
                                </div>
                              </div>
                          </div>
                          </div>
                      </div>
                  </div>

            <br>
            <div id="morris">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> รายงานการขายแผนการท่องเที่ยว</h4>
                        <div class="panel-body">
                            <div id="hero-bar" class="graph"></div>
                        </div>
                    </div>
                </div>
            </div>
      @endsection
