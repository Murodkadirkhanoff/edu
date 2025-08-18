
<ul class="nav nav-lb-tab border-bottom-0" id="tab" >
    <li class="nav-item" >
        <a class="nav-link {{\Illuminate\Support\Facades\Route::is('instructor.courses.edit') ? 'active' : ''}}" id="additional"  href="{{route('instructor.courses.edit', $course)}}"  aria-controls="additional" aria-selected="true">Умумий маълумотлар</a>
    </li>
    <li class="nav-item" >
        <a class="nav-link {{\Illuminate\Support\Facades\Route::is('instructor.courses.curriculum') ? 'active' : ''}}" id="curriculum" href="{{route('instructor.courses.curriculum', $course)}}"  aria-controls="curriculum" aria-selected="false" tabindex="-1">Ўқув дастури</a>
    </li>
</ul>
