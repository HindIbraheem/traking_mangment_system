

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
									<li class="breadcrumb-item"><a href="index.html"> الصفحة الرئيسية </a></li>
									<li class="breadcrumb-item active" aria-current="page">سجل الاجازات </li>
								</ol>

                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-15" role="alert">
                                    <strong> <i class="icon-copy dw dw-notification"></i> تهانينا <br></strong> {{ session('success') }}
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

<!-- Export Datatable start -->
<div class="card-box mb-30 " >
    <div class="pd-20">
        {{-- <h4 class="text-blue h4">Data Table with Export Buttons</h4> --}}
    </div>
    <div class="pb-20 ">
        <table class="table hover multiple-select-row data-table-export nowrap directionClass">
            <thead >

                <tr>
                    <th class="table-plus datatable-nosort">#</th>
                    <th>نوع الاجازة </th>
                    <th>  تاريخ الاجازة من </th>
                    <th>  تاريخ الاجازة الى </th>
                    <th>  الغرض من الاجازة </th>
                    <th> موافقة مسؤول الشعبة  </th>
                    <th> موافقة مدير القسم </th>

                </tr>
            </thead>
            <tbody  >
                @foreach ($Vacations as $key =>$value )

                <tr>
                    <td class="table-plus">{{ $key+1 }}</td>
                    <td >

                        {{-- {{ $value->vacation_type }} --}}
                        <x-vacation-type :value="$value" />

                    </td>
                    <td>
                         <span dir="ltr">
                        @if ($value->vacation_type_id == '3')
                        {{date('g', strtotime($value->from_time)).'h'.' '.date('i', strtotime($value->from_time)).'m'}} من
                        @else
                        {{ date('Y-m-d', strtotime($value->from_day));}}
                        @endif


                    </span>
                    </td>
                    <td>

                        <span dir="ltr">
                        @if ($value->vacation_type_id == '3')
                        {{date('g', strtotime($value->to_time)).'h'.' '.date('i', strtotime($value->to_time)).'m'}} الى
                        @else
                        {{ date('Y-m-d', strtotime($value->to_day))}}
                        @endif
                        </span>
                      </td>
                    <td>{{ $value->vacation_purpoes  }}</td>

                    <td>

@if ($value->mag_classes_aprove =='0')
<button type="button" class="btn btn-warning">قيد الموافقة </button>
@elseif($value->mag_classes_aprove =='1')
<button type="button" class="btn btn-success">مقبولة </button>
@else
<button type="button" class="btn btn-danger">مرفوظة</button>
@endif





                         </td>

                         <td>

                            @if ($value->mag_department_aprove =='0')
<button type="button" class="btn btn-warning">قيد الموافقة </button>
@elseif($value->mag_classes_aprove =='1')
<button type="button" class="btn btn-success">مقبولة </button>
@else
<button type="button" class="btn btn-danger">مرفوظة</button>
@endif



                     </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Export Datatable End -->





                <x-footer></x-footer>

