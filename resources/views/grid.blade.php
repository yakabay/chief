@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="row justify-content-between mb-4">
                <div class="col-6 col-sm-5 col-md-4 col-lg-3">
                    Sort by:
                    <select class="form-control">
                        <option value="sort=position&order=asc">position (a-z)</option>
                        <option value="sort=position&order=dsc">position (z-a)</option>
                        <option value="sort=name&order=asc">name (a-z)</option>
                        <option value="sort=name&order=dsc">name (z-a)</option>
                        <option value="sort=salary&order=dsc">salary (highest)</option>
                        <option value="sort=salary&order=asc">salary (lowest)</option>
                        <option value="sort=employment_date&order=asc">date (oldest)</option>
                        <option value="sort=employment_date&order=dsc">date (newest)</option>
                    </select>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Emploees grid view</div>

                <div class="card-body">
                    <div  class="card-columns">

                        {{-- @foreach ($users as $user)
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
                        @endforeach --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        var cardColumns = $('.card-columns');

        $(function() {
            $.ajax({
                type : "GET",
                url : "ajax/users?sort=position&order=asc",
                success: function (users) {
                    $.each(users, function(i, user){
                        cardColumns.append('<div class="card text-white bg-info mb-3" style="max-width: 18rem;"><div class="card-header">' + user.position + '</div> <div class="card-body"><h5 class="card-title">' + user.name + '</h5><p class="card-text">salary: $' + user.salary + '<br>from ' + user.employment_date + '</p></div></div>');
                    });
                }
            });

            $('select').change(function () {
                var query_params = $('option:selected', this).attr('value');
                $.ajax({
                    type : "GET",
                    url : "ajax/users?" + query_params,
                    success: function (users) {
                        cardColumns.empty();
                        $.each(users, function(i, user){
                            cardColumns.append('<div class="card text-white bg-info mb-3" style="max-width: 18rem;"><div class="card-header">' + user.position + '</div> <div class="card-body"><h5 class="card-title">' + user.name + '</h5><p class="card-text">salary: $' + user.salary + '<br>from ' + user.employment_date + '</p></div></div>');
                        });
                    }
                });
            })

        });
    </script>
@endsection