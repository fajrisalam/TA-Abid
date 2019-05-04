@extends('voyager::master')

@section('content')
    <div class="page-content">
        <div id="gambar"></div>
        @foreach($data as $d)
            {{$d->nama_karyawan}} {{$d->arduino->nama_ruang}} {{$d->arduino->x}} {{$d->arduino->y}}<br>
        @endforeach
        <a href="{{url('/admin')}}">Kembali</a>
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
        // image(img, 0, 0);
        // image(img, 0, 0, img.width / 2, img.height / 2);
        background(img_bg);
        @foreach($data as $d)
        image(img, {{$d->arduino->x}}, {{$d->arduino->y}}, 20, 20);
        @endforeach
    }
</script>
@stop

<!-- <script src="{{ asset('/js/p5/p5.js') }}"></script>
<script>
    var img_bg;
    var img;
    function preload(){
        img_bg = loadImage('{{asset('/img/petaits.jpg')}}');
        img = loadImage('{{asset('/img/icon4.png')}}');
    }
    function setup() {
        var canvas = createCanvas(555, 700);
        var bunder = ellipse(50, 50, 80, 80);

        canvas.parent('#gambar');
        textAlign(CENTER, CENTER);
    }

    function draw() {
        // image(img, 0, 0);
        // image(img, 0, 0, img.width / 2, img.height / 2);
        background(img_bg);
        @foreach($data as $d)
        image(img, {{$d->arduino->x}}, {{$d->arduino->y}}, 20, 20);
        @endforeach
    }
</script> -->
<!-- 
<body>
    <div id="gambar"></div>
    @foreach($data as $d)
        {{$d->nama_karyawan}} {{$d->arduino->nama_ruang}} {{$d->arduino->x}} {{$d->arduino->y}}<br>
    @endforeach
    <a href="{{url('/admin')}}">Kembali</a>
</body> -->