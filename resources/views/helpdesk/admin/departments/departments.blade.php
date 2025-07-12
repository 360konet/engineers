@extends('helpdesk.admin.layout.app')

@section('content')
<div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Departments Portal</h5>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="{{url('/home')}}"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Departments Portal</a>
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
                                                <h5>Eng. Departments</h5><a href="{{url('/adddepartment')}}"><button class="btn-primary" style="width:100px">Add +</button></a>

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
                                                                <th>Head</th>
                                                                <th>Head Contact</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($departments as $dept)
                                                            <tr>
                                                                <th scope="row">{{$dept->deptID}}</th>
                                                                <td>{{$dept->name}}</td>
                                                                <td>{{$dept->head}}</td>
                                                                <td>{{$dept->headcontact}}</td>
                                                                <td><a href="{{url('/delete-department/'.$dept->id)}}"><button class="btn-danger" style="width:100px">Remove</button></a></td>
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