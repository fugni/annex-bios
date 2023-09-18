const url = "https://api.pulllee.com/";

const headers = new Headers({
    "authorization": "api key here",
    "request": '{"type":"movie", "id": 105}'
});

const request = new Request(url, {
    method: "GET",
    headers: headers,
});

fetch(request)
.then(response => response.json())
.then(data => console.log(data))
.catch(error => {console.error("Error:", error)});

