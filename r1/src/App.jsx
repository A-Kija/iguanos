import { useEffect, useState } from 'react';
import './App.scss';
import axios from 'axios';


function App() {

    const [users, setUsers] = useState(null);

    // useEffect(_ => {
    //     axios.get('https://jsonplaceholder.typicode.com/users')
    //         .then(res => setUsers(res.data))
    //         .catch(err => console.log(err));
    // }, []);

    const getUsers = _ => {
        axios.get('https://jsonplaceholder.typicode.com/users')
            .then(res => setUsers(res.data))
            .catch(err => console.log(err));
    }

    return (
        <div className="App">
            <header className="App-header">
                <h1>API</h1>
                <ul>
                    {
                        users 
                        ? 
                        users.map(user => <li key={user.id}>{user.name}</li>)
                        :
                        <li>Loading...</li>
                    }
                </ul>
                <button className="nice blue" onClick={getUsers}>Get Users</button>
            </header>
        </div>

    );
}

export default App;