<h1>Register</h1>
<form action="/user/store" method="POST">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required>
    
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Register</button>
</form>
