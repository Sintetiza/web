export async function submitComponent(event) {
  event.preventDefault();
  const form = event.target;
  const data = Array.from(form.elements);
  console.log(data);
  const objData = {};
  data.reduce((acc, curr) => {
    acc[curr.name] = curr.value;
    return acc;
  }, objData);
  const url = form.action;
  const method = form.method;
  const response = await fetch(url, {
    method: "POST",
    body: JSON.stringify(objData),
  });
  const dataResponse = await response.json();
  console.log(dataResponse);
}
