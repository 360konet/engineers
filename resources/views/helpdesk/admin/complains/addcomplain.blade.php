@extends('helpdesk.admin.layout.app')

@section('content')
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Add New Complain</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="{{url('/home')}}"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Add Complain</a>
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
                                                        <h5>Complainer Details</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" action="{{url('/addnewcomplain')}}" method="Post">
                                                            @csrf
                                                        <div class="form-group form-default">
                                                                <input type="text" value="{{Auth::user()->id}}" name="user_id" hidden class="form-control" required readonly>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="text" name="username" value="{{Auth::user()->name}}" class="form-control" required readonly>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" required readonly>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="text" name="department" value="{{Auth::user()->department}}" class="form-control" required readonly>
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
                                                        <input type="text" id="ticketID" name="ticketID" class="form-control" readonly required>
                                                        <span class="form-bar"></span>
                                                        <label class="float-label">Ticket ID</label>
                                                    </div>
                                                    
                                                    <script>
                                                        function generateRandomString(length) {
                                                            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                                                            let result = '';
                                                            for (let i = 0; i < length; i++) {
                                                                const randomIndex = Math.floor(Math.random() * characters.length);
                                                                result += characters.charAt(randomIndex);
                                                            }
                                                            return result;
                                                        }
                                                    
                                                        const ticketIDInput = document.getElementById('ticketID');
                                                        const generatedTicketID = generateRandomString(10); 
                                                        ticketIDInput.value = generatedTicketID;
                                                    </script>

                                                            <div class="form-group form-default form-static-label">
                                                                <select class="form-control" required name="category">
                                                                <option value="">--Select Category--</option>
                                                                    <option value="Software Problem">Software Problem</option>
                                                                    <option value="Hardware Problem">Hardware Problem</option>
                                                                    <option value="Network Problem">Network Problem</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Complaint Category</label>
                                                            </div>

                                                            <div class="form-group form-default form-static-label">
                                                                <textarea name="description" class="form-control" required></textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Complaint Description</label>
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