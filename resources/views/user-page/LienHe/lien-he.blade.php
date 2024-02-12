@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/contact/contact.css') }}">
    <main>
        <div class="contact-container">
            <img src="{{ asset('img-contact/bg.jpg') }}" alt="Untitleddesign511131" class="contact-untitleddesign51" />
            <div class="contact-frame24">
                <span class="contact-text26"><span>LIÊN HỆ NGAY VỚI SUYAN</span></span>
            </div>
            <div class="contact-lienhe">
                <div class="contact-left">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2343556177266!2d106.71586447495783!3d10.79335448935645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752926c8354f21%3A0x2eb92902690110fd!2sTi%E1%BA%BFng%20Trung%20SuYan!5e0!3m2!1sen!2s!4v1686304599951!5m2!1sen!2s"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="contact-right">
                    <div class="contact-frame70">
                        <span class="contact-text28"><span>Gửi yêu cầu cho chúng tôi</span></span>
                        <form action="{{ route('contact.create') }}" method="post">
                            @csrf
                            @if (isset($acc))
                                <div class="contact-frame27">
                                    <input type="text" class="form-control contact-text30" name="name"
                                        value="{{ $acc['fullname'] }}" placeholder="Tên">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="contact-frame28">
                                    <input type="email" class="form-control contact-text32" name="email"
                                        value="{{ $acc['email'] }}" placeholder="Email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if (isset($acc['phone']))
                                    <div class="contact-frame29">
                                        <input type="tel" class="form-control contact-text34"
                                            name="phone" value="{{ $acc['phone'] }}" placeholder="Số điện thoại">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @else
                                    <div class="contact-frame29">
                                        <input type="tel" class="form-control contact-text34"
                                            name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @else
                                <div class="contact-frame27">
                                    <input type="text" class="form-control contact-text30" name="name"
                                        value="{{ old('name') }}" placeholder="Tên">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="contact-frame28">
                                    <input type="email" class="form-control contact-text32" name="email"
                                        value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="contact-frame29">
                                    <input type="tel" class="form-control contact-text34" name="phone"
                                        value="{{ old('phone') }}" placeholder="Số điện thoại">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="contact-frame30">
                                <textarea type="text" class="form-control contact-text36" name="question"
                                    placeholder="Câu hỏi của bạn"></textarea>
                                @error('question')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact-frame71">
                                <button type="submit" class="contact-text38">Gửi ngay</button>
                            </div>
                        </form>
                    </div>

                    <div class="contact-frame72">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="36" viewBox="0 0 33 36"
                                fill="none">
                                <path
                                    d="M30.8187 22.5005C32.0779 20.288 32.7345 17.8192 32.7306 15.3126C32.7306 6.85553 25.4037 0 16.3653 0C7.32685 0 2.40066e-05 6.85553 2.40066e-05 15.3126C-0.00660068 18.9248 1.35805 22.4218 3.85068 25.1802L3.86993 25.2027C3.87667 25.2081 3.88244 25.2153 3.88726 25.2207H3.85068L13.562 34.8676C13.922 35.2252 14.3564 35.5101 14.8384 35.7048C15.3203 35.8996 15.8398 36 16.3648 36C16.8898 36 17.4093 35.8996 17.8913 35.7048C18.3733 35.5101 18.8076 35.2252 19.1676 34.8676L28.8799 25.2207H28.8433L28.8587 25.2036L28.8607 25.2018C28.93 25.1243 28.9993 25.0469 29.0676 24.9676C29.7354 24.1997 30.3221 23.3732 30.8197 22.4996L30.8187 22.5005ZM16.3691 21.1674C14.8373 21.1674 13.3681 20.598 12.2849 19.5845C11.2017 18.5709 10.5932 17.1963 10.5932 15.7629C10.5932 14.3296 11.2017 12.955 12.2849 11.9414C13.3681 10.9279 14.8373 10.3585 16.3691 10.3585C17.901 10.3585 19.3702 10.9279 20.4534 11.9414C21.5366 12.955 22.1451 14.3296 22.1451 15.7629C22.1451 17.1963 21.5366 18.5709 20.4534 19.5845C19.3702 20.598 17.901 21.1674 16.3691 21.1674Z"
                                    fill="#C9E6C0" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="36" viewBox="0 0 38 36"
                                fill="none">
                                <path
                                    d="M23.9182 5.00984C26.3069 6.31612 28.294 8.19063 29.6827 10.4478C31.0714 12.705 31.8137 15.2665 31.836 17.8788C31.8582 20.4912 31.1598 23.0638 29.8097 25.3419C28.4597 27.62 26.5048 29.5247 24.1387 30.8673C21.7726 32.21 19.0773 32.9441 16.3196 32.9969C13.5618 33.0498 10.8374 32.4196 8.41585 31.1687C5.99432 29.9178 3.95971 28.0896 2.51343 25.8651C1.06716 23.6406 0.259366 21.0969 0.170028 18.4858L0.162109 17.9998L0.170028 17.5138C0.258722 14.9233 1.05462 12.3988 2.48013 10.1863C3.90564 7.97388 5.91211 6.14902 8.30394 4.88966C10.6958 3.63031 13.3913 2.97943 16.1278 3.0005C18.8643 3.02156 21.5483 3.71384 23.9182 5.00984ZM15.9995 8.99984C15.6116 8.99989 15.2372 9.13477 14.9473 9.37891C14.6574 9.62305 14.4722 9.95946 14.4268 10.3243L14.4158 10.4998V17.9998L14.43 18.1963C14.4661 18.4566 14.5737 18.7033 14.742 18.9118L14.8798 19.0618L19.631 23.5618L19.7799 23.6848C20.0576 23.8889 20.3992 23.9997 20.7507 23.9997C21.1022 23.9997 21.4438 23.8889 21.7215 23.6848L21.8704 23.5603L22.0019 23.4193C22.2173 23.1563 22.3343 22.8328 22.3343 22.4998C22.3343 22.1669 22.2173 21.8434 22.0019 21.5803L21.8704 21.4393L17.5832 17.3773V10.4998L17.5721 10.3243C17.5268 9.95946 17.3416 9.62305 17.0517 9.37891C16.7618 9.13477 16.3874 8.99989 15.9995 8.99984Z"
                                    fill="#C9E6C0" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="36" viewBox="0 0 35 36"
                                fill="none">
                                <path
                                    d="M24.1441 19.3215L23.4806 19.9822C23.4806 19.9822 21.9012 21.5513 17.5918 17.2668C13.2824 12.9822 14.8618 11.413 14.8618 11.413L15.2789 10.9959C16.3099 9.97217 16.4077 8.32717 15.5079 7.1255L13.6704 4.67113C12.5562 3.18363 10.4052 2.98675 9.12911 4.2555L6.83953 6.5305C6.20807 7.1605 5.78515 7.97425 5.8362 8.87842C5.96745 11.1928 7.01453 16.1701 12.8537 21.9772C19.0472 28.1343 24.8587 28.3793 27.2343 28.1576C27.9868 28.0876 28.6402 27.7055 29.1666 27.1805L31.2374 25.1213C32.6374 23.7315 32.2437 21.3472 30.4529 20.3745L27.6674 18.8593C26.492 18.2205 25.0629 18.4086 24.1441 19.3215Z"
                                    fill="#C9E6C0" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                fill="none">
                                <path
                                    d="M25 5H5C3.625 5 2.5 6.125 2.5 7.5V22.5C2.5 23.875 3.625 25 5 25H25C26.375 25 27.5 23.875 27.5 22.5V7.5C27.5 6.125 26.375 5 25 5ZM24.5 10.3125L16.325 15.425C15.5125 15.9375 14.4875 15.9375 13.675 15.425L5.5 10.3125C5.37466 10.2421 5.2649 10.1471 5.17736 10.0331C5.08982 9.91906 5.02633 9.78847 4.99072 9.64921C4.95511 9.50995 4.94813 9.36492 4.9702 9.22288C4.99226 9.08085 5.04292 8.94477 5.1191 8.82288C5.19528 8.70099 5.29541 8.59582 5.41341 8.51374C5.53141 8.43167 5.66484 8.37439 5.80562 8.34537C5.9464 8.31636 6.0916 8.31621 6.23244 8.34494C6.37328 8.37366 6.50683 8.43067 6.625 8.5125L15 13.75L23.375 8.5125C23.4932 8.43067 23.6267 8.37366 23.7676 8.34494C23.9084 8.31621 24.0536 8.31636 24.1944 8.34537C24.3352 8.37439 24.4686 8.43167 24.5866 8.51374C24.7046 8.59582 24.8047 8.70099 24.8809 8.82288C24.9571 8.94477 25.0077 9.08085 25.0298 9.22288C25.0519 9.36492 25.0449 9.50995 25.0093 9.64921C24.9737 9.78847 24.9102 9.91906 24.8226 10.0331C24.7351 10.1471 24.6253 10.2421 24.5 10.3125Z"
                                    fill="#C9E6C0" />
                            </svg>
                        </div>

                        <div class="contact-detail">
                            <span class="contact-text18">
                                <span>491/44 Lê Văn Sỹ, P.12, Q.3, TP.HCM</span>
                            </span>
                            <span class="contact-text20">
                                <span>Thứ 2 - Thứ 7 từ 10:00 - 21:00</span>
                            </span>
                            <span class="contact-text22"><span>0123456789</span></span>
                            <span class="contact-text24"><span>tiengtrungsuyan@gmail.com</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
