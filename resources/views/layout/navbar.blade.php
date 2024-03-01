<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Student System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">หน้าแรก</a>
                </li>
                
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('student')}}">นักเรียนทั้งหมด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/create">เพิ่มข้อมูลนักเรียน</a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">ติดต่อเรา</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
