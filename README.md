[![Codacy Badge](https://api.codacy.com/project/badge/grade/c97f7a9a1a0e421687d528e9833f43eb)](https://www.codacy.com/app/vladzur/kogin)

## Kogin
This is a FormBuilder for Botstrap 3.x and is in beta state.

## Install
Vía composer

```
composer require vladzur/kogin
```

## Usage

You can simply do... 



    <?php
    include_once 'vendor/autoload.php';
    
    $form = new \Vladzur\Kogin\FormBuilder();
    echo $form->open(['action' => 'demo.php']);
    echo $form->text('user_name');
    echo $form->email('email');
    echo $form->password('password');
    echo $form->select('chooses', ['One', 'Two', 'Three']);
    echo $form->textarea('body');
    echo $form->checkbox('remember_me');
    echo $form->button('Save', ['class' => 'btn btn-primary']);
    echo $form->close();
    ?>

