@include('departments.architect.layout.app')
<style>
   

.container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
}

.form, .table {
    flex: 1 1 300px; /* Flex-grow, flex-shrink, flex-basis */
    min-width: 300px;
    border: 1px solid #ccc;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.form label {
    margin-bottom: 5px;
}

.form input, .form textarea, .form button {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form button {
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}

.form button:hover {
    background-color: #0056b3;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }
}
</style>

<div class="container">
        <form class="form" method="POST" action="{{url('/help-architect-submit')}}">
            @csrf
            <h2>I.T Help Desk Query/Complains Form</h2>
            <label for="name">Name:</label>
            <input type="text" required id="name" value="{{Auth::user()->name}}" readonly name="name">

            <label for="service">Service Number:</label>
            <input type="text" required id="service" value="{{Auth::user()->svc}}" readonly name="service">
            
            <label for="department">Department:</label>
            <input type="department" required id="department" value="{{Auth::user()->department}}" readonly name="department">

            <label for="email">Email:</label>
            <input type="email" required id="email" value="{{Auth::user()->email}}" readonly name="email">
            
            <label for="message">Query/Complain:</label>
            <textarea id="message" required name="message"></textarea>
            
            <button type="submit">Submit</button>
        </form>
        
        @foreach($help as $help)
        <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-google d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h2 class="text-white font-weight-bold">{{$help->created_at}}</h2>
                      <p class="mt-2 text-white card-text">{{$help->message}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            
    </div>