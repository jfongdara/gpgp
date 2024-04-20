function pageLoad() {

    document.querySelector('.hamburger-menu').onclick = () => {

        document.querySelector('#ham-bar-1').classList.toggle('transform');
        document.querySelector('#ham-bar-2').classList.toggle('transform');
        document.querySelector('#ham-bar-3').classList.toggle('transform');

        document.querySelector('.menu-links').classList.toggle('drop-down-menu');
    }

    document.querySelector('body').onscroll = () => {
        if (document.documentElement.scrollTop > 50) {
            document.querySelector('nav').classList.add('solid-background');
        } else {
            document.querySelector('nav').classList.remove('solid-background');
        }
    }
    
}

  function displayThursday() {
      const x = document.getElementById("thursday");
      if (x.style.display === "block") {
          x.style.display = "none";
      } else {
          x.style.display = "block";
      }
      //document.querySelector("#thursday").style.display = "block";
  }

  function displayFriday() {
      const x = document.getElementById("friday");
      if (x.style.display === "block") {
          x.style.display = "none";
      } else {
          x.style.display = "block";
      }
      //document.querySelector("#friday").style.display = "block";
  }

  function displaySaturday() {
      const x = document.getElementById("saturday");
      if (x.style.display === "block") {
          x.style.display = "none";
      } else {
          x.style.display = "block";
      }
      //document.querySelector("#saturday").style.display = "block";
  }

  function displaySunday() {
      const x = document.getElementById("sunday");
      if (x.style.display === "block") {
          x.style.display = "none";
      } else {
          x.style.display = "block";
      }
      //document.querySelector("#sunday").style.display = "block";
  }

  