@extends('layouts.app')

@section('title', 'DAEDALUS - Завод под ключ')

@push('styles')
<link rel="stylesheet" href="{{ asset('global.css') }}" />
<link rel="stylesheet" href="{{ asset('index.css') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Involve:wght@400;600;700&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@400&display=swap" />
@endpush

@section('content')
<div class="main">
  <section class="programs-title">
    <div class="div">
      <img class="background-icon" alt="" src="{{ asset('public/background@2x.png') }}" />

      <div class="hero-content">
        <h1 class="main-title">Завод под ключ</h1>
        <p class="main-subtitle">Проектируем по вашим будущим сооружениям и производимых изделиям к каждой детали!</p>
        <button class="cta-button" onclick="scrollDown()">Оставить заявку</button>
      </div>
    </div>
  </section>

  <!-- Секция контактов с формой -->
  <div class="div30" id="targetSection">
    <img class="background-icon1" alt="" src="{{ asset('public/background-1@2x.png') }}" />

    <div class="div31">
      <div class="child"></div>
      <h1 class="h14">Свяжитесь с нами</h1>
      <div class="inner1">
        <form class="form-parent">
          <div class="form">
            <div class="container">
              <input class="input" id="input" placeholder="Имя" type="text" />
              <div class="component-child"></div>
            </div>
            <div class="parent1">
              <input class="input1" id="input1" placeholder="Телефон" type="text" />
              <div class="instance-child"></div>
            </div>
            <div class="parent2">
              <input class="input2" id="input2" placeholder="Услуга" type="text" />
              <div class="instance-item"></div>
            </div>
          </div>
          <button class="button1" onclick="event.preventDefault(); submitFeedback();">
            <div class="item"></div>
            <div class="div32">Оставить заявку</div>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('index.js') }}"></script>
<script>
function scrollDown() {
    document.getElementById("targetSection").scrollIntoView({
        behavior: "smooth"
    });
}
</script>
@endpush
