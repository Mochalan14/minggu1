<li class="nav-item">
    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Route::is('admin.post.index') ? 'active' : '' }}"
        href="{{ route('admin.post.index') }}">Post</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Route::is('minggu2') ? 'active' : '' }}" href="{{ route('minggu2') }}">Minggu 2</a>
</li>
