import { useState } from 'react';

const data = [
    { value: '1', label: 'One' },
    { value: '2', label: 'Two' },
    { value: '3', label: 'Three' },
    { value: '4', label: 'Four' },
    { value: '5', label: 'Five' }
];

function Select() {

    const [select, setSelect] = useState('');


    return (
        <fieldset>
            <legend>Select</legend>

            <h6>Selected: {data.find(d => d.value === select)?.label}</h6>

            <div>
                <select value={select} onChange={e => setSelect(e.target.value)}>
                    <option value="">Select one</option>
                    {
                        data.map(item => <option key={item.value} value={item.value}>{item.label}</option>)
                    }
                </select>

            </div>


        </fieldset>
    );
}

export default Select;