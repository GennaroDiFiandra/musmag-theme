const wpAdminBarHandler = {
  bar: function() {
    return document.getElementById("wpadminbar") || false;
  },
  barHeight: function() {
    return this.bar() && this.bar().offsetHeight || false;
  },
  appContainer: function() {
    return document.getElementById("app") || false;
  },
  init: function() {
    if (this.bar() && this.appContainer())
      this.appContainer().style.paddingTop = this.barHeight()+"px";
  }
}

// wpAdminBarHandler.init();

/* Hanlde the main menu */
// document.addEventListener("DOMContentLoaded", handleMainMenu);
document.addEventListener("DOMContentLoaded", handleSubMenu);

function handleMainMenu()
{
  // if (window.matchMedia("(min-width: 992px)").matches) return;

  const menuOpener = document.querySelector(".menu-opener");
  if (!menuOpener) return;

  const menuCloser = document.querySelector(".menu-closer");
  if (!menuCloser) return;

  menuOpener.addEventListener("click", openMenu);
  menuCloser.addEventListener("click", closeMenu);
}

function openMenu()
{
  const menu = this.nextElementSibling;
  if (!menu) return;

  menu.classList.add("open");

  document.body.style.overflowY = "hidden";
}

function closeMenu()
{
  const menu = this.closest(".menu-sitewide-navigation");
  if (!menu) return;

  menu.classList.remove("open");

  document.body.style.overflowY = "auto";
}

function handleSubMenu()
{
  const submenuOpener = document.querySelector(".menu-item-has-children");
  if (!submenuOpener) return;

  submenuOpener.addEventListener("click", openSubMenu);
}

function openSubMenu()
{
  event.preventDefault();

  this.classList.toggle("open");
}

const mobileMenuHandler = {
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
  if (window.matchMedia("(min-width: 992px)").matches) return;

  if (mobileMenuHandler.opener())
    mobileMenuHandler.opener().addEventListener("click", mobileMenuHandler.open());

  if (mobileMenuHandler.closer())
    mobileMenuHandler.closer().addEventListener("click", mobileMenuHandler.close());
});
//# sourceMappingURL=assets/scripts/generated-scripts.js.map
