import React from "react";
import  ReactDOM from "react-dom/client"
export default function HelloReact(){


    return (<>


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
                  
</>)
}

const container = document.getElementById("Hello-react")
const root = ReactDOM.createRoot(container)
root.render(<HelloReact />);









