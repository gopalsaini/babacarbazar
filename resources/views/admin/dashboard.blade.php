@extends('layouts/master')
@section('title',__('Baba Car Bazar || Admin dashboard'))
@section('dashboard',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1> Admin Dashboard</h1>
                  <small> admin.</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="#">
                           <div id="cardbox1">
                              <div class="statistic-box">
                                 <i class="fa fa-user-plus fa-3x"></i>
                                 <div class="counter-number pull-right">
                                    <span class="count-number">{{$users}}</span> 
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                 </div>
                                 <h3> Users</h3>
                              </div>
                           </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="#">
                           <div id="cardbox2" style="background-color: #428bca;">
                              <div class="statistic-box">
                                 <i class="fa fa-product-hunt fa-3x"></i>
                                 <div class="counter-number pull-right">
                                    <span class="count-number">{{$products}}</span> 
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                 </div>
                                 <h3>Admin Products</h3>
                              </div>
                           </div>
                     </a>
                  </div>
				  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="#">
                           <div id="cardbox2" style="background-color: #428bca;">
                              <div class="statistic-box">
                                 <i class="fa fa-product-hunt fa-3x"></i>
                                 <div class="counter-number pull-right">
                                    <span class="count-number">{{$products_user}}</span> 
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                 </div>
                                 <h3>Users Products</h3>
                              </div>
                           </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="#">
                        <div id="cardbox4" style="background-color: #ac2925;">
                           <div class="statistic-box">
                              <i class="fa fa-comment fa-3x"></i>
                              <div class="counter-number pull-right">
                                 <span class="count-number">{{$contacts}}</span> 
                                 <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                 </span>
                              </div>
                              <h3> 
                                 Contact Message</h3>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="#">
                           <div id="cardbox2" style="background-color: #269abc;">
                              <div class="statistic-box">
                                 <i class="fa fa-shopping-cart fa-3x"></i>
                                 <div class="counter-number pull-right">
                                    <span class="count-number">{{$sales}}</span> 
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                 </div>
                                 <h3>Total sale products</h3>
                              </div>
                           </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="#">
                           <div id="cardbox2" style="background-color: #4a59b4;">
                              <div class="statistic-box">
                                 <i class="fa fa-thumb-tack fa-3x"></i>
                                 <div class="counter-number pull-right">
                                    <span class="count-number">{{$blogs}}</span> 
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                 </div>
                                 <h3>Total Posts</h3>
                              </div>
                           </div>
                     </a>
                  </div>
                  
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="#">
                        <div id="cardbox2" style="background-color: #428bca;">
                           <div class="statistic-box">
                              <i class="fa fa-quote-left  fa-3x"></i>
                              <div class="counter-number pull-right">
                                 <span class="count-number">{{$bulkenquiries}}</span> 
                                 <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                 </span>
                              </div>
                              <h3>Total Enquiries</h3>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
              
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
  

@endsection