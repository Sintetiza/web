function getParmsAndFormaterMessage() {
  const url = new URL(window.location.href);
  const error = url.searchParams.get("error");
  const success = url.searchParams.get("success");
  if (error !== null || success !== null) {
    alert(error ? error : success);
  }
  // clear get params
  url.searchParams.delete("error");
  url.searchParams.delete("success");
  window.history.replaceState({}, "", url.href);
}

export const formUrl = addEventListener("load", getParmsAndFormaterMessage);
