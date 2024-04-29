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
                            <h4>اجازاتي </h4>
                        </div>

                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">سجل الاجازات </a></li>
                                <li class="breadcrumb-item active" aria-current="page">طلب اجازة </li>
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
                        <h5 class="h5 mb-20">أحصائية الاجازات </h5>


                        <ul> اجمالي طلبات الاجازات لهذا الشهر <strong> ( الشهر {{ Carbon\Carbon::now()->month }}
                                )</strong>

                            @foreach ($vacation_type as $key => $data)
                                <li> <strong> - نوع الاجازة <x-vacation-type :value="$data" /> : </strong>
                                    {{ $data->total }}</li>
                            @endforeach


                        </ul>
                        <br>


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
                                <th> الغرض من الاجازة </th>
                                <th> موافقة مسؤول الشعبة </th>
                                <th> موافقة مدير القسم </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Vacations as $key => $value)
                                <tr>
                                    <td class="table-plus">{{ $key + 1 }}</td>
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
                                    <td> {{ date('Y-m-d', strtotime($value->to_day)) }}
                                        <br>
                                        <span dir="ltr">
                                            @if ($value->vacation_type == '3')
                                                {{ date('H:i:s A', strtotime($value->to_day)) }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ $value->vacation_purpoes }}</td>

                                    <td>

                                        @if ($value->mag_classes_aprove == '0')
                                            <button type="button" class="btn btn-warning" disabled>قيد الموافقة
                                            </button>
                                        @elseif($value->mag_classes_aprove == '1')
                                            <button type="button" class="btn btn-success" disabled>مقبولة </button>
                                        @elseif($value->mag_classes_aprove == '2')
                                            <button type="button" class="btn btn-danger" disabled>مرفوظة</button>
                                        @endif





                                    </td>

                                    <td>

                                        @if ($value->mag_department_aprove == '0')
                                            <button class="btn btn-warning" data-toggle="modal"
                                                data-target="#timerModal{{ $value->id }}" type="button">قيد
                                                الموافقة </button>
                                        @elseif($value->mag_department_aprove == '1')
                                            <button class="btn btn-success" data-toggle="modal"
                                                data-target="#timerModal{{ $value->id }}" type="button">مقبولة
                                            </button>
                                        @elseif($value->mag_department_aprove == '2')
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#timerModal{{ $value->id }}"
                                                type="button">مرفوضة</button>
                                        @endif



                                    </td>

                                </tr>


                                <?php

                                ?>


                                <!-- Large modal -->
                                <div class="modal fade bs-example-modal-lg" id="timerModal{{ $value->id }}"
                                    tabindex="-1" role="dialog" aria-labelledby="timerModal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="timerModal"> ( اجازة <x-vacation-type
                                                        :value="$value" /> ) نوع الاجازة </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>


                                            <form action="{{ route('department.RequesSubmit', ['id' => $value->id]) }}"
                                                method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                                <div class="modal-body">
                                                    <div class="row RdirectionClass" dir="rtl">

                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="vacation_type" value="3">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label> <strong> عرض بيانات الموظف </strong>
                                                                        </label>
                                                                        <button type="button" class="btn"
                                                                            data-bgcolor="#181f48"
                                                                            data-color="#ffffff"><i
                                                                                class="fa fa-user-circle-o"></i> مشاهدة
                                                                            البيانات </button>

                                                                        @php

                                                                        @endphp

                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label> حالة الاجازة </label>

                                                                        <select
                                                                            class="form-control mb-5 RdirectionClass"
                                                                            name="mag_department_aprove">
                                                                            <option value="1">قبول طلب الاجازة
                                                                            </option>
                                                                            <option value="2">رفض طلب الاجازة
                                                                            </option>
                                                                        </select>

                                                                    </div>
                                                                </div>

                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"> اغلاق </button>
                                                    <button type="submit" class="btn btn-primary"> حفظ البيانات
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Export Datatable End -->





            <x-footer></x-footer>
