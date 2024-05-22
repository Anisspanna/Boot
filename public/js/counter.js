let triggerElement = document.querySelector(".aniss");
  let valueDisplays = document.querySelectorAll(".num");
  let interval = 4000;

  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function startCounterIfVisible() {
    if (isElementInViewport(triggerElement)) {
      valueDisplays.forEach((valueDisplay) => {
        let startValue = 0;
        let endValue = parseInt(valueDisplay.getAttribute("data-val"));

        // زيادة قيمة الزيادة لتسريع العد
        let increment = 80;
        // تقليل قيمة الزمن لتسريع العد
        let duration = 10;

        let counter = setInterval(function () {
          startValue += increment;
          valueDisplay.textContent = startValue;

          if (startValue >= endValue) {
            valueDisplay.textContent = endValue;
            clearInterval(counter);
          }
        }, duration);
      });

      window.removeEventListener("scroll", startCounterIfVisible);
    }
  }

  

  window.addEventListener("scroll", startCounterIfVisible);
 