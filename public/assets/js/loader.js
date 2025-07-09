
function showLoader(loaderId = 'ajax_loader') {
    const loaderElement = document.getElementById(loaderId);
    if (loaderElement) {
        loaderElement.classList.remove('hidden')
    }

}

function hideLoader(loaderId = 'ajax_loader') {
    const loaderElement = document.getElementById(loaderId);
    if (loaderElement) {
        loaderElement.classList.add('hidden')
    }
}
