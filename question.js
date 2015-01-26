/*
 * Pre-placement test site
 * Author: Abhinav Kumar (abhinavk.me)
 * Email: abhinavkumar@outlook.com
 */
var curr_count = 0
var time_rem = 0
var finish = 0

var startTest = function() {
  var q = 'timerem='+time_rem+'&subq='+'0'+'&suba='+'0'+'&finish='+'0'
  var ajaxobj = new XMLHttpRequest()
  ajaxobj.onreadystatechange = function() {
    if(ajaxobj.readyState==4 && ajaxobj.status==200) {
      var opp = document.getElementById('optionspane')
      var startbtn = document.getElementById('startbtn')
      var topbar = document.getElementById('topbar')
      var qimg = document.getElementById('qimg')
      displaytimer();
      opp.className -= " hidden"
      startbtn.className += " hidden"
      xmlstr=ajaxobj.responseText
      var parser = new DOMParser();
      var xmlres = parser.parseFromString(xmlstr, "application/xml");
      root = xmlres.getElementsByTagName('question')
      qimg.src = './qimg/' + root[0].childNodes[0].nodeValue
      root2 = xmlres.getElementsByTagName('options')
      options = root2[0].childNodes[0].nodeValue.split("~")
      document.getElementById('op1').innerHTML = options[0]
      document.getElementById('op2').innerHTML = options[1]
      document.getElementById('op3').innerHTML = options[2]
      document.getElementById('op4').innerHTML = options[3]
      curr_count = curr_count + 1
      topbar.innerHTML = "Question " + curr_count
    }
  }
  ajaxobj.open("GET","./question_server.php?"+q,true)
  ajaxobj.send()
}

var nextQues = function() {
    var optionsr = document.getElementsByName('options');
  var opvalue=0;
  for(var i = 0; i < optionsr.length; i++){
      if(optionsr[i].checked){
          opvalue = optionsr[i].value
          optionsr[i].checked = false
      }
  }
  if (curr_count==totalques) {finish=1};
  var q = 'timerem='+time_rem+'&subq='+curr_count+'&suba='+opvalue+'&finish='+finish
  console.log(q)
  var ajaxobj = new XMLHttpRequest()
  ajaxobj.onreadystatechange = function() {
    if(ajaxobj.readyState==4 && ajaxobj.status==200) {
      if(finish==1) {
        alert("Test finished")
        window.location = './finish.php'
      }
      else {
      xmlstr=ajaxobj.responseText
      var parser = new DOMParser();
      var xmlres = parser.parseFromString(xmlstr, "application/xml");
      root = xmlres.getElementsByTagName('question')
      qimg.src = './qimg/' + root[0].childNodes[0].nodeValue
      root2 = xmlres.getElementsByTagName('options')
      options = root2[0].childNodes[0].nodeValue.split("~")
      document.getElementById('op1').innerHTML = options[0]
      document.getElementById('op2').innerHTML = options[1]
      document.getElementById('op3').innerHTML = options[2]
      document.getElementById('op4').innerHTML = options[3]
      curr_count = curr_count+1
      topbar.innerHTML = "Question " + curr_count
      var nextbtn = document.getElementById('nextbtn')
      
      if(curr_count == totalques)
        nextbtn.innerHTML = "Finish Test";
      }
    }
  }
  ajaxobj.open("GET","./question_server.php?"+q,true)
  ajaxobj.send()
}

var hide = function() {
  var opp = document.getElementById('optionspane')
  opp.className += " hidden"
}

var seconds=50
document.getElementById('timer').innerHTML = seconds

function displaytimer(){ 
    seconds-=1
    if(seconds<1) {
      finish=1;
      nextQues();
    }
    percent = seconds/50*100
    document.getElementById('progbar').style.width = percent+"%"
    document.getElementById('timer').innerHTML = seconds + " seconds left" 
    setTimeout("displaytimer()",1000) 
}
