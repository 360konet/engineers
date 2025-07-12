@extends('helpdesk.admin.layout.app')

@section('content')
<div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Technicians Portal</h5>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="{{url('/home')}}"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Technicians Portal</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Basic table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Eng. Technicians</h5><a href="{{url('/addtechnician')}}"><button class="btn-primary" style="width:100px">Add +</button></a>

                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Department</th>
                                                                <th>Technician Contact</th>
                                                                <th>Status</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($technicians as $technician)
                                                            <tr>
                                                                <th scope="row">{{$technician->techID}}</th>
                                                                <td>{{$technician->name}}</td>
                                                                <td>{{$technician->dept}}</td>
                                                                <td>{{$technician->country_code}} {{$technician->techcontact}}</td>
                                                                <td>{{$technician->status}}</td>
                                                                <td><a href="{{url('/delete-technician-'.$technician->id)}}"><button class="btn-danger" style="width:100px">Remove</button></a></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hover table card end -->
                                        <!-- Contextual classes table starts -->
                                       
                                      
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>

@endsection