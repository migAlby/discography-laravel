<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Album Listing</title>
        
        <!-- Enlaces CSS actualizados a la función asset() de Laravel -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" />
    </head>
    <body>
        <header>
            <h1>Album Listing</h1>
            <div id="search-container">
                <form id="search-bar" name="q" action="{{ route('home') }}" method="get">
                    <div id="search-icon">
                        <input type="text" name="search-bar" placeholder="Search..">
                        <button type="submit">
                            <i class="fa fa-search fa-2x" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </header>

        <main>
            <!-- Aquí incluimos el formulario de creación tal como en el original -->
            @include('albums.form')

            <ul id="artists">
                <!-- Reemplazo del bucle while original por un foreach de Laravel -->
                @foreach($albums as $album)
                    <li id="entry-{{ $album->id }}">
                        <p id="artist-name" class="data">
                            {{ $album->artist_name }}
                        </p>
                        <p id="album-name" class="data">
                            {{ $album->album_name }}
                        </p>
                        <p id="year-name" class="data">
                            {{ $album->release_year }}
                        </p>
                        
                        <div class="delete-button">
                            <!-- El enlace de eliminación original se convierte en un formulario seguro -->
                            <form action="{{ route('albums.destroy', $album->id) }}" method="POST" onsubmit="return confirm('davvero vuol eliminare questo disco?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" style="background:none; border:none; padding:0; font:inherit; cursor:pointer;">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </main>
        
        <div class="clearfix"></div>
        <div id="space"></div>
        
        <footer>
            <div id="logout">
                <!-- El enlace de logout se convierte en un formulario POST por seguridad -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:inherit; text-decoration:underline; cursor:pointer;">Log Out</button>
                </form>
            </div>
        </footer>
    </body>
</html>