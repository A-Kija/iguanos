import { useContext, useState, useEffect } from 'react';
import { AnimalContext } from '@/AnimalsComponents/AnimalContext';

export default function Edit() {

    const { edit, setEdit, foodSelector, setUpdate } = useContext(AnimalContext);

    const [name, setName] = useState('');
    const [color, setColor] = useState('#aaaaaa');
    const [weight, setWeight] = useState(0);
    const [food, setFood] = useState(foodSelector[0]);

    useEffect(_ => {
        if (null === edit) {
            return;
        }
        setName(edit.name);
        setColor(edit.color);
        setWeight(edit.weight * 100);
        setFood(edit.food);
    }, [edit]);

    const update = _ => {
        const data = {
            name,
            color,
            weight: weight / 100,
            food,
            id: edit.id
        };
        setUpdate(data);
        setEdit(null);
    }

    if (null === edit) {
        return null;
    }

    return (
        <div className="modal">
            <div className="modal-dialog  modal-dialog-centered">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title">Edit Animal</h5>
                        <button type="button" className="btn-close" onClick={_ => setEdit(null)}></button>
                    </div>
                    <div className="modal-body">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-12">
                                    <div className="mb-3">
                                        <label className="form-label">Name</label>
                                        <input type="text" className="form-control" onChange={e => setName(e.target.value)} value={name} />
                                    </div>
                                </div>
                                <div className="col-md-12">
                                    <div className="mb-3">
                                        <label className="form-label">Color</label>
                                        <input type="color" className="form-control form-control-color" value={color} onChange={e => setColor(e.target.value)} />
                                    </div>
                                </div>
                                <div className="col-md-12">
                                    <div className="mb-3">
                                        <label className="form-label">Weight <b className="mono">{(weight / 100).toFixed(2)}</b> kg</label>
                                        <input type="range" min="0" max="99999" className="form-range" value={weight} onChange={e => setWeight(e.target.value)} />
                                    </div>
                                </div>
                                <div className="col-md-12">
                                    <div className="mb-3">
                                        <label className="form-label">Food</label>
                                        <select className="form-select" value={food} onChange={e => setFood(e.target.value)}>
                                            {
                                                foodSelector.map(item => <option key={item} value={item}>{item}</option>)
                                            }
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="modal-footer">
                        <button type="button" className="btn btn-secondary" onClick={_ => setEdit(null)}>Close</button>
                        <button type="button" className="btn btn-primary" onClick={update}>Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    );
}