<div id="imageViewModalElement" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
     data-modal-target="imageViewModalElement">
    <div class="relative w-full max-w-2xl max-h-full">
        <div class="relative bg-db rounded-lg shadow">
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="imageViewModalElement">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="flex items-center justify-center  w-full">
                <img src="" id="image_view_in_modal" alt="View image">

            </div>
            <div id="modal_description" class="text-white p-2">

            </div>
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600"
                        data-modal-hide="imageViewModalElement">Close
                </button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/image-view-modal.blade.php ENDPATH**/ ?>