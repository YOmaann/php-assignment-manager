const elements = {};

elements.inputs = (label_txt, name) => {
  const element = document.createElement("div");
  const label = document.createElement("span");
  const span_input = document.createElement("span");
  const input = document.createElement("input");
  const option = elements.options(name);

  label.innerHTML = label_txt;
  input.type = "text";
  input.id = "changes";
  input.onchange = (e) => {
    // console.log(e.target);
    const el = e.target;
    el.nextElementSibling.value = el.value;
  };
  element.classList.add("text_anim");
  input.required = "required";
  element.classList.add("elements");
  // label.classList.add("")

  span_input.appendChild(input);
  span_input.appendChild(option);
  element.append(label);
  element.append(span_input);
  return element;
};
elements.options = (name = "n[]", value = 0) => {
  const element = document.createElement("input");
  element.type = "checkbox";
  element.name = name;
  element.classList.add("hidden");
  element.value = value;
  element.selected = "selected";
  //   element.indexN = id
  return element;
};
