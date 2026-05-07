(() => {
  const body = document.body;
  if (!body || !body.classList.contains("page-id-606")) return;

  const CLASS_NAME = "dw-contact-header-show";
  const threshold = 40;

  const update = () => {
    if (window.scrollY > threshold) body.classList.add(CLASS_NAME);
    else body.classList.remove(CLASS_NAME);
  };

  window.addEventListener("scroll", update, { passive: true });
  window.addEventListener("resize", update);
  update();
})();

