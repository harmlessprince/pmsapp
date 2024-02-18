import 'flowbite';
// const flowbite = require('flowbite')

const $targetEl = document.getElementById('changePasswordModel');

// options with default values
const options = {
    placement: 'bottom-right',
    backdrop: 'dynamic',
    backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
    closable: true,
    onHide: () => {
        console.log('modal is hidden');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled');
    }
};

const modal = new flowbite.Modal($targetEl, options);

function showChangePasswordModal(){
    modal.show()
}
function hideChangePasswordModal(){
    modal.hide()
}
