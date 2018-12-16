'use strict'

// Get all done checkboxes and add an event listener
let vote = document.querySelectorAll('.voting_buttons > button')  
vote.forEach((vote) => vote.addEventListener('change', doneClicked))   

// What happens when a done checkbox changes value
function doneClicked(event) {
  let vote = event.target                                             
  let id = vote.getAttribute('id')                          

  // Ajax request
  let request = new XMLHttpRequest()
  request.open("post", "../api/api_change_color.php", true)
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') // idk yet
  request.addEventListener("load", function () {                                // idk yet
    let item = JSON.parse(this.responseText)                                    // idk yet
    vote.checked = (item.item_done == 1) // closure                             // idk yet
  })                                                                            // idk yet
  request.send(encodeForAjax({item_id: id}))                                    // idk yet
}

// Helper function
function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}