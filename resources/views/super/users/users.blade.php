@include('super.layouts.app')

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users ({{$ucount}}) <a href="{{url('/add-account')}}"><button class="btn btn-success">Add Account +</button></a><input type="text"  style="float:right" id="searchInput" placeholder="Search users..."></h4>
                  <p class="card-description">System users</p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                            Service Number
                          </th>
                          <th>
                            Department/Role
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Register Date
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                        <td class="py-1">{{$user->name}}</td>
                          <td>{{$user->svc}}</td>
                          <td>{{$user->department}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->created_at}}</td>
                          <td>
                            <a href="#" class="btn btn-primary"><i class="fas fa-user-plus"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                          </td>

                          <!-- <td><button class="btn btn-primary">Assign Role</button> <button class="btn btn-warning">Edit Account</button> <button class="btn btn-danger">Remove</button></td> -->
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
