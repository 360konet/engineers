@extends('helpdesk.admin.layout.app')

@section('content')
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Complaints Portal</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="{{url('/home')}}"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Unfixable Complaints</a>
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
                                        <!-- Basic table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Unfixable Complains</h5>
                                                <span>Complains resolved</span>
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
                                                <div class="mb-3">
                                                    <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="complainTable">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Ticket ID</th>
                                                                <th>Technicians Assigned</th>
                                                                <th>Review</th>
                                                                <th>Complain From</th>
                                                                <th>Department</th>
                                                                <th>Compliant Statement</th>
                                                                <th>Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($unfixedcomplains as $index=> $unfixedcomplains)
                                                            <tr>
                                                                <th scope="row">{{$index +1}}</th>
                                                                <td>{{$unfixedcomplains->ticketID}}</td>
                                                                <td>{{$unfixedcomplains->technician}}</td>
                                                                <td>{{$unfixedcomplains->review}}</td>
                                                                <td>{{$unfixedcomplains->username}}</td>
                                                                <td>{{$unfixedcomplains->department}}</td>
                                                                <td>{{$unfixedcomplains->description}}</td>
                                                                <td>{{$unfixedcomplains->created_at}}</td>
                                                                <td>
                                                                    <a href="{{url('/edit-status-'.$unfixedcomplains->id)}}"><i class="fa fa-edit"></i></a>
                                                                    <a href="{{url('/delete-complain-'.$unfixedcomplains->id)}}"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hover table card end -->
                                        <!-- Contextual classes table starts -->

                                        <script>
                                            document.getElementById("searchInput").addEventListener("keyup", function () {
                                                const input = this.value.toLowerCase();
                                                const rows = document.querySelectorAll("#complainTable tbody tr");
                                        
                                                rows.forEach(row => {
                                                    const cells = row.querySelectorAll("td");
                                                    const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(" ");
                                                    row.style.display = rowText.includes(input) ? "" : "none";
                                                });
                                            });
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