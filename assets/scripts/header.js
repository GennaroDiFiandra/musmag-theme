/*
* Make heafer fixed on sroll if viewport is wider than 768px
* */
document.addEventListener("DOMContentLoaded", makeHeaderFixed);

function makeHeaderFixed()
{
  if (!window.matchMedia("(min-width:768px)").matches)
    return;

  const fakeObserved = document.querySelector(".sitewide-footer");
  if (!fakeObserved)
    return;

  const documentHeight = document.querySelector("body");
  if (!documentHeight)
    return;

  const observerOptions = {
    threshold: 1,
    rootMargin: `${documentHeight.clientHeight*0.33}px`
  }

  const observer = new IntersectionObserver(manipulateHeader, observerOptions);

  observer.observe(fakeObserved);
}

function manipulateHeader(entries)
{
  const header = document.querySelector(".sitewide-header");
  if (!header)
    return;

  entries.forEach(entry => {

    if (entry.isIntersecting)
      header.classList.add("fixed");
    else
      header.classList.remove("fixed");
  })
}
/*END*/