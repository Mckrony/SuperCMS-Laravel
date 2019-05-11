@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard</h1>


    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        var p = '{{$posts}}';
        var pi = parseInt(p);

        var u = '{{$users}}';
        var ui = parseInt(u);

        var c = '{{$comments}}';
        var ci = parseInt(c);

        var c1 = '{{$comments_replies}}';
        var c1i = parseInt(c1);

        var c2 = '{{$category}}';
        var c2i = parseInt(c2);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],
                ['Posts', pi],
                ['Category', c2i],
                ['Users', ui],
                ['Comments', ci],
                ['Replies', c1i]

            ]);

            var options = {
                chart: {
                    title: 'Geekadelphia Statistics Live',
                    subtitle: 'A visual representation of related data associated with database',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <div id="columnchart_material" style="width: 1200px; height: 500px;"></div>

@stop