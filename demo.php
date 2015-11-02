<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form builder demo</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
          integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
          crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
            integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
            crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Kogin Form Builder Demo</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
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
        </div>
    </div>
</div>
</body>

</html>


