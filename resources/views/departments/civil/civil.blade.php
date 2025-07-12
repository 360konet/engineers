@include('departments.civil.layout.app')
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
                      <h2 class="text-white font-weight-bold">0 Shared Files</h2>
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
                      <h2 class="text-white font-weight-bold">0 Backups</h2>
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
                      <h2 class="text-white font-weight-bold">0 Completed</h2>
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
                  <h4 class="card-title">Fresh Pending Projects 0 <input type="text"  style="float:right" id="searchInput" placeholder="Search projects..."></h4> 
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
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © GAF 2024</span>
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