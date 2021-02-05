@extends('layouts.menureport')

@section('menurep')
            <h3><i class="fa fa-angle-right"></i>Reports</h3>
              <!-- page start-->
              <div id="morris">
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i>รายงานข้อมูลรายได้</h4>
                              <div class="panel-body">
                                  <div id="hero-graph" class="graph"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i>รายงานการขายแผนการท่องเที่ยว</h4>
                              <div class="panel-body">
                                  <div id="hero-bar" class="graph"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      @endsection
