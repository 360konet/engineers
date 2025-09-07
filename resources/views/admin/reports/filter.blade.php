@include('super.layouts.app')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>


<!-- partial -->
<div class="main-panel">        
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{url('/generate-reports')}}">
                            <button class="btn btn-danger">Go back</button>
                        </a>
                        <!-- <button id="pdfPrintButton" class="btn btn-primary" style="float:right;">PDF Print</button> -->
                        <br><br><br>
                        <h4 class="card-title">Filtered Projects 
                            <input type="text" style="float:right" id="searchInput" placeholder="Search projects...">
                        </h4>
                        <p class="card-description">Sorted out projects </p>
                        <div class="table-responsive">
                            <table class="table table-striped" id="filteredProjectsTable">
                                <thead>
                                    <tr>
                                        <th>File</th>
                                        <th>Project Name</th>
                                        <th>Project Head</th>
                                        <th>Department/Status</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($filteredProjects as $project)
                                    <tr>
                                        <td class="py-1">
                                            @if($project->project_file)
                                            <a href="{{ asset('projects/' . $project->project_file) }}" target="_blank">{{$project->project_file}}</a>
                                            @else
                                            No file
                                            @endif
                                        </td>
                                        <td>{{ $project->project_name }}</td>
                                        <td>{{ $project->project_head }}</td>
                                        <td>{{ $project->project_department }}</td>
                                        <td>{{ $project->created_at }}</td>
                                        <td>{{ $project->updated_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    <footer class="footer">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © GAF 2025</span>
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Built By: <a href="#" target="_blank">Selorm Innovation</a></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.9.2/viewer.min.css" integrity="sha512-tT7LPF/3fQ5YD5zU2imJ8MF3YwLO6mFvqfAt5SgsY3q3U8CpBQ9e33Ews3U3v2PZ7M4C8erMOs3uMD6OiPZyA4Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.9.2/viewer.min.js" integrity="sha512-3lFDbi/2lVFL3F91P9ZPA4BXDo6e4CrVqWcEGW7l2UdPYd0U2RxP1aDZvpgA/j0lAeJAmrl2nu+K2QJ1UIvnEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../js/file-upload.js"></script>
<!-- End custom js for this page-->

<script>
    $(document).ready(function () {
        $("#pdfPrintButton").on("click", function () {
            var pdf = new jsPDF();
            pdf.text("Filtered Projects", 20, 20);
            
            html2canvas(document.getElementById("filteredProjectsTable")).then(function (canvas) {
                var imgData = canvas.toDataURL("image/png");
                pdf.addImage(imgData, "PNG", 10, 30);
                pdf.save("filtered_projects.pdf");
            });
        });
    });
</script>


</body>
</html>
