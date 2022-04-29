@extends('layouts.frontend')

@section('content')
@php($siteInfo = settings())

    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>Contact Us</h2>
                    <ul>
                        <li><a href="{{asset('/')}}">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    <!--map section start-->
    <section class="map_section">
        <div class="container">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.9882018509766!2d90.39272701449416!3d24.76159365531228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37564ee02729f257%3A0xad9dd3a9b2768ef8!2sAnanda%20Mohan%20College!5e0!3m2!1sen!2sbd!4v1643083388312!5m2!1sen!2sbd"></iframe>
        </div>
    </section>
    <!--maps section end-->

    <!-- contact section strat -->
    <section class="contact_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact_info">
                        <div class="address">
                            <h2>Where to Find Us</h2>
                            <p>{{(!empty($siteInfo->address) ? $siteInfo->address : '')}}</p>
                            <a href="https://goo.gl/maps/vZeU6rHpJiMTX2fRA" target="_blank">On Google Map</a>
                        </div>
                        <article>
                            <h3>Hear our voice</h3>
                            <p>Say hello <a href="tel:">{{(!empty($siteInfo->mobile) ? $siteInfo->mobile : '')}}</a></p>
                        </article>
                        <article>
                            <h3>Information</h3>
                            <p><a href="mailto:">{{(!empty($siteInfo->email) ? $siteInfo->email : '')}}</a></p>
                        </article>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="request_form">
                        <h2>Reach out to us</h2>
                        <form id="contactForm">
                            <div class="alert alert-success" id="contact" role="alert">
                                Your message sent successfully.
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 required">
                                    <label for="first_name">First name</label>
                                    <input type="text" id="contactFormFirstName" name="name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 required">
                                    <label for="last_name">Last name</label>
                                    <input type="text" id="contactFormLastName" name="last_name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 required">
                                    <label for="phone_number">Mobile</label>
                                    <input type="text" id="contactFormMobile" name="phone" class="form-control" pattern="[0-9]{11}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email address</label>
                                    <input type="email" id="contactFormEmail" name="email" class="form-control">
                                </div>

                                <div class="form-group col-md-12 required">
                                    <label for="description">Your Message</label>
                                    <textarea id="contactFormDescription" name="message" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section strat -->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/contact.css">
@endpush

@push('footer-script')
    <script>
        $('#contact').hide();
        $('#contactForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type:'POST',
                url:'{{route('home.contact.store')}}',
                data:{
                    _token     : '{{csrf_token()}}',
                    type       : 'contact',
                    first_name : $('#contactFormFirstName').val(),
                    last_name  : $('#contactFormLastName').val(),
                    email      : $('#contactFormEmail').val(),
                    mobile     : $('#contactFormMobile').val(),
                    description: $('#contactFormDescription').val(),
                },
                success:function(data) {
                    if(data == 'contact'){
                        $('#contact').show();
                    }else{
                        $('#contact').hide();
                    }
                }
            });

            $('#contactFormFirstName').val('');
            $('#contactFormLastName').val('');
            $('#contactFormEmail').val('');
            $('#contactFormMobile').val('');
            $('#contactFormDescription').val('');
        });
    </script>
@endpush
