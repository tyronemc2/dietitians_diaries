@extends('layout3')


@section('content')
<div class="container pt-5" style="padding-top: 5rem !important;">
    <h1>
      {{ $page->title }}
    </h1>
    <div class="product-section-image">
        <img src="{{ productImage($page->image) }}" alt="{{ $page->slug }}" class="active" id="currentImage">
    </div>
    <div class="page-content__wrap">
      {!! $page->body !!}
    </div>
</div>
@endsection