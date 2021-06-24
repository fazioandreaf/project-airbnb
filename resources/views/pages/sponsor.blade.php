@extends('layouts.main_layout')
@section('content')
<div style="height:500px">

    pagina dello sponsor

    <form action="{{Route('sponsor_function',$apartment->id)}}" method="get"
        enctype="multipart/form-data">
        @csrf
        @method('get')
        
        <div style="text-align: center">
            <div style="margin-top: 20px">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$apartment->title}}" required>
            </div>
            <h2 style="margin: 20px">
                Sponsors
            </h2>
            <div>
                @foreach ($sponsors as $sponsor)
                    <div>
                        <label for="sponsor_id">{{$sponsor->sponsor_duration}} Ore al costo di: {{$sponsor->price}}</label>
                        <input type="checkbox" name="sponsor_id" id="sponsor_id" value="{{$sponsor->id}}"
                            @foreach ($apartment->sponsors as $checkedsponsor)
                                @if ($checkedsponsor->id == $sponsor->id)
                                    checked
                                @endif
                            @endforeach
                        >
                    </div>
                @endforeach
            </div>
            <button type="submit">Invia</button>
        </div>
    </form>

    <div class="test-braintree" style="width: 500px">
        <form method="post" id="payment-form" action="{{ url('/checkout', Auth::user()) }}">
          @csrf
          <section>
              <label for="amount">
                  <span class="input-label">Amount</span>
                  <div class="input-wrapper amount-wrapper">
                      <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{$sponsor->price}}">
                  </div>
              </label>
  
              <div class="bt-drop-in-wrapper">
                  <div id="bt-dropin"></div>
              </div>
          </section>
  
          <input id="nonce" name="payment_method_nonce" type="hidden" />
          <button class="button" type="submit"><span>Test Transaction</span></button>
        </form>
      </div>
  
      <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
  
        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin'
        },function (createErr, instance) {
            if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
              event.preventDefault();
              instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }
              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script>

</div>
@endsection
