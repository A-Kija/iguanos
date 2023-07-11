import { useState, useEffect } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.scss';
import './buttons.scss';
import { get, store } from './Functions/localStarage';
import Delete from './Components/jb/Delete';
import Edit from './Components/jb/Edit';

export const KEY = 'persons';

function App() {

    const [name, setName] = useState('');
    const [age, setAge] = useState('14');
    const [sn, setSn] = useState('');
    const [persons, setPersons] = useState(null);
    const [lastUpdate, setLastUpdate] = useState(Date.now());

    const [deleteData, setDeleteData] = useState(null);
    const [editData, setEditData] = useState(null);



    const handleCreate = _ => {
        const person = {
            name,
            age: parseInt(age),
            sn
        }
        store(KEY, person);
        setName('');
        setAge('14');
        setSn('');
        setLastUpdate(Date.now());
    }

    useEffect(_ => {
        if (age < 30) {
            setSn('tiktok');
            return
        }
        if (age < 60) {
            setSn('instagram');
            return
        }
        setSn('facebook');
    }, [age]);


    useEffect(_ => {
        setPersons(get(KEY));
    }, [lastUpdate]);



    const handleChange = e => {
        setName(e.target.value);
    }

    const handleChangeRange = e => {
        setAge(e.target.value);
    }

    const check = key => {
        if (sn === key) {
            setSn('');
            return;
        }
        setSn(key);
    }


    return (
        <>
            <div className="container">
                <div className="row">
                    <div className="col-5">
                        <div className="card mt-4">
                            <h1 className="card-header">New Person</h1>
                            <div className="card-body">
                                <fieldset>
                                    <legend>Social network lover</legend>
                                    <div className="mt-3">
                                        <input type="text" value={name} onChange={handleChange} />
                                    </div>
                                    <div className="mt-3">
                                        <label className="form-label"><h3>Years: {age.padStart(2, '0')}</h3></label>
                                        <input className="form-range" type="range" min="14" max="99" value={age} onChange={handleChangeRange} />
                                    </div>
                                    <div className="mt-3">
                                        <div>
                                            <label className={sn === 'tiktok' ? 'radio checked' : 'radio'} onClick={_ => check('tiktok')}>TIK TOK</label>
                                            <label className={sn === 'instagram' ? 'radio checked' : 'radio'} onClick={_ => check('instagram')}>Instagram</label>
                                            <label className={sn === 'facebook' ? 'radio checked' : 'radio'} onClick={_ => check('facebook')}>FB</label>
                                        </div>
                                    </div>
                                    <div className="mt-3">
                                        <button className="nice red small" onClick={handleCreate}>Add</button>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div className="col-7">
                        <div className="card mt-4">
                            <h1 className="card-header">Persons</h1>
                            <div className="card-body">
                                <table className="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="30%">Name</th>
                                            <th width="20%">Age</th>
                                            <th width="20%">SN</th>
                                            <th width="10%"></th>
                                            <th width="10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {persons && persons.map(person => (
                                            <tr key={person.id}>
                                                <td>{person.name}</td>
                                                <td>{person.age}</td>
                                                <td>{person.sn}</td>
                                                <td><button className="nice green small no" onClick={_=> setEditData(person)}>Edit</button></td>
                                                <td><button className="nice red small no" onClick={_ => setDeleteData(person)}>Delete</button></td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {deleteData && <Delete setDeleteData={setDeleteData} deleteData={deleteData}  setLastUpdate={setLastUpdate}/>}
            {editData && <Edit setEditData={setEditData} editData={editData}  setLastUpdate={setLastUpdate}/>}
        </>
    );
}

export default App;