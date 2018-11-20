@component('mail::message')
<div style="display : flex;justify-content: center;">
  <img src="{{ asset('/images/logo.png') }}" />
</div>
<br />
<div>
  <div>
    <h1 style="text-align : center">Reset your password on {{ config('app.name') }}</h1>
  </div>
  <br />
  <h2 style="text-align : center">Tap the button below to reset your password</h2>
  <br />
</div>

@component('mail::button', ['url' => $link])
Reset
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
