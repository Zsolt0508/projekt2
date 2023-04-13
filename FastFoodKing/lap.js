var ms = 5000,
//min = Math.floor((ms/1000/60) << 0),
sec = Math.floor((ms/1000) % 60);
  let warningTimerID;
  let counterDisplay = document.getElementById('numCount');
  logoutUrl = "index3.php";

  function startTimer() {
 
    warningTimerID = window.setTimeout(idleLogout, ms);
    animate(counterDisplay, 5, 0, ms );
  }
  
  function resetTimer() {
    window.clearTimeout(warningTimerID);
    startTimer();
  }

 
  function idleLogout() {
    window.location = logoutUrl;
  }

  function startCountdown() {}
    document.addEventListener("mousemove", resetTimer);
    document.addEventListener("mousedown", resetTimer);
    document.addEventListener("keypress", resetTimer);
    document.addEventListener("touchmove", resetTimer);
    document.addEventListener("onscroll", resetTimer);
    document.addEventListener("wheel", resetTimer);
    startTimer();

      function animate(obj, initVal, lastVal, duration) {

        let startTime = null;

     

        let currentTime = Date.now();


        const step = (currentTime ) => {

        

            if (!startTime) {
            startTime = currentTime ;
            }

       

            const progress = Math.min((currentTime  - startTime) / duration, 1);

        

            displayValue = Math.floor(progress * (lastVal - initVal) + initVal);
            obj.innerHTML = displayValue;

        

            if (progress < 1) {
                window.requestAnimationFrame(step);
            }else{
                window.cancelAnimationFrame(window.requestAnimationFrame(step));
            }
        };

   
        window.requestAnimationFrame(step);
    }