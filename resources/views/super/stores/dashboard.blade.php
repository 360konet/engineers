@include('super.layouts.app')
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
                      <h2 class="text-white font-weight-bold" id="inStockCount">0 In-Stock</h2>
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
                      <h2 class="text-white font-weight-bold" id="outStockCount">0 Out-Stock</h2>
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
                      <h2 class="text-white font-weight-bold" id="availableStockCount">0 Available Stock</h2>
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
                  <h4 class="card-title">New Out-Stocks  <input type="text"  style="float:right" id="searchInput" placeholder="Search stock..."></h4> 
                  <div class="table-responsive">
                  <table class="table table-striped" id="outStockTable">
                    <thead>
                      <tr>
                        <th>Serial No</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Given By</th>
                        <th>Given To</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Ajax will populate rows here -->
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


<script>
$(document).ready(function () {
    // Fetch stats on page load
    fetchStats();

    function fetchStats() {
        $.ajax({
            url: "{{ route('stocks.stats') }}",
            method: "GET",
            success: function (data) {
                $("#inStockCount").text(data.inStock + " In-Stock");
                $("#outStockCount").text(data.outStock + " Out-Stock");
                $("#availableStockCount").text(data.availableStock + " Available Stock");
                $("#todayStockCount").text("(" + data.todayStock + " today)");
            }
        });
    }

    // Refresh every 30 seconds (optional)
    setInterval(fetchStats, 30000);
});
</script>


<script>
$(document).ready(function () {
    fetchOutStocks();

    function fetchOutStocks() {
        $.ajax({
            url: "{{ route('outstocks.list') }}",
            method: "GET",
            // in fetchOutStocks() success:
            success: function (data) {
                let tbody = $("#outStockTable tbody");
                tbody.empty();
            
                if (data.length > 0) {
                    $.each(data, function (index, out) {
                        const issuedTo = out.assigned_to ?? (out.user ? out.user.name : '-');
            
                        let row = `
                            <tr>
                                <td>${out.product ? out.product.serial ?? out.product.serial_no ?? '-' : '-'}</td>
                                <td>${out.shelf ? out.shelf.shelf_name : '-'}</td>
                                <td>${out.product ? (out.product.product ?? out.product.name ?? '-') : '-'}</td>
                                <td>${out.user.id? out.user.name : '-'}</td>
                                <td>${issuedTo}</td>
                                <td>${out.created_at ? new Date(out.created_at).toLocaleDateString() : '-'}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary viewBtn" data-id="${out.id}">View</button>
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    tbody.append('<tr><td colspan="6" class="text-center">No records found</td></tr>');
                }
            }

        });

    }
});
</script>

<!-- Voucher Modal -->
<div class="modal fade" id="voucherModal" tabindex="-1" role="dialog" aria-labelledby="voucherModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document"> <!-- modal-xl for wide layout -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="voucherModalLabel">Request/Issue Voucher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="voucherContent">
        <!-- Form structure will be injected here -->
      </div>
    </div>
  </div>
</div>



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

    <style>
    .form-container {
      border: 1px solid #000;
      padding: 15px;
    }
    .title {
      text-align: center;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .subtitle {
      text-align: center;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }
    td, th {
      border: 1px solid #000;
      padding: 4px;
      vertical-align: top;
    }
    .no-border td {
      border: none;
    }
    .section-title {
      font-weight: bold;
      margin: 8px 0;
    }
    .signature-box {
      border: 1px solid #000;
      height: 60px;
      width: 180px;
      display: inline-block;
      margin: 5px;
    }
    .footer {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .footer .block {
      width: 45%;
      border: 1px solid #000;
      padding: 10px;
      height: 120px;
    }
    .block p {
      margin: 5px 0;
    }
  </style>

  <script>
    $(document).on("click", ".viewBtn", function () {
  let outId = $(this).data("id");

  $.ajax({
    url: "/outstocks/" + outId,
    method: "GET",
    success: function (out) {
      // Helpful for debugging field names
      console.log("OutStock", out);

      const issuedTo = out.assigned_to ?? (out.user ? out.user.name : '-');
      const qty = out.quantity ?? '-';
      const productName = out.product ? (out.product.product ?? out.product.name ?? '-') : '-';
      const barcode = out.product ? (out.product.barcode ?? 'N/A') : 'N/A';
      const serial = out.product ? (out.product.serial ?? out.product.serial_no ?? '-') : '-';

      let voucherHtml = `
      <div class="form-container">
        <div class="title">
          <img src="logo.png" height="100" width="100" style="vertical-align:middle;margin-right:8px;">
          DIRECTORATE OF ENGINEER SERVICES
          <button id="downloadPdfBtn" data-id="${out.id}" class="btn btn-sm btn-success" style="position:absolute; right:10px; top:10px;">PDF</button>
          </div>
        <div class="subtitle">ENGINEER STORES DEPOT REQUEST/ISSUE VOUCHER</div>

        <table class="no-border">
          <tr>
            <td>Name: ${issuedTo}</td>
            <td>Reserved for ESD</td>
          </tr>
          <tr>
            <td>Unit/Dept./Cell: ${out.unit ?? '-'}</td>
            <td></td>
          </tr>
        </table>

        <table>
          <tr>
            <td style="width:50%; text-align:center;">
              APPROVED/NOT APPROVED <br><br>
              <div class="signature-box">DES Signature</div>
            </td>
            <td style="width:50%; text-align:center;">
              DDES Comments <br><br>
              <div class="signature-box">Signature</div><br>
              Date: ${out.created_at ? new Date(out.created_at).toLocaleDateString() : '-'}
            </td>
          </tr>
        </table>

        <div class="section-title">
          JUSTIFICATION (MUST BE COMPLETED): ${out.justification ?? ''}
        </div>

        <table>
          <tr>
            <th>SRL</th>
            <th>ITEMS/DESCRIPTION</th>
            <th>QTY RQST</th>
            <th>QTY ISSD</th>
            <th>BARCODE</th>
            <th>S/N</th>
            <th>REMARKS</th>
          </tr>
          <tr>
            <td>1</td>
            <td>${productName}</td>
            <td>${qty}</td>
            <td>${qty}</td> <!-- requested and issued the same -->
            <td>${barcode}</td>
            <td>${serial}</td> <!-- fixed: read from product -->
            <td>${out.remarks ?? ''}</td>
          </tr>
        </table>

        <div class="footer">
          <div class="block">
            <p><strong>ISSUED BY</strong></p>
            <p>Name: ${out.user.name  ?? '__________'}</p>
            <p>Rank: ${out.rank ?? '__________'}</p>
            <p>Signature: ____________</p>
          </div>
          <div class="block">
            <p><strong>RECEIVED BY</strong></p>
            <p>Name: ${issuedTo ?? '__________'}</p>
            <p>Rank: ${out.received_rank ?? '__________'}</p>
            <p>Signature: ____________</p>
          </div>
        </div>
      </div>
      `;

      $("#voucherContent").html(voucherHtml);
      $("#voucherModal").modal("show");
    }
  });
});

  </script>



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

  <!-- html2pdf (uses html2canvas + jsPDF) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>
  // Delegated handler because the button is dynamically injected
$(document).on('click', '#downloadPdfBtn', function (e) {
  e.preventDefault();

  const $btn = $(this);
  const id = $btn.data('id') ?? 'voucher';
  // target the actual voucher element inside the modal
  const element = document.querySelector('#voucherContent .form-container');

  if (!element) {
    alert('Unable to find voucher content to export.');
    return;
  }

  // disable the button and show progress
  $btn.prop('disabled', true).text('PDF');

  // html2pdf options tuned for A4, good quality
  const opt = {
    margin:       10,                       // mm margin
    filename:     `voucher_${id}.pdf`,
    image:        { type: 'jpeg', quality: 0.98 },
    html2canvas:  { scale: 2, useCORS: true, logging: false },
    jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
  };

  // generate and save
  html2pdf().set(opt).from(element).save().then(() => {
    $btn.prop('disabled', false).text('Download PDF');
  }).catch((err) => {
    console.error('PDF generation error:', err);
    alert('Failed to generate PDF. Check console for details.');
    $btn.prop('disabled', false).text('Download PDF');
  });
});

</script>
</body>

</html>