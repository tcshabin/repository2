<!-- modal start -->
<div class="z-10000 modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal_900">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Add Employee</h5>
                     <button type="button" class="close" data-dismiss="modal"><i class="ri-close-fill"></i></button>
                  </div>
                  <form action="{{ url('/main/create_employee') }}" method="post" enctype="multipart/form-data" name="form-wizard">
                     <div class="modal-body">
                        <input type="hidden" value="{{csrf_token() }}" name="_token">
                        <div class="row mb-6">
                           <div class="col-lg-4 mb-2">
                              <label class="control-label text-dark">Firstname * </label>
                           </div>
                           <div class="col-lg-12 mb-2">
                              <input type="text" class="form-control" id="firstname" placeholder="Enter Firstname" name="firstname" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                        <label class="control-label text-dark">Lastname</label>
                        </div>
                        <div class="col-lg-12 mb-2">
                              <input type="text" class="form-control" id="lastname" placeholder="Enter Lastname" name="lastname" required>
                        </div>
                       
                        <div class="col-lg-4 mb-2">
                        <label class="control-label text-dark">Company</label>
                        </div>
                        <div class="col-lg-12 mb-2">
                              <select class="form-control chosen-select" name="company" id="company" required>
                              <option value="">Select Company</option>
                              @forelse($company_det as $key=>$company)
                                 <option value="{{$company->id}}" selected="">{{$company->name}}</option>
                              @empty
                                  <option value="">Select Company</option>
                              @endforelse
                              </select>
                        </div>

                        <div class="col-lg-4 mb-2">
                        <label class="control-label text-dark">Email</label>
                        </div>
                        <div class="col-lg-12 mb-2">
                              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>

                        <div class="col-lg-4 mb-2">
                        <label class="control-label text-dark">Phone</label>
                        </div>
                        <div class="col-lg-12 mb-2">
                        <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                        </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="create">Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
  <!-- model end -->