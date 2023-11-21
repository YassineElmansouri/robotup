@extends('layouts.app')

@section('content')

<div class="sidebar">
  <a class="side_menu_links"  href="/afficher_users">
    <img class="mb-1 " src="{{asset('icons/side_menu_icons/dashboard.png')}}" alt="" srcset="">
    Dashboard
  </a>
  <a class="side_menu_links" href="/afficher_users">
    <img class="mb-1 " src="{{asset('icons/side_menu_icons/users.png')}}" alt="" srcset="">
    Users
  </a>
  <a class="side_menu_links" href="{{route('afficher_roles')}}">
    <img class="mb-1 " src="{{asset('icons/side_menu_icons/role.png')}}" alt="" srcset="">
    Roles
  </a>
  <a class="side_menu_links" href="{{route('afficher_profession')}}">
    <img class="mb-1 " src="{{asset('icons/side_menu_icons/profession.png')}}" alt="" srcset="">
    Profession
  </a>
  
</div>
<main class="inside py-5">
    @yield('contents')
</main>
@endsection