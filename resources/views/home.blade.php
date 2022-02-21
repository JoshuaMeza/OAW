@extends('layouts.base')

@section('authors', 'Joshua Immanuel Meza Magaña, Jonathan Gregorio Gómez Benítez, Ricardo Alejandro Grimaldo Patiño, Hebert Jesús Negrón May')
@section('keywords', 'noticia, personalizable, rss')
@section('title', 'Noticias')
@section('custom-css')
    <link rel="stylesheet" href="./css/home.css">
@endsection
@section('content')
    <div class="conatiner">
        <h1>¡Bandeja de noticias personalizables!</h1>

        <h2>Opciones</h2>
        <nav>
            <div class="nav nav-tabs" id="config-tab" role="tablist">
            <button class="nav-link active" id="config-intro-tab" data-bs-toggle="tab" data-bs-target="#config-intro" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Inicio</button>
            <button class="nav-link" id="config-add-tab" data-bs-toggle="tab" data-bs-target="#config-add" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Añadir</button>
            <button class="nav-link" id="config-del-tab" data-bs-toggle="tab" data-bs-target="#config-del" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Eliminar</button>
            </div>
        </nav>
        <div class="tab-content" id="config-tabContent">
            <div class="tab-pane fade show active" id="config-intro" role="tabpanel" aria-labelledby="config-intro-tab">
                <h3>Lista de fuentes añadidas</h3>

                <!-- Tabla con los links -->

                <form action="{{ url('/actualizar') }}" method="post">
                    @csrf
                    <!-- Select con opciones de ordenado -->
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
            <div class="tab-pane fade" id="config-add" role="tabpanel" aria-labelledby="config-add-tab">
                <h3>Añadir una nueva fuente de noticias</h3>

                <form action="{{ url('/añadir') }}" method="post">
                    @csrf
                    <!-- Caja para escribir la URL -->
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
            <div class="tab-pane fade" id="config-del" role="tabpanel" aria-labelledby="config-del-tab">
                <h3>Eliminar una fuente de noticias existente</h3>

                <form action="{{ url('/eliminar') }}" method="post">
                    @csrf
                    <!-- Select con los links -->
                    <button type="submit" class="btn btn-danger">Enviar</button>
                </form>
            </div>
        </div>

        <h2>Bandeja de resultados</h2>

        <!-- Bandeja de búsqueda -->

        <?php
            foreach ($news as $new) {
                echo($new['title'] . "<br>");
            }
        ?>
    </div>
@endsection
@section('custom-js')
@endsection
