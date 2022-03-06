window.onload = () => {
  document.getElementsByName("option")[0].checked = true;
  const el = document.querySelectorAll("#assignment");
  el.forEach((element) => {
    element.addEventListener("change", (e) => {
      //   e.target.previousElementSibling.checked = true;
      //   console.log(e.target.previousElementSibling);
      const form = document.getElementById("submet");
      //   console.log(form);
      // alert();
      //   setTimeout(form.submit(), 300);
      form.submit();
    });
  });
};
