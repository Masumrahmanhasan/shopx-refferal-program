<div class="relative bg-white border-1 z-10 sm:rounded-lg max-w-xs flex-320 shadow sidenav"
     :class="{'sidenav-mobile': open, 'sidenav': !open }">
    <div class="overflow-auto px-6 pb-6">
        <div class="avatar p-6 text-center mb-6 relative border-b border-gray-300">
            <span class="relative w-16 h-16 mb-4 rounded-full inline-flex items-center font-semibold justify-center">
                <img src="{{ auth()->user()->avatar ?? 'https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png' }}"
                    class="w-full h-full rounded-full object-cover" alt="">

                @if (Auth::user()->status === 'active')
                    <span
                        class="-bottom-1 left-9 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full">
                    </span>
               @endif
            </span>

            <h4 class="h5 fs-14 mb-1 fw-700 text-dark">{{ Auth::user()->username }}</h4>
            <div class="text-truncate opacity-60 fs-12">Joined: {{ Auth::user()->created_at }}</div>
            <div class="text-truncate opacity-60 fs-12 font-semibold">Sponsored By:
                <span>
                    {{ Auth::user()->sponsored_by?->username }}
                    ({{ Auth::user()->sponsored_by?->referral_id }})
                </span>
            </div>

        </div>

        <div class="sidemnenu">
            <ul class="list-none mb-4 pb-4">

                <!-- Dashboard -->
                <li
                    class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu @if (Route::currentRouteName() === 'dashboard') bg-purple_light-50 text-white active @endif">
                    <a href="{{ route('dashboard') }}" class="flex items-center mb-2 font-bolder px-3 py-2 active"
                        aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_24768" data-name="Group 24768" transform="translate(3495.144 -602)">
                                <path id="Path_2916" data-name="Path 2916"
                                    d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z"
                                    transform="translate(-3495.144 602)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">Dashboard</span>
                    </a>
                </li>

                <li
                    class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu @if (Route::currentRouteName() === 'profile.edit') bg-purple_light-50 text-white active @endif">
                    <a href="{{ route('profile.edit') }}" class="flex items-center mb-2 font-bolder px-3 py-2 active"
                        aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                <path id="Path_2924" data-name="Path 2924"
                                    d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                    transform="translate(-3499.144 602)" fill="#b5b5bf"></path>
                                <path id="Path_2925" data-name="Path 2925"
                                    d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                    transform="translate(-3495.144 592)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">My Profile</span>
                    </a>
                </li>

                <li
                    class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu @if (Route::currentRouteName() === 'wallet') bg-purple_light-50 text-white active @endif">
                    <a href="{{ route('wallet') }}" class="flex items-center mb-2 font-bolder px-3 py-2 active"
                        aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                <path id="Path_2924" data-name="Path 2924"
                                    d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                    transform="translate(-3499.144 602)" fill="#b5b5bf"></path>
                                <path id="Path_2925" data-name="Path 2925"
                                    d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                    transform="translate(-3495.144 592)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">My Balance</span>
                    </a>
                </li>

                <li
                    class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu @if (Route::currentRouteName() === 'task') bg-purple_light-50 text-white active @endif">
                    <a href="{{ route('task') }}" class="flex items-center mb-2 font-bolder px-3 py-2 active"
                        aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                <path id="Path_2924" data-name="Path 2924"
                                    d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                    transform="translate(-3499.144 602)" fill="#b5b5bf"></path>
                                <path id="Path_2925" data-name="Path 2925"
                                    d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                    transform="translate(-3495.144 592)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">My Profit Work</span>
                    </a>
                </li>


                <li
                    class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu">
                    <a href="javascript:;void(0)" class="flex items-center mb-2 font-bolder px-3 py-2 active"
                        aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                <path id="Path_2924" data-name="Path 2924"
                                    d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                    transform="translate(-3499.144 602)" fill="#b5b5bf"></path>
                                <path id="Path_2925" data-name="Path 2925"
                                    d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                    transform="translate(-3495.144 592)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">Freelancing (Coming soon)</span>
                    </a>
                </li>

                <li
                    class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu">
                    <a href="javascript:;void(0)" class="flex items-center mb-2 font-bolder px-3 py-2 active"
                        aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                <path id="Path_2924" data-name="Path 2924"
                                    d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                    transform="translate(-3499.144 602)" fill="#b5b5bf"></path>
                                <path id="Path_2925" data-name="Path 2925"
                                    d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                    transform="translate(-3495.144 592)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">Transfer Balance (Coming soon)</span>
                    </a>
                </li>

                <li
                    class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu @if (Route::currentRouteName() === 'referrel.index') bg-purple_light-50 text-white active @endif">
                    <a href="{{ route('referrel.index') }}"
                        class="flex items-center mb-2 font-bolder px-3 py-2 active" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                <path id="Path_2924" data-name="Path 2924"
                                    d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                    transform="translate(-3499.144 602)" fill="#b5b5bf"></path>
                                <path id="Path_2925" data-name="Path 2925"
                                    d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                    transform="translate(-3495.144 592)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">Refferel</span>
                    </a>
                </li>

                <li
                    class="hover:bg-purple_light-50 hidden rounded-3xl hover:text-white user-menu @if (Route::currentRouteName() === 'payment.index') bg-purple_light-50 text-white active @endif">
                    <a href="{{ route('payment.index') }}"
                        class="flex items-center mb-2 font-bolder px-3 py-2 active" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                <path id="Path_2924" data-name="Path 2924"
                                    d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                    transform="translate(-3499.144 602)" fill="#b5b5bf"></path>
                                <path id="Path_2925" data-name="Path 2925"
                                    d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                    transform="translate(-3495.144 592)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">Payment</span>
                    </a>
                </li>

                <li
                    class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu @if (Route::currentRouteName() === 'support.index') bg-purple_light-50 text-white active @endif">
                    <a href="{{ route('support.index') }}"
                        class="flex items-center mb-2 font-bolder px-3 py-2 active" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                <path id="Path_2924" data-name="Path 2924"
                                    d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                    transform="translate(-3499.144 602)" fill="#b5b5bf"></path>
                                <path id="Path_2925" data-name="Path 2925"
                                    d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                    transform="translate(-3495.144 592)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">Support</span>
                    </a>
                </li>

                <li
                    class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu @if (Route::currentRouteName() === 'faq.index') bg-purple_light-50 text-white active @endif">
                    <a href="{{ route('faq.index') }}" class="flex items-center mb-2 font-bolder px-3 py-2 active"
                        aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            class="hover:fill-dark">
                            <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                <path id="Path_2924" data-name="Path 2924"
                                    d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                    transform="translate(-3499.144 602)" fill="#b5b5bf"></path>
                                <path id="Path_2925" data-name="Path 2925"
                                    d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                    transform="translate(-3495.144 592)" fill="#b5b5bf"></path>
                            </g>
                        </svg>
                        <span class="aiz-side-nav-text ml-3">FAQ</span>
                    </a>
                </li>

                <li class="hover:bg-purple_light-50 rounded-3xl hover:text-white user-menu">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="flex items-center mb-2 font-bolder px-3 py-2 active" aria-expanded="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15.999"
                                viewBox="0 0 16 15.999" class="hover:user-menu">
                                <g id="Group_25503" data-name="Group 25503" transform="translate(-24.002 -377)">
                                    <g id="Group_25265" data-name="Group 25265" transform="translate(-216.534 -160)">
                                        <path id="Subtraction_192" data-name="Subtraction 192"
                                            d="M12052.535,2920a8,8,0,0,1-4.569-14.567l.721.72a7,7,0,1,0,7.7,0l.721-.72a8,8,0,0,1-4.567,14.567Z"
                                            transform="translate(-11803.999 -2367)" fill="#b5b5bf"></path>
                                    </g>
                                    <rect id="Rectangle_19022" data-name="Rectangle 19022" width="1"
                                        height="8" rx="0.5" transform="translate(31.5 377)"
                                        fill="#b5b5bf"></rect>
                                </g>
                            </svg>
                            <span class="aiz-side-nav-text ml-3">Sign Out</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
