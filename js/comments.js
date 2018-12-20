/********      BUTTONS      ********/

var req = new XMLHttpRequest();

req.onreadystatechange = function() {
  
   if(req.readyState === 4 && req.status === 200) {
    var response = JSON.parse(this.responseText);
    console.log(this.responseText)
    
  }
}


// Helper function
function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}


function add_comment_js(id_parent, id_story){
  event.preventDefault()
  let a = document.getElementsByName('inserted_comment').value
  console.log(document)

  req.open("post", "../actions/action_comment.php", true)
  req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') 
  req.send(encodeForAjax({a: a, id_parent: id_parent, id_story: id_story}))
  

}

function add_first_layer_comment_js(id_parent, id_story){
  event.preventDefault()
  let a = document.getElementsByName('inserted_comment').item(0).value

  req.open("post", "../actions/action_comment.php", true)
  req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') 
  req.send(encodeForAjax({a: a, id_parent: id_parent, id_story: id_story}))
  

}

/********      BUTTONS      ********/
