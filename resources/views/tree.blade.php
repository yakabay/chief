@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="font-size: 1rem">Employees Tree</div>

                    <div class="card-body">
                        <div id="tree"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.5/jstree.min.js"></script>
    <script>
        $(function() {
          $('#tree').jstree({
            'core' : {
              'data' : {
                "url" : "ajax/tree-default",
                "dataType" : "json" 
              }
            }
          });
        });
    </script>
@endsection