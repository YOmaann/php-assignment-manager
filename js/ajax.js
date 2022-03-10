function work() {
  return new Promise((resolve) => ajax(link, resolve));
}
const ajax = (link = "./api/assign_api.php", resolve) => {
  const aj = new XMLHttpRequest();
  aj.open("GET", link);
  aj.send();
  aj.onreadystatechange = () => {
    if (aj.status == 200 && aj.readyState == 4) resolve(aj.responseText);
  };
};

async function getQ() {
  const q = await work();
  return q;
}
