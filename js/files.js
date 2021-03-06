const toggle = (put) => {
  const el1 = document.querySelector(".file_list");
  const el2 = document.querySelector(".file_open");
  const content = document.querySelector(".content_file");
  const inside = getQ(put);
  inside.then((value) => {
    content.innerHTML = `<pre>${value}</pre>`;
  });
  el1.classList.toggle("go_away");
  el2.classList.toggle("fade_in");
};

window.onload = () => {
  const butts = document.getElementsByName("option");
  butts.forEach((value) => {
    value.checked = false;
    value.addEventListener("change", (ev) => {
      const de = document.getElementsByName("option");
      const value = ev.target.value;
      de.checked = true;
      ev.target.checked = false;
      toggle(value);
    });
  });
  butts[0].checked = true;
};
