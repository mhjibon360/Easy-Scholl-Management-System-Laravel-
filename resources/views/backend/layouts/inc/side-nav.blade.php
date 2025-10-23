 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title" data-key="t-menu">Menu</li>

                 <li>
                     <a href="{{ route('dashboard') }}">
                         <i data-feather="home"></i>
                         <span data-key="t-dashboard">Dashboard</span>
                     </a>
                 </li>

                 @if (Auth::user()->role == 'admin')
                     <li>
                         <a href="javascript: void(0);" class="has-arrow">
                             <i data-feather="users"></i>
                             <span data-key="t-authentication"> Manage Account</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li>
                                 <a href="{{ route('manage.user') }}" data-key="t-login">Admin Account List</a>
                             </li>
                             <li>
                                 <a href="{{ route('manage.teacher') }}" data-key="t-login">Teacher Account List</a>
                             </li>
                             <li>
                                 <a href="{{ route('student.account.list') }}" data-key="t-login">Student Account List</a>
                             </li>

                         </ul>
                     </li>

                     <li>
                         <a href="javascript: void(0);" class="has-arrow">
                             <i data-feather="users"></i>
                             <span data-key="t-authentication"> Academic Setup</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li>
                                 <a href="{{ route('setup.student.class.view') }}" data-key="t-login">Student Class</a>
                             </li>
                             <li>
                                 <a href="{{ route('setup.student.year.view') }}" data-key="t-register">View Year</a>
                             </li>
                             <li>
                                 <a href="{{ route('setup.student.group.view') }}" data-key="t-register">Student
                                     Group</a>
                             </li>
                             <li>
                                 <a href="{{ route('setup.student.shift.view') }}" data-key="t-register">All Shift </a>
                             </li>
                             <li>
                                 <a href="{{ route('setup.student.feecategory.view') }}" data-key="t-register">Fee
                                     Category
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('setup.student.feeamount.view') }}" data-key="t-register">Fee
                                     Category
                                     Amount
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('setup.student.examtype.view') }}" data-key="t-register">Student
                                     ExamType
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('setup.student.subject.view') }}" data-key="t-register">Subjects
                                     List</a>
                             </li>
                             <li>
                                 <a href="{{ route('setup.student.assignsubject.view') }}" data-key="t-register">Assign
                                     Subject</a>
                             </li>
                             <li>
                                 <a href="{{ route('setup.student.designation.view') }}"
                                     data-key="t-register">Designation
                                     List</a>
                             </li>
                         </ul>
                     </li>

                     <li>
                         <a href="javascript: void(0);" class="has-arrow">
                             <i data-feather="users"></i>
                             <span data-key="t-authentication"> Manage Student</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li>
                                 <a href="{{ route('student.account.list') }}" data-key="t-login">Student List</a>
                             </li>
                             <li>
                                 <a href="{{ route('student.roll.generate') }}" data-key="t-login">Roll Generate</a>
                             </li>
                             <li>
                                 <a href="{{ route('student.registrationfe.generate') }}"
                                     data-key="t-login">Registration
                                     Fee</a>
                             </li>

                         </ul>
                     </li>

                     <li>
                         <a href="javascript: void(0);" class="has-arrow">
                             <i data-feather="users"></i>
                             <span data-key="t-authentication"> Manage Mark</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li>
                                 <a href="{{ route('student.manage.mark') }}" data-key="t-login">Mark Entry</a>
                             </li>
                             <li>
                                 <a href="{{ route('student.edit.mark') }}" data-key="t-login">Edit Mark</a>
                             </li>
                             <li>
                                 <a href="{{ route('student.student.grade.view') }}" data-key="t-login">Manage
                                     Grade</a>
                             </li>
                         </ul>
                     </li>
                     <li>
                         <a href="javascript: void(0);" class="has-arrow">
                             <i data-feather="users"></i>
                             <span data-key="t-authentication"> Manage Report</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li>
                                 <a href="{{ route('student.student.marksheet.create') }}" data-key="t-login">Generate
                                     Marksheet</a>
                             </li>
                             <li>
                                 <a href="{{ route('student.student.idcard.create') }}" data-key="t-login">Generate
                                     Id-Card</a>
                             </li>
                         </ul>
                     </li>
                     <li>
                         <a href="javascript: void(0);" class="has-arrow">
                             <i data-feather="users"></i>
                             <span data-key="t-authentication"> Manage Settings</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li>
                                 <a href="{{ route('settings') }}" data-key="t-login">General Settings</a>
                             </li>

                         </ul>
                     </li>
                 @endif

             </ul>

             <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                 <div class="card-body">
                     <img src="{{ asset('backend') }}/assets/images/giftbox.png" alt="">
                     <div class="mt-4">
                         <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                         <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                         <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
