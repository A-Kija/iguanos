import './App.css';
import './buttons.scss';
import Animal from './Components/004/Animal';
import AnimalItem from './Components/004/AnimalItem';

const bu = _ => {
    return <h2>bubu-bu</h2>
} 

const animals = [
    {id: 1, type: 'racoon', animalColor: 'skyblue'},
    {id: 2, type: 'cat', animalColor: 'crimson'},
    {id: 3, type: 'dog', animalColor: 'yellow'},
    {id: 4, type: 'bird', animalColor: 'green'},
    {id: 5, type: 'fish', animalColor: 'blue'},
    {id: 6, type: 'snake', animalColor: 'black'},
    {id: 7, type: 'lion', animalColor: 'brown'},
    {id: 8, type: 'tiger', animalColor: 'orange'},
    {id: 9, type: 'elephant', animalColor: 'gray'},
    {id: 10, type: 'monkey', animalColor: 'pink'},
    {id: 11, type: 'cat', animalColor: 'crimson'},
];


function App() {
  return (
    <div className="App">
      <header className="App-header">
        <h1>Hello Props</h1>
        {/* {bu()}
        <Animal type='racoon' animalColor='skyblue' />
        <Animal type='cat' animalColor='crimson' /> */}
        {/* {
            animals.map((animal, index) => <div key={index} style={{color: animal.animalColor}}>{animal.type}</div>)
        } */}
        {
            animals.map(animal => <AnimalItem key={animal.id} animal={animal}/>)  
        }
      </header>
    </div>
  );
}

export default App;