import { useContext } from 'react';
import { AnimalContext } from '@/AnimalsComponents/AnimalContext';

export default function List() {

    const { animals, setRemove, setEdit } = useContext(AnimalContext);

    if (null === animals) {
        return null;
    }

    const destroy = id => {
        setRemove({ id });
    }

    const showEdit = animal => {
        setEdit(animal);
    }

    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-md-12">
                    <div className="card">
                        <div className="card-header">
                            <h1>Animals list</h1>
                        </div>
                        <div className="card-body">
                            <ul className="list-group">
                                <li className="list-group-item">
                                    <div className="row">
                                        <div className="col-md-3">
                                            <h4>Name</h4>
                                        </div>
                                        <div className="col-md-2">
                                            <h4>Color</h4>
                                        </div>
                                        <div className="col-md-2">
                                            <h4>Weight</h4>
                                        </div>
                                        <div className="col-md-2">
                                            <h4>Food</h4>
                                        </div>
                                        <div className="col-md-3">
                                        </div>
                                    </div>
                                </li>
                                {
                                    animals.map(animal => (
                                        <li className="list-group-item" key={animal.id}>
                                            <div className="row">
                                                <div className="col-md-3">
                                                    <span>{animal.name}</span>
                                                </div>
                                                <div className="col-md-2">
                                                    <span style={{ color: animal.color }}>{animal.color}</span>
                                                </div>
                                                <div className="col-md-2">
                                                    <span>{animal.weight} kg</span>
                                                </div>
                                                <div className="col-md-2">
                                                    <span>{animal.food}</span>
                                                </div>
                                                <div className="col-md-3">
                                                    <div className="btns">
                                                        <div className="btn btn-warning btn-sm" onClick={_ => showEdit(animal)}>EDIT</div>
                                                        <div className="btn btn-danger btn-sm" onClick={_ => destroy(animal.id)}>DELETE</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    ))
                                }
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
