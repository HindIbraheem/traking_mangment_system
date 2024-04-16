<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">الصفحة الرئيسية </span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">البيانات </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html"> كل البيانات  </a></li>
                        <li><a href="form-basic.html">البيانات الشخصية </a></li>
                        <li><a href="advanced-components.html">بيانات العمل </a></li>
                        <li><a href="form-wizard.html"> بيانات الدراسة </a></li>
                        <li><a href="html5-editor.html"> المستمسكات  </a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-calendar1"></span><span class="mtext"> الاجازات </span>
                    </a>



                    <ul class="submenu">
                        <li><a href="{{route('user.VacationRequest')}}" class="nav-link {{ (request()->is('user/Vacation-Request*')) ? 'active' : '' }}">سجل الاجازات </a></li>
                        <li><a href="ui-cards.html">طلب اجازة </a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
