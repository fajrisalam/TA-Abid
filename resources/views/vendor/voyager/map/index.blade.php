@extends('voyager::master')

@section('content')
    <div class="page-content">
        <div id="gambar"></div>
        {{$ar1}}<br>
        {{$ar2}}<br>
        {{$ar3}}
        </div>
@stop

@section('javascript')
<script src="{{ asset('/js/p5/p5.js') }}"></script>
<script>
    var img_bg;
    var img;
    function preload(){
        img_bg = loadImage('{{asset('/img/peta_new.jpeg')}}');
        img = loadImage('{{asset('/img/iconhehe.png')}}');
    }
    function setup() {
        var canvas = createCanvas(936, 631); 

        canvas.parent('#gambar');
        textAlign(CENTER, CENTER);
    }

    function draw() {
        background(img_bg);
        
        @if($ar1 > 0)
        image(img, {{$p[0]->x}}, {{$p[0]->y}}, 20, 20);
        textSize(15);
        text({{$ar1}}, {{$p[0]->x +10}}, {{$p[0]->y +10}});
        fill(255, 255, 255);
        textStyle(BOLD);
        @endif

        @if($ar2 > 0)
        image(img, {{$p[1]->x}}, {{$p[1]->y}}, 20, 20);
        textSize(15);
        text({{$ar2}}, {{$p[1]->x +10}}, {{$p[1]->y +10}});
        fill(255, 255, 255);
        textStyle(BOLD);
        @endif

        @if($ar3 > 0)
        image(img, {{$p[2]->x}}, {{$p[2]->y}}, 20, 20);
        textSize(15);
        text({{$ar3}}, {{$p[2]->x +10}}, {{$p[2]->y +10}});
        fill(255, 255, 255);
        textStyle(BOLD);
        @endif
        

    }
</script>
@stop