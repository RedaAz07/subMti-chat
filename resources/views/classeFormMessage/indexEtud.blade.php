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
    <link
        href="https://fonts.googleapis.com/css2?family=Poetsen+One&family=Radio+Canada+Big:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

</head>

<body>
    <!---------------------------------------------------- header ------------------------------------------------------>
    @auth
    @if (auth()->user()->type === 'etudient')

    {{--                        etudient page                  --}}

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
                <ul class="py-2 text-xl text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
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
                        <span id="nom"><strong>{{ $etudient->nom . ' ' . $etudient->prenom }}</strong></span>
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
                    <form class="mx-auto max-w-screen-xl mx-10" style="width: 300px;"
                        action="{{ route('message.searchFormateur/for') }}" method="POST">@csrf
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" name='search'
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search formateur..." required />
                            <button type="submit" style="background: #f48c06; "
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                </div>

                <nav>
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
                                                    <span
                                                        id="active-span">{{ $formateur->nom . ' ' . $formateur->prenom }}</span>
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
                    <img src="{{ asset('img/group.png') }}" alt="">



                    @foreach ($classes as $classe)
                        @if ($classe->id_classe == $id_classe)
                            <span id="nom"><strong>salone prive de formateurs </strong></span>
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



                    </div>
                </div>






                @foreach ($messages as $mesg)


                    @auth

                            <div class="chat outgoing" id="outgoing">
                                <div class="details" style="display: flex;flex-direction: column; justify-content:left">

                                    @if ($mesg->contenu !== null)
                                    <h6>{{$mesg->formateur->nom . "   ".  $mesg->formateur->prenom }}</h6><br>

                                        <p>{{ $mesg->contenu }}</p>

                                    @endif

                                </div>
                            </div>
                            <div style="display:flex ;justify-content: end">
                                @if ($mesg->file !== null)
                                    <img src="{{ asset('storage/' . $mesg->file) }}" width="100px" height="100px">
                                @endif


                            </div>
                        @else



                            <div class="chat incoming">

                                <div class="details">
                                    <p style="font-size: 20px">
                                        {{ $mesg->contenu }}



                                    </p>
                                    <img src="{{ asset('img/list.png') }}" alt="" id="imgList"
                                        data-dropdown-toggle="dropdown{{ $mesg->id_message }}">
                                    <!-- Dropdown menu -->




                                    </form>
                                </div>
                            </div>
                    @endauth
                @endforeach




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
                    <h2 class="groupe"><strong>Classes</strong></h2>
                    <div class="groupes">
                        <a href="{{ route('message.index') }}" class="links ">
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
                                        <span id="active-span">classe{{ $etudient->classe->num_groupe }} </span>
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
                                                <span id="active-span">salone prive de formateurs </span>
                                            </a>
                                        </div>
                                    @break
                                @endif
                            @endforeach
                        @break

                    @endif
                @endauth
            @endforeach








        </div>
        <section>
            <h2 class="annance"><strong>Actualites</strong></h2>


            @foreach ($actualites as $actualite)
                <div class="annances-container">
                    <div id="alert-border-2"
                        class=" annances font-semibold flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800"
                        role="alert">
                        <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="span" class="ms-3 font-semibold">{{ $actualite->contenu }}</div>

                    </div>
                </div>
            @endforeach
        </section>
    </aside>
</div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endif
@endauth
