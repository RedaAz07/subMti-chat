<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community</title>
    <link rel="stylesheet" href="{{ url('css/styleEtud.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&family=Radio+Canada+Big:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>

<body>


    <!---------------------------------------------------- header ------------------------------------------------------>


    {{--                        etudient page                  --}}
    @auth

        @if (auth()->user()->type === 'etudient')
            <header>
                <div class="left-section">
                      <img src="{{ asset('img/logo2.png') }}">
                </div>
                <div class="right-section">
                    <img src=" {{ asset('img/student.png') }}" alt="" id="me"
                        data-dropdown-toggle="dropdownInformation">



                    <!-- Dropdown menu -->
                    <div id="dropdownInformation"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-70 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">

                            <div class="font-medium truncate text-xl"> {{ auth()->user()->email }}</div>



                        </div>
                        <ul class="py-2 text-xl text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownInformationButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>

                        </ul>
                        <div class="py-2">


                            <form action="{{ route('login.logout') }}" method="post"
                                class="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                @csrf

                                <button type="submit">log out</button>

                            </form>

                        </div>
                    </div>
                    @auth
                        @foreach ($etudients as $etudient)
                            @if ($etudient->utilisateur->id === auth()->user()->id)
                                <span id="nom"><strong>{{ $etudient->nom .$etudient->prenom }}</strong></span>
                            @endif
                        @endforeach

                    @endauth


                </div>
            </header>
            <!----------------------------------------------------fin header ------------------------------------------------------>

            <!----------------------------- container li jam3 la page kamla mn ghir lheader howa had  content-area------------------------------------------------------>
            <div class="content-area">

                <!---------------------------------------------------- left-sidebar  -- jiha lisrya ----------------------------------------------------->
                <div class="left-sidebar">
                    <!---------------------------------------------------- had fix-container howa li jame3 h1 d formateurs o recherch barre  ------------------------------------------------------>

                    <div class="fix-container">

                        <h1><strong>Formateurs</strong></h1>
                        <div class="mid-section">

                            <form  class="mx-auto max-w-screen-xl mx-10" style="width: 300px;" action="{{ route('message.searchFormateur/for') }}" method="POST">@csrf
                                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="search" id="default-search" name='search' class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search formateur..." required />
                                    <button type="submit" style="background: #f48c06; " class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                </div>
                            </form>


                        </div>


                        <nav>


                            @error('search')
                                {{ $message }}
                            @enderror
                            <!---------------------------------------------------- link homa kola formateurs bohdo ------------------------------------------------------>




                            @foreach ($etudients as $etudiant)
                                @auth
                                    @if (auth()->user()->id === $etudiant->utilisateur->id)
                                        @foreach ($formateurs as $formateur)
                                            @foreach ($formateur->classes as $class)
                                                @if (
                                                    $etudiant->classe->id_classe === $class->id_classe &&
                                                        $etudiant->classe->niveau->id_niveau === $class->niveau->id_niveau &&
                                                        $etudiant->classe->niveau->id_filiere == $class->niveau->id_filiere)
                                                    <a href="{{ route('messageformateur.show_form', ['id_for' => $formateur->id_formateur]) }}"
                                                        class="link">
                                                        <img src="{{ asset('img/man.png') }}" class="img-teacher">
                                                        <div class="description">
                                                            <span id="active-span">{{ $formateur->nom ." ".$formateur->prenom }}</span>
                                                            <p></p>
                                                        </div>
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endauth
                            @endforeach



                        </nav>
                    </div>
                    <!---------------------------------------------------- fin left-sidebar------------------------------------------------------>
                </div>
                <!---------------------------------------------------- main-content---- hada howa la partie lwestanya-------------------------------------------------->
                <div class="main-content">

                    <!-------------------- detaills-container---- hada howa lfo9 dial chat ------------------->

                    <!-------------------- chat-container------- hada blasa li kaikhrjo fiha les msj---------------->
<div class="chat-container">
    <img class="gif" src="{{ asset('gif/chat.gif') }}" alt="Description du GIF">
    <h1>SupMti pour windows</h1>
    <h2>Envoyez et recevez des messages avec tes camarades ou bien tes profeseurs  avec lutilisation de votre platform  supMtiOujda</h2>
    <div class='lock-msj'>
        <img class="lock" src="{{ asset('gif/lock.gif') }}" alt="Description du GIF">
        <span>End-to-end encrypted</span>

    </div>
</div>

                    <!---------------------------------------------------- fin chat-container ------------------------------------------------------>


                    <!---------------------------------------- message-container ----- hada l input li katkteb fiha msj dialk------------------------------------------------->

                    <div class="message-container">

                        <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">@csrf
                            <label for="chat" class="sr-only">Your message</label>
                            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">




                                <div class="flex items-center justify-center ">
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-0   cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>

                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" name="file" />
                                    </label>
                                </div>





                                <span class="sr-only">Upload image</span>

                                <textarea id="chat" rows="1"
                                    class="block mx-4 p-2.5 w-full text-md text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                                    placeholder="Your message..." name="contenu" ></textarea>
                                <button type="submit"
                                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg class="w-8 h-8 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                    </svg>
                                    <span class="sr-only">Send message</span>
                                </button>
                            </div>
                        </form>
                    </div>


                </div>


                <!-------------------------------------- right-sidebar------- hadi hya jiha limnya li fiha les groupes o les annances----------------------------------------------->


                <div class="right-sidebar">
                    <aside>
                        <div class="fix-groupe-container">
                            <h2 class="groupe"><strong>Classes</strong></h2>
                            <div class="groupes">
                                <a href="{{route("submti")}}" class="links ">
                                    <img src="{{ asset('img/group.png') }}" alt="" class="img-group">
                                    <span id="active-span">groupe SUPMTI</span>
                                </a>
                            </div>

                            {{--     groupe prancipale --}}
                            @foreach ($etudients as $etudient)
                                @auth
                                    @if ($etudient->utilisateur->id === auth()->user()->id)
                                        <div class="groupes">

                                            <a href="{{ route('messageClasse.index', ['id_classe' => $etudient->id_classe]) }}"
                                                class="links">


                                                <img src="{{ asset('img/group.png') }}" alt="" class="img-group">
                                                <span id="active-span">{{ $etudient->classe->num_groupe }} </span>
                                            </a>
                                        </div>
                                    @endif
                                @endauth
                            @endforeach

                            {{--                groupe formateur                                     --}}



                            @foreach ($etudients as $etudient)
                                @auth

                                    @if ($etudient->utilisateur->id === auth()->user()->id)
                                        @foreach ($classeFormMessage as $item)
                                            @if ($etudient->id_classe === $item->id_classe)
                                                <div class="groupes">

                                                    <a href="{{ route('classeFormMessage.indexEtud', ['id_classe' => $item->classe->id_classe]) }}"
                                                        class="links">


                                                        <img src="{{ asset('img/group.png') }}" alt=""
                                                            class="img-group">
                                                        <span id="active-span">{{ $item->classe->num_groupe }} prive</span>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endauth
                            @endforeach







                        </div>
                        <section>
                            <h2 class="annance"><strong>Actualites</strong></h2>


                            @foreach ($actualites as $actualite)
                                <div class="annances-container">
                                    <div id="alert-border-2" class=" annances font-semibold flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
                                        <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path  d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <div class="span" class="ms-3 font-semibold">{{ $actualite->contenu }}</div>

                                    </div>
                                </div>





                            @endforeach
                        </section>
                    </aside>
                </div>
            </div>










            {{--        page formateur                             --}}
        @elseif (auth()->user()->type === 'formateur')
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>community</title>
                <link rel="stylesheet" href="{{ url('css/formateur.css') }}">
                <link rel="stylesheet"
                    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
                <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&family=Radio+Canada+Big:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet"></head>


            </head>

            <body>
                <!---------------------------------------------------- header ------------------------------------------------------>

                <header>
                    <div class="left-section">
                          <img src="{{ asset('img/logo2.png') }}">
                    </div>




                    <div class="right-section">
                        <img src=" {{ asset('img/student.png') }}" alt="" id="me"
                            data-dropdown-toggle="dropdownInformation">



                        <!-- Dropdown menu -->
                        <div id="dropdownInformation"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-70 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div class="font-medium truncate text-xl">mahdiyahiaoui@supmti.com</div>
                            </div>
                            <ul class="py-2 text-xl text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownInformationButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>

                            </ul>
                            <div class="py-2">



                                <form action="{{ route('login.logout') }}" method="post"
                                    class="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    @csrf

                                    <button type="submit">log out</button>

                                </form>
                            </div>
                        </div>
                        @auth




                            @foreach ($formateurs as $formateur)
                                @if ($formateur->utilisateur->id === auth()->user()->id)
                                    <span id="nom"><strong>{{ $formateur->nom . $formateur->prenom }}</strong></span>
                                @endif
                            @endforeach

                        @endauth
                    </div>
                </header>
                <!----------------------------------------------------fin header ------------------------------------------------------>

                <!----------------------------- container li jam3 la page kamla mn ghir lheader howa had  content-area------------------------------------------------------>
                <div class="content-area">
                    <!---------------------------------------------------- left-sidebar  -- jiha lisrya ----------------------------------------------------->
                    <div class="left-sidebar">
                        <!---------------------------------------------------- had fix-container howa li jame3 h1 d formateurs o recherch barre  ------------------------------------------------------>

                        <div class="fix-container">

                            <h1><strong>Etudiants</strong></h1>
                            <div class="mid-section">

                                <form  class="mx-auto max-w-screen-xl mx-10" style="width: 300px;" action="{{ route('message.searchEtudient') }}" method="POST">@csrf
                                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                        </div>
                                        <input type="search" id="default-search" name='search' class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search formateur..." required />
                                        <button type="submit" style="background: #f48c06; " class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                    </div>
                                </form>
                            </div>

                            <nav>
                                <!---------------------------------------------------- link homa kola formateurs bohdo ------------------------------------------------------>




                                @auth

                                    @foreach ($formateurs as $formateur)
                                        @if (auth()->user()->id === $formateur->utilisateur->id)
                                            @foreach ($formateur->classes as $classe)
                                                @foreach ($etudients as $etudient)
                                                    @if (
                                                        $etudient->classe->id_classe === $classe->id_classe &&
                                                            $etudient->classe->niveau->id_niveau === $classe->niveau->id_niveau &&
                                                            $etudient->classe->niveau->id_filiere === $classe->niveau->id_filiere)
                                                        <a href="{{ route('messageformateur.show_Etud', ['id_for' => $etudient->id_etudient]) }}"
                                                            class="link">
                                                            <img src="{{ asset('img/man.png') }}" class="img-teacher">
                                                            <div class="discription">
                                                                <span
                                                                    id="active-span">{{ $etudient->nom . '  ' . $etudient->prenom }}</span>
                                                                <p>{{ $etudient->classe->num_groupe . ' ' . $etudient->classe->niveau->niveau . ' ' }}
                                                                </p>
                                                            </div>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endauth



















                            </nav>
                        </div>
                        <!---------------------------------------------------- fin left-sidebar------------------------------------------------------>
                    </div>
                    <!---------------------------------------------------- main-content---- hada howa la partie lwestanya-------------------------------------------------->
                    <div class="main-content">

                        <!-------------------- detaills-container---- hada howa lfo9 dial chat ------------------->

                        <!-------------------- chat-container------- hada blasa li kaikhrjo fiha les msj---------------->
                        <div class="chat-container www">
                            <img class="gif" src="{{ asset('gif/chat.gif') }}" alt="Description du GIF">
                            <h1>SupMti pour windows</h1>
                            <h2>Envoyez et recevez des messages avec tes camarades ou bien tes profeseurs  avec lutilisation de votre platform  supMtiOujda</h2>
                            <div class='lock-msj'>
                                <img class="lock" src="{{ asset('gif/lock.gif') }}" alt="Description du GIF">
                                <span>End-to-end encrypted</span>

                            </div>
                        </div>
                        <!---------------------------------------------------- fin chat-container ------------------------------------------------------>


                        <!---------------------------------------- message-container ----- hada l input li katkteb fiha msj dialk------------------------------------------------->

                        <div class="message-container">


                        </div>


                    </div>


                    <!-------------------------------------- right-sidebar------- hadi hya jiha limnya li fiha les groupes o les annances----------------------------------------------->


                    <div class="right-sidebar">
                        <aside>
                            <div class="fix-groupe-container">
                                <h2 class="groupe"><strong>groups</strong></h2>
                                <div class="groupes">
                                    <div>
                                        <a href="" class="links ">
                                            <img src="{{ asset('img/group.png') }}" alt="" class="img-group">
                                            <span id="active-span">groupe SUPMTI</span>
                                        </a>
                                    </div>






                                    @auth
                                        @foreach ($formateurs as $formateur)
                                            @if (auth()->user()->id === $formateur->utilisateur->id)
                                                @foreach ($formateur->classes as $item)
                                                    @foreach ($filieres as $filiere)
                                                        @if ($item->niveau->id_filiere === $filiere->id_filiere)
                                                            <div>
                                                                <a href="{{ route('classeFormMessage.index', ['id_classe' => $item->id_classe]) }}"
                                                                    class="links">
                                                                    <img src="{{ asset('img/group.png') }}" alt=""
                                                                        class="img-group">
                                                                    <span id="active-span">{{ $item->num_groupe }} </span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endauth











                                </div>

                            </div>
                            <section>
                                <h2 class="annance"><strong>Actualites</strong></h2>


                                @foreach ($actualites as $actualite)
                                    <div class="annances-container">
                                        <div id="alert-border-2" class=" annances font-semibold flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
                                            <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path  d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <div class="span" class="ms-3 font-semibold">{{ $actualite->contenu }}</div>

                                        </div>
                                    </div>





                                @endforeach
                            </section>
                        </aside>

                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
            </body>

            </html>












            {{--       fin de   page formateur                             --}}





































            {{-- page dyal l admin --}}
        @elseif (auth()->user()->type === 'admin')
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>community</title>
                <link rel="stylesheet" href="{{ url('css/admin.css') }}">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&family=Radio+Canada+Big:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet"></head>
            </head>

            <body>
                <!---------------------------------------------------- header ------------------------------------------------------>

                <header>
                    <div class="left-section">
                          <img src="{{ asset('img/logo2.png') }}">
                    </div>
                    <div class="navbar">







                        <div class="right-section">
                            <img src=" {{ asset('img/student.png') }}" alt="" id="me"
                                data-dropdown-toggle="dropdownInformation">



                            <!-- Dropdown menu -->
                            <div id="dropdownInformation"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-70 dark:bg-gray-700 dark:divide-gray-600">
                                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">


                                    <div class="font-medium truncate text-xl">{{auth()->user()->email}}</div>
                                </div>
                                <ul class="py-2 text-xl text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownInformationButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>

                                </ul>
                                <div class="py-2">
                                    <form action="{{ route('login.logout') }}" method="post"
                                        class="block px-4 py-2 text-xl text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        @csrf

                                        <button type="submit">log out</button>

                                    </form>
                                </div>
                            </div>

                        @auth



                        @foreach ($admins as $admin)
                            @if ($admin->utilisateur->id === auth()->user()->id)
                                <span id="nom"><strong>{{ $admin->nom ." ". $admin->prenom }}</strong></span>
                            @endif
                        @endforeach

                    @endauth

                        </div>
                        <div id="mainDiv">
                            <button id="toggleDivButton"><img id="toggleImage" src="{{ asset('img/arrow-up.png') }}" alt="" ></button>
                            <div id="hiddenDiv" style="display: none;">
                                <form id="fileUploadForm" action="{{url('import')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" onchange="document.getElementById('fileUploadForm').submit()">
                                    <a class="btnn" href="{{route('export.user')}}">export etudiant</a>
                                    <a class="btnn" href="{{route("formateur.create")}}">Importer les formateurs</a>
                                    <a class="btnn" href="{{route("export.formateur")}}">export formateur</a>
                                    <a href="{{ route('actualites.create') }}" class="btnn" role="button">Poster une actualites</a>
                                </form>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var toggleDivButton = document.getElementById("toggleDivButton");
                                var toggleImage = document.getElementById("toggleImage");
                                var hiddenDiv = document.getElementById("hiddenDiv");

                                toggleDivButton.addEventListener("click", function() {
                                    if (hiddenDiv.style.display === "none" || hiddenDiv.style.display === "") {
                                        hiddenDiv.style.display = "block";
                                        toggleImage.src = "{{ asset('img/down-arrow.png') }}"; // Change this to the path of the image you want to show when the div is visible
                                    } else {
                                        hiddenDiv.style.display = "none";
                                        toggleImage.src = "{{ asset('img/arrow-up.png') }}"; // Change this to the path of the image you want to show when the div is hidden
                                    }
                                });
                            });
                        </script>
                            </div>


                </header>
                <!----------------------------------------------------fin header ------------------------------------------------------>

                <!----------------------------- container li jam3 la page kamla mn ghir lheader howa had  content-area------------------------------------------------------>
                <div class="content-area">
                    <!---------------------------------------------------- left-sidebar  -- jiha lisrya ----------------------------------------------------->
                    <div class="left-sidebar">
                        <!---------------------------------------------------- had fix-container howa li jame3 h1 d formateurs o recherch barre  ------------------------------------------------------>

                        <div class="fix-container">

                            <h1><strong>formateurs</strong></h1>
                            <div class="mid-section">
                                <form  class="mx-auto max-w-screen-xl mx-10" style="width: 300px;" action="{{ route('message.searchFormateur/for') }}" method="POST">@csrf
                                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                        </div>
                                        <input type="search" id="default-search" name='search' class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search formateur..." required />
                                        <button type="submit" style="background: #f48c06; " class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                    </div>
                                </form>
                            </div>

                            <nav>
                                <!---------------------------------------------------- link homa kola formateurs bohdo ------------------------------------------------------>



                                @foreach ($formateurs as $formateur)
                                    <a href="{{ route('adminProfMessages.index', ['id_form' => $formateur->id_formateur]) }}"
                                        class="link">
                                        <img src="{{ asset('img/man.png') }}" class="img-teacher">
                                        <div class="discription">
                                            <span id="active-span">{{ $formateur->nom . ' ' . $formateur->prenom }}</span>
                                            <p></p>
                                        </div>
                                    </a>
                                @endforeach




                            </nav>
                        </div>
                        <!---------------------------------------------------- fin left-sidebar------------------------------------------------------>
                    </div>
                    <!---------------------------------------------------- main-content---- hada howa la partie lwestanya-------------------------------------------------->
                    <div class="main-content">

                        <!-------------------- detaills-container---- hada howa lfo9 dial chat ------------------->
                        <div class="detaills-container">

                        </div>
                        <!-------------------- chat-container------- hada blasa li kaikhrjo fiha les msj---------------->
                        <div class="chat-container www">
                            <img class="gif" src="{{ asset('gif/chat.gif') }}" alt="Description du GIF">
                            <h1>SupMti pour windows</h1>
                            <h2>Envoyez et recevez des messages avec tes camarades ou bien tes profeseurs  avec lutilisation de votre platform  supMtiOujda</h2>
                            <div class='lock-msj'>
                                <img class="lock" src="{{ asset('gif/lock.gif') }}" alt="Description du GIF">
                                <span>End-to-end encrypted</span>

                            </div>
                        </div>
                        <!---------------------------------------------------- fin chat-container ------------------------------------------------------>


                        <!---------------------------------------- message-container ----- hada l input li katkteb fiha msj dialk------------------------------------------------->

                        <div class="message-container">


                        </div>


                    </div>


                    <!-------------------------------------- right-sidebar------- hadi hya jiha limnya li fiha les groupes o les annances----------------------------------------------->


                    <div class="left-sidebar">
                        <!---------------------------------------------------- had fix-container howa li jame3 h1 d formateurs o recherch barre  ------------------------------------------------------>

                        <div class="fix-container">

                            <h1><strong>Etudiants</strong></h1>
                            <div class="mid-section">
                                <form  class="mx-auto max-w-screen-xl mx-10" style="width: 300px;" action="{{ route('message.searchEtudient') }}" method="POST">@csrf
                                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                        </div>
                                        <input type="search" id="default-search" name='search' class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search etudiants..." required />
                                        <button type="submit" style="background: #f48c06; " class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                    </div>
                                </form>
                            </div>


                            <nav>


                                @error('search')
                                    {{ $message }}
                                @enderror
                                <!---------------------------------------------------- link homa kola formateurs bohdo ------------------------------------------------------>



                                @foreach ($etudients as $etudient)
                                    <a href="{{ route('adminEtudMessages.showEtuds', ['id_etud' => $etudient->id_etudient]) }}"
                                        class="link">
                                        <img src="{{ asset('img/student.png') }}" class="img-etudiant">
                                        <div class="discription">
                                            <span id="active-span">{{ $etudient->nom . $etudient->prenom }}</span>
                                            <p>Lorem ipsum dolor sit consectetur elit.</p>
                                        </div>
                                    </a>
                                @endforeach

                            </nav>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
            </body>

            </html>
        @endif
    @endauth
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>



</body>


</html>
