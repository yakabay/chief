@extends('layouts.app')

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    

    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Employees Tree</div>

                <div class="card-body">
                    <div id="tree"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>

    var my_tree = [
      {
        text: "Parent 1",
        nodes: [
          {
            text: "Child 1",
            nodes: [
              {
                text: "Grandchild 1"
              },
              {
                text: "Grandchild 2"
              }
            ]
          },
          {
            text: "Child 2"
          }
        ]
      },
      {
        text: "Parent 2"
      },
      {
        text: "Parent 3"
      },
      {
        text: "Parent 4"
      },
      {
        text: "Parent 5"
      }
    ];
        // $(document).ready(function(){
        //     $.ajax({ 
        //         url: "/tree/default",
        //         method:"POST",
        //         dataType: "json",       
        //         success: function(data) {
        //             $('#treeview').treeview({data: data});
        //         }   
        //     });
        // });


    $('#tree').treeview({data: my_tree});
    </script>
@endsection