<div>
    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer lg:hidden sidebtn">
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div
        class="sidebar top-0 bottom-0 lg:left-0 left-[-300px] duration-1000
        p-2 overflow-y-auto text-center bg-gray-900 shadow overflow-x-auto">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center rounded-md ">
                <i class="bi bi-app-indicator px-2 py-1 bg-blue-600 rounded-md"></i>
                <h1 class="text-[15px]  ml-3 text-xl text-gray-200 font-bold">Oman</h1>
                <i class="bi bi-x ml-20 cursor-pointer lg:hidden sidebtn"></i>
            </div>
            {{-- <hr class="my-2 text-gray-600"> --}}
            <div>
                {{-- <div
                    class="p-2.5 my-3 flex items-center rounded-md 
            px-4 duration-300 cursor-pointer  bg-gray-700">
                    <i class="bi bi-search text-sm"></i>
                    <input class="text-[15px] ml-4 w-full bg-transparent focus:outline-none" placeholder="Serach" />
                </div> --}}
                {{-- <x-menu-item title="Home" icon="bi-house-door-fill" active="true" />
                <hr class="my-4 text-gray-600"> --}}
                <x-menu-item title="Collectable" icon="bi-envelope-fill"
                    active="{{ str_contains(request()->url(), 'collectables') }}" url="{{ url('/collectables') }}" />
                <x-menu-item title="Buildings" icon="bi-building"
                    active="{{ str_contains(request()->url(), 'buildings') }}" url="{{ url('/buildings') }}" />
                <x-menu-item title="Users" icon="bi-person" active="{{ str_contains(request()->url(), 'users') }}"
                    url="{{ url('/users') }}" />
                <x-menu-item title="Admin User" icon="bi-gear" active="{{ str_contains(request()->url(), 'admins') }}"
                    url="{{ url('/admins') }}" />
                <x-menu-item title="Organizations" icon="bi-building-gear"
                    active="{{ str_contains(request()->url(), 'organizations') }}" url="{{ url('/organizations') }}" />
                <x-menu-item title="Collector" icon="bi-snow2" active="false" url="" />
                <x-menu-item title="Architectural" icon="bi-snow2" active="false" url="" />
                <x-menu-item title="Certificates" icon="bi-award"
                    active="{{ str_contains(request()->url(), 'certificates') }}" url="{{ url('/certificates') }}" />
                <x-menu-item title="Exit Permit" icon="bi-fullscreen-exit"
                    active="{{ str_contains(request()->url(), 'exits') }}" url="{{ url('/exits') }}" />
                <x-menu-item title="Sell Order" icon="bi-bag" active="{{ str_contains(request()->url(), 'sells') }}"
                    url="{{ url('/sells') }}" />
                <x-menu-item title="Loan Request" icon="bi-bank" active="{{ str_contains(request()->url(), 'loans') }}"
                    url="{{ url('/loans') }}" />
                <x-menu-item title="Gift Request" icon="bi-gift" active="{{ str_contains(request()->url(), 'gifts') }}"
                    url="{{ url('/gifts') }}" />
                <x-menu-item title="Waivers Request" icon="bi-cart-x"
                    active="{{ str_contains(request()->url(), 'waivers') }}" url="{{ url('/waivers') }}" />
                <x-menu-item title="Modify Account" icon="bi-snow2" active="false" url="" />
                <x-menu-item title="Modify Enterprise" icon="bi-snow2" active="false" url="" />
                <x-menu-item title="News" icon="bi-gear" active="{{ str_contains(request()->url(), 'news') }}"
                    url="{{ url('/news') }}" />
                <x-menu-item title="Featured" icon="bi-snow2" active="false" url="" />
                <x-menu-item title="Banners" icon="bi-snow2" active="false" url="" />

                {{-- <div
                    class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-600">
                    <i class="bi bi-chat-left-text-fill"></i>
                    <div class="flex justify-between w-full items-center" onclick="dropDown()">
                        <span class="text-[15px] ml-4 text-gray-200">Chatbox</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
                <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="submenu">
                    <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Social</h1>
                    <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Personal</h1>
                    <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Friends</h1>
                </div> --}}
                <x-menu-item title="Logout" icon="bi-box-arrow-in-right"
                    active="{{ str_contains(request()->url(), 'logouot') }}" url="{{ url('/logout') }}" />
                {{-- <div
                    class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-600">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="text-[15px] ml-4 text-gray-200">Logout</span>
                </div> --}}

            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            function dropDown() {
                $("#submenu").toggleClass("hidden");
                $("#arrow").toggleClass("rotate-0");
            }
            dropDown()
            function Openbar() {
                $(".sidebar").toggleClass("left-[-300px]");
            }
            $(".sidebtn").click(function(){
                Openbar();
            });
        });
    </script>

</div>
