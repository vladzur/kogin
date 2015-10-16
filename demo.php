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
echo $form->checkbox('recibir_alertas');
echo $form->button('Guardar');
echo $form->close();
?>
</body>

</html>


