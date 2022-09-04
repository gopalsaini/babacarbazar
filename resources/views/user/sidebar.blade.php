<div class="col-md-3 page-sidebar">
                <aside>
                    <div class="inner-box">
                        <div class="user-panel-sidebar">
                            <div class="collapse-box">
                                <h5 class="collapse-title no-border"> My Account&nbsp; <a href="#MyClassified"
                                        data-toggle="collapse" class="pull-right">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </h5>
                                <div class="panel-collapse collapse show" id="MyClassified">
                                    <ul class="acc-list">
                                        <li>
                                            <a class="active" href="{{ route('account')}}">
                                                <i class="fas fa-home"></i> Dashboard </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.collapse-box  -->
                            <div class="collapse-box">
                                <h5 class="collapse-title"> My ads <a href="#MyAds" data-toggle="collapse"
                                        class="pull-right">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </h5>
                                <div class="panel-collapse collapse show" id="MyAds">
                                    <ul class="acc-list">
                                        <li>
                                            <a href="{{ route('user.add.products') }}" class="@yield('active')">
                                                <i class="fas fa-plus-circle"></i> Sell Car & Bikes
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('my.post')}}" class="@yield('post')">
                                                <i class="fas fa-book"></i> My Posts&nbsp; 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('my.favourite')}}" class="@yield('favourite')">
                                                <i class="fas fa-heart"></i> Favourite Posts&nbsp; 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('pending.approval') }}" class="@yield('approval')">
                                                <i class="fas fa-hourglass"></i> Pending Approval&nbsp; 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('my.enquery')}}" class="@yield('enquery')">
                                                <i class="fas fa-shopping-cart"></i> Buy Product Enquery&nbsp; 
                                            </a>
                                        </li>
										<li class="">
											<a href="{{ url('message')}}">
												<i class="fas fa-comments"></i> Chat
											</a>
										</li>

                                        <li>
                                            <a href="{{route('logout')}}">
                                                <i class="fas fa-sign-out-alt"></i> Logout&nbsp;
                                            </a>
                                        </li>
                                        

                                    </ul>
                                </div>
                            </div>
                            <!-- /.collapse-box  
                            <div class="collapse-box">
                                <h5 class="collapse-title"> Terminate Account&nbsp; <a href="#TerminateAccount"
                                        data-toggle="collapse" class="pull-right">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </h5>
                                <div class="panel-collapse collapse show" id="TerminateAccount">
                                    <ul class="acc-list">
                                        <li>
                                            <a href="account/close">
                                                <i class="icon-cancel-circled "></i> Close account </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            collapse-box  -->
                        </div>
                    </div>
                    <!-- /.inner-box  -->
                </aside>
            </div>