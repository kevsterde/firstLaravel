@section('title', 'Idea ' . $idea->id)

<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px;aspect-ratio:1/1;object-fit:cover;" class="me-2 avatar-sm rounded-circle"
                    src="{{ $idea->user->getImageUrl() }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>

            <div>
                @auth

                    @can('delete', $idea)
                        {{-- @if (Auth::user()->id === $idea->user->id) --}}
                        <form method="POST" action=" {{ route('ideas.destroy', $idea->id) }}">
                            @csrf
                            @method('delete')
                            <a class="mx-4" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                            <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                        {{-- @endif --}}
                    @endcan
                    @cannot('delete', $idea)
                        {{-- @if (Auth::user()->id !== $idea->user->id) --}}
                        <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                    @endcannot
                @endauth


                @guest
                    <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                @endguest

            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="idea" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="fs-6 text-danger ">{{ $message }}</span>
                    @enderror

                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif


        <div class="d-flex justify-content-between">
            @include('idea.like')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>


        @include('shared.comment-box')



    </div>
</div>
