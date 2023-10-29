const subMainMenuHandler ={
  openers: function() {
    return document.querySelectorAll(".menu-item-has-children") || false;
  },
  open: function() {
    event.preventDefault();
    this.classList.toggle("open");
  }
}

const mobileMainMenuHandler = {
  opener: function() {
    return document.querySelector(".menu-opener") || false;
  },
  closer: function() {
    return document.querySelector(".menu-closer") || false;
  },
  open: function() {
    if (this.nextElementSibling) {
      this.nextElementSibling.classList.add("open");
      document.body.style.overflowY = "hidden";
    }
  },
  close: function() {
    if (this.closest(".menu-sitewide-navigation")) {
      this.closest(".menu-sitewide-navigation").classList.remove("open");
      document.body.style.overflowY = "auto";
    }
  }
}

document.addEventListener("DOMContentLoaded", () => {
  if (subMainMenuHandler.openers()) {
    // const openers_array = Array.from(subMainMenuHandler.openers())
    Array.from(subMainMenuHandler.openers()).map( opener => opener.addEventListener("click", subMainMenuHandler.open) );
  }
});

document.addEventListener("DOMContentLoaded", () => {
  if (window.matchMedia("(min-width: 992px)").matches) return;

  if (mobileMainMenuHandler.opener())
    mobileMainMenuHandler.opener().addEventListener("click", mobileMainMenuHandler.open);

  if (mobileMainMenuHandler.closer())
    mobileMainMenuHandler.closer().addEventListener("click", mobileMainMenuHandler.close);
});
//# sourceMappingURL=assets/scripts/generated-scripts.js.map
