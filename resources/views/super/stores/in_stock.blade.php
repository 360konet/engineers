@include('super.layouts.app')

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">In-Stock Portal</h4>
                  <p class="card-description">Welcome to the in-stock portal to register new stocks in-take</p>
                  <form class="form-inline" action="{{ route('stocks.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Category</div>
                          </div>
                          <select name="category" required class="form-control">
                              <option value="">--Select Category--</option>
                              <option value="Electronic">Electronic</option>
                              <option value="Non-Electronic">Non-Electronic</option>
                          </select>
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Serial</div>
                          </div>
                          <input name="serial" required class="form-control" placeholder="Enter Serial No">
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Product</div>
                          </div>
                          <input name="product" required class="form-control" placeholder="Enter Product Name">
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Product Image</div>
                          </div>
                          <input class="form-control" required name="project_file" type="file">
                      </div>
                  
                      <button type="submit" class="btn btn-primary mb-2">Add Stock</button>
                  </form>

                </div>
              </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">In-Stocks</h4> 
                  <div class="table-responsive">
                 <table class="table table-striped" id="stocksTable">
                     <thead>
                         <tr>
                             <th>Image</th>
                             <th>Serial No</th>
                             <th>Category</th>
                             <th>Product</th>
                             <th>Added By</th>
                             <th>Date</th>
                             <th>Action</th>
                         </tr>
                     </thead>
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

  <!-- jQuery + DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<script>
$(document).ready(function () {
    $('#stocksTable').DataTable({
        processing: true,
        serverSide: false, // we’ll load all and let DataTables handle display
        ajax: '{{ route('stocks.data') }}',
        columns: [
            {
                data: 'product_image',
                render: function (data, type, row) {
                    return `<img src="/${data}" width="50" height="50" class="rounded">`;
                }
            },
            { data: 'serial' },
            { data: 'category' },
            { data: 'product' },
            { 
                data: 'user',
                render: function (data) {
                    return data ? data.name : 'N/A';
                }
            },
            {
                data: 'created_at',
                render: function (data) {
                    return new Date(data).toLocaleDateString();
                }
            },
            {
                data: 'id',
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    `;
                }
            }
        ]
    });
});
</script>

</body>

</html>
