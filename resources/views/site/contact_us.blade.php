@extends('site.layouts.master')
@section('title')
    Liên hệ
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection
@section('css')
@endsection

@section('content')
    <div id="content" class="site-content">
        <div class="page-header dtable text-center header-transparent page-header-contact">
            <div class="dcell">
                <div class="container">
                    <h1 class="page-title">Contact</h1>
                    <ul id="breadcrumbs" class="breadcrumbs none-style">
                        <li><a href="{{ route('front.home-page') }}">Home</a></li>
                        <li class="active">Contacts</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-page" ng-controller="ContactUsController">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                    <div class="contact-left">
                        <h2>Get in Touch</h2>
                        <p class="font14">Your email address will not be published. Required fields are marked *</p>
                        <form id="ajax-form" name="ajax-form" class="wpcf7">
                            <div class="main-form">
                                <p>
                                    <label for="name"> <span class="error" id="err-name">please enter
                                            name</span></label>
                                    <input type="text" id="name" name="name" value="" size="40"
                                        class="" aria-invalid="false" placeholder="Your Name *" ng-model="your_name" required>
                                </p>
                                <p>
                                    <label for="email">
                                        <span class="error" id="err-email">please enter e-mail</span>
                                        <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                                    </label>
                                    <input type="email" name="email" id="email" value="" size="40"
                                        class="" aria-invalid="false" placeholder="Your Email *" ng-model="your_email" required>
                                </p>
                                <p>
                                    <label for="message"></label>
                                    <textarea name="message" id="message" cols="40" rows="10" class="" aria-invalid="false"
                                        placeholder="Message..." ng-model="your_message" required></textarea>
                                </p>
                                <p><button type="submit" id="send" class="octf-btn">Send Message</button></p>
                                <div class="clear"></div>
                                <div class="error" id="err-form">There was a problem validating the form please check!
                                </div>
                                <div class="error" id="err-timedout">The connection to the server timed out!</div>
                                <div class="error" id="err-state"></div>
                            </div>
                        </form>
                        <div class="clear"></div>
                        <div id="ajaxsuccess">Successfully sent!!</div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-right">
                        <div class="ot-heading">
                            <span>[ our contact details ]</span>
                            <h2 class="main-heading">Let's Start a Project</h2>
                        </div>
                        <p>{!! $config->short_name_company ?? '' !!}</p>
                        <div class="contact-info">
                            <i class="ot-flaticon-place"></i>
                            <div class="info-text">
                                <h6>OUR ADDRESS:</h6>
                                <p>{{ $config->address_company ?? '' }}</p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <i class="ot-flaticon-mail"></i>
                            <div class="info-text">
                                <h6>OUR MAILBOX:</h6>
                                <p><a href="mailto:{{ $config->email ?? '' }}">{{ $config->email ?? '' }}</a></p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <i class="ot-flaticon-phone-call"></i>
                            <div class="info-text">
                                <h6>OUR PHONE:</h6>
                                <p><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline ?? '' }}</a></p>
                            </div>
                        </div>
                        <div class="list-social">
                            <ul>
                                <li><a href="{{ $config->twitter ?? '' }}" target="_self"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $config->facebook ?? '' }}" target="_self"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $config->linkedin ?? '' }}" target="_self"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li><a href="{{ $config->instagram ?? '' }}" target="_self"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="contact-map">
        <div class="map">
            {!! $config->location ?? '' !!}
        </div>
    </div>
@endsection

@push('script')
    <script>
        app.controller('ContactUsController', function($scope, $http) {
            $scope.loading = false;
            $scope.errors = {};
            $scope.submitContact = function() {
                $scope.loading = true;
                let data = {
                    your_name: $scope.your_name,
                    your_email: $scope.your_email,
                    your_phone: $scope.your_phone,
                    your_message: $scope.your_message
                };
                jQuery.ajax({
                    url: '{{ route('front.post-contact') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Thao tác thành công !')
                        } else {
                            $scope.errors = response.errors;
                            toastr.error('Thao tác thất bại !')
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                        $scope.loading = false;
                    }
                });
            };
        });
    </script>
@endpush
