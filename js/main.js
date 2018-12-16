'use strict'

// Get all done checkboxes and add an event listener
let doneCBs = document.querySelectorAll('article.list input[type=checkbox]')
doneCBs.forEach((doneCB) => doneCB.addEventListener('change', doneClicked))

// What happens when a done checkbox changes value
function doneClicked(event) {
 
}

