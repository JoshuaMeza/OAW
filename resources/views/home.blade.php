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
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="background-color: rgb(100, 100, 100); background-blend-mode: soft-light;">
            <div class="carousel-item active" data-bs-interval="10000">
                <a href="https://uady.mx/#/noticias/url/reunion-de-preparatorianos-en-torno-al-deporte-uady"
                    target="_blanck">
                    <img src="./img/img1.jpg" class="d-block w-100" alt="noticia1" style="opacity: 0.5;">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h4>Celebran la tradicional carrera “Vuelve a Casa”</h4>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <a href="https://uady.mx/#/noticias/url/deportistas-festejan-centenario-de-la-uady" target="_blanck">
                    <img src="./img/img2.png" class="d-block w-100" alt="noticia2" style="opacity: 0.5;">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h4>Nutrida participación en tradicional carrera</h4>
                </div>
            </div>
            <div class="carousel-item">
                <a href="https://uady.mx/#/noticias/url/es-necesario-repensar-la-educacion-y-su-sistema-williams-uady"
                    target="_blanck">
                    <img src="./img/img3.png" class="d-block w-100" alt="noticia3" style="opacity: 0.5;">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h4>Destaca el rector los retos académicos para un nuevo siglo</h4>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">

        <br><br>

        <section>

            <!-- Update and add button -->
            <div class="container-fluid mb-3 d-flex justify-content-evenly">
                <form id="update">
                    <button type="submit" class="btn btn-primary" id="btnUpdate">Actualizar <div
                            class="spinner-border spinner-border-sm d-none" role="status" id="updateSpinner">
                            <span class="visually-hidden">Loading...</span>
                        </div></button>
                </form>
                <form id="create">
                    <div class="input-group">
                        <input type="text" class="form-control" name="url" placeholder="Enlace de RSS" id="RSSLink">
                        <button type="submit" class="btn btn-success" id="btnAddNew">Añadir</button>
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
                        foreach ($rss as $register) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $register['id']; ?></th>
                            <td><?php echo $register['url']; ?></td>
                            <td>
                                <form class="delete-form">
                                <button type="submit" class="btn btn-outline-danger delete-form"
                                        data-id="<?php echo $register['id']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
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
<script type="text/javascript">
    const listNews= @json($news);
</script>
    <script src="./js/home.js"></script>
@endsection
