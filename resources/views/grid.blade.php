@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
    
            <div class="row justify-content-between mb-3">
                <div class="col-sm-4 col-lg-3">
                    <sort-select/>{{-- Select Component --}}
                </div>

                <div class="col">
                    <search/>{{-- Search Component --}}
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
