

@foreach ($check  as  $updateData)



                <form action="{{ route("user.update_personalData",$updateData->id) }}" method="post" enctype="multipart/form-data">


                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="row">

                        {{-- بيانات الموظف الشخصية  --}}
                        <div class="col-6">
                            <div class="form-group">
                                <label>الاسم الرباعي </label>
                                <input class="form-control" type="text" placeholder="ادخل الاسم الكامل "
                                    name="full_name"  value="{{$updateData->full_name}}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>اسم الام الثلاثي </label>
                                <input class="form-control" type="text" placeholder=" ادخل اسم الام الكامل "
                                    name="full_m_name" value="{{$updateData->full_m_name}}">
                            </div>
                        </div>



                        <div class="col-6">
                            <label> الجنس </label>
                            <select class=" form-control" style="width: 100%;" name="gender" >
                                <option  value="{{$updateData->gender}}" selected>{{$updateData->gender}}</option>

                                <option value="ذكر">ذكر </option>
                                <option value="انثى">انثى</option>
                            </select>
                        </div>


                        <div class="col-6">
                            {{-- <select class="custom-select2 form-control" style="width: 100%;" name="marital_sta"> --}}
                            <label> الحالة الاجتماعية </label>

                            <select class="form-control" style="width: 100%;" name="marital_sta">
                                <option  value="{{$updateData->marital_sta}}" selected>{{$updateData->marital_sta}}</option>
                                <option value="اعزب">اعزب </option>
                                <option value="متزوج">متزوج</option>
                                <option value="ارمل">ارمل</option>
                                <option value="منفصل">منفصل</option>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label> المواليد </label>
                            <input class="form-control date-picker" placeholder="حدد التاريخ الصحيح" type="text"
                                name="birth" dir="rtl" value="{{$updateData->birth}}">
                        </div>


                        <div class="col-6 mt-3">
                            <div class="form-group">
                                <label>مكان العمل ( الدائرة )</label>
                                <input class="form-control" type="text" placeholder="ادخل الاسم الكامل "
                                    name="ministry" value="دائرة الدراسات والتخطيط والمتابعة " disabled>
                            </div>
                        </div>

                        <div class="col-6 mt-5">

                            <label>  الشعبة </label>
                            <select class="form-control" style="width: 100%;" name="class_id">
                                <option value="{{$updateData->class_id}}"> الشعبة المختارة </option>
                                @foreach ($classData as $data )

                                <option value="{{$data->id}}">{{$data->clas_name}} </option>
                                @endforeach
                            </select>

                    </div>
                        <div class="col-6 mt-5">

                                <label> المنصب </label>
                                <input class="form-control" placeholder="ادخل اسم ومكان المنصب " type="text"
                                name="position" value="{{$updateData->position}}">

                        </div>



                        <div class="col-6 mt-3">
                            <div class="form-group">
                                <label>تاريخ التعيين </label>
                                <input class="form-control date-picker" type="text" placeholder="ادخل تاريخ التعيين  "
                                    name="job_date" value="{{$updateData->job_date}}" >
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <div class="form-group">
                                <label>جهة التعيين السابقة </label>
                                <input class="form-control" type="text" placeholder="ادخل اسم جهة التعيين السابقة  "
                                    name="old_ministry" value="{{$updateData->old_ministry}}">
                            </div>
                        </div>









                    </div>


                    {{-- بيانات العمل  --}}
                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="form-group">
                                <label>الرقم الوظيفي </label>
                                <input class="form-control" type="text" placeholder="ادخل الرقم الوظيفي   "
                                    name="job_number" value="{{$updateData->job_number}}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>  العنوان الوظيفي</label>
                                <input class="form-control" type="text" placeholder=" ادخل العنوان الوظيفي   "
                                    name="job_title" value="{{$updateData->job_title}}">
                            </div>
                        </div>



                        <div class="col-6">
                            <div class="form-group">
                                <label>رقم الدرجة </label>
                                <input class="form-control" type="number" placeholder="ادخل رقم الدرجة   "
                                    name="job_step" value="{{$updateData->job_step}}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label> رقم المرحلة </label>
                                <input class="form-control" type="number" placeholder=" ادخل رقم المرحلة   "
                                    name="job_phase" value="{{$updateData->job_phase}}">
                            </div>
                        </div>








                        <div class="col-12 mt-5">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>الجامعة</th>
                                <th> ( التخصص) الكلية</th>
                                <th>(التخصص الدقيق) القسم </th>
                                <th>البلد المانح</th>
                                <th>سنة التخرج</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="addmore[0][uni]" placeholder="ادخل اسم الجامعة " class="form-control" /></td>
                                <td><input type="text" name="addmore[0][college]" placeholder="ادخل اسم الكلية ( التخصص)" class="form-control" /></td>
                                <td><input type="text" name="addmore[0][dep]" placeholder=" ادخل اسم القسم ( التخصص الدقيق )" class="form-control" /></td>
                                <td><input type="text" name="addmore[0][craductedCountry]" placeholder=" ادخل اسم الدولة  " class="form-control" /></td>
                                <td><input type="text" name="addmore[0][craductedDate]" placeholder=" ادخل سنة التخرج" class="form-control" /></td>

                                <td><button type="button" name="add" id="add" class="btn btn-success">اضافة  </button></td>
                            </tr>

                            {{-- {{$education}} --}}
                            @foreach($education as $key => $value)
                            <tr>

                                <td><input type="text" value="{{ $value['uni'] }}" name="addMore[{{ $value['id'] }}][uni]" placeholder="Enter your Name" class="form-control" /><input type="hidden" value="{{ $value['id'] }}" name="addMore[{{ $value['id'] }}][id]" placeholder="Enter your Name" class="form-control" /></td>
                                <td><input type="text" value="{{ $value['college'] }}" name="addMore[{{ $value['id'] }}][college]" placeholder="Enter your Qty" class="form-control" /></td>
                                <td><input type="text" value="{{ $value['dep'] }}" name="addMore[{{ $value['id'] }}][dep]" placeholder="Enter your Price" class="form-control" /></td>
                                <td><input type="text" value="{{ $value['craductedCountry'] }}" name="addMore[{{ $value['id'] }}][craductedCountry]" placeholder="Enter your Price" class="form-control" /></td>
                                <td><input type="text" value="{{ $value['craductedDate'] }}" name="addMore[{{ $value['id'] }}][craductedDate]" placeholder="Enter your Price" class="form-control" /></td>

                                <td><button type="button" class="btn btn-danger remove-tr">حذف</button></td>
                            </tr>
                        @endforeach

                        </table>


                    </div>    </div>

                        <div class="modal-footer" dir="ltr">
                            <button type="reset" class="btn btn-secondary">مسح البيانات</button>
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                        </div>
                </form>

                @endforeach
