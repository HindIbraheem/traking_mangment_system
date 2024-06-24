<x-header></x-header>
<x-navigation></x-navigation>
<div class="mobile-menu-overlay"></div>


<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row" dir="rtl" style="text-align: right">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>الموقف الحالي بتاريخ ( {{(Carbon\Carbon::now()->format('Y/m/d'))}})  </h4>
                        </div>

                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"> الموقف اليومي  </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> الموقف الحالي   </li>
                            </ol>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-15" role="alert">
                                    <strong> <i class="icon-copy dw dw-notification"></i> تهانينا <br></strong>
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @elseif(session('failed'))
                                <div class="alert alert-danger alert-dismissible fade show mt-15" role="alert">
                                    <strong>للأسف!...</strong> {{ session('failed') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="pd-20 card-box" dir="rtl" style="text-align: right">

                        <h5 class="h5 mb-20"> أضافة موقف   </h5>
                        {{-- <ul> اجمالي طلبات الاجازات لهذا الشهر <strong> ( الشهر {{ Carbon\Carbon::now()->month }} )</strong> --}}

                            <form action=""
                                method="GET" enctype="multipart/form-data">

                            <div class="row ">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> تاريخ بدء الاجازة  </label>
                                        <input class="form-control datetimepicker"  name="from_day" required placeholder="ادخل تاريخ ووقت صحيح" type="text" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>  تاريخ انتهاء الاجازة </label>
                                        <input class="form-control datetimepicker"  name="to_day" required placeholder="ادخل تاريخ ووقت صحيح" type="text" autocomplete="off">


                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group ">
                                        {{-- <label>Single Select</label><br> --}}
                                        <button type="submit" class="btn btn-primary mt-30"> فلترة
                                        </button>

                                    </div>
                                </div>


                            </div>
                        </form>





                    </div>





                    </div>
                </div>
            </div>
            <!-- Export Datatable start -->
            <div class="card-box mb-30 ">
                <div class="pd-20">
                    {{-- <h4 class="text-blue h4">Data Table with Export Buttons</h4> --}}

                    <a href="{{ route('personalVacation') }}" class="btn btn-outline-info">طباعة</a>

                </div>
                <div class="pb-20 ">
                    <table class="table hover multiple-select-row data-table-export nowrap directionClass">
                        <thead>

                            <tr>
                                <th class="table-plus datatable-nosort">#</th>
                                <th> أسم الموظف </th>
                                <th>نوع الاجازة </th>
                                <th> تاريخ الاجازة من </th>
                                <th> تاريخ الاجازة الى </th>
                                <th>  الموافقات  </th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Vacations as $key => $value)

@if((\Carbon\Carbon::parse($value->from_day)->format('d/m/Y'))  <=  (Carbon\Carbon::now()->format('d/m/Y'))  )



                                <tr>
                                    <td class="table-plus">{{ $key + 1 }}


                                    </td>
                                    <td>{{ $value->full_name }}</td>



                                    <td><x-vacation-type :value="$value" /></td>
                                    <td>

                                        {{ date('Y-m-d', strtotime($value->from_day)) }}
                                        <br>
                                        <span dir="ltr">
                                            @if ($value->vacation_type == '3')
                                                {{ date('H:i:s A', strtotime($value->from_day)) }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>







                                        {{ date('Y-m-d', strtotime($value->to_day)) }}
                                        <br>
                                        <span dir="ltr">
                                            @if ($value->vacation_type == '3')
                                                {{ date('H:i:s A', strtotime($value->to_day)) }}
                                            @endif
                                        </span>



                                        <strong style="color: red">             @if((\Carbon\Carbon::parse($value->to_day)->format('d/m/Y'))  >  (Carbon\Carbon::now()->format('d/m/Y'))  )


                                            (غير منتهية)
                                                                                    @endif


                                        </strong>
                                    </td>
                                    <td>
<strong> مدير الشعبة : </strong> <x-class-approvment :value="$value" />


<br>

<strong> مدير القسم : </strong> <x-dep-approvment :value="$value" />






                                    </td>





                                </tr>


                          @endif

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Export Datatable End -->





            <x-footer></x-footer>
