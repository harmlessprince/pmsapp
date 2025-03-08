
function createOption(displayMember, valueMember, isSelected) {
    const newOption = document.createElement("option");
    newOption.value = valueMember;
    newOption.text = displayMember;
    if (isSelected) {
        newOption.selected = true;
    }
    return newOption;
}

function getCompanySites(company_id, selectedSite = null) {
    if (isNaN(company_id) || company_id == "") {
        selectSite.innerHTML = "";
        selectSite.append(createOption("Select a company", ""));
        return
    }
    showLoader()
    const currentBaseUrl = window.location.origin;
    fetch(`${currentBaseUrl}/api/company/${company_id}/sites`)
        .then(response => response.json())  // convert to json
        .then(function (json) {
            selectSite.innerHTML = "";
            selectSite.append(createOption("Select Site", ""));

            sites = json.data?.sites ?? []
            const selectedSiteId = selectedSite ?? getQueryParamValue('site_id')
            sites.forEach((site) => {
                const isSelected = selectedSiteId && site.id === parseInt(selectedSiteId, 10);
                selectSite.append(createOption(site.name, site.id, isSelected));
            });
            selectSite.disabled = false;
            hideLoader()
        })    //print data to console
        .catch(err => console.log('Request Failed', err));
}

function getSiteTags(site_id, loaderId = 'ajax_loader_tag') {
    if (isNaN(site_id) || site_id === "") {
        selectTag.innerHTML = "";
        selectTag.append(createOption("Select a site", ""));
        return
    }
    showLoader(loaderId)
    const currentBaseUrl = window.location.origin;
    fetch(`${currentBaseUrl}/api/sites/${site_id}/tags`)
        .then(response => response.json())  // convert to json
        .then(function (json) {
            selectTag.innerHTML = "";
            selectTag.append(createOption("Select tag", ""));
            tags = json.data?.tags ?? []
            const selectedTagId = getQueryParamValue('tag_id')
            tags.forEach((tag) => {
                const isSelected = selectedTagId && tag.id === parseInt(selectedTagId, 10);
                selectTag.append(createOption(tag.name, tag.id, isSelected));
            });
            selectTag.disabled = false;
            hideLoader(loaderId)
        })    //print data to console
        .catch(err => console.log('Request Failed', err));

}




