let toggleScreen = "true"
const toggleSideBar = () => {
    mobileSideBar.classList.toggle("hidden")
    toggleScreen = !toggleScreen

}

const toggleSidebarDropdown = (menuId) => {
    console.log(menuId)
    const menuDropDowns = document.getElementsByClassName("dropdownMenuContent")
    for (let i = 0; i < menuDropDowns.length; i++) {
        currentMenuDropdown = menuDropDowns[i]
        if (currentMenuDropdown.id === menuId) {

            currentMenuDropdown.classList.toggle("hidden")
        } else {
            currentMenuDropdown.classList.add("hidden")
        }
    }

}


const toggleProfile = () => {
    profileDropdown.classList.toggle("hidden")
}
