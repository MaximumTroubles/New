<div class="slider_container">
    @foreach ($sliders as $slider)
        <div class="slider">
            <div class="slider_img">
                <img src="{{ $slider->img }}" alt="{{ $slider->name }}">
            </div>
            <div class="slider_name">
                <h2>{{ $slider->name }}</h2>
            </div>
            <div class="slider_decrp">
                {{ $slider->description }}
            </div>
            <div class="slider_button">
                <a href="{{ $slider->button_url }}">{{ $slider->button_text }}</a>
            </div>
        </div>
    @endforeach
</div>
@section('js')
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$('.slider_container').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});
</script>
@endsection

