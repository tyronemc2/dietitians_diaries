@extends('layout3')


@section('content')
<div class="container pt-5" style="padding-top: 5rem !important;">
    <h1>
      {{ $post->title }}
    </h1>
    <div class="product-section-image">
        <img src="{{ productImage($post->image) }}" alt="{{ $post->slug }}" class="active" id="currentImage">
    </div>
    <div class="page-content__wrap">
      {!! $post->body !!}
    </div>
</div>
@endsection