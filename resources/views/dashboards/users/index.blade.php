


<x-header></x-header>
<x-navigation></x-navigation>



<div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-10-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="./vendors/images/banner-img.png" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            Welcome back
                            <div class="weight-600 font-30 text-blue">Johnny Brown!</div>
                        </h4>
                        <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">

                            <div class="widget-data">
                                <div class="h3 mb-0">{{$total_committe}}</div>
                                <div class="weight-600 font-17">مجموع اللجان </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">

                            <div class="widget-data">
                                <div class="h3 mb-0">{{$total_wazer}}</div>
                                <div class="weight-600 font-17">مجموع كتب شكر معالي الوزير</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">

                            <div class="widget-data">
                                <div class="h3 mb-0">{{$total_wakel}}</div>
                                <div class="weight-600 font-17">مجموع كتب شكر وكيل الوزير</div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">

                            <div class="widget-data">
                                <div class="h3 mb-0">{{$total_moder}}</div>
                                <div class="weight-600 font-17">مجموع كتب شكر المدير العام </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- {{$total_vacation}} --}}


            <div class="row">

                @foreach ( $total_vacation as $key =>$value )

                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">

                            <div class="widget-data">
                                <div class="h4 mb-0">

                                  {{-- <?php  $users = DB::table('vacation_types')->where('vacation_type_id', '=', $key)->where('user_id', '=', Auth::user()->id)->get(); ?> --}}

                                  <?php $vacation_types= DB::table('vacation_types')->where('id', '=', $key)->first()->vacation_type;

                                //   print_r($vacation_types );

                                  ?>

                                  {{$vacation_types}}
                                    </div>
                                @foreach ($value as $details )

                                <div class="weight-600 font-14">     {{$details}}   </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            @extends('layouts.footer')
