@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="row justify-content-between mb-3">

                <div class="col-6 col-sm-5 col-md-4 col-lg-3">
                    <label for="sortSelect">Sort by:</label>
                    <select class="form-control" id="sortSelect">
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

                <div class="col mt-4">
                    <input class="form-control" type="text" name="search" placeholder="Search..">
                </div>

            </div>

            <div class="card">
                <div class="card-header" style="font-size: 1rem">Emploees grid view</div>
                
                <div class="card-body">
                    <div  class="card-columns"></div>
                </div>
            </div>

            <nav aria-label="Page navigation example" class="mt-1">
                <ul class="pagination justify-content-end">
                    <li class="page-item" id="prev">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    
                    <li class="page-item" id="next">
                          <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        var prev_page_url;
        var next_page_url;
        var cardsContainer = $('.card-columns');
        var showCards = function (response) {
            
            cardsContainer.empty();
            
            $.each(response.data, function(i, user){
                cardsContainer.append('<div class="card text-white bg-info mb-3" style="max-width: 18rem;"><div class="card-header p-2 pl-3">' + user.position + '</div> <div class="card-body p-2 pl-3"><h5 class="card-subtitle my-1">' + user.name + '</h5><p class="card-text">salary: $' + user.salary + '<br>from ' + user.employment_date + '</p></div></div>');
            });

            if (response.prev_page_url === null) {
                $('#prev').removeClass('page-item').addClass('page-item disabled');    
            } else {
                $('#prev').removeClass('page-item disabled').addClass('page-item');
            }

            if (response.next_page_url === null) {
                $('#next').removeClass('page-item').addClass('page-item disabled');    
            } else {
                $('#next').removeClass('page-item disabled').addClass('page-item');
            }

            prev_page_url = response.prev_page_url;
            next_page_url = response.next_page_url;

        }    

        $(function() {

            // Show cards with default sorting
            $.ajax({
                type : "GET",
                url : "ajax/users?sort=position&order=asc",
                success: showCards
            });

            // Show cards after changing sorting
            $('select').change(function () {
                var sort_params = $('option:selected').attr('value');
                $.ajax({
                    type : "GET",
                    url : "ajax/users?" + sort_params,
                    success: showCards
                });
            })

            // Pagination next
            $('#next a').click(function() {
                var sort_params = $('option:selected').attr('value');
                $.ajax({
                    type : "GET",
                    url : next_page_url + "&" + sort_params,
                    success: showCards
                });
            })

            // Pagination previous
            $('#prev a').click(function() {
                var sort_params = $('option:selected').attr('value');
                $.ajax({
                    type : "GET",
                    url : prev_page_url + "&" + sort_params,
                    success: showCards
                });
            })            
            
        });
    </script>
@endsection