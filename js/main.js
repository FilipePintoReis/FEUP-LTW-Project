var req = new XMLHttpRequest();

req.onreadystatechange = function() {
  
   if(req.readyState === 4 && req.status === 200) {
    var response = JSON.parse(this.responseText);
    var element = document.getElementById(response.id_story).getElementsByClassName('vote_points_number'); 
    //console.log(element.item(0).innerHTML);
    //console.log(element.innerHTML);
    element.item(0).innerHTML = response.votes
  }
}

function vote(id_story, value) {                       

  // Ajax req
  req.open("post", "../actions/action_vote_story.php", true)
  req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') 

  req.send(encodeForAjax({id_story: id_story, value: value}))
}


// Helper function
function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}