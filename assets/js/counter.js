
function numCounter(tagId,maxCount,speed){
  if(maxCount > 100){
    var initialNumber = 50;
  }else{
    var initialNumber = 0;
  }
  
  function counter(){
      document.getElementById(tagId).innerHTML = initialNumber;
      ++initialNumber;
  }
  var counterDelay = setInterval(counter,speed);
  function totalTime(){
      clearInterval(counterDelay);
  }
  var totalPeriod = speed * (maxCount);  
  setTimeout(totalTime, totalPeriod);
}

let init = document.getElementById("members").innerHTML;
let init1 = document.getElementById("events").innerHTML;
let init2 = document.getElementById("partners").innerHTML;
numCounter("members",init,5);
numCounter("events",init1,99);
numCounter("partners",init2,99);