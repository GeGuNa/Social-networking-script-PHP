fetch(resource)
fetch(resource, options)


fetch('url', {
  Method: 'POST',
  Headers: {
    Accept: 'application.json',
    'Content-Type': 'application/json'
  },
  Body: body,
  Cache: 'default'
})


let promise = fetch(url, [options])



let response = await fetch(url);

if (response.ok) { // if HTTP-status is 200-299
  // get the response body (the method explained below)
  let json = await response.json();
} else {
  alert("HTTP-Error: " + response.status);
}



Response provides multiple promise-based methods to access the body in various formats:

response.text() – read the response and return as text,
response.json() – parse the response as JSON,
response.formData() – return the response as FormData object (explained in the next chapter),
response.blob() – return the response as Blob (binary data with type),
response.arrayBuffer() – return the response as ArrayBuffer (low-level representation of binary data),





let url = 'https://api.github.com/repos/javascript-tutorial/en.javascript.info/commits';
let response = await fetch(url);

let commits = await response.json(); // read response body and parse as JSON

alert(commits[0].author.login);




fetch('https://api.github.com/repos/javascript-tutorial/en.javascript.info/commits')
  .then(response => response.json())
  .then(commits => alert(commits[0].author.login));
  
  
let response = await fetch('https://api.github.com/repos/javascript-tutorial/en.javascript.info/commits');

let text = await response.text(); // read response body as text

alert(text.slice(0, 80) + '...');



let response = await fetch('/article/fetch/logo-fetch.svg');

let blob = await response.blob(); // download as Blob object

// create <img> for it
let img = document.createElement('img');
img.style = 'position:fixed;top:10px;left:10px;width:100px';
document.body.append(img);

// show it
img.src = URL.createObjectURL(blob);

setTimeout(() => { // hide after three seconds
  img.remove();
  URL.revokeObjectURL(img.src);
}, 3000);


let text = await response.text(); // response body consumed
let parsed = await response.json(); // fails (already consumed)


let response = await fetch('https://api.github.com/repos/javascript-tutorial/en.javascript.info/commits');

// get one header
alert(response.headers.get('Content-Type')); // application/json; charset=utf-8

// iterate over all headers
for (let [key, value] of response.headers) {
  alert(`${key} = ${value}`);
}

let response = fetch(protectedUrl, {
  headers: {
    Authentication: 'secret'
  }
});



let user = {
  name: 'John',
  surname: 'Smith'
};

let response = await fetch('/article/fetch/post/user', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json;charset=utf-8'
  },
  body: JSON.stringify(user)
});

let result = await response.json();
alert(result.message);





function submit(data) {

    fetch('/article/fetch/post/image', {
      method: 'POST',
      body: data
    })
      .then(response => response.json())
      .then(result => alert(JSON.stringify(result, null, 2)))
 
}



let response = await fetch(url, options); // resolves with response headers
let result = await response.json(); // read body as json


#Or, without await:

fetch(url, options)
  .then(response => response.json())
  .then(result => /* process result */)



###Response properties:

response.status – HTTP code of the response,
response.ok – true if the status is 200-299.
response.headers – Map-like object with HTTP headers.


###Methods to get response body:

response.text() – return the response as text,
response.json() – parse the response as JSON object,
response.formData() – return the response as FormData object (multipart/form-data encoding, see the next chapter),
response.blob() – return the response as Blob (binary data with type),
response.arrayBuffer() – return the response as ArrayBuffer (low-level binary data),

##Fetch options so far:
method – HTTP-method,
headers – an object with request headers (not any header is allowed),
body – the data to send (request body) as string, FormData, BufferSource, Blob or UrlSearchParams object.

  
  
  
  

/////////


// space in "Content-Type"
const headers = {
  'Content-Type': 'text/xml',
  'Breaking-Bad': '<3',
};
fetch('https://example.com/', { headers });



const headers = [
  ['Content-Type', 'text/html', 'extra'],
  ['Accept'],
];
fetch('https://example.com/', { headers });
        


fetch('blob://example.com/', { mode: 'cors' });


fetch('https://user:password@example.com/');


fetch('https://example.com/', { referrer: './abc\u0000df' });
        
        
fetch('https://example.com/', { mode: 'navigate' });
        


fetch('https://example.com/', {
  cache: 'only-if-cached',
  mode: 'no-cors',
});
        
        
fetch('https://example.com/', { method: 'CONNECT' });
        
        

fetch('https://example.com/', {
  method: 'CONNECT',
  mode: 'no-cors',
});
                 


fetch('https://example.com/', {
  method: 'GET',
  body: new FormData(),
});
     
     
     

async function SEnd(ss){
	
let response = await fetch("/info.php?id=3577&react=0");	
	
if (await response.ok) {
	//console.log(await response.text() + " id="+ ss)	
	console.log(" id="+ ss)
} else {
	console.log("HTTP-Error: " + response.status)	
}

}      
    

for (var i=0; i < 225; i++){
	SEnd(i)
}      
        
        
/////


const myImage = document.querySelector("img");

const myRequest = new Request("flowers.jpg");

fetch(myRequest)
  .then((response) => {
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    return response.blob();
  })
  .then((response) => {
    myImage.src = URL.createObjectURL(response);
  });


//


const myImage = document.querySelector("img");

const myHeaders = new Headers();
myHeaders.append("Accept", "image/jpeg");

const myInit = {
  method: "GET",
  headers: myHeaders,
  mode: "cors",
  cache: "default",
};

const myRequest = new Request("flowers.jpg");

fetch(myRequest, myInit).then((response) => {
  // …
});





const myRequest = new Request("flowers.jpg", myInit);




const myInit = {
  method: "GET",
  headers: {
    Accept: "image/jpeg",
  },
  mode: "cors",
  cache: "default",
};

const myRequest = new Request("flowers.jpg", myInit);




const request = new Request("https://example.com", {
  method: "POST",
  body: '{"foo": "bar"}',
});

const url = request.url;
const method = request.method;
const credentials = request.credentials;
const bodyUsed = request.bodyUsed;



fetch(request)
  .then((response) => {
    if (response.status === 200) {
      return response.json();
    } else {
      throw new Error("Something went wrong on API server!");
    }
  })
  .then((response) => {
    console.debug(response);
    // …
  })
  .catch((error) => {
    console.error(error);
  });
  
  
  
const formData = new FormData();
const fileField = document.querySelector('input[type="file"]');

formData.append("username", "abc123");
formData.append("avatar", fileField.files[0]);

const request = new Request("/myEndpoint", {
  method: "POST",
  body: formData,
});

request.formData().then((data) => {
  // do something with the formdata sent in the request
});






fetch(url)
    .then(response => {
        // handle the response
    })
    .catch(error => {
        // handle the error
    });
    
let response = fetch(url);



fetch('/readme.txt')
    .then(response => response.text())
    .then(data => console.log(data));



async function fetchText() {
    let response = await fetch('/readme.txt');
    let data = await response.text();
    console.log(data);
}
#Code language: JavaScript (javascript)





async function fetchText() {
    let response = await fetch('/readme.txt');

    console.log(response.status); // 200
    console.log(response.statusText); // OK

    if (response.status === 200) {
        let data = await response.text();
        // handle data
    }
}

fetchText();




let response = await fetch('/non-existence.txt');

console.log(response.status); // 400
console.log(response.statusText); // Not Found


async function getUsers() {
    let url = 'users.json';
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
}


async function renderUsers() {
    let users = await getUsers();
    let html = '';
    users.forEach(user => {
        let htmlSegment = `<div class="user">
                            <img src="${user.profileURL}" >
                            <h2>${user.firstName} ${user.lastName}</h2>
                            <div class="email"><a href="email:${user.email}">${user.email}</a></div>
                        </div>`;

        html += htmlSegment;
    });

    let container = document.querySelector('.container');
    container.innerHTML = html;
}

renderUsers();



async function renderUsers() {
    let users = await getUsers();
    let html = '';
    users.forEach(user => {
        let htmlSegment = `<div class="user">
                            <img src="${user.profileURL}" >
                            <h2>${user.firstName} ${user.lastName}</h2>
                            <div class="email"><a href="email:${user.email}">${user.email}</a></div>
                        </div>`;

        html += htmlSegment;
    });

    let container = document.querySelector('.container');
    container.innerHTML = html;
}

renderUsers();






 console.log("about to fetch a flower");

  GetImage().catch(error => {
      console.error(error);
      });

  async function GetImage(){
       const response = await fetch('/anim.jpg');
       const blob = await response.blob();
       document.getElementById('flower').src=URL.createObjectURL(blob);
       }
       
       

  getData();

  async function getData(){
       const response= await fetch('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita%’)
       console.log(response);
       const data= await response.json();
       console.log(data);
       length=data.drinks.length;
       console.log(data);
       var temp="";
       for(i=0;i<length;i++)
       {
          temp+="<tr>";
          temp+="<td>"+data.drinks[i].strDrink+"</td>";
          temp+="<td>"+data.drinks[i].strInstructions+"</td>";
       }

    document.getElementById("data").innerHTML=temp;
     }      



var form=document.getElementById('form')

form.addEventListener('submit', function(e){
 e.preventDefault()

 var name=document.getElementById('name').value
 var body=document.getElementById('body').value

 fetch('https://jsonplaceholder.typicode.com/posts', {
  method: 'POST',
  body: JSON.stringify({
    title:name,
    body:body,

  }),
  headers: {
    'Content-type': 'application/json; charset=UTF-8',
  }
  })
  .then(function(response){ 
  return response.json()})
  .then(function(data)
  {console.log(data)
  title=document.getElementById("title")
  body=document.getElementById("bd")
  title.innerHTML = data.title
  body.innerHTML = data.body  
}).catch(error => console.error('Error:', error)); 
});
