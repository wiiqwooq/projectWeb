@extends('layouts.menuuser')

@section('menuuser')
            <h3><i class="fa fa-angle-right"></i>Manage Users</h3>
              <div class="row">

                    <div class="col-md-12">
                          <div class="content-panel">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>User_id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>u0001</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>0123456789</td>
                                    <td>101/2577 Lamphakchee Nongchok Bangkok</td>
                                    <td>mark2577</td>
                                    <td>Enabel</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                          </div><! --/content-panel -->
                    </div>
                </div>
                @endsection
