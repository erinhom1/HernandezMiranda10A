// array = [1, 2, 3, 4, 5,, "foo", "bar", true, 2.51];

// const { default: axios } = require("axios");


// obj = {
//     firstname: "Erin",
//     lastname: "Hernandez",
//     age: 26,
//     statu: true,
// }

// console.log(array[5]);
// console.log(obj[firstname]);
// console.log(obj.lastname);

// for (var i =0; i<1000; i++) {
//     console.log(i);
// }

// for (var i =0; i< array.lenght; i++) {
//     console.log(array[i]);
// }


// //python style
// for(var i of array){
//     console.log(i);
// }

// //for obj
// for(var key of Object.keys(obj)){
//     console.log(key + ":" + obje[key])
// }

// //obj pyhton style
// for (var key in obj){
//     console.log(key + ": " + obj[key])
// }

// var i =0;
// while(i<10){
//     console.log(i)
//     i++
// }

// do {
//     console.log("--"+i)
// } while (i<10)

/////////////01/17/2//////////////////
// var x = 890

// if (x > 90) {
//     console.log("Si es mayor")
// } else {
//     console.log("No es mayor")
// }

var animal = "Kitty"

// if (animal === "Kitty") {
//     console.log("It is a pretty Kitty")
// } else {
//     console.log("Is not a pretty kitty")
// }

var cat = (animal === "Kitty") 

switch (animal) {
    case "Kitty":
        console.log("Case One")
        break;
    case "Puppy":
        console.log("Case Two")
        break;
    default:
        console.log("Other Wise")
        break;
}

// function prism(l) {
//     return function(w) {
//         return function(h) {
//             return l * w * h
//         }
//     }
// }

// console.log(prism(89)(12)(9))

// var message = "Hello World"
// const foo = (function(msg) {
//     console.log("I am the LIFE" + msg);
//     return msg
// }(message));

// console.log(foo)

// function prism(l, w, h) {
//     return l * w * h
// }

// console.log(prism(23, 45, 56))

// var sumTwoNumbers = function sum (a,b) {
//     return a + b
// }

////////////01/24/24//////////////////

//Recursion 
// primero se busca primero la referenfia de la funcion 

// var say = function say (times) {
//     if (times >0 ){
//         console.log("Hello")
//         say(times - 1)
//     }
// }

// say(100)

// var saysay = say
// say = "oops!"
// saysay(100)


// function personSay(person, ...msg){
//     msg.forEach(arg=> {
//         console.log(person + "say: " + arg)
//     })
// }

// personSay("Foo", "Hello", "Js","REACT","NATIVE","PWA")

// fetch("")
//     .then()

/////////////////// API FETCH

// var url = "http://api.stackexchange.com/2.2/questions?site=stackoverflow&tagged=javascript"

// var responseData = fetch(url).then(response => response.json());

// responseData.then(({items, has_more, quota_max, quota_remaining})=> {
//     console.log("Quota Max: " + quota_max + "\n")
//     for(const{title, question_id, owner, reputation, user_id} of items){
//         console.log(question_id + "title: " + title + "user: " + owner.display_name + "Reputation: " + owner.reputation + "user ID: " + owner.user_id)
//     }
// })



// var url = "https://jsonplaceholder.typicode.com/posts"

// fetch(url).then(response => response.json())
//     .then(response =>{
//         response.forEach(element => {
//             console.log("\nuser: " + element.userId + "\nID: " + element.id + "\ntitle: " + element.title)
//         });
//     })

// fetch(url, {
//     method: "POST",
//     headers: {
//         "content_type": "application/json"
//     },
//     body: JSON.stringify({
//         userid: 2,
//         title: "GGGGGG"
//     })
// }).then(response => response.json())
//     .then(response => console.log(response))

//////////////////////1/31/24///////////////////////////////

const axios = require('axios')

const url = "https://jsonplaceholder.typicode.com/users"

// axios.get(url).then(response => {
//     response.data.forEach(element =>{
//         console.log("ID" + element.id + "\nUsername: " + element.username + "\nEmail: " + element.email)
//     });
// })


// axios.post(url,{
//     username: "foo",
//     email: "test@test.com",
// }).then(response => {
//     console.log(response.data)
// }).catch((err) => {
//     console.log(err)
// });