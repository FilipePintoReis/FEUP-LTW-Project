var req = new XMLHttpRequest();

req.onreadystatechange = function() {
  
   if(req.readyState === 4 && req.status === 200) {
    var response = JSON.parse(this.responseText);
    console.log(response)
    console.log(document);
    var element = document.getElementsByClassName('vote_pointsNumber'); 
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