function work() {
  return new Promise((resolve) => ajax(resolve));
}
const ajax = (resolve) => {
  const aj = new XMLHttpRequest();
  aj.open("GET", "./api/assign_api.php");
  aj.send();
  aj.onreadystatechange = () => {
    if (aj.status == 200 && aj.readyState == 4) resolve(aj.responseText);
  };
};

async function getQ() {
  const q = await work();
  return q;
}
