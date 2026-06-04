<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>@yield('title')</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>

    <body>
         <div class="container-fluid">
            <!-- Ini bagian header-->
            <div class="row">
                <div class="col-md-12 py-2 border bg-primary">
                    <h5 class="text-white m-0">Sistem Informasi Akademik</h5>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{-- Namba icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                            {{-- Akan menampilkan nama user yang sedang login, jika kosong tampilkan 'Akun' --}}
                            {{ Auth::user()->name ?? 'Akun' }} 
                        </button>
                        {{-- Tambahkan dropdown-menu-end agar menu pop-up rata ke kanan tepi layar --}}
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil Saya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger fw-bold">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <!--Ini bagian body-->
            <div class="row">
                <div class="col-3 col-md-2 vh-100 border ">
                    {{-- ini untuk menu--}}
                    @include('main.menu')
                </div>

                <div class="col-9 col-md-10 vh-100 border">
                    @yield('content')
                </div>  
            </div>   
        </div>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>

<?php
//                      {{-- Dropdown polosan --}}
//                     <div class="dropdown d-flex-justify-content-end" >
//                     <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
//                             {{-- Namba icon --}}
//                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
//                             <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
//                             </svg>
//                             {{-- Akan menampilkan nama user yang sedang login, jika kosong tampilkan 'Akun' --}}
//                             {{ Auth::user()->name ?? 'Akun' }} Contoh 
//                     </button>
//                     <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
//                         {{-- masuk ke route profile --}}
//                         <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
//                         {{-- Melakukan logout --}}
//                         <li>
//                             <form method="POST" action="{{ route('logout') }}" class="m-0">
//                                 @csrf
//                                 <button type="submit" class="dropdown-item text-danger fw-bold">
//                                     Logout
//                                 </button>
//                             </form>                           
//                         </li>
//                         {{-- Melakukan logout  2--}}                        
//                         <li>
//                             <form action="{{ route('logout') }}" method="POST">
//                                 @csrf
//                                 <button type="submit" class="dropdown-item text-danger">
//                                     Logout
//                                 </button>
//                             </form>
//                         </li>
//                     </ul>
//                     </div>