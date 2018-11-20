@component('mail::message')
<div style="display : flex;justify-content: center;">
  <img src="{{ asset('/images/logo.png') }}" />
</div>
<br />
<div>
  <div>
    <h1 style="text-align : center">Confirm your email address on {{ config('app.name') }}</h1>
  </div>
  <br />
  <p style="text-align : center">
    Hello! We just need to verify that
    <a href="mailto:{{ $email }}">{{ $email }}</a>
    is your email address.
  </p>
  <h2 style="text-align : center">Tap the button below to confirm</h2>
  <br />
</div>

@component('mail::button', ['url' => $link])
Activate Your Account
@endcomponent
<h3 style="text-align : center">Didn't request this email ?</h3>
<p style="text-align : center">
  No worries! Your address may have been entered by mistake. if you ignore or delete this email, nothing further will happen.
</p>
<br />
<div style="text-align : center">
  Thanks, {{ config('app.name') }}
</div>
@endcomponent
