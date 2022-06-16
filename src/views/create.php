<?php

require __DIR__ . '/top.php';
?>

<main class="main saskaitos">
    <h1>Sukurti naują sąskaitą</h1>
<?php
    require __DIR__ . '/messages.php';
?>
    <form action="" method="post" class="new">
        <input type="hidden" name="client" value="<?= $id ?>" readonly>
        Sąskaitos Nr.: <input type="text" name="code" value="<?= $iban ?>" required readonly />
        Vardas: <input type="text" name="name" required />
        Pavarde: <input type="text" name="surname" required />
        Asmens kodas: <input type="number" name="personId" required />
        <button class="btn">CREATE</button>
    </form>

<?php

require __DIR__ . '/bottom.php';