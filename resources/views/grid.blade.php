@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
    
            <div class="row">
                <div class="col-sm-4 col-lg-3 mb-3">
                    <sort-select/>{{-- Select Component --}}
                </div>

                <div class="col d-flex flex-column-reverse mb-3">
                    <div class="d-sm-flex flex-row-reverse">
                        <search/>{{-- Search Component --}}
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">Emploees grid view</div>
                <div class="card-body">
                    <cards/>{{-- Cards Component --}}
                </div>
            </div>


            <pagination/>{{-- Pagination Component --}}


        </div>
    </div>
</div>
@endsection
