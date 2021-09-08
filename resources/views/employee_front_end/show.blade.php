<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Employee Crud</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-lg-12">
          @if(Session::get('success'))
            <span class="alert alert-success">{{Session::get('success')}}
            </span>
          @endif

          @if(Session::get('fail'))
            <span class="alert alert-danger">{{Session::get('success')}}
            </span>
          @endif

          <!-- retrieve data from database -->

          <div class="row">
            <div class="col-sm-12">
              <h3>Employee Details</h3>
              <table class="table table-hovered table-stripeed">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Sallary</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($employee as $index=>$data)
                  <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$data->e_name}}</td>
                    <td>{{$data->e_address}}</td>
                    <td>{{$data->e_contact_no}}</td>
                    <td>{{$data->e_email}}</td>
                    <td>{{$data->e_designation}}</td>
                    <td>{{$data->e_sallary}}</td>
                    <td>
                      <a type="button"
                       href="{{route('EmployeeResources.edit',$data) }}"
                       class="btn btn-primary">Edit
                      </a>
                       &nbsp
                      <form method="post"
                      action="{{route('EmployeeResources.destroy',$data) }}"
                      style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger"
                      onclick="return confirm('sure to delete!!!')">Delete
                    </button>
                      </form>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

    </div>
  </body>
</html>
