@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">


            @include('shared.success-message')

            @include('shared.submit-idea')



            <hr>


            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
            @empty
                No result found
            @endforelse




            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')




        </div>
    </div>
@endsection
