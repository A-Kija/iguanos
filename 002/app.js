// let result;

// let digit = 1;


// if (3 > digit) {
//     result = 'YES';
// } else {
//     result = 'NO';
// }

// 10 > digit && (result = 'YES') || (result = 'NO');

// 2 > digit ? result = 'YES' : result = 'NO';


let what = 25;

let result;


// result = what || 'NO';
// result = what ? what : 'NO';


// console.log(result);

const house = 'Jonas';
const house2 = ['Jonas', 'Petras', 'Bebras'];
const house3 = {
    name: 'Jonas',
    flat: 1
};
const house4 = [
    {id: 1, name: 'Jonas', flat: 1},
    {id: 8, name: 'Petras', flat: 6},
    {id: 3, name: 'Bebras', flat: 3}
];

house4[1].name = 'Ona';

// console.log(house4.find(h => h.id === 3));


// function fun(tt) {
//     return  'fun' + tt;
// }


// const fun2 = function(a) {
//     return  'fun' + a;
// }

// const fun3 = (a) => {
//     return  'fun' + a;
// }

// const fun4 = bbc => 'fun' + bbc;

// const fancy = _ => console.log('fancy');

// const fun5 = fun2;

// console.log(fun(1));
// console.log(fun2(2));
// console.log(fun3(3));
// console.log(fun4(4));
// console.log(fun5(5));

// fancy();



const nicePrint = (a, b, fun) => {
    const p = fun(a, b);
    console.log('%c' + p, 'background: skyblue; color: white; padding: 5px; border-radius: 5px;');
}

const sum = (a, b) => {
    return a + b;
}

const multiply = (a, b) => a * b;

const divide = (a, b) => a / b;

// nicePrint(1, 2, sum);
// nicePrint(1, 2, (a, b) => a / b);

const colorsHouse = [
    {id: 1, name: 'Jonas', flat: 1, color: 'red'},
    {id: 8, name: 'Petras', flat: 6, color: 'blue'},
    {id: 3, name: 'Bebras', flat: 3, color: 'green'},
    {id: 44, name: 'Ona', flat: 3, color: 'yellow'},
    {id: 5, name: 'Maryte', flat: 3, color: 'pink'},
    {id: 6, name: 'Kazys', flat: 3, color: 'orange'},
    {id: 7, name: 'Kotryna', flat: 3, color: 'purple'}
];

const colorsAnimal = [
    {id: 1, name: 'Racoon', color: 'red'},
    {id: 8, name: 'Cat', color: 'blue'},
    {id: 3, name: 'Dog', color: 'green'},
    {id: 44, name: 'Mouse', color: 'yellow'},
    {id: 5, name: 'Rabbit', color: 'pink'},
    {id: 6, name: 'Fox', color: 'orange'},
    {id: 7, name: 'Wolf', color: 'purple'}
];

// for (let i = 0; i < colorsHouse.length; i++) {
//     const house = colorsHouse[i];
//     console.log('%c' + house.name, 'background: ' + house.color + '; color: white; padding: 5px; border-radius: 5px;');
// }


const arrayWalker = (array, fun) => {
    for (let i = 0; i < array.length; i++) {
        const item = array[i];
        fun(item);
    }
}


const housePrinter = house => {
    console.log('%c' + house.name, 'background: ' + house.color + '; color: white; padding: 5px; border-radius: 5px;');
}

const simplePrinter = house => console.log(house.color);



// arrayWalker(colorsHouse, housePrinter);

// arrayWalker(colorsAnimal, housePrinter);


const fe = colorsAnimal.forEach((house, _) => ({color: house.color, name: house.name}));


const ma = colorsAnimal.map((house, _) => ({color: house.color, name: house.name}));

console.log(fe);
console.log(ma);