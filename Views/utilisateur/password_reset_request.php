
<h1>Password Reset</h1>
<form action="/password/request_reset" method="POST">
    <label for="email">Email Address:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Send Reset Link</button>
</form>

    <p class="error">{{ error }}</p>
