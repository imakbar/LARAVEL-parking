<!--
#################################
    - Begin: FOOTER -
#################################
-->
<footer class="footer">
    <div class="bg-dark pt-60 pb-30">
        <div class="container">
            
            <div class="row">
                
                <div class="col-md-12">
                    <div class="bs-solid bc-v2-light bw-s1 bt-0 bl-0 br-0 pb-40 mb-50">
                        
                        <div class="row">
                            
                            <div class="col-md-6">
                                <!-- Begin: LOGO -->
                                <a class="navbar-brand logo text-pink" href="{{url('/')}}">
                                    <img class="full-width max-width-140 m-right-10" alt="{{$ASPTitle}}" src="{{url('/')}}/uploads/settings/{{$ASPLogoLight}}">
                                </a>
                                <span class="text-white">/ {{$ASPSlogan}}</span>
                                <!-- End: LOGO -->
                            </div>
                            
                            <div class="col-md-6">
                                <!-- Begin: SOCIAL -->
                                <div class="text-right">
                                    <ul class="social list-inline text-size-s1 mb-s2">
                                        @foreach($ASPSocials->get() as $Social)
                                        <li class="list-inline-item mr-s2">
                                            <a class="bg-pink text-white bg-white--hover text-pink--hover rounded-circle" href="{{$Social->social_link}}" title="{{$Social->name}}">
                                                <i class="{{$Social->icon}}"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End: SOCIAL -->
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            
            <div class="row">
                
                <div class="col-lg-4 col-md-6">
                    <div class="mb-30">
                        <h5 class="text-bold-700 mb-30 text-white text-uppercase">Contact Us</h5>
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="row mb-20 map-bg">
                                    <div class="col-md-12 text-white">
                                        <address> <abbr title="Address"><strong>Address:</strong></abbr><br> {{$ASPAddress}} </address>
                                        <address> <abbr title="Phone"><strong>Phone:</strong></abbr><br> {{$ASPPhone}} </address>
                                        <address> <abbr title="Email"><strong>Email:</strong></abbr><br> <a class="text-pink" href="mailto:{{$ASPEmail}}">{{$ASPEmail}}</a> </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="mb-30">
                        
                        <h5 class="text-bold-700 mb-26 text-white text-uppercase">Blog</h5>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <ul>
                                    @foreach($ASPMaxComments as $ASPMaxComment)
                                    <li>
                                        <div class="mb-s2">
                                            <div class="d-flex">
                                                <div class="mr-s2">
                                                    <a href="{{url('/')}}/blog/{{$ASPMaxComment->BlogCategorySetup->slug}}/{{$ASPMaxComment->slug}}"><img class="w--70" src="{{url('/')}}/uploads/posts/xs-{{$ASPMaxComment->avatar}}" alt="{{$ASPMaxComment->title}}"></a>
                                                </div>
                                                <div>
                                                    <h6 class="text-bold-600 text-size-15"><a class="text-white text-pink--hover" href="{{url('/')}}/blog/{{$ASPMaxComment->BlogCategorySetup->slug}}/{{$ASPMaxComment->slug}}">{{$ASPMaxComment->title}}</a></h6>
                                                    <ul class="list-inline text-size-10 text-bold-400 text-white mt-s1">
                                                        <li class="list-inline-item">
                                                            <i class="icon-clock"></i> &nbsp;{{date_format(date_create($ASPMaxComment->created_date), 'd, M Y')}}
                                                        </li>
                                                        <li class="list-inline-item text-size-10">/</li>
                                                        <li class="list-inline-item">
                                                            <i class="icon-bubbles"></i>
                                                            <a class="text-white text-pink--hover" href="{{url('/')}}/blog/{{$ASPMaxComment->BlogCategorySetup->slug}}/{{$ASPMaxComment->slug}}">{{$ASPMaxComment->BlogComments->count()}}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><hr class="bs-dashed bc-v1-dark"></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="col-lg-4 col-md-12">
                    <div class="mb-30">
                        
                        <div class="row">

                            <div class="col-lg-12 col-md-6">
                                
                                <h5 class="text-bold-700 mb-30 text-white text-uppercase">Newsletter</h5>

                                <div class="row mb-20">
                                    <div class="col-md-12">
                                        
                                        <form class="mb-20">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="email" class="form-control form-control-lg rounded-0 bg-white text-size-14" placeholder="Enter your email">
                                                    <button type="submit" class="input-group-addon btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13  p-top-12 pb-12 p-left-20 p-right-20"><i class="fa fa-envelope"></i></button>
                                                </div>
                                            </div>
                                            <p class="text-muted">Subscribe to our newsletter and we will inform you about newset projects and promotions</p>
                                        </form>

                                        <img class="full-width max-width-140 m-right-10" alt="{{$ASPTitle}}" src="assets/images/paypal-logo.png">

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</footer>

<footer class="bg-dark pt-s1 pb-s1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mt-s2 mb-s2 text-white">
                    <p class="m-0 text-white">&copy; Copyright 2018 by <abbr title="{{$ASPTitle}}"><a href="#" class="text-white">{{$ASPTitle}}</a></abbr>. All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mt-s2 mb-s2 text-white text-right">
                    <a class="text-white" href="#">Privacy Policy</a> | <a class="text-white" href="#">Terms & Conditions</a>
                </div>
            </div>
        </div> <!-- /ROW -->
    </div> <!-- /CONTAINER -->
</footer>
<!-- End: FOOTER -
################################################################## -->