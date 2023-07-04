import { useState } from 'react';
function Counter() {

    const [count, setCount] = useState(53);

    const setTo555 = _ => {
        setCount(555);
    }

    const add1 = _ => {
        setCount(c => c + 1);
        setCount(c => c + 1);
        setCount(c => c + 1);
    }

    return (
        <div>
            <h1>Count: {count}</h1>
            <button className="blue" onClick={setTo555}>set to 555</button>
            <button className="red" onClick={add1}>+1</button>
        </div>
    );
}

export default Counter;