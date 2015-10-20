<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form builder demo</title>
</head>

<body>
<?php
include_once 'vendor/autoload.php';

$form = new \Vladzur\Kogin\FormBuilder();
echo $form->open(['action' => 'demo.php']);
echo $form->text('nombre_completo');
echo $form->email('email');
echo $form->password('password');
echo $form->select('estado', [1 => "Creado", 2 => "Revisado", 3 => "cerrado"]);
echo $form->close();
echo $form->button('Guardar');
?>
</body>

</html>


