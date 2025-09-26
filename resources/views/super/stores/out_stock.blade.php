@include('super.layouts.app')

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Out-Stock Portal</h4>
                  <p class="card-description">Welcome to the out-stock portal to assign stock(s)</p>
                  <form class="form-inline" action="{{ route('out.stock.assign') }}" method="POST">
                      @csrf
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Shed</div>
                          </div>
                          <select name="shelf_id" required class="form-control" id="shelfSelect">
                              <option value="">--Select Shed--</option>
                              @foreach($shelves as $shelf)
                                  <option value="{{ $shelf->id }}">{{ $shelf->shelf_name }}</option>
                              @endforeach
                          </select>
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Product</div>
                          </div>
                          <select name="product_id" required class="form-control" id="productSelect">
                              <option value="">--Select Product--</option>
                          </select>
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Quantity Needed</div>
                          </div>
                          <input name="quantity" type="number" min="1" required class="form-control" id="quantityInput" placeholder="Enter Quantity">
                          <small id="maxQtyText" class="text-danger ml-2"></small>
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Assigned To</div>
                          </div>
                          <input name="assigned_to" required class="form-control" placeholder="Enter Receiver">
                      </div>
                  
                      <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Remarks</div>
                          </div>
                          <input name="remarks" class="form-control" placeholder="Enter Remarks">
                      </div>
                  
                      <button type="submit" class="btn btn-primary mb-2">Assign Stock</button>
                  </form>

                </div>
              </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Out-Stocks  <input type="text"  style="float:right" id="searchInput" placeholder="Search stock..."></h4> 
                  <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Category</th>
                              <th>Product</th>
                              <th>Assigned To</th>
                              <th>Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody id="outStockTableBody">
                          <!-- Data will load here -->
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


<script>
$(document).ready(function () {
    $('#shelfSelect').on('change', function () {
        let shelfId = $(this).val();
        $('#productSelect').empty().append('<option value="">--Select Product--</option>');
        if (shelfId) {
            $.getJSON('/stores/shelf/' + shelfId + '/products', function (data) {
                $.each(data, function (key, product) {
                    $('#productSelect').append(
                        `<option value="${product.id}" data-qty="${product.quantity}">
                            ${product.product_name} (Available: ${product.quantity})
                        </option>`
                    );
                });
            });
        }
    });

    // Validate quantity
    $('#productSelect').on('change', function () {
        let maxQty = $(this).find(':selected').data('qty');
        $('#quantityInput').attr('max', maxQty);
    });
});



$(document).ready(function () {
    // Fetch and display Out-Stock data
    function loadOutStockData() {
        $.getJSON("{{ route('out.stock.data') }}", function (data) {
            let rows = '';
            $.each(data, function (index, stock) {
                rows += `
                    <tr>
                        <td><img src="${stock.product?.product_image ?? 'default.png'}" width="50"></td>
                        <td>${stock.shelf?.shelf_name ?? '-'}</td>
                        <td>${stock.product?.product ?? '-'}</td>
                        <td>${stock.assigned_to}</td>
                        <td>${new Date(stock.created_at).toLocaleDateString()}</td>
                        <td><button class="btn btn-sm btn-danger deleteBtn" data-id="${stock.id}">Delete</button></td>
                    </tr>
                `;
            });
            $('#outStockTableBody').html(rows);
        });
    }

    // Initial load
    loadOutStockData();

    // Filter/search (already added)
    $("#searchInput").on("input", function () {
        var searchText = $(this).val().toLowerCase();
        $("#outStockTableBody tr").each(function () {
            var rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.includes(searchText));
        });
    });
});

</script>




</body>

</html>
