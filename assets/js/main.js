(() => {
  const toggle = document.querySelector('[data-zf-menu-toggle]');
  const panel = document.querySelector('[data-zf-mobile-nav]');
  const openIcon = document.querySelector('[data-zf-menu-icon-open]');
  const closeIcon = document.querySelector('[data-zf-menu-icon-close]');

  if (!toggle || !panel) {
    return;
  }

  const setOpen = (open) => {
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    panel.hidden = !open;
    if (openIcon) openIcon.hidden = open;
    if (closeIcon) closeIcon.hidden = !open;
  };

  toggle.addEventListener('click', () => {
    const open = toggle.getAttribute('aria-expanded') !== 'true';
    setOpen(open);
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      setOpen(false);
    }
  });
})();
