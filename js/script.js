let qlist, maxA;
var selectedA = 1;
let listQ;

const updateQ = () => {
  const selectedA = listQ[window.selectedA - 1];
  i = document.getElementById("x");
  const opt = i.options[i.selectedIndex].value;
  const question = document.querySelector(".cont-2-sub");
  question.innerHTML = `${qlist[selectedA].statements[parseInt(opt)]}`.replace(
    "\n",
    "<br>"
  );
};
const updateL = () => {
  const selectedA = listQ[window.selectedA - 1];
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
    const tmp = elements.inputs(label[i] || defaultL[i]);
    // const option = elements.options(0, i);
    inputs.appendChild(tmp);
  }
  // nI.forEach

  // const el = elements.inputs()
};

const update = (flag) => {
  upA(flag);
  updateQ();
  updateL();
};
const setup = () => {
  // removing skeleton
  const skeleton = document.querySelector(".skeleton");
  skeleton.remove();

  // get Cookie
  const last_a = getCookie("last_assignment") | 1;
  const last_q = getCookie("last_question") | 1;

  selectedA = last_a;

  // adds
  const ano = elements.span("ano");
  const assignment = elements.span("assignment", "Assignment");
  const swiper = document.querySelector(".swiper");
  swiper.appendChild(assignment);
  swiper.appendChild(ano);

  update(3);
  document.querySelector(".left").addEventListener("click", () => {
    if (selectedA == 1) selectedA = maxA;
    else selectedA--;
    update(1);
  });
  document.querySelector(".right").addEventListener("click", () => {
    if (selectedA == maxA) selectedA = 1;
    else selectedA++;
    update(2);
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
    listQ = Object.keys(qlist);
    maxA = Object.keys(qlist).length;
    setup();
  });
};
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

const upA = function (flag) {
  const selectedA = listQ[window.selectedA - 1];
  const assign1 = document.querySelector(".swiper");
  const ano = document.querySelector(".ano");
  document.querySelector("#assignment").value = selectedA;
  ano.innerHTML = selectedA;

  // transition manager
  assign1.classList.remove("swipe_left");
  assign1.classList.remove("swipe_right");

  assign1.offsetWidth;
  // ano.offsetWidth;

  if (flag == 2) {
    assign1.classList.add("swipe_left");
    // ano.classList.add("swipe_left");
  } else if (flag == 1) {
    // ano.classList.add("swipe_right");
    assign1.classList.add("swipe_right");
  }

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
