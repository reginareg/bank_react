<?php

$users = [
    ['id' => 1, 'name' => 'ezys', 'psw' => md5('123'), 'full_name' => 'Spygliuotas Kamuoliukas'],
    ['id' => 2, 'name' => 'udra', 'psw' => md5('123'), 'full_name' => 'Sau Faina'],
    ['id' => 3, 'name' => 'genys', 'psw' => md5('123'), 'full_name' => 'Tuk Tuk'],
    ['id' => 4, 'name' => 'lape', 'psw' => md5('123'), 'full_name' => 'Ryža Ilgasnapė'],
    ['id' => 5, 'name' => 'kiskis', 'psw' => md5('123'), 'full_name' => 'Šoklys Ilgaausis'],
    ['id' => 6, 'name' => 'briedis', 'psw' => md5('123'), 'full_name' => 'Girios Raguotas'],
];
file_put_contents(__DIR__ . '/users.json', json_encode($users));

