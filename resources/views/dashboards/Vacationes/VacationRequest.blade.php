


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
									<li class="breadcrumb-item ml-10"><a href="index.html" >سجل الاجازات </a></li>
									<li class="breadcrumb-item active" aria-current="page">طلب اجازة </li>
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
				<div class="row clearfix"  style="text-align: right">
					<!-- Large modal -->
					<div class="col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<h5 class="h4"> اجازة اعتيادية </h5>
							<a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg" type="button">
								<img src="../vendors/images/Man reading-pana.png" alt="modal">
							</a>
							<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel"> ( اجازة اعتيادية ) نوع الاجازة </h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
                                        <form action="{{ route('normalVacationSubmit') }}" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

										<div class="modal-body" dir="rtl">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">

                                                    <input type="hidden" name="vacation_type" value="اعتيادية">
                                                        <div class="form-group">
                                                            <label>من تاريخ </label>
                                                            <input name="from_day" class="form-control RdirectionClass" placeholder="اختر تاريخ بدء الاجازة " type="date" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>الى تاريخ </label>
                                                            <input name="to_day" class="form-control RdirectionClass" placeholder="اختر تاريخ انتهاء الاجازة " type="date" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>الغرض من الاجازة </label>
                                                            <textarea name="vacation_purpoes" class="form-control" name="vacation_purpoes" required placeholder="الغرض من طلب الاجازة "></textarea>
                                                        </div>
                                                </div>

                                               </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save changes</button>
										</div>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</div>

                    <!-- Large modal -->
					<div class="col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<h5 class="h4">اجازة مرضية </h5>
							<a href="#" class="btn-block" data-toggle="modal" data-target="#sick-modal" type="button">
								<img src="../vendors/images/Hypochondriac-pana.png" alt="modal">
							</a>
							<div class="modal fade bs-example-modal-lg" id="sick-modal" tabindex="-1" role="dialog" aria-labelledby="sick-modal" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header" >
											<h4 class="modal-title" id="sick-modal"> ( اجازة مرضية ) نوع الاجازة </h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
									    <form action="{{ route('SickVacationSubmit') }}" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

										<div class="modal-body" dir="rtl">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">

                                                    <input type="hidden" name="vacation_type" value="مرضية">
                                                        <div class="form-group">
                                                            <label>من تاريخ </label>
                                                            <input name="from_day" class="form-control RdirectionClass" placeholder="اختر تاريخ بدء الاجازة " type="date" required>
                                                        </div>
                                                        <div class="form-group " >
                                                            <label>الى تاريخ </label>
                                                            <input name="to_day" class="form-control RdirectionClass" placeholder="اختر تاريخ انتهاء الاجازة " type="date" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>الغرض من الاجازة </label>
                                                            <input name="vacation_purpoes"  value="بسبب وعكة صحية" class="form-control "  type="text" disabled >
                                                        </div>
                                                </div>
                                               </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save changes</button>
										</div>
                                        </form>

									</div>
								</div>
							</div>
						</div>
					</div>


                    <!-- Large modal -->
					<div class="col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<h5 class="h4">اجازة زمنية </h5>
							<a href="#" class="btn-block" data-toggle="modal" data-target="#timerModal" type="button">
								<img src="../vendors/images/Deadline-pana.png" alt="modal">
							</a>
							<div class="modal fade bs-example-modal-lg" id="timerModal" tabindex="-1" role="dialog" aria-labelledby="timerModal" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="timerModal"> ( اجازة زمنية ) نوع الاجازة </h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>


                                        <form action="{{ route('TimerVacationSubmit') }}" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

										<div class="modal-body" >
                                            <div class="row" dir="rtl">

                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="vacation_type" value="زمنية">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label> تاريخ الاجازة </label>
                                                            <input name="day" class="form-control mb-5 RdirectionClass" placeholder="اختر تاريخ بدء الاجازة " type="date" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                                <label>  وقت بدء الاجازة  </label>
                                                                <input class="form-control time-picker-default"  name="from_day" required placeholder="ادخل تاريخ ووقت انتهاء الاجازة الصحيح" type="text">
                                                        </div>
                                                    </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                    <label>  وقت انتهاء الاجازة </label>
                                                                    <input class="form-control time-picker-default" name="to_day" required placeholder="ادخل تاريخ ووقت بدء الاجازة الصحيح" type="text">
                                                            </div>
                                                        </div>


                                                </div>

                                                        <div class="form-group" dir="rtl">
                                                            <label>الغرض من الاجازة </label>
                                                            <textarea name="vacation_purpoes" class="form-control" name="vacation_purpoes" required placeholder="الغرض من طلب الاجازة "></textarea>
                                                        </div>

                                                </div>
                                               </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save changes</button>
										</div>
                                        </form>








									</div>
								</div>
							</div>
						</div>
					</div>
                </div>



                <x-footer></x-footer>
