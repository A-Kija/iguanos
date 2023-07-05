import { useState } from 'react';
function Input2() {

    const [text, setText] = useState({
        text1: '',
        text2: '',
        text3: '',
        text4: ''
    });

    const handleChange = (e, prop) => {
        setText(t => ({ ...t, [prop]: e.target.value }));    
    }

    return (
        <fieldset>
            <legend>Four text inputs</legend>
            <div>
                <input type="text" value={text.text1} onChange={e => handleChange(e, 'text1')} />
            </div>
            <div>
                <input type="text" value={text.text2} onChange={e => handleChange(e, 'text2')} />
            </div>
            <div>
                <input type="text" value={text.text3} onChange={e => handleChange(e, 'text3')} />
            </div>
            <div>
                <input type="text" value={text.text4} onChange={e => handleChange(e, 'text4')} />
            </div>
        </fieldset>
    );
}

export default Input2;