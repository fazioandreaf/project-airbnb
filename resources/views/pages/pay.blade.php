@extends('layouts.pay-layout')
@section('content')

    <style>
        .test-braintree{
            width: 700px;
            margin: 50px auto;
            border: 2px solid gray;
            border-radius: 15px;
        }
        form{
            display: flex;
            flex-wrap: wrap;
        }
        form > div{
            width: 100%;
        }
        .input-style{
            margin-top: 20px;
        }
        .center{
            text-align: center;
        }
        .mr{
            margin-right: 20px;
        }
        .address-style{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        #info-card{
            display: flex;
            justify-content: space-around;
            margin: 40px auto;
        }
        #card-number,
        #expiration-date,
        #cvv{
            height: 40px;
        }
        #card-number{
            width: 170px;
        }
        #expiration-date,
        #cvv{
            width: 80px
        }
        .btn{
            width: 110px;
            height: 50px;
            margin: 20px auto;
            border: none;
            border-radius: 15px;
            background-color: #f66d9b;
        }
    </style>

    <div class="test-braintree" style='[width: 500px; margin:auto]'>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/checkout', [Auth::user(),$sponsor->id,$apartment->id]) }}" method="POST" id="payment-form">
            @csrf

            <div class="input-style center">
                <label for="name_on_card">Name on Card</label>
                <input type="text" id="name_on_card" name="name_on_card">
            </div>

            <div class="input-style center">
                <label for="email">Email Address</label>
                <input type="email" id="email">
            </div>

            <div class="address-style">
                <div>
                    <div class="input-style mr">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address">
                    </div>
                </div>

                <div>
                    <div class="input-style">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city">
                    </div>
                </div>

                <div>
                    <div class="input-style">
                        <label for="province">Province</label>
                        <input type="text" id="province" name="province">
                    </div>
                </div>

            </div>

            <div>
                <div>
                    <div class="input-style center">
                        <label for="postalcode">Postal Code</label>
                        <input type="text" id="postalcode" name="postalcode">
                    </div>
                </div>

                <div>
                    <div class="input-style center">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country">
                    </div>
                </div>

                <div>
                    <div class="input-style center">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                </div>

            </div>

            <div id='info-card'>
                <div class="card-style">
                    <label for="cc_number">Credit Card Number</label>
                    <div id="card-number">
                    </div>
                </div>

                <div class="expiry-style">
                    <label for="expiry">Expiry</label>
                    <div id="expiration-date">
                    </div>
                </div>

                <div class="cvv-style">
                    <label for="cvv">CVV</label>
                    <div id="cvv">
                    </div>
                </div>

            </div>

            {{-- <div class="spacer"></div> --}}

            {{-- <div id="paypal-button"></div> --}}

            {{-- <div class="spacer"></div> --}}

            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <button type="submit" class="btn btn-success">Submit Payment</button>
        </form>
    </div>

    <script src="https://js.braintreegateway.com/web/3.38.1/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.38.1/js/hosted-fields.min.js"></script>

    <script>

        var form = document.querySelector('#payment-form');
        var submit = document.querySelector('input[type="submit"]');

      braintree.client.create({
        authorization: '{{ $token }}'
      }, function (clientErr, clientInstance) {
        if (clientErr) {
          console.error(clientErr);
          return;
        }
        braintree.hostedFields.create({
          client: clientInstance,
          styles: {
            'input': {
              'font-size': '14px'
            },
            'input.invalid': {
              'color': 'red'
            },
            'input.valid': {
              'color': 'green'
            }
          },
          fields: {
            number: {
              selector: '#card-number',
              placeholder: '4111 1111 1111 1111'
            },
            cvv: {
              selector: '#cvv',
              placeholder: '123'
            },
            expirationDate: {
              selector: '#expiration-date',
              placeholder: 'MM/YY'
            }
          }
        }, function (hostedFieldsErr, hostedFieldsInstance) {
            if (hostedFieldsErr) {
                console.error(hostedFieldsErr);
                return;
            }
             form.addEventListener('submit', function (event) {
                event.preventDefault();
                hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
                if (tokenizeErr) {
                    console.error(tokenizeErr);
                    return;
                }
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
          }, false);
        });
    });
    </script>
@endsection