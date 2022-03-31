<!-- modal start -->
<div class="z-10000 modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal_900">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Add Company</h5>
                     <button type="button" class="close" data-dismiss="modal"><i class="ri-close-fill"></i></button>
                  </div>
                  <form action="{{ url('/main/store') }}" method="post" enctype="multipart/form-data" name="form-wizard">
                     <div class="modal-body">
                        <input type="hidden" value="{{csrf_token() }}" name="_token">
                        <div class="row mb-6">
                           <div class="col-lg-4 mb-2">
                              <label class="control-label text-dark">Name * </label>
                           </div>
                           <div class="col-lg-12 mb-2">
                              <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                        <label class="control-label text-dark">Email</label>
                        </div>
                        <div class="col-lg-12 mb-2">
                              <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                        </div>
                       
                        <div class="col-lg-4 mb-2">
                        <label class="control-label text-dark">Website</label>
                        </div>
                        <div class="col-lg-12 mb-2">
                              <input type="text" class="form-control" id="website" placeholder="Enter Website" name="website">
                        </div>

                        <div class="col-lg-4 mb-2">
                        <label class="control-label text-dark">Image</label>
                        </div>
                        <div class="col-lg-12 mb-2">
                        <input name="savefile" class="form-control" type="file" accept="image/*" class="w-100">
                        </div>

                        <div class="col-lg-4 mb-2">
                        <label class="control-label text-dark">Address</label>
                        </div>
                        <div class="col-lg-12 mb-2">
                        <textarea class="form-control" id="address" placeholder="Enter Address" name="address"></textarea>
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