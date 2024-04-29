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
                    <a href="{{ route('user.dashboard') }}" target="_blank"
                        class=" {{ Route::is('user.dashboard') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                        <span class="micon dw dw-home"></span>

                        <span class="mtext">الصفحة الرئيسية
                        </span>
                    </a>
                </li>


                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" style="font-size: 20px" dir="rtl">
                        <span class="micon dw dw-calendar1" ></span><span class="mtext">اجازاتي </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('user.VacationRecord') }}"
                                class="{{ Route::is('user.VacationRecord') ? 'active' : '' }}"> سجل الاجازات </a>
                        </li>

                        <li><a href="{{ route('user.VacationRequest') }}"
                                class="{{ Route::is('user.VacationRequest') ? 'active' : '' }}">
                                طلب اجازة </a></li>
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

   {{-- صفحات القسم  --}}
   @if (Auth::user()->role_id==4 )
   <div class="sidebar-menu">
       <ul id="accordion-menu">
           <li>
               <a href="{{ route('AdminDepartment.dashboard') }}" target="_blank"
                   class=" {{ Route::is('department.dashboard') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
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
            <a href="{{ route('AdminDepartment.dashboard') }}" target="_blank"
                class=" {{ Route::is('department.dashboard') ? 'active' : '' }} dropdown-toggle no-arrow" style="font-size: 20px">
                <span class="micon dw dw-invoice-1"></span>
                <span class="mtext"> التقارير
                </span>
            </a>
        </li>




       </ul>
   </div>
   @endif

    </div>
</div>
