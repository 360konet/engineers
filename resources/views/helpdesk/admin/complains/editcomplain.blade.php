@extends('helpdesk.admin.layout.app')

@section('content')
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Change Complain Status</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="{{url('/home')}}"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Edit Complain</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                    <div class="row">
                                            <div class="col-md-6">
                                            
                                        <!-- Basic table card start -->
                                        <div class="card">
                                                    <div class="card-header">
                                                        <h5>Complain From</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" action="{{url('/editcomplain-'.$editcomplain->id)}}" method="Post">
                                                            @csrf
                                                            @method('Put')
                                                        <div class="form-group form-default">
                                                                <input type="text" value="{{$editcomplain->user_id}}" hidden name="user_id" class="form-control" required readonly>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="text" name="username" value="{{$editcomplain->username}}" class="form-control" required readonly>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="text" name="email" value="{{$editcomplain->email}}" class="form-control" required readonly>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="text" name="department" value="{{$editcomplain->department}}" class="form-control" required readonly>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Complain Details</h5>
                                                    </div>
                                                    <div class="card-block">
                                                    <div class="form-group form-default form-static-label">
                                                        <input type="text" name="ticketID" value="{{$editcomplain->ticketID}}" class="form-control" readonly required>
                                                        <span class="form-bar"></span>
                                                        <label class="float-label">Ticket ID</label>
                                                    </div>

                                                    <div class="form-group form-default">
                                                        <input type="text" name="category" value="{{$editcomplain->category}}" class="form-control" required readonly>
                                                        <span class="form-bar"></span>
                                                        <label class="float-label">Category</label>
                                                    </div>

                                                            <div class="form-group form-default form-static-label">
                                                                <textarea name="description" value="{{$editcomplain->description}}" class="form-control" readonly required>{{$editcomplain->description}}</textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Complaint Description</label>
                                                            </div>

                                                    <div class="form-group form-default form-static-label">
                                                        <select name="status" class="form-control" required>
                                                            <option value="{{$editcomplain->status}}">{{$editcomplain->status}}</option>
                                                            <option value=" ">--Change Status--</option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Processing">Processing</option>
                                                            <option value="Fixed">Fixed</option>
                                                            <option value="Unfixed">Unfixed</option>
                                                        </select>
                                                        <span class="form-bar"></span>
                                                        <label class="float-label">Status</label>
                                                    </div>

                                                    <div class="form-group form-default form-static-label" id="reviewDiv">
                                                                <textarea name="review" value="{{$editcomplain->review}}" class="form-control">{{$editcomplain->review}}</textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Review</label>
                                                            </div>


                                                    <div class="form-group form-default form-static-label">
                                                        <select name="technician[]" class="form-control" multiple required>
                                                            <option value="">--Assign Technician--</option>
                                                            @foreach($technicians as $technician)
                                                            <option value="{{$technician->name}}">{{$technician->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="form-bar"></span>
                                                        <label class="float-label">Technician</label>
                                                    </div>


                                                    

                                                            <div class="form-group form-default form-static-label">
                                                                <button value="submit" type="submit" class="btn-primary" style="float:right;width:100px;" >Submit</button>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                        </form>
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

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(document).ready(function () {
                // Hide the "Review" field initially
                $('#reviewDiv').hide();
            
                // Listen for changes in the "Status" dropdown
                $('select[name="status"]').on('change', function () {
                    var selectedStatus = $(this).val();
            
                    // If "Unfixed" is selected, show the "Review" field; otherwise, hide it
                    if (selectedStatus === 'Unfixed') {
                        $('#reviewDiv').show();
                    } else {
                        $('#reviewDiv').hide();
                    }
                });
            });
            </script>
