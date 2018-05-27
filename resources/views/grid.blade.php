@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="row justify-content-between mb-3">
                <div class="col-sm-4 col-lg-3">
                    <sort-select/>{{-- Select Component --}}
                </div>

                <div class="col" id="search-box-container">
                        <input class="form-control" id="search-input" type="text" name="search" placeholder="Search...">
                </div>
            </div>

            <div class="card">
                <div class="card-header">Emploees grid view</div>
                <div class="card-body">
                    <cards/>{{-- Cards Component --}}
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
