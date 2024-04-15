@section('title', 'Edit Profile')
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                        alt="{{ $user->name }}">
                    <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control fs-2">
                        @error('name')
                            <span class="fs-6 text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @auth
                    @if (Auth::id() === $user->id)
                        <div class="align-self-start">
                            <a href="{{ route('profile') }}">Cancel</a>
                        </div>
                    @endif
                @endauth


            </div>
            <div class="mt-4">
                <label for="image">Profile Picture</label>
                <input name="image" type="file" class="form-control">
                @error('image')
                    <span class="fs-6 text-danger ">{{ $message }}</span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <textarea name="bio" class="form-control fs-6 fw-light mb-3" id="bio" rows="3">{{ $user->bio }}</textarea>
                @error('bio')
                    <span class="fs-6 text-danger ">{{ $message }}</span>
                @enderror

                <br>
                <button class="btn btn-dark btn-sm mb-3">Save</button>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->ideas()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comment()->count() }} </a>
                </div>



            </div>
        </form>
    </div>
</div>
