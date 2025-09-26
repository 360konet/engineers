@include('super.layouts.app')

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <h4 class="card-title">
                    In-Stock Portal
                    <button style="float:right; margin-left:10px;" class="btn btn-primary" data-toggle="modal" data-target="#addShelfModal">
                        + Add Shed
                    </button>
                    
                    <button style="float:right;" class="btn btn-secondary" data-toggle="modal" data-target="#viewShelfModal">
                        View Shed
                    </button>
                </h4>
                
                <!-- Add Shelf Modal -->
                <div class="modal fade" id="addShelfModal" tabindex="-1" role="dialog" aria-labelledby="addShelfModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="shelfForm" method="POST" action="{{ route('shelves.store') }}">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addShelfModalLabel">Add Shed</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="shelf_id">Shed ID</label>
                                        <input type="text" name="shelf_id" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="shelf_name">Shed Name</label>
                                        <input type="text" name="shelf_name" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Shed</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- View Shelf Modal -->
                <div class="modal fade" id="viewShelfModal" tabindex="-1" role="dialog" aria-labelledby="viewShelfModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">View Shed</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Shed ID</th>
                                            <th>Shed Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($shelves as $shelf)
                                            <tr>
                                                <td>{{ $shelf->shelf_id }}</td>
                                                <td>{{ $shelf->shelf_name }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#editShelfModal{{ $shelf->id }}">
                                                        Edit
                                                    </button>
                
                                                    <!-- Delete Button -->
                                                    <form action="{{ route('shelves.destroy', $shelf->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                
                                            <!-- Edit Shelf Modal -->
                                            <div class="modal fade" id="editShelfModal{{ $shelf->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <form method="POST" action="{{ route('shelves.update', $shelf->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Shed</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>
                
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="shelf_id">Shed ID</label>
                                                                    <input type="text" name="shelf_id" class="form-control" value="{{ $shelf->shelf_id }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="shelf_name">Shed Name</label>
                                                                    <input type="text" name="shelf_name" class="form-control" value="{{ $shelf->shelf_name }}" required>
                                                                </div>
                                                            </div>
                
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Update Shed</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                                
                  <p class="card-description">Welcome to the in-stock portal to register new stocks in-take</p>
                  <form class="form-inline" action="{{ route('stocks.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Product Image</div>
                          </div>
                          <input class="form-control" required name="project_file" type="file">
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Shed</div>
                          </div>
                          <select name="category" required class="form-control">
                              <option value="">--Select Shed--</option>
                                @foreach($shelves as $shelf)
                                    <option value="{{ $shelf->id }}">{{ $shelf->shelf_name }}</option>  
                                @endforeach
                          </select>
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Serial</div>
                          </div>
                          <input name="serial" class="form-control" placeholder="Enter Serial No">
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Product</div>
                          </div>
                          <input name="product" required class="form-control" placeholder="Enter Product Name">
                      </div>

                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Quantity</div>
                          </div>
                          <input name="qty" required class="form-control" type="number" placeholder="Enter Product Quantity">
                      </div>

                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Details</div>
                          </div>
                          <textarea name="details" class="form-control" type="text" placeholder="Enter Product Details"></textarea>
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
                                <th>Quantity</th>
                                <th>Added By</th>
                                <th>Details</th>
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


        <!-- Edit Stock Modal -->
<div class="modal fade" id="editStockModal" tabindex="-1" role="dialog" aria-labelledby="editStockModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form id="editStockForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Stock</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="editStockId" name="id">

                <div class="form-group">
                    <label>Shed</label>
                    <select name="category" id="editCategory" class="form-control" required>
                        <option value="">-- Select Shelf --</option>
                        @foreach($shelves as $shelf)
                            <option value="{{ $shelf->id }}">{{ $shelf->shelf_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Serial</label>
                    <input type="text" class="form-control" name="serial" id="editSerial">
                </div>

                <div class="form-group">
                    <label>Product</label>
                    <input type="text" class="form-control" name="product" id="editProduct" required>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" class="form-control" name="qty" id="editQty" required>
                </div>

                <div class="form-group">
                    <label>Details</label>
                    <textarea class="form-control" name="details" id="editDetails"></textarea>
                </div>

                <div class="form-group">
                    <label>Product Image (optional)</label>
                    <input type="file" class="form-control" name="project_file">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Stock</button>
            </div>
        </div>
    </form>
  </div>
</div>



<!-- Delete Stock Modal -->
<div class="modal fade" id="deleteStockModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="deleteStockForm" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Stock</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this stock?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </form>
  </div>
</div>




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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<script>
$('#stocksTable').DataTable({
    processing: true,
    serverSide: false,
    ajax: '{{ route('stocks.data') }}',
    columns: [
        {
            data: 'product_image',
            render: function (data) {
                return `<img src="/${data}" width="50" height="50" class="rounded">`;
            }
        },
        { data: 'serial' },
        { 
            data: 'category',
            render: function (data) {
                return data ? data.shelf_name : 'N/A';
            }
        },
        { data: 'product' },
        { data: 'qty' },
        { 
            data: 'user',
            render: function (data) {
                return data ? data.name : 'N/A';
            }
        },
        { data: 'details' },   // ✅ this was missing before!
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
                    <button class="btn btn-sm btn-info editStockBtn" 
                        data-id="${row.id}" 
                        data-serial="${row.serial}" 
                        data-product="${row.product}" 
                        data-qty="${row.qty}" 
                        data-details="${row.details}" 
                        data-category="${row.category ? row.category.id : ''}">
                        Edit
                    </button>
                    <button class="btn btn-sm btn-danger deleteStockBtn" data-id="${row.id}">Delete</button>
                `;
            }
        }
    ]
});



// Handle Edit button
$(document).on('click', '.editStockBtn', function () {
    let id = $(this).data('id');
    $('#editStockId').val(id);
    $('#editSerial').val($(this).data('serial'));
    $('#editProduct').val($(this).data('product'));
    $('#editQty').val($(this).data('qty'));
    $('#editDetails').val($(this).data('details'));
    $('#editCategory').val($(this).data('category'));

    $('#editStockForm').attr('action', '/stocks/' + id); // adjust if route name is different
    $('#editStockModal').modal('show');
});

// Handle Delete button
$(document).on('click', '.deleteStockBtn', function () {
    let id = $(this).data('id');
    $('#deleteStockForm').attr('action', '/stocks/' + id); // adjust if route name is different
    $('#deleteStockModal').modal('show');
});

</script>


</body>

</html>
