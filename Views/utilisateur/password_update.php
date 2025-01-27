
<h1>Reset Password</h1>
<form action="/password/update" method="POST">
    <input type="hidden" name="token" value="{{ token }}">
    <label for="password">New Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Update Password</button>
</form>
