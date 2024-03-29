@extends('layouts.backend.master')

@section('title','Yönetim Peneli')

@push('css')

@endpush

@section('content')
    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3">
            <div class="panel panel-info">
                <div class="panel-heading">Bekleyen Siparişler</div>
                <div class="panel-body">
                    <h4>{{$statistics['waiting_orders_count']   }}</h4>
                    <small><p>Adet sipariş bekiyor.</p></small>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-success">
                <div class="panel-heading">Kullanıcılar</div>
                <div class="panel-body">
                    <h4>{{$statistics['users_count']   }}</h4>
                    <small><p>Adet kullanıcı bulunmakta</p></small>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-3">
            <div class="panel panel-warning">
                <div class="panel-heading">Kategoriler</div>
                <div class="panel-body">
                    <h4>{{$statistics['categories_count']   }}</h4>
                    <small><p>Adet kategori bulunmakta</p></small>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Tamamlanan Siparişler</div>
                <div class="panel-body">
                    <h4>{{$statistics['finished_orders_count']}}</h4>
                    <p>Adet Sipariş Tamamlandı</p>
                </div>
            </div>
        </div>
        <div class="col-md-8" >
            <div class="panel panel-primary" >
                <div class="panel-heading">Çok Satan ürünler</div>
                <div class="panel-body">
                    <canvas id="bestSellerChart" width="400" height="400"></canvas>
                </div>
            </div>

        </div>
    </section>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modals
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

    <h1 class="sub-header">
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary">Print</button>
            <button type="button" class="btn btn-primary">Export</button>
        </div>
        Table
    </h1>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td style="width: 100px">
                    <a href="#" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <h1 class="sub-header">Form</h1>
    <form>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Check me out
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    @php
        $labels = "";
        $data   = "";
    @endphp

    @foreach ($best_seller as $bestSeller)
         @php
            $labels .= "\"$bestSeller\",";
            $data   .= "$bestSeller->quantity,";
         @endphp
    @endforeach

<script>

    var ctx = document.getElementById('bestSellerChart');
    var bestSellerChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: [{!! $labels !!}],
            datasets: [{
                label: 'Çok Satan  Ürünler',
                data: [{!! $data !!}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endpush

