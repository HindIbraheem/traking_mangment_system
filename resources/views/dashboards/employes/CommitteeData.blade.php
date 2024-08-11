

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
								<h4>   اللجان  </h4>
							</div>

							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"> الصفحة الرئيسية   </a></li>
									<li class="breadcrumb-item active" aria-current="page">  اضافة لجنة   </li>
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

                            @if($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show mt-15" role="alert">
                                <strong>{{ $error }}!!...</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endforeach
                        @endif

							</nav>
						</div>
					</div>
				</div>


                <div class="pd-20 card-box mb-30" dir="rtl" style="text-align: right">
                    <div class="clearfix">
                        <div class="pull-right">
                            <h4 class="text-blue h4"> بيانات كتاب الشكر  </h4>
                            <p class="mb-30">ادخل جميع البيانات المطلوبة </p>
                        </div>

                    </div>

                    <form action="{{ route("user.submit_committee") }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">



                              <div class="row ">


                                  <div class="col-6 mb-2">
                                      <label> العدد </label>
                                      <input class="form-control " type="text" placeholder=" رقم الكتاب "
                                          name="book_number" required autocomplete="off" >
                              </div>

                              <div class="col-6 mb-2 ">

                                      <label>  التاريخ </label>
                                      <input class="form-control" type="date" placeholder="   تاريخه   "
                                          name="book_date" required>

                              </div>
                                  <div class="col-6 mb-2">

                                    <label>   نوع الأمر  </label>
                                    <select class="form-control" style="width: 100%;" name="book_type">
                                        <option value="أمر اداري"> أمر اداري </option>
                                        <option value="أمر وزاري">أمر وزاري </option>

                                    </select>

                            </div>
                                <div class="col-6 mb-2">
                                        <label>نسخة من الكتاب <span style="color:red"> (jpeg,png,jpg - max size:2048) </span> </label>
                                        <input class="form-control" type="file" placeholder="ادخل الرقم الوظيفي   "
                                            name="book_image" required>

                                </div>


                                </div>
                 <div class=" mt-5">
                            <div class="modal-footer" dir="ltr">
                                <button type="reset" class="btn btn-secondary">مسح البيانات</button>
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
                <x-footer></x-footer>

