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

                            <form action="{{ route('AdminDepartment.Current-Status-Submit') }}"
                                method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-group  ">
                                        <label>الموظف </label>
                                        <select class="selectpicker form-control RdirectionClass"   name="user_id" data-live-search="true"  >
                                            <optgroup label="رجاءا اختيار موظف "  class="RdirectionClass">

                                                @foreach ($employe as $data)
                                                <option value="{{$data->id}}" class="RdirectionClass"  > {{$data->full_name}}</option>
                                                @endforeach
                                            </optgroup>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>نوع الاجازة </label>
                                        <select class="selectpicker form-control RdirectionClass" name="vacation_type_id" style="width: 100%; height: 38px;">

                                                <option value="1" class="RdirectionClass">اعتيادية </option>
                                                <option value="2" class="RdirectionClass"> مرضية</option>
                                                <option value="3" class="RdirectionClass"> زمنية</option>
                                                <option value="4" class="RdirectionClass"> امومة</option>
                                                <option value="5" class="RdirectionClass">  بدون راتب </option>
                                                <option value="6" class="RdirectionClass"> تعويضية </option>
                                                <option value="7" class="RdirectionClass"> دراسية </option>
                                                {{-- <option value="8"> </option> --}}


                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label> تاريخ بدء الاجازة  </label>
                                        <input class="form-control datetimepicker"  name="from_day" required placeholder="ادخل تاريخ ووقت صحيح" type="text">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>  تاريخ انتهاء الاجازة </label>
                                        <input class="form-control datetimepicker"  name="to_day" required placeholder="ادخل تاريخ ووقت صحيح" type="text">


                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group ">
                                        {{-- <label>Single Select</label><br> --}}
                                        <button type="submit" class="btn btn-primary mt-30"> حفظ البيانات
                                        </button>

                                    </div>
                                </div>


                            </div>
                        </form>

                        <ul> اجمالي طلبات الاجازات لهذا الشهر <strong> ( الشهر {{ Carbon\Carbon::now()->month }}
                            )</strong>

                        @foreach ($vacation_type as $key => $data)
                            <li> <strong> - نوع الاجازة <x-vacation-type :value="$data" /> : </strong>
                                {{ $data->total }}</li>
                        @endforeach


                    </ul>
                    </div>





                    </div>
                </div>
            </div>
            <!-- Export Datatable start -->
            <div class="card-box mb-30 ">
                <div class="pd-20">
                    {{-- <h4 class="text-blue h4">Data Table with Export Buttons</h4> --}}
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

                                <th>  #   </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Vacations as $key => $value)

@if((\Carbon\Carbon::parse($value->from_day)->format('d/m/Y'))  <=  (Carbon\Carbon::now()->format('d/m/Y'))  )


{{-- {{ Carbon\Carbon::now()->format('d/m/Y') }}<br>
{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y')}} --}}
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
<strong> مدير الشعبة

:
</strong>   @if ($value->mag_classes_aprove == '0')
 <strong class="text-yellow"> قيد الموافقة </strong>

@elseif($value->mag_classes_aprove == '1')
<strong class="text-success"> مقبولة </strong>
@elseif($value->mag_classes_aprove == '2')
<strong class="text-danger"> مرفوظة </strong>
@endif

<br>

<strong> مدير القسم

    :
    </strong>   @if ($value->mag_department_aprove == '0')
     <strong class="text-yellow"> قيد الموافقة </strong>

    @elseif($value->mag_department_aprove == '1')
    <strong class="text-success"> مقبولة </strong>
    @elseif($value->mag_department_aprove == '2')
    <strong class="text-danger"> مرفوظة </strong>
    @endif







    </h6>

                                    </td>

                                    <td>



                                            <button type="button" class="btn btn-outline-success">تعديل</button>

                                            <a href="{{ route('personalVacation') }}" class="btn btn-outline-info">طباعة</a>

                                            <a
                                            href="{{ route('AdminDepartment.deleteCurrent', ['id' => $value->id]) }}">

                                            <button class="btn btn-outline-danger">حذف

                                            </button>
                                        </a>








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
