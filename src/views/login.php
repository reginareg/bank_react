<?php

require __DIR__ . '/top.php';
?>


<h1>Login to Girios bankas</h1>
<form method="post">
    <input type='text' name='name'>
    <input type='password' name='psw'>
    <input type='number' name='code'>
    <input type='number' name='nr'>
    <button type='submit'>Login<button>
</form>

<?php

require __DIR__ . '/bottom.php';