const planets = ['Earth', 'Mars', 'Venus', 'Jupiter', 'Saturn', 'Mercury', 'Uranus', 'Neptune', 'Pluto'];

for (let index = 0; index < planets.length; index++) {
    document.write(planets[index] + '<br>');
}

const obj = {   // object   // key: value  
    name: 'John',
    age: 25,
    city: 'New York',
    job: 'Developer',
    happy: true
};

for (p in obj) {
    console.log(p + ': ' + obj[p]);
}