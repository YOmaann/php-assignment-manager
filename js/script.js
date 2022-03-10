const updateQ = () => {
  i = document.getElementById("x");
  const opt = i.options[i.selectedIndex].value;
  const question = document.querySelector(".cont-2-sub");
  question.innerHTML = `${qlist[selectedA].statements[parseInt(opt)]}`.replace(
    "\n",
    "<br>"
  );
};
const updateL = () => {
  const defaultL = ["N", "M", "O"];
  const inputs = document.querySelector(".elements_con");
  const select = document.querySelector("#n");
  // const i = document.getElementById("x");
  const opt = i.options[i.selectedIndex].value;
  // delete all inputs
  while (inputs.firstChild) {
    inputs.removeChild(inputs.firstChild);
  }
  const nI = qlist[selectedA].inputs[opt] || 1;
  const label = qlist[selectedA].labels[opt];

  for (let i = 0; i < nI; i++) {
    const tmp = elements.inputs(label[opt] || defaultL[i]);
    // const option = elements.options(0, i);
    inputs.appendChild(tmp);
  }
  // nI.forEach

  // const el = elements.inputs()
};

const update = () => {
  upA();
  updateQ();
  updateL();
};
const setup = () => {
  update();
  document.querySelector(".left").addEventListener("click", () => {
    if (selectedA == 1) selectedA = maxA;
    else selectedA--;
    update();
  });
  document.querySelector(".right").addEventListener("click", () => {
    if (selectedA == maxA) selectedA = 1;
    else selectedA++;
    update();
  });
  const i = document.getElementById("x");
  i.addEventListener("change", (ev) => {
    const j = document.getElementById("m");
    const opt = i.options[i.selectedIndex].value;
    updateQ();
    updateL();
    // alert(opt);
  });
};
window.onload = () => {
  const p = getQ("./api/assign_api.php");
  p.then((value) => {
    const result = JSON.parse(value);
    qlist = result;
    maxA = Object.keys(qlist).length;
    setup();
  });
};

let selectedA = 1;
// const qlist = {
//   1 : {
//     questions : [1,2,3,4,9,10],
//     questionsDone : 6,
//   },
//   2: {
//     questions: [1,2,6,7,8,9,10],
//     questionsDone : 7

//   },
//   3: {
//     questions: [2, 3, 4, 5, 7],
//     questionsDone: 5
//   }
// }
// const tmpL;
let qlist, maxA;

const upA = function () {
  document.querySelector("#assignment").value = selectedA;
  document.querySelector(".ano").innerHTML = selectedA;
  const options = document.querySelector("#x");
  // alert("Hello");
  // delete all options
  while (options.firstChild) {
    options.removeChild(options.firstChild);
  }

  qlist[selectedA].questions.forEach((element) => {
    let tmp = document.createElement("option");
    tmp.value = element;
    tmp.innerHTML = element;
    options.appendChild(tmp);
  });
  document.querySelector(".op").appendChild(options);
};
