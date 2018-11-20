<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
</head>
<body>
  @if ($status === "valid")
    <form action="{{ route("password-reset") . "?token=$token" }}" method="POST">
      @csrf
      <div>
        <label for="password">Password : </label>
        <input type="password" id="password" name="password">
        @if ($errors -> has("password"))
          <div>{{ $errors -> first("password") }}</div>
        @endif
      </div>
      <div>
        <label for="password_confirmation">Confirm Password : </label>
        <input type="password" id="password_confirmation" name="password_confirmation">
        @if ($errors -> has("password"))
          <div>{{ $errors -> first("password") }}</div>
        @endif
      </div>
      <button type="submit">Reset</button>
    </form>
  @else
    <h1>Invalid token!</h1>
  @endif
</body>
</html>