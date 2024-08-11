<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="../vendors/images/system.png" alt="" class="dark-logo">
            <img src="../vendors/images/system.png" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>

    <div class="menu-block customscroll">

          {{-- جهة الموظف --}}
          @if (Auth::user()->role_id==1 )
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('user.dashboard') }}"
                        class=" {{ Route::is('user.dashboard') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                        <span class="micon dw dw-home"></span>

                        <span class="mtext">الصفحة الرئيسية
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.personalData') }}"
                        class=" {{ Route::is('user.personalData') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                        <span class="micon dw dw-user-2"></span>

                        <span class="mtext">بيانات الموظف
                        </span>
                    </a>
                </li>






                <li>
                    <a href="{{ route('user.VacationRequest') }}"
                        class=" {{ Route::is('user.VacationRequest') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                        <span class="micon dw dw-calendar1"></span>
                        <span class="mtext">  طلب اجازة
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.VacationRecord') }}"
                        class=" {{ Route::is('user.VacationRecord') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                        <span class="micon dw dw-folder-123"></span>
                        <span class="mtext"> سجل الاجازات
                        </span>
                    </a>
                </li>
{{--
                <li>
                    <a href="{{ route('user.ShoukurData') }}"
                        class=" {{ Route::is('user.ShoukurData') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                        <span class="micon dw dw-calendar1"></span>

                        <span class="mtext"> رصيد الاجازات
                        </span>
                    </a>
                </li> --}}


                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle "  style="font-size: 20px">
                        <span class="micon dw dw-group"></span>
                        <span class="mtext">   اللجان
                        </span>
                    </a>
                    <ul class="submenu">
                        <li ><a href="{{ route('user.committeeData') }}" class="{{ Route::is('user.committeeData') ? 'active' : '' }}" style="font-size: 18px">  اضافة لجنة </a></li>
                        <li><a href="{{ route('user.committeeAll') }}" class="{{ Route::is('user.committeeAll') ? 'active' : '' }}" style="font-size: 18px">  عرض اللجان </a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle "  style="font-size: 20px">
                        <span class="micon dw  dw-certificate"></span>

                        <span class="mtext">   كتب الشكر
                        </span>
                    </a>
                    <ul class="submenu">
                        <li ><a href="{{ route('user.ShoukurData') }}" class="{{ Route::is('user.ShoukurData') ? 'active' : '' }}" style="font-size: 18px">  اضافة كتاب </a></li>
                        <li><a href="{{ route('user.shoukurAll') }}" class="{{ Route::is('user.shoukurAll') ? 'active' : '' }}" style="font-size: 18px">  عرض الكتب </a></li>
                    </ul>
                </li>


            </ul>
        </div>
        @endif







{{-- جهة الادمن  --}}
                @if (Auth::user()->role_id==2 )
                <div class="sidebar-menu">
                    <ul id="accordion-menu">

                        <li>
                            <a href="{{ route('admin.dashboard') }}" target="_blank"
                                class=" {{ Route::is('admin.dashboard') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                                <span class="micon dw dw-home"></span>

                                <span class="mtext">الصفحة الرئيسية
                                </span>
                            </a>
                        </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-paint-brush"></span><span class="mtext">الموظفين </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="font-awesome.html">جميع الموظفين </a></li>
                        <li><a href="{{route('user.VacationRequest')}}">طلبات الاجازات  </a></li>
                    </ul>
                </li>
            </ul>
        </div>
                @endif


                {{-- صفحات القسم  --}}
                @if (Auth::user()->role_id==3 )
                <div class="sidebar-menu">
                    <ul id="accordion-menu">
                        <li>
                            <a href="{{ route('department.dashboard') }}" target="_blank"
                                class=" {{ Route::is('department.dashboard') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                                <span class="micon dw dw-home"></span>

                                <span class="mtext">الصفحة الرئيسية
                                </span>
                            </a>
                        </li>


                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" style="font-size: 20px" dir="rtl">
                                <span class="micon dw dw-calendar1" ></span><span class="mtext">اجازات القسم  </span>
                            </a>
                            <ul class="submenu">
                                {{-- <li><a href="{{ route('department.VacationRecord') }}"
                                        class="{{ Route::is('department.VacationRecord') ? 'active' : '' }}"> سجل الاجازات </a>
                                </li> --}}

                                <li><a href="{{ route('department.VacationRequest') }}"
                                        class="{{ Route::is('department.VacationRequest') ? 'active' : '' }}">
                                        طلبات الاجازات  </a></li>

                                        {{-- <li><a href="{{ route('department.VacationRequest') }}"
                                            class="{{ Route::is('department.VacationRequest') ? 'active' : '' }}">
                                            سجل الاجازات  </a></li>

                                            <li><a href="{{ route('department.VacationRequest') }}"
                                                class="{{ Route::is('department.VacationRequest') ? 'active' : '' }}">
                                                تقرير الاجازات   </a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </div>
                @endif

   {{-- صفحات ذاتية القسم  --}}
   @if (Auth::user()->role_id==4 )
   <div class="sidebar-menu">
       <ul id="accordion-menu">
           <li>
               <a href="{{ route('AdminDepartment.dashboard') }}" target="_blank"
                   class=" {{ Route::is('AdminDepartment.dashboard') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                   <span class="micon dw dw-home"></span>

                   <span class="mtext">الصفحة الرئيسية
                   </span>
               </a>
           </li>


           <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle" style="font-size: 20px" dir="rtl">
                <span class="micon dw dw-user-12" ></span><span class="mtext"> الموظفين   </span>
            </a>
            <ul class="submenu">

                <li><a href="{{ route('AdminDepartment.dashboard') }}"
                        class="{{ Route::is('AdminDepartment.dashboard') ? 'active' : '' }}">
                       اضافة حساب  </a></li>

                        <li><a href="{{ route('AdminDepartment.dashboard') }}"
                            class="{{ Route::is('AdminDepartment.dashboard') ? 'active' : '' }}">
                            بيانات الموظف </a></li>


            </ul>
        </li>

           <li class="dropdown">
               <a href="javascript:;" class="dropdown-toggle" style="font-size: 20px" dir="rtl">
                   <span class="micon dw dw-calendar1" ></span><span class="mtext">  الموقف اليومي </span>
               </a>
               <ul class="submenu">

                   <li><a href="{{ route('AdminDepartment.CurrentStatus') }}"
                    class="{{ Route::is('AdminDepartment.CurrentStatus') ? 'active' : '' }}">
                    الموقف الحالي </a></li>


                   <li><a href="{{ route('AdminDepartment.PastStatus') }}"
                           class="{{ Route::is('AdminDepartment.PastStatus') ? 'active' : '' }}">
                         الموقف السابق  </a></li>
               </ul>
           </li>

           <li>

            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle" style="font-size: 20px" dir="rtl">

                    <span class="micon dw dw-invoice-1"></span>
                    <span class="mtext"> التقارير
                </a>
                <ul class="submenu">

                    <li><a href="{{ route('AdminDepartment.TimerReport') }}"
                     class="{{ Route::is('AdminDepartment.TimerReport') ? 'active' : '' }}">
                     تقارير الاجازات الزمنية</a></li>


                    {{-- <li><a href="{{ route('AdminDepartment.PastStatus') }}"
                            class="{{ Route::is('AdminDepartment.PastStatus') ? 'active' : '' }}">
                         تقارير اخرى </a></li> --}}
                </ul>
            </li>

            <li>

        </li>




       </ul>
   </div>
   @endif

    </div>
</div>
