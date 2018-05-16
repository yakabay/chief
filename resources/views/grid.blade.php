@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="row justify-content-between mb-3">

                <div class="col-sm-5 col-md-4 col-lg-3">
                    <label for="sort-select">Sort by:</label>
                    <select class="form-control" id="sort-select">
                        <option value="sort=name&order=asc">name (a-z)</option>
                        <option value="sort=name&order=dsc">name (z-a)</option>
                        <option value="sort=position&order=asc">position (a-z)</option>
                        <option value="sort=position&order=dsc">position (z-a)</option>
                        <option value="sort=salary&order=dsc">salary (highest)</option>
                        <option value="sort=salary&order=asc">salary (lowest)</option>
                        <option value="sort=employment_date&order=asc">date (oldest)</option>
                        <option value="sort=employment_date&order=dsc">date (newest)</option>
                    </select>
                </div>

                <div class="col" id="search-box-container">
                        <input class="form-control" id="search-input" type="text" name="search" placeholder="Search...">
                </div>

            </div>

            <div class="card">
                <div class="card-header">Emploees grid view</div>
                
                <div class="card-body">
                    <div  class="card-columns"></div>
                </div>
            </div>

            <nav aria-label="Page navigation example" class="mt-2">
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
    <script src="{{ asset('js/grid.js') }}" defer></script>
@endsection