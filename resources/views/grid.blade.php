@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">Emploees grid view</div>

                <div class="card-body">
                    <div  class="card-columns">

                        @foreach ($users as $user)
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                @if ($user->img)
                                    <img class="card-img-top" src="..." alt="no photo">
                                @endif
                                <div class="card-header">{{ $user->name }}</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $user->position }}</h5>
                                    <p class="card-text">
                                        salary: ${{ $user->salary }}<br>
                                        from {{ $user->employment_date }}
                                    </p>
                                </div>
                            </div>   
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
