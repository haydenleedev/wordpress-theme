function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  const popUpEle = document.getElementById("popup");
  const closeBlock = document.getElementById("popup-wrap");
  const closeBtn = document.getElementById("close-btn");
  const removePopupTimer = getCookie("Remove-popUp-Timer");
  const popupOverlay = document.getElementById("popup-overlay");
  //let timerReady = false;
  let lastKnownScrollPosition = 0;
  let userScrolled = false;

  var variables = {
    timerReady: false
};
//console.log("timerReady1: ", variables['timerReady']);

function changeBoolean(argument) {
    variables[argument] = true;
}
  
  function checkCookie() {
    if (removePopupTimer != "remove-it") {
      //  console.log("cookie not set!");
        showPopup();
    } else {
      //  console.log("cookie was set!");
        removePopup();
    }
  }

  

  function waitForTimer() { 
    setTimeout(
        function(){ 
            setTimeout(
                function(){ 
                        changeBoolean('timerReady');
                       // console.log("timerReady222: ", variables['timerReady']);

                        lastKnownScrollPosition = window.scrollY;
                        if ((lastKnownScrollPosition > 80) ) {
                        checkCookie();
                        }

            }, 0);
    }, 5000);
  }
  

// START: Scroll Event
if(popUpEle) {
    waitForTimer();
    document.addEventListener('scroll', activeScrollCallback); 
    document.addEventListener('touchmove', activeScrollCallback); 
}


function activeScrollCallback() {
    lastKnownScrollPosition = window.scrollY;
   // console.log("timerReady2: ", variables['timerReady']);
  //  console.log("scrollY2: ", lastKnownScrollPosition);
    if ((lastKnownScrollPosition > 50) && variables['timerReady']) {
      //  console.log("scrollY: ", lastKnownScrollPosition);
        userScrolled = true;
        checkCookie();
    }
}
// END: Scroll Event
   
    

//  Show Popup
function showPopup() {
   // console.log("show popup!");
   if(popUpEle) {
    popUpEle.classList.remove('off-screen');
   }
    
    
    setTimeout(
        function(){ 
           // console.log("popup move!");
           if(closeBlock) {
            closeBlock.classList.add('popup-anim');
           }
            
    }, 0);

}

  function removePopup(e) {
     // console.log("Clicked to remove popup!");
      if (popUpEle) {
      popUpEle.remove();
      setCookie("Remove-popUp-Timer", "remove-it", 1);
      }
  }  

  function closePopup(e) {
  //  console.log("Clicked to close popup!");
    if (popUpEle) {
        popUpEle.remove();
        setCookie("Remove-popUp-Timer", "remove-it", 1);
    } 
} 

//popUpEle.addEventListener('click', removePopup);
if (closeBtn) {
    closeBtn.addEventListener('click', removePopup);
}
if (popupOverlay) {
    popupOverlay.addEventListener('click', closePopup);
}
