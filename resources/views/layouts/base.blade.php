<!doctypehtml><html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><head><meta charset=UTF-8><meta content="width=device-width,initial-scale=1,shrink-to-fit=no"name=viewport><meta content="ie=edge"http-equiv=X-UA-Compatible><meta content="@yield('authors')"name=authors><meta content="@yield('keywords')"name=keywords><meta content="{{ csrf_token() }}"name=csrf-token><title>@yield('title')</title><link href=favicon.ico rel="shortcut icon"type=image/x-icon><link href=https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css rel=stylesheet crossorigin=anonymous integrity=sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3>@yield('custom-css')</head><body><nav class="bg-light navbar navbar-light"><div class=container-fluid><a class=navbar-brand href=#><img alt=""class="align-text-top d-inline-block"src=./favicon.png> <span class="navbar-brand h1 mb-0">Noticias</span></a></div></nav>@yield('content')<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js crossorigin=anonymous integrity=sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p></script><script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script><script src=https://code.jquery.com/jquery-3.6.0.min.js crossorigin=anonymous integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="></script><script src=./js/bundle_compiled.js></script>@yield('custom-js')</body></html>
