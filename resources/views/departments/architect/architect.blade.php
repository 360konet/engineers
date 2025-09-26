@include('departments.architect.layout.app')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
           <!-- row end -->
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-facebook d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h2 class="text-white font-weight-bold">{{$arcount}} Shared Files</h2>
                      <p class="mt-2 text-white card-text">Files shared from various departments.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-google d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h2 class="text-white font-weight-bold">{{$arbackup}} Backups</h2>
                      <p class="mt-2 text-white card-text">Stored up files for department</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-twitter d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h2 class="text-white font-weight-bold">{{$arcompleted}} Completed</h2>
                      <p class="mt-2 text-white card-text">Totally completed department project</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- row end --> 
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Shared Files ({{$arcount}}) <input type="text"  style="float:right" id="searchInput" placeholder="Search projects..."></h4> 
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
                          <th>
                            Department/Status
                          </th>
                          <th>
                            Action
                          </th>
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
                          <td>
                          <form action="{{url('/forward-architect/'.$project->id)}}" method="POST">
                              @csrf
                            <p><select  class="form-control" name="project_department">
                            <option value="">--Select Department--</option>
                            <option value="Architect">Architect</option>
                            <option value="Electricals">Electricals</option>
                            <option value="Civil Works">Civil Works</option>
                            <option value="Quantity surveyors">Quantity surveyors</option>
                            <option value="Orderly Room">Orderly Room</option>
                            <option value="Finance">Finance</option>
                            <option value="">--Change General Status--</option>
                            <option value="Pending Project">Pending Project</option>
                            <option value="Completed Project">Completed Project</option>
                            <option value="">--Change Architect Status--</option>
                            <option value="Architect Pending Project">Architect Pending Project</option>
                            <option value="Architect Completed Project">Architect Completed Project</option>
                            <option value="Architect Backup">Backup</option>
                            </select>
                          </td>
                          <td><button type="submit" class="btn btn-primary mb-2">Share</button></p></td>
                          </form>
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
        <!-- partial:./partials/_footer.html -->
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
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>