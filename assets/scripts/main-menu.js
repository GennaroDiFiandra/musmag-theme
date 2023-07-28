/* Hanlde the main menu */
document.addEventListener("DOMContentLoaded", handleMainMenu);
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