<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Album Listing</title>
        
        <!-- Collegamento a Font Awesome e Stylesheet in public/css/ -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" />
    </head>
    <body>
        <header>
            <h1>Album Listing</h1>
               <div id="search-container">
                    <form id="search-bar" action="{{ route('home') }}" method="get">
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
            <!-- Form di Inserimento -->
            <form action="{{ route('albums.store') }}" method="post" enctype="multipart/form-data" style="float: left;">
                @csrf
                <fieldset>
                    <legend>Add an Album by an Artist</legend>
                    <ul id="submission-form">
                        <li>
                            <input type="text" size="80" name="artist_name" placeholder="artist" required />
                        </li>
                        <li>
                            <input type="text" name="album_name" placeholder="album" required />
                        </li>
                        <li>
                            <input type="number" name="release_year" placeholder="Year of Release" required />
                        </li>
                        <li>
                            <input type="file" name="upload">
                        </li>
                        <li>
                            <input type="submit" name="submit" value="Submit" />
                        </li>
                    </ul>
                </fieldset>
            </form>

            <div id="wanted-list">
                Hello {{ Auth::user()->name ?? 'User' }}, here's your wanted list.
            </div>

            <!-- Elenco dei Dischi -->
            <ul id="artists">
                @foreach($albums as $album)
                    <li id="entry-{{ $album->id }}">
                        <p id="artist-name" class="data">{{ $album->artist_name }}</p>
                        <p id="album-name" class="data">
                            @if($album->cover_image)
                                <!-- Immagine caricata -->
                                <img src="{{ asset('storage/' . $album->cover_image) }}" height="120" width="120"><br/>
                            @endif
                            {{ $album->album_name }}
                        </p>
                        <p id="year-name" class="data">{{ $album->release_year }}</p>
                        <p>
                            <div class="delete-button">
                                <form action="{{ route('albums.destroy', $album->id) }}" method="POST" onsubmit="return confirm('Sicuro di voler eliminare questo disco?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" style="cursor:pointer;">Delete</button>
                                </form>
                            </div>
                        </p>
                    </li>
                @endforeach
            </ul>
        </main>
        
        <div class="clearfix"></div>
        <div id="space"></div>
        
        <footer>
            <div id="logout">
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:aliceblue; cursor:pointer; font-size: 2rem;">Log Out</button>
                </form>
            </div>
        </footer>
    </body>
</html>