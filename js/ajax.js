function work(link) {
  return new Promise((resolve) => ajax(link, resolve));
}
const ajax = (link, resolve) => {
  const aj = new XMLHttpRequest();
  aj.setRequestHeader("Cache-Control", "no-cache, no-store, must-revalidate");
  aj.setRequestHeader("Pragma", "no-cache");
  aj.setRequestHeader("Expires", "0");
  aj.open("GET", link);
  aj.send();
  aj.onreadystatechange = () => {
    if (aj.status == 200 && aj.readyState == 4) resolve(aj.responseText);
  };
};

async function getQ(link) {
  const q = await work(link);
  return q;
}
