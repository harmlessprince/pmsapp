const searchLocationElm = document.getElementById("location");
const longitudeElm = document.getElementById("longitude")
const latitudeElm = document.getElementById("latitude")
const searchLocationMapElm = document.getElementById('searchLocationMap')
// const imageViewModalElement = document.getElementById('imageViewModalElement');
// var imageViewModalObject = null;
let autocompleteSearchLocation = null;
const searchLocation = {
    id: "",
    name: "",
    address: "",
    latitude: 0,
    longitude: 0,
};

function initAutocomplete() {
    const options = {
        componentRestrictions: {
            country: "NG"
        }
    }
    if (searchLocationElm) {
        autocompleteSearchLocation = new google.maps.places.Autocomplete(searchLocationElm, options);
        autocompleteSearchLocation.addListener("place_changed", onSearchLocationAddressChange)
    }
    if (searchLocationMapElm) {
        let lat = !isNaN(parseFloat(latitudeElm?.value)) ? parseFloat(latitudeElm?.value) : 0
        let long = !isNaN(parseFloat(longitudeElm?.value)) ? parseFloat(longitudeElm?.value) : 0
        var initialLatLng = {lat: lat, lng: long};
        // console.log(initialLatLng)
        // Create a map object and specify the DOM element for display.
        map = new google.maps.Map(searchLocationMapElm, {
            center: initialLatLng,
            zoom: 18
        });

        // Create an empty marker
        marker = new google.maps.Marker({
            map: map,
            position: initialLatLng,
            title: 'Your Location'
        });
    }


}

function onSearchLocationAddressChange() {
    const place = autocompleteSearchLocation.getPlace();
    searchLocation.address = place.formatted_address;
    searchLocation.latitude = place.geometry.location.lat();
    searchLocation.longitude = place.geometry.location.lng();
    searchLocation.name = place.name;
    searchLocation.id = place.place_id;
    const setSearchLocationAddressEvent = new CustomEvent('set-search-location-address-event', {
        detail: searchLocation.address
    });
    window.dispatchEvent(setSearchLocationAddressEvent);
    if (longitudeElm && latitudeElm) {
        longitudeElm.value = searchLocation.longitude
        latitudeElm.value = searchLocation.latitude
        if (searchLocationMapElm) {
            var newLatLng = new google.maps.LatLng(searchLocation.latitude, searchLocation.longitude);
            marker.setPosition(newLatLng);
            map.setCenter(newLatLng);
        }

    }

}

document.addEventListener("DOMContentLoaded", function (event) {
    initAutocomplete()
});
