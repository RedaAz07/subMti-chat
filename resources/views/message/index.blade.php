<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community</title>
    <link rel="stylesheet" href="{{ url('css/styleEtud.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

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

                        <h1><strong>Etudiants</strong></h1>
                        <div class="mid-section">
                            <form action="{{ route('message.searchFormateur/for') }}" method="POST">@csrf
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit"><span class="material-symbols-outlined">search</span></button>
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
                    <div class="detaills-container">
                        <div class="right-side">
                            <img src="{{ asset('img/student.png') }}" alt="">
                            @foreach ($etudients as $etudient)
                                @if ($etudient->utilisateur->id === auth()->user()->id)
                                    <span><strong>{{ $etudient->nom . ' ' . $etudient->prenom }}</strong></span>
                                @endif
                            @endforeach


                        </div>
                        <div class="left-side">
                            <img src="{{ asset('img/phone-receiver-silhouette.png') }}" alt="" id="phone">
                            <img src="{{ asset('img/video-camera.png') }}" alt="" id="camera">
                            <img src="{{ asset('img/list.png') }}" alt="" id="list">
                        </div>
                    </div>
                    <!-------------------- chat-container------- hada blasa li kaikhrjo fiha les msj---------------->
                    <div class="chat-container">
                        <div class="chat outgoing" id="outgoing">
                            <div class="details">
                                <form action="">
                                    <img src="{{ asset('img/list.png') }}" alt="" id="imgList"
                                        data-dropdown-toggle="dropdown1">
                                    <!-- Dropdown menu -->

                                </form>

                            </div>
                        </div>






                        @foreach ($messages as $message)
<<<<<<< HEAD


@auth
    @if (auth()->user()->id === $message->utilisateur->id )


    <div class="chat outgoing" id="outgoing">
        <div class="details">
            <form action="">
                <img src="{{ asset('img/list.png') }}" alt="" id="imgList"
                    data-dropdown-toggle="dropdown1">
                <!-- Dropdown menu -->
                <div id="dropdown1"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
                        </li>

                    </ul>
                </div>
            </form>
            <p>{{$message->contenu}}</p>

        </div>
    </div>
    <div style="display:flex ;justify-content: end">

        <img src="{{ asset('storage/' . $message->file) }}" width="100pc" height="100px" alt='makainach'>

    </div>


    @else
    <h6>{{ $message->utilisateur->etudient->nom }}</h6>


    <div class="chat incoming">
        <img src="{{asset("img/ME.jpg")}}" alt="image" >

        <div class="details">
            <p>
                {{ $message->contenu }}



            </p>
            <img src="{{ asset('img/list.png') }}" alt="" id="imgList"
                data-dropdown-toggle="dropdown{{ $message->id_message }}">
            <!-- Dropdown menu -->


            <div id="dropdown{{ $message->id_message }}"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownDefaultButton">
                    <li>
                        @auth
                            @if (auth()->user()->id === $message->utilisateur->id)
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                            @endif
                        @endauth
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
                    </li>

                </ul>
            </div>

            </form>
        </div>
    </div>
    <img src="{{ asset('storage/' . $message->file) }}" alt="" width="300px">

    @endif
@endauth
=======
                            @auth
                                @if (auth()->user()->id === $message->utilisateur->id)
                                    <div class="chat outgoing" id="outgoing">
                                        <div class="details">
                                            <form action="">
                                                <img src="{{ asset('img/list.png') }}" alt="" id="imgList"
                                                data-dropdown-toggle="dropdown{{ $message->id_message }}">
                                                <!-- Dropdown menu -->
                                                <div id="dropdown{{ $message->id_message }}"
                                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
>>>>>>> e0a0de95f09e654710b28a4e551cd7d40031087d





                                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="dropdownDefaultButton">
                                                        <li>

                                                            <form action="{{ route('message.destroy', ['message' => $message->id]) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit">Delete</button>
                                                            </form>


                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </form>
                                            <p style="font-size: 2rem">{{ $message->contenu }}</p>

                                        </div>
                                    </div>
                                    <div style="display:flex ;justify-content: end" >

                                        <img src="{{ asset('storage/' . $message->file) }}" 
                                            >

                                    </div>
                                @else
                                    <h6>{{ $message->utilisateur->etudient->nom }}</h6>


                                    <div class="chat incoming">

                                        <div class="details">
                                            <p style="font-size: 2rem">
                                                {{ $message->contenu }}



                                            </p>
                                            <img src="{{ asset('img/list.png') }}" alt="" id="imgList"
                                                data-dropdown-toggle="dropdown{{ $message->id_message }}">
                                            <!-- Dropdown menu -->


                                            <div id="dropdown{{ $message->id_message }}"
                                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownDefaultButton">
                                                    <li>
                                                        @auth
                                                            @if (auth()->user()->id === $message->utilisateur->id)
                                                                <a href="#"
                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                                            @endif
                                                        @endauth
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
                                                    </li>

                                                </ul>
                                            </div>

                                            </form>
                                        </div>
                                    </div>
                                    <img src="{{ asset('storage/' . $message->file) }}" alt="" width="300px">
                                @endif
                            @endauth
                        @endforeach




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
                                    class="block mx-4 p-2.5 w-full text-md text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Your message..." name="contenu"></textarea>
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
                            <h2 class="groupe"><strong>Classess</strong></h2>
                            <div class="groupes">
                                <a href="" class="links ">
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
                                                <span id="active-span">{{ $etudient->classe->num_groupe }} libre</span>
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
                                    <a href="" class="annances ">
                                        <span id="active-span">{{ $actualite->contenu }}</span>
                                    </a>
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
                                <form action="{{ route('message.searchEtudient') }}" method="POST">@csrf
                                    <input type="text" placeholder="Search" name="search">
                                    <button type="submit"><span class="material-symbols-outlined">search</span></button>
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
                        <div class="chat-container">

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
                                <h2 class="annance"><strong>annances</strong></h2>
                                <div class="annances-container">


                                    @foreach ($actualites as $actualite)
                                        <a href="" class="annances ">
                                            <span id="active-span">{{ $actualite->contenu }}</span>
                                        </a>
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
                <link rel="stylesheet"
                    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

            </head>

<<<<<<< HEAD
            <header>
                <div class="left-section">
                    <img src="{{ asset('img/vg0CZ05S.jpg') }}">
                </div>
        <div class="navbar">



        <form action="{{ route("message.importEtudiant") }}"  method="post" enctype="multipart/form-data">
            @csrf
            <input class="btnn" type="file" value='Importer les formateurs'accept=".xlsx,.xls,.csv" name='file'>
            <button class="btnn" type="submit">Envoyer</button>
            <button class="btnn" role="button">Importer les etudiants</button>

<a href="{{route("actualites.create")}}"  class="btnn" role="button" >lancer un actualites</a>
        </form>





        </div>
=======
            <body>
                <!---------------------------------------------------- header ------------------------------------------------------>

                <header>
                    <div class="left-section">
                          <img src="{{ asset('img/logo2.png') }}">
                    </div>
                    <div class="navbar">
                        <form action="">
                            <button class="btnn" role="file">Importer les formateurs</button>
                            <button class="btnn" role="button">Importer les etudiants</button>
>>>>>>> e0a0de95f09e654710b28a4e551cd7d40031087d

                            <a href="{{ route('actualites.create') }}" class="btnn" role="button">Poster  une
                                actualites</a>
                        </form>
                    </div>



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
                                <form action="{{ route('message.searchFormateur/for') }}">
                                    <input type="text" placeholder="Search" name="search">
                                    <button type="submit"><span class="material-symbols-outlined">search</span></button>
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
                        <div class="chat-container">

<<<<<<< HEAD
                                </ul>
                            </div>
                    </form>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis rerum minima ipsam unde pariatur delectus impedit tempora commodi, fugiat expedita natus saepe dolorum illo illum voluptate. Enim sapiente odit molestias!</p>
                </div>
            </div>
            <div class="chat incoming">
                <img src="{{asset("img/ME.jpg")}}" alt="image dyspp0o9ujy" >
                    <div class="details">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis rerum minima ipsam unde pariatur delectus impedit tempora commodi, fugiat expedita natus saepe dolorum illo illum voluptate. Enim sapiente odit molestias!</p>
                        <img src="{{asset("img/list.png")}}" alt="" id="imgList" data-dropdown-toggle="dropdown2" >
                            <!-- Dropdown menu -->
                            <div id="dropdown2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
                                    </li>

                                </ul>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!---------------------------------------------------- fin chat-container ------------------------------------------------------>
=======
                        </div>
                        <!---------------------------------------------------- fin chat-container ------------------------------------------------------>
>>>>>>> e0a0de95f09e654710b28a4e551cd7d40031087d


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
                                <form action="{{ route('message.searchEtudient') }}" method="POST">@csrf
                                    <input type="text" placeholder="Search" name="search">
                                    <button type="submit"><span class="material-symbols-outlined">search</span></button>
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
                                    </a>¨
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
