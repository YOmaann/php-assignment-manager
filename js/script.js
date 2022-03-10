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
  
}
const setup = () => {
  upA();
  updateQ();
  document.querySelector(".left").addEventListener("click", () => {
    if (selectedA == 1) selectedA = maxA;
    else selectedA--;
    upA();
    updateQ();
  });
  document.querySelector(".right").addEventListener("click", () => {
    if (selectedA == maxA) selectedA = 1;
    else selectedA++;
    upA();
    updateQ();
  });
  const i = document.getElementById("x");
  i.addEventListener("change", (ev) => {
    const j = document.getElementById("m");
    const opt = i.options[i.selectedIndex].value;
    updateQ();
    // alert(opt);
    if (qlist[selectedA].inputs[parseInt(opt)] > 1)
      j.classList.remove("hidden");
    else j.classList.add("hidden");
  });
};
window.onload = () => {
  const p = getQ();
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
