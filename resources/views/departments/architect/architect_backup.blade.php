@include('departments.architect.layout.app')

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Project Backup Portal</h4>
                  <p class="card-description">Welcome to the backed-up projects portal</p>
                  <form class="form-inline" action="{{url('/backup-architect-project')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                   <label class="sr-only" for="inlineFormInputGroupUsername2">Project Name</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Project Name</div>
                      </div>
                      <input name="project_name" required class="form-control" id="inlineFormInputGroupUsername2" placeholder="Enter Project name">
                    </div>
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Status</div>
                      </div>
                      <select name="project_department" readonly required class="form-control" id="inlineFormInputGroupUsername2">
                         <option value="Architect Backup" selected>Backup</option>
                      </select>
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Project Head</div>
                      </div>
                      <input name="project_head" required class="form-control" id="inlineFormInputGroupUsername2" placeholder="Enter Project head">
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Project File</div>
                      </div>
                      <input class="form-control" required name="project_file" type="file" placeholder="Enter Project file">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Create Backup</button>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Backed Up Projects ({{$arcount}})<input type="text"  style="float:right" id="searchInput" placeholder="Search projects..."></h4>
                  <p class="card-description">New projects waiting to be assigned to departments</p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            File
                          </th>
                          <th>
                            Project Name
                          </th>
                          <th>
                            Project Head
                          </th>
                          <th>
                            Created On
                          </th>
                          <!-- <th>
                            Department/Status
                          </th>
                          <th>
                            Action
                          </th> -->
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($arprojects as $project)
                        <tr>
                        <td class="py-1">
                            @if($project->project_file)
                            <a href="{{ asset('projects/' . $project->project_file) }}" target="_blank">{{$project->project_file}}</a>
                            @else
                                No file
                            @endif
                        </td>
                          <td>
                            {{$project->project_name}}
                          </td>
                          <td>
                            {{$project->project_head}}
                          </td>
                          <td>
                            {{$project->created_at}}
                          </td>
                          <!-- <td>
                          <form action="{{url('/pending-forward/'.$project->id)}}" method="POST">
                              @csrf
                            <p><select  class="form-control" name="project_department">
                            <option value="">--Select Department--</option>
                            <option value="Architect">Architect</option>
                            <option value="Electricals">Electricals</option>
                            <option value="Civil Works">Civil Works</option>
                            <option value="Quantitative Surveyors">Quantitative Surveyors</option>
                            <option value="Orderly Room">Orderly Room</option>
                            <option value="Finance">Finance</option>
                            <option value="">--Change General Status--</option>
                            <option value="Pending Project">Pending Project</option>
                            <option value="Completed Project">Completed Project</option>
                            <option value="">--Change Architect Status--</option>
                            <option value="Architect Pending Project">Architect Pending Project</option>
                            <option value="Architect Completed Project">Architect Completed Project</option>
                            <option value="Backup">Backup</option>
                            </select>
                          </td>
                          <td><button type="submit" class="btn btn-primary mb-2">Share</button></p></td>
                          </form> -->
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

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#searchInput").on("input", function () {
            var searchText = $(this).val().toLowerCase();

            // Loop through each table row and hide/show based on the search text
            $("table tbody tr").each(function () {
                var rowText = $(this).text().toLowerCase();
                if (rowText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © GAF 2025</span>
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Built By: <a href="#" target="_blank">M.A.K.E Innovation</a></span>
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.9.2/viewer.min.css" integrity="sha512-tT7LPF/3fQ5YD5zU2imJ8MF3YwLO6mFvqfAt5SgsY3q3U8CpBQ9e33Ews3U3v2PZ7M4C8erMOs3uMD6OiPZyA4Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.9.2/viewer.min.js" integrity="sha512-3lFDbi/2lVFL3F91P9ZPA4BXDo6e4CrVqWcEGW7l2UdPYd0U2RxP1aDZvpgA/j0lAeJAmrl2nu+K2QJ1UIvnEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <!-- End custom js for this page-->



</body>

</html>
