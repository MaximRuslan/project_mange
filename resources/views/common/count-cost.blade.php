@extends('layouts.master')

@section('content')
<style>
tr>td, tr>th{
    text-align: center;
}
.left-text{
    text-align: left;
}

</style>  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PROJECT COUNT VS COST</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="row">
                                <h3 class="card-title col-11">PROJECT COUNT VS COST</h3>
                                <a class="btn btn-danger col-1" id="export">Export</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-striped table-valign-middle"  rules="all">
                                    <thead>
                                        <tr>
                                            <th>MDA</th>
                                            <th>PROJECT COUNT</th>
                                            <th>COST</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $key=>$data)
                                        <tr>
                                            <td class="left-text">
                                                {{$data->mda_name}}
                                            </td>
                                            <td>{{$data->mda_count}}</td>
                                            <td>
                                                @if(!$data->mda_sum)
                                                0
                                                @else
                                                {{number_format($data->mda_sum, 2, '.', ',') }}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card rounded">
                        <div class="card-body py-3 px-3">
                            {!! $usersChart->container() !!}
                        </div>
                    </div>
                </div>
                {{-- ChartScript --}}
                @if($usersChart)
                {!! $usersChart->script() !!}
                @endif
            </div>

            
        </div>
        <!-- /.container-fluid -->
    </div>
    


    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    function export_excel() {
        document.location.href="{!! route('fetch_countexport','cost'); !!}";
    }

    $(document).ready(function(){

        $("#export").on('click',function(){
            export_excel();
        })
    });
</script>
@section('javascript')
<!-- jQuery -->
<script src="{{asset('/dist/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/dist/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('/dist/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('/dist/js/demo.js')}}"></script>
<script src="{{asset('/dist/js/pages/dashboard3.js')}}"></script>
@stop

@endsection