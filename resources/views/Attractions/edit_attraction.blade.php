@extends('layouts.menuattraction')

@section('menuatts')
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
     @endsection
