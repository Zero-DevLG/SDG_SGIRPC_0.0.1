<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/estilos_max.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/main2.js"></script>
    <script src="../js/paginator.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Panel de Administracion</title>
</head>

<body>
    <div id="mostrar_loading"></div>
    <div id="Contenido">
        <ul class=" pagination" id="paginador">
        </ul>
        <table class="table table-hover  table-light table-bordered table-sm">
            <thead class="table-success">
                <tr>
                    <th>Fecha limite</th>
                    <th>Folio</th>
                    <th>Asunto</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="table">

            </tbody>
        </table>

    </div>
</body>