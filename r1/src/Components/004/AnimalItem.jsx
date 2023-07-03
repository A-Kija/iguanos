import '../../style.scss';
import rand from '../../Functions/rand.js';
import randColor from '../../Functions/randColor';
function AnimalItem({ animal }) {

    const handleClick = parameter => {
        console.log(parameter, rand(1, 100));
        console.log(animal.type);
    }


    return (
        <>
            <div className="box" style={{ 
                color: animal.animalColor,
                backgroundColor: randColor(), 
                }}>
                <h2>{animal.type} <span>***</span></h2>
            </div>
            <button onClick={_ => handleClick(222)}>Click Me</button>
        </>
    );
}

export default AnimalItem;
