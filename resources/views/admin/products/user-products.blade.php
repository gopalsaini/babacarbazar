@extends('layouts/master')
@section('title',__('Baba motors || All products'))
@section('user_product',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-tag"></i>
        </div>
        <div class="header-title">
            <h1>Products</h1>
            <small>Products List</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
			    <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th"></i> Goto
                    </div>
                    <div class="panel-body">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="{{ route('admin.addproduct') }}">
                                <i class="fa fa-plus"></i> Add Product </a>
                        </div>
                        
                        <div class="btn-group btn btn-success" id="buttonlist">Total sales cars ({{$sales}})
                        </div>
                    </div>
                </div>
            </div>
		
            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list"></i> Prodcut List
                    </div>
                    <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div class="table-responsive">
							<table data-order='[[ 0, "desc" ]]' class="table table-bordered user-products">
                            <thead>
                                <tr>
                                        <th>S.n.</th>
										<th>User</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Model</th>
										<th>KM Driven</th>
                                        <th>Owners</th>
                                        <th>Price</th>
                                        <th>Date</th>
										<th>Status</th>
										<th>Sale Out</th>
										<th>View</th>
										<th>Edit</th>
										<th>Delete</th>
                                    </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Large modal -->



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bill Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="renderdata">
        
      </div>
    </div>
  </div>
</div>


<script>
    
    function delete(){
        alert();
        //return confirm('Are you sure? you want to delete');
    }
</script>
@endsection


@push('custom_js')
<script>
$(".viewproduct").click(function(){

   
    var id = $(this).data('id');
alert('ssss');
    $.ajax({
        url: formAction,
        data: {id:id},
        dataType: 'json',
        type: 'post',
        beforeSend: function() {
            $('#preloader').css('display', 'block');
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                
            } else {
                
            }

            $('#preloader').css('display', 'none');
        },
        success: function(data) {
            if (data.error) {
                
            } else {
				$('#renderdata').html(data.html)
				$('#myModal').modal('show')
               
            }
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            $('#preloader').css('display', 'none');
        },
        cache: false,
        contentType: false,
        processData: false,
    });

});
</script>
@endpush