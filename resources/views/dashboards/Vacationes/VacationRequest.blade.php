


<x-header></x-header>
<x-employeNavigation></x-employeNavigation>
<div class="mobile-menu-overlay"></div>


<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Modals</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">UI Modals</li>
								</ol>
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
								<img src="vendors/images/modal-img1.jpg" alt="modal">
							</a>
							<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel"> ( اجازة اعتيادية ) نوع الاجازة </h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
                                        <form action="{{ route('user.requestVacationSubmit') }}" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

										<div class="modal-body" dir="rtl">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">

                                                    <input type="hidden" name="vacation_type" value="اعتيادية">
                                                        <div class="form-group">
                                                            <label>من تاريخ </label>
                                                            <input name="from_day" class="form-control date-picker" placeholder="اختر تاريخ بدء الاجازة " type="text" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>الى تاريخ </label>
                                                            <input name="to_day" class="form-control date-picker" placeholder="اختر تاريخ انتهاء الاجازة " type="text" required>
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
							<a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg" type="button">
								<img src="vendors/images/modal-img1.jpg" alt="modal">
							</a>
							<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header" >
											<h4 class="modal-title" id="myLargeModalLabel"> ( اجازة مرضية ) نوع الاجازة </h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


                    <!-- Large modal -->
					<div class="col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<h5 class="h4">اجازة زمنية </h5>
							<a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg" type="button">
								<img src="vendors/images/modal-img1.jpg" alt="modal">
							</a>
							<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel"> ( اجازة زمنية ) نوع الاجازة </h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>

            @extends('layouts.footer')
