<div class="vertical-menu">
   @switch($role_id)
        @case(1)
            <a href="#" class="{{ (request()->is('dashbaord*')) ? 'active' : '' }}"> Dashbaord </a>
            @break
        @case(2)
            <a href="#" class="{{ (request()->is('dashbaord*')) ? 'active' : '' }}"> Dashbaord </a>
            @break
        @case(3)
            <a href="#" class="{{ ( Route::currentRouteName() == 'dashboard' ) ? 'active' : '' }}"> Dashbaord </a>
            @break
        @case(4)
            <a href="#" class="{{ (request()->is('dashbaord*')) ? 'active' : '' }}"> Dashbaord </a>
            @break
       @default
            <a href="{{ route('dashboard') }}" class="{{ ( Route::currentRouteName() == 'dashboard' ) ? 'active' : '' }}"> Dashbaord </a>
            <a href="#"> Rasise a Complain </a>
            <a href="#"> Help </a>
            <a href="#"> Customer Care</a>
           @break

   @endswitch

  </div>
