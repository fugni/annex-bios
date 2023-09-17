const url = "https://api.pulllee.com/";

const headers = new Headers({
    "authorization": "api key here",
    "request": '{"type":"showing", "location": "Maarsen"}'
});

const request = new Request(url, {
    method: "GET",
    headers: headers,
});

fetch(request)
.then(response => response.json())
.then(data => data.forEach(element => {console.log(element)}))
.catch(error => {console.error("Error:", error)});

