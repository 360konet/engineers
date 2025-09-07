@include('super.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

          @if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif

          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users ({{$ucount}}) 
                    <center>
                      <a href="{{url('/add-account')}}"><button class="btn btn-success">Add Account +</button></a>
                      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#bulkSmsModal">Send Bulk SMS</button>
                    </center>
                    <input type="text"  style="float:right" id="searchInput" placeholder="Search users..."></h4>
                  <p class="card-description">System users</p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                            Phone Number
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
                          <td>{{$user->phone}}</td>
                          <td>{{$user->svc}}</td>
                          <td>{{$user->department}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->created_at}}</td>
                          <td>
                            <a href="#" class="btn btn-primary sms-btn" data-phone="{{ $user->phone }}" data-name="{{ $user->name }}" data-bs-toggle="modal" data-bs-target="#smsModal">
                                <i class="fas fa-paper-plane"></i>
                            </a>

                           <a href="#" class="btn btn-warning edit-user-btn"
                               data-id="{{ $user->id }}"
                               data-name="{{ $user->name }}"
                               data-phone="{{ $user->phone }}"
                               data-svc="{{ $user->svc }}"
                               data-department="{{ $user->department }}"
                               data-email="{{ $user->email }}"
                               data-bs-toggle="modal"
                               data-bs-target="#editUserModal">
                               <i class="fas fa-edit"></i>
                            </a>
                            
                            
                                <a href="{{ url('delete-users/'. $user->id ) }}"><button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>

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

        <!-- SMS Modal -->
<div class="modal fade" id="smsModal" tabindex="-1" aria-labelledby="smsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('send.sms') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="smsModalLabel">Send SMS</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="form-label">To (Phone Number)</label>
            <input type="text" class="form-control" id="sms-phone" name="phone" readonly>
          </div>
          <div class="mb-3">
            <label for="message-text" class="form-label">Message</label>
            <textarea class="form-control" name="message" rows="4" required>Hi </textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Send SMS</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const smsButtons = document.querySelectorAll('.sms-btn');
    const smsPhoneInput = document.getElementById('sms-phone');
    const messageTextarea = document.querySelector('[name="message"]');

    smsButtons.forEach(button => {
        button.addEventListener('click', () => {
            const phone = button.getAttribute('data-phone');
            const name = button.getAttribute('data-name');

            smsPhoneInput.value = phone;
            messageTextarea.value = `Hi ${name}, `;
        });
    });
});
</script>


<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('users.update', 0) }}" id="editUserForm">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="edit-user-id">
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" id="edit-name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" id="edit-phone" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Service Number</label>
            <input type="text" name="svc" id="edit-svc" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Department</label>
            <select class="form-control form-control-lg" required name="department" name="department" id="edit-department">
                        <option value="" id="edit-department"></option>
                        <option value="">Change Department</option>
                        <option value="Architect">Architect</option>
                        <option value="Electricals">Electricals</option>
                        <option value="Civil Works">Civil Works</option>
                        <option value="Quantitative Surveyors">Quantitative Surveyors</option>
                        <option value="Orderly Room">Orderly Room</option>
                        <option value="Finance">Finance</option>
                      </select>
          </div>
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" id="edit-email" class="form-control" required>
          </div>
           <div class="mb-3">
             <label>Password (leave blank to keep current)</label>
             <input type="password" name="password" class="form-control">
           </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update User</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Bulk SMS Modal -->
<div class="modal fade" id="bulkSmsModal" tabindex="-1" aria-labelledby="bulkSmsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{ route('send.bulk.sms') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Send Bulk SMS to All Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label><strong>Recipients</strong></label>
            <div class="p-2 border rounded" style="max-height: 200px; overflow-y: auto;">
              <ul class="list-unstyled m-0">
                @foreach($users as $user)
                  <li>{{ $user->name }} - {{ $user->phone }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="mb-3">
            <label for="bulk-message" class="form-label"><strong>Message</strong></label>
            <textarea name="message" id="bulk-message" rows="5" class="form-control" required placeholder="Type your message to all users here..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Send Bulk SMS</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-user-btn');
    const form = document.getElementById('editUserForm');

    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            const name = button.dataset.name;
            const phone = button.dataset.phone;
            const svc = button.dataset.svc;
            const department = button.dataset.department;
            const email = button.dataset.email;

            form.action = `/users/${id}`; // Update form action
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-phone').value = phone;
            document.getElementById('edit-svc').value = svc;
            document.getElementById('edit-department').value = department;
            document.getElementById('edit-email').value = email;
        });
    });
});
</script>


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
