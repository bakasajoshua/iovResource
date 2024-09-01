@extends('layouts.layout')

@section('content')

@if($sermon->type == 'audio')
<section class="podcast-hero-area section-padding-80 bg-overlay bg-img jarallax" style="background-image: url(img/bg-img/11.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="podcast-hero-text section-padding-80 d-flex align-items-center">
                    <div class="podcast-txt pr-5">
                        <h2>{{ $sermon->title }}</h2>
                        <div class="podcast-meta-data">
                            <a href="#" class="event-date"><i class="icon_calendar"></i> July 23, 2019</a>
                            <a href="#" class="event-time"><i class="icon_clock_alt"></i> 36 min</a>
                            <a href="#" class="event-time"><i class="icon_heart_alt"></i> 38</a>
                            <a href="#" class="event-address"><i class="icon_chat_alt"></i> 23</a>
                        </div>
                    </div>
                    <a href="#" class="pt-5 pt-md-0 pl-md-5"><img src="img/core-img/itunes.png" alt></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="podcast-audio-player-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="audio-player">
                    <audio preload="auto" controls>
                        <source src="{{ $sermon->sermon_content ?? '' }}">
                    </audio>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif ($sermon->type == 'video')
<section class="podcast-hero-area section-padding-80 bg-overlay bg-img jarallax">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-xl-9">
                <iframe onload="console.log(this.parentElement.style.width);this.width=screen.width;this.height=this.parentNode.height;"
                    src="https://www.youtube.com/embed/pS__ttyHIJw?si=xGtCK8Y1jQiWDg4t"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

@else

@endif
<section class="blog-details-area section-padding-80">
    <div class="container">
        <div class="post-details-text">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-2 col-xl-1">
                    <div class="razo-author-avatar">
                        <img src="img/bg-img/70.jpg" alt>
                        <h6>John Milley</h6>
                    </div>
                </div>
                
                <div class="col-12 col-sm-10 col-xl-9">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Cras semper mi eu sapien rhoncus, gravida suscipit nibh fermentum. Fusce iaculis, nunc ut euismod consectetur, erat mauris tempor felis, id feugiat nunc dolor et dui. Donec consequat luctus odio, et euismod felis suscipit scelerisque. Suspendisse luctus vulputate lectus, sed convallis eros fringilla at. Suspendisse a fringilla nibh. Donec ut mi nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam vestibulum, velit ut interdum viverra, tortor sapien porttitor ipsum, non eleifend nunc metus luctus dui.</p>
                    <p>In tincidunt sollicitudin nisl facilisis pharetra. Quisque lacinia nisl vitae nibh bibendum feugiat. Fusce tristique, eros sed egestas consequat, purus risus gravida arcu, non euismod lorem libero non turpis. Sed aliquet, purus ut sodales egestas, turpis arcu pellentesque nunc, nec elementum velit libero eu orci. Etiam non purus id orci condimentum interdum. Nunc in rhoncus turpis. Maecenas diam lorem, vulputate eget pharetra ac, ultrices vitae leo. Nam nulla neque, pretium id risus at, convallis interdum tortor.</p>
                    <p>Cras semper mi eu sapien rhoncus, gravida suscipit nibh fermentum. Fusce iaculis, nunc ut euismod consectetur, erat mauris tempor felis, id feugiat nunc dolor et dui. Donec consequat luctus odio, et euismod felis suscipit scelerisque. Suspendisse luctus vulputate lectus, sed convallis eros fringilla at. Curabitur at commodo ante, id vehicula libero. Proin dictum pharetra nibh, et tincidunt turpis.</p>
                    <div class="razo-next-prev-pager mb-80 d-flex align-items-center justify-content-between">
                        <div class="prev-pager">
                            <a href="#"><span>Previous</span>
                                <h6><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Episode 3- Does our economic model</h6>
                            </a>
                        </div>
                        <div class="next-pager text-right">
                            <a href="#"><span>Next</span>
                                <h6>Episode 1 - Departure cards deported <i class="fa fa-long-arrow-right" aria-hidden="true"></i></h6>
                            </a>
                        </div>
                    </div>
                    <div class="razo-contact-form">
                        <h2 class="mb-4">Leave A Comment</h2>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="message-name" class="form-control mb-30" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="message-email" class="form-control mb-30" placeholder="Email">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control mb-30" placeholder="Comment"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn razo-btn btn-3 mt-15">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






<script src="js/jquery.min.js"></script>

<script src="js/popper.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/razo.bundle.js"></script>

<script src="js/default-assets/active.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8b47762ebb2673e5","version":"2024.8.0","serverTiming":{"name":{"cfL4":true}},"token":"cd0b4b3a733644fc843ef0b185f98241","b":1}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/razo/single-podcast.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Aug 2024 06:04:58 GMT -->
</html>

@endsection