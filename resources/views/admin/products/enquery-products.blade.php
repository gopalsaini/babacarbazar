@extends('layouts/master')
@section('title',__('Baba motors || All Enquery'))
@section('enquery',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-tag"></i>
        </div>
        <div class="header-title">
            <h1>Product Enquery</h1>
            <small>Enquery List</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
			
            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list"></i> Enquery List
                    </div>
                    <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div class="table-responsive">
							<table data-order='[[ 0, "desc" ]]' class="table table-bordered user-enquery">
                            <thead>
                                <tr>
                                        <th>S.n.</th>
										<th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Message</th>
										<th>Enquery date</th>
                                        <th>Products</th>
                                        <th>Seller</th>
                                        <th>Products View</th>
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


@endsection