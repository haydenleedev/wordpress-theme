
document.addEventListener("DOMContentLoaded", function() { 
  if (typeof MktoForms2 != "undefined") {
  MktoForms2.whenReady(function (form){  //once jquery is ready, wait for the form
     // console.log("marketo form ready22? : ", "yes!");

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

      const gaDate = document.getElementById("ga-date");
      const gaCookieDate = document.getElementById("ga-cookie-date");
      let mktDate = document.querySelector("input[name='ga_date__c']");
      let mktCookieDate = document.querySelector("input[name='ga_cookie_date__c']");

      function currentDateTime() {
          /*
          let d = new Date(),
              minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
              hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
              ampm = d.getHours() >= 12 ? 'pm' : 'am',
              months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
              days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
          let finalDateTime = days[d.getDay()]+' '+months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear()+' '+hours+':'+minutes+ampm;
          return finalDateTime;
          */

          let offset = 420; 
          let offsetMillis = offset * 60 * 1000;
          let today = new Date();
          let millis = today.getTime();
          let timeZoneOffset = (today.getTimezoneOffset() * 60 * 1000);

          let pst = millis - offsetMillis; 
          let currentDate = new Date(pst);

          return currentDate.toUTCString();

      }
     // document.addEventListener("mousemove", currentDateTime);
     // document.addEventListener("keypress", currentDateTime);

     gaDate.setAttribute("content", currentDateTime());
     mktDate.value = currentDateTime();

      setInterval(function(){
          gaDate.setAttribute("content", currentDateTime());
          mktDate.value = currentDateTime();
          //console.log("currentTime: ", currentDateTime());
        }, 60000);

        function getGaCookieDate() {
          let getGaCookieDateValue = getCookie("mkto-gaCookieDate7");

          if (getGaCookieDateValue.length < 2) {
              setCookie("mkto-gaCookieDate7", currentDateTime(), 999999999999);
              gaCookieDate.setAttribute("content", currentDateTime());
              mktCookieDate.value = currentDateTime();
              setInterval(function(){
                  let setGaCookieDateValue = currentDateTime();
                  setCookie("mkto-gaCookieDate7", setGaCookieDateValue, 999999999999);
                  mktCookieDate.value = setGaCookieDateValue;
                  gaCookieDate.setAttribute("content", setGaCookieDateValue);
                  //console.log("First Date cookie: ", setGaCookieDateValue);
              }, 60000);
          } else {
              mktCookieDate.value = getGaCookieDateValue;
              gaCookieDate.setAttribute("content", getGaCookieDateValue);
              //console.log("Stored Date cookie: ", getGaCookieDateValue);
          }
        }
        getGaCookieDate();


      const gaEmail = document.getElementById("channelEmail");
      gaEmail.addEventListener("input", addUserIdValue);
      
      const gaUserId = document.getElementById("ga-user-id");
      const gaUserEachId = document.getElementById("ga-user-each-id");
      const gaCookieId = document.getElementById("ga-cookie-id");
      const gaEmId = document.getElementById("ga-em-id");
      const gaPageUrl = document.getElementById("ga-page-url");
      let getGaCookieValue = getCookie("mkto-gaCookie-id");
      function isCookieExist() {
        if (getGaCookieValue) {
          return true;
        } else {
          return false;
        }
      }


      function addUserIdValue (e) {
         // console.log("getRandomUniqueString value: ", getRandomUniqueString(18));
          
          let emailRandomValue = getEmailRandom(e.target.value) + getRandomUniqueString(22);

          let currentUrl = window.location.href;
          let arraySplit = currentUrl.split("?");
          let cleanedUrl = arraySplit[0];
          let mktUserId = document.querySelector("input[name='ga_user_id__c']");
          let mktPageUrl = document.querySelector("input[name='ga_page']");
          let mktPageUrl2 = document.querySelector("input[name='ga_page__c']");

          if(!mktUserId.value) {
            //  console.log("No predefined unique ID: ", emailRandomValue);
              gaUserId.setAttribute("content", emailRandomValue);
              mktUserId.value = emailRandomValue;
          } else {
              gaUserId.setAttribute("content", gaUserId.getAttribute("content"));
          }

          gaUserEachId.setAttribute("content", emailRandomValue);
          gaPageUrl.setAttribute("content", cleanedUrl);
          mktPageUrl.value = cleanedUrl;
          mktPageUrl2.value = cleanedUrl;

          let mkEmId = document.querySelector("input[name='ga_em_id__c']");
          let emailRewrite = getEmailRewrite(e.target.value);
          mkEmId.value = emailRewrite;
          gaEmId.setAttribute("content", emailRewrite);

          
          let mkCookieId = document.querySelector("input[name='ga_cookie_id__c']");
          

          if (!isCookieExist()) {
              //let setGaCookieValue = getEmailRewrite(e.target.value);
              
              mkCookieId.value = emailRewrite;
              gaCookieId.setAttribute("content", emailRewrite);
              setCookie("mkto-gaCookie-id", emailRewrite, 999999999999);
             // console.log("First cookie: ", setGaCookieValue);
          } else {
              mkCookieId.value = getGaCookieValue;
              gaCookieId.setAttribute("content", getGaCookieValue);
             // console.log("Stored cookie: ", getGaCookieValue);

          }

      }
  
      function getRandomUniqueString(length) {
          let randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          let result = '';
          for ( var i = 0; i < length; i++ ) {
              result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
          }
          return result;
      }
      function getEmailRandom(gaEmailValue) {
          let randomChars = gaEmailValue.replace(/[^A-Z0-9]+/ig, "");
          let result = '';
          for ( var i = 0; i < randomChars.length; i++ ) {
              result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
          }
          return result;
      }
      function getEmailRewrite(gaEmailValue) {
          let rewriteChars = gaEmailValue.replace("@", "TrQ").replace(".", "OPt");
          return rewriteChars;
      }

  });
}
});