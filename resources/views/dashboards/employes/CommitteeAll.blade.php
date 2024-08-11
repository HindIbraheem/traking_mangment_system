
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
                            <h4>  اللجان </h4>
                        </div>

                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"> الصفحة الرئيسية   </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> عرض جميع اللجان  </li>
                            </ol>

                            @if (session("success"))
                                <div class="alert alert-success alert-dismissible fade show mt-15" role="alert">
                                    <strong> <i class="icon-copy dw dw-notification"></i> تهانينا <br></strong>
                                    {{ session("success") }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @elseif(session("failed"))
                                <div class="alert alert-danger alert-dismissible fade show mt-15" role="alert">
                                    <strong>للأسف!...</strong> {{ session("failed") }}
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
            <div class="card-box mb-30 ">
                <div class="pd-20">

                </div>
                <div class="pb-20 ">
                    <table class="table hover multiple-select-row data-table-export nowrap directionClass">
                        <thead>

                            <tr>
                                <th> نسخة من الكتاب </th>
                                <th> العدد </th>
                                <th> التاريخ </th>
                                <th>  نوع الامر </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Committe as $key => $value)
                                <tr>

                                    <td style="text-align: right">
                                        <a href="#" data-toggle="modal" data-target="#image-modal-{{ $value->id }}">
                                            <img src="../assets/shoukurs/images/{{ $value->book_image }}" width="200px" alt="Book Image">
                                        </a>

                                        <div class="modal fade" id="image-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="image-modal-label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <center>
                                                    <div class="modal-body">
                                                        <img src="../assets/shoukurs/images/{{ $value->book_image }}" class="img-fluid" alt="Book Image" width="75%">
                                                    </div>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                    <td>{{ $value->book_number }}</td>
                                    <td>{{ $value->book_date }}</td>
                                    <td>{{ $value->book_type }}</td>

                                    <td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item"  ><i class="dw dw-edit2"></i> تعديل </a>
												<a class="dropdown-item" data-toggle="modal" data-target="#delete{{ $value->id }}" type="button"><i class="dw dw-delete-3"></i> حذف</a>
											</div>
										</div>
									</td>

                                </tr>

                                <div class="modal fade" id="delete{{ $value->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center font-18">
                                                <h4 class="padding-top-30 mb-30 weight-500">هل انت متأكد... ! ترغب في حذف البيانات ؟</h4>
                                                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                                                    <div class="col-6">
                                                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                        لا
                                                    </div>
                                                    <div class="col-6">
                                                        <button type="button" class="btn btn-danger border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-check"></i></button>
                                                        نعم
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Export Datatable End -->


            <x-footer class="footer"></x-footer>


