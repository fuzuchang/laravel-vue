@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">API说明</div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <tr>
                                <th>请求方法</th>
                                <th>请求URI</th>
                                <th>参数</th>
                                <th>
                                    返回值 (请求成功)
                                </th>
                            </tr>

                            @foreach($routes as $route)
                                <tr>
                                    <td>{{$route['method']}}</td>
                                    <td>{{$route['uri']}}</td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>参数</th>
                                                <th>是否必须</th>
                                                <th>说明</th>
                                            </tr>
                                            @foreach($route['params'] as $param)

                                                <tr>
                                                    <td>{{$param['k']}}</td>
                                                    <td>{{$param['v']}}</td>
                                                    <td>{{$param['c']}}</td>
                                                </tr>

                                            @endforeach
                                        </table>

                                    </td>
                                    <td>
                                        <pre>
                                            {{$route['result']}}
                                        </pre>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

