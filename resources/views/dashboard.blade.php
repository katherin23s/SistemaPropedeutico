@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

    {{--  <div class="col-lg-12 col-md-12" style="padding-left: 80px;padding-right: 80px;">
        <div class="row">
            <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
                <a class="after-loop-item card border-0 card-themes shadow-lg " style="padding-bottom: 16px;">
                    <div class="card-body d-flex align-items-end flex-column text-right" style="background-color: #0831d5;">
                        <h4>Themes</h4>
                        <p class="w-75">Fully designed and ready to modify and publish!</p>
                        <i class="fal fa-paint-brush-alt"></i>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-8 mx-auto">
                <a class="after-loop-item card border-0 card-guides shadow-lg" style="padding-bottom: 13px;">
                    <div class="card-body d-flex align-items-end flex-column text-right" style="background-color: #0831d5;">
                        <h4>Guides</h4>
                        <p class="w-75">Guides and tutorials to help you learn Bootstrap!</p>
                        <i class="fal fa-books"></i>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-8 mx-auto">
                <a class="after-loop-item card border-0 card-guides shadow-lg" style="padding-bottom: 13px;">
                    <div class="card-body d-flex align-items-end flex-column text-right" style="background-color: #0831d5;">
                        <h4>Guides</h4>
                        <p class="w-75">Guides and tutorials to help you learn Bootstrap!</p>
                        <i class="fal fa-books"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
        <!-- TABLAS BOOTSTRAP-->
        <div class="col-lg-12 col-md-12">
        <div class="row">
     <div class="col-lg-6 col-md-6" >
            <table class="table " style="background-color: white;">
              <thead style="background-color: #0831d5;" >
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Default</td>
                  <td>Defaultson</td>
                  <td>def@somemail.com</td>
                </tr>      
                <tr class="success">
                  <td>Success</td>
                  <td>Doe</td>
                  <td>john@example.com</td>
                </tr>
                <tr class="danger">
                  <td>Danger</td>
                  <td>Moe</td>
                  <td>mary@example.com</td>
                </tr>
                <tr class="info">
                  <td>Info</td>
                  <td>Dooley</td>
                  <td>july@example.com</td>
                </tr>
                <tr class="warning">
                  <td>Warning</td>
                  <td>Refs</td>
                  <td>bo@example.com</td>
                </tr>
                <tr class="active">
                  <td>Active</td>
                  <td>Activeson</td>
                  <td>act@example.com</td>
                </tr>
              </tbody>
            </table>
          
        </div>
        <div class="col-lg-6 col-md-6">
            <table class="table " style="background-color: white;">
              <thead style="background-color: #0831d5;" >
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Default</td>
                  <td>Defaultson</td>
                  <td>def@somemail.com</td>
                </tr>      
                <tr class="success">
                  <td>Success</td>
                  <td>Doe</td>
                  <td>john@example.com</td>
                </tr>
                <tr class="danger">
                  <td>Danger</td>
                  <td>Moe</td>
                  <td>mary@example.com</td>
                </tr>
                <tr class="info">
                  <td>Info</td>
                  <td>Dooley</td>
                  <td>july@example.com</td>
                </tr>
                <tr class="warning">
                  <td>Warning</td>
                  <td>Refs</td>
                  <td>bo@example.com</td>
                </tr>
                <tr class="active">
                  <td>Active</td>
                  <td>Activeson</td>
                  <td>act@example.com</td>
                </tr>
              </tbody>
            </table>
        </div>
        </div>
    </div>
          <!-- -->
   
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Total Shipments</h5>
                            <h2 class="card-title">Performance</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Accounts</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Purchases</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Sessions</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total Shipments</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Daily Sales</h5>
                    <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500€</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>  --}}
@endsection


