<div class="card overflow-hidden nav">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Explore</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Terms</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Support</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Settings</span></a>
            </li>
        </ul>
    </div>
    @auth

        <div class="card-footer text-center py-2">
            <a class="btn btn-link btn-sm" href="{{ route('profile') }}">View Profile </a>
        </div>
    @endauth
</div>
