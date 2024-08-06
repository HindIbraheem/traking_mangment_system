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
                            <h4>البيانات الشخصية </h4>
                        </div>

                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"> الصفحة الشخصية </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> البيانات الشخصية </li>
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




            <div class="pd-20 card-box mb-30" dir="rtl" style="text-align: right">
                <div class="clearfix">
                    <div class="pull-right">
                        <h4 class="text-blue h4">ادخل جميع البيانات المطلوبة</h4>
                        {{-- <p class="mb-30">All bootstrap element classies</p> --}}
                    </div>

                </div>
@if ($check->isEmpty())

@include('dashboards.employes.personalData-add')

@else

@include('dashboards.employes.personalData-update')

@endif



            </div>
            <!-- Default Basic Forms End -->
            <x-footer></x-footer>
            <script type="text/javascript">

                var i = 0;

                $("#add").click(function(){
                    ++i;
                    $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][uni]" placeholder="ادخل اسم الجامعة " class="form-control" /></td><td><input type="text" name="addmore['+i+'][college]" placeholder="ادخل اسم الكلية ( التخصص)" class="form-control" /></td><td><input type="text" name="addmore['+i+'][dep]" placeholder=" ادخل اسم القسم ( التخصص الدقيق )" class="form-control" /></td><td><input type="text" name="addmore['+i+'][craductedCountry]" placeholder=" ادخل اسم الدولة  " class="form-control" /></td><td><input type="text" name="addmore['+i+'][craductedDate]" placeholder=" ادخل سنة التخرج" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">حذف</button></td></tr>');
                });

                $(document).on('click', '.remove-tr', function(){
                     $(this).parents('tr').remove();
                });

            </script>
