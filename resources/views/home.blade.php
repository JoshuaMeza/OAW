@extends('layouts.base')

@section('authors',
    'Joshua Immanuel Meza Magaña, Jonathan Gregorio Gómez Benítez, Ricardo Alejandro Grimaldo Patiño,
    Hebert Jesús Negrón May',)
@section('keywords', 'noticia, personalizable, rss')
@section('title', 'Noticias')
@section('custom-css')
    <link rel="stylesheet" href="./css/home.css">
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center my-3">¡Bandeja de noticias personalizables!</h1>

        <section>
            <h2 class="text-center mb-3">Fuentes de noticias</h2>

            <!-- Update and add button -->
            <div class="container-fluid mb-3 d-flex justify-content-evenly">
<<<<<<< Updated upstream
                <form id="update">
=======
                <div class="spinner-border text-primary" role="status" style="visibility: hidden;" id="spinnerUpdate">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <form action="" method="post" id="update">
>>>>>>> Stashed changes
                    @csrf
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
                <form id="create" action="" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enlace de RSS">
                        <button type="submit" class="btn btn-success">Añadir</button>
                    </div>
                </form>
            </div>

            <!-- RSS table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Enlace RSS</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($register as $rss) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $register['id']; ?></th>
                            <td><?php echo $register['link']; ?></td>
                            <td>
                                <form class="delete-form" action="" method="post">
                                    @csrf
                                    <input type="hidden" name="link-id" value="<?php echo $register['id']; ?>">
                                    <button type="submit" class="btn btn-outline-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section>
            <h2 class="text-center mb-3">Bandeja de resultados</h2>

            <!-- Search and sort box -->
            <div class="d-flex justify-content-center">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="search-desc"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></span>
                    <input type="text" class="form-control" placeholder="Buscar" aria-describedby="search-desc"
                        id="search-content">
                </div>

                <div class="input-group mb-3 ms-3">
                    <span class="input-group-text" id="sort-desc"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                        </svg></span>
                    <select class="form-select" aria-describedby="sort-desc" id="sort-selection">
                        <option value="date" selected>Fecha</option>
                        <option value="title">Título</option>
                        <option value="url">URL</option>
                        <option value="description">Descripción</option>
                        <option value="categories">Categorías</option>
                    </select>
                </div>
            </div>

            <!-- Output box -->
            <div class="container-fluid">
                <div class="row d-flex justify-content-evenly" id="news-box">
                </div>
            </div>
        </section>
    </div>
@endsection
@section('custom-js')
    <script src="./js/home.js"></script>
@endsection
