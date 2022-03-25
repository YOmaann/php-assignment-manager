// function split(str) {
//   const tmp = str.split("=");
//   return tmp;
// }
const getCookie = (name) => {
  const ck = document.cookie.split(";");
  let found;
  ck.forEach((val) => {
    const value = val.split("=");
    // console.log(value[0].trim() == name);
    if (value[0].trim() == name) {
      found = value[1];
    }
  });
  return parseInt(found);
};

const removeCook = () => {
  document.cookie = "";
};
