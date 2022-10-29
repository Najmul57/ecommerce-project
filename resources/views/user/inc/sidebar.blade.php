<div class="card">
    <img src="{{ asset(Auth::user()->image) }}" width="100px" height="100px" class="rounded-circle border border-primary"
        alt="najmul"
        style="position: relative;
        left: 50%;
        transform: translate(-50%);
        border-radius: 100%;
        margin-bottom: 20px;
        border:1px solid red">

    <ul class="list-group">
        <li style="margin-bottom: 5px"><a href="{{ route('user.dashboard') }}"
                class="btn btn-primary btn-sm btn-block">Home</a>
        </li>
        <li style="margin-bottom: 5px"><a href="{{ route('user.image') }}"
                class="btn btn-primary btn-sm btn-block">Update
                Image</a></li>
        <li style="margin-bottom: 5px"><a href="{{ route('user.password') }}"
                class="btn btn-primary btn-sm btn-block">Update
                Password</a></li>
        <li>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block"
                onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                <i class="icon ion-power"></i>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
