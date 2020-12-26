<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admins</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="/stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="/stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="/stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/style-responsive.css" rel="stylesheet">

    <script src="/assets/js/chart-master/Chart.js"></script>

  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Take Me Travel</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <div class="col-2">
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="profile.html"><img src="/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Rosy White</h5>

                    <li class="mt">
                        <a href="/users">
                          <i><svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                          </svg></i>
                            <span>Manage Users</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a  href="/admins" >
                          <i> <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg></i>
                            <span>Manage Admins</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a class="active" href="/attractions">
                            <i><svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M12.166 8.94C12.696 7.867 13 6.862 13 6A5 5 0 0 0 3 6c0 .862.305 1.867.834 2.94.524 1.062 1.234 2.12 1.96 3.07A31.481 31.481 0 0 0 8 14.58l.208-.22a31.493 31.493 0 0 0 1.998-2.35c.726-.95 1.436-2.008 1.96-3.07zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                              <path fill-rule="evenodd" d="M8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg></i>
                            <span>Manage Attractions</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="/trips" >
                            <i><svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg></i>
                            <span>Manage Trips</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="/confirm" >
                            <i><svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-inboxes" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4.98 1a.5.5 0 0 0-.39.188L1.54 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h4.46l-3.05-3.812A.5.5 0 0 0 11.02 1H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562A.5.5 0 0 0 1.884 9h12.234a.5.5 0 0 0 .496-.438L14.933 6zM3.809.563A1.5 1.5 0 0 1 4.981 0h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .106-.374L3.81.563zM.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zm.941.83l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438l.32-2.562H10.45a2.5 2.5 0 0 1-4.9 0H1.066z"/>
                            </svg></i>
                            <span>Confirm Payments</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="/history" >
                            <i><svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-tag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M2 2v4.586l7 7L13.586 9l-7-7H2zM1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2z"/>
                              <path fill-rule="evenodd" d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            </svg></i>
                            <span>Sells History</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="/reports" >
                            <i><svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-graph-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5z"/>
                            </svg></i>
                            <span>Reports</span>
                        </a>
                    </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
    </div>
      <!--sidebar end-->
      <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Edit Attractions
                <ul class="nav pull-right top-menu">
                    <a href="/attractions">
                        <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i> Back</button>
                    </a>
                </ul>
            </h3>
            <div class="col-lg-12">
            <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('attractions.update', [$atts->tourist_id])}}"enctype="multipart/form-data">
                {{ csrf_field() }}
                @method("put")
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tourist Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="tourist_name" value="{{$atts->tourist_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Position:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="position">
                            <option>{{$atts->position}}</option>
                            <option>Amnat Charoen</option>
                            <option>Ang Thong</option>
                            <option>Bangkok</option>
                            <option>Bueng Kan</option>
                            <option>Buriram</option>
                            <option>Chachoengsao</option>
                            <option>Chai Nat</option>
                            <option>Chaiyaphum</option>
                            <option>Chanthaburi</option>
                            <option>Chiang Mai</option>
                            <option>Chiang Rai</option>
                            <option>Chonburi</option>
                            <option>Chumphon</option>
                            <option>Kalasin</option>
                            <option>Kamphaeng Phet</option>
                            <option>Kanchanaburi</option>
                            <option>Khon Kaen</option>
                            <option>Krabi</option>
                            <option>Lampang</option>
                            <option>Lamphun</option>
                            <option>Loei</option>
                            <option>Lopburi</option>
                            <option>Mae Hong Son</option>
                            <option>Maha Sarakham</option>
                            <option>Mukdahan</option>
                            <option>Nakhon Nayok</option>
                            <option>Nakhon Phanom</option>
                            <option>Nakhon Ratchasima</option>
                            <option>Nakhon Sawan</option>
                            <option>Nakhon Si Thammarat</option>
                            <option>Nan</option>
                            <option>Narathiwat</option>
                            <option>Nong Bua Lamphu</option>
                            <option>Nong Khai</option>
                            <option>Nonthaburi</option>
                            <option>Pathum Thani</option>
                            <option>Pattani</option>
                            <option>Phang Nga</option>
                            <option>Phatthalung</option>
                            <option>Phayao</option>
                            <option>Phetchabun</option>
                            <option>Phetchaburi</option>
                            <option>Phichit</option>
                            <option>Phitsanulok</option>
                            <option>Phra Nakhin Si Ayutthaya</option>
                            <option>Phrae</option>
                            <option>Phuket</option>
                            <option>Prachinburi</option>
                            <option>Prachuap Khiri Khan</option>
                            <option>Ranong</option>
                            <option>Ratchaburi</option>
                            <option>Rayong</option>
                            <option>Roi Et</option>
                            <option>Sa Kaeo</option>
                            <option>Sakon Nakorn</option>
                            <option>Samut Prakan</option>
                            <option>Samut Sakhon</option>
                            <option>Samut Songkhram</option>
                            <option>Saraburi</option>
                            <option>Satun</option>
                            <option>Sing Buri</option>
                            <option>Sisaket</option>
                            <option>Songkhla</option>
                            <option>Sukhothai</option>
                            <option>Suphan Buri</option>
                            <option>Surat Thani</option>
                            <option>Surin</option>
                            <option>Tak</option>
                            <option>Trang</option>
                            <option>Trat</option>
                            <option>Ubon Ratchathani</option>
                            <option>Udon Thani</option>
                            <option>Uthai Thani</option>
                            <option>Uttaradit</option>
                            <option>Yala</option>
                            <option>Yasothon</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Attraction Status:</label>
                    <div class="col-sm-10">
                        @if ($atts->tourist_status == "Available")
                        <div class="radio">
                            <label>
                              <input type="radio" name="tourist_status" value="Available" checked>
                              Available
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                              <input type="radio" name="tourist_status" value="Enable">
                              Enable
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                              <input type="radio" name="tourist_status" value="Disable">
                              Disable
                            </label>
                        </div>
                        @endif
                        @if ($atts->tourist_status == "Enable")
                        <div class="radio">
                            <label>
                              <input type="radio" name="tourist_status" value="Available">
                              Available
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                              <input type="radio" name="tourist_status" value="Enable" checked>
                              Enable
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                              <input type="radio" name="tourist_status" value="Disable">
                              Disable
                            </label>
                        </div>
                        @endif
                        @if($atts->tourist_status == "Disable")
                        <div class="radio">
                            <label>
                              <input type="radio" name="tourist_status" value="Available">
                              Available
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                              <input type="radio" name="tourist_status" value="Enable">
                              Enable
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                              <input type="radio" name="tourist_status" value="Disable" checked>
                              Disable
                            </label>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Image:</label>
                    <div class="col-sm-10">
                    <input type="file" class="form-control round-form" name="image_name[]" multiple>
                </br>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>image</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($imgs as $img)
                            <tr>
                                <td><img src="/images/{{$img->image_name}}" width="50" height="50"></td>
                                <td>

                                        <button form="deleteForm" onclick="document.getElementById('deleteForm_{{$img->image_id}}').submit();" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                </div>

                <center>
                        <button type="submit" class="btn btn-theme03">Edit</button>
                </center>
            </form>
            </div>
            </div>
            @foreach ($imgs as $img)
            <form id="deleteForm_{{$img->image_id}}" class="form-inline" method="post" action="/deleteimg/{{$img->image_id}}">
                {{ csrf_field() }}
                @method('DELETE')
            </form>
            @endforeach
        </section>
      </section>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/jquery-1.8.3.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="/assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/assets/js/gritter-conf.js"></script>

  </body>
</html>
