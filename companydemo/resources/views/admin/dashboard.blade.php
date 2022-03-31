<!DOCTYPE html>
<html>
 <head>
  <title>PROTRACKED</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:1200px;
    margin:0 auto;
    border:1px solid #ccc;
   }
   table, th, td {
    border:1px solid black;
    border-collapse: collapse;
    }
    .main_heading{border-bottom: 1px solid #ccc;}

  </style>
 </head>
 <body>
  <br />
  
  @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif
   @if(session()->has('success'))
    <div class="alert alert-success">
    <strong>{{ session()->get('success') }}</strong>
    </div>
   @endif
  <div class="container box">
  <h3 class="main_heading" style="line-height: 2.1;" align="left"><span>Companies</span>
  <small class="pull-right"><a class="btn btn-primary" href="{{ url('/main/employee_dashboard') }}" >Add Employee</a></small>
  </h3><br />

   @if(isset(Auth::user()->email))
    <!-- card start -->
  <div class="card">
  <a class="btn btn-success" href="#" data-toggle="modal" data-target="#myModal" title="new company">Create new Company</a>
  @include('admin.company_modal')
  <div class="card-header"><h3 class="card-title">Companies list</h3></div>

<div class="card-body">
    <div class="table-responsive">
      <table class="table card-table table-vcenter text-nowrap align-items-center" id="coupon_history">
      <thead class="tab-head">
          <tr> 
            <th class="head-title">Name</th>
            <th class="head-title">Address</th>
            <th class="head-title">Website </th>
            <th class="head-title">Email</th>
            <th class="head-title"></th>
          </tr>
          <tbody>
             
              @forelse($company_det as $key=>$data)
              <tr style="background: #f0f0f5;">
                  <td>{{$data->name}}</td>
                  <td>{{$data->address}}</td>
                  <td>{{$data->webiste}}</td>
                  <td>{{$data->email}}</td>
                  <td>
                  <a href="#"  data-toggle="modal" data-target="#myModaled{{$data->id}}" class="btn btn-primary"><i class="fa fa-pencil"></i>Edit</a>
                  @include('admin.company_modal_edit')
                  &nbsp;&nbsp;<a href="{{ url('/main/company_delete') }}/{{$data->id}}" class="btn btn-danger" onclick="return confirm(' you want to delete?');" ><i class="icon-bin"></i>Delete</a>

                  </td>
              </tr>
              @empty
                    <tr><td colspan="8" class="text-center">No data available</td></tr>
              @endforelse
            
          </tbody>
      </thead>     
      </table>  
        <div class="pull-right" id="">
        @if($company_det != null)
          {!!$company_det->appends(request()->input())->links()!!}
        @endif
        </div>
    </div>
   </div>
</div>
<!-- card end -->
    <div class="alert alert-danger success-block">
     <strong>Welcome {{ Auth::user()->email }}</strong>
     <br />
     <a href="{{ url('/main/logout') }}">Logout</a>
    </div>
  @else
    <script>window.location = "/main";</script>
   @endif
   
   <br />
  </div>

 </body>
</html>

@section('scripts') @parent

