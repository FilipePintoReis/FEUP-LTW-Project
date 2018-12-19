/********      BUTTONS      ********/

var req = new XMLHttpRequest();

req.onreadystatechange = function() {
  
   if(req.readyState === 4 && req.status === 200) {
    var response = JSON.parse(this.responseText);
    console.log(this.responseText)
    var element = document.getElementById(response.id_story).getElementsByClassName('vote_points_number'); 
    element.item(0).innerHTML = response.votes

    var element_color_up = document.getElementById(response.id_story);
    var element_color_down = document.getElementById(response.id_story);

    if(response.user_value.value == 1){
      element_color_up.getElementsByClassName('fas fa-caret-square-up').item(0).outerHTML = "<i class=\"fas fa-caret-square-up\" style=\"color: Blue\"></i>";
      element_color_down.getElementsByClassName('fas fa-caret-square-down').item(0).outerHTML = "<i class=\"fas fa-caret-square-down\"></i>";
    }
    else if(response.user_value.value == -1){
      element_color_down.getElementsByClassName('fas fa-caret-square-down').item(0).outerHTML = "<i class=\"fas fa-caret-square-down\" style=\"color: Red\"></i>";
      element_color_up.getElementsByClassName('fas fa-caret-square-up').item(0).outerHTML = "<i class=\"fas fa-caret-square-up\"></i>";
    }
    else if(!response.user_value){
      element_color_up.getElementsByClassName('fas fa-caret-square-up').item(0).outerHTML = "<i class=\"fas fa-caret-square-up\"></i>";
      element_color_down.getElementsByClassName('fas fa-caret-square-down').item(0).outerHTML = "<i class=\"fas fa-caret-square-down\"></i>";
    }
  }
}

function vote(id_story, value) {                       

 vote1(id_story, value);

}

function vote1(id_story, value) {                       

  // Ajax req
  req.open("post", "../actions/action_vote_story.php", true)
  req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') 

  req.send(encodeForAjax({id_story: id_story, value: value}))
}

function vote2(){
    document.getElementsByTagName("button").getElementsByClassName('fas fa-caret-square-up');
}

// Helper function
function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}


/********      BUTTONS      ********/
