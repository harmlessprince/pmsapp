const exportCheckbox = document.getElementById('export_checkbox')
const filterButton = document.getElementById('filter_button')
const deleteButton = document.getElementById('delete_button')
const siteSelectInput = document.getElementById('site_id')
const attendanceActionTypeInput = document.getElementById('attendance_action_type')
const attendanceActionTypeInputContainer = document.getElementById('attendance_action_type_container')
const actionInput = document.getElementById('action')
if (exportCheckbox != null) {
    exportCheckbox.value = 'filter'
    const exportButton = document.getElementById('filter_button')
    exportCheckbox.addEventListener('change', function () {

        if (this.checked) {
            exportCheckbox.value = 'export'
            exportButton.innerText = 'Export Data'
        } else {
            exportCheckbox.value = 'filter'
            exportButton.innerText = 'Apply Filters'
        }
        // Add a class to trigger the transition
        exportButton.classList.add('button-transition');
        // Remove the class after a short delay to allow the transition to complete
        setTimeout(() => {
            exportButton.classList.remove('button-transition');
        }, 300); // Adjust the delay time as needed
    })
}

if (actionInput != null) {
    actionInput.value = 'filter'
    const button = document.getElementById('filter_button')

    actionInput.addEventListener('change', function (event) {
        const value = event.target.value
        if (value === "delete") {
            toggleDeleteDataButton()
            toggleAttendanceActionType()
        } else if (value === "export") {
            button.innerText = 'Export Data'
            toggleDeleteDataButton()
            toggleAttendanceActionType()

        }else {
            toggleDeleteDataButton()
            toggleAttendanceActionType()
            button.innerText = 'Apply Filters'
        }
        button.classList.add('button-transition');
        setTimeout(() => {
            button.classList.remove('button-transition');
        }, 300);
    });
}

function toggleAttendanceActionType(){
    if (attendanceActionTypeInputContainer){
        attendanceActionTypeInputContainer.classList.toggle("hidden")
    }
}

function toggleDeleteDataButton(){
    if (deleteButton){
        deleteButton.classList.toggle("hidden")
    }
}

function deleteData(event, formId, message = "Are you sure you want to delete this data ?") {
    event.preventDefault();
    console.log(formId)
    if (confirm(message)) {
        document.getElementById(`${formId}`).submit();
    }
}
