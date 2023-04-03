/*
* Make heafer fixed on sroll if viewport is wider than 768px
* */
document.addEventListener("DOMContentLoaded", makeHeaderFixed);

function makeHeaderFixed()
{
  if (!window.matchMedia("(min-width:768px)").matches)
    return null;

  const observed = document.querySelector(".sitewide-footer");
  if (!observed)
    return;

  const observerOptions = {
    threshold: 1,
    rootMargin: `${(observed.clientHeight)*10}px`
  }

  const observer = new IntersectionObserver(manipulateHeader, observerOptions);

  observer.observe(observed);
}

function manipulateHeader(entries)
{
  const header = document.querySelector(".sitewide-header");

  entries.forEach(entry => {

    if (entry.isIntersecting)
      header.classList.add("fixed");
    else
      header.classList.remove("fixed");
  })
}
/*END*/