<footer id="site-footer" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-xl-0">
                <div class="widget-footer">
                    <h6>Information</h6>
                    <p>{{ $config->web_des }}</p>
                    <div class="footer-social list-social">
                        <ul>
                            <li><a href="{{ $config->facebook ?? '' }}" target="_self"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $config->twitter ?? '' }}" target="_self"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $config->linkedin ?? '' }}" target="_self"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{ $config->instagram ?? '' }}" target="_self"><i
                                        class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-xl-0">
                <div class="widget-footer">
                    <h6>Contacts</h6>
                    <ul class="footer-list">
                        <li class="footer-list-item">
                            <span class="list-item-icon"><i class="ot-flaticon-place"></i></span>
                            <span class="list-item-text">{{ $config->address_company ?? '' }}</span>
                        </li>
                        <li class="footer-list-item">
                            <span class="list-item-icon"><i class="ot-flaticon-mail"></i></span>
                            <span class="list-item-text">{{ $config->email ?? '' }}</span>
                        </li>
                        <li class="footer-list-item">
                            <span class="list-item-icon"><i class="ot-flaticon-phone-call"></i></span>
                            <span class="list-item-text">{{ $config->hotline ?? '' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-md-0">
                <div class="widget-footer widget-contact">
                    <h6>Latest Projects</h6>
                    <ul>
                        <li><a href="#">Stylish Family Appartment</a></li>
                        <li><a href="#">Modern Villa in Belgium</a></li>
                        <li><a href="#">Private House in Spain</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="widget-footer footer-widget-subcribe">
                    <h6>Subscribe</h6>
                    <form class="mc4wp-form">
                        <div class="mc4wp-form-fields">
                            <div class="subscribe-inner-form">
                                <input type="email" name="EMAIL" placeholder="YOUR EMAIL"
                                    required="">
                                <button type="submit" class="subscribe-btn-icon"><i
                                        class="ot-flaticon-send"></i></button>
                            </div>
                        </div>
                    </form>
                    <p>Follow our newsletter to stay updated about agency.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- #site-footer -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                <p>Copyright © 2025 Vinatt Group. All
                    Rights Reserved.</p>
            </div>
            <div class="col-lg-5 col-md-12 align-self-center">
                <ul class="icon-list-items inline-items justify-content-lg-end">
                    @foreach ($policies as $policy)
                        <li class="icon-list-item inline-item">
                            <a href="{{ route('front.policy-detail', $policy->slug) }}"><span class="icon-list-text">{{ $policy->title ?? '' }}</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>