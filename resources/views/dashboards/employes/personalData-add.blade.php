
<form action="{{ route("user.submit_personalData") }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="row">

        {{-- بيانات الموظف الشخصية  --}}
        <div class="col-6">
            <div class="form-group">
                <label>الاسم الرباعي </label>
                <input class="form-control" type="text" placeholder="ادخل الاسم الكامل "
                    name="full_name" required>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label>اسم الام الثلاثي </label>
                <input class="form-control" type="text" placeholder=" ادخل اسم الام الكامل "
                    name="full_m_name" required>
            </div>
        </div>



        <div class="col-6">
            <label> الجنس </label>
            <select class=" form-control" style="width: 100%;" name="gender">
                <option value="ذكر">ذكر </option>
                <option value="انثى">انثى</option>
            </select>
        </div>


        <div class="col-6">
            {{-- <select class="custom-select2 form-control" style="width: 100%;" name="marital_sta"> --}}
            <label> الحالة الاجتماعية </label>

            <select class="form-control" style="width: 100%;" name="marital_sta">
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
                name="birth" dir="rtl" required>
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
                @foreach ($classData as $data )
                <option value="{{$data->id}}">{{$data->clas_name}} </option>
                @endforeach
            </select>

    </div>
        <div class="col-6 mt-5">

                <label> المنصب </label>
                <input class="form-control" placeholder="ادخل اسم ومكان المنصب " type="text"
                name="position" >

        </div>



        <div class="col-6 mt-3">
            <div class="form-group">
                <label>تاريخ التعيين </label>
                <input class="form-control date-picker" type="text" placeholder="ادخل تاريخ التعيين  "
                    name="job_date" >
            </div>
        </div>

        <div class="col-6 mt-3">
            <div class="form-group">
                <label>جهة التعيين السابقة </label>
                <input class="form-control" type="text" placeholder="ادخل اسم جهة التعيين السابقة  "
                    name="old_ministry" >
            </div>
        </div>









    </div>


    {{-- بيانات العمل  --}}
    <div class="row mt-5">
        <div class="col-6">
            <div class="form-group">
                <label>الرقم الوظيفي </label>
                <input class="form-control" type="text" placeholder="ادخل الرقم الوظيفي   "
                    name="job_number" required>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label>  العنوان الوظيفي</label>
                <input class="form-control" type="text" placeholder=" ادخل العنوان الوظيفي   "
                    name="job_title">
            </div>
        </div>



        <div class="col-6">
            <div class="form-group">
                <label>رقم الدرجة </label>
                <input class="form-control" type="number" placeholder="ادخل رقم الدرجة   "
                    name="job_step" required>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label> رقم المرحلة </label>
                <input class="form-control" type="number" placeholder=" ادخل رقم المرحلة   "
                    name="job_phase" required>
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
                <td><input type="text" name="addmore[0][uni]" placeholder="ادخل اسم الجامعة " class="form-control" required/></td>
                <td><input type="text" name="addmore[0][college]" placeholder="ادخل اسم الكلية ( التخصص)" class="form-control" required/></td>
                <td><input type="text" name="addmore[0][dep]" placeholder=" ادخل اسم القسم ( التخصص الدقيق )" class="form-control" required/></td>
                <td><input type="text" name="addmore[0][craductedCountry]" placeholder=" ادخل اسم الدولة  " class="form-control" required/></td>
                <td><input type="text" name="addmore[0][craductedDate]" placeholder=" ادخل سنة التخرج" class="form-control" required/></td>

                <td><button type="button" name="add" id="add" class="btn btn-success">اضافة  </button></td>
            </tr>
        </table>


    </div>    </div>

        <div class="modal-footer" dir="ltr">
            <button type="reset" class="btn btn-secondary">مسح البيانات</button>
            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
        </div>
</form>

