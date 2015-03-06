
<div id="container">

<form method="post" action="/login/validation">  <!-- missing the action="??" part -->

    <legend> Login Form </legend>

    <fieldset>
        User Name:
        <input type="text" name="username">
        <br>

        Password:
        <input type="password" name="password">
        <br>

        <input type="submit" value="Login">
    </fieldset>
</div>
