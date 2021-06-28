@extends('layouts.main_layout')
@section('content')
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

            <div>
                <label for="email">Email Address</label>
                <input type="email" id="email">
            </div>

            <div>
                <label for="name_on_card">Name on Card</label>
                <input type="text" id="name_on_card" name="name_on_card">
            </div>

            <div>
                <div >
                    <div>
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address">
                    </div>
                </div>

                <div>
                    <div>
                        <label for="city">City</label>
                        <input type="text" id="city" name="city">
                    </div>
                </div>

                <div>
                    <div>
                        <label for="province">Province</label>
                        <input type="text" id="province" name="province">
                    </div>
                </div>

            </div>

            <div>
                <div class="col-md-4">
                    <div>
                        <label for="postalcode">Postal Code</label>
                        <input type="text" id="postalcode" name="postalcode">
                    </div>
                </div>

                <div class="col-md-4">
                    <div>
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country">
                    </div>
                </div>

                <div class="col-md-4">
                    <div>
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                </div>

            </div>

            <div>
                <div >
                    <label for="cc_number">Credit Card Number</label>

                    <div id="card-number">

                    </div>
                </div>

                <div>
                    <label for="expiry">Expiry</label>

                    <div id="expiration-date">

                    </div>
                </div>

                <div>
                    <label for="cvv">CVV</label>

                    <div id="cvv">

                    </div>
                </div>

            </div>

            <div class="spacer"></div>

            <div id="paypal-button"></div>

            <div class="spacer"></div>

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