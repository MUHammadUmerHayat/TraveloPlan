@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"
    crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<style>
    body {
        background: #d9d9d9;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        /* overflow-x: hidden; */
    }

    #dashboard-heading {
        font-size: 30px;
        font-weight: 500;
    }

    #admin-dashboard {
        /* margin: 20px; */
        /* background: #E6E6E6; */
        box-shadow: 0px 0px 15px -3px;
    }

</style>

<div class="container-fluid">
    <div id="dashboard-heading">
        Dashboard
    </div>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="admin-dashboard">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Traffic</h4>
                        <div class="small text-muted">November 2017</div>
                        <canvas id="myChart" width="400" height="120"></canvas>
                        
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row mt-4">
            <div class="col-md-12">
                    <div class="main-card mb-3 card">
                            <div class="card-header text-center">
                                Users
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive-sm table-hover table-outline mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">User</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Contact No.</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($d as $item)
                                            <tr style="line-height: 50px">
                                                <td class="text-center text-muted">    
                                                    {{$item->id}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->name}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->email}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->contact}}
                                                </td>
                                                <td class="text-center">
                                                    <div class="badge badge-success">Not Blocked</div>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger">Block</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <div class="d-block card-footer mx-auto w-100" >
                                {{$d->links("pagination::bootstrap-4")}}
                            </div>
                        </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    
    </div>

</div><!-- /.container-fluid -->

<script>
    function a() {
        document.getElementById('wrapper').classList.toggle("toggled")
    }
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endsection