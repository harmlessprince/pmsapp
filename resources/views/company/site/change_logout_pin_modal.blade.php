<div id="changeLogoutModal" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
     data-modal-target="changePasswordModal">
    <div class="relative w-full max-w-2xl max-h-full">
        <div class="relative bg-db rounded-lg shadow">
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 lg:text-2xl dark:text-white">
                    Change ({{$site->name}}) Logout
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="changeLogoutModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form action="{{route('company.credentials.logout.pin.change', ['site' => $site])}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="p-6 space-y-6">

                    <div class="w-full  mb-2">
                        <x-input-label for="logout_pin" :value="__('New Logout Pin')"/>
                        <x-text-input id="logout_pin" class="block mt-1 w-full" type="password" name="logout_pin" required/>
                        <x-input-error :messages="$errors->get('logout_pin')" class="mt-2"/>
                    </div>
                    <div class="w-full  mb-2">
                        <x-input-label for="confirm_logout_pin" :value="__('Confirm New Logout')"/>
                        <x-text-input id="confirm_logout_pin" class="block mt-1 w-full" type="password"
                                      name="confirm_logout_pin" required/>
                        <x-input-error :messages="$errors->get('confirm_logout_pin')" class="mt-2"/>
                    </div>

                </div>
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                            class="text-white  bg-primary_color focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Change
                    </button>
                    <button type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600"
                            data-modal-hide="changeLogoutModal">Decline
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
