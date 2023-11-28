    @if ($paymongo->status == 1)
        <li class="nav-item">
            <a href="{{ route('pay-with-grabpay') }}" class="nav-link">
                <img src="{{ asset($paymongo->grabpay_image) }}" alt="Alasmart" class="img-fluis w-100">
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('pay-with-gcash') }}" class="nav-link">
                <img src="{{ asset($paymongo->gcash_image) }}" alt="Alasmart" class="img-fluis w-100">
            </a>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="modal" data-bs-target="#paymongoModal">
                <img src="{{ asset($paymongo->paymongo_image) }}" alt="Alasmart" class="img-fluis w-100">
            </button>
        </li>
    @endif


    @if ($iyzico->status == 1)
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="modal" data-bs-target="#iyzicoModal">
                <img src="{{ asset($iyzico->iyzico_image) }}" alt="stripe" class="img-fluis w-100">
            </button>
        </li>
    @endif

    @if ($mercado->status == 1)
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="modal" data-bs-target="#mercadoModal">
                <img src="{{ asset($mercado->mercado_image) }}" alt="stripe" class="img-fluis w-100">
            </button>
        </li>
    @endif


    @if ($iyzico->status == 1)
        {{-- iyico payment --}}
        <div class="modal fade" id="iyzicoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('user.Pay via Iyzico')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="payment_card" action="{{ route('pay-with-iyzico') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="numeric" class="control-label"> {{__('user.Card Holder')}}</label>
                                    <div class="payment_card_input">
                                        <input type="text" class="name input-lg form-control" name="holder_name" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    <label for="cc-number" class="control-label">{{__('user.Card Number')}}</label>
                                    <div class="payment_card_input">
                                        <input name="card_digit" id="cc-number" type="tel"
                                        class="input-lg form-control cc-number"
                                        autocomplete="cc-number"
                                        placeholder="&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;"
                                        required>
                                        <i class="far fa-credit-card"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label">{{__('user.Expiry')}}</label>
                                    <div class="payment_card_input">
                                        <input name="expiry" id="cc-exp" type="tel"
                                        class="input-lg form-control cc-exp"
                                        autocomplete="cc-exp"
                                        placeholder="MM / YYYY"
                                        required>
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <label for="cc-cvc" class="control-label">{{__('user.CVC')}}</label>
                                    <div class="payment_card_input">
                                        <input name="cvc" id="cc-cvc" type="tel"
                                        class="input-lg form-control cc-cvc custom_cvc_padding"
                                        autocomplete="off"
                                        placeholder="&bull;&bull;&bull;" required>
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 modal-footer border-0 ">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('user.Cancel')}}</button>
                                <button class="btn btn-primary btn-block" type="submit">{{__('user.Payment')}}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            </div>
        </div>
        {{-- iyico payment --}}
    @endif

    @if ($paymongo->status == 1)
        <!-- Paymmongo Modal -->
        <div class="modal fade" id="paymongoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('user.Pay via Paymongo')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <form  role="form" action="{{route('pay-with-paymongo')}}" method="post">
                @csrf
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label for="card_number">{{__('user.Card Number')}}*</label>
                                <input autocomplete='off' class='form-control' size='20'
                                type='text' name="card_number" autocomplete="off">
                                <input type="hidden" name="total_amount" value="{{ $cartTotal }}">
                                <input type="hidden" name="cart_qty" value="{{ $cartQty }}">
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="month">{{__('user.Month')}}*</label>
                                <input input
                                class='form-control' size='2'
                                type='text' name="month" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="year">{{__('user.Year')}}*</label>
                                <input class='form-control' size='4'
                                type='text' name="year" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12 my-4">
                            <div class="form-group">
                                <label for="cvc">{{__('user.CVC')}}*</label>
                                <input autocomplete='off'
                                class='form-control' size='4'
                                type='text' name="cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('user.Cancel')}}</button>
                    <button class="btn btn-primary btn-block" type="submit">{{__('user.Payment')}}</button>
                </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    @endif


    @if ($mercado->status == 1)

        <!-- Mercado pago Modal -->
        <div class="modal fade" id="mercadoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('user.Pay via Mercadopago')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="form-checkout" method="POST" action="{{ route('pay-with-mercadopago') }}">
                        @csrf
                        <div id="form-checkout__cardNumber" class="container"></div>
                        <div id="form-checkout__expirationDate" class="container"></div>
                        <div id="form-checkout__securityCode" class="container"></div>
                        <input type="text"  id="form-checkout__cardholderName" />
                        <select id="form-checkout__issuer"></select>
                        <select id="form-checkout__installments"></select>
                        <select id="form-checkout__identificationType"></select>
                        <input type="text" id="form-checkout__identificationNumber" />
                        <input type="email" id="form-checkout__cardholderEmail" />

                        <button type="submit" id="form-checkout__submit">{{__('user.Submit')}}</button>

                        <progress value="0" class="progress-bar d-none">{{__('user.Loading...')}}</progress>
                    </form>

                </div>
            </div>
            </div>
        </div>

    @endif

    @push('frontend_js')

        {{-- iyzico payment --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
        <script>
            $(function($) {
            $('[data-numeric]').payment('restrictNumeric');
            $('.cc-number').payment('formatCardNumber');
            $('.cc-exp').payment('formatCardExpiry');
            $('.cc-cvc').payment('formatCardCVC');
            $.fn.toggleInputError = function(erred) {
                this.parent('.form-group').toggleClass('has-error', erred);
                return this;
            };
            $('#payment_card').submit(function(e) {
                e.preventDefault();
                var cardType = $.payment.cardType($('.cc-number').val());
                $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
                $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
                $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
                $('.cc-brand').text(cardType);
                $('.validation').removeClass('text-danger text-success');
                $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
            });
            });

        </script>

        {{-- iyzico payment --}}


        {{-- mercado pago --}}

        @if ($mercado->status == 1)

            @php
                $mercado_payable_amount = $cartTotal * $mercado->currency->currency_rate;
                $mercado_payable_amount = round($mercado_payable_amount, 2);
            @endphp

            <script src="https://sdk.mercadopago.com/js/v2"></script>

            <script>
                'use strict';

                const mp = new MercadoPago("{{ $mercado->public_key }}");

                const cardForm = mp.cardForm({
                        amount: "{{ $mercado_payable_amount }}",
                        iframe: true,
                        form: {
                            id: "form-checkout",
                            cardNumber: {
                                id: "form-checkout__cardNumber",
                                placeholder: "{{__('user.Card Number')}}",
                            },
                            expirationDate: {
                                id: "form-checkout__expirationDate",
                                placeholder: "{{__('user.MM/YY')}}",
                            },
                            securityCode: {
                                id: "form-checkout__securityCode",
                                placeholder: "{{__('user.Security Code')}}",
                            },
                            cardholderName: {
                                id: "form-checkout__cardholderName",
                                placeholder: "{{__('user.Cardholder')}}",
                            },
                            issuer: {
                                id: "form-checkout__issuer",
                                placeholder: "{{__('user.Issuing bank')}}",
                            },
                            installments: {
                                id: "form-checkout__installments",
                                placeholder: "{{__('user.Installments')}}",
                            },
                            identificationType: {
                                id: "form-checkout__identificationType",
                                placeholder: "{{__('user.Document type')}}",
                            },
                            identificationNumber: {
                                id: "form-checkout__identificationNumber",
                                placeholder: "{{__('user.Document number')}}",
                            },
                            cardholderEmail: {
                                id: "form-checkout__cardholderEmail",
                                placeholder: "{{__('user.Email')}}",
                            },
                        },
                        callbacks: {
                            onFormMounted: error => {
                                if (error) return console.warn("Form Mounted handling error: ", error);

                            },
                            onSubmit: event => {
                                event.preventDefault();

                                if($('#form-checkout__identificationNumber').val() == ''){
                                    toastr.error("{{__('user.Identification number is required')}}");
                                    return;
                                }

                                if($('#form-checkout__cardholderEmail').val() == ''){
                                    toastr.error("{{__('user.Card holder email is required')}}");
                                    return;
                                }

                                $("#form-checkout__submit").html("{{__('user.Processing...')}}");
                                $("#form-checkout__submit").attr('disabled', 'disabled');

                                const {
                                    paymentMethodId: payment_method_id,
                                    issuerId: issuer_id,
                                    cardholderEmail: email,
                                    amount,
                                    token,
                                    installments,
                                    identificationNumber,
                                    identificationType,
                                } = cardForm.getCardFormData();

                                $.ajax({
                                    type: "post",
                                    data: {
                                        token,
                                        issuer_id,
                                        payment_method_id,
                                        transaction_amount: Number(amount),
                                        installments: Number(installments),
                                        description: "Product Description",
                                        _token : "{{ csrf_token() }}",
                                        payer: {
                                            email,
                                            identification: {
                                                type: identificationType,
                                                number: identificationNumber,
                                            },
                                        },
                                    },
                                    url: "{{ url('pay-with-mercadopago') }}",
                                    success: function(response) {
                                        window.location.href = "{{ route('payment-addon-success') }}";
                                    },
                                    error: function(response){
                                        toastr.error('Server Error');
                                        window.location.reload();
                                    }
                                });
                            },
                            onFetching: (resource) => {
                                const progressBar = document.querySelector(".progress-bar");
                                progressBar.removeAttribute("value");

                                return() => {
                                    progressBar.setAttribute("value", "0");
                                };
                            },
                            onCardTokenReceived: (errorData, token) => {
                                if (errorData && errorData.length !== 0) {
                                    errorData.forEach(errorMessage => {
                                        toastr.error(errorMessage.message);
                                    });
                                }
                            },

                        },
                    });

            </script>

        @endif
        {{-- mercado pago --}}
    @endpush
