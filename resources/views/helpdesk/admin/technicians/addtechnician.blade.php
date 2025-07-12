@extends('helpdesk.admin.layout.app')

@section('content')
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Add New Technician</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="{{url('/home')}}"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Add Technician</a>
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
                                                        <h5>Technician Registration</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" action="{{url('/addnewtechnician')}}" method="Post">
                                                            @csrf
                                                        <div class="form-group form-default">
                                                                <input type="text" name="techID" placeholder="Enter technician ID" class="form-control" required>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="text" name="name" placeholder="Enter technician name" class="form-control" required>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <select class="form-control" name="dept">
                                                                    <option value="">--Select Department--</option>
                                                                    @foreach($departments as $department)
                                                                    <option value="{{$department->name}}">{{$department->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <select class="custom-select" name="country_code">
                                                                        <option value="+233">+233 (Ghana)</option>
                                                                        <option value="+1">+1 (USA)</option>
                                                                        <option value="+44">+44 (UK)</option>
                                                                        <option value="+49">+49 (Germany)</option>
                                                                        <option value="+33">+33 (France)</option>
                                                                        <option value="+81">+81 (Japan)</option>
                                                                        <option value="+86">+86 (China)</option>
                                                                        <option value="+91">+91 (India)</option>
                                                                        <option value="+61">+61 (Australia)</option>
                                                                        <option value="+52">+52 (Mexico)</option>
                                                                        <option value="+55">+55 (Brazil)</option>
                                                                        <option value="+7">+7 (Russia)</option>
                                                                        <option value="+20">+20 (Egypt)</option>
                                                                        <option value="+27">+27 (South Africa)</option>
                                                                        <option value="+34">+34 (Spain)</option>
                                                                        <option value="+39">+39 (Italy)</option>
                                                                        </select>
                                                                    </div>
                                                                    <input type="text" name="techcontact" placeholder="Enter technician contact" class="form-control" oninput="validateNumberInput(this)" required>
                                                                </div>
                                                                <span class="form-bar"></span>
                                                            </div>


                                                            <button value="submit" type="submit" class="btn-primary" style="float:right;width:100px;" >Submit</button>

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