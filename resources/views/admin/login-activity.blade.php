@extends('layouts/master')
@section('title',__('Desidukaan.ae || User activities'))
@section('reports',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-history"></i>
        </div>
        <div class="header-title">
            <h1>Users Activities</h1>
            <small> </small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    
                    <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div class="table-responsive">
                        <p id="date_filter">
                        <form method="post" action="{{url('login-data-filter')}}">
                        @csrf
                        <div class="row">
                            <div  class="col-md-4"><input required class="form-control date" name="fromDate" type="text" placeholder="From :"/></div>
                            <div  class="col-md-4"><input required class="form-control date" name="toDate"  type="text" placeholder="To :" /></div>
                            <div class="col-md-4"><button class="btn btn-primary" type="submit">Filter</button></div>
                        </div>
                        </form>
                        </p>    
                        <br>
                             <table data-order='[[ 0, "desc" ]]' class="table table-bordered table-hover activity">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email Id</th>
                                        <th>Login Time</th>
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