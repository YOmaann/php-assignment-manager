const toggle = (put) => {
  const el1 = document.querySelector(".file_list");
  const el2 = document.querySelector(".file_open");
  const content = document.querySelector(".content_file");
  const inside = getQ(put);
  inside.then((value) => {
    content.innerHTML = value;
  });
  el1.classList.toggle("go_away");
  el2.classList.toggle("fade_in");
};

window.onload = () => {
  const butts = document.getElementsByName("option");
  butts.forEach((value) => {
    value.checked = false;
    value.addEventListener("change", (ev) => {
      const value = ev.target.value;
      toggle(value);
    });
  });
  butts[0].checked = true;
};
