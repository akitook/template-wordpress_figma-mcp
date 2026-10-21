/* menu
 * ハンバーガーメニューの開閉（.js-menu-toggle をクリック、Escキーで閉じる）
   ----------------------------------------------------------------- */

const menu = () => {
  const menuElement = document.getElementById("menu");
  const toggleButtons = document.querySelectorAll(".js-menu-toggle");
  if (!menuElement || toggleButtons.length === 0) {
    return;
  }

  const setOpen = (isOpen) => {
    menuElement.classList.toggle("is-open", isOpen);
    menuElement.setAttribute("aria-hidden", String(!isOpen));
    document.body.classList.toggle("is-menu-open", isOpen);
    toggleButtons.forEach((button) => {
      button.setAttribute("aria-expanded", String(isOpen));
    });
  };

  toggleButtons.forEach((button) => {
    button.addEventListener("click", () => {
      setOpen(!menuElement.classList.contains("is-open"));
    });
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && menuElement.classList.contains("is-open")) {
      setOpen(false);
    }
  });
};

export default menu;
