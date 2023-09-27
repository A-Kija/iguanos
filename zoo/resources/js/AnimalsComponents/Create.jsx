import { useContext, useState } from 'react';
import { AnimalContext } from '@/AnimalsComponents/AnimalContext';


export default function Create() {

    const { foodSelector, setCreate } = useContext(AnimalContext);

    const [name, setName] = useState('');
    const [color, setColor] = useState('#aaaaaa');
    const [weight, setWeight] = useState(0);
    const [food, setFood] = useState(foodSelector[0]);

    const store = _ => {
        const data = {
            name,
            color,
            weight: weight / 100,
            food
        };
        setCreate(data);
        setName('');
        setColor('#aaaaaa');
        setWeight(0);
        setFood(foodSelector[0]);
    }



    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-md-12">
                    <div className="card">
                        <div className="card-header">
                            <h1>Create Animal</h1>
                        </div>
                        <div className="card-body">
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

                                    <div className="col-md-12">
                                        <div className="mb-3">
                                            <button type="button" className="btn btn-outline-primary" onClick={store}>Create Animal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}


