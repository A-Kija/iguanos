let a;
let b;


a = 5;
b = a; // by value

a++;

// console.log(`a: ${a} b: ${b}`);


let c;
let d;

c = [5]
d = c; // by reference

d = [...c]; // copy by value

c.push(6);
d.push(7);

// console.log(`c: ${c} d: ${d}`);


let e;
let f;

e = { value: 5, name: 'John', animal: 'dog' };
f = e; // by reference

f = { ...e, name: 'Simas' }; // copy by value plus change name

e.color = 'red';



// console.log('e:', e, 'f:', f);


const g = [1, 77, 3, 4, 5];

const [first, second] = g;


// console.log('first:', first, 'second:', second);

const h = { value: 5, name: 'John', animal: 'dog' };

const { value, animal } = h;

// console.log('value:', value, 'animal:', animal);

const house = [
    { id: 5, name: 'Petras', animal: 'dog', color: 'red', price: 1000 },
    { id: 6, name: 'Ona', animal: 'cat', color: 'blue', price: 85 },
    { id: 77, name: 'Simas', animal: 'racoon', color: 'green', price: 687 },
    { id: 8, name: 'Jonas', animal: 'fox', color: 'orange', price: 4 },
    { id: 9, name: 'Marytė', animal: 'dog', color: 'black', price: 77 },
    { id: 10, name: 'Eglė', animal: 'cat', color: 'white', price: 1000 },
    { id: 11, name: 'Kęstas', animal: 'dog', color: 'red', price: 1000 },
    { id: 12, name: 'Greta', animal: 'racoon', color: 'blue', price: 85 }
];


// pretend that house is REACT STATE

// make cats yellow


const newHouse = house.map(m => m.animal === 'cat' ? { ...m, color: 'yellow' } : {...m});

const ownRacoon = house.filter(m => m.animal === 'racoon');

const getSimas = house.find(m => m.name === 'Simas');

const killJonas = house.filter(m => m.name !== 'Jonas');

//sort by price

const sortHouse = [...house].sort((a, b) => a.price - b.price);

// sort by name
const sortByName = [...house].sort((a, b) => a.name.localeCompare(b.name));

// get all racoon owner and sort by name

const allRacoons = house.filter(m => m.animal === 'racoon').sort((a, b) => a.name.localeCompare(b.name));


console.log(allRacoons, house);
   

