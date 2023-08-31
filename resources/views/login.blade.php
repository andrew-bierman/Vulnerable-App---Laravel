<form method="POST" action="/login">
    @csrf
    <p>I kindly ask that you do not enter the following and inject our SQL</p>
    <ul>
        <li>Username: admin' OR '1'='1</li>
        <li>Password: ' OR '1'='1</li>
    </ul>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>

