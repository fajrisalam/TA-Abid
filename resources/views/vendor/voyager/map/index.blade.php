@extends('voyager::master')

@section('content')
    <div class="page-content">
        <div id="gambar"></div>
        @foreach($data as $d)
            {{$d->nama_karyawan}} {{$d->arduino->nama_ruang}} {{$d->arduino->x}} {{$d->arduino->y}}<br>
        @endforeach
        </div>
@stop

@section('javascript')
<script src="{{ asset('/js/p5/p5.js') }}"></script>
<script>
    var img_bg;
    var img;
    function preload(){
        img_bg = loadImage('{{asset('/img/peta_new.jpeg')}}');
        img = loadImage('{{asset('/img/icon4.png')}}');
    }
    function setup() {
        var canvas = createCanvas(936, 631); 

        canvas.parent('#gambar');
        textAlign(CENTER, CENTER);
    }

    function draw() {
        background(img_bg);
        @foreach($data as $d)
        image(img, {{$d->arduino->x}}, {{$d->arduino->y}}, 20, 20);
        @endforeach
        textSize(20);
        text('work', 510, 500);

        $ar1->
    }
</script>
@stop