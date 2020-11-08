<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            padding: 5px;
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 10px;
            font-size: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<!-- left-Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
    <a href={{url('')}} class="w3-button w3-large w3-yellow">Reset</a>
    <h3 class="w3-bar-item">Ducks</h3>
    @foreach($names['duck_names'] as $name)
        <a href={{url('?duckType='.$name)}} class="w3-bar-item w3-button">{{$name}}</a>
    @endforeach
    <h3 class="w3-bar-item">Layouts</h3>
    <a href="#" class="w3-bar-item w3-button">
        <div class="grid-container">
            <div class="grid-item">1</div>
            <div class="grid-item">2</div>
            <div class="grid-item">3</div>
        </div>
    </a>
    <a href="#" class="w3-bar-item w3-button">
        <div class="grid-item">1</div>
        <div class="grid-item">2</div>
        <div class="grid-item">3</div>
    </a>

</div>
@if(!empty($type['duckType']))

    <div class="w3-container" style="margin-left:25%;position:absolute">
        @if(!empty($response["quack"]))
            <h3>Quack Action : </h3>
            <h4>{{$response["quack"]}}</h4>
        @endif

        @if(!empty($response["fly"]))
            <h3>Fly Action : </h3>
            <h4>{{$response["fly"]}}</h4>
        @endif

        <img style="height: 400px;width: 400px;" src={{ 'data:image/png;base64,'.$response["display"]}} />
    </div>
@endif

<!-- Right-Sidebar -->
<div class="w3-sidebar w3-bar-block w3-card" style="width:25%;right:0;">
    {{--    <div class="w3-container">--}}
    {{--        <button class="w3-button w3-large w3-yellow">Fly</button>--}}
    {{--        <button class="w3-button w3-large w3-blue">Quack</button>--}}
    {{--    </div>--}}
    <h3 class="w3-bar-item">Set Fly Behavior</h3>
    @foreach($names['flybehavior_names'] as $name)
        <a href={{url("?duckType=".$type['duckType']."&flyBehavior=".$name)}} class="w3-bar-item
           w3-button">{{$name}}</a>
    @endforeach

    <h3 class="w3-bar-item">Set Quack Behavior</h3>
    @foreach($names['quackbehavior_names'] as $name)
        <a href={{url("?duckType=".$type['duckType']."&quackBehavior=".$name)}} class="w3-bar-item
           w3-button">{{$name}}</a>
    @endforeach

</div>
</body>
</html>