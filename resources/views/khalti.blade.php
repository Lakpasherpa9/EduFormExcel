
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"><html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>


    @if (session('message'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div id="error-message"></div>

{{-- <h3>Form for khalti Payment</h3>
<form method="POST" action="{{route('store')}}">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>

        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>

        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- <div class="form-group">
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>

        @error('date_of_birth')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> --}}

    {{-- <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>

        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
         <label for="faculty">Faculty</label>
        {{-- <input type="text" class="form-control @error('faculty') is-invalid @enderror" name="faculty" value="{{old('faculty')}}" required> --}}
        {{-- <select id="faculty" name="faculty">
            <option value="">-- Please select --</option>
            <option value="Science and Technology">Science and Technology</option>
            <option value="Management">Management</option>
          </select> --}}

        {{-- @error('faculty')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> --}}

    {{-- <div class="form-group">
        <label for="program">Program</label> --}}
        {{-- <input type="text" class="form-control @error('program') is-invalid @enderror" name="program" value="{{old('program')}}" required> --}}
        {{-- <select id="program" name="program">
            <option value="">-- Please select --</option>
            <option value="BE Computer">BE Computer</option>
            <option value="BE Civil">BE Civil</option>
            <option value="BBA">BBA</option>
            <option value="BCA">BCA</option>
            <option value="BIT">BIT</option>
          </select> --}}
{{-- 
        @error('program')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="semesters">Semester</label> --}}
        {{-- <input type="text" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{old('semester')}}" required> --}}
        {{-- <select id="semester" name="semester">
            <option value="">-- Please select --</option>
            <option value="1">1st Sem</option>
            <option value="2">2nd Sem</option>
            <option value="3">3rd Sem</option>
            <option value="4">4th Sem</option>
            <option value="5">5th Sem</option>
            <option value="6">6th Sem</option>
            <option value="7">7th Sem</option>
            <option value="8">8th Sem</option>
          </select>

        @error('semester')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
          --}}
  

    {{-- <button type="submit" class="btn btn-primary" >Submit</button> 
</form> --}}
{{-- Form ends here --}}


<br><br>
    
{{-- <label for="amount">Enter the amount:</label>
<input type="number" id="input-number" name="amount" min="10" max="999999" step="1"> --}}

{{-- <button id="set-value-button">Set Value and Pay with Khalti</button> --}}
 <button id="payment-button">Pay with Khalti</button> 
    <h1>Khalti Payment here</h1>    
    <BR><BR>

    
    <br>

    {{-- <p class="valueClass">Hello</p> --}}
</body>

<script>

        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_5168a766237e4689bad8cb2aa350bd0a",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                    if (payload.idx){
                        $.ajaxSetup({
                            headers:{
                            'X-CSRF-TOKEN':'{{csrf_token()}}'
                         }
                        });

                        $.ajax({
                            method:'post',
                            url:'{{route('paymentdetails')}}',
                            data:payload,

                            success: function(response){
                                if (response.success){
                                    alert('Your money has been successfully paid');
                                }
                                else{
                                    $('#error-message').text('Payment failed. Please try again.').show();
                                    console.log('payment not successful')
                                    checkout.hide();
                                }
                            },
                            error : function(data){
                                console.log('error:',data);
                            }
                        });
                    }
                },
                onError (error) {

                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
      //  var inputNumber = document.getElementById('input-number');

     //   var paymentAmount= document.getElementById('khalti').value;
        btn.onclick = function () {
           // event.preventDefualt();
            // var inputValue = parseInt(inputNumber.value);
            // var acutalPaymentValue= inputValue*100;
            
            // console.log(inputValue);
            // if (!isNaN(inputValue)) {
            //     //valueClass.textContent = 'The payment amount is ' + inputValue + '.';
            //     if( acutalPaymentValue <= 50000 || acutalPaymentValue>=10000000 || acutalPaymentValue ===0 )
            //     {
            //         console.log(acutalPaymentValue);
            //         console.log('for testing ')
            //         alert('Amount for form is Rs.1100');
            //     }
            //     else{
                  //  console.log(acutalPaymentValue);
                //   setTimeout(function() {                  //Khalti window auna 4s le delay garne code
                //             console.log("Hudai Xa");
                //             checkout.show({amount: acutalPaymentValue});
                //     }, 2500);
                 checkout.show({amount:110000});
                }

            //  else{
            //     valueClass.textContent = 'Please enter a valid integer.';
            // }

            // minimum transaction amount must be 10, i.e 1000 in paisa.
          //  checkout.show({amount: paymentAmount});
    
    </script>
</html>
</div>
</div>
</div>
@endsection