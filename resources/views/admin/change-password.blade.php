@extends('layouts/master')
@section('title',__('Change Password'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-tag"></i>
               </div>
               <div class="header-title">
                  <h1>Change Password</h1>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd ">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist">  
                           </div>
                        </div>
                        <div class="panel-body">
                        <form action="{{ route('admin.changepassword')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6">
                            <label for="inputName">Enter Old Password</label>
                            <input required type="text"  id="inputName" class="form-control" name="old_pass">
                            @error('old_pass')
                                <p class="alert" style="color:red">{{ $message }} <p>
                            @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputName">Enter New Password</label>
                            <input required type="text"  id="inputName" class="form-control" name="password">
                            @error('password')
                                <p class="alert" style="color:red">{{ $message }} <p>
                            @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputName">Enter Confirm  Password</label>
                            <input required type="text"  id="inputName" class="form-control" name="password_confirmation">
                            @error('confirm')
                                <p class="alert" style="color:red">{{ $message }} <p>
                            @enderror
                          </div>
                          <div class="form-group col-md-12">
                            <input type="submit" id="inputProjectLeader" class="btn btn-primary">
                          </div>
                          </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>

         @endsection