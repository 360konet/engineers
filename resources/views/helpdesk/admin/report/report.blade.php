@extends('helpdesk.admin.layout.app')

@section('content')
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Report Generation</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="{{url('/home')}}"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Report</a>
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
                                                        <h5>Report Form</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" action="{{url('/generate-report')}}" method="Post">
                                                            @csrf
                                                            <div class="form-group form-default">
                                                                <select name="status" class="form-control" required>
                                                                    <option value="All">All</option>
                                                                    <option value="New">New/Pending</option>
                                                                    <option value="Processing">Processing</option>
                                                                    <option value="Fixed">Fixed</option>
                                                                    <option value="Unfixed">Unfixable</option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                <label>Status</label>
                                                            </div>
                                                        <div class="form-group form-default">
                                                                <input type="date" name="start_date" placeholder="Select End Date" class="form-control" required>
                                                                <span class="form-bar"></span>
                                                                <label>Start Date</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="date" name="end_date" placeholder="Enter technician name" class="form-control" required>
                                                                <span class="form-bar"></span>
                                                                <label>End Date</label>
                                                            </div>
                                                            <button value="submit" type="submit" class="btn-primary" style="float:right;width:100px;">Get Report</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                function validateNumberInput(input) {
                                                    // Remove any non-numeric characters from the input value
                                                    input.value = input.value.replace(/[^0-9]/g, '');
                                            
                                                    // Limit the input length to 9 characters
                                                    if (input.value.length > 9) {
                                                        input.value = input.value.slice(0, 9);
                                                    }
                                                }
                                            </script>
                                       
                                      
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